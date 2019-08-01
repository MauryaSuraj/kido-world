<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_outs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('cart_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->text('address');
            $table->text('nearby');
            $table->integer('pincode');
            $table->string('city');
            $table->string('area');
            $table->string('state');
            $table->integer('quantity')->nullable();
            $table->float('product_price')->nullable();
            $table->text('cart_created_at')->nullable();
            $table->float('discount')->nullable();
            $table->float('subtotal')->nullable();
            $table->float('grandtotal')->nullable();
            $table->float('delivery_charge')->nullable();
            $table->boolean('cart_status')->default(0);
            $table->boolean('pay_status')->default(0);
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
        Schema::dropIfExists('check_outs');
    }
}
