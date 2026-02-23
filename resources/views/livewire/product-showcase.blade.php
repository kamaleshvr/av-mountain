<div>
    <div class="row g-4 row-cols-1 row-cols-md-2">
        @foreach($products as $product)
        <div class="col">
        <div class="glass-card product-card animate-zoom-in delay-100" style="text-align: center; overflow: hidden;">
            @if($product->image)
            <img src="{{ Str::startsWith($product->image, 'http') ? $product->image : asset($product->image) }}" alt="{{ $product->name }}" style="width: 100%; height: 200px; object-fit: cover; border-radius: 10px; margin-bottom: 1rem;">
            @endif
            <h3>{{ $product->name }}</h3>
            <p style="color: var(--text-gray); font-size: 0.9rem;">{{ $product->description }}</p>
        </div>
        </div>
        @endforeach
    </div>
</div>
