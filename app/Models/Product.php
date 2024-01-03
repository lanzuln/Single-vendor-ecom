<?php

namespace App\Models;

use App\Models\ProductMultiImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function category()
    {
        return $this->belongsTo(Category::class, 'Category_id', 'id');
    }
    /**
     * Get all of the product_images for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product_images()
    {
        return $this->hasMany(ProductMultiImage::class);
    }
}
