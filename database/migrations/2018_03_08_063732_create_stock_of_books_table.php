<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockOfBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_of_books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul_buku')->index();
            $table->foreign('judul_buku')->references('judul_buku')->on('book_lists')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('nomor_rak');
            $table->integer('jumlah_buku');
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
        Schema::dropIfExists('stock_of_books');
    }
}
