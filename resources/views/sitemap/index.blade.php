<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xhtml="http://www.w3.org/1999/xhtml">

    {{-- Homepage --}}
    <url>
        <loc>{{ url('/en') }}</loc>
        <xhtml:link rel="alternate" hreflang="en" href="{{ url('/en') }}"/>
        <xhtml:link rel="alternate" hreflang="fr" href="{{ url('/fr') }}"/>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>

    {{-- Static Pages --}}
    @foreach(['about', 'contact', 'listings', 'blog'] as $page)
    <url>
        <loc>{{ url('/en/' . $page) }}</loc>
        <xhtml:link rel="alternate" hreflang="en" href="{{ url('/en/' . $page) }}"/>
        <xhtml:link rel="alternate" hreflang="fr" href="{{ url('/fr/' . $page) }}"/>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach

    {{-- Properties --}}
    @foreach($properties as $property)
    <url>
        <loc>{{ url('/en/listings/' . $property->slug) }}</loc>
        <xhtml:link rel="alternate" hreflang="en" href="{{ url('/en/listings/' . $property->slug) }}"/>
        <xhtml:link rel="alternate" hreflang="fr" href="{{ url('/fr/listings/' . $property->slug) }}"/>
        <lastmod>{{ $property->updated_at->toIso8601String() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>
    @endforeach

    {{-- Blog Posts --}}
    @foreach($posts as $post)
    <url>
        <loc>{{ url('/en/blog/' . $post->slug) }}</loc>
        <xhtml:link rel="alternate" hreflang="en" href="{{ url('/en/blog/' . $post->slug) }}"/>
        <xhtml:link rel="alternate" hreflang="fr" href="{{ url('/fr/blog/' . $post->slug) }}"/>
        <lastmod>{{ $post->updated_at->toIso8601String() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach

</urlset>
