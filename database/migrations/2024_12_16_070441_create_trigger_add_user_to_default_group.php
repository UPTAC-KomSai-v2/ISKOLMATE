<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration {

    public function up(): void
    {
        DB::unprepared('
        CREATE TRIGGER tr_user_default_group_role AFTER INSERT ON `users` FOR EACH ROW
            BEGIN
                INSERT INTO user_group (u_id, g_id) 
                VALUES (NEW.id, NEW.role);
            END
        ');
    }

    public function down(): void
    {
        DB::unprepared('DROP TRIGGER tr_user_default_group_role');
    }
};