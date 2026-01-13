<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'category_id',
        'author_id',
        'author_name',
        'title_en',
        'title_fr',
        'excerpt_en',
        'excerpt_fr',
        'content_en',
        'content_fr',
        'featured_image',
        'meta_title_en',
        'meta_title_fr',
        'meta_description_en',
        'meta_description_fr',
        'status',
        'published_at',
        'views',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'views' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title_en);
            }
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    // Accessors
    public function getTitleAttribute(): string
    {
        $locale = app()->getLocale();
        return $this->{"title_{$locale}"} ?? $this->title_en;
    }

    public function getExcerptAttribute(): ?string
    {
        $locale = app()->getLocale();
        return $this->{"excerpt_{$locale}"} ?? $this->excerpt_en;
    }

    public function getContentAttribute(): string
    {
        $locale = app()->getLocale();
        return $this->{"content_{$locale}"} ?? $this->content_en;
    }

    public function getMetaTitleAttribute(): ?string
    {
        $locale = app()->getLocale();
        return $this->{"meta_title_{$locale}"} ?? $this->meta_title_en ?? $this->title;
    }

    public function getMetaDescriptionAttribute(): ?string
    {
        $locale = app()->getLocale();
        return $this->{"meta_description_{$locale}"} ?? $this->meta_description_en ?? $this->excerpt;
    }

    public function getDisplayAuthorNameAttribute(): ?string
    {
        return $this->author_name ?? $this->author?->name;
    }

    public function getFeaturedImageUrlAttribute(): string
    {
        if ($this->featured_image) {
            return asset('storage/' . $this->featured_image);
        }

        // Curated Unsplash photo IDs for real estate blog posts
        $photos = [
            '1560518883-ce09059eeffa', // Interior design
            '1600585154526-990dced4db0d', // Modern home
            '1600573472591-ee6981cf35b6', // Architecture
            '1600566753086-00f18fb6b3ea', // Luxury living
            '1600585154340-be6161a56a0c', // House exterior
            '1560448204-e02f11c3d0e2', // Apartment interior
            '1600596542815-ffad4c1539a9', // Modern house
            '1600607687939-ce8a6c25118c', // Villa with pool
            '1564013799919-ab600027ffc6', // Beautiful home
            '1613490493576-7fde63acd811', // Luxury property
        ];

        $seed = $this->id ?? rand(1, 1000);
        $photoId = $photos[$seed % count($photos)];

        return "https://images.unsplash.com/photo-{$photoId}?w=800&h=500&fit=crop";
    }

    public function getReadingTimeAttribute(): int
    {
        $wordCount = str_word_count(strip_tags($this->content));
        return max(1, ceil($wordCount / 200));
    }

    // Scopes
    public function scopePublished($query)
    {
        return $query->where('status', 'published')
            ->where('published_at', '<=', now());
    }

    public function scopeInCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    // Methods
    public function incrementViews(): void
    {
        $this->increment('views');
    }

    public function getRelatedPosts(int $limit = 3)
    {
        return static::published()
            ->where('id', '!=', $this->id)
            ->when($this->category_id, function ($query) {
                $query->where('category_id', $this->category_id);
            })
            ->latest('published_at')
            ->limit($limit)
            ->get();
    }
}
