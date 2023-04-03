<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Enums\FlashType;
use Illuminate\Http\Request;
use DB;

class AdminOrderController extends Controller
{
    public function index(Request $request)
    {
        $title = "Thống kê lượt mua";
        $orders = Order::with(['user','course'])
        ->orderBy('created_at', 'DESC')->get();
        return view('admin.order.index', [
            'title' => $title,
            'orders' => $orders
        ]);
    }
}
