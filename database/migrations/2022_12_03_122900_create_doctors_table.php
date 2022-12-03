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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->references('id')->on('users')->unique();
            $table->string('doctor_id', 8)->unique();
            $table->string('mobile', 10)->unique();
            $table->date('dob')->nullable();
            $table->text('communication_address')->nullable();
            $table->string('com_city', 25)->nullable();
            $table->string('com_state', 25)->nullable();
            $table->text('consultation_address')->nullable();
            $table->string('con_city', 25)->nullable();
            $table->string('con_state', 25)->nullable();
            $table->double('con_latitude')->nullable();
            $table->double('con_longitude')->nullable();
            $table->unsignedBigInteger('branch')->references('id')->on('branches');
            $table->unsignedBigInteger('spec')->references('id')->on('specializations');
            $table->string('designation', 50)->nullable();
            $table->string('photo')->nullable();
            $table->string('ceritificate')->nullable();
            $table->char('status')->default('P')->comments('A-approved, P-Pending, R-Rejected');
            $table->unsignedBigInteger('status_updated_by')->references('id')->on('users')->default(0);
            $table->text('status_updated_reason')->nullable();
            $table->dateTime('status_updated_at')->nullable();
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
        Schema::dropIfExists('doctors');
    }
};
