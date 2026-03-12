@extends('layouts.app')

@section('content')

{{-- ===== HERO ===== --}}
<section class="hero">
    <div class="hero-content container">
        <h1 class="animate-zoom-in">Delivering Nature's<br>Goodness Worldwide</h1>
        <p class="animate-fade-up delay-200 mb-4" style="max-width: 800px; margin: 0 auto; color:#f0f0f0;">Connecting organic local farmers directly to global markets with a focus on high quality, transparency, and sustainable practices.</p>
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
                AVmountain Private Limited is a trusted supplier and exporter of premium agricultural products. We specialize in Coconuts, Grains, Pulses, and Fresh Vegetables. 
                With a commitment to delivering trusted products and building long-term partnerships, we ensure a reliable supply chain tailored to fulfill the unique requirements of our global customers.
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
            <p style="color:var(--text-gray);max-width:650px;margin:0 auto;">
                At AVmountain Private Limited, we bring you a curated selection of premium farm-fresh products. 
                Coconuts: Fresh, desiccated, and processed varieties | Grains: Rice, wheat, millet, and other staples | Pulses: Lentils, chickpeas, beans, etc. | Vegetables: Fresh and seasonal varieties.
            </p>
        </div>

        @if($categories->count() > 0)
            @php $colClass = $categories->count() <= 2 ? 'row-cols-1 row-cols-md-2' : 'row-cols-1 row-cols-md-2 row-cols-lg-3'; @endphp
            <div class="row g-4 {{ $colClass }}">
                @foreach($categories as $category)
                <div class="col">
                    <div class="product-card animate-slide-up" style="animation-delay:{{ $loop->index * 0.1 }}s;">
                        <div style="height:200px;overflow:hidden;position:relative;">
                            <img src="{{ $category->hero_image_url }}"
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
                    <p class="why-card-desc">We deliver 100% organic, farm-fresh products with natural taste and high nutrition</p>
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
                    <div class="why-card-icon">🌍</div>
                    <div class="why-card-num">03</div>
                    <h3 class="why-card-title">Global Trade</h3>
                    <p class="why-card-desc">Reliable worldwide shipping with the highest quality and safety standards</p>
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
                    <h3 class="why-card-title">Customer Centric</h3>
                    <p class="why-card-desc">Committed to understanding and fulfilling every customer’s unique needs</p>
                </div>
            </div>
        </div>

    </div>
</section>


{{-- ===== OUR CAPABILITIES & EXPORT PROCESS ===== --}}
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <p class="mb-2" style="color:var(--primary-gold);font-size:0.85rem;letter-spacing:2px;text-transform:uppercase;font-weight:600;">Reach & Process</p>
            <h2 class="mb-3">Trade Capabilities</h2>
            <p style="color:var(--text-gray);max-width:650px;margin:0 auto;">
                We aim to connect farms to markets - locally, nationally, and globally. Our expertise covers:
            </p>
        </div>

        <div class="row g-4 mt-2">
            <div class="col-12 col-md-4">
                <div class="glass-card animate-fade-right h-100 text-center" style="padding: 2.5rem 1.5rem;">
                    <div style="font-size:3rem;margin-bottom:1rem;">🏘️</div>
                    <h3 style="font-size:1.4rem;margin-bottom:1rem;">Intra-state Trade</h3>
                    <p style="color:var(--text-gray);font-size:0.95rem;">Supplying fresh agricultural products across districts and states within India</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="glass-card animate-zoom-in h-100 text-center" style="padding: 2.5rem 1.5rem;">
                    <div style="font-size:3rem;margin-bottom:1rem;">🛣️</div>
                    <h3 style="font-size:1.4rem;margin-bottom:1rem;">Inter-state Trade</h3>
                    <p style="color:var(--text-gray);font-size:0.95rem;">Bridging Indian states to deliver seasonal and specialty crops</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="glass-card animate-fade-left h-100 text-center" style="padding: 2.5rem 1.5rem;">
                    <div style="font-size:3rem;margin-bottom:1rem;">🚢</div>
                    <h3 style="font-size:1.4rem;margin-bottom:1rem;">Global Trade</h3>
                    <p style="color:var(--text-gray);font-size:0.95rem;">Exporting top-quality agricultural products to international markets worldwide</p>
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
            <h2 class="mb-2">Registration</h2>
            <p style="color:var(--text-gray);max-width:560px;margin:0 auto;font-size:0.95rem;">
                A formally registered entity committed to professional and ethical agricultural exports.
            </p>
        </div>

        {{-- Certificate badges - single flex row --}}
        <div class="d-flex flex-wrap justify-content-center gap-5">

            <div class="cert-badge animate-zoom-in" style="animation-delay:0s;">
                <div class="cert-badge-icon" style="background:linear-gradient(135deg,#d4af37,#aa8c2c);">🏢</div>
                <div class="cert-badge-acronym">CIN Reg.</div>
                <div class="cert-badge-name">Registered as<br>Private Limited</div>
            </div>

        </div>

    </div>
