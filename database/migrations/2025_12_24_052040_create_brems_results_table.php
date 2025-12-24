<?php
/**
 * @author <mdadalkhan@gmail.com>
 * 24/12/2025
 * brems_users: This table will store user information such as typedText, correct, incorrect and result for futher processig.
 * */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('brems_result', function (Blueprint $table) {
            $table->id();
            $table->string('roll')->unique(); // Unique identifier for the student/user
            $table->string('name');
            $table->string('phone', 20)->nullable();
            $table->string('examcode')->index(); // Indexed for fast searching by exam
            $table->string('organisation')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('brems_result');
    }
};