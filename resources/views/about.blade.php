@extends('layouts.app')

@section('title', 'About Us')

@section('content')

{{-- ===== PAGE HEADER ===== --}}
<div class="page-header text-center">
    <div class="container">
        <p style="color:var(--primary-gold);font-size:0.85rem;letter-spacing:2px;text-transform:uppercase;font-weight:600;margin-bottom:0.5rem;">Who We Are</p>
        <h1 class="animate-zoom-in">About AVmountain</h1>
        <p class="mx-auto mt-2" style="color:var(--text-gray);max-width:600px;font-size:1rem;">
            A trusted supplier and exporter of premium agricultural commodities, rooted in India's fertile heartland.
        </p>
    </div>
</div>

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
                                <div style="font-size:0.75rem;color:var(--primary-gold);text-transform:uppercase;letter-spacing:1px;font-weight:600;margin-bottom:2px;">Key Markets</div>
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
                            <span style="font-size:1.3rem;margin-top:2px;">📞</span>
                            <div>
                                <div style="font-size:0.75rem;color:var(--primary-gold);text-transform:uppercase;letter-spacing:1px;font-weight:600;margin-bottom:2px;">Business Focus</div>
                                <div style="color:var(--text-white);font-size:0.95rem;">Quality Export · Ethical Sourcing · Timely Delivery</div>
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
                        To be a globally recognized agricultural exporter and trader, renowned for excellence, innovation, and sustainable practices — bridging India's organic farms to world-class markets.
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
                            <p style="color:var(--text-gray);margin:0;font-size:0.93rem;line-height:1.65;">Deliver world-class agricultural products to domestic and international markets.</p>
                        </div>
                        <div style="display:flex;align-items:flex-start;gap:0.75rem;">
                            <span style="color:var(--primary-gold);font-size:1.1rem;margin-top:3px;flex-shrink:0;">✦</span>
                            <p style="color:var(--text-gray);margin:0;font-size:0.93rem;line-height:1.65;">Promote sustainable farming practices and ethical trade partnerships worldwide.</p>
                        </div>
                        <div style="display:flex;align-items:flex-start;gap:0.75rem;">
                            <span style="color:var(--primary-gold);font-size:1.1rem;margin-top:3px;flex-shrink:0;">✦</span>
                            <p style="color:var(--text-gray);margin:0;font-size:0.93rem;line-height:1.65;">Maintain consistent quality and on-time delivery to ensure customer satisfaction.</p>
                        </div>
                        <div style="display:flex;align-items:flex-start;gap:0.75rem;">
                            <span style="color:var(--primary-gold);font-size:1.1rem;margin-top:3px;flex-shrink:0;">✦</span>
                            <p style="color:var(--text-gray);margin:0;font-size:0.93rem;line-height:1.65;">Build long-term relationships founded on integrity, transparency and shared growth.</p>
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
            <h2 class="mb-2">Certifications</h2>
            <p style="color:var(--text-gray);max-width:560px;margin:0 auto;font-size:0.95rem;">
                Backed by recognized certifications ensuring quality, safety, and compliance at every step.
            </p>
        </div>

        <div class="d-flex flex-wrap justify-content-center gap-5">

            <div class="cert-badge animate-zoom-in" style="animation-delay:0s;">
                <div class="cert-badge-icon" style="background:linear-gradient(135deg,#2e7d32,#4caf50);">🌿</div>
                <div class="cert-badge-acronym">APEDA</div>
                <div class="cert-badge-name">Agri. &amp; Processed Food<br>Products Export Authority</div>
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