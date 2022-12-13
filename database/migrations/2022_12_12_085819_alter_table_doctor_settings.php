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
        Schema::table('doctor_settings', function(Blueprint $table){
            $table->time('break_start_time')->default('00:00:00')->after('appointment_end_time');
            $table->time('break_end_time')->default('00:00:00')->after('break_start_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctor_settings', function(Blueprint $table){
            $table->dropColumn('break_start_time');
            $table->dropColumn('break_end_time');
        });
    }
};
