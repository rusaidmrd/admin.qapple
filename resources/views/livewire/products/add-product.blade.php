@section('page-heading')
    <h3 class="font-bold text-xl">Add New Product</h3>
@endsection

<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow rounded-md sm:rounded-lg">
            <div class="bg-white border-b border-gray-200 p-8">
               <form class="space-y-4" wire:submit.prevent='save'>

                   <div class="grid grid-cols-2 gap-8">
                       <x-input.group label="Product Name" for="name" :error="$errors->first('product.name')">
                            <input wire:model="product.name" id="name" class="form-input" type="text" placeholder="Enter product name">
                       </x-input.group>
                       <x-input.group label="SKU" for="sku" :error="$errors->first('product.sku')">
                            <input wire:model="product.sku" id="sku" class="form-input" type="text" placeholder="Enter product sku">
                        </x-input.group>
                   </div>
                   <div class="grid grid-cols-2 gap-8">
                        <x-input.group label="Brand" for="brand" :error="$errors->first('product.brand_id')">
                            <select wire:model="product.brand_id" class="form-input" id="brand">
                                <option value="">Select brand</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </x-input.group>

                        <x-input.group label="Category" for="category" :error="$errors->first('selectedCategories')">
                            <div wire:ignore>
                                <select class="form-input" id="category" multiple>
                                    <option value="" disabled="disabled">Select category </option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </x-input.group>
                   </div>
                   <div class="grid grid-cols-2 gap-8">
                        <x-input.group label="Price" for="price" :error="$errors->first('product.price')">
                            <input wire:model="product.price" id="price" class="form-input" type="text" placeholder="Enter product price">
                        </x-input.group>
                        <x-input.group label="Sale Price" for="sale-price" :error="$errors->first('product.sale_price')">
                            <input wire:model="product.sale_price" id="sale-price" class="form-input" type="text" placeholder="Enter product sale price">
                        </x-input.group>
                    </div>
                   <div class="grid grid-cols-2 gap-8">
                        <x-input.group label="Quantity" for="quantity" :error="$errors->first('product.quantity')">
                            <input wire:model="product.quantity" id="quantity" class="form-input" type="text" placeholder="Product quantity">
                        </x-input.group>
                        <x-input.group label="Weight" for="weight"  :error="$errors->first('product.weight')">
                            <input wire:model="product.weight" id="weight" class="form-input" type="text" placeholder="Product weight">
                        </x-input.group>
                    </div>
                    <div>
                        <div class="form-group flex flex-col mb-5">
                            <label for="description" class="mb-2 text-gray-600 font-semibold">Product Description</label>
                            <x-input.rich-text wire:model.difer="product.description" id="description" />
                        </div>
                    </div>

                    <div class="flex items-center space-x-9">
                        <div class="form-group flex items-center mb-5 space-x-2">
                            <input
                                wire:model="product.featured"
                                type="checkbox"
                                class="rounded border-gray-300 block transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                id="featured"
                                value="1"
                            />
                            <label for="featured" class="text-gray-600 font-semibold">Featured product</label>
                        </div>

                        <div class="form-group flex items-center mb-5 space-x-2">
                            <input
                                wire:model="product.status"
                                type="checkbox"
                                class="rounded border-gray-300 block transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                id="active"
                                value="1"
                            />
                            <label for="active" class="text-gray-600 font-semibold">Active</label>
                        </div>

                    </div>



                    <div class="space-x-2">
                        <a href="{{ route('products.index') }}" class="bg-secondary-color text-white py-3 px-4 rounded-md border-secondary-color ">
                            Back
                        </a>
                        <x-button.primary class="py-3 text-base" type="submit">
                            Create New Product
                        </x-button.primary>
                    </div>
               </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function () {
                $('#category').select2({
                    placeholder: "Select categories",
                    multiple: true,
                    allowClear: true,
                });
                $('#category').on('change', function (e) {
                    let data = $('#category').select2("val");
                    @this.set('selectedCategories', data);
                });
            });

        </script>
    @endpush

</div>


