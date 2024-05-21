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
        Schema::create('borrowings', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->foreignId('member_id')->constrained('members');  // Foreign key to members table
            $table->foreignId('book_id')->constrained('books');  // Foreign key to books table
            $table->date('borrow_date');
            $table->date('return_date')->nullable();  // Nullable as it will be empty when the book is first borrowed
            $table->timestamps();  // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowing');
    }
};
