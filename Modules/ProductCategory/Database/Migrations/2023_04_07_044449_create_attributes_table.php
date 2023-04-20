<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->bigInteger('idNo')->nullable();
            $table->boolean('state')->nullable()->default(true);
            $table->unsignedBigInteger('category_product_id')->nullable();
            $table->foreign('category_product_id')->references('id')->on('category_products')->onDelete('cascade');
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
        Schema::dropIfExists('attributes');
    }
}
