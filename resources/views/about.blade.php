@extends('layouts.app')

@section('title', 'About Us')

@section('content')

{{-- ===== PAGE HEADER ===== --}}
{{-- ===== HERO HEADER ===== --}}
<section class="hero" style="background: linear-gradient(to right, rgba(15, 15, 15, 0.9) 0%, rgba(15, 15, 15, 0.4) 100%), url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=2000&auto=format&fit=crop') no-repeat center center; background-size: cover; min-height: 50vh; display: flex; align-items: center; text-align: center; border-bottom: 2px solid var(--primary-gold);">
    <div class="container hero-content" style="padding-top: 5rem;">
        <p class="animate-fade-up" style="color:var(--primary-gold);font-size:0.95rem;letter-spacing:3px;text-transform:uppercase;font-weight:600;margin-bottom:0.75rem;">Who We Are</p>
        <h1 class="animate-zoom-in" style="font-size: 3.5rem; margin-bottom: 1rem;">About AVmountain</h1>
        <p class="mx-auto animate-fade-up delay-200" style="color:#f0f0f0;max-width:650px;font-size:1.1rem;line-height:1.6;">
            A trusted supplier and exporter of premium agricultural commodities, rooted in India's fertile heartland.
        </p>
    </div>
</section>

{{-- ===== COMPANY OVERVIEW (separate section) ===== --}}
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <p style="color:var(--primary-gold);font-size:0.85rem;letter-spacing:2px;text-transform:uppercase;font-weight:600;margin-bottom:0.4rem;">At a Glance</p>
            <h2>Company Overview</h2>
        </div>

        <div class="glass-card animate-fade-left">
            <div class="row g-4">

                <div class="col-12 col-md-6">
                    <div style="display:flex;flex-direction:column;gap:1.1rem;">
                        <div style="display:flex;gap:0.85rem;align-items:flex-start;">
                            <span style="font-size:1.3rem;margin-top:2px;">🏷️</span>
                            <div>
                                <div style="font-size:0.75rem;color:var(--primary-gold);text-transform:uppercase;letter-spacing:1px;font-weight:600;margin-bottom:2px;">Name</div>
                                <div style="color:var(--text-white);font-size:0.95rem;">AVmountain Private Limited</div>
                            </div>
                        </div>
                        <div style="display:flex;gap:0.85rem;align-items:flex-start;">
                            <span style="font-size:1.3rem;margin-top:2px;">📅</span>
                            <div>
                                <div style="font-size:0.75rem;color:var(--primary-gold);text-transform:uppercase;letter-spacing:1px;font-weight:600;margin-bottom:2px;">Established</div>
                                <div style="color:var(--text-white);font-size:0.95rem;">2025</div>
                            </div>
                        </div>
                        <div style="display:flex;gap:0.85rem;align-items:flex-start;">
                            <span style="font-size:1.3rem;margin-top:2px;">📍</span>
                            <div>
                                <div style="font-size:0.75rem;color:var(--primary-gold);text-transform:uppercase;letter-spacing:1px;font-weight:600;margin-bottom:2px;">Headquarters</div>
                                <div style="color:var(--text-white);font-size:0.95rem;">Perumagoundanur, Periyasoragai post, Salem District – 636502, Tamil Nadu, India</div>
                            </div>
                        </div>
                        <div style="display:flex;gap:0.85rem;align-items:flex-start;">
                            <span style="font-size:1.3rem;margin-top:2px;">🤝</span>
                            <div>
                                <div style="font-size:0.75rem;color:var(--primary-gold);text-transform:uppercase;letter-spacing:1px;font-weight:600;margin-bottom:2px;">Business Type</div>
                                <div style="color:var(--text-white);font-size:0.95rem;">Export &amp; Intra / Inter-State Trade</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div style="display:flex;flex-direction:column;gap:1.1rem;">
                        <div style="display:flex;gap:0.85rem;align-items:flex-start;">
                            <span style="font-size:1.3rem;margin-top:2px;">🌾</span>
                            <div>
                                <div style="font-size:0.75rem;color:var(--primary-gold);text-transform:uppercase;letter-spacing:1px;font-weight:600;margin-bottom:2px;">Primary Products</div>
                                <div style="color:var(--text-white);font-size:0.95rem;">Agricultural Commodities, Coconuts &amp; Vegetables</div>
                            </div>
                        </div>
                        <div style="display:flex;gap:0.85rem;align-items:flex-start;">
                            <span style="font-size:1.3rem;margin-top:2px;">🌍</span>
                            <div>
                                <div style="font-size:0.75rem;color:var(--primary-gold);text-transform:uppercase;letter-spacing:1px;font-weight:600;margin-bottom:2px;">Export Regions</div>
                                <div style="color:var(--text-white);font-size:0.95rem;">Middle East, Europe, Asia, North America, Africa</div>
                            </div>
                        </div>
                        <div style="display:flex;gap:0.85rem;align-items:flex-start;">
                            <span style="font-size:1.3rem;margin-top:2px;">✉️</span>
                            <div>
                                <div style="font-size:0.75rem;color:var(--primary-gold);text-transform:uppercase;letter-spacing:1px;font-weight:600;margin-bottom:2px;">Email</div>
                                <div style="color:var(--text-white);font-size:0.95rem;">av23mountain@gmail.com</div>
                            </div>
                        </div>
                        <div style="display:flex;gap:0.85rem;align-items:flex-start;">
                            <span style="font-size:1.3rem;margin-top:2px;">📱</span>
                            <div>
                                <div style="font-size:0.75rem;color:var(--primary-gold);text-transform:uppercase;letter-spacing:1px;font-weight:600;margin-bottom:2px;">Social & Presence</div>
                                <div style="color:var(--text-white);font-size:0.95rem;">
                                    <a href="#" style="color:#fff;text-decoration:none;" class="me-2">Instagram</a> | 
                                    <a href="#" style="color:#fff;text-decoration:none;" class="mx-2">LinkedIn</a> | 
                                    <a href="#" style="color:#fff;text-decoration:none;" class="ms-2">YouTube</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

