@extends('layouts.admin')

@section('content')
<div class="glass-card">
    <h2 style="margin-bottom: 2rem;">Site Settings</h2>

    @if(session('success'))
        <div style="background: rgba(0, 255, 0, 0.1); border: 1px solid limegreen; padding: 1rem; border-radius: 8px; margin-bottom: 1rem;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf
        <div style="margin-bottom: 2rem;">
            <h3 style="margin-bottom: 1rem; color: var(--text-gray);">Theme Selection</h3>
            
            <div class="grid-3" style="gap: 1rem;">
                <!-- Gold Theme -->
                <label style="cursor: pointer;">
                    <input type="radio" name="theme" value="theme-gold" {{ $theme->value === 'theme-gold' ? 'checked' : '' }} style="display: none;">
                    <div class="theme-card" style="border: 2px solid {{ $theme->value === 'theme-gold' ? '#D4AF37' : 'transparent' }}; padding: 1rem; border-radius: 10px; background: rgba(255,255,255,0.05); text-align: center;">
                        <div style="width: 50px; height: 50px; background: #D4AF37; border-radius: 50%; margin: 0 auto 1rem;"></div>
                        <h4>Gold Luxury</h4>
                    </div>
                </label>

                <!-- Blue Theme -->
                <label style="cursor: pointer;">
                    <input type="radio" name="theme" value="theme-blue" {{ $theme->value === 'theme-blue' ? 'checked' : '' }} style="display: none;">
                    <div class="theme-card" style="border: 2px solid {{ $theme->value === 'theme-blue' ? '#0ea5e9' : 'transparent' }}; padding: 1rem; border-radius: 10px; background: rgba(255,255,255,0.05); text-align: center;">
                        <div style="width: 50px; height: 50px; background: #0ea5e9; border-radius: 50%; margin: 0 auto 1rem;"></div>
                        <h4>Midnight Blue</h4>
                    </div>
                </label>

                <!-- Green Theme -->
                <label style="cursor: pointer;">
                    <input type="radio" name="theme" value="theme-green" {{ $theme->value === 'theme-green' ? 'checked' : '' }} style="display: none;">
                    <div class="theme-card" style="border: 2px solid {{ $theme->value === 'theme-green' ? '#10b981' : 'transparent' }}; padding: 1rem; border-radius: 10px; background: rgba(255,255,255,0.05); text-align: center;">
                        <div style="width: 50px; height: 50px; background: #10b981; border-radius: 50%; margin: 0 auto 1rem;"></div>
                        <h4>Emerald Green</h4>
                    </div>
                </label>

               <!-- Purple Theme -->
                <label style="cursor: pointer;">
                    <input type="radio" name="theme" value="theme-purple" {{ $theme->value === 'theme-purple' ? 'checked' : '' }} style="display: none;">
                    <div class="theme-card" style="border: 2px solid {{ $theme->value === 'theme-purple' ? '#8b5cf6' : 'transparent' }}; padding: 1rem; border-radius: 10px; background: rgba(255,255,255,0.05); text-align: center;">
                        <div style="width: 50px; height: 50px; background: #8b5cf6; border-radius: 50%; margin: 0 auto 1rem;"></div>
                        <h4>Royal Purple</h4>
                    </div>
                </label>

                <!-- Red Theme -->
                <label style="cursor: pointer;">
                    <input type="radio" name="theme" value="theme-red" {{ $theme->value === 'theme-red' ? 'checked' : '' }} style="display: none;">
                    <div class="theme-card" style="border: 2px solid {{ $theme->value === 'theme-red' ? '#ef4444' : 'transparent' }}; padding: 1rem; border-radius: 10px; background: rgba(255,255,255,0.05); text-align: center;">
                        <div style="width: 50px; height: 50px; background: #ef4444; border-radius: 50%; margin: 0 auto 1rem;"></div>
                        <h4>Crimson Red</h4>
                    </div>
                </label>
            </div>

            <h3 style="margin: 2rem 0 1rem; color: var(--text-gray);">Light Themes (White Background)</h3>
            <div class="grid-3" style="gap: 1rem;">
                <!-- White & Blue -->
                <label style="cursor: pointer;">
                    <input type="radio" name="theme" value="theme-white-blue" {{ $theme->value === 'theme-white-blue' ? 'checked' : '' }} style="display: none;">
                    <div class="theme-card" style="border: 2px solid {{ $theme->value === 'theme-white-blue' ? '#0284c7' : 'transparent' }}; padding: 1rem; border-radius: 10px; background: rgba(255,255,255,0.9); color: #0f172a; text-align: center;">
                        <div style="width: 50px; height: 50px; background: #0284c7; border-radius: 50%; margin: 0 auto 1rem;"></div>
                        <h4>White & Blue</h4>
                    </div>
                </label>

                <!-- White & Green -->
                <label style="cursor: pointer;">
                    <input type="radio" name="theme" value="theme-white-green" {{ $theme->value === 'theme-white-green' ? 'checked' : '' }} style="display: none;">
                    <div class="theme-card" style="border: 2px solid {{ $theme->value === 'theme-white-green' ? '#059669' : 'transparent' }}; padding: 1rem; border-radius: 10px; background: rgba(255,255,255,0.9); color: #064e3b; text-align: center;">
                        <div style="width: 50px; height: 50px; background: #059669; border-radius: 50%; margin: 0 auto 1rem;"></div>
                        <h4>White & Green</h4>
                    </div>
                </label>

                <!-- White & Gold -->
                <label style="cursor: pointer;">
                    <input type="radio" name="theme" value="theme-white-gold" {{ $theme->value === 'theme-white-gold' ? 'checked' : '' }} style="display: none;">
                    <div class="theme-card" style="border: 2px solid {{ $theme->value === 'theme-white-gold' ? '#d97706' : 'transparent' }}; padding: 1rem; border-radius: 10px; background: rgba(255,255,255,0.9); color: #451a03; text-align: center;">
                        <div style="width: 50px; height: 50px; background: #d97706; border-radius: 50%; margin: 0 auto 1rem;"></div>
                        <h4>White & Gold</h4>
                    </div>
                </label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save Settings</button>
    </form>
</div>
@endsection
