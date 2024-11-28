<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('OrderId'); // Primary key
            $table->unsignedBigInteger('UserId'); // Foreign key
            $table->dateTime('OrderDate');
            $table->decimal('TotalPrice', 10, 2);
            $table->timestamps();

            $table->foreign('UserId')->references('UserId')->on('user_profiles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
