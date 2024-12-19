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
        Schema::dropIfExists('annc_visibility');
        Schema::dropIfExists('act_visibility');

        Schema::create('annc_visibility', function (Blueprint $table) {
            $table->foreignId('annc_id')->references('id')->on('announcements');
            $table->foreignId('g_id')->references('group_id')->on('groups');
        });

        Schema::create('act_visibility', function (Blueprint $table) {
            $table->foreignId('act_id')->references('id')->on('activities');
            $table->foreignId('g_id')->references('group_id')->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annc_visibility');
        Schema::dropIfExists('act_visibility');

        Schema::create('annc_visibility', function (Blueprint $table) {
            $table->foreignId('annc_id')->references('id')->on('announcements');
            $table->foreignId('u_id')->references('id')->on('users');
        });

        Schema::create('act_visibility', function (Blueprint $table) {
            $table->foreignId('act_id')->references('id')->on('activities');
            $table->foreignId('u_id')->references('id')->on('users');
        });
    }
};
