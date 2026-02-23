@extends('layouts.app')

@section('title', 'Grains - AVmountain')

@section('content')
    <div class="hero" style="height: 60vh; background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');">
        <div class="hero-content">
            <h1>Nutritious Grains</h1>
            <p>Rice, Wheat, Millet, and Staples</p>
        </div>
    </div>

    <div class="container section-padding">
        <h2 style="text-align: center; margin-bottom: 3rem;">Our Premium Grains</h2>
        @livewire('product-showcase', ['categorySlug' => 'grains'])

        <div style="margin-top: 4rem; text-align: center;">
            <a href="{{ route('contact') }}" class="btn btn-primary">Enquire Now</a>
        </div>
    </div>
@endsection
