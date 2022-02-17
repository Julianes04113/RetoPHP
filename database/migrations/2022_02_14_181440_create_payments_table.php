<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{

    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('amount');
            $table->timestamp('payed_at')->nullable();
            $table->bigInteger('order_id')->unsigned();
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
