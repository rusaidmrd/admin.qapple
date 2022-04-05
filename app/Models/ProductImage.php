<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = ['product_id','full'];

    protected $casts = [
        'product_id'    =>  'integer',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function url()
    {
        return $this->full
            ? Storage::disk('products')->url($this->full)
            : '';
    }
}
