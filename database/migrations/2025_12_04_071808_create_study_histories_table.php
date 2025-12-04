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
            $table->string('level');
            $table->string('institution');
            $table->year('start_year')->nullable();
            $table->year('end_year')->nullable();
            $table->string('grade')->nullable();
            $table->text('details')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('study_histories');
    }
};
