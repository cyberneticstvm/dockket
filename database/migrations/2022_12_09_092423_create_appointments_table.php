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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name', 50)->nullable();
            $table->string('mobile', 10)->nullable();
            $table->unsignedBigInteger('branch')->references('id')->on('branches')->default(0);
            $table->unsignedBigInteger('spec')->references('id')->on('specializations')->default(0);
            $table->unsignedBigInteger('doctor_id');
            $table->date('appointment_date')->nullable();
            $table->time('appointment_time')->nullable();
            $table->integer('slot')->default(0);
            $table->integer('token')->default(0);
            $table->unsignedBigInteger('created_by')->default(0)->comments('0-patient, >0-doctor/admin');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
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
        Schema::dropIfExists('appointments');
    }
};
