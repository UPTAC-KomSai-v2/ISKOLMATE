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
        Schema::table('user_group', function (Blueprint $table) {
            $table->primary(['u_id', 'g_id']);
        });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('user_group', function (Blueprint $table) {
            $table->index('u_id', 'user_group_u_id_foreign');
            $table->dropPrimary(['u_id', 'g_id']);
        });
    }
};
