@extends('layouts.app')

@section('title', 'Pulses - AVmountain')

@section('content')
    <div class="hero" style="height: 60vh; background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1515543237350-b3eea1ec8082?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');">
        <div class="hero-content">
            <h1>Healthy Pulses</h1>
            <p>Lentils, Chickpeas, Beans</p>
        </div>
    </div>

    <div class="container section-padding">
        <h2 style="text-align: center; margin-bottom: 3rem;">Premium Pulses & Dals</h2>
        @livewire('product-showcase', ['categorySlug' => 'pulses'])

        <div style="margin-top: 4rem; text-align: center;">
            <a href="{{ route('contact') }}" class="btn btn-primary">Contact for Pricing</a>
        </div>
    </div>
@endsection
