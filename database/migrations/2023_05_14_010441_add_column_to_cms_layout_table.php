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
        Schema::table('cms_layout', function (Blueprint $table) {
            $table->text('icon_teacher')->nullable();
            $table->text('image_teacher')->nullable();
            $table->text('link_banner_4')->nullable();
            $table->text('link_banner_5')->nullable();
            $table->longText('content_chinh_sach')->nullable();
            $table->longText('content_dieu_khoan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cms_layout', function (Blueprint $table) {
            $table->dropColumn('icon_teacher');
            $table->dropColumn('image_teacher');
            $table->dropColumn('link_banner_4');
            $table->dropColumn('link_banner_5');
            $table->dropColumn('content_chinh_sach');
            $table->dropColumn('content_dieu_khoan');
        });
    }
};
