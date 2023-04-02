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
                $lesson->document_path =  "storage/documents/" .$request->document->getClientOriginalName();
                $request->file('document')->storeAs('documents', $request->document->getClientOriginalName(), 'public');
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
            $lesson = Lesson::where('id', $lessonId)->firstOrFail();
            $lesson->name = $request->name;
            $lesson->document_name = $request->document_name;
            $lesson->note = $request->note;
            if($request->document) {
                if ($lesson->document_path != "" && File::exists(public_path($lesson->document_path))) {
                    unlink(public_path($lesson->document_path));
                }
                $lesson->document_path =  "storage/documents/" .$request->document->getClientOriginalName();
                $request->file('document')->storeAs('documents', $request->document->getClientOriginalName(), 'public');
            } 
            if($request->video) {
                if ($lesson->video_path != "" && File::exists(public_path($lesson->video_path))) {
                    unlink(public_path($lesson->video_path));
                }
                $videoName = time() . '.' . $request->video->extension();
                $lesson->video_path =  "storage/videos/" . $videoName;
                $request->file('video')->storeAs('videos', $videoName, 'public');
            } 
            if ($lesson->save()) {
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
        return view('admin.lesson.edit', [
            'title' => $title,
            'lesson' => $lesson,
            'courseId' => $courseId,
            'lessonId' => $lessonId,
            'chapterId' => $chapterId
        ]);
    }

    public function destroy($courseId, $chapterId, $lessonId)
    {
        DB::beginTransaction();

        $chapter = Lesson::where([
            ['id', $lessonId],
            ['chapter_id', $chapterId],
        ])->firstOrFail();
        $documentPath = $lesson->document_path;
        $videoPath = $lesson->video_path;
        if ($chapter->delete()) {
            if ($documentPath != "" && File::exists(public_path($documentPath))) {
                unlink(public_path($documentPath));
            }
            if ($videoPath != "" && File::exists(public_path($videoPath))) {
                unlink(public_path($videoPath));
            }
            DB::commit();
            return response()->json('Xóa bài học thành công!', FlashType::OK);
        }
        DB::rollBack();
        return response()->json('Đã có lỗi xảy ra!', FlashType::NOT_FOUND);
    }
}
