<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('author_id')->unsigned();
            $table->integer('review_id')->unsigned();
            $table->integer('report_id')->unsigned();
            $table->boolean('active')->default(false);
            $table->timestamp('active_at')->nullable();
            $table->string('title');
            $table->text('description');
            $table->string('file');
            $table->double('price', 8, 2)->unsigned();
            $table->bigInteger('price_discount')->unsigned();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('review_id')->references('id')->on('reviews');
            $table->index('active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
