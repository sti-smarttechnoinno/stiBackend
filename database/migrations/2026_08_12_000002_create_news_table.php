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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('category')->default('Company News');
            $table->string('author')->default('STI Editorial Team');
            $table->string('author_role')->nullable();
            $table->text('author_bio')->nullable();
            $table->string('published_at')->nullable();
            $table->string('reading_time')->default('3 min read');
            $table->string('status')->default('Published');
            $table->text('hero_image')->nullable();
            $table->json('translations')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
