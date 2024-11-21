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
        Schema::create('patient_babies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->date('born_at');
            $table->boolean('is_fed')->default(false);
            $table->boolean('is_sleeping')->default(false);
            $table->integer('food_amount')->nullable();
            $table->integer('weight')->nullable();
            $table->decimal('body_temperature', 4, 1)->nullable();
            $table->boolean('medicine_taken')->default(false);
            $table->date('appointment_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_babies');
    }
};
