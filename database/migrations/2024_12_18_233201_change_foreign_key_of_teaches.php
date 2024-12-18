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
        Schema::dropIfExists('teaches');

        Schema::create('teaches', function (Blueprint $table) {
            $table->foreignId('g_id')->references('group_id')->on('groups');
            $table->foreignId('ins_id')->references('id')->on('users');
        });

        Schema::dropIfExists('takes');
        Schema::dropIfExists('sections');
        Schema::dropIfExists('courses');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id('course_id');
            $table->string('course_name', length:50);
        });

        Schema::create('sections', function (Blueprint $table) {
            $table->foreignId('c_id')->references('course_id')->on('courses');
            $table->id();
            $table->foreignId('t_id')->references('timeblock_id')->on('timeblocks');
        });

        Schema::create('takes', function (Blueprint $table) {
            $table->foreignId('sec_id')->references('id')->on('sections');
            $table->foreignId('stu_id')->references('id')->on('users');
        });

        Schema::dropIfExists('teaches');

        Schema::create('teaches', function (Blueprint $table) {
            $table->foreignId('sec_id')->references('id')->on('sections');
            $table->foreignId('ins_id')->references('id')->on('users');
        });
    }
};
