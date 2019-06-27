<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->longText('speech')->nullable();

            $table->unsignedBigInteger('specialty_id')->index();
            $table->foreign('specialty_id')
                ->references('id')
                ->on('specialties');

            $table->timestamps();
        });

        Schema::create('doctor_language', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('doctor_id')->index();
            $table->foreign('doctor_id')
                ->references('id')
                ->on('doctors');

            $table->unsignedBigInteger('language_id')->index();
            $table->foreign('language_id')
                ->references('id')
                ->on('languages');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
        Schema::dropIfExists('doctor_language');
    }
}
