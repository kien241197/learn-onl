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
            $table->text('link_banner_1')->after('banner_1')->nullable();
            $table->text('link_banner_2')->after('banner_2')->nullable();
            $table->text('link_banner_3')->after('banner_3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cms_layout', function (Blueprint $table) {
            $table->dropColumn('link_banner_1');
            $table->dropColumn('link_banner_2');
            $table->dropColumn('link_banner_3');
        });
    }
};
