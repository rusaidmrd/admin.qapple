<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use App\Rules\MaxImages;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadImages extends Component
{

    use WithFileUploads;

    public Product $product;
    public $files = [];


    // can't use new keyword inside property.that's why we created the rules function for validation.
    public function rules()
    {
        return [
            'files' => 'required|max:1000',
            'files.*' => [
                'image',
                new MaxImages($this->product, $this->files),
            ],
        ];
    }

    public function mount($product)
    {
        $this->product = $product;
    }

    public function updatedFiles()
    {
        // $this->validate([
        //     'files.*' => 'image|max:1000',
        // ]);
    }

    public function save()
    {

        $this->validate();

        if($this->files) {
            foreach($this->files as $file) {
                $this->product->images()->create([
                    'full' => $file->store('/','products') // this will return the filename
                ]);
             }
        }

        $this->product = $this->product->fresh();

        $this->dispatchBrowserEvent('notify','Product images uploaded successfully');
    }


    public function render()
    {
        return view('livewire.products.upload-images');
    }
}
