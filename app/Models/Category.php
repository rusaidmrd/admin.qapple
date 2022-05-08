<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Category extends Model
{
    use HasFactory,HasRecursiveRelationships;

    protected $fillable = [
        'name', 'parent_id', 'featured', 'image'
    ];


    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    // public function parent()
    // {
    //     return $this->belongsTo(Category::class, 'parent_id');
    // }

    // public function children()
    // {
    //     return $this->hasMany(Category::class, 'parent_id');
    // }

    // public function products()
    // {
    //     return $this->belongsToMany(Product::class, 'product_categories', 'category_id', 'product_id');
    // }

}
