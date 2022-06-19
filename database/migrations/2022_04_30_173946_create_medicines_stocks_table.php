<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines_stocks', function (Blueprint $table)
        {
            $table->id();
            $table->foreignId("medicine_id")->constrained("medicines")->onUpdate('cascade')->onDelete('cascade');
            $table->date("mfd");
            $table->date("exp");
            $table->bigInteger("qty");
            $table->foreignId("supplier_id")->nullable()->constrained("suppliers")->onUpdate('cascade')->onDelete('set null');
            $table->foreignId("user_id")->constrained("users")->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('medicines_stocks');
    }
}
