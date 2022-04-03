@section('page-heading')
    <h3 class="font-bold text-xl">List of products</h3>
@endsection

<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-table>
            <x-slot name="tableTitle">
                <div class="mb-4">
                    <h3 class="font-bold text-lg text-gray-500">All Products</h3>
                </div>
            </x-slot>
            <x-slot name="tableFilter">
                <div class="mb-6 rounded-md flex items-center justify-between">
                    <div class="w-96">
                        <div class="rounded-md bg-white pl-2 flex items-center border border-gray-200">
                            <input  type="text" placeholder="Search for products" class="placeholder:text-gray-400 py-1.5 px-4 border-none outline-none bg-transparent focus:ring-0">
                        </div>
                    </div>
                    <div class="flex space-x-2 items-center">
                        <x-input.group borderless paddingless inline for="perPage" label="Per Page">
                            <x-input.select wire:model="perPage" id="perPage" class="py-1.5 text-gray-400 text-sm">
                                <option value="7">7</option>
                                <option value="15">15</option>
                                <option value="50">50</option>
                            </x-input.select>
                        </x-input.group>

                        <div class="bg-white border border-gray-200 rounded-md">
                            <button class="text-sm text-gray-400 font-bold py-1.5 px-4">
                                <i class="fa-solid fa-filter"></i>
                                <span class="ml-1">Filters</span>
                            </button>
                        </div>
                        <div class="bg-white border border-gray-200 rounded-md">
                            <x-dropdown label="Bulk Actions">
                                <x-dropdown.item wire:click="exportSelected" type="button" class="flex items-center space-x-2">
                                    <x-icon.download class="text-gray-400"/>
                                    <span class="text-gray-400">Export</span>
                                </x-dropdown.item>

                                <x-dropdown.item wire:click="$toggle('showDeleteModal')" type="button" class="flex items-center space-x-2">
                                    <x-icon.trash class="text-gray-400"/>
                                    <span class="text-gray-400">Delete</span>
                                </x-dropdown.item>
                            </x-dropdown>
                        </div>



                        <div class="bg-secondary-color border border-secondary-color rounded-md py-1">
                            <a href="{{ route('products.create') }}" class="text-sm text-gray-cool px-4">
                                <i class="fa-solid fa-square-plus"></i>
                                <span class="ml-1">Add Product</span>
                            </a>
                        </div>
                    </div>
                </div>
            </x-slot>
            <x-slot name="tableContent">

            </x-slot>
            <x-slot name="tablePagination">

            </x-slot>
        </x-table>
    </div>
</div>
