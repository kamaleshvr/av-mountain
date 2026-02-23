@extends('layouts.admin')

@section('content')
<div class="glass-card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <h2>Products</h2>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Add Product</a>
    </div>

    <div style="margin-bottom: 2rem; background: var(--card-bg); padding: 1rem; border-radius: 10px; border: 1px solid var(--border-color);">
        <form action="{{ route('admin.products.index') }}" method="GET" style="display: flex; gap: 1rem; align-items: center;">
            <div style="flex-grow: 1; max-width: 300px;">
                <select name="category_id" style="width: 100%; padding: 0.8rem; border-radius: 5px; border: 1px solid var(--border-color); background: var(--input-bg); color: var(--text-white); cursor: pointer;" onchange="this.form.submit()">
                    <option value="" style="background: var(--card-bg); color: var(--text-white);">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $categoryId == $category->id ? 'selected' : '' }} style="background: var(--card-bg); color: var(--text-white);">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            @if($categoryId)
                <a href="{{ route('admin.products.index', ['clear_filter' => 1]) }}" class="btn btn-outline" style="padding: 0.8rem 1.5rem; display: flex; align-items: center; gap: 0.5rem; border-color: var(--border-color);">
                    <span>×</span> Clear Filter
                </a>
            @endif
        </form>
    </div>

    @if(session('success'))
        <div style="background: rgba(0, 255, 0, 0.1); border: 1px solid limegreen; padding: 1rem; border-radius: 8px; margin-bottom: 1rem;">
            {{ session('success') }}
        </div>
    @endif

    <table style="width: 100%; border-collapse: collapse; color: white;">
        <thead>
            <tr style="border-bottom: 1px solid var(--glass-border);">
                <th style="padding: 1rem; text-align: left;">Name</th>
                <th style="padding: 1rem; text-align: left;">Category</th>
                <th style="padding: 1rem; text-align: center;">Status</th>
                <th style="padding: 1rem; text-align: right;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                <td style="padding: 1rem;">
                    <div style="display: flex; align-items: center;">
                        @if($product->image)
                            <img src="{{ Str::startsWith($product->image, 'http') ? $product->image : asset($product->image) }}" alt="" style="width: 40px; height: 40px; object-fit: cover; border-radius: 4px; margin-right: 1rem;">
                        @endif
                        {{ $product->name }}
                    </div>
                </td>
                <td style="padding: 1rem; color: var(--text-gray);">{{ $product->category->name }}</td>
                <td style="padding: 1rem; text-align: center;">
                    <span style="padding: 0.2rem 0.6rem; border-radius: 10px; background: {{ $product->status ? 'rgba(0,255,0,0.2)' : 'rgba(255,0,0,0.2)' }}; color: {{ $product->status ? '#4caf50' : '#ff4444' }}; font-size: 0.8rem;">
                        {{ $product->status ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td style="padding: 1rem; text-align: right;">
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-outline" style="padding: 0.3rem 0.8rem; font-size: 0.8rem; margin-right: 0.5rem;">Edit</a>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline" style="padding: 0.3rem 0.8rem; font-size: 0.8rem; border-color: #ff4444; color: #ff4444;">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
