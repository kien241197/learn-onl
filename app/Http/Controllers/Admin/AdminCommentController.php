<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Reply;
use App\Enums\FlashType;
use Illuminate\Http\Request;
use DB;

class AdminCommentController extends Controller
{
    public function index(Request $request)
    {
        $title = "Bình luận bài học";
        // $sizeLimit = $request->limit ? $request->limit : 20;
        // $comments = Comment::where(
        //  function($query) use ($search) {
        //     if($search) {
        //      return $query->where('name', 'LIKE', "%".$search."%");
        //     }
        //   })
        // ->with(['user','lesson'])
        // ->orderBy('created_at', 'DESC')
        // ->paginate($sizeLimit);
        return view('admin.comment.index', [
            'title' => $title,
        ]);
    }
}
