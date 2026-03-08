<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - AVmountain</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}?v={{ time() }}">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] { display: none !important; }
        .admin-container {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background: var(--sidebar-bg);
            backdrop-filter: blur(10px);
            border-right: 1px solid var(--border-color);
            padding: 2rem 1rem;
            display: flex;
            flex-direction: column;
        }
        .sidebar-logo {
            text-align: center;
            margin-bottom: 3rem;
        }
        .sidebar-menu {
            list-style: none;
        }
        .sidebar-menu li {
            margin-bottom: 1rem;
        }
        .sidebar-menu a {
            color: var(--text-gray);
            text-decoration: none;
            display: block;
            padding: 0.8rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .sidebar-menu a:hover, .sidebar-menu a.active {
            background: rgba(255, 255, 255, 0.1);
            color: var(--primary-gold);
        }
        .main-content {
            flex: 1;
            padding: 2rem;
            background: var(--primary-black);
            color: var(--text-white);
        }
        /* Mobile sidebar toggle would be needed for full responsiveness, skipping for now */
    </style>
    @livewireStyles
</head>
<body x-data="{ sidebarOpen: false }" class="{{ $activeTheme ?? 'theme-gold' }}">

    <div class="admin-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-logo">
                <h3 style="color: var(--primary-gold);">AV Admin</h3>
                <!-- Debug Theme -->
                <small style="color: red; display: block; font-size: 10px;">Current Theme: {{ $activeTheme ?? 'NOT SET' }}</small>
            </div>
            
            <ul class="sidebar-menu">
                <li><a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a></li>
                <li><a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories*') ? 'active' : '' }}">Categories</a></li>
                <li><a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products*') ? 'active' : '' }}">Products</a></li>
                <li><a href="{{ route('admin.settings.index') }}" class="{{ request()->routeIs('admin.settings*') ? 'active' : '' }}">Settings</a></li>
                
                <li><a href="{{ route('home') }}" target="_blank">Back to Website ↗</a></li>
                
                <li style="margin-top: auto; border-top: 1px solid var(--glass-border); padding-top: 1rem;">
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" style="background: none; border: none; color: #ff4444; width: 100%; text-align: left; padding: 0.8rem 1rem; cursor: pointer;">Logout</button>
                    </form>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            @yield('content')
        </main>
    </div>

    @livewireScripts
</body>
</html>
