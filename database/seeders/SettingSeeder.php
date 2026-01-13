<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'site_name_en', 'value_en' => 'Tangier Real Estate', 'value_fr' => 'Immobilier Tanger'],
            ['key' => 'site_name_fr', 'value_en' => 'Tangier Real Estate', 'value_fr' => 'Immobilier Tanger'],
            ['key' => 'tagline_en', 'value_en' => 'Your Premier Real Estate Partner in Northern Morocco', 'value_fr' => 'Votre partenaire immobilier de premier plan dans le Nord du Maroc'],
            ['key' => 'tagline_fr', 'value_en' => 'Your Premier Real Estate Partner in Northern Morocco', 'value_fr' => 'Votre partenaire immobilier de premier plan dans le Nord du Maroc'],
            ['key' => 'phone', 'value_en' => '+212 539 123 456', 'value_fr' => '+212 539 123 456'],
            ['key' => 'whatsapp', 'value_en' => '+212 661 123 456', 'value_fr' => '+212 661 123 456'],
            ['key' => 'email', 'value_en' => 'contact@tangier-realestate.com', 'value_fr' => 'contact@tangier-realestate.com'],
            ['key' => 'address', 'value_en' => '123 Boulevard Mohammed V, Tangier 90000, Morocco', 'value_fr' => '123 Boulevard Mohammed V, Tanger 90000, Maroc'],
            ['key' => 'facebook_url', 'value_en' => 'https://facebook.com/tangierrealestate', 'value_fr' => 'https://facebook.com/tangierrealestate'],
            ['key' => 'instagram_url', 'value_en' => 'https://instagram.com/tangierrealestate', 'value_fr' => 'https://instagram.com/tangierrealestate'],
            ['key' => 'youtube_url', 'value_en' => 'https://youtube.com/@tangierrealestate', 'value_fr' => 'https://youtube.com/@tangierrealestate'],
            ['key' => 'linkedin_url', 'value_en' => 'https://linkedin.com/company/tangier-real-estate', 'value_fr' => 'https://linkedin.com/company/tangier-real-estate'],
            ['key' => 'default_meta_title_en', 'value_en' => 'Tangier Real Estate - Properties for Sale & Rent in Northern Morocco', 'value_fr' => 'Immobilier Tanger - Propriétés à vendre et à louer dans le Nord du Maroc'],
            ['key' => 'default_meta_title_fr', 'value_en' => 'Tangier Real Estate - Properties for Sale & Rent in Northern Morocco', 'value_fr' => 'Immobilier Tanger - Propriétés à vendre et à louer dans le Nord du Maroc'],
            ['key' => 'default_meta_description_en', 'value_en' => 'Find your dream property in Tangier, Tetouan, Asilah and Northern Morocco. Apartments, villas, houses for sale and rent. Expert real estate services.', 'value_fr' => 'Trouvez votre propriété de rêve à Tanger, Tétouan, Asilah et le Nord du Maroc. Appartements, villas, maisons à vendre et à louer. Services immobiliers experts.'],
            ['key' => 'default_meta_description_fr', 'value_en' => 'Find your dream property in Tangier, Tetouan, Asilah and Northern Morocco. Apartments, villas, houses for sale and rent. Expert real estate services.', 'value_fr' => 'Trouvez votre propriété de rêve à Tanger, Tétouan, Asilah et le Nord du Maroc. Appartements, villas, maisons à vendre et à louer. Services immobiliers experts.'],
            ['key' => 'about_text_en', 'value_en' => 'Tangier Real Estate is the leading property agency in Northern Morocco, specializing in residential and commercial properties across Tangier, Tetouan, Asilah, and the surrounding regions. With over 15 years of experience, our team of dedicated professionals provides expert guidance for buyers, sellers, and investors looking to navigate the Moroccan real estate market. We pride ourselves on our deep local knowledge, transparent practices, and commitment to finding the perfect property match for every client.', 'value_fr' => 'Tangier Real Estate est la principale agence immobilière du Nord du Maroc, spécialisée dans les propriétés résidentielles et commerciales à Tanger, Tétouan, Asilah et les régions environnantes. Avec plus de 15 ans d\'expérience, notre équipe de professionnels dévoués fournit des conseils experts aux acheteurs, vendeurs et investisseurs cherchant à naviguer sur le marché immobilier marocain. Nous sommes fiers de notre connaissance locale approfondie, de nos pratiques transparentes et de notre engagement à trouver la propriété parfaite pour chaque client.'],
            ['key' => 'about_text_fr', 'value_en' => 'Tangier Real Estate is the leading property agency in Northern Morocco, specializing in residential and commercial properties across Tangier, Tetouan, Asilah, and the surrounding regions. With over 15 years of experience, our team of dedicated professionals provides expert guidance for buyers, sellers, and investors looking to navigate the Moroccan real estate market. We pride ourselves on our deep local knowledge, transparent practices, and commitment to finding the perfect property match for every client.', 'value_fr' => 'Tangier Real Estate est la principale agence immobilière du Nord du Maroc, spécialisée dans les propriétés résidentielles et commerciales à Tanger, Tétouan, Asilah et les régions environnantes. Avec plus de 15 ans d\'expérience, notre équipe de professionnels dévoués fournit des conseils experts aux acheteurs, vendeurs et investisseurs cherchant à naviguer sur le marché immobilier marocain. Nous sommes fiers de notre connaissance locale approfondie, de nos pratiques transparentes et de notre engagement à trouver la propriété parfaite pour chaque client.'],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
