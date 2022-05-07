<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddTriggers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::unprepared("
        CREATE TRIGGER IF NOT EXISTS invoices_after_insert AFTER INSERT ON invoices FOR EACH ROW
        BEGIN
        SELECT COUNT(*) INTO @IS_CHEST_EXIST FROM chests WHERE chests.user_id=NEW.user_id;
        IF @IS_CHEST_EXIST=0 THEN
        INSERT INTO chests VALUES(NULL,0,NEW.user_id,CURRENT_DATE(),CURRENT_DATE());
        END IF;
        UPDATE chests SET chests.total=chests.total+NEW.total WHERE chests.user_id=NEW.user_id;
        END");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
