<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProductShowcase extends Component
{
    public $categorySlug;

    public function mount($categorySlug)
    {
        \Illuminate\Support\Facades\Log::info('ProductShowcase mounted with slug: ' . $categorySlug);
        $this->categorySlug = $categorySlug;
    }

    public function render()
    {
        $products = \App\Models\Product::whereHas('category', function ($query) {
            $query->where('slug', $this->categorySlug);
        })
        ->where('status', true)
        ->where('is_exportable', true)
        ->orderBy('sort_order')
        ->get();

        return view('livewire.product-showcase', [
            'products' => $products
        ]);
    }
}
