@extends('layouts.admin')

@section('content')
    <div class="glass-card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <h2>Admin Dashboard</h2>
        </div>
        
        <p style="color: var(--text-gray); margin-bottom: 2rem;">Welcome, Admin! You can verify your product data here.</p>
        
         <div class="grid-3">
            <div class="glass-card" style="text-align: center;">
                <h3>{{ \App\Models\Product::count() }}</h3>
                <p>Total Products</p>
            </div>
            <div class="glass-card" style="text-align: center;">
                <h3>{{ \App\Models\ProductCategory::count() }}</h3>
                <p>Categories</p>
            </div>
             <div class="glass-card" style="text-align: center;">
                <h3>{{ \App\Models\User::count() }}</h3>
                <p>Users</p>
            </div>
        </div>

        <div style="margin-top: 2rem;">
            <h3>Categories & Products</h3>
            <ul style="margin-top: 1rem; list-style: none;">
                @foreach(\App\Models\ProductCategory::with('products')->get() as $category)
                    <li style="margin-bottom: 1rem;">
                        <strong style="color: var(--primary-gold); font-size: 1.2rem;">{{ $category->name }}</strong>
                        <ul style="margin-top: 0.5rem; margin-left: 1rem; color: var(--text-gray);">
                            @foreach($category->products as $product)
                                <li>- {{ $product->name }}</li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
