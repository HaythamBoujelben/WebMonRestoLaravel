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
    Schema::create('carts', function (Blueprint $table) {
        $table->id('CartId'); // Primary Key
        $table->unsignedBigInteger('UserId'); // Foreign Key (use unsignedBigInteger)
        $table->timestamps();

        $table->foreign('UserId')->references('UserId')->on('user_profiles')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
