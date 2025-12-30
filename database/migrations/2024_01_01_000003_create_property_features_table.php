<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('property_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->string('feature_key'); // e.g., 'balcony', 'terrace', 'garden', 'pool', etc.
            $table->string('value')->nullable(); // 'yes', 'no', or null (not applicable)
            $table->timestamps();

            $table->unique(['property_id', 'feature_key']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('property_features');
    }
};
