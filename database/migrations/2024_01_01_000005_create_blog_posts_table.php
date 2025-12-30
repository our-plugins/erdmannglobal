<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->foreignId('category_id')->nullable()->constrained('blog_categories')->onDelete('set null');
            $table->foreignId('author_id')->nullable()->constrained('users')->onDelete('set null');

            // Multilingual content
            $table->string('title_en');
            $table->string('title_fr');
            $table->text('excerpt_en')->nullable();
            $table->text('excerpt_fr')->nullable();
            $table->longText('content_en');
            $table->longText('content_fr');

            // Media
            $table->string('featured_image')->nullable();

            // SEO fields
            $table->string('meta_title_en')->nullable();
            $table->string('meta_title_fr')->nullable();
            $table->text('meta_description_en')->nullable();
            $table->text('meta_description_fr')->nullable();

            // Status
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->timestamp('published_at')->nullable();

            // Stats
            $table->unsignedInteger('views')->default(0);

            $table->timestamps();

            $table->index('status');
            $table->index('published_at');
            $table->index('category_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};
