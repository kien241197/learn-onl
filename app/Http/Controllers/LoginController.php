<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Models\LimitDevice;
use App\Enums\UserRole;
use Jenssegers\Agent\Agent;
use Auth;
use DB;
use Cart;

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
        $agent = new Agent();
        $type = 1; //Smartphone
        if($agent->isTablet()) {
            $type = 2;
        }        
        if($agent->isDesktop()) {
            $type = 3;
        }
        $login = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $newToken = '';
        if (Auth::attempt($login)) {
            $find = LimitDevice::where([
                ['user_id', Auth::user()->id],
                ['device_type', $type],
            ])->first();
            if(!$find) {
                $newToken = hash('sha256', $type . date('YmdHis') . Auth::user()->id);
                $limit = new LimitDevice();
                $limit->user_id = Auth::user()->id;
                $limit->device_type = $type;
                $limit->device_token = $newToken;
                $limit->save();
            } else if($find->device_token != $request->limit_token) {
                Auth::logout();
                return redirect()->back()->with('status', 'Giới hạn thiết bị đăng nhập');
            }
            return redirect('/')->with('tokenLimit', $newToken);
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
        Cart::destroy();
        Auth::logout();
        return redirect()->route('home');
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
            $user->phone = $request->phone;
            $user->company = $request->company;
            $user->address = $request->address;
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
