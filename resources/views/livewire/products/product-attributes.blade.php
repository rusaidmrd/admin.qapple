<div>
    <div class="p-8 mb-4 bg-white shadow rounded-md sm:rounded-lg">
        <h1 class="text-xl font-semibold">Attributes </h1>
        <div class="mt-5">
            <x-input.group label="Select an Attribute" for="attribute">
                <select wire:model="selectedAttributes" class="form-input" id="attribute">
                    <option value="">Select </option>
                    @foreach ($attributes as $attribute)
                        <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                    @endforeach
                </select>
            </x-input.group>
        </div>
    </div>


    <div>
        @if (count($attributeValues) > 0)
            <div class="p-8 mb-4 bg-white shadow rounded-md sm:rounded-lg">
                <h1 class="text-xl font-semibold">Add Attributes To Product</h1>
                <form wire:submit.prevent="saveProductAttribute">
                    <div class="mt-5">
                        <x-input.group label="Select a Value" for="attributeValue" :error="$errors->first('productAttribute.value')">
                            <select wire:model="productAttribute.value" class="form-input" id="attributeValue">
                                <option value="">Select </option>
                                @foreach ($attributeValues as $attr)
                                    <option value="{{ $attr->value }}">{{ $attr->value }}</option>
                                @endforeach
                            </select>
                        </x-input.group>
                    </div>
                    <div class="grid grid-cols-2 gap-8">
                        <x-input.group label="Quantity" for="qty" :error="$errors->first('productAttribute.quantity')">
                            <input wire:model="productAttribute.quantity" id="qty" class="form-input" type="text" placeholder="Enter product quantity">
                        </x-input.group>
                        <x-input.group label="Price" for="price" :error="$errors->first('productAttribute.price')">
                            <input wire:model="productAttribute.price" id="price" class="form-input" type="text" placeholder="Enter product price">
                        </x-input.group>
                    </div>
                    <div class="space-x-2">
                        <x-button.primary class="py-3 text-sm" type="submit">
                            Add Attribute
                        </x-button.primary>
                    </div>
                </form>
            </div>
        @endif
    </div>



    <div class="p-8 mb-4 bg-white shadow rounded-md sm:rounded-lg">
        <h1 class="text-xl font-semibold">Product Attributes</h1>
        @foreach ($productAttributes as $productAttribute )
            <ol>
                <p>{{ $productAttribute->value }}</p>
            </ol>
        @endforeach
    </div>
</div>
