<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'hero_image' => 'nullable|image|max:10240', // 10MB Limit
            'description' => 'nullable|string',
            'status' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        try {
            if ($request->filled('hero_image_base64')) {
                // Handle Base64 Upload
                $path = $this->handleBase64Upload($request->input('hero_image_base64'), 'categories');
                if (!$path) {
                    return back()->withInput()->withErrors(['hero_image' => 'Image processing failed.']);
                }
                $validated['hero_image'] = '/storage/' . $path;
            } elseif ($request->hasFile('hero_image')) {
                // Fallback to standard upload
                $path = $this->handleFileUpload($request->file('hero_image'), 'categories');
                if (!$path) {
                    return back()->withInput()->withErrors(['hero_image' => 'File upload failed. Please try again.']);
                }
                $validated['hero_image'] = '/storage/' . $path;
            }

            ProductCategory::create($validated);

            return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['hero_image' => 'Upload failed: ' . $e->getMessage()]);
        }
    }

    public function edit(ProductCategory $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, ProductCategory $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'hero_image' => 'nullable|image|max:10240',
            'description' => 'nullable|string',
            'status' => 'boolean',
        ]);

        if ($category->name !== $validated['name']) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        try {
            if ($request->filled('hero_image_base64')) {
                $path = $this->handleBase64Upload($request->input('hero_image_base64'), 'categories');
                if (!$path) {
                    return back()->withInput()->withErrors(['hero_image' => 'Image processing failed.']);
                }
                $validated['hero_image'] = '/storage/' . $path;
            } elseif ($request->hasFile('hero_image')) {
                $path = $this->handleFileUpload($request->file('hero_image'), 'categories');
                if (!$path) {
                    return back()->withInput()->withErrors(['hero_image' => 'File upload failed. Please try again.']);
                }
                $validated['hero_image'] = '/storage/' . $path;
            } else {
                unset($validated['hero_image']);
            }

            $category->update($validated);

            return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['hero_image' => 'Update failed: ' . $e->getMessage()]);
        }
    }

    public function destroy(ProductCategory $category)
    {
        if ($category->products()->count() > 0) {
            return back()->with('error', 'Cannot delete category with associated products.');
        }

        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }

    /**
     * Handle Base64 image upload.
     */
    private function handleBase64Upload($base64String, $folder)
    {
        try {
            // Check if string contains data URI header
            if (preg_match('/^data:image\/(\w+);base64,/', $base64String, $type)) {
                $base64String = substr($base64String, strpos($base64String, ',') + 1);
                $type = strtolower($type[1]); // jpg, png, etc.
                
                if (!in_array($type, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                    \Log::error('Base64 Upload: Invalid image type ' . $type);
                    return false;
                }
                
                $data = base64_decode($base64String);
                if ($data === false) {
                    \Log::error('Base64 Upload: Decode failed');
                    return false;
                }
                
                $filename = time() . '_' . Str::random(10) . '.' . $type;
                
                if (\Storage::disk('public')->put($folder . '/' . $filename, $data)) {
                    return $folder . '/' . $filename;
                }
            }
            return false;
        } catch (\Exception $e) {
            \Log::error('Base64 Upload Exception: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Handle file upload with explicit error checking and naming.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $folder
     * @return string|false
     */
    private function handleFileUpload($file, $folder)
    {
        try {
            if (!$file->isValid()) {
                \Log::error('File upload failed: Invalid file.', ['error' => $file->getError()]);
                return false;
            }

            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            
            // Use putFileAs for explicit control
            $path = \Storage::disk('public')->putFileAs($folder, $file, $filename);
            
            if (!$path) {
                \Log::error('File upload failed: Storage::putFileAs returned false.');
                return false;
            }

            return $path;
        } catch (\Exception $e) {
            \Log::error('File upload exception: ' . $e->getMessage());
            return false;
        }
    }
}
