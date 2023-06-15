<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
use App\Enums\UserRole;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // nếu user đã đăng nhập
        if (Auth::check())
        {
            $user = Auth::user();
            // nếu level = 1 thì cho qua.
            // if ($user->level == UserRole::USER)
            // {
                return $next($request);
            // }
            // else
            // {
            //     Auth::logout();
            //     return redirect()->route('getLogin')->with('status', 'Tài khoản không có quyền hạn');;
            // }
        } else {
            return redirect('login');
        }
    }
}
