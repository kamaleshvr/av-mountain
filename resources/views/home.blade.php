@extends('layouts.app')

@section('content')

{{-- ===== HERO ===== --}}
<section class="hero">
    <div class="hero-content container">
        <h1 class="animate-zoom-in">Delivering Nature's<br>Goodness Worldwide</h1>
        <p class="animate-fade-up delay-200 mb-4">AVmountain Private Limited - Your Trusted Partner in Premium Agricultural Exports</p>
        <div class="animate-fade-up delay-400 d-flex flex-wrap justify-content-center gap-3">
            <a href="{{ route('products') }}" class="btn btn-primary">Our Products</a>
            <a href="{{ route('contact') }}" class="btn btn-outline">Contact Us</a>
        </div>
    </div>
</section>

{{-- ===== STATS ===== --}}
<section class="stats-section">
    <div class="container">
        <div class="row g-3 row-cols-2 row-cols-md-4">
            <div class="col">
                <div class="stat-item animate-zoom-in delay-100">
                    <div class="stat-icon">🌍</div>
                    <div class="stat-number"><span class="counter" data-target="20">0</span><span class="stat-plus">+</span></div>
                    <div class="stat-label">Countries</div>
                </div>
            </div>
            <div class="col">
                <div class="stat-item animate-zoom-in delay-200">
                    <div class="stat-icon">🌾</div>
                    <div class="stat-number"><span class="counter" data-target="30">0</span><span class="stat-plus">+</span></div>
                    <div class="stat-label">Products</div>
                </div>
            </div>
            <div class="col">
                <div class="stat-item animate-zoom-in delay-300">
                    <div class="stat-icon">🧑‍🌾</div>
                    <div class="stat-number"><span class="counter" data-target="100">0</span><span class="stat-plus">+</span></div>
                    <div class="stat-label">Farmers</div>
                </div>
            </div>
            <div class="col">
                <div class="stat-item animate-zoom-in delay-400">
                    <div class="stat-icon">🤝</div>
                    <div class="stat-number"><span class="counter" data-target="100">0</span><span class="stat-plus">+</span></div>
                    <div class="stat-label">Happy Clients</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== INTRO ===== --}}
<section style="padding: 1.5rem 0;">
    <div class="container">
        <div class="glass-card animate-fade-left text-center" style="padding: 1.5rem 2rem;">
            <h2 class="mb-2">Welcome to AVmountain</h2>
            <p class="mx-auto mb-0" style="max-width:780px;color:var(--text-gray);">
                Established in 2025, AVmountain Private Limited is a trusted supplier and exporter of premium agricultural commodities.
                Headquartered in Salem, Tamil Nadu, we specialize in connecting organic Indian farms to global markets in the Middle East, Europe, Asia, North America, and Africa.
            </p>
        </div>
    </div>
</section>

{{-- ===== PRODUCTS SECTION ===== --}}
<section class="section-padding bg-secondary-dark">
    <div class="container">

        {{-- Section heading --}}
        <div class="text-center mb-5">
            <p class="mb-2" style="color:var(--primary-gold);font-size:0.85rem;letter-spacing:2px;text-transform:uppercase;font-weight:600;">What We Offer</p>
            <h2 class="mb-3">Our Products</h2>
            <p style="color:var(--text-gray);max-width:600px;margin:0 auto;">
                Premium agricultural commodities sourced directly from certified Indian farms, ready for global export.
            </p>
        </div>

        @if($categories->count() > 0)
            @php $colClass = $categories->count() <= 2 ? 'row-cols-1 row-cols-md-2' : 'row-cols-1 row-cols-md-2 row-cols-lg-3'; @endphp
            <div class="row g-4 {{ $colClass }}">
                @foreach($categories as $category)
                <div class="col">
                    <div class="product-card animate-slide-up" style="animation-delay:{{ $loop->index * 0.1 }}s;">
                        <div style="height:200px;overflow:hidden;position:relative;">
                            <img src="{{ Str::startsWith($category->hero_image ?? '', 'http') ? $category->hero_image : asset($category->hero_image ?? 'images/placeholder.jpg') }}"
                                 alt="{{ $category->name }}"
                                 style="width:100%;height:100%;object-fit:cover;transition:transform 0.5s ease;"
                                 onmouseover="this.style.transform='scale(1.08)'"
                                 onmouseout="this.style.transform='scale(1)'">
                            <div style="position:absolute;inset:0;background:linear-gradient(to top, rgba(0,0,0,0.6) 0%, transparent 50%);"></div>
                        </div>
                        <div class="p-4" style="display:flex;flex-direction:column;gap:0.75rem;">
                            <h3 style="margin-bottom:0;font-size:1.25rem;">{{ $category->name }}</h3>
                            <p style="color:var(--text-gray);font-size:0.93rem;line-height:1.65;flex:1;">
                                {{ Str::limit($category->description ?? 'Premium quality produce sourced directly from certified farmers.', 110) }}
                            </p>
                            <a href="{{ route('products.show', $category->slug) }}"
                               class="btn btn-outline"
                               style="align-self:flex-start;font-size:0.85rem;padding:0.5rem 1.25rem;">
                               View Products &rarr;
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center glass-card py-4">
                <p style="color:var(--text-gray);font-size:1.1rem;margin:0;">Products coming soon. Check back later!</p>
            </div>
        @endif

        <div class="text-center mt-5">
            <a href="{{ route('products') }}" class="btn btn-primary" style="padding:0.85rem 2.5rem;font-size:1rem;">
                Explore All Products &rarr;
            </a>
        </div>

    </div>
