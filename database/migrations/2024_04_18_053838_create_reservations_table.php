<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id'); 
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->unsignedBigInteger('room_id'); 
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->string('check_in_date');
            $table->string('check_out_date');
            $table->decimal('price', 10, 2);
            $table->string('status')->default(0);//0 for pending, 1 for active, 2 for completed or ended
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
