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
        Schema::table('users', function(Blueprint $table){
            $table->char('user_type', 1)->default('D')->after('remember_token')->comments('D-Doctor, A-Admin');
            $table->char('user_status', 1)->default('A')->after('user_type')->comments('A-Active, I-Inactive');            
            $table->unsignedBigInteger('user_status_updated_by')->references('id')->on('users')->default(0)->after('user_status');
            $table->text('user_status_updated_reason')->nullable()->after('user_status_updated_by');
            $table->dateTime('user_status_updated_at')->nullable()->after('user_status_updated_reason');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table){
            $table->dropcolumn('user_type');
            $table->dropcolumn('user_status');
            $table->dropcolumn('user_status_updated_by');
            $table->dropcolumn('user_status_updated_reason');
            $table->dropcolumn('user_status_updated_at');
        });
    }
};
