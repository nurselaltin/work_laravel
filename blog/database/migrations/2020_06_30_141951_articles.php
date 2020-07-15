<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Articles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('category_id');
            $table->string('title');
            $table->string('image');
            $table->longText('content');
            $table->integer('view')->default(0);
            $table->integer('state')->default(0)->comment('0 ; pasif, 1; aktif');
            $table->string('slug');
            $table->softDeletes();
            $table->timestamps();

            /*
             categories tablosunun id değerini articles tablosundaki category_id ile bağla ve kontrol et
            $table->foreign('category_id')
                ->references('id')
                ->on('categories');
            */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Articles');
    }
}
