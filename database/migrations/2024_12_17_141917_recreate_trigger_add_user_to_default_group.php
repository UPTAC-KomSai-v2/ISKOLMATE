<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS tr_user_default_group_role');
        DB::unprepared("
        CREATE TRIGGER after_user_insert
        AFTER INSERT ON `users` FOR EACH ROW
            BEGIN
                IF NEW.role = 'Student' then
                    INSERT INTO user_group (u_id, g_id) 
                    VALUES (NEW.id, 1);
                ELSEIF NEW.role = 'Teacher' then insert into user_group (u_id, g_id) values (NEW.id, 2); 
                END IF;
            END
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS after_user_insert');
        DB::unprepared('
        CREATE TRIGGER tr_user_default_group_role AFTER INSERT ON `users` FOR EACH ROW
            BEGIN
                INSERT INTO user_group (u_id, g_id) 
                VALUES (NEW.id, NEW.role);
            END
        ');
    }
};
