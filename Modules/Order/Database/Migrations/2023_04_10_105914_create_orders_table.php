<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique()->nullable();
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customer_orders');

            $table->enum('status', ['pending', 'packing', 'shipping', 'completed', 'refund', 'decline'])->default('pending');

            $table->unsignedInteger('item_count')->nullable();

            $table->boolean('payment_status')->default(0);
            $table->bigInteger('payment_method')->nullable();
            // gia tam thoi
            $table->decimal('grand_total', 20)->nullable();
            // triết khấu
            $table->integer('discount')->default(0)->nullable();

            //phí ship
            $table->integer('shipping_fee')->nullable();
            //giá phải trả 
            $table->integer('last_price')->nullable();


            $table->string('name')->nullable();
            $table->text('specific_address')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('wards')->nullable();
            // $table->string('post_code')->nullable();
            $table->string('phone_number')->nullable();
            $table->text('notes')->nullable();
            $table->text('reason')->nullable();




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
        Schema::dropIfExists('orders');
    }
}
