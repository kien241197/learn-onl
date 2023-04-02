<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Enums\UserRole;
use Auth;
use DB;

class LoginController extends Controller
{
    public function getLogin()
    {
        if (Auth::check()) {
            // nếu đăng nhập thàng công thì 
            return redirect('/');
        } else {
            return view('login');
        }

    }

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function postLogin(LoginRequest $request)
    {
        $login = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($login)) {
            return redirect('/');
        } else {
            return redirect()->back()->with('status', 'Thông tin đăng nhập không chính xác');
        }
    }

    /**
     * action admincp/logout
     * @return RedirectResponse
     */
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('getLogin');
    }

    public function getRegister()
    {
        return view('register');
    }

    public function postRegister(RegisterRequest $request)
    {
        $user = new User();
        DB::begintransaction();
        try {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->level = UserRole::USER;
            if ($user->save()) {
                DB::commit();
                return redirect()->back()->with('status', 'Đăng ký thành công');
            } else {
                DB::rollBack();
                return redirect()->back()->with('status', 'Thất bại, hãy thử lại');
            }
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('status', 'Đã có lỗi xảy ra!');
        }      
    }
}
