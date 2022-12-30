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
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name', 50)->nullable();
            $table->string('mobile', 10)->nullable();
            $table->unsignedBigInteger('clinic_id')->references('id')->on('clinic')->default(0);
            $table->unsignedBigInteger('service_id')->references('id')->on('specializations')->default(0);
            $table->date('service_date')->nullable();
            $table->text('notes')->nullable();
            $table->char('status')->default('P')->comments('P-Pending, C-Closed');
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
        Schema::dropIfExists('service_requests');
    }
};
