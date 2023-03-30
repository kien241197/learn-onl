<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Enums\FlashType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use DB;
use File;
use Storage;

class AdminLessonController extends Controller
{
    public function create($courseId, $chapterId)
    {
        $title = "Thêm bài học";

        return view('admin.lesson.add', [
            'title' => $title,
            'chapterId' => $chapterId,
            'courseId' => $courseId,
        ]);
    }

    public function store(Request $request, $courseId, $chapterId)
    {
        $this->validate($request,
            [
                'name' => ['required'],
                // 'image' => ['mimes:jpeg,png,jpg,gif'],
            ],
            [
                // 'name.required' => 'Tên đăng nhập này đã được sử dụng',
                // 'email.unique' => 'Email này đã được sử dụng',
            ]
        );
        DB::begintransaction();
        try {
            $lesson = new Lesson();
            $lesson->name = $request->name;
            $lesson->chapter_id = $chapterId;
            $lesson->document_name = $request->document_name;
            $lesson->note = $request->note;
            if($request->document) {
                $docName = time() . '.' . $request->document->extension();
                $lesson->document_path =  "storage/documents/" . $docName;
                $request->file('document')->storeAs('documents', $docName, 'public');
            } 
            if($request->video) {
                $videoName = time() . '.' . $request->video->extension();
                $lesson->video_path =  "storage/videos/" . $videoName;
                $request->file('video')->storeAs('videos', $videoName, 'public');
            } 
            if ($lesson->save()) {
                DB::commit();
                $this->setFlash(__('Đăng ký thành công!'), FlashType::Success, route('admin.courses.show', $courseId));
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
    public function edit($courseId, $chapterId, $lessonId)
    {
        $title = "Sửa bài học";
        $lesson = Lesson::where('id', $lessonId)->firstOrFail();

        return view('admin.lesson.edit', [
            'title' => $title,
            'lesson' => $lesson,
            'courseId' => $courseId,
            'chapterId' => $chapterId,
            'lessonId' => $lessonId
        ]);
    }

    public function update(Request $request, $courseId, $chapterId, $lessonId)
    {
        $title = "Sửa bài học";
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
            'lesson' => $lesson,
            'courseId' => $courseId,
            'lessonId' => $lessonId
        ]);
    }

    public function destroy($courseId, $chapterId, $lessonId)
    {
        DB::beginTransaction();

        $chapter = Lesson::where([
            ['id', $lessonId],
            ['chapter_id', $chapterId],
        ])->firstOrFail();
        if ($chapter->delete()) {
            DB::commit();
            return response()->json('Xóa bài học thành công!', FlashType::OK);
        }
        DB::rollBack();
        return response()->json('Đã có lỗi xảy ra!', FlashType::NOT_FOUND);
    }
}
