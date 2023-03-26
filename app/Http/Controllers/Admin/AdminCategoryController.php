<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Enums\FlashType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Danh sách thể loại";
        $sizeLimit = $request->limit ? $request->limit : 20;
        $search = $request->search ? $request->search : null;
        $categories = Category::where(
         function($query) use ($search) {
            if($search) {
             return $query->where('name', 'LIKE', "%".$search."%");
            }
          })
        ->orderBy('created_at', 'DESC')
        ->paginate($sizeLimit);
        return view('admin.category.index', [
            'title' => $title,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Thêm thể loại";
        return view('admin.category.add', [
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
                'name' => ['required', Rule::unique('categories')->whereNull('deleted_at')],
            ],
            [
                'name.unique' => 'Thể loại này đã được sử dụng',
            ]
        );
        $category = new Category();
        DB::begintransaction();
        try {
            $category->name = $request->name;
            $category->note = $request->note;
            if ($category->save()) {
                DB::commit();
                $this->setFlash(__('Đăng ký thành công!'), FlashType::Success, route('admin.categories.index'));
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
        $category = Category::where('id', $id)->firstOrFail();
        $title = "Thông tin thể loại";
        return view('admin.category.detail', [
            'title' => $title,
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::where('id', $id)->firstOrFail();
        $title = "Sửa thông tin thể loại";
        return view('admin.category.edit', [
            'title' => $title,
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,
            [
                'name' => ['required'],
            ],
            [
                
            ]
        );
        $category = Category::where('id', $id)->firstOrFail();
        $title = "Sửa thông tin thể loại";
        DB::begintransaction();
        try {
            $category->name = $request->name;
            $category->note = $request->note;
            if ($category->save()) {
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
        return view('admin.category.edit', [
            'title' => $title,
            'category' => $category
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();

        $category = Category::where([
            ['id', $id],
        ]);

        if ($category->delete()) {
            DB::commit();
            return response()->json('Xóa thể loại thành công!', FlashType::OK);
        }
        DB::rollBack();
        return response()->json('Đã có lỗi xảy ra!', FlashType::NOT_FOUND);
    }
}
