<?php

namespace App\Http\Livewire\Products;

use App\Http\Livewire\DataTable\WithBulkAction;
use App\Http\Livewire\DataTable\WithPerPagePagination;
use App\Http\Livewire\DataTable\WithSorting;
use App\Models\Product;
use Livewire\Component;

class ViewProducts extends Component
{

    use WithSorting, WithPerPagePagination,WithBulkAction;

    public $search = "";
    public Product $product;

    public function mount()
    {
        $this->product = $this->makeBlankProduct();
    }

    public function toggleActivate($id)
    {
        $product = Product::findOrFail($id);
        $product->status = !$product->status;
        $product->save();
        $this->product = $product->fresh();
    }

    public function makeBlankProduct()
    {
        return Product::make();
    }

    public function getRowsQueryProperty()
    {
        $query = Product::search('name',$this->search);
        return $this->applySorting($query);
    }

    public function getRowsProperty()
    {
        return $this->applyPagination($this->rowsQuery);
    }

    public function render()
    {
        return view('livewire.products.view-products',[
            'products' => $this->rows
        ]);
    }
}
