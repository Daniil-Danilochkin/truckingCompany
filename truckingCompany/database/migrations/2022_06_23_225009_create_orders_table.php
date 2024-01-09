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
        Schema::create('orders', function (Blueprint $table) {
            $table->integer('number');
            $table->integer('shipmentPoint');
            $table->integer('destinationPoint');
            $table->string('car');
            $table->integer('driver');
            $table->integer('operator');
            $table->integer('customer');
            $table->date('dateReceiptOrder');
            $table->date('dateTo');
            $table->date('dateReceive');
            $table->date('dateIssue');
            $table->string('status');
            $table->integer('cost');
            $table->integer('weight');
            $table->string('description');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
