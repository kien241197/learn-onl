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
        Schema::table('courses', function (Blueprint $table) {
            $table->string('star')->nullable();
            $table->string('slug')->nullable();
            $table->string('star_number')->nullable();
            $table->string('people_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('star');
            $table->dropColumn('star_number');
            $table->dropColumn('people_number');
        });
    }
};
