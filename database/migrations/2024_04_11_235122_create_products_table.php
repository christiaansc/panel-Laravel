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
            $table->id();
            $table->string('name')->nullable(false);
            $table->integer('stock');
            $table->decimal('price', 8, 2)->nullable(false);

            $table->string('description')->nullable();
            $table->boolean('status')->default(1);

            $table->unsignedBigInteger('categoryId');
            $table->foreign('categoryId')->references('id')->on('categories');

            $table->integer('user_created')->nullable();
            $table->integer('user_deleted')->nullable();
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
