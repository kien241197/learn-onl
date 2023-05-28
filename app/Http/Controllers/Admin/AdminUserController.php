<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\LimitDevice;
use App\Enums\FlashType;
use App\Enums\UserRole;
use App\Enums\StatusPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use DB;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Danh sách thành viên";
        $sizeLimit = $request->limit ? $request->limit : 20;
        $search = $request->search ? $request->search : null;
        $users = User::where(
         function($query) use ($search) {
            if($search) {
             return $query->where('name', 'LIKE', "%".$search."%")
             ->orWhere('user_name', 'LIKE', "%".$search."%")
             ->orWhere('phone', 'LIKE', "%".$search."%");
            }
          })
        ->where('level', UserRole::USER)
        ->with([
            'orders' => function($query) {
                $query->where('payment', StatusPayment::PAID);
            },
            'orders.course'
        ])
        ->orderBy('created_at', 'DESC')
        ->paginate($sizeLimit);
        return view('admin.user.index', [
            'title' => $title,
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Thêm thành viên";
        return view('admin.user.add', [
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
                'email' => ['required', Rule::unique('users')],
                'name' => ['required'],
                'password' => ['required'],
            ],
            [
                'user_name.unique' => 'Tên đăng nhập này đã được sử dụng',
                'email.unique' => 'Email này đã được sử dụng',
            ]
        );
        $user = new User();
        DB::begintransaction();
        try {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->note = $request->note;
            $user->password = Hash::make($request->password);
            $user->level = UserRole::USER;
            if ($user->save()) {
                DB::commit();
                $this->setFlash(__('Đăng ký thành công!'), FlashType::Success, route('admin.users.index'));
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
        $user = User::where('id', $id)->firstOrFail();
        $title = "Thông tin CTV";
        return view('admin.user.detail', [
            'title' => $title,
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $title = "Sửa thông tin thành viên";
        return view('admin.user.edit', [
            'title' => $title,
            'user' => $user
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
                'phone' => ['required'],
            ],
            [
                
            ]
        );
        $user = User::where('id', $id)->firstOrFail();
        $title = "Sửa thông tin thành viên";
        DB::begintransaction();
        try {
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->note = $request->note;
            if($request->password) {
                $user->password = Hash::make($request->password);
            }
            if ($user->save()) {
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
        return view('admin.user.edit', [
            'title' => $title,
            'user' => $user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();

        $user = User::where([
            ['id', $id],
        ]);

        if ($user->delete()) {
            DB::commit();
            return response()->json('Xóa thành viên thành công!', FlashType::OK);
        }
        DB::rollBack();
        return response()->json('Đã có lỗi xảy ra!', FlashType::NOT_FOUND);
    }

    public function resetLimit(string $id)
    {
        $user = LimitDevice::where('user_id', $id);
        if ($user->delete()) {
            return response()->json('Reset thành công!', FlashType::OK);
        }
        return response()->json('Đã có lỗi xảy ra, thử lại!', FlashType::NOT_FOUND);
    }
}
