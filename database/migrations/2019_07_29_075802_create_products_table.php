<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_type')->nullable();
            $table->string('category_id');
            $table->string('manufacture')->nullable();
            $table->string('flash_sale');
            $table->string('special')->nullable();
            $table->string('product_name');
            $table->longText('product_description');
            $table->text('left_banner_image')->nullable();
            $table->text('right_banner_image')->nullable();
            $table->string('tax_class')->nullable();
            $table->double('product_price');
            $table->double('sell_price')->nullable();
            $table->integer('min_order_limit')->nullable()->default(1);
            $table->integer('max_order_limit')->nullable();
            $table->text('product_weight');
            $table->text('product_image');
            $table->string('isFeature')->default('no');
            $table->string('status')->default('yes');
            $table->double('quantity');
            $table->boolean('available')->default(1);
            $table->string('meta_title');
            $table->text('meta_keywords');
            $table->text('meta_description');
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
        Schema::dropIfExists('products');
    }
}
