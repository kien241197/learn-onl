<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Enums\FlashType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;

class AdminTagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Danh sách Thẻ";
        $sizeLimit = $request->limit ? $request->limit : 20;
        $search = $request->search ? $request->search : null;
        $tags = Tag::where(
         function($query) use ($search) {
            if($search) {
             return $query->where('tag_name', 'LIKE', "%".$search."%");
            }
          })
        ->orderBy('created_at', 'DESC')
        ->paginate($sizeLimit);
        return view('admin.tag.index', [
            'title' => $title,
            'tags' => $tags
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Thêm Thẻ";
        return view('admin.tag.add', [
            'title' => $title
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'tag_name' => ['required', Rule::unique('tags')],
            ],
            [
                'tag_name.unique' => 'Thẻ này đã được sử dụng',
            ]
        );
        $tag = new Tag();
        DB::begintransaction();
        try {
            $tag->tag_name = $request->tag_name;
            if ($tag->save()) {
                DB::commit();
                $this->setFlash(__('Đăng ký thành công!'), FlashType::Success, route('admin.tags.index'));
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
        $tag = Tag::where('id', $id)->firstOrFail();
        $title = "Thông tin thẻ";
        return view('admin.tag.detail', [
            'title' => $title,
            'tag' => $tag
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tag = Tag::where('id', $id)->firstOrFail();
        $title = "Sửa thông tin thẻ";
        return view('admin.tag.edit', [
            'title' => $title,
            'tag' => $tag
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,
            [
                'tag_name' => ['required'],
            ],
            [
                
            ]
        );
        $tag = Tag::where('id', $id)->firstOrFail();
        $title = "Sửa thông tin Thẻ";
        DB::begintransaction();
        try {
            $tag->tag_name = $request->tag_name;
            if ($tag->save()) {
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
        return view('admin.tag.edit', [
            'title' => $title,
            'tag' => $tag
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();

        $tag = Tag::where([
            ['id', $id],
        ]);

        if ($tag->delete()) {
            DB::commit();
            return response()->json('Xóa Thẻ thành công!', FlashType::OK);
        }
        DB::rollBack();
        return response()->json('Đã có lỗi xảy ra!', FlashType::NOT_FOUND);
    }
}
