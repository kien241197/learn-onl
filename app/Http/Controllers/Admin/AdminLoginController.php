<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;

class AdminLoginController extends Controller
{
    public function getLogin()
    {
            return view('admin.login');
        if (Auth::check()) {
            // nếu đăng nhập thàng công thì 
            return redirect('admin');
        } else {
        }

    }
}
