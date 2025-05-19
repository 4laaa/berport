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
    Schema::table('article_news', function (Blueprint $table) {
        $table->string('name');
        $table->string('slug')->unique();
        $table->string('thumbnail')->nullable();
        $table->unsignedBigInteger('category_id');
        $table->unsignedBigInteger('author_id');
        $table->boolean('is_featured')->default(false);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('article_news', function (Blueprint $table) {
            //
        });
    }
};
