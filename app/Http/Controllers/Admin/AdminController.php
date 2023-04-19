<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Course;
use App\Models\User;
use App\Models\CmsLayout;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Trang chủ";
        $countOrder = Order::all()->count();
        $countCourse = Course::all()->count();
        $countUser = User::where('level', 1)->count();
        $countContact = Contact::all()->count();
        return view('admin.home', [
            'title' => $title,
            'countOrder' => $countOrder,
            'countCourse' => $countCourse,
            'countUser' => $countUser,
            'countContact' => $countContact,
        ]);
    }

    public function infoPage()
    {
        $title = "Tùy chỉnh giao diện";
        $layout = CmsLayout::first();
        return view('admin.custom-info', [
            'title' => $title,
            'layout' => $layout
        ]);
    }

    public function infoPageUpdate(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
