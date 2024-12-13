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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('number_of_rooms')->default(0);
            $table->bigInteger('number_of_beds')->default(0);
            $table->bigInteger('bed_width')->default(0);
            $table->json('Room_amenities');
            $table->bigInteger('number_of_bathroom')->default(0);
            $table->json('reception');
            $table->json('content_kitchen');
            $table->foreignId('unit_id')->constrained('units')->onDelete('cascade');
            $table->foreignId('sale_id')->constrained('sales')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
