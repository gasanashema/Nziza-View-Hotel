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
       Schema::create('room_categories', function (Blueprint $table) {
            $table->id();
            $table->string('category_title');
            $table->string('detail');
            $table->decimal('price_per_night', 10, 2); // Decimal datatype with precision of 10 and scale of 2
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_categories');
    }
};
