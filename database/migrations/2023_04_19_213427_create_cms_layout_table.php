<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cms_layout', function (Blueprint $table) {
            $table->id();
            //Banner
            $table->text('banner_1')->nullable();
            $table->text('banner_2')->nullable();
            $table->text('banner_3')->nullable();
            //Giới thiệu
            $table->text('image_gt')->nullable();
            $table->text('title_gt')->nullable();
            $table->text('content_gt')->nullable();
            //Url mạng xã hội
            $table->text('link_fb')->nullable();
            $table->text('link_zl')->nullable();
            $table->text('link_tw')->nullable();
            $table->text('link_ins')->nullable();
            $table->text('link_lkin')->nullable();
            $table->text('link_ytb')->nullable();
            $table->text('link_google')->nullable();
            $table->text('link_tiktok')->nullable();
            //Khóa học
            $table->text('content_kh')->nullable();
            //Hướng dẫn
            $table->text('content_hd')->nullable();
            $table->text('banner_hd')->nullable();
            $table->text('link_hd')->nullable();
            $table->text('video_hd_1')->nullable();
            $table->text('video_hd_2')->nullable();
            //Cảm nhận
            $table->text('link_nx')->nullable();
            $table->text('video_nx_1')->nullable();
            $table->text('video_nx_2')->nullable();
            //Comment
            $table->text('avt_nx_1')->nullable();
            $table->string('name_nx_1')->nullable();
            $table->string('office_nx_1')->nullable();
            $table->text('content_nx_1')->nullable();
            $table->text('avt_nx_2')->nullable();
            $table->string('name_nx_2')->nullable();
            $table->string('office_nx_2')->nullable();
            $table->text('content_nx_2')->nullable();
            $table->text('avt_nx_3')->nullable();
            $table->string('name_nx_3')->nullable();
            $table->string('office_nx_3')->nullable();
            $table->text('content_nx_3')->nullable();
            $table->text('avt_nx_4')->nullable();
            $table->string('name_nx_4')->nullable();
            $table->string('office_nx_4')->nullable();
            $table->text('content_nx_4')->nullable();
            //Banner giữa
            $table->text('banner_4')->nullable();
            $table->text('banner_5')->nullable();
            //Footer
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms_layout');
    }
};
