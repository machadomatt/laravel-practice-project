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
            $table->increments('id');
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('excerpt');
            $table->string('image')->nullable();
            $table->integer('reading_time');
            $table->text('content');
            $table->unsignedInteger('author');
            $table->unsignedInteger('category');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();

            $table->foreign('category')->references('id')->on('categories');
            $table->foreign('author')->references('id')->on('users')->onDelete('cascade');
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
