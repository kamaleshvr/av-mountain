@extends('layouts.app')

@section('title', 'Vegetables - AVmountain')

@section('content')
    <div class="hero" style="height: 60vh; background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1597362925123-77861d3fb714?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');">
        <div class="hero-content">
            <h1>Fresh Vegetables</h1>
            <p>Farm-Fresh Seasonal Produce</p>
        </div>
    </div>

    <div class="container section-padding">
        <h2 style="text-align: center; margin-bottom: 3rem;">Farm Fresh Vegetables</h2>
        @livewire('product-showcase', ['categorySlug' => 'vegetables'])

        <div style="margin-top: 4rem; text-align: center;">
            <a href="{{ route('contact') }}" class="btn btn-primary">Order Fresh</a>
        </div>
    </div>
@endsection
