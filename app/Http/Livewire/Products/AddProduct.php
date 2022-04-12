<?php

namespace App\Http\Livewire\Products;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class AddProduct extends Component
{

    public Product $product;
    public $selectedCategories=[];

    protected $rules = [
        'product.name'      =>  'required|max:255',
        'product.sku'       =>  'required',
        'product.brand_id'  =>  'required|not_in:0',
        'selectedCategories' => 'required',
        'product.price'     =>  'required|regex:/^\d+(\.\d{1,2})?$/',
        'product.sale_price'  =>  'regex:/^\d+(\.\d{1,2})?$/',
        'product.quantity'  =>  'required|numeric',
        'product.weight' => 'sometimes',
        'product.description' => 'sometimes',
        'product.status' => 'sometimes',
        'product.featured' => 'sometimes',
    ];

    public function mount() { $this->product = new Product(); }


    public function updated($sku)
    {
        $this->validateOnly($sku,[
            'product.sku' => 'max:8|unique:products,sku'
        ]);
    }

    public function save()
    {
        $this->validate();

        if($this->product->status === null) $this->product->status = 0;
        if($this->product->featured === null) $this->product->featured = 0;

        $this->product->save();

        $this->product->categories()->sync($this->selectedCategories);

        session()->flash('message','Product successfully added !');

        return redirect()->to(route('products.edit',$this->product->id));

    }

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
