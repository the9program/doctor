<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinics', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->longText('speech')->nullable();

            $table->unsignedBigInteger('address_id')->index();
            $table->foreign('address_id')
                ->references('id')
                ->on('addresses');

            $table->timestamps();
        });

        Schema::create('clinical_doctor', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('clinical_id')->index();
            $table->foreign('clinical_id')
                ->references('id')
                ->on('clinics');

            $table->unsignedBigInteger('doctor_id')->index();
            $table->foreign('doctor_id')
                ->references('id')
                ->on('doctors');

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
        Schema::dropIfExists('clinics');
    }
}
