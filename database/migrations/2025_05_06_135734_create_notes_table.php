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
        // Create the 'notes' table
        Schema::create('notes', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('title'); // String column for the note title
            $table->text('content'); // Text column for the note content
            $table->timestamps(); // Created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the 'notes' table if it exists
        Schema::dropIfExists('notes');
    }
};
