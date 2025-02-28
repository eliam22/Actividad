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
        Schema::create('superheroes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('real_name', 100)->nullable();
            $table->foreignId('universe_id')->constrained('universos')->onDelete('cascade');
            $table->foreignId('type_id')->constrained('superhero_types');
            $table->foreignId('gender_id')->nullable()->constrained('genders');
            $table->text('powers')->nullable();
            $table->string('affiliation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('superheroes');
    }
}; 