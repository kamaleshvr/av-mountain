@extends('layouts.admin')

@section('content')
<div class="glass-card" style="max-width: 600px; margin: 0 auto;">
    <h2 style="margin-bottom: 2rem;">Edit Category</h2>

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div style="margin-bottom: 1.5rem;">
            <label for="name" style="display: block; margin-bottom: 0.5rem; color: var(--text-gray);">Name</label>
            <input type="text" name="name" id="name" required value="{{ old('name', $category->name) }}" style="width: 100%; padding: 0.8rem; border-radius: 5px; border: 1px solid var(--glass-border); background: rgba(255,255,255,0.05); color: white;">
            @error('name') <span style="color: #ff4444; font-size: 0.8rem;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label for="hero_image" style="display: block; margin-bottom: 0.5rem; color: var(--text-gray);">Hero Image (Max 10MB)</label>
            @if($category->hero_image)
                <div style="margin-bottom: 1rem;">
                    <img src="{{ Str::startsWith($category->hero_image, 'http') ? $category->hero_image : asset($category->hero_image) }}" alt="Current Image" style="max-height: 100px; border-radius: 5px;">
                </div>
            @endif
            <input type="file" id="hero_image" accept="image/*" style="width: 100%; padding: 0.8rem; border-radius: 5px; border: 1px solid var(--glass-border); background: rgba(255,255,255,0.05); color: white;">
            @error('hero_image') <span style="color: #ff4444; font-size: 0.8rem; display: block; margin-top: 0.5rem;">{{ $message }}</span> @enderror
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label for="description" style="display: block; margin-bottom: 0.5rem; color: var(--text-gray);">Description</label>
            <textarea name="description" id="description" rows="3" style="width: 100%; padding: 0.8rem; border-radius: 5px; border: 1px solid var(--glass-border); background: rgba(255,255,255,0.05); color: white;">{{ old('description', $category->description) }}</textarea>
            @error('description') <span style="color: #ff4444; font-size: 0.8rem;">{{ $message }}</span> @enderror
        </div>

        <input type="hidden" name="hero_image_base64" id="hero_image_base64">

        <div style="margin-bottom: 2rem;">
            <label class="checkbox-container" style="display: flex; align-items: center; cursor: pointer;">
                <input type="hidden" name="status" value="0">
                <input type="checkbox" name="status" value="1" {{ old('status', $category->status) ? 'checked' : '' }} style="margin-right: 0.5rem;">
                Active
            </label>
        </div>

        <button type="submit" class="btn btn-primary" style="width: 100%;">Update Category</button>
    </form>
</div>

<script>
    function processImage(input) {
        if (input.files && input.files[0]) {
            const file = input.files[0];
            const reader = new FileReader();
            
            reader.onload = function(e) {
                const img = new Image();
                img.src = e.target.result;
                
                img.onload = function() {
                    const canvas = document.createElement('canvas');
                    const ctx = canvas.getContext('2d');
                    
                    // Max dimensions
                    const MAX_WIDTH = 1920;
                    const MAX_HEIGHT = 1080;
                    let width = img.width;
                    let height = img.height;
                    
                    if (width > height) {
                        if (width > MAX_WIDTH) {
                            height *= MAX_WIDTH / width;
                            width = MAX_WIDTH;
                        }
                    } else {
                        if (height > MAX_HEIGHT) {
                            width *= MAX_HEIGHT / height;
                            height = MAX_HEIGHT;
                        }
                    }
                    
                    canvas.width = width;
                    canvas.height = height;
                    ctx.drawImage(img, 0, 0, width, height);
                    
                    // Compress to JPEG 0.7 quality
                    const dataUrl = canvas.toDataURL('image/jpeg', 0.7);
                    document.getElementById('hero_image_base64').value = dataUrl;
                    
                    // Update preview if standard preview exists, otherwise just setting hidden input is enough
                }
            }
            
            reader.readAsDataURL(file);
        }
    }
    
    // Attach listener
    const fileInput = document.getElementById('hero_image');
    if (fileInput) {
        fileInput.addEventListener('change', function() {
            processImage(this);
        });
    }
</script>
@endsection
