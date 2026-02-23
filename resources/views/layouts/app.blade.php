<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AVmountain Private Limited') - Premium Exporters</title>

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

    @livewireScripts
</body>
</html>