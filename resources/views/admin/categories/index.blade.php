@extends('layouts.admin')

@section('content')
<div class="glass-card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <h2>Categories</h2>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Add Category</a>
    </div>

    @if(session('success'))
        <div style="background: rgba(0, 255, 0, 0.1); border: 1px solid limegreen; padding: 1rem; border-radius: 8px; margin-bottom: 1rem;">
            {{ session('success') }}
        </div>
    @endif
    
    @if(session('error'))
        <div style="background: rgba(255, 0, 0, 0.1); border: 1px solid red; padding: 1rem; border-radius: 8px; margin-bottom: 1rem;">
            {{ session('error') }}
        </div>
    @endif

    <table style="width: 100%; border-collapse: collapse; color: white;">
        <thead>
            <tr style="border-bottom: 1px solid var(--glass-border);">
                <th style="padding: 1rem; text-align: left;">Name</th>
                <th style="padding: 1rem; text-align: left;">Slug</th>
                <th style="padding: 1rem; text-align: left;">Products</th>
                <th style="padding: 1rem; text-align: right;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                <td style="padding: 1rem;">{{ $category->name }}</td>
                <td style="padding: 1rem; color: var(--text-gray);">{{ $category->slug }}</td>
                <td style="padding: 1rem;">{{ $category->products->count() }}</td>
                <td style="padding: 1rem; text-align: right;">
                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-outline" style="padding: 0.3rem 0.8rem; font-size: 0.8rem; margin-right: 0.5rem;">Edit</a>
                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure?')">
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