{{-- ===== MISSION & VISION (separate section) ===== --}}
<section class="section-padding bg-secondary-dark">
    <div class="container">
        <div class="text-center mb-5">
            <p style="color:var(--primary-gold);font-size:0.85rem;letter-spacing:2px;text-transform:uppercase;font-weight:600;margin-bottom:0.4rem;">What Drives Us</p>
            <h2>Our Mission &amp; Vision</h2>
        </div>

        <div class="row g-4">

            {{-- Vision --}}
            <div class="col-12 col-md-6">
                <div class="glass-card animate-fade-left h-100">
                    <div style="font-size:2.8rem;margin-bottom:1rem;">🔭</div>
                    <h3 style="margin-bottom:1rem;">Our Vision</h3>
                    <p style="color:var(--text-gray);font-size:1rem;line-height:1.85;margin-bottom:1.5rem;">
                        To become a globally trusted agricultural exporter and trader, committed to delivering exceptional quality, driving innovation, and promoting sustainable, ethical farming practices that benefit farmers, customers, and the planet.
                    </p>
                    <div style="padding:1rem 1.25rem;background:rgba(212,175,55,0.07);border-left:3px solid var(--primary-gold);border-radius:0 8px 8px 0;">
                        <p style="color:var(--primary-gold);font-style:italic;margin:0;font-size:0.9rem;">"From Indian soil to global tables — delivering nature's finest."</p>
                    </div>
                </div>
            </div>

            {{-- Mission --}}
            <div class="col-12 col-md-6">
                <div class="glass-card animate-fade-right h-100">
                    <div style="font-size:2.8rem;margin-bottom:1rem;">🎯</div>
                    <h3 style="margin-bottom:1.25rem;">Our Mission</h3>
                    <div style="display:flex;flex-direction:column;gap:1.1rem;">
                        <div style="display:flex;align-items:flex-start;gap:0.75rem;">
                            <span style="color:var(--primary-gold);font-size:1.1rem;margin-top:3px;flex-shrink:0;">✦</span>
                            <p style="color:var(--text-gray);margin:0;font-size:0.93rem;line-height:1.65;">To connect organic local farmers directly to global markets while building long-term partnerships.</p>
                        </div>
                        <div style="display:flex;align-items:flex-start;gap:0.75rem;">
                            <span style="color:var(--primary-gold);font-size:1.1rem;margin-top:3px;flex-shrink:0;">✦</span>
                            <p style="color:var(--text-gray);margin:0;font-size:0.93rem;line-height:1.65;">To strictly maintain high quality, reliability, transparency, and sustainable agricultural practices.</p>
                        </div>
                        <div style="display:flex;align-items:flex-start;gap:0.75rem;">
                            <span style="color:var(--primary-gold);font-size:1.1rem;margin-top:3px;flex-shrink:0;">✦</span>
                            <p style="color:var(--text-gray);margin:0;font-size:0.93rem;line-height:1.65;">To fulfill unique global requirements via dedicated supply chains and personalized solutions.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ===== WHAT WE DO ===== --}}
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <p style="color:var(--primary-gold);font-size:0.85rem;letter-spacing:2px;text-transform:uppercase;font-weight:600;margin-bottom:0.4rem;">Our Operations</p>
            <h2>What We Do</h2>
        </div>
        <div class="row g-4 row-cols-1 row-cols-md-2 row-cols-lg-4">
            <div class="col">
                <div class="glass-card animate-zoom-in text-center" style="animation-delay:0s;">
                    <div style="font-size:2.4rem;margin-bottom:0.75rem;">🌱</div>
                    <h3 style="font-size:1.05rem;margin-bottom:0.5rem;">Farm Sourcing</h3>
                    <p style="color:var(--text-gray);font-size:0.88rem;margin:0;">Direct sourcing from organic-certified farms across Tamil Nadu and India.</p>
                </div>
            </div>
            <div class="col">
                <div class="glass-card animate-zoom-in text-center" style="animation-delay:0.1s;">
                    <div style="font-size:2.4rem;margin-bottom:0.75rem;">📦</div>
                    <h3 style="font-size:1.05rem;margin-bottom:0.5rem;">Packaging</h3>
                    <p style="color:var(--text-gray);font-size:0.88rem;margin:0;">Hygienic, export-grade packaging meeting international standards.</p>
                </div>
            </div>
            <div class="col">
                <div class="glass-card animate-zoom-in text-center" style="animation-delay:0.2s;">
                    <div style="font-size:2.4rem;margin-bottom:0.75rem;">🚢</div>
                    <h3 style="font-size:1.05rem;margin-bottom:0.5rem;">Global Export</h3>
                    <p style="color:var(--text-gray);font-size:0.88rem;margin:0;">Seamless logistics to Middle East, Europe, Asia, Americas &amp; Africa.</p>
                </div>
            </div>
            <div class="col">
                <div class="glass-card animate-zoom-in text-center" style="animation-delay:0.3s;">
                    <div style="font-size:2.4rem;margin-bottom:0.75rem;">📋</div>
                    <h3 style="font-size:1.05rem;margin-bottom:0.5rem;">Documentation</h3>
                    <p style="color:var(--text-gray);font-size:0.88rem;margin:0;">Full export documentation — Phytosanitary, APEDA, customs &amp; compliance.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== CERTIFICATIONS ===== --}}
<section class="section-padding bg-secondary-dark">
    <div class="container">
        <div class="text-center mb-5">
            <p class="mb-1" style="color:var(--primary-gold);font-size:0.85rem;letter-spacing:2px;text-transform:uppercase;font-weight:600;">Our Credentials</p>
            <h2 class="mb-2">Registration</h2>
            <p style="color:var(--text-gray);max-width:560px;margin:0 auto;font-size:0.95rem;">
                A formally registered entity committed to professional and ethical agricultural exports.
            </p>
        </div>

        <div class="d-flex flex-wrap justify-content-center gap-5">

            <div class="cert-badge animate-zoom-in" style="animation-delay:0s;">
                <div class="cert-badge-icon" style="background:linear-gradient(135deg,#d4af37,#aa8c2c);">🏢</div>
                <div class="cert-badge-acronym">CIN Reg.</div>
                <div class="cert-badge-name">Registered as<br>Private Limited</div>
            </div>

        </div>
    </div>
</section>

@endsection