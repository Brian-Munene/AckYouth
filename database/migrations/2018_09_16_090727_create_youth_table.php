<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYouthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('youth', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('national_id')->unique();
            $table->integer('church_reg_number');
            $table->string('firstname');
            $table->string('secondname');
            $table->string('surname');
            $table->date('date_of_birth');
            $table->integer('phone_number')->unique();
            $table->string('email')->unique();
            $table->string('occupation');
            $table->string('organization_name');
            $table->string('school');
            $table->string('course');
            $table->integer('year');
            $table->string('hbc');
            $table->string('location');
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
        Schema::dropIfExists('youth');
    }
}
