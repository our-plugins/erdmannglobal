<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PropertyFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'feature_key',
        'value',
    ];

    public const AVAILABLE_FEATURES = [
        'balcony' => ['icon' => 'balcony', 'label_en' => 'Balcony', 'label_fr' => 'Balcon'],
        'terrace' => ['icon' => 'terrace', 'label_en' => 'Terrace', 'label_fr' => 'Terrasse'],
        'garden' => ['icon' => 'garden', 'label_en' => 'Garden', 'label_fr' => 'Jardin'],
        'roof_terrace' => ['icon' => 'roof', 'label_en' => 'Roof Terrace', 'label_fr' => 'Terrasse sur le toit'],
        'private_pool' => ['icon' => 'pool', 'label_en' => 'Private Pool', 'label_fr' => 'Piscine privee'],
        'playground' => ['icon' => 'playground', 'label_en' => 'Playground', 'label_fr' => 'Aire de jeux'],
        'air_conditioning' => ['icon' => 'ac', 'label_en' => 'Air Conditioning', 'label_fr' => 'Climatisation'],
        'laundry_room' => ['icon' => 'laundry', 'label_en' => 'Laundry Room', 'label_fr' => 'Buanderie'],
        'ensuite_bathroom' => ['icon' => 'bathroom', 'label_en' => 'Ensuite Bathroom', 'label_fr' => 'Salle de bain privee'],
        'storage_room' => ['icon' => 'storage', 'label_en' => 'Storage Room', 'label_fr' => 'Cellier'],
        'built_in_appliances' => ['icon' => 'appliances', 'label_en' => 'Built-in Appliances', 'label_fr' => 'Electromenagers integres'],
        'home_office' => ['icon' => 'office', 'label_en' => 'Home Office', 'label_fr' => 'Bureau a domicile'],
        'parking' => ['icon' => 'parking', 'label_en' => 'Parking', 'label_fr' => 'Parking'],
        'elevator' => ['icon' => 'elevator', 'label_en' => 'Elevator', 'label_fr' => 'Ascenseur'],
        'security' => ['icon' => 'security', 'label_en' => 'Security', 'label_fr' => 'Securite'],
        'concierge' => ['icon' => 'concierge', 'label_en' => 'Concierge', 'label_fr' => 'Concierge'],
    ];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function getLabelAttribute(): string
    {
        $locale = app()->getLocale();
        $key = "label_{$locale}";
        return self::AVAILABLE_FEATURES[$this->feature_key][$key]
            ?? self::AVAILABLE_FEATURES[$this->feature_key]['label_en']
            ?? $this->feature_key;
    }

    public function getIconAttribute(): string
    {
        return self::AVAILABLE_FEATURES[$this->feature_key]['icon'] ?? 'default';
    }

    public function getDisplayValueAttribute(): string
    {
        if ($this->value === 'yes') {
            return __('messages.yes');
        }
        if ($this->value === 'no' || $this->value === null) {
            return '---';
        }
        return $this->value;
    }
}
