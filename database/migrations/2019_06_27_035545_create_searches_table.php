<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSearchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('searches', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('access')->default(false);

            $table->unsignedBigInteger('doctor_id')->index();
            $table->foreign('doctor_id')
                ->references('id')
                ->on('doctors');

            $table->unsignedBigInteger('clinical_id')->index()->nullable();
            $table->foreign('clinical_id')
                ->references('id')
                ->on('clinics');

            $table->unsignedBigInteger('specialty_id')->index();
            $table->foreign('specialty_id')
                ->references('id')
                ->on('specialties');

            $table->unsignedBigInteger('city_id')->index();
            $table->foreign('city_id')
                ->references('id')
                ->on('cities');

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
        Schema::dropIfExists('searches');
    }
}
