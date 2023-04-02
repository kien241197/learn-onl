<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Chapter;
use App\Models\Comment;
use App\Enums\StatusActive;
use App\Enums\StatusPayment;
use App\Enums\FlashType;
use Carbon\Carbon;
use Auth;
use DB;

class LessonController extends Controller
{
    public function lesson(Request $request, $id)
    {
        $title = "Trang chủ";
        $date = Carbon::now()->format('Y-m-d H:i:s');
        $lesson = Lesson::where([
            ['id', '=', $id],
        ])
        ->withWhereHas('chapter', function($query1) use ($date) {
             $query1->withWhereHas('course', function($query2) use ($date) {
                $query2->where([
                    ['publish_start', '<=', $date],
                    ['publish_end', '>=', $date],
                ])
                ->withWhereHas('orders', function($query3) use ($date) {
                    $query3->where([
                        ['user_id', Auth::user()->id],
                        ['is_active', StatusActive::ACTIVE],
                        ['payment', StatusPayment::PAID],
                    ]);
                });               
             }
            );
        })
        ->with([
            'comments' => function($query) {
                $query->where('user_id', Auth::user()->id);
            },
            'comments.replies',
            'chapter.course.chapters.lessons',
        ])
        ->firstOrFail();
        $nextLesson = lesson::where('id', '>', $id)
            ->whereHas('chapter', function($query1) use ($lesson) {
                $query1->whereHas('course', function($query2) use ($lesson) {
                    $query2->where('id', $lesson->chapter->course->id);
                });
            })
            ->first();
        $countLesson =  $lesson->chapter->course->chapters->sum(function($query){
            return $query->lessons->count();
        });

        return view('video', [
            'title' => $title,
            'lesson' => $lesson,
            'nextLesson' => $nextLesson,
            'totalLesson' => $countLesson
        ]);
    }

    public function postComment(Request $request, $lessonId)
    {
        DB::beginTransaction();
        try {
            $date = Carbon::now()->format('Y-m-d H:i:s');
            $lesson = Lesson::where([
                ['id', '=', $lessonId],
            ])
            ->withWhereHas('chapter', function($query1) use ($date) {
                 $query1->withWhereHas('course', function($query2) use ($date) {
                    $query2->where([
                        ['publish_start', '<=', $date],
                        ['publish_end', '>=', $date],
                    ])
                    ->withWhereHas('orders', function($query3) use ($date) {
                        $query3->where([
                            ['user_id', Auth::user()->id],
                            ['is_active', StatusActive::ACTIVE],
                            ['payment', StatusPayment::PAID],
                        ]);
                    });               
                 }
                );
            })
            ->firstOrFail();
            $comment = new Comment();
            $comment->user_id = Auth::user()->id;
            $comment->lesson_id = $lessonId;
            $comment->type = 2;
            $comment->seen = 0;
            $comment->content = $request->comment;

            if ($comment->save()) {
                DB::commit();
                return response()->json('OK', FlashType::OK);
            }
            
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json('Error', FlashType::NOT_FOUND);
            
        }
    }
}
