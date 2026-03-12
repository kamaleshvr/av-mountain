<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'is_exportable' => 'boolean',
        'status' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    /**
     * Get the dynamic image URL (Hybrid: Base64 or Disk Path)
     *
     * @return string
     */
    public function getImageUrlAttribute()
    {
        $image = $this->image;
        if (!$image) {
            return asset('images/placeholder.jpg');
        }

        // If it's already a Data URI or a full URL
        if (preg_match('/^(data:|http)/', $image)) {
            return $image;
        }

        // Otherwise assume it's a relative storage path
        return asset($image);
    }
}
