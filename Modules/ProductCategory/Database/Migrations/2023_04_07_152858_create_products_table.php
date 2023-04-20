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
            $table->id();
            $table->string('name')->nullable()->unique();
            $table->string('slug')->nullable()->unique();
            $table->longText('description')->nullable();
            $table->string('SKU')->nullable();
            $table->boolean('status')->default(true)->nullable();
            $table->boolean('active')->default(true)->nullable();
            $table->boolean('auto_sold')->default(true)->nullable();
            $table->bigInteger('quantity_sold')->default(0)->nullable();;
            $table->bigInteger('quantity_sold_auto')->default(0)->nullable();;
            $table->bigInteger('star')->default(0)->nullable();
            $table->bigInteger('price')->default(0)->nullable();
            $table->decimal('sale_price', 8, 2)->nullable();
            $table->bigInteger('cost')->default(0)->nullable();
            $table->boolean('outstanding')->default(true)->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
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
