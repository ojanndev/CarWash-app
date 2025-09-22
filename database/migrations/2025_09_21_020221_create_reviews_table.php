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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('booking_id');
            $table->unsignedBigInteger('service_id')->nullable();
            $table->unsignedBigInteger('worker_id')->nullable();
            $table->tinyInteger('rating'); // 1-5 stars
            $table->text('review')->nullable();
            $table->string('title')->nullable();
            $table->boolean('is_approved')->default(false);
            $table->timestamps();
            
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('set null');
            $table->foreign('worker_id')->references('id')->on('workers')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
