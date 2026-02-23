@extends('layouts.admin')

@section('content')
<div class="glass-card" style="max-width: 800px; margin: 0 auto;">
    <h2 style="margin-bottom: 2rem;">Add Product</h2>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="grid-2" style="grid-template-columns: 1fr 1fr; gap: 2rem;">
            <div>
                <div style="margin-bottom: 1.5rem;">
                    <label for="category_id" style="display: block; margin-bottom: 0.5rem; color: var(--text-gray);">Category</label>
                    <select name="category_id" id="category_id" required style="width: 100%; padding: 0.8rem; border-radius: 5px; border: 1px solid var(--glass-border); background: rgba(255,255,255,0.05); color: white;">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id') <span style="color: #ff4444; font-size: 0.8rem;">{{ $message }}</span> @enderror
                </div>

                <div style="margin-bottom: 1.5rem;">
                    <label for="name" style="display: block; margin-bottom: 0.5rem; color: var(--text-gray);">Name</label>
                    <input type="text" name="name" id="name" required value="{{ old('name') }}" style="width: 100%; padding: 0.8rem; border-radius: 5px; border: 1px solid var(--glass-border); background: rgba(255,255,255,0.05); color: white;">
                    @error('name') <span style="color: #ff4444; font-size: 0.8rem;">{{ $message }}</span> @enderror
                </div>

                <div style="margin-bottom: 1.5rem;">
                    <label for="tamil_name" style="display: block; margin-bottom: 0.5rem; color: var(--text-gray);">Tamil Name</label>
                    <input type="text" name="tamil_name" id="tamil_name" value="{{ old('tamil_name') }}" style="width: 100%; padding: 0.8rem; border-radius: 5px; border: 1px solid var(--glass-border); background: rgba(255,255,255,0.05); color: white;">
                    @error('tamil_name') <span style="color: #ff4444; font-size: 0.8rem;">{{ $message }}</span> @enderror
                </div>
            </div>

            <div>
                <div style="margin-bottom: 1.5rem;">
                    <label for="image" style="display: block; margin-bottom: 0.5rem; color: var(--text-gray);">Product Image (Max 10MB)</label>
                    <input type="file" id="image" accept="image/*" style="width: 100%; padding: 0.8rem; border-radius: 5px; border: 1px solid var(--glass-border); background: rgba(255,255,255,0.05); color: white;">
                    @error('image') <span style="color: #ff4444; font-size: 0.8rem; display: block; margin-top: 0.5rem;">{{ $message }}</span> @enderror
                </div>

                <input type="hidden" name="image_base64" id="image_base64">

                 <div style="margin-bottom: 1.5rem;">
                    <label for="sort_order" style="display: block; margin-bottom: 0.5rem; color: var(--text-gray);">Sort Order</label>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}" style="width: 100%; padding: 0.8rem; border-radius: 5px; border: 1px solid var(--glass-border); background: rgba(255,255,255,0.05); color: white;">
                    @error('sort_order') <span style="color: #ff4444; font-size: 0.8rem;">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        <div style="margin-bottom: 1.5rem;">
            <label for="description" style="display: block; margin-bottom: 0.5rem; color: var(--text-gray);">Description</label>
            <textarea name="description" id="description" rows="3" style="width: 100%; padding: 0.8rem; border-radius: 5px; border: 1px solid var(--glass-border); background: rgba(255,255,255,0.05); color: white;">{{ old('description') }}</textarea>
            @error('description') <span style="color: #ff4444; font-size: 0.8rem;">{{ $message }}</span> @enderror
        </div>

        <div style="display: flex; gap: 2rem; margin-bottom: 2rem;">
            <label class="checkbox-container" style="display: flex; align-items: center; cursor: pointer;">
                <input type="hidden" name="status" value="0">
                <input type="checkbox" name="status" value="1" checked style="margin-right: 0.5rem;">
                Active
            </label>

            <label class="checkbox-container" style="display: flex; align-items: center; cursor: pointer;">
                <input type="hidden" name="is_exportable" value="0">
                <input type="checkbox" name="is_exportable" value="1" checked style="margin-right: 0.5rem;">
                Exportable
            </label>
        </div>

        <button type="submit" class="btn btn-primary" style="width: 100%; position: relative; z-index: 50;">Create Product</button>
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
                    document.getElementById('image_base64').value = dataUrl;
                }
            }
            
            reader.readAsDataURL(file);
        }
    }
    
    // Attach listener
    document.getElementById('image').addEventListener('change', function() {
        processImage(this);
    });
</script>
@endsection
