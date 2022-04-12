<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Validation\Rule;
use App\Models\ProductAttribute;
use App\Rules\UniqueProductAttributes;

class ProductAttributes extends Component
{


    public Product $product;
    public ProductAttribute $productAttribute;

    public $selectedAttributes;
    public $attributeValues = [];

    public $deleteId='';
    public $showDeleteModal = false;

    public function rules() {
        return [
            'productAttribute.value' => [
                'required',
                new UniqueProductAttributes($this->product,$this->productAttribute,$this->selectedAttributes)
            ],
            'productAttribute.quantity' => 'required',
            'productAttribute.price' => 'required',
        ];
    }

    // Rule::unique('product_attributes')
    // ->where('attribute_id', $this->selectedAttributes)
    // ->where('value', $this->productAttribute->value)
    public function mount($product)
    {
        $this->product = $product;
        $this->productAttribute = new ProductAttribute();
    }

    public function updatedSelectedAttributes($value)
    {
        $this->attributeValues = AttributeValue::where('attribute_id',$value)->get();
    }

    public function saveProductAttribute()
    {
        $this->validate();

        $this->product->attributes()->create([
            'quantity' => $this->productAttribute->quantity,
            'price' => $this->productAttribute->price,
            'attribute_id' => $this->selectedAttributes,
            'value' => $this->productAttribute->value,
        ]);

        $this->product = $this->product->fresh();

        $this->resetExcept(['product','productAttribute']);
    }

    public function getDeleteId($id)
    {
        $this->deleteId = $id;
        $this->showDeleteModal = true;
    }

    public function hideDeleteModal()
    {
        $this->showDeleteModal = false;
        $this->reset('deleteId');
    }

    public function deleteData()
    {
        ProductAttribute::find($this->deleteId)->delete();
        $this->showDeleteModal = false;
        $this->product = $this->product->fresh();
    }

    public function render()
    {
        return view('livewire.products.product-attributes',[
            'attributes' => Attribute::all(),
            'productAttributes' => $this->product->attributes()->get()
        ]);
    }

}
