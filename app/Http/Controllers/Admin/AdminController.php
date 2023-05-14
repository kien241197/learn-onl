<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Course;
use App\Models\User;
use App\Models\CmsLayout;
use App\Enums\FlashType;
use File;
use Storage;

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
        $layout = CmsLayout::first();
        //Logo
        if ($request->logo) {
            if ($layout->logo != "" && File::exists(public_path($layout->logo))) {
                unlink(public_path($layout->logo));
            }
            $logoName = time() . '.' . $request->logo->extension();
            $layout->logo =  "storage/images/" . $logoName;
            $request->file('logo')->storeAs('images', $logoName, 'public');
        }
        //Banner top
        if ($request->banner_1) {
            if ($layout->banner_1 != "" && File::exists(public_path($layout->banner_1))) {
                unlink(public_path($layout->banner_1));
            }
            $bannerName1 = time() . '.' . $request->banner_1->extension();
            $layout->banner_1 =  "storage/images/" . $bannerName1;
            $request->file('banner_1')->storeAs('images', $bannerName1, 'public');
        }
        if ($request->banner_2) {
            if ($layout->banner_2 != "" && File::exists(public_path($layout->banner_2))) {
                unlink(public_path($layout->banner_2));
            }
            $bannerName2 = time() . '.' . $request->banner_2->extension();
            $layout->banner_2 =  "storage/images/" . $bannerName2;
            $request->file('banner_2')->storeAs('images', $bannerName2, 'public');
        }
        if ($request->banner_3) {
            if ($layout->banner_3 != "" && File::exists(public_path($layout->banner_3))) {
                unlink(public_path($layout->banner_3));
            }
            $bannerName3 = time() . '.' . $request->banner_3->extension();
            $layout->banner_3 =  "storage/images/" . $bannerName3;
            $request->file('banner_3')->storeAs('images', $bannerName3, 'public');
        }
        //Giới thiệu
        if ($request->image_gt) {
            if ($layout->image_gt != "" && File::exists(public_path($layout->image_gt))) {
                unlink(public_path($layout->image_gt));
            }
            $imageGt = time() . '.' . $request->image_gt->extension();
            $layout->image_gt =  "storage/images/" . $imageGt;
            $request->file('image_gt')->storeAs('images', $imageGt, 'public');
        }
        if (isset($request->title_gt)) {
            $layout->title_gt = $request->title_gt;
        }
        if (isset($request->content_gt)) {
            $layout->content_gt = $request->content_gt;
        }
        //link
        if (isset($request->link_fb)) {
            $layout->link_fb = $request->link_fb;
        }
        if (isset($request->link_zl)) {
            $layout->link_zl = $request->link_zl;
        }
        if (isset($request->link_tw)) {
            $layout->link_tw = $request->link_tw;
        }
        if (isset($request->link_ins)) {
            $layout->link_ins = $request->link_ins;
        }
        if (isset($request->link_lkin)) {
            $layout->link_lkin = $request->link_lkin;
        }
        if (isset($request->link_ytb)) {
            $layout->link_ytb = $request->link_ytb;
        }
        if (isset($request->link_google)) {
            $layout->link_google = $request->link_google;
        }
        if (isset($request->link_tiktok)) {
            $layout->link_tiktok = $request->link_tiktok;
        }
        //Giới thiệu khóa học
        if (isset($request->content_kh)) {
            $layout->content_kh = $request->content_kh;
        }
        //Hướng dẫn
        if (isset($request->content_hd)) {
            $layout->content_hd = $request->content_hd;
        }
        if ($request->banner_hd) {
            if ($layout->banner_hd != "" && File::exists(public_path($layout->banner_hd))) {
                unlink(public_path($layout->banner_hd));
            }
            $bannerNameHD = time() . '.' . $request->banner_hd->extension();
            $layout->banner_hd =  "storage/images/" . $bannerNameHD;
            $request->file('banner_hd')->storeAs('images', $bannerNameHD, 'public');
        }
        if (isset($request->link_hd)) {
            $layout->link_hd = $request->link_hd;
        }
        if (isset($request->video_hd_1)) {
            $layout->video_hd_1 = $request->video_hd_1;
        }
        if (isset($request->video_hd_2)) {
            $layout->video_hd_2 = $request->video_hd_2;
        }
        // Nhận xét
        if (isset($request->link_nx)) {
            $layout->link_nx = $request->link_nx;
        }
        if (isset($request->video_nx_1)) {
            $layout->video_nx_1 = $request->video_nx_1;
        }
        if (isset($request->video_nx_2)) {
            $layout->video_nx_2 = $request->video_nx_2;
        }
        if ($request->avt_nx_1) {
            if ($layout->avt_nx_1 != "" && File::exists(public_path($layout->avt_nx_1))) {
                unlink(public_path($layout->avt_nx_1));
            }
            $avtNx1 = time() . '.' . $request->avt_nx_1->extension();
            $layout->avt_nx_1 =  "storage/images/" . $avtNx1;
            $request->file('avt_nx_1')->storeAs('images', $avtNx1, 'public');
        }
        if ($request->avt_nx_2) {
            if ($layout->avt_nx_2 != "" && File::exists(public_path($layout->avt_nx_2))) {
                unlink(public_path($layout->avt_nx_2));
            }
            $avtNx2 = time() . '.' . $request->avt_nx_2->extension();
            $layout->avt_nx_2 =  "storage/images/" . $avtNx2;
            $request->file('avt_nx_2')->storeAs('images', $avtNx2, 'public');
        }
        if ($request->avt_nx_3) {
            if ($layout->avt_nx_3 != "" && File::exists(public_path($layout->avt_nx_3))) {
                unlink(public_path($layout->avt_nx_3));
            }
            $avtNx3 = time() . '.' . $request->avt_nx_3->extension();
            $layout->avt_nx_3 =  "storage/images/" . $avtNx3;
            $request->file('avt_nx_3')->storeAs('images', $avtNx3, 'public');
        }
        if ($request->avt_nx_4) {
            if ($layout->avt_nx_4 != "" && File::exists(public_path($layout->avt_nx_4))) {
                unlink(public_path($layout->avt_nx_4));
            }
            $avtNx4 = time() . '.' . $request->avt_nx_4->extension();
            $layout->avt_nx_4 =  "storage/images/" . $avtNx4;
            $request->file('avt_nx_4')->storeAs('images', $avtNx4, 'public');
        }
        if (isset($request->name_nx_1)) {
            $layout->name_nx_1 = $request->name_nx_1;
        }
        if (isset($request->name_nx_2)) {
            $layout->name_nx_2 = $request->name_nx_2;
        }
        if (isset($request->name_nx_3)) {
            $layout->name_nx_3 = $request->name_nx_3;
        }
        if (isset($request->name_nx_4)) {
            $layout->name_nx_4 = $request->name_nx_4;
        }
        if (isset($request->office_nx_1)) {
            $layout->office_nx_1 = $request->office_nx_1;
        }
        if (isset($request->office_nx_2)) {
            $layout->office_nx_2 = $request->office_nx_2;
        }
        if (isset($request->office_nx_3)) {
            $layout->office_nx_3 = $request->office_nx_3;
        }
        if (isset($request->office_nx_4)) {
            $layout->office_nx_4 = $request->office_nx_4;
        }
        if (isset($request->content_nx_1)) {
            $layout->content_nx_1 = $request->content_nx_1;
        }
        if (isset($request->content_nx_2)) {
            $layout->content_nx_2 = $request->content_nx_2;
        }
        if (isset($request->content_nx_3)) {
            $layout->content_nx_3 = $request->content_nx_3;
        }
        if (isset($request->content_nx_4)) {
            $layout->content_nx_4 = $request->content_nx_4;
        }
        //Banner giữa
        if ($request->banner_4) {
            if ($layout->banner_4 != "" && File::exists(public_path($layout->banner_4))) {
                unlink(public_path($layout->banner_4));
            }
            $banner4 = time() . '.' . $request->banner_4->extension();
            $layout->banner_4 =  "storage/images/" . $banner4;
            $request->file('banner_4')->storeAs('images', $banner4, 'public');
        }
        if (isset($request->link_banner_4)) {
            $layout->link_banner_4 = $request->link_banner_4;
        }
        if ($request->banner_5) {
            if ($layout->banner_5 != "" && File::exists(public_path($layout->banner_5))) {
                unlink(public_path($layout->banner_5));
            }
            $banner5 = time() . '.' . $request->banner_5->extension();
            $layout->banner_5 =  "storage/images/" . $banner5;
            $request->file('banner_5')->storeAs('images', $banner5, 'public');
        }
        if (isset($request->link_banner_5)) {
            $layout->link_banner_5 = $request->link_banner_5;
        }
        //Thông tin liên lạc
        if (isset($request->address)) {
            $layout->address = $request->address;
        }
        if (isset($request->email)) {
            $layout->email = $request->email;
        }
        if (isset($request->phone)) {
            $layout->phone = $request->phone;
        }
        if (isset($request->code)) {
            $layout->code = $request->code;
        }
        if ($request->image_login) {
            if ($layout->image_login != "" && File::exists(public_path($layout->image_login))) {
                unlink(public_path($layout->image_login));
            }
            $imageLogin = time() . '.' . $request->image_login->extension();
            $layout->image_login =  "storage/images/" . $imageLogin;
            $request->file('image_login')->storeAs('images', $imageLogin, 'public');
        }
        if ($request->icon_teacher) {
            if ($layout->icon_teacher != "" && File::exists(public_path($layout->icon_teacher))) {
                unlink(public_path($layout->icon_teacher));
            }
            $iconTeacher = time() . '.' . $request->icon_teacher->extension();
            $layout->icon_teacher =  "storage/images/" . $iconTeacher;
            $request->file('icon_teacher')->storeAs('images', $iconTeacher, 'public');
        }
        if ($request->image_teacher) {
            if ($layout->image_teacher != "" && File::exists(public_path($layout->image_teacher))) {
                unlink(public_path($layout->image_teacher));
            }
            $imageTeacher = time() . '.' . $request->image_teacher->extension();
            $layout->image_teacher =  "storage/images/" . $imageTeacher;
            $request->file('image_teacher')->storeAs('images', $imageTeacher, 'public');
        }

        if ($layout->save()) {
            $this->setFlash(__('Thay đổi thành công!'), FlashType::Success);
        } else {
            $this->setFlash(__('Thất bại, hãy thử lại!'), FlashType::Error);
        }
        return redirect()->back();
    }

    public function infoPageOther()
    {
        $title = "Điều khoản / Chính sách";
        $layout = CmsLayout::first();
        return view('admin.custom-info-other', [
            'title' => $title,
            'layout' => $layout
        ]);
    }

    public function infoPageOtherUpdate(Request $request)
    {
        $layout = CmsLayout::first();
        if (isset($request->content_dieu_khoan)) {
            $layout->content_dieu_khoan = $request->content_dieu_khoan;
        }
        if (isset($request->content_chinh_sach)) {
            $layout->content_chinh_sach = $request->content_chinh_sach;
        }
        if ($layout->save()) {
            $this->setFlash(__('Thay đổi thành công!'), FlashType::Success);
        } else {
            $this->setFlash(__('Thất bại, hãy thử lại!'), FlashType::Error);
        }
        return redirect()->back();
    }
}
