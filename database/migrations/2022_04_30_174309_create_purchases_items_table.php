<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases_items', function (Blueprint $table)
        {
            $table->id();
            $table->foreignId("medicine_id")->constrained("medicines")->onUpdate('cascade')->onDelete('cascade');;
            $table->bigInteger("qty");
            $table->decimal("unit_price", 10, 3);
            $table->foreignId("purchase_id")->constrained("purchases")->onUpdate('cascade')->onDelete('cascade');;
            $table->date("mfd");
            $table->date("exp");
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
        Schema::dropIfExists('purchases_items');
    }
}