</section>

{{-- ===== WHY CHOOSE US ===== --}}
<section class="section-padding" style="background: linear-gradient(180deg, var(--secondary-black) 0%, var(--primary-black) 100%);">
    <div class="container">

        {{-- Heading --}}
        <div class="text-center mb-5">
            <p class="mb-2" style="color:var(--primary-gold);font-size:0.85rem;letter-spacing:2px;text-transform:uppercase;font-weight:600;">Our Strengths</p>
            <h2 class="mb-2">Why Choose Us?</h2>
            <p style="color:var(--text-gray);max-width:520px;margin:0 auto;font-size:0.95rem;">
                We combine quality, reliability and global reach to deliver value at every step.
            </p>
        </div>

        {{-- Row 1: 3 cards --}}
        <div class="row g-4 mb-4">
            <div class="col-12 col-md-4">
                <div class="why-card animate-zoom-in delay-100">
                    <div class="why-card-icon">🌾</div>
                    <div class="why-card-num">01</div>
                    <h3 class="why-card-title">Farm-Fresh Quality</h3>
                    <p class="why-card-desc">Handpicked produce sourced directly from organic-certified farms across India — ensuring freshness from soil to shipment.</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="why-card animate-zoom-in delay-200">
                    <div class="why-card-icon">💰</div>
                    <div class="why-card-num">02</div>
                    <h3 class="why-card-title">Competitive Pricing</h3>
                    <p class="why-card-desc">Direct farm sourcing eliminates middlemen, giving you the best market rates without compromising on quality.</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="why-card animate-zoom-in delay-300">
                    <div class="why-card-icon">🚚</div>
                    <div class="why-card-num">03</div>
                    <h3 class="why-card-title">Timely Delivery</h3>
                    <p class="why-card-desc">We work with trusted logistics partners to ensure your cargo arrives on schedule — every time, no exceptions.</p>
                </div>
            </div>
        </div>

        {{-- Row 2: 2 cards centered --}}
        <div class="row g-4 justify-content-center">
            <div class="col-12 col-md-5">
                <div class="why-card animate-zoom-in delay-400">
                    <div class="why-card-icon">📋</div>
                    <div class="why-card-num">04</div>
                    <h3 class="why-card-title">Professional Export Documentation</h3>
                    <p class="why-card-desc">From Phytosanitary certificates to customs clearance — our documentation team handles all export paperwork with precision.</p>
                </div>
            </div>
            <div class="col-12 col-md-5">
                <div class="why-card animate-zoom-in delay-400" style="animation-delay:0.5s;">
                    <div class="why-card-icon">🤝</div>
                    <div class="why-card-num">05</div>
                    <h3 class="why-card-title">Customer-Centric Approach</h3>
                    <p class="why-card-desc">Your satisfaction is our priority. We provide personalised solutions, transparent communication and dedicated after-sales support.</p>
                </div>
            </div>
        </div>

    </div>
</section>


