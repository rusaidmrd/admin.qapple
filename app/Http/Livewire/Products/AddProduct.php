<?php

namespace App\Http\Livewire\Products;

use App\Models\Brand;
use App\Models\Category;
use Livewire\Component;

class AddProduct extends Component
{
    public function render()
    {
        $categories = Category::where('slug','!=','root')->get();
        $brands = Brand::all();

        return view('livewire.products.add-product',[
            'categories' => $categories,
            'brands' => $brands
        ]);
    }
}
