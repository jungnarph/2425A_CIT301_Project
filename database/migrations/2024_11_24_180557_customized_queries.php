<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::statement("
            CREATE TRIGGER before_insert_user
            BEFORE INSERT ON users
            FOR EACH ROW
            BEGIN
                IF NEW.usertype = 'superadmin' AND 
                   (SELECT COUNT(*) FROM users WHERE usertype = 'superadmin') > 0 THEN
                    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Only one superadmin is allowed';
                END IF;
            END
        ");
    }

    /**
     * Reverse the migrations.
     * 
     * @return void
     */
    public function down()
    {
        DB::statement("DROP TRIGGER IF EXISTS before_insert_user");
    }
};
