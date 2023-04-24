<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Course;
use App\Models\Category;
use App\Models\User;
use App\Models\Bill;
use App\Models\Order;
use App\Models\Contact;
use App\Models\Lesson;
use App\Enums\StatusPayment;
use App\Enums\FlashType;
use Carbon\Carbon;
use Auth;
use Cart;
use Mail;
use DB;
use App\Mail\ActiveMail;
use App\Mail\ReportMail;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $title = "Trang chủ";
        $date = Carbon::now()->format('Y-m-d H:i:s');
        $courses = Course::with(['category'])
        ->where([
            ['publish_start', '<=', $date],
            ['publish_end', '>=', $date],
        ])
        ->orderBy('created_at', 'DESC')->get();
        $categories = Category::with(
            ['courses' => function ($query) use ($date) {
                $query->where([
                    ['courses.publish_start', '<=', $date],
                    ['courses.publish_end', '>=', $date],
                ]);
            }]
        )
        ->orderBy('created_at')->get();

        return view('index', [
            'title' => $title,
            'courses' => $courses,
            'categories' => $categories
        ]);
    }

    public function huongDan(Request $request)
    {
        $title = "Hướng dẫn làm việc";

        return view('huong-dan', [
            'title' => $title
        ]);
    }

    public function courseList(Request $request)
    {
        $title = "Khóa học";
        $date = Carbon::now()->format('Y-m-d H:i:s');
        $courses = Course::with(['category'])
        ->where([
            ['publish_start', '<=', $date],
            ['publish_end', '>=', $date],
        ])
        ->orderBy('created_at', 'DESC')->get();
        $categories = Category::with(
            ['courses' => function ($query) use ($date) {
                $query->where([
                    ['courses.publish_start', '<=', $date],
                    ['courses.publish_end', '>=', $date],
                ]);
            }]
        )
        ->orderBy('created_at')->get();

        return view('khoa-hoc', [
            'title' => $title,
            'courses' => $courses,
            'categories' => $categories
        ]);
    }

    public function single(Request $request, $id)
    {
        $title = "Chi tiết khóa học";

        $date = Carbon::now()->format('Y-m-d H:i:s');
        $course = Course::with(['category', 'chapters.lessons'])
        ->where([
            ['publish_start', '<=', $date],
            ['publish_end', '>=', $date],
            ['id', '=', $id]
        ])
        ->firstOrFail();
        $courses = Course::where([
            ['publish_start', '<=', $date],
            ['publish_end', '>=', $date],
            ['id', '!=', $id],
            ['category_id', '=', $course->category_id],
        ])
        ->inRandomOrder()->take(3)->get();
        $countLesson =  $course->chapters->sum(function($query){
            return $query->lessons->count();
        });
        return view('single', [
            'title' => $title,
            'course' => $course,
            'courses' => $courses,
            'countLesson' => $countLesson
        ]);
    }

    public function info(Request $request)
    {
        $title = "Thông tin cá nhân";

        $date = Carbon::now()->format('Y-m-d H:i:s');
        $user = User::with([
            'orders' => function($query) use ($date) {
                $query->where('payment', StatusPayment::PAID)->orderBy('created_at', 'DESC');
            },
             'orders.course.chapters.lessons'
        ])
        ->where([
            ['id', '=', Auth::user()->id]
        ])
        ->firstOrFail();
        return view('user', [
            'title' => $title,
            'user' => $user,
        ]);
    }

    public function cart(Request $request)
    {
        $title = "Giỏ hàng";
        $products = Cart::content();

        return view('cart', [
            'title' => $title,
            'products' => $products
        ]);
    }

    public function addCart(Request $request, $id)
    {
        try {
            $course = Course::where('id', $id)->firstOrFail();
            Cart::add($course->id, $course->name, 1, $course->price_sale, ['image' => $course->image_url]);
            return response()->json('OK', FlashType::OK);
        } catch (Exception $e) {
            return response()->json('Error', FlashType::NOT_FOUND);
        }
    }

    public function delCart(Request $request, $id)
    {
        try {
            Cart::remove($id);
            return response()->json('OK', FlashType::OK);
        } catch (Exception $e) {
            return response()->json('Error', FlashType::NOT_FOUND);
        }
    }

    public function buyCourse(Request $request, $id)
    {
        try {
            $course = Course::where('id', $id)->firstOrFail();
            Cart::destroy();
            Cart::add($course->id, $course->name, 1, $course->price_sale, ['image' => $course->image_url]);
            return response()->json('OK', FlashType::OK);
        } catch (Exception $e) {
            return response()->json('Error', FlashType::NOT_FOUND);
        }
    }

    public function checkout(Request $request)
    {
        $title = "Giỏ hàng";
        $products = Cart::content();

        return view('checkout', [
            'title' => $title,
            'products' => $products
        ]);
    }

    public function payment(Request $request)
    {
        $bill = new Bill();
        $bill->save();
        $arrInsert = [];
        foreach(Cart::content() as $item) {
            $arrInsert[] = [
                'bill_id' => $bill->id,
                'user_id' => Auth::user()->id,
                'course_id' => $item->id,
                'is_active' => 0,
                'payment' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        Order::insert($arrInsert);
        session(['url_prev' => url()->previous()]);
        $vnp_TmnCode = env('VNP_CODE', 'TNBOLWEB'); //Mã website tại VNPAY 
        $vnp_HashSecret = env('VNP_SECRET', 'RWGUOTXADAUONOZOFPPHCWWNOVCDXNQN'); //Chuỗi bí mật
        $vnp_Url = env('VNP_URL', 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html');
        $vnp_Returnurl = url('/callback-vnpay');
        $vnp_TxnRef = $bill->id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Mua khoa hoc TNB";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = ((int)str_replace(',', '', \Cart::subtotal(0))) * 100;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = $request->ip();
        $startTime = date("YmdHis");
        $expire = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => "other",
            // "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate"=>$expire
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
           // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            // $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);
    }

    public function cbVnpay(Request $request)
    {
        $url = session('url_prev','/');
        session()->forget('url_prev');
        if($request->vnp_ResponseCode == "00") {

            Bill::where('id', $request->vnp_TxnRef)
               ->update([
                   'payment' => 1
                ]);
            $orders = Order::where('bill_id', $request->vnp_TxnRef)->with(['course'])->get();
            foreach($orders as $order) {
                $order->payment = 1;
                $order->code_active = hash('sha256', $order->id . date('YmdHis') . $order->user_id);
                $order->updated_at = Carbon::now();
                $order->save();

                //send mail
                $mailData = [
                    'title' => 'KÍCH HOẠT KHÓA HỌC',
                    'course' => $order->course,
                    'code' => $order->code_active
                ];
                 
                Mail::to(Auth::user()->email)->send(new ActiveMail($mailData));
            }
            Cart::destroy();
            $this->setFlash(__('Thanh toán thành công!'), FlashType::Success);
            return redirect($url)->with('success' ,$request->vnp_TransactionStatus);
        }
        Bill::where('id', $request->vnp_TxnRef)
           ->delete();
        Order::where('bill_id', $request->vnp_TxnRef)
           ->delete();
        $this->setFlash(__($request->vnp_TransactionStatus), FlashType::Error);
        return redirect($url)->with('error' ,$request->vnp_TransactionStatus);        
    }

    public function activeCourse($code)
    {
        $find = Order::where([
            ['code_active', $code],
        ])->firstOrFail();
        $find->is_active = 1;
        $find->date_active = Carbon::now();
        $find->save();
        return view('active-success');
    }

    public function changeInfo(Request $request)
    {
        $this->validate($request,
            [
                'name' => ['required'],
                'password' => ['required','regex:/[A-Za-z]/', 'regex:/[0-9]/', 'min:6'],
                'old_password' => ['required', 'current_password'],
            ],
            [
                'password.required' => 'Nhập mật khẩu mới',
                'old_password.required' => 'Nhập mật khẩu hiện tại',
                'old_password.current_password' => 'Mật khẩu hiện tại không khớp',
                'password.regex' => 'Mật khẩu bao gồm chữ và số',
                'password.min' => 'Mật khẩu tối thiểu 6 ký tự',
                'name.required' => 'Nhập tên',
            ]
        );
        DB::begintransaction();
        try {
            $user = User::where('id', Auth::user()->id)->first();
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->company = $request->company;
            $user->address = $request->address;
            $user->password = Hash::make($request->password);
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
        return redirect()->back();
    }

    public function singnUpConsultation(Request $request)
    {
        $this->validate($request,
            [
                'email' => ['required', 'email'],
            ]
        );
        DB::begintransaction();
        try {
            $contact = new Contact();
            $contact->email = $request->email;
            if (isset($request->name)) {
                $contact->name = $request->name;
            }
            if (isset($request->phone)) {
                $contact->phone = $request->phone;
            }
            if (isset($request->address)) {
                $contact->address = $request->address;
            }
            if (isset($request->content)) {
                $contact->content = $request->content;
            }
            if ($contact->save()) {
                DB::commit();
                $this->setFlash(__('Đăng ký thành công!'), FlashType::Success);
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

    public function reportVideo($id)
    {
        try {
            $lesson = Lesson::where('id', $id)->with(['chapter.course'])->firstOrFail();
            // dd($lesson);
            //send mail
            $mailData = [
                'title' => 'BÁO LỖI BÀI HỌC',
                'lesson' => $lesson
            ];
             
            Mail::to('kien241197@gmail.com')->send(new ReportMail($mailData));
            return response()->json('OK', FlashType::OK);
        } catch (Exception $e) {
            return response()->json('Error', FlashType::NOT_FOUND);
        }
        return response()->json('Error', FlashType::NOT_FOUND);
    }
}
