@extends('layouts.app')

@section('content')
<div class="container section-padding" style="display: flex; justify-content: center; align-items: center; min-height: 80vh;">
    <div class="glass-card" style="width: 100%; max-width: 400px; padding: 2rem;">
        <h2 style="text-align: center; margin-bottom: 2rem;">Admin Login</h2>
        
        <form method="POST" action="{{ route('admin.authenticate') }}">
            @csrf
            
            <div style="margin-bottom: 1.5rem;">
                <label for="email" style="display: block; margin-bottom: 0.5rem; color: var(--text-gray);">Email</label>
                <input type="email" name="email" id="email" required style="width: 100%; padding: 0.8rem; border-radius: 5px; border: 1px solid var(--glass-border); background: rgba(255,255,255,0.05); color: white;">
                @error('email')
                    <span style="color: #ff4444; font-size: 0.8rem;">{{ $message }}</span>
                @enderror
            </div>

            <div style="margin-bottom: 2rem;">
                <label for="password" style="display: block; margin-bottom: 0.5rem; color: var(--text-gray);">Password</label>
                <input type="password" name="password" id="password" required style="width: 100%; padding: 0.8rem; border-radius: 5px; border: 1px solid var(--glass-border); background: rgba(255,255,255,0.05); color: white;">
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%;">Login</button>
        </form>
    </div>
</div>
@endsection
