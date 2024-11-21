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
        Schema::create('patient_parent_baby', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_parent_id')->constrained()->onDelete('cascade');
            $table->foreignId('patient_baby_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_parent_baby');
    }
};
