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
            $table->increments('id');
            $table->text('title');
            $table->string('slug');
            $table->text('text');
            $table->string('wp_id')->nullable();
            $table->text('wp_post_name')->nullable();
            $table->datetime('publish_date');
            $table->boolean('published')->default(false);
            $table->boolean('tweet_sent')->default(false);
            $table->boolean('posted_on_medium')->default(false);
            $table->boolean('original_content')->default(false);
            $table->string('external_url')->nullable();
            $table->string('author')->default('MYO HAN HTET');
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
