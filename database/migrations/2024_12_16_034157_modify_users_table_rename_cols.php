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
        //
        Schema::table('users', function(Blueprint $table) {
            $table->renameColumn('name', 'first_name');
            $table->renameColumn('program', 'affiliation');
            $table->dropColumn('availability');
            $table->after('first_name', function(Blueprint $table) {
                $table->string('last_name');
            });
            $table->after('password', function(Blueprint $table) {
                $table->bigInteger('role')->change();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('users', function(Blueprint $table) {
            $table->string('role', length:20)->change();
            $table->dropColumn('last_name');
            $table->boolean('availability');
            $table->renameColumn('affiliation', 'program');
            $table->renameColumn('first_name', 'name');
        });
    }
};
