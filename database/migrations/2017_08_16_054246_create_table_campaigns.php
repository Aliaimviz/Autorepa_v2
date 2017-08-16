<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCampaigns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('campaignes', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('garage_id')->unsigned();
        $table->string('title',100);
        $table->text('desc');
        $table->string('tasks');
        $table->float('price');
        $table->string('duration',100);
        $table->string('validity',100);
        $table->integer('status_id')->unsigned();
        $table->timestamps();

        
        $table->foreign('garage_id')->references('id')->on('garages')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::dropIfExists('campaignes');
    }
}
