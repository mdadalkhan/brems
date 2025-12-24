<?php
/**
 * @author <mdadalkhan@gmail.com>
 * 24/10/2025
 * 
 * */

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
        Schema::create('brems_users', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('roll')->unique(); // Unique identifier for the user
            $table->string('phone', 20)->nullable(); // Phone number
            $table->string('examcode')->index(); // Code for exams, indexed for faster searching
            $table->string('name'); // Full name
            $table->string('organisation')->nullable(); // Organisation name
            $table->timestamps(); // Adds created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brems_users');
    }
};