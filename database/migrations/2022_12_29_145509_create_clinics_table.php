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
        Schema::create('clinics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->references('id')->on('users')->unique();
            $table->string('mobile', 10)->unique();
            $table->text('address')->nullable();
            $table->string('city', 25)->nullable();
            $table->string('state', 25)->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->char('status')->default('P')->comments('A-approved, P-Pending, R-Rejected');
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
};
