<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('phone');
            $table->string('email');
            $table->string('buyer_name');
            $table->string('amount');
            $table->string('status');
            $table->string('sms_status');
            $table->string('email_status');
            $table->unsignedBigInteger('payments_id')->nullable();
            $table->text('customer_id')->nullable();
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
        Schema::dropIfExists('payment');
    }
}
