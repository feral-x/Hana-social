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
        Schema::create('tag_books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tag_id')->index()->references('id')->on('tags')->onDelete('cascade');
            $table->foreignId('book_id')->index()->references('id')->on('books')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tag_books');
    }
};
