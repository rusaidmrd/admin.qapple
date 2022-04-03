@section('page-heading')
    <h3 class="font-bold text-xl">Add New Product</h3>
@endsection

<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow rounded-md sm:rounded-lg">
            <div class="bg-white border-b border-gray-200 p-8">
               <form action="" class="space-y-4">
                   <div class="grid grid-cols-2 gap-8">
                       <x-input.group label="Product Name" for="name">
                            <input id="name" class="form-input" type="text" placeholder="Enter product name">
                       </x-input.group>
                       <x-input.group label="SKU" for="sku">
                            <input id="sku" class="form-input" type="text" placeholder="Enter product sku">
                        </x-input.group>
                   </div>
                   <div class="grid grid-cols-2 gap-8">
                        <x-input.group label="Brand" for="brand">
                            <select class="form-input" id="brand">
                                <option value="">Select brand</option>
                                <option value="1">Apple</option>
                            </select>
                        </x-input.group>
                        <x-input.group label="Category" for="category">
                            <select class="form-input" id="category">
                                <option value="">Select category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </x-input.group>
                   </div>
                   <div class="grid grid-cols-2 gap-8">
                        <x-input.group label="Price" for="price">
                            <input id="price" class="form-input" type="text" placeholder="Enter product price">
                        </x-input.group>
                        <x-input.group label="Special Price" for="special-price">
                            <input id="special-price" class="form-input" type="text" placeholder="Enter product special price">
                        </x-input.group>
                    </div>
                   <div class="grid grid-cols-2 gap-8">
                        <x-input.group label="Quantity" for="quantity">
                            <input id="quantity" class="form-input" type="text" placeholder="Product quantity">
                        </x-input.group>
                        <x-input.group label="Weight" for="weight">
                            <input id="weight" class="form-input" type="text" placeholder="Product weight">
                        </x-input.group>
                    </div>
                    <div>
                        <div class="form-group flex flex-col mb-5">
                            <label for="description" class="mb-2 text-gray-600 font-semibold">Product Description</label>
                            <x-input.rich-text id="description" />
                        </div>
                    </div>
                    <div class="space-x-2">
                        <a href="{{ route('products.index') }}" class="bg-secondary-color text-white py-3 px-4 rounded-md border-secondary-color ">
                            Back
                        </a>
                        <x-button.primary class="py-3 text-base">
                            Create New Product
                        </x-button.primary>
                    </div>
               </form>
            </div>
        </div>
    </div>
</div>
