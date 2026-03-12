<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    /**
     * Get the dynamic hero image URL (Hybrid: Base64 or Disk Path)
     *
     * @return string
     */
    public function getHeroImageUrlAttribute()
    {
        $image = $this->hero_image;
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
