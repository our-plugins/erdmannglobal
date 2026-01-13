<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name_en' => 'Market Trends', 'name_fr' => 'Tendances du marché', 'slug' => 'market-trends'],
            ['name_en' => 'Buying Guide', 'name_fr' => 'Guide d\'achat', 'slug' => 'buying-guide'],
            ['name_en' => 'Investment Tips', 'name_fr' => 'Conseils d\'investissement', 'slug' => 'investment-tips'],
            ['name_en' => 'Neighborhood Spotlight', 'name_fr' => 'Focus Quartier', 'slug' => 'neighborhood-spotlight'],
            ['name_en' => 'Interior Design', 'name_fr' => 'Design d\'intérieur', 'slug' => 'interior-design'],
        ];

        foreach ($categories as $category) {
            BlogCategory::create($category);
        }
    }
}
