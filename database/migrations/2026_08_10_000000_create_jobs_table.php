<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('job_openings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('department');
            $table->string('location');
            $table->string('type')->default('Full-time');
            $table->string('experience')->nullable();
            $table->text('description')->nullable();
            $table->string('salary')->nullable();
            $table->string('status')->default('Published');
            $table->json('translations')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_openings');
    }
};
