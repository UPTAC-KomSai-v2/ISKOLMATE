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
        /* drop unused tables, then drop columns, set password length and add availability */
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('email');
            $table->dropColumn('email_verified_at');
            $table->dropRememberToken();
            $table->dropTimestamps();
            $table->string('name', length:50)->change(); 
            $table->string('password', length:60)->change(); 
            $table->string('program', length:20);
            $table->boolean('availability');
            $table->string('role', length:20);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
            $table->dropColumn('availability');
            $table->dropColumn('program');
            $table->string('password')->change();
            $table->timestamps();
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('email')->unique();
        });
    }
};
