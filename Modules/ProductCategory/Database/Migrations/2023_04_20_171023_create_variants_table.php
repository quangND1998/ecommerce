<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\ProductCategory\Entities\Attribute;
use Modules\ProductCategory\Entities\AttributeValue;
use Modules\ProductCategory\Entities\Options;
use Modules\ProductCategory\Entities\OptionValue;
use Modules\ProductCategory\Entities\Product;
use Modules\ProductCategory\Entities\Sku;

class CreateVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variants', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class)->constrained();
            $table->foreignIdFor(Sku::class, 'sku_id')->constrained();
            $table->foreignIdFor(Options::class)->constrained();
            $table->foreignIdFor(OptionValue::class)->constrained();
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
        Schema::dropIfExists('variants');
    }
}
