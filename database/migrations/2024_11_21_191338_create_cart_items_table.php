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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id('CartItemId'); // Primary Key
            $table->unsignedBigInteger('CartId'); // Foreign Key
            $table->unsignedBigInteger('ArticleId'); // Foreign Key
            $table->integer('Quantity');
            $table->decimal('Price', 10, 2);
            $table->timestamps();

            $table->foreign('CartId')->references('CartId')->on('carts')->onDelete('cascade');
            $table->foreign('ArticleId')->references('ArticleId')->on('articles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
