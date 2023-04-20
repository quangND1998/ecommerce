<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->nullable();
            $table->text('sub_title')->nullable();
            $table->string('slug')->nullable();
            $table->longText('description')->nullable();
            $table->string('url')->nullable();
            $table->boolean('state')->nullable()->default(true);
            $table->boolean('outstanding')->nullable()->default(false);
            $table->string('image')->nullable();
            $table->dateTime('post_time')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
