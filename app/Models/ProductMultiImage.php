<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMultiImage extends Model
{
    use HasFactory;
    protected $guarded =[];

    /**
     * Get the products that owns the ProductMultiImage
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function products()
    {
        return $this->belongsTo(User::class, 'product_id', 'id');
    }
}
