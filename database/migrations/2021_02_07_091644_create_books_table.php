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
            $table->id();
            $table->foreignId('users_id')->constrained()->onDelete('cascade');
            $table->boolean('active')->default(false);
            $table->timestamp('active_at')->nullable();
            $table->string('title');
            $table->text('description');
            $table->string('file');
            $table->double('price', 8, 2)->unsigned()->default(0);
            $table->bigInteger('price_discount')->unsigned()->default(0);
            $table->timestamps();
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
