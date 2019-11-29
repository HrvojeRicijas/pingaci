<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string("title");
            $table->text("body")->nullable();
            $table->string("filePath")->nullable();
            $table->unsignedBigInteger("user_id");
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
        });
        Schema::create('post-user', function (Blueprint $table){
           $table->bigIncrements('id');
           $table->bigIncrements('post_id');
           $table->bigIncrements('user_id');
           $table->timestamps();

           $table->unique('article_id', 'user_id');
           $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
           $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');



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
