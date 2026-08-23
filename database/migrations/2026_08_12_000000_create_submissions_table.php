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
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->string('candidate_name');
            $table->string('email');
            $table->string('phone');
            $table->string('position');
            $table->string('city')->nullable();
            $table->string('nationality')->nullable();
            $table->string('experience')->nullable();
            $table->string('education')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('portfolio')->nullable();
            $table->string('salary')->nullable();
            $table->string('availability')->nullable();
            $table->text('message')->nullable();
            $table->text('cv_file')->nullable();
            $table->text('cover_file')->nullable();
            $table->text('cert_file')->nullable();
            $table->string('status')->default('New');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
