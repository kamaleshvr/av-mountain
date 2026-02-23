@extends('layouts.app')

@section('title', 'Our Products')

@section('content')
<div class="container page-header">
    <h1 class="text-center">Our Products &amp; Trade</h1>
</div>

<div class="container pb-5">

    {{-- Products Grid --}}
    <div class="row g-4 row-cols-1 row-cols-md-2 mb-5">
        @foreach($categories as $category)
        <div class="col">
            <div class="product-card glass-card p-0 animate-slide-up" style="animation-delay:{{ $loop->index * 0.2 }}s;">
                <div style="height:220px;overflow:hidden;border-radius:16px 16px 0 0;">
                    <img src="{{ Str::startsWith($category->hero_image, 'http') ? $category->hero_image : asset($category->hero_image) }}"
                         alt="{{ $category->name }}" style="width:100%;height:100%;object-fit:cover;transition:transform 0.5s ease;"
                         onmouseover="this.style.transform='scale(1.08)'" onmouseout="this.style.transform='scale(1)'">
                </div>
                <div class="p-4">
                    <h2>{{ $category->name }}</h2>
                    <p style="color:var(--text-gray);">{{ Str::limit($category->description, 100) }}</p>
                    <a href="{{ route('products.show', $category->slug) }}" class="btn btn-outline mt-2" style="font-size:0.9rem;">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Trade Capabilities --}}
    <h2 class="text-center mb-4">Trade Capabilities</h2>
    <div class="row g-4 row-cols-1 row-cols-md-3 mb-5">
        <div class="col"><div class="glass-card text-center"><h3>Intra-State Trade</h3><p>Supply across states within India.</p></div></div>
        <div class="col"><div class="glass-card text-center"><h3>Inter-State Trade</h3><p>Seamless distribution nationwide.</p></div></div>
        <div class="col"><div class="glass-card text-center"><h3>Export</h3><p>International shipping with full compliance.</p></div></div>
    </div>

    {{-- Quality Assurance --}}
    <div class="glass-card">
        <h2 class="text-center">Quality Assurance</h2>
        <p class="text-center mb-4" style="color:var(--text-gray);">Strict quality processed from sourcing to packaging.</p>
        <ul class="mx-auto" style="max-width:600px;list-style:none;padding:0;">
            <li class="mb-3">&#9989; Handpicked from organic-certified farms</li>
            <li class="mb-3">&#9989; Cleaned and sorted manually</li>
            <li class="mb-3">&#9989; Graded for size and weight</li>
            <li class="mb-3">&#9989; Packed as per international export standards</li>
            <li class="mb-3">&#9989; Fumigated and Phytosanitary certified</li>
        </ul>
    </div>

</div>
@endsection