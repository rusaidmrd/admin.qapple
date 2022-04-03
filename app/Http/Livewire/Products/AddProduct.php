<?php

namespace App\Http\Livewire\Products;

use App\Models\Category;
use Livewire\Component;

class AddProduct extends Component
{
    public function render()
    {
        $categories = Category::where('slug','!=','root')->get();
        return view('livewire.products.add-product',[
            'categories' => $categories
        ]);
    }
}
