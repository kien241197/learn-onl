<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Lesson;
use App\Models\Reply;
use App\Enums\FlashType;
use Illuminate\Http\Request;
use DB;

class AdminCommentController extends Controller
{
    public function index(Request $request)
    {
        $title = "Bình luận bài học";
        $sizeLimit = $request->limit ? $request->limit : 20;
        $search = $request->search ? $request->search : null;
        $lessons = Lesson::where(
         function($query) use ($search) {
            if($search) {
             return $query->where('name', 'LIKE', "%".$search."%");
            }
          })
        ->whereHas('comments')
        ->withWhereHas('chapter.course')
        ->with([
            'comments' => function($query) {
                $query->whereHas('user');
            }
        ])
        ->withCount(['comments' => function($query) {
            $query->where('seen', 0);
        }])
        ->orderBy('comments_count', 'DESC')
        ->paginate($sizeLimit);
        return view('admin.comment.index', [
            'title' => $title,
            'lessons' => $lessons
        ]);
    }

    public function show(Request $request, $id)
    {
        $title = "Bình luận bài học";
        $lesson = Lesson::where('id', $id)
        ->whereHas('comments')
        ->withWhereHas('chapter.course')
        ->with([
            'comments' => function($query) {
                $query->whereHas('user')->orderBy('created_at', 'DESC');
            },
            'comments.replies',
            'comments.user',
        ])->firstOrFail();
        $ids = $lesson->comments->where('seen', 0)->pluck('id')->toArray();
        // dd($ids);
        // Comment::whereIn('id', $ids)->update(['seen'=> 1]);
        return view('admin.comment.detail', [
            'title' => $title,
            'lesson' => $lesson
        ]);
    }

    public function reply(Request $request, $id)
    {
        $this->validate($request,
            [
                'content' => ['required'],
            ],
            [
                // 'name.required' => 'Tên đăng nhập này đã được sử dụng',
                // 'email.unique' => 'Email này đã được sử dụng',
            ]
        );
        DB::begintransaction();
        try {
            $reply = new Reply();
            $reply->comment_id = $id;
            $reply->content = $request->content;
            if ($reply->save()) {
                DB::commit();
                $this->setFlash(__('Bình luận thành công!'), FlashType::Success);
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
}
