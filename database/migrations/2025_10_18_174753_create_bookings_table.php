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
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ticket_id'); // ID of the ticket
            $table->string('user_name'); // Name of the user
            $table->string('email'); // User's email
            $table->unsignedBigInteger('event_id'); // ID of the event
            $table->string('ticket_type'); // Type of the ticket (e.g., VIP, Regular, etc.)
            $table->decimal('price', 10, 2); // Price of the ticket
            $table->enum('payment_status', ['pending', 'completed', 'failed', 'refunded']); // Payment status
            $table->string('coupen_code')->nullable(); // Coupon code used (nullable)
            $table->timestamps();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
