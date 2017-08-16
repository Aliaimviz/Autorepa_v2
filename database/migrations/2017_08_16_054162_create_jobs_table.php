<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned(); //foreign key
            $table->integer('job_type_id')->unsigned(); //foreign key
            $table->integer('job_off_id')->nullable(); //foreign key
            $table->string('job_title'); 
            $table->text('job_desc');
            $table->string('address');
            $table->string('car_brand'); //string
            $table->integer('car_model');
            $table->string('pics');
            $table->float('budget');
            $table->date('expiry_date');
            $table->string('payment_status')->nullable();
            $table->integer('status_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('job_type_id')->references('id')->on('job_types')->onDelete('cascade')->onUpdate('cascade');              
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
        Schema::dropIfExists('jobs');
    }
}
