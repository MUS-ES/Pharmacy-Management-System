<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table)
        {
            $table->id();
            $table->decimal("total", 11, 3);
            $table->decimal('paid', 10, 3)->default(0);
            $table->decimal('rest', 10, 3)->virtualAs("total-paid");
            $table->foreignId("supplier_id")->nullable()->constrained("suppliers")->onUpdate('cascade')->onDelete('set null');
            $table->foreignId("payment_id")->constrained("payments")->onUpdate('cascade')->onDelete('cascade');;
            $table->foreignId("user_id")->constrained("users")->onUpdate('cascade')->onDelete('cascade');
            $table->date("date");
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
        Schema::dropIfExists('purchases');
    }
}
