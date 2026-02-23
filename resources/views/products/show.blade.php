@extends('layouts.app')

@section('title', $category->name . ' - AVmountain')

@section('content')
    <div class="hero" style="height: 60vh; background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ Str::startsWith($category->hero_image, 'http') ? $category->hero_image : asset($category->hero_image) }}');">
        <div class="hero-content">
            <h1>Premium {{ $category->name }}</h1>
            <p>{{ $category->description }}</p>
        </div>
    </div>

    <div class="container section-padding">
        <h2 style="text-align: center; margin-bottom: 3rem;">Our {{ $category->name }} Varieties</h2>
        @livewire('product-showcase', ['categorySlug' => $category->slug])

        <div style="margin-top: 4rem; text-align: center;">
            <a href="{{ route('contact') }}" class="btn btn-primary">Request a Quote</a>
        </div>
    </div>
@endsection
