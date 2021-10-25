<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->foreign('sub_category_id')->nullable()->references('id')->on('sub_categories');
            $table->string('code','50')->unique();
            $table->string('name','50');
            $table->boolean('fetcher')->default(false);
            $table->boolean('latest')->default(false);
            $table->boolean('stock')->default(false);
            $table->integer('asking')->nullable();
            $table->integer('selling')->nullable();
            $table->string('size','100')->nullable();
            $table->string('color','100')->nullable();
            $table->longText('description');
            $table->string('photo1','50');
            $table->string('photo2','50')->nullable();
            $table->string('photo3','50')->nullable();
            $table->boolean('status')->default(false);
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
