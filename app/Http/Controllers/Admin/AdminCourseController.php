<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Category;
use App\Models\Tag;
use App\Enums\FlashType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;

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
            ],
            [
                // 'name.required' => 'Tên đăng nhập này đã được sử dụng',
                // 'email.unique' => 'Email này đã được sử dụng',
            ]
        );
        $course = new course();
        DB::begintransaction();
        try {
            $course->name = $request->name;
            $course->category_id = $request->category;
            $course->level = $request->level;
            $course->price = $request->price;
            $course->note = $request->note;
            $course->is_hot = $request->hot;
            $course->publish_start = $request->time_start;
            $course->publish_end = $request->time_end;
            if ($course->save()) {
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
        $course = Course::where('id', $id)->firstOrFail();
        $title = "Thông tin khóa học";
        return view('admin.course.detail', [
            'title' => $title,
            'course' => $course
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::where('id', $id)->firstOrFail();
        $title = "Sửa thông tin khóa học";
        return view('admin.course.edit', [
            'title' => $title,
            'course' => $course
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $title = "Sửa thông tin khóa học";
        $this->validate($request,
            [
                'name' => ['required'],
            ],
            [
                
            ]
        );
        $course = Course::where('id', $id)->firstOrFail();
        DB::begintransaction();
        try {
            $course->name = $request->name;
            $course->category_id = $request->category;
            $course->level = $request->level;
            $course->price = $request->price;
            $course->note = $request->note;
            $course->is_hot = $request->hot;
            $course->publish_start = $request->time_start;
            $course->publish_end = $request->time_end;
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
            'course' => $course
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
        ]);

        if ($course->delete()) {
            DB::commit();
            return response()->json('Xóa khóa học thành công!', FlashType::OK);
        }
        DB::rollBack();
        return response()->json('Đã có lỗi xảy ra!', FlashType::NOT_FOUND);
    }
}
