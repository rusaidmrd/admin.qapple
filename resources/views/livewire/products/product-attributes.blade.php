<div>
    <div class="p-8 mb-4 bg-white shadow rounded-md sm:rounded-lg">
        <h1 class="text-xl font-semibold">Attributes </h1>
        <div class="mt-5">
            <x-input.group label="Select an Attribute" for="attribute">
                <select wire:model="selectedAttributes" class="form-input" id="attribute" @if ($isUpdate) disabled @endif>
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
                <h1 class="text-xl font-semibold">
                    @if (!$isUpdate)
                        Add Attributes To Product
                    @else
                        Edit Attributes To Product
                    @endif
                </h1>

                <form wire:submit.prevent="@if ($isUpdate) changeProductAttribute @else saveProductAttribute @endif">
                    <div class="mt-5">
                        <x-input.group label="Select a Value" for="attributeValue" :error="$errors->first('productAttribute.value')">
                            <select wire:model="productAttribute.value" class="form-input" id="attributeValue" @if ($isUpdate) disabled @endif>
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
                            @if (!$isUpdate)
                                Add Attributes
                            @else
                                Update Attributes
                            @endif
                        </x-button.primary>
                        @if ($isUpdate)
                            <x-button.error class="py-3 text-sm" wire:click="hideEditElement">
                                Cancel
                            </x-button.error>
                        @endif
                    </div>
                </form>
            </div>
        @endif
    </div>



    <div class="p-8 mb-4 bg-white shadow rounded-md sm:rounded-lg">
        <h1 class="text-xl font-semibold">Product Attributes</h1>
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                  <table class="min-w-full">
                    <thead class="bg-white border-b">
                      <tr>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                          Value
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                          Quantity
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                          Price
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                          Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($productAttributes as $productAttribute )
                            <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $productAttribute->value }}
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $productAttribute->quantity }}
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $productAttribute->price }}
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    <button wire:click="edit({{ $productAttribute->id }})" class="text-primary-color border border-primary-color rounded p-1" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>

                                    <button wire:click="getDeleteId({{ $productAttribute->id }})" class="text-error-color border border-error-color rounded p-1" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </td>
                              </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
    </div>



    <form wire:submit.prevent="deleteData">
        <x-modal.confirmation wire:model.defer="showDeleteModal">
            <x-slot name="title"><span class="text-gray-500 font-semibold">Delete Product Attribute</span></x-slot>

            <x-slot name="content">
                <div class="py-8 text-cool-gray-700">Are you sure you? This action is irreversible.</div>
            </x-slot>

            <x-slot name="footer">
                <x-button.secondary wire:click="hideDeleteModal">Cancel</x-button.secondary>

                <x-button.primary type="submit">Delete</x-button.primary>
            </x-slot>
        </x-modal.confirmation>
    </form>

    @push('scripts')
        <script>
            $(document).ready(function(){
                Livewire.on('edit.product.attribute', productAttribute => {
                    console.log(productAttribute);
                    @this.getSelectedAttributes(productAttribute.attribute_id);
                    $('#attribute').val(productAttribute.attribute_id);
                    $('#attribute').trigger('change');
                });
            });
        </script>
    @endpush

</div>
