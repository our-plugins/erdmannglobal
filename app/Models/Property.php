<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'property_code',
        'title_en',
        'title_fr',
        'description_en',
        'description_fr',
        'price',
        'currency',
        'transaction_type',
        'property_type',
        'bedrooms',
        'bathrooms',
        'area_sqm',
        'floor',
        'furnished',
        'address',
        'city',
        'neighborhood',
        'latitude',
        'longitude',
        'video_url',
        'featured',
        'is_new',
        'status',
        'meta_title_en',
        'meta_title_fr',
        'meta_description_en',
        'meta_description_fr',
        'views',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'area_sqm' => 'decimal:2',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'featured' => 'boolean',
        'is_new' => 'boolean',
        'views' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($property) {
            if (empty($property->slug)) {
                $property->slug = Str::slug($property->title_en);
            }
            if (empty($property->property_code)) {
                $property->property_code = 'P' . strtoupper(Str::random(8));
            }
        });
    }

    // Relationships
    public function images(): HasMany
    {
        return $this->hasMany(PropertyImage::class)->orderBy('sort_order');
    }

    public function features(): HasMany
    {
        return $this->hasMany(PropertyFeature::class);
    }

    public function contactMessages(): HasMany
    {
        return $this->hasMany(ContactMessage::class);
    }

    // Accessors
    public function getTitleAttribute(): string
    {
        $locale = app()->getLocale();
        return $this->{"title_{$locale}"} ?? $this->title_en;
    }

    public function getDescriptionAttribute(): ?string
    {
        $locale = app()->getLocale();
        return $this->{"description_{$locale}"} ?? $this->description_en;
    }

    public function getMetaTitleAttribute(): ?string
    {
        $locale = app()->getLocale();
        return $this->{"meta_title_{$locale}"} ?? $this->meta_title_en ?? $this->title;
    }

    public function getMetaDescriptionAttribute(): ?string
    {
        $locale = app()->getLocale();
        return $this->{"meta_description_{$locale}"} ?? $this->meta_description_en;
    }

    public function getPrimaryImageAttribute(): ?PropertyImage
    {
        return $this->images->where('is_primary', true)->first()
            ?? $this->images->first();
    }

    public function getPrimaryImageUrlAttribute(): string
    {
        $image = $this->primary_image;
        if ($image) {
            return asset('storage/' . $image->image_path);
        }

        // Use Unsplash images based on property type
        $unsplashKeywords = match($this->property_type) {
            'apartment' => 'modern-apartment',
            'house' => 'luxury-house',
            'villa' => 'luxury-villa-pool',
            'land' => 'land-plot',
            'office' => 'modern-office',
            'studio' => 'studio-apartment',
            'farm' => 'farmhouse',
            'garage' => 'garage',
            'shop' => 'retail-store',
            default => 'real-estate',
        };

        // Use property ID for consistent image per property
        $seed = $this->id ?? rand(1, 1000);
        return "https://images.unsplash.com/photo-" . $this->getUnsplashPhotoId($unsplashKeywords, $seed) . "?w=800&h=600&fit=crop";
    }

    private function getUnsplashPhotoId(string $type, int $seed): string
    {
        // Curated Unsplash photo IDs for real estate
        $photos = [
            'modern-apartment' => [
                '1502672260266-1c1ef2d93688',
                '1560448204-e02f11c3d0e2',
                '1522708323590-d24dbb6b0267',
                '1560185007-c5ca9d2c014d',
                '1493809842364-78817add7ffb',
            ],
            'luxury-house' => [
                '1564013799919-ab600027ffc6',
                '1600596542815-ffad4c1539a9',
                '1600585154340-be6161a56a0c',
                '1605276374104-dee2a0ed3cd6',
                '1512917774080-9991f1c4c750',
            ],
            'luxury-villa-pool' => [
                '1613490493576-7fde63acd811',
                '1600607687939-ce8a6c25118c',
                '1613977257363-707ba9348227',
                '1599809275671-b5942cabc7a2',
                '1582268611958-ebfd161ef9cf',
            ],
            'modern-office' => [
                '1497366216548-37526070297c',
                '1497366811353-6870744d04b2',
                '1524758631624-e2822e304c36',
                '1504384308090-c894fdcc538d',
                '1497215842964-222b430dc094',
            ],
            'studio-apartment' => [
                '1502672260266-1c1ef2d93688',
                '1560448204-e02f11c3d0e2',
                '1522708323590-d24dbb6b0267',
            ],
            'default' => [
                '1564013799919-ab600027ffc6',
                '1600596542815-ffad4c1539a9',
                '1600585154340-be6161a56a0c',
            ],
        ];

        $typePhotos = $photos[$type] ?? $photos['default'];
        return $typePhotos[$seed % count($typePhotos)];
    }

    public function getFormattedPriceAttribute(): string
    {
        return number_format($this->price, 0, ',', ' ') . ' ' . $this->currency;
    }

    public function getTransactionBadgeColorAttribute(): string
    {
        return match($this->transaction_type) {
            'rent' => 'bg-blue-500',
            'sale' => 'bg-gold-500',
            'commercial' => 'bg-purple-500',
            default => 'bg-gray-500',
        };
    }

    // Scopes
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopeForRent($query)
    {
        return $query->where('transaction_type', 'rent');
    }

    public function scopeForSale($query)
    {
        return $query->where('transaction_type', 'sale');
    }

    public function scopeCommercial($query)
    {
        return $query->where('transaction_type', 'commercial');
    }

    public function scopeOfType($query, string $type)
    {
        return $query->where('property_type', $type);
    }

    public function scopeInCity($query, string $city)
    {
        return $query->where('city', $city);
    }

    public function scopeInNeighborhood($query, string $neighborhood)
    {
        return $query->where('neighborhood', $neighborhood);
    }

    public function scopeMinBedrooms($query, int $bedrooms)
    {
        return $query->where('bedrooms', '>=', $bedrooms);
    }

    public function scopePriceRange($query, ?float $min = null, ?float $max = null)
    {
        if ($min) {
            $query->where('price', '>=', $min);
        }
        if ($max) {
            $query->where('price', '<=', $max);
        }
        return $query;
    }

    public function scopeAreaRange($query, ?float $min = null, ?float $max = null)
    {
        if ($min) {
            $query->where('area_sqm', '>=', $min);
        }
        if ($max) {
            $query->where('area_sqm', '<=', $max);
        }
        return $query;
    }

    // Helper methods
    public function getFeatureValue(string $key): ?string
    {
        $feature = $this->features->where('feature_key', $key)->first();
        return $feature?->value;
    }

    public function incrementViews(): void
    {
        $this->increment('views');
    }

    public function getSimilarProperties(int $limit = 4)
    {
        return static::published()
            ->where('id', '!=', $this->id)
            ->where(function ($query) {
                $query->where('transaction_type', $this->transaction_type)
                    ->orWhere('property_type', $this->property_type)
                    ->orWhere('city', $this->city);
            })
            ->limit($limit)
            ->get();
    }
}
