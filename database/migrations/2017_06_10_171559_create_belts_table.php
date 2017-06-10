<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeltsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('belts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('colorname');
            $table->string('colorcode');
            $table->integer('gradenumber');
            $table->string('gradename');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('belts');
    }
}
