<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->string('name');
            $table->float('price', 8 ,2);
            $table->longText('descripcion');
            $table->string('imagen', 255);
            $table->string('cantidad', 255);
            $table->string('referencia', 255);
            $table->string('imagen2', 255);
            $table->integer('shipping', 11);
            $table->string('visibility', 255);
            $table->string('sex', 255);
            $table->string('price2');
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
        //
    }
}
