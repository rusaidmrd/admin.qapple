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
                            <input wire:model="search" type="text" placeholder="Search for products" class="placeholder:text-gray-400 py-1.5 px-4 border-none outline-none bg-transparent focus:ring-0">
                        </div>
                    </div>
                    <div class="flex space-x-2 items-center">

                        <x-dropdown.inline class="py-1.5 text-sm">
                            <option value="5">5</option>
                            <option value="15">15</option>
                            <option value="50">50</option>
                        </x-dropdown.inline>

                        {{-- <div class="bg-white border border-gray-200 rounded-md">
                            <button class="text-sm text-gray-400 font-bold py-1.5 px-4">
                                <i class="fa-solid fa-filter"></i>
                                <span class="ml-1">Filters</span>
                            </button>
                        </div> --}}
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
                <div class="shadow-sm rounded-md overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <x-table.th class="w-8">
                                    <x-input.checkbox wire:model="selectPage" />
                                </x-table.th>

                                <x-table.th class="w-10" sortable wire:click="sortBy('id')" :direction="$sortField === 'id' ? $sortDirection : null">
                                    ID
                                </x-table.th>

                                <x-table.th>
                                    Photo
                                </x-table.th>

                                <x-table.th sortable wire:click="sortBy('name')" :direction="$sortField === 'name' ? $sortDirection : null">
                                    Name
                                </x-table.th>

                                <x-table.th>
                                    Category
                                </x-table.th>

                                <x-table.th sortable wire:click="sortBy('price')" :direction="$sortField === 'price' ? $sortDirection : null">
                                    Price
                                </x-table.th>

                                <x-table.th>
                                    Status
                                </x-table.th>

                                <x-table.th>
                                    Date Added
                                </x-table.th>

                                <x-table.th class="w-16">
                                    Action
                                </x-table.th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @if ($selectPage)
                                <x-table.tbody-row class="bg-amber-100" wire:key="row-message">
                                    <x-table.td colspan="9">
                                        @unless ($selectAll)
                                           <div>
                                                <span class="text-gray-500">You have selected <strong>{{ $products->count() }}</strong> products, do you want to select all <strong>{{ $products->total() }}</strong> ?</span>
                                                <x-button.link wire:click="selectAll" class="text-gray-600 ml-1 underline font-bold">Select All</x-button.link>
                                           </div>
                                        @else
                                            <span class="text-gray-500">You are currently selecting all <strong>{{ $products->total() }}</strong> products.</span>
                                        @endif
                                    </x-table.td>
                                </x-table.tbody-row>
                            @endif
                            @forelse ($products as $product)
                                <x-table.tbody-row wire:loading.class.delay="opacity-50" wire:key="row-{{ $product->id }}">
                                    <x-table.td>
                                        <x-input.checkbox wire:model="selected" value="{{ $product->id }}" />
                                    </x-table.td>

                                    <x-table.td>
                                        {{ $product->id }}
                                    </x-table.td>

                                    <x-table.td>
                                        @if (count($product->images) == 0)
                                            <img class="w-12 h-14 object-cover rounded-md overflow-hidden bg-gray-100" src="{{ $product->defaultImageUrl() }}" alt="{{ $product->name }}">
                                        @else
                                            <img class="w-12 h-14 object-cover rounded-md overflow-hidden bg-gray-100" src="{{ $product->images[0]->url() }}" alt="{{ $product->name }}">
                                        @endif
                                    </x-table.td>

                                    <x-table.td>
                                        <p class="font-bold">{{ $product->name }}</p>
                                        <span>#3445765</span>
                                    </x-table.td>

                                    <x-table.td>
                                        @foreach ($product->categories as $category )
                                            <span class="font-bold">{{ $category->name }}@if (!$loop->last), @endif </span>
                                        @endforeach
                                    </x-table.td>

                                    <x-table.td class="text-primary-color font-semibold">
                                        @if ($product->hasProductAttribute())
                                           Variation price
                                        @else
                                            QAR {{ $product->price }}
                                        @endif
                                    </x-table.td>

                                    <x-table.td>
                                        <x-status wire:click="toggleActivate({{ $product->id }})" active="{{ $product->status }}" class="text-xs cursor-pointer">
                                            {{ $product->status ? 'Active' : 'Inactive' }}
                                        </x-status>
                                    </x-table.td>

                                    <x-table.td>
                                        {{ $product->created_at->toFormattedDateString() }}
                                    </x-table.td>

                                    <x-table.td>
                                        <div class="space-x-0.5">
                                            <a href="{{ route('products.edit',$product->id) }}" class="text-primary-color underline">Edit</a>
                                        </div>
                                    </x-table.td>

                                </x-table.tbody-row>
                            @empty
                            <x-table.tbody-row>
                                <x-table.td colspan="6">
                                    <div class="flex justify-center items-center space-x-2">
                                        {{-- <x-icon.inbox class="h-8 w-8 text-cool-gray-400" /> --}}
                                        <span class="font-medium py-8 text-cool-gray-400 text-xl">No Products found...</span>
                                    </div>
                                </x-table.td>
                            </x-table.tbody-row>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </x-slot>
            <x-slot name="tablePagination">
                {{ $products->links('vendor.pagination.custom') }}
            </x-slot>
        </x-table>
    </div>
</div>
