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
        Schema::table('lessons', function (Blueprint $table) {
            $table->tinyInteger('status_render_video')->default(0)->comment('0 - new | 1 - success | 2 - runing render | 3 - render fail');
        });
        Schema::table('cms_layout', function (Blueprint $table) {
            $table->string('default_phoneNumber_watermark')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->dropColumn('status_render_video');
        });
        Schema::table('cms_layout', function (Blueprint $table) {
            $table->dropColumn('default_phoneNumber_watermark');
        });
    }
};
