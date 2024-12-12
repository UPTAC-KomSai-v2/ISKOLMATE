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
        Schema::table('annc_visibility', function (Blueprint $table) {
            //
            $table->renameColumn('id', 'annc_id');
            $table->renameColumn('uid', 'u_id');
        });
        Schema::table('act_visibility', function (Blueprint $table) {
            $table->renameColumn('uid', 'u_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('annc_visibility', function (Blueprint $table) {
            //
            $table->renameColumn('annc_id', 'id');
            $table->renameColumn('u_id', 'uid');
        });
        Schema::table('act_visibility', function (Blueprint $table) {
            $table->renameColumn('u_id', 'uid');
        });
    }
};
