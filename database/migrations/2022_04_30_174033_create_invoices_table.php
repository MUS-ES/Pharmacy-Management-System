<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table)
        {
            $table->id();
            $table->decimal('total', 10, 3)->default(0);
            $table->decimal('total_discount', 10, 3)->default(0);
            $table->decimal('total_net', 10, 3)->default(0);
            $table->decimal('paid', 10, 3)->default(0);
            $table->decimal('rest', 10, 3)->default(0)->virtualAs("total-(total_discount+paid)");
            $table->foreignId('customer_id')->nullable();
            $table->foreignId('user_id');
            $table->foreignId('payment_id');
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
        Schema::dropIfExists('invoices');
    }
}
