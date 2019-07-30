<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDynamicPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dynamic_pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('page_name');
            $table->longText('page_content');
            $table->text('header_image')->nullable();
            $table->string('slug')->nullable();
            $table->boolean('page_status')->default(1);
            $table->boolean('show_on_navbasr')->default(1);
            $table->boolean('show_on_footer')->default(1);
            $table->string('meta_title')->nullable();
            $table->string('meta_tags')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dynamic_pages');
    }
}
