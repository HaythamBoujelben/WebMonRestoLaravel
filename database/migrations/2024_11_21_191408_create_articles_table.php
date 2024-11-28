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
        Schema::create('articles', function (Blueprint $table) {
            $table->id('ArticleId'); // Primary Key
            $table->string('Name');
            $table->decimal('Price', 10, 2);
            $table->unsignedBigInteger('CategoryId'); // Foreign Key
            $table->unsignedBigInteger('MenuId'); // Foreign Key
            $table->timestamps();

            $table->foreign('CategoryId')->references('Id')->on('categories')->onDelete('cascade');
            $table->foreign('MenuId')->references('Id')->on('menu')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
