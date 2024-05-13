<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            // Check if the column exists before dropping to avoid errors
            if (Schema::hasColumn('reservations', 'status')) {
                $table->dropColumn('status');
            }
        });
    }

    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            // You can define the reverse operation if needed
            // For example, if you want to add the 'status' column back
            // This is optional and depends on your specific needs
        });
    }
};
