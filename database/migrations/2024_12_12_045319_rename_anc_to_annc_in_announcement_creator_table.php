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
        Schema::table('announcement_creator', function (Blueprint $table) {
            $table->renameColumn('anc_id', 'annc_id');
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('announcement_creator', function (Blueprint $table) {
            //
            $table->renameColumn('annc_id', 'anc_id');
        });
    }
};
