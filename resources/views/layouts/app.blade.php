<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AVmountain Private Limited') - Premium Exporters</title>

    {{-- Favicon --}}
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/logo.svg') }}">

    {{-- Bootstrap 5 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Custom Theme CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}?v={{ time() }}">

    {{-- Alpine.js --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @livewireStyles
</head>
<body x-data="{ mobileMenuOpen: false, scrolled: false }"
      @scroll.window="scrolled = (window.pageYOffset > 20)"
      class="theme-gold">

    {{-- ===== NAVBAR ===== --}}
    <header :class="{ 'header-scrolled': scrolled }">
        <div class="nav-container container-fluid px-3">
            <div class="navbar-semicircle" :class="{ 'header-scrolled': scrolled }">

                {{-- Logo --}}
                <a href="{{ route('home') }}" class="logo">
                    <div style="width:130px;height:38px;background-color:var(--primary-gold);
                        -webkit-mask:url('{{ asset('images/logo.svg') }}') no-repeat center;
                        mask:url('{{ asset('images/logo.svg') }}') no-repeat center;
                        -webkit-mask-size:contain;mask-size:contain;
                        transition:background-color 0.3s ease;"></div>
                </a>

                {{-- Mobile Hamburger (animates to X when open) --}}
                <div class="hamburger" :class="{ 'is-open': mobileMenuOpen }" @click="mobileMenuOpen = !mobileMenuOpen">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>

                {{-- Nav Links --}}
                <ul class="nav-links" :class="{'active': mobileMenuOpen}">
                    <li>
                        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                        <div class="nav-indicator-arrow"></div>
                    </li>
                    <li class="dropdown">
                        <a href="{{ route('products') }}" class="{{ request()->routeIs('products*') ? 'active' : '' }}">Products</a>
                        <div class="nav-indicator-arrow"></div>
                        <ul class="dropdown-menu">
                            @foreach(\App\Models\ProductCategory::where('status', true)->get() as $navCategory)
                                <li><a href="{{ route('products.show', $navCategory->slug) }}">{{ $navCategory->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('export-process') }}" class="{{ request()->routeIs('export-process') ? 'active' : '' }}">Export Process</a>
                        <div class="nav-indicator-arrow"></div>
                    </li>
                    <li>
                        <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About Us</a>
                        <div class="nav-indicator-arrow"></div>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
                        <div class="nav-indicator-arrow"></div>
                    </li>
                    @auth
                        <li class="d-lg-none" style="margin-top:1rem;">
                            <a href="{{ route('admin.dashboard') }}" style="color:var(--primary-gold);">Admin Dashboard</a>
                        </li>
                    @endauth
                </ul>

                {{-- Admin Button (Desktop) --}}
                <div class="admin-btn-container">
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="btn-admin-outline">Admin</a>
                    @else
                        <a href="{{ route('contact') }}" class="btn-admin-outline">Get Quote</a>
                    @endauth
                </div>

            </div>
        </div>
    </header>

    {{-- Dim overlay — closes nav when tapped outside --}}
    <div class="nav-overlay" :class="{ 'active': mobileMenuOpen }" @click="mobileMenuOpen = false"></div>

    {{-- ===== MAIN ===== --}}
    <main>
        @yield('content')
    </main>

    {{-- ===== FOOTER ===== --}}
    <footer class="site-footer">
        <div class="container">
            <div class="row g-4 pb-4">

                {{-- Col 1: Brand --}}
                <div class="col-12 col-sm-6 col-lg-4">
                    <h3 class="footer-brand">AVmountain</h3>
                    <p class="footer-tagline">Delivering Nature's Goodness Worldwide &mdash; connecting organic Indian farms to global markets.</p>
                    <p class="mt-3" style="color:var(--primary-gold);font-size:0.85rem;letter-spacing:1px;text-transform:uppercase;">Est. 2025 &middot; Salem, India</p>
                </div>

                {{-- Col 2: Company Details --}}
                <div class="col-12 col-sm-6 col-lg-3">
                    <h4 class="footer-heading">Company Details</h4>
                    <ul class="footer-list">
                        <li>
                            <span class="footer-icon">&#128205;</span>
                            Perumagoundanur, Periyasoragai Post,<br>Salem District &ndash; 636502,<br>Tamil Nadu, India
                        </li>
                        <li>
                            <span class="footer-icon">&#9993;</span>
                            <a href="mailto:av23mountain@gmail.com">av23mountain@gmail.com</a>
                        </li>
                        <li>
                            <span class="footer-icon">&#127760;</span>
                            Middle East &middot; Europe &middot; Asia<br>North America &middot; Africa
                        </li>
                    </ul>
                </div>

                {{-- Col 3: Quick Links --}}
                <div class="col-6 col-sm-6 col-lg-2">
                    <h4 class="footer-heading">Quick Links</h4>
                    <ul class="footer-list footer-links">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('products') }}">Products</a></li>
                        <li><a href="{{ route('export-process') }}">Export Process</a></li>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>

                {{-- Col 4: Our Products --}}
                <div class="col-6 col-sm-6 col-lg-3">
                    <h4 class="footer-heading">Our Products</h4>
                    <ul class="footer-list footer-links">
                        @foreach(\App\Models\ProductCategory::where('status', true)->get() as $footerCat)
                            <li><a href="{{ route('products.show', $footerCat->slug) }}">{{ $footerCat->name }}</a></li>
                        @endforeach
                        @if(\App\Models\ProductCategory::where('status', true)->count() === 0)
                            <li><a href="{{ route('products') }}">Agricultural Commodities</a></li>
                            <li><a href="{{ route('products') }}">Coconuts &amp; Derivatives</a></li>
                            <li><a href="{{ route('products') }}">Grains &amp; Pulses</a></li>
                            <li><a href="{{ route('products') }}">Fresh Vegetables</a></li>
                        @endif
                    </ul>
                </div>

            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <p class="mb-1">&copy; {{ date('Y') }} AVmountain Private Limited. All Rights Reserved.</p>
                <p class="mb-0" style="font-size:0.8rem;">Premium Agricultural Exports from India to the World &#127806;</p>
            </div>
        </div>
    </footer>

    {{-- Counter Animation Script --}}
    <script>
        (function () {
            const counters = document.querySelectorAll('.counter');
            if (!counters.length) return;
            const duration = 1800;
            function animateCounter(el) {
                const target = parseInt(el.getAttribute('data-target'), 10);
                const start = performance.now();
                function step(now) {
                    const elapsed = now - start;
                    const progress = Math.min(elapsed / duration, 1);
                    const eased = 1 - Math.pow(1 - progress, 3);
                    el.textContent = Math.floor(eased * target);
                    if (progress < 1) requestAnimationFrame(step);
                    else el.textContent = target;
                }
                requestAnimationFrame(step);
            }
            const observer = new IntersectionObserver(function (entries, obs) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) { animateCounter(entry.target); obs.unobserve(entry.target); }
                });
            }, { threshold: 0.3 });
            counters.forEach(function (counter) { observer.observe(counter); });
        })();
    </script>

    {{-- Bootstrap 5 JS Bundle --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Interactive Half-Cylinder Side Card --}}
    <style>
        .side-widget {
            position: fixed;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            z-index: 1050;
            display: flex;
            align-items: center;
            pointer-events: none;
        }
        .side-tab {
            background: rgba(15, 15, 15, 0.6);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border-top: 2px solid var(--primary-gold);
            border-bottom: 2px solid var(--primary-gold);
            border-right: 2px solid var(--primary-gold);
            border-left: none;
            border-top-right-radius: 35px;
            border-bottom-right-radius: 35px;
            width: 60px;
            height: 55px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            pointer-events: auto;
            transition: all 0.3s ease;
            padding-right: 6px;
            padding-left: 2px;
        }
        .side-tab:hover {
            background: rgba(40, 40, 40, 0.4); /* subtle hover effect so it's clickable */
            width: 70px;
        }
        .side-tab-logo {
            width: 50px;
            height: 40px;
            background-color: var(--primary-gold);
            -webkit-mask: url('{{ asset('images/logo.svg') }}') no-repeat center;
            mask: url('{{ asset('images/logo.svg') }}') no-repeat center;
            -webkit-mask-size: contain;
            mask-size: contain;
            transition: transform 0.3s ease;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.6));
        }
        .side-tab:hover .side-tab-logo {
            transform: scale(1.08);
            background-color: #FFFFFF;
        }
        
        /* Mobile Responsiveness for Side Tab */
        @media (max-width: 768px) {
            .side-tab {
                width: 70px;
                height: 60px;
                border-top-right-radius: 40px;
                border-bottom-right-radius: 40px;
                padding-right: 6px;
                padding-left: 4px;
            }
            .side-tab:hover {
                width: 80px;
            }
            .side-tab-logo {
                width: 40px;
                height: 30px;
            }
            .side-features {
                width: 200px;
                padding: 0.8rem;
                margin-left: 5px;
            }
            .side-features h4 {
                font-size: 0.9rem !important;
                margin-bottom: 0.8rem !important;
                padding-bottom: 0.5rem !important;
            }
            .feature-item {
                font-size: 0.75rem;
                gap: 8px;
                margin-bottom: 0.7rem;
            }
            .feature-icon-wrapper {
                width: 28px;
                height: 28px;
                font-size: 0.85rem;
            }
        }
        
        .side-features {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid var(--primary-gold);
            border-radius: 16px;
            margin-left: 20px;
            padding: 1.5rem;
            pointer-events: auto;
            box-shadow: 0 10px 30px rgba(0,0,0,0.6);
            width: 280px;
        }
        
        .feature-item {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 1rem;
            color: var(--text-white);
            font-size: 1rem;
            transition: transform 0.2s ease, color 0.2s ease;
        }
        .feature-item:last-child {
            margin-bottom: 0;
        }
        .feature-item:hover {
            transform: translateX(10px);
            color: var(--primary-gold);
        }
        .feature-icon-wrapper {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(212, 175, 55, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-gold);
            font-size: 1.2rem;
            flex-shrink: 0;
            border: 1px solid rgba(212, 175, 55, 0.3);
        }
    </style>

    <div class="side-widget" x-data="{ open: false }">
        <div class="side-tab" @click="open = !open" title="Click to view our highlights">
            <div class="side-tab-logo"></div>
        </div>

        <div class="side-features" 
             x-show="open" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-x-[-50px]"
             x-transition:enter-end="opacity-100 translate-x-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-x-0"
             x-transition:leave-end="opacity-0 translate-x-[-50px]"
             x-cloak
             @click.away="open = false">
             
             <h4 style="font-size: 1.1rem; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 0.8rem; margin-bottom: 1.2rem; text-align: center;">Why AVmountain?</h4>
             
             <div class="feature-item">
                 <div class="feature-icon-wrapper">🌿</div>
                 <div>100% Organic Quality</div>
             </div>
             
             <div class="feature-item">
                 <div class="feature-icon-wrapper">🚜</div>
                 <div>Direct Farm Sourcing</div>
             </div>
             
             <div class="feature-item">
                 <div class="feature-icon-wrapper">🌍</div>
                 <div>Global Export Reach</div>
             </div>
             
             <div class="feature-item">
                 <div class="feature-icon-wrapper">⭐</div>
                 <div>Premium Grade Processing</div>
             </div>
             
             <div class="feature-item">
                 <div class="feature-icon-wrapper">🛡️</div>
                 <div>Certified Standards</div>
             </div>
             
        </div>
    </div>

    @livewireScripts
</body>
</html>