{{-- ===== MISSION & VISION ===== --}}
<section class="section-padding">
    <div class="container">
        <h2 class="text-center mb-5">Our Mission &amp; Vision</h2>
        <div class="row g-4">
            <div class="col-12 col-md-6">
                <div class="glass-card animate-fade-left text-center h-100">
                    <div style="font-size:3rem;margin-bottom:1rem;">🔭</div>
                    <h3>Our Vision</h3>
                    <p style="color:var(--text-gray);font-size:1.05rem;line-height:1.8;">
                        To be a globally recognized agricultural exporter and trader, renowned for excellence, innovation, and sustainable practices.
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="glass-card animate-fade-right h-100">
                    <div style="font-size:3rem;margin-bottom:1rem;text-align:center;">🎯</div>
                    <h3 class="text-center">Our Mission</h3>
                    <ul class="mt-3" style="list-style:none;padding:0;color:var(--text-gray);display:flex;flex-direction:column;gap:0.9rem;">
                        <li style="display:flex;align-items:flex-start;gap:0.75rem;">
                            <span style="color:var(--primary-gold);font-size:1.1rem;margin-top:2px;">✦</span>
                            <span>Deliver world-class agricultural products to domestic and international markets.</span>
                        </li>
                        <li style="display:flex;align-items:flex-start;gap:0.75rem;">
                            <span style="color:var(--primary-gold);font-size:1.1rem;margin-top:2px;">✦</span>
                            <span>Promote sustainable farming and ethical trade.</span>
                        </li>
                        <li style="display:flex;align-items:flex-start;gap:0.75rem;">
                            <span style="color:var(--primary-gold);font-size:1.1rem;margin-top:2px;">✦</span>
                            <span>Maintain consistent quality and on-time delivery to ensure customer satisfaction.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== CERTIFICATIONS ===== --}}
<section class="section-padding bg-secondary-dark">
    <div class="container">
        <div class="text-center mb-5">
            <p class="mb-2" style="color:var(--primary-gold);font-size:0.85rem;letter-spacing:2px;text-transform:uppercase;font-weight:600;">Our Credentials</p>
            <h2 class="mb-2">Certifications</h2>
            <p style="color:var(--text-gray);max-width:560px;margin:0 auto;font-size:0.95rem;">
                Backed by recognized certifications ensuring quality, safety, and compliance at every step.
            </p>
        </div>

        {{-- Certificate badges - single flex row --}}
        <div class="d-flex flex-wrap justify-content-center gap-5">

            <div class="cert-badge animate-zoom-in" style="animation-delay:0s;">
                <div class="cert-badge-icon" style="background:linear-gradient(135deg,#2e7d32,#4caf50);">🌿</div>
                <div class="cert-badge-acronym">APEDA</div>
                <div class="cert-badge-name">Agri. & Processed Food<br>Products Export Authority</div>
            </div>

            <div class="cert-badge animate-zoom-in" style="animation-delay:0.1s;">
                <div class="cert-badge-icon" style="background:linear-gradient(135deg,#1565c0,#42a5f5);">🏅</div>
                <div class="cert-badge-acronym">ISO</div>
                <div class="cert-badge-name">ISO 9001:2015<br>Quality Management</div>
            </div>

            <div class="cert-badge animate-zoom-in" style="animation-delay:0.2s;">
                <div class="cert-badge-icon" style="background:linear-gradient(135deg,#e65100,#ff9800);">🌾</div>
                <div class="cert-badge-acronym">FSSAI</div>
                <div class="cert-badge-name">Food Safety &amp;<br>Standards Authority</div>
            </div>

            <div class="cert-badge animate-zoom-in" style="animation-delay:0.3s;">
                <div class="cert-badge-icon" style="background:linear-gradient(135deg,#4a148c,#9c27b0);">🌱</div>
                <div class="cert-badge-acronym">PGS</div>
                <div class="cert-badge-name">Participatory<br>Guarantee System</div>
            </div>

            <div class="cert-badge animate-zoom-in" style="animation-delay:0.4s;">
                <div class="cert-badge-icon" style="background:linear-gradient(135deg,#00695c,#26a69a);">📜</div>
                <div class="cert-badge-acronym">Phyto</div>
                <div class="cert-badge-name">Phytosanitary<br>Certification</div>
            </div>

        </div>

    </div>
</section>

@endsection