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
        Schema::create('doctor_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id')->references('id')->on('doctors')->unique();
            $table->decimal('fee', 7, 2)->default(0);
            $table->integer('slots')->default(0);
            $table->integer('time_per_appointment')->default(15);
            $table->time('appointment_start_time')->default('06:00:00');
            $table->time('appointment_end_time')->default('23:30:00');
            $table->integer('appointment_open_days')->default(0);
            $table->boolean('available_for_appointment')->default(1);
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
        Schema::dropIfExists('doctor_settings');
    }
};
