@extends('layouts.app')

@section('title', 'Coconuts - AVmountain')

@section('content')
    <div class="hero" style="height: 60vh; background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1544558635-667480601430?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');">
        <div class="hero-content">
            <h1>Premium Coconuts</h1>
            <p>Fresh, Desiccated, and Processed varieties</p>
        </div>
    </div>

    <div class="container section-padding">
        <h2 style="text-align: center; margin-bottom: 3rem;">Our Coconut Varieties</h2>
        @livewire('product-showcase', ['categorySlug' => 'coconuts'])

        <div style="margin-top: 4rem; text-align: center;">
            <a href="{{ route('contact') }}" class="btn btn-primary">Request a Quote</a>
        </div>
    </div>
@endsection
