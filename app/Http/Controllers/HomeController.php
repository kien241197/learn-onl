<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use App\Models\User;
use App\Enums\StatusPayment;
use Carbon\Carbon;
use Auth;

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

        return view('cart', [
            'title' => $title,
        ]);
    }

    public function checkout(Request $request)
    {
        $title = "Giỏ hàng";

        return view('checkout', [
            'title' => $title,
        ]);
    }
}
