<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'group',
        'value_en',
        'value_fr',
        'type',
    ];

    public function getValueAttribute(): ?string
    {
        $locale = app()->getLocale();
        return $this->{"value_{$locale}"} ?? $this->value_en;
    }

    public static function get(string $key, ?string $default = null): ?string
    {
        $setting = Cache::remember("setting.{$key}", 3600, function () use ($key) {
            return static::where('key', $key)->first();
        });

        return $setting?->value ?? $default;
    }

    public static function set(string $key, ?string $valueEn, ?string $valueFr = null, string $group = 'general', string $type = 'text'): void
    {
        static::updateOrCreate(
            ['key' => $key],
            [
                'value_en' => $valueEn,
                'value_fr' => $valueFr ?? $valueEn,
                'group' => $group,
                'type' => $type,
            ]
        );

        Cache::forget("setting.{$key}");
    }

    public static function getByGroup(string $group): \Illuminate\Database\Eloquent\Collection
    {
        return static::where('group', $group)->get();
    }
}
