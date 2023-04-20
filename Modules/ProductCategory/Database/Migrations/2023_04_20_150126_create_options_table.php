<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\ProductCategory\Entities\Product;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class)->constrained()->cascadeOnDelete();
            $table->string('name')->nullable();
            $table->enum('visual', ['text', 'color', 'image'])->default('text');
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
        Schema::dropIfExists('options');
    }
}
