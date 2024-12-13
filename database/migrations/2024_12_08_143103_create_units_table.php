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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->enum('type_unit', ['summer_unit', 'hotel_rooms']);
            $table->string('name');
            $table->string('city');
            $table->string('compound');
            $table->string(column: 'location')->nullable();
            $table->string('no_unit')->nullable();
            $table->string('float');
            $table->boolean('elevator');
            $table->bigInteger('distance_between_beach_and_unit');
            $table->enum('distance_between_beach_unit',['foot', 'car']);
            $table->bigInteger('distance_between_pool_and_unit');
            $table->enum('distance_between_pool_unit', ['foot', 'car']);
            $table->json('Room_amenities');
            $table->date('available_booking_date');
            $table->text('policies_roles');
            $table->enum('type_booking', ['direct_booking', 'send_request']);
            $table->decimal('price', 10 ,2);
            $table->decimal('insurance_amount', 10 ,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
