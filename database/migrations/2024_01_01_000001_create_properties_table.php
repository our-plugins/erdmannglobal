<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('property_code')->unique()->nullable();

            // Multilingual fields
            $table->string('title_en');
            $table->string('title_fr');
            $table->text('description_en')->nullable();
            $table->text('description_fr')->nullable();

            // Pricing
            $table->decimal('price', 12, 2);
            $table->string('currency', 10)->default('MAD');

            // Classification
            $table->enum('transaction_type', ['rent', 'sale', 'commercial'])->default('sale');
            $table->enum('property_type', [
                'apartment', 'house', 'villa', 'land',
                'office', 'studio', 'farm', 'garage', 'shop'
            ])->default('apartment');

            // Property details
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->decimal('area_sqm', 10, 2)->nullable();
            $table->string('floor')->nullable();
            $table->enum('furnished', ['furnished', 'unfurnished', 'semi-furnished'])->nullable();

            // Location
            $table->string('address')->nullable();
            $table->string('city')->default('Tangier');
            $table->string('neighborhood')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();

            // Media
            $table->string('video_url')->nullable();

            // Status & flags
            $table->boolean('featured')->default(false);
            $table->boolean('is_new')->default(true);
            $table->enum('status', ['draft', 'published'])->default('draft');

            // SEO fields
            $table->string('meta_title_en')->nullable();
            $table->string('meta_title_fr')->nullable();
            $table->text('meta_description_en')->nullable();
            $table->text('meta_description_fr')->nullable();

            // Views counter
            $table->unsignedInteger('views')->default(0);

            $table->timestamps();

            // Indexes
            $table->index('transaction_type');
            $table->index('property_type');
            $table->index('status');
            $table->index('city');
            $table->index('featured');
            $table->index('price');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
