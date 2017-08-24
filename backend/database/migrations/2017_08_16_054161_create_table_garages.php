<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGarages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('garages', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('user_id')->unsigned();
        $table->integer('city_id')->unsigned();
        $table->string('name', 100);
        $table->string('email', 50);
        $table->text('description')->nullable();
        $table->bigInteger('phone');
        $table->string('address', 100);
        $table->string('postal', 10);
        $table->string('pic', 150)->nullable();
        $table->timestamps();

        
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::dropIfExists('garages');
    }
}
