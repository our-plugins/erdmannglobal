<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        $author = User::where('is_admin', true)->first();
        $categories = BlogCategory::all();

        $posts = [
            [
                'title_en' => 'Top 5 Neighborhoods to Invest in Tangier in 2024',
                'title_fr' => 'Top 5 des quartiers où investir à Tanger en 2024',
                'excerpt_en' => 'Discover the most promising neighborhoods for real estate investment in Tangier this year.',
                'excerpt_fr' => 'Découvrez les quartiers les plus prometteurs pour l\'investissement immobilier à Tanger cette année.',
                'content_en' => '<p>Tangier\'s real estate market continues to grow, with several neighborhoods showing exceptional investment potential. Here are our top picks:</p>

<h2>1. Malabata</h2>
<p>The waterfront area of Malabata has become increasingly popular with both local and international buyers. With new developments and improved infrastructure, property values have seen consistent growth.</p>

<h2>2. Iberia</h2>
<p>This emerging neighborhood offers more affordable options while still providing good access to the city center. New residential projects are transforming the area.</p>

<h2>3. Cap Spartel</h2>
<p>For luxury seekers, Cap Spartel remains the premium choice with stunning views and exclusive properties.</p>

<h2>4. Zone Franche Area</h2>
<p>The industrial growth around the free zone has created strong rental demand, making it ideal for buy-to-let investments.</p>

<h2>5. Tangier City Center</h2>
<p>The heart of the city continues to attract buyers looking for convenience and urban lifestyle.</p>',
                'content_fr' => '<p>Le marché immobilier de Tanger continue de croître, avec plusieurs quartiers montrant un potentiel d\'investissement exceptionnel. Voici nos meilleurs choix :</p>

<h2>1. Malabata</h2>
<p>Le quartier en bord de mer de Malabata est devenu de plus en plus populaire auprès des acheteurs locaux et internationaux. Avec de nouveaux développements et une infrastructure améliorée, les valeurs immobilières ont connu une croissance constante.</p>

<h2>2. Iberia</h2>
<p>Ce quartier émergent offre des options plus abordables tout en fournissant un bon accès au centre-ville. De nouveaux projets résidentiels transforment la zone.</p>

<h2>3. Cap Spartel</h2>
<p>Pour les amateurs de luxe, Cap Spartel reste le choix premium avec des vues imprenables et des propriétés exclusives.</p>

<h2>4. Zone Franche</h2>
<p>La croissance industrielle autour de la zone franche a créé une forte demande locative, ce qui en fait un investissement idéal pour la location.</p>

<h2>5. Centre-ville de Tanger</h2>
<p>Le cœur de la ville continue d\'attirer les acheteurs recherchant la commodité et le style de vie urbain.</p>',
                'category_slug' => 'investment-tips',
                'status' => 'published',
            ],
            [
                'title_en' => 'Complete Guide to Buying Property in Morocco as a Foreigner',
                'title_fr' => 'Guide complet pour acheter une propriété au Maroc en tant qu\'étranger',
                'excerpt_en' => 'Everything you need to know about purchasing real estate in Morocco as a non-resident.',
                'excerpt_fr' => 'Tout ce que vous devez savoir sur l\'achat immobilier au Maroc en tant que non-résident.',
                'content_en' => '<p>Morocco welcomes foreign property buyers with open arms. Here\'s what you need to know:</p>

<h2>Legal Requirements</h2>
<p>Foreigners can purchase most types of property in Morocco, with some exceptions for agricultural land. The process is straightforward and well-regulated.</p>

<h2>Required Documents</h2>
<ul>
<li>Valid passport</li>
<li>Proof of funds</li>
<li>Tax identification number (obtained locally)</li>
</ul>

<h2>The Buying Process</h2>
<p>1. Find your property with a reputable agent<br>
2. Make an offer and negotiate<br>
3. Sign the preliminary agreement<br>
4. Complete due diligence<br>
5. Sign the final deed at the notary<br>
6. Register the property</p>

<h2>Costs to Consider</h2>
<p>Budget for approximately 5-7% of the purchase price for fees including notary fees, registration, and taxes.</p>',
                'content_fr' => '<p>Le Maroc accueille les acheteurs étrangers de biens immobiliers à bras ouverts. Voici ce que vous devez savoir :</p>

<h2>Exigences légales</h2>
<p>Les étrangers peuvent acheter la plupart des types de biens au Maroc, avec quelques exceptions pour les terres agricoles. Le processus est simple et bien réglementé.</p>

<h2>Documents requis</h2>
<ul>
<li>Passeport valide</li>
<li>Justificatif de fonds</li>
<li>Numéro d\'identification fiscale (obtenu localement)</li>
</ul>

<h2>Le processus d\'achat</h2>
<p>1. Trouvez votre propriété avec un agent réputé<br>
2. Faites une offre et négociez<br>
3. Signez le compromis de vente<br>
4. Effectuez la due diligence<br>
5. Signez l\'acte définitif chez le notaire<br>
6. Enregistrez la propriété</p>

<h2>Coûts à prévoir</h2>
<p>Prévoyez environ 5-7% du prix d\'achat pour les frais incluant les frais de notaire, l\'enregistrement et les taxes.</p>',
                'category_slug' => 'buying-guide',
                'status' => 'published',
            ],
            [
                'title_en' => 'Tangier Real Estate Market Trends: Year in Review',
                'title_fr' => 'Tendances du marché immobilier de Tanger : bilan annuel',
                'excerpt_en' => 'A comprehensive look at how the Tangier property market performed this year.',
                'excerpt_fr' => 'Un aperçu complet de la performance du marché immobilier tangérois cette année.',
                'content_en' => '<p>The Tangier real estate market has shown resilience and growth throughout the year. Here\'s our analysis:</p>

<h2>Price Trends</h2>
<p>Average property prices in Tangier increased by approximately 8% compared to last year, with luxury properties seeing even higher appreciation.</p>

<h2>Demand Patterns</h2>
<p>Strong demand continues from both domestic buyers and the Moroccan diaspora. International interest, particularly from Europeans, has also grown.</p>

<h2>New Developments</h2>
<p>Several major residential projects have been launched, adding quality housing stock to the market.</p>

<h2>Rental Market</h2>
<p>The rental market remains strong, with yields averaging 5-7% in popular areas.</p>

<h2>Outlook</h2>
<p>We expect continued growth in 2024, supported by infrastructure investments and Tangier\'s growing reputation as a business hub.</p>',
                'content_fr' => '<p>Le marché immobilier de Tanger a fait preuve de résilience et de croissance tout au long de l\'année. Voici notre analyse :</p>

<h2>Tendances des prix</h2>
<p>Les prix moyens de l\'immobilier à Tanger ont augmenté d\'environ 8% par rapport à l\'année dernière, les propriétés de luxe connaissant une appréciation encore plus importante.</p>

<h2>Modèles de demande</h2>
<p>La demande reste forte de la part des acheteurs nationaux et de la diaspora marocaine. L\'intérêt international, notamment des Européens, a également augmenté.</p>

<h2>Nouveaux développements</h2>
<p>Plusieurs grands projets résidentiels ont été lancés, ajoutant un parc immobilier de qualité au marché.</p>

<h2>Marché locatif</h2>
<p>Le marché locatif reste solide, avec des rendements moyens de 5-7% dans les zones populaires.</p>

<h2>Perspectives</h2>
<p>Nous prévoyons une croissance continue en 2024, soutenue par les investissements en infrastructure et la réputation croissante de Tanger comme pôle d\'affaires.</p>',
                'category_slug' => 'market-trends',
                'status' => 'published',
            ],
            [
                'title_en' => 'Exploring the Kasbah: Tangier\'s Historic Heart',
                'title_fr' => 'À la découverte de la Kasbah : le cœur historique de Tanger',
                'excerpt_en' => 'Discover the charm and investment potential of Tangier\'s ancient Kasbah neighborhood.',
                'excerpt_fr' => 'Découvrez le charme et le potentiel d\'investissement du quartier ancien de la Kasbah de Tanger.',
                'content_en' => '<p>The Kasbah of Tangier stands as a testament to the city\'s rich history. This neighborhood offers a unique blend of traditional architecture and modern potential.</p>

<h2>History and Character</h2>
<p>Dating back centuries, the Kasbah has been home to sultans, diplomats, and artists. Its winding streets and whitewashed buildings create an atmosphere unlike anywhere else.</p>

<h2>Property Types</h2>
<p>Traditional riads, restored townhouses, and converted palaces are available for those seeking authentic Moroccan living.</p>

<h2>Investment Potential</h2>
<p>With tourism growing and interest in authentic experiences rising, Kasbah properties make excellent vacation rental investments.</p>

<h2>What to Consider</h2>
<p>Renovation requirements, access limitations, and heritage regulations should all be factored into your decision.</p>',
                'content_fr' => '<p>La Kasbah de Tanger témoigne de la riche histoire de la ville. Ce quartier offre un mélange unique d\'architecture traditionnelle et de potentiel moderne.</p>

<h2>Histoire et caractère</h2>
<p>Datant de plusieurs siècles, la Kasbah a abrité sultans, diplomates et artistes. Ses ruelles sinueuses et ses bâtiments blanchis à la chaux créent une atmosphère unique.</p>

<h2>Types de propriétés</h2>
<p>Riads traditionnels, maisons de ville restaurées et palais convertis sont disponibles pour ceux qui recherchent une vie marocaine authentique.</p>

<h2>Potentiel d\'investissement</h2>
<p>Avec le tourisme en croissance et l\'intérêt croissant pour les expériences authentiques, les propriétés de la Kasbah font d\'excellents investissements locatifs de vacances.</p>

<h2>À considérer</h2>
<p>Les exigences de rénovation, les limitations d\'accès et les réglementations patrimoniales doivent être prises en compte dans votre décision.</p>',
                'category_slug' => 'neighborhood-spotlight',
                'status' => 'published',
            ],
            [
                'title_en' => 'Modern Moroccan Interior Design: Trends for Your New Home',
                'title_fr' => 'Design d\'intérieur marocain moderne : tendances pour votre nouveau logement',
                'excerpt_en' => 'How to blend traditional Moroccan elements with contemporary style in your property.',
                'excerpt_fr' => 'Comment mélanger les éléments marocains traditionnels avec un style contemporain dans votre propriété.',
                'content_en' => '<p>Modern Moroccan interior design celebrates the country\'s rich artisanal heritage while embracing contemporary comfort.</p>

<h2>Key Elements</h2>
<p>Zellige tiles, tadelakt plaster, carved wood, and wrought iron continue to define Moroccan interiors, now used in fresh, modern ways.</p>

<h2>Color Palettes</h2>
<p>While traditional terracotta and blue remain popular, contemporary spaces are exploring neutral tones with bold accent colors.</p>

<h2>Furniture Trends</h2>
<p>Low seating, artisanal crafts, and locally made furniture pieces add authenticity to modern spaces.</p>

<h2>Lighting</h2>
<p>Moroccan lanterns and pendant lights remain timeless choices that add warmth and character to any room.</p>

<h2>Outdoor Living</h2>
<p>Terraces, courtyards, and rooftops are essential extensions of the living space in Moroccan homes.</p>',
                'content_fr' => '<p>Le design d\'intérieur marocain moderne célèbre le riche patrimoine artisanal du pays tout en adoptant le confort contemporain.</p>

<h2>Éléments clés</h2>
<p>Les carreaux de zellige, le tadelakt, le bois sculpté et le fer forgé continuent de définir les intérieurs marocains, maintenant utilisés de manière fraîche et moderne.</p>

<h2>Palettes de couleurs</h2>
<p>Bien que le terracotta traditionnel et le bleu restent populaires, les espaces contemporains explorent des tons neutres avec des couleurs d\'accent audacieuses.</p>

<h2>Tendances mobilier</h2>
<p>Les sièges bas, l\'artisanat et les meubles fabriqués localement ajoutent de l\'authenticité aux espaces modernes.</p>

<h2>Éclairage</h2>
<p>Les lanternes marocaines et les suspensions restent des choix intemporels qui ajoutent chaleur et caractère à toute pièce.</p>

<h2>Vie en extérieur</h2>
<p>Terrasses, cours intérieures et toits sont des extensions essentielles de l\'espace de vie dans les maisons marocaines.</p>',
                'category_slug' => 'interior-design',
                'status' => 'published',
            ],
            [
                'title_en' => 'Why Northern Morocco is Becoming an Expat Hotspot',
                'title_fr' => 'Pourquoi le Nord du Maroc devient un point chaud pour les expatriés',
                'excerpt_en' => 'The factors driving international buyers to Tangier and the surrounding region.',
                'excerpt_fr' => 'Les facteurs qui attirent les acheteurs internationaux à Tanger et dans la région environnante.',
                'content_en' => '<p>Northern Morocco, particularly Tangier, has seen a surge in interest from international buyers and expats. Here\'s why:</p>

<h2>Proximity to Europe</h2>
<p>Just 14 kilometers from Spain, Tangier offers easy access to Europe while providing a completely different lifestyle and cost of living.</p>

<h2>Climate</h2>
<p>The Mediterranean climate means mild winters and warm summers, perfect for those seeking escape from northern European weather.</p>

<h2>Cost of Living</h2>
<p>Your money goes further in Morocco, from property prices to daily expenses, without sacrificing quality of life.</p>

<h2>Infrastructure</h2>
<p>New airport terminals, the high-speed train, and improved roads have made the region more accessible than ever.</p>

<h2>Culture and Lifestyle</h2>
<p>The unique blend of cultures, excellent cuisine, and welcoming locals make integration easy for newcomers.</p>',
                'content_fr' => '<p>Le nord du Maroc, en particulier Tanger, a connu une forte augmentation de l\'intérêt des acheteurs internationaux et des expatriés. Voici pourquoi :</p>

<h2>Proximité de l\'Europe</h2>
<p>À seulement 14 kilomètres de l\'Espagne, Tanger offre un accès facile à l\'Europe tout en proposant un style de vie et un coût de la vie complètement différents.</p>

<h2>Climat</h2>
<p>Le climat méditerranéen signifie des hivers doux et des étés chauds, parfait pour ceux qui cherchent à échapper au temps du nord de l\'Europe.</p>

<h2>Coût de la vie</h2>
<p>Votre argent va plus loin au Maroc, des prix de l\'immobilier aux dépenses quotidiennes, sans sacrifier la qualité de vie.</p>

<h2>Infrastructure</h2>
<p>Les nouveaux terminaux d\'aéroport, le train à grande vitesse et les routes améliorées ont rendu la région plus accessible que jamais.</p>

<h2>Culture et style de vie</h2>
<p>Le mélange unique de cultures, l\'excellente cuisine et les habitants accueillants facilitent l\'intégration des nouveaux arrivants.</p>',
                'category_slug' => 'market-trends',
                'status' => 'published',
            ],
            [
                'title_en' => 'Rental Property Investment: Maximizing Your Returns in Tangier',
                'title_fr' => 'Investissement locatif : maximiser vos rendements à Tanger',
                'excerpt_en' => 'Strategies for successful rental property investment in Tangier\'s growing market.',
                'excerpt_fr' => 'Stratégies pour un investissement locatif réussi dans le marché en croissance de Tanger.',
                'content_en' => '<p>Tangier\'s rental market offers attractive returns for savvy investors. Here\'s how to maximize your investment:</p>

<h2>Location Selection</h2>
<p>Properties near the business district, universities, or tourist attractions command premium rents and have lower vacancy rates.</p>

<h2>Property Type</h2>
<p>Studios and one-bedroom apartments often provide the best yield, while family homes offer stability.</p>

<h2>Furnishing Decisions</h2>
<p>Furnished properties can command 20-30% higher rents but require more management.</p>

<h2>Target Market</h2>
<p>Consider whether you\'re targeting professionals, students, tourists, or families, and furnish accordingly.</p>

<h2>Management Options</h2>
<p>Professional property management typically costs 8-10% of rental income but can be worthwhile for overseas investors.</p>',
                'content_fr' => '<p>Le marché locatif de Tanger offre des rendements attractifs pour les investisseurs avisés. Voici comment maximiser votre investissement :</p>

<h2>Sélection de l\'emplacement</h2>
<p>Les propriétés près du quartier d\'affaires, des universités ou des attractions touristiques commandent des loyers premium et ont des taux de vacance plus bas.</p>

<h2>Type de propriété</h2>
<p>Les studios et les appartements d\'une chambre offrent souvent le meilleur rendement, tandis que les maisons familiales offrent de la stabilité.</p>

<h2>Décisions d\'ameublement</h2>
<p>Les propriétés meublées peuvent commander des loyers 20-30% plus élevés mais nécessitent plus de gestion.</p>

<h2>Marché cible</h2>
<p>Considérez si vous ciblez des professionnels, des étudiants, des touristes ou des familles, et meublez en conséquence.</p>

<h2>Options de gestion</h2>
<p>La gestion immobilière professionnelle coûte généralement 8-10% des revenus locatifs mais peut valoir la peine pour les investisseurs étrangers.</p>',
                'category_slug' => 'investment-tips',
                'status' => 'published',
            ],
            [
                'title_en' => 'First-Time Buyer Checklist: Your Path to Homeownership in Morocco',
                'title_fr' => 'Checklist du primo-accédant : votre chemin vers la propriété au Maroc',
                'excerpt_en' => 'A step-by-step guide for first-time property buyers in Morocco.',
                'excerpt_fr' => 'Un guide étape par étape pour les primo-accédants au Maroc.',
                'content_en' => '<p>Buying your first property in Morocco is an exciting journey. Follow this checklist to ensure a smooth process:</p>

<h2>Before You Start</h2>
<ul>
<li>Determine your budget including all costs</li>
<li>Get pre-approval for financing if needed</li>
<li>Identify your must-haves vs. nice-to-haves</li>
</ul>

<h2>Property Search</h2>
<ul>
<li>Work with a reputable agent</li>
<li>Visit multiple properties</li>
<li>Research neighborhoods thoroughly</li>
</ul>

<h2>Due Diligence</h2>
<ul>
<li>Verify property title</li>
<li>Check for any liens or encumbrances</li>
<li>Inspect the property condition</li>
</ul>

<h2>Closing Process</h2>
<ul>
<li>Review all documents carefully</li>
<li>Understand all fees and taxes</li>
<li>Complete registration properly</li>
</ul>',
                'content_fr' => '<p>Acheter votre première propriété au Maroc est un voyage passionnant. Suivez cette checklist pour un processus fluide :</p>

<h2>Avant de commencer</h2>
<ul>
<li>Déterminez votre budget incluant tous les frais</li>
<li>Obtenez une pré-approbation de financement si nécessaire</li>
<li>Identifiez vos essentiels vs. souhaits</li>
</ul>

<h2>Recherche de propriété</h2>
<ul>
<li>Travaillez avec un agent réputé</li>
<li>Visitez plusieurs propriétés</li>
<li>Recherchez les quartiers en profondeur</li>
</ul>

<h2>Due diligence</h2>
<ul>
<li>Vérifiez le titre de propriété</li>
<li>Vérifiez les privilèges ou charges</li>
<li>Inspectez l\'état de la propriété</li>
</ul>

<h2>Processus de clôture</h2>
<ul>
<li>Examinez tous les documents attentivement</li>
<li>Comprenez tous les frais et taxes</li>
<li>Complétez l\'enregistrement correctement</li>
</ul>',
                'category_slug' => 'buying-guide',
                'status' => 'published',
            ],
        ];

        foreach ($posts as $index => $data) {
            $category = $categories->where('slug', $data['category_slug'])->first();
            unset($data['category_slug']);

            BlogPost::create(array_merge($data, [
                'slug' => Str::slug($data['title_en']),
                'category_id' => $category?->id,
                'author_id' => $author->id,
                'featured_image' => null, // Uses Unsplash fallback
                'views' => rand(100, 1000),
                'published_at' => now()->subDays(rand(1, 60)),
            ]));
        }
    }
}
