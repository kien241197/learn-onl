<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminLoginRequest;
use Auth;
use App\User;

class AdminLoginController extends Controller
{
    public function getLogin()
    {
        if (Auth::check()) {
            // nếu đăng nhập thàng công thì 
            return redirect('admin');
        } else {
            return view('admin.login');
        }

    }

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function postLogin(AdminLoginRequest $request)
    {
        $loginEmail = [
            'email' => $request->txtUsername,
            'password' => $request->txtPassword,
        ];
        if (Auth::attempt($loginEmail)) {
            return redirect('admin');
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
        return redirect()->route('admin.getLogin');
    }
}
