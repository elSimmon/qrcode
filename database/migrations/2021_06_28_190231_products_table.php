<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function(Blueprint $table){
          $table->id();
          $table->integer('user_id');
          $table->string('name');
          $table->double('price');
          $table->integer('quantity');
          $table->string('qrcode')->unique();
          $table->string('imagepath');
          $table->date('expirydate');
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
