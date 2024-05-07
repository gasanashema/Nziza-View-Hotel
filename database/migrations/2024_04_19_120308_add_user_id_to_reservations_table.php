<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up():void
    {
        Schema::table('reservations', function (Blueprint $table) {
            // Add the user_id column as an unsigned integer
            $table->unsignedBigInteger('user_id')->after('id')->nullable();

            // Add a foreign key constraint
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down():void
    {
        Schema::table('reservations', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['user_id']);

            // Remove the column
            $table->dropColumn('user_id');
        });
    }
};
