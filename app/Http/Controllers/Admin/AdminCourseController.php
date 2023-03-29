<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
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
                'image' => ['mimes:jpeg,png,jpg,gif'],
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
            $course = new course();
            $course->name = $request->name;
            $course->category_id = $request->category;
            $course->level = $request->level;
            $course->price = $request->price;
            $course->note = $request->note;
            $course->publish_start = Carbon::parse($request->time_start);
            $course->publish_end = Carbon::parse($request->time_end);
            if($request->image) {
                $imageName = time() . '.' . $request->image->extension();
                $course->image_url =  "storage/images/" . $imageName;
                $request->file('image')->storeAs('images', $imageName, 'public');
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
        return view('admin.course.detail', [
            'title' => $title,
            'course' => $course,

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
        DB::begintransaction();
        try {
            $course = Course::where('id', $id)->with(['tags'])->firstOrFail();
            $course->name = $request->name;
            $course->category_id = $request->category;
            $course->level = $request->level;
            $course->price = $request->price;
            $course->note = $request->note;
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
        if ($course->delete()) {
            DB::commit();
            return response()->json('Xóa khóa học thành công!', FlashType::OK);
        }
        DB::rollBack();
        return response()->json('Đã có lỗi xảy ra!', FlashType::NOT_FOUND);
    }
}
