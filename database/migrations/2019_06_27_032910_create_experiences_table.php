<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->boolean('study');

            $table->string('name');
            $table->longText('description')->nullable();

            $table->date('from');
            $table->date('to')->nullable();

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
        Schema::dropIfExists('experiences');
    }
}
