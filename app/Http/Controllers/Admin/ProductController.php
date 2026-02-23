<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category')->latest();

        // Handle Clear Filter
        if ($request->has('clear_filter')) {
            session()->forget('product_filter_category_id');
            return redirect()->route('admin.products.index');
        }

        // Handle New Filter Selection
        if ($request->filled('category_id')) {
            session(['product_filter_category_id' => $request->category_id]);
        }

        // Apply Filter (from Request or Session)
        $categoryId = session('product_filter_category_id');
        
        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        $products = $query->get();
        // Only show active categories in the filter
        $categories = ProductCategory::where('status', true)->get();
        
        return view('admin.products.index', compact('products', 'categories', 'categoryId'));
    }

    public function create()
    {
        $categories = ProductCategory::where('status', true)->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // dd('ok');
        $validated = $request->validate([
            'category_id' => 'required|exists:product_categories,id',
            'name' => 'required|string|max:255',
            'tamil_name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:10240', // 10MB Limit
            'is_exportable' => 'boolean',
            'status' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        // dd($validated);
        try {
            if ($request->filled('image_base64')) {
                // Handle Base64 Upload
                $path = $this->handleBase64Upload($request->input('image_base64'), 'products');
                if (!$path) {
                    return back()->withInput()->withErrors(['image' => 'Image processing failed.']);
                }
                $validated['image'] = '/storage/' . $path;
            } elseif ($request->hasFile('image')) {
                // Fallback to standard upload
                $path = $this->handleFileUpload($request->file('image'), 'products');
                if (!$path) {
                    return back()->withInput()->withErrors(['image' => 'File upload failed. Please try again.']);
                }
                $validated['image'] = '/storage/' . $path;
            }

            Product::create($validated);

            return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['image' => 'Upload failed: ' . $e->getMessage()]);
        }
    }

    public function edit(Product $product)
    {
        $categories = ProductCategory::where('status', true)->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        // dd('ok');
        $validated = $request->validate([
            'category_id' => 'required|exists:product_categories,id',
            'name' => 'required|string|max:255',
            'tamil_name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:10240',
            'is_exportable' => 'boolean',
            'status' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);
        // dd($validated);
        // dd($request->all());
        try {
            if ($request->filled('image_base64')) {
                $path = $this->handleBase64Upload($request->input('image_base64'), 'products');
                if (!$path) {
                    return back()->withInput()->withErrors(['image' => 'Image processing failed.']);
                }
                $validated['image'] = '/storage/' . $path;
            } elseif ($request->hasFile('image')) {
                $path = $this->handleFileUpload($request->file('image'), 'products');
                // dd($path);
                if (!$path) {
                    return back()->withInput()->withErrors(['image' => 'File upload failed. Please try again.']);
                }
                $validated['image'] = '/storage/' . $path;
            } else {
                unset($validated['image']);
            }
//  dd($validated);
            $product->update($validated);

            return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['image' => 'Update failed: ' . $e->getMessage()]);
        }
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
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
