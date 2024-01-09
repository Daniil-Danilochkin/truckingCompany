<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stuffs', function (Blueprint $table) {
            $table->id();
            $table->string('surname');
            $table->string('name');
            $table->string('patronumic');
            $table->string('phone');
            $table->string('phone2');
            $table->string('position');
            $table->integer('salary');
            $table->string('insuranceNumber');
            $table->date('birthDate');
            $table->date('dateStartWork');
            $table->date('dateStopWork');
            $table->string('passport');
            $table->string('driverLicense');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stuffs');
    }
};
