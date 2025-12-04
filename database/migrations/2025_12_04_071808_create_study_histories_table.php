<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('study_histories', function (Blueprint $table) {
            $table->id();
            $table->string('level');            // BSc in CSE, HSC, SSC, etc.
            $table->string('institution');
            $table->year('start_year')->nullable();
            $table->year('end_year')->nullable(); // null if ongoing
            $table->string('grade')->nullable();  // CGPA/Grade
            $table->text('details')->nullable();  // short description
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('study_histories');
    }
};