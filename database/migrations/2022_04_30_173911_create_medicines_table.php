<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table)
        {
            $table->id();
            $table->string("name");
            $table->tinyInteger("unit");
            $table->string("generic");
            $table->decimal("price", 10, 3);
            $table->string("description", 255)->nullable();
            $table->decimal("unit_price", 10, 3)->virtualAs("price/unit");
            $table->foreignId("user_id")->constrained("users")->onUpdate('cascade')->onDelete('cascade');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicines');
    }
}