</section>

{{-- ===== FAQs ===== --}}
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <p class="mb-2" style="color:var(--primary-gold);font-size:0.85rem;letter-spacing:2px;text-transform:uppercase;font-weight:600;">Got Questions?</p>
            <h2 class="mb-3">Frequently Asked Questions</h2>
            <p style="color:var(--text-gray);max-width:650px;margin:0 auto;">
                Find quick answers to common questions about our products, sourcing, and global export processes.
            </p>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="accordion" id="faqAccordion">
                    
                    {{-- FAQ 1 --}}
                    <div class="accordion-item" style="background:rgba(255,255,255,0.03);border:1px solid var(--glass-border);border-radius:10px;margin-bottom:1rem;overflow:hidden;">
                        <h2 class="accordion-header" id="faqHeadingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseOne" aria-expanded="false" aria-controls="faqCollapseOne" style="background:transparent;color:#fff;box-shadow:none;padding:1.25rem;">
                                <strong>What products do you primarily export?</strong>
                            </button>
                        </h2>
                        <div id="faqCollapseOne" class="accordion-collapse collapse" aria-labelledby="faqHeadingOne" data-bs-parent="#faqAccordion">
                            <div class="accordion-body" style="color:var(--text-gray);border-top:1px solid rgba(255,255,255,0.05);padding:1.25rem;">
                                We specialize in exporting premium agricultural commodities, with a primary focus on fresh Coconuts, a variety of Grains, Nutrient-rich Pulses, and Fresh Vegetables sourced directly from Indian farms.
                            </div>
                        </div>
                    </div>

                    {{-- FAQ 2 --}}
                    <div class="accordion-item" style="background:rgba(255,255,255,0.03);border:1px solid var(--glass-border);border-radius:10px;margin-bottom:1rem;overflow:hidden;">
                        <h2 class="accordion-header" id="faqHeadingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseTwo" aria-expanded="false" aria-controls="faqCollapseTwo" style="background:transparent;color:#fff;box-shadow:none;padding:1.25rem;">
                                <strong>How do you ensure the quality of your products?</strong>
                            </button>
                        </h2>
                        <div id="faqCollapseTwo" class="accordion-collapse collapse" aria-labelledby="faqHeadingTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body" style="color:var(--text-gray);border-top:1px solid rgba(255,255,255,0.05);padding:1.25rem;">
                                Quality is our top priority. We source directly from certified local farmers and enforce strict, multi-stage quality control checks and global trade standards before any shipment leaves our facilities.
                            </div>
                        </div>
                    </div>

                    {{-- FAQ 3 --}}
                    <div class="accordion-item" style="background:rgba(255,255,255,0.03);border:1px solid var(--glass-border);border-radius:10px;margin-bottom:1rem;overflow:hidden;">
                        <h2 class="accordion-header" id="faqHeadingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseThree" aria-expanded="false" aria-controls="faqCollapseThree" style="background:transparent;color:#fff;box-shadow:none;padding:1.25rem;">
                                <strong>Which countries do you currently export to?</strong>
                            </button>
                        </h2>
                        <div id="faqCollapseThree" class="accordion-collapse collapse" aria-labelledby="faqHeadingThree" data-bs-parent="#faqAccordion">
                            <div class="accordion-body" style="color:var(--text-gray);border-top:1px solid rgba(255,255,255,0.05);padding:1.25rem;">
                                We actively supply and export to various international markets, with a strong presence in the Middle East, Europe, Asia, North America, and Africa.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection