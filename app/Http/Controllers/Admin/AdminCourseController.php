<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Chapter;
use App\Models\Category;
use App\Models\Tag;
use App\Enums\FlashType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use DB;
use File;
use Storage;

class AdminCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Danh sách khóa học";
        $sizeLimit = $request->limit ? $request->limit : 20;
        $search = $request->search ? $request->search : null;
        $courses = Course::where(
         function($query) use ($search) {
            if($search) {
             return $query->where('name', 'LIKE', "%".$search."%");
            }
          })
        ->with(['category'])
        ->orderBy('created_at', 'DESC')
        ->paginate($sizeLimit);
        return view('admin.course.index', [
            'title' => $title,
            'courses' => $courses,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Thêm khóa học";
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.course.add', [
            'title' => $title,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => ['required'],
                'price' => ['alpha_num'],
                'price_sale' => ['alpha_num'],
                'time' => ['alpha_num'],
                'image' => ['mimes:jpeg,png,jpg,gif'],
                'video' => ['mimes:avi,mpeg,mp4,mov'],
                'time_start' => ['date_format:Y-m-d H:m:s'],
                'time_end' => ['date_format:Y-m-d H:m:s'],
            ],
            [
                // 'name.required' => 'Tên đăng nhập này đã được sử dụng',
                // 'email.unique' => 'Email này đã được sử dụng',
            ]
        );
        DB::begintransaction();
        try {
            $course = new Course();
            $course->name = $request->name;
            $course->category_id = $request->category;
            $course->level = $request->level;
            $course->price = $request->price;
            $course->price_sale = $request->price_sale;
            $course->time = $request->time;
            $course->note = $request->note;
            $course->detail_content = $request->detail_course;
            $course->publish_start = Carbon::parse($request->time_start);
            $course->publish_end = Carbon::parse($request->time_end);
            if($request->image) {
                $imageName = time() . '.' . $request->image->extension();
                $course->image_url =  "storage/images/" . $imageName;
                $request->file('image')->storeAs('images', $imageName, 'public');
            }
            if($request->video) {
                $videoName = time() . '.' . $request->video->extension();
                $course->video_demo_path =  "storage/videos/" . $videoName;
                $request->file('video')->storeAs('videos', $videoName, 'public');
            }  
            if ($course->save()) {
                $course->tags()->sync($request->tags);
                DB::commit();
                $this->setFlash(__('Đăng ký thành công!'), FlashType::Success, route('admin.courses.index'));
            } else {
                DB::rollBack();
                $this->setFlash(__('Thất bại, hãy thử lại!'), FlashType::Error);
            }
        } catch (Exception $e) {
            DB::rollBack();
            $this->setFlash(__('Đã có lỗi xảy ra!'), FlashType::Error);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "Giáo Trình";
        $course = Course::where('id', $id)->with(['chapters', 'chapters.lessons'])->firstOrFail();
        $countLesson =  $course->chapters->sum(function($query){
            return $query->lessons->count();
        });
        return view('admin.course.detail', [
            'title' => $title,
            'course' => $course,
            'countLesson' => $countLesson

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Sửa thông tin khóa học";
        $course = Course::where('id', $id)->with(['tags'])->firstOrFail();
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.course.edit', [
            'title' => $title,
            'course' => $course,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $title = "Sửa thông tin khóa học";
        $categories = Category::all();
        $tags = Tag::all();
        $this->validate($request,
            [
                'name' => ['required'],
            ],
            [
                
            ]
        );
        if ($request->image) {
            $this->validate($request,
                [
                    'image' => ['mimes:jpeg,png,jpg,gif'],
                ],
                [
                    
                ]
            );
        }
        if ($request->video) {
            $this->validate($request,
                [
                    'video' => ['mimes:avi,mpeg,mp4,mov'],
                ],
                [
                    
                ]
            );
        }
        DB::begintransaction();
        try {
            $course = Course::where('id', $id)->with(['tags'])->firstOrFail();
            $course->name = $request->name;
            $course->category_id = $request->category;
            $course->level = $request->level;
            $course->price = $request->price;
            $course->price_sale = $request->price_sale;
            $course->time = $request->time;
            $course->note = $request->note;
            $course->detail_content = $request->detail_course;
            $course->publish_start = Carbon::parse($request->time_start);
            $course->publish_end = Carbon::parse($request->time_end);
            if ($request->image) {
                if ($course->image_url != "" && File::exists(public_path($course->image_url))) {
                    unlink(public_path($course->image_url));
                }
                $imageName = time() . '.' . $request->image->extension();
                $course->image_url =  "storage/images/" . $imageName;
                $request->file('image')->storeAs('images', $imageName, 'public');
            }
            if ($request->video) {
                if ($course->video_demo_path != "" && File::exists(public_path($course->video_demo_path))) {
                    unlink(public_path($course->video_demo_path));
                }
                $videoName = time() . '.' . $request->video->extension();
                $course->video_demo_path =  "storage/videos/" . $videoName;
                $request->file('video')->storeAs('videos', $videoName, 'public');
            }
            $course->tags()->sync($request->tags);
            if ($course->save()) {
                DB::commit();
                $this->setFlash(__('Cập nhật thành công!'), FlashType::Success);
            } else {
                DB::rollBack();
                $this->setFlash(__('Thất bại, hãy thử lại!'), FlashType::Error);
            }
        } catch (Exception $e) {
            DB::rollBack();
            $this->setFlash(__('Đã có lỗi xảy ra!'), FlashType::Error);
        }
        return view('admin.course.edit', [
            'title' => $title,
            'course' => $course,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();

        $course = Course::where([
            ['id', $id],
        ])->with(['tags'])->firstOrFail();
        $course->tags()->sync([]);
        $imageCourse = $course->image_url;
        if ($course->delete()) {
            if ($imageCourse != "" && File::exists(public_path($imageCourse))) {
                unlink(public_path($imageCourse));
            }
            DB::commit();
            return response()->json('Xóa khóa học thành công!', FlashType::OK);
        }
        DB::rollBack();
        return response()->json('Đã có lỗi xảy ra!', FlashType::NOT_FOUND);
    }

    public function addChapter(Request $request, $courseId)
    {
        $this->validate($request,
            [
                'name_chapter' => ['required'],
            ],
            [
                // 'name.required' => 'Tên đăng nhập này đã được sử dụng',
                // 'email.unique' => 'Email này đã được sử dụng',
            ]
        );
        DB::begintransaction();
        try {
            $sortNo = Chapter::where('course_id', $courseId)->max('sort_no');
            $chapter = new Chapter();
            $chapter->name = $request->name_chapter;
            $chapter->course_id = $courseId;
            $chapter->sort_no = $sortNo != NULL ? $sortNo + 1 : 1;
            if ($chapter->save()) {
                DB::commit();
                $this->setFlash(__('Đăng ký thành công!'), FlashType::Success);
            } else {
                DB::rollBack();
                $this->setFlash(__('Thất bại, hãy thử lại!'), FlashType::Error);
            }
        } catch (Exception $e) {
            DB::rollBack();
            $this->setFlash(__('Đã có lỗi xảy ra!'), FlashType::Error);
        }
        return redirect()->back();
    }

    public function editChapter(Request $request, $courseId, $chapterId)
    {
        $this->validate($request,
            [
                'name_chapter' => ['required'],
            ],
            [
                // 'name.required' => 'Tên đăng nhập này đã được sử dụng',
                // 'email.unique' => 'Email này đã được sử dụng',
            ]
        );
        DB::begintransaction();
        try {
            $chapter = Chapter::where('id', $chapterId)->firstOrFail();
            $chapter->name = $request->name_chapter;
            if ($chapter->save()) {
                DB::commit();
                $this->setFlash(__('Cập nhật thành công!'), FlashType::Success);
            } else {
                DB::rollBack();
                $this->setFlash(__('Thất bại, hãy thử lại!'), FlashType::Error);
            }
        } catch (Exception $e) {
            DB::rollBack();
            $this->setFlash(__('Đã có lỗi xảy ra!'), FlashType::Error);
        }
        return redirect()->back();
    }

    public function deleteChapter($courseId, $chapterId)
    {
        DB::beginTransaction();

        $chapter = Chapter::where([
            ['id', $chapterId],
            ['course_id', $courseId],
        ])->firstOrFail();
        if ($chapter->delete()) {
            DB::commit();
            return response()->json('Xóa chương thành công!', FlashType::OK);
        }
        DB::rollBack();
        return response()->json('Đã có lỗi xảy ra!', FlashType::NOT_FOUND);
    }
}
