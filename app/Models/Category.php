<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, SoftDeletes;
protected $guarded =[];
/**
 * Get all of the comments for the Category
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function products()
{
    return $this->hasMany(Product::class, 'Category_id', 'id');
}
}
