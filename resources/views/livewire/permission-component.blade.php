
@section('page-heading')
<h3 class="font-bold text-xl">User Management - Permission</h3>
@endsection


<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-table>
            <x-slot name="tableTitle">
                <div class="mb-4">
                    <h3 class="font-bold text-lg text-gray-500">Permissions Details</h3>
                </div>
            </x-slot>
            <x-slot name="tableFilter">
                <div class="mb-6 rounded-md flex items-center justify-between">
                    <div class="w-96">
                        <div class="rounded-md bg-white pl-2 flex items-center border border-gray-200">
                            <input wire:model="search" type="text" placeholder="Search for permissions" class="placeholder:text-gray-400 py-1.5 px-4 border-none outline-none bg-transparent focus:ring-0">
                        </div>
                    </div>
                    <div class="flex space-x-2 items-center">
                        <x-dropdown.inline class="py-1.5 text-sm">
                            <option value="7">7</option>
                            <option value="15">15</option>
                            <option value="50">50</option>
                        </x-dropdown.inline>

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



                        <div class="bg-secondary-color border border-secondary-color rounded-md">
                            <button class="text-sm text-gray-cool py-1.5 px-4" wire:click="create">
                                <i class="fa-solid fa-square-plus"></i>
                                <span class="ml-1">Add Permission</span>
                            </button>
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

                                <x-table.th sortable wire:click="sortBy('name')" :direction="$sortField === 'name' ? $sortDirection : null">
                                    Name
                                </x-table.th>

                                <x-table.th class="w-64">
                                    Action
                                </x-table.th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @if ($selectPage)
                                <x-table.tbody-row class="bg-amber-100" wire:key="row-message">
                                    <x-table.td colspan="5">
                                        @unless ($selectAll)
                                           <div>
                                                <span class="text-gray-500">You have selected <strong>{{ $permissions->count() }}</strong> permissions, do you want to select all <strong>{{ $permissions->total() }}</strong> ?</span>
                                                <x-button.link wire:click="selectAll" class="text-gray-600 ml-1 underline font-bold">Select All</x-button.link>
                                           </div>
                                        @else
                                            <span class="text-gray-500">You are currently selecting all <strong>{{ $permissions->total() }}</strong> permissions.</span>
                                        @endif
                                    </x-table.td>
                                </x-table.tbody-row>
                            @endif
                            @forelse ($permissions as $permission)
                                <x-table.tbody-row wire:loading.class.delay="opacity-50" wire:key="row-{{ $permission->id }}">
                                    <x-table.td>
                                        <x-input.checkbox wire:model="selected" value="{{ $permission->id }}" />
                                    </x-table.td>

                                    <x-table.td>
                                        {{ $permission->id }}
                                    </x-table.td>

                                    <x-table.td>
                                        {{ $permission->name }}
                                    </x-table.td>

                                    <x-table.td>
                                        <div class="space-x-0.5">
                                            <x-button.action class="bg-transparent border-gray-400 text-gray-400">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </x-button.action>
                                            <x-button.action wire:click="edit({{ $permission->id }})" class="bg-amber-100 border-amber-300  text-amber-400 ">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </x-button.action>
                                            <x-button.action class="bg-transparent border-red-400 text-red-400">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </x-button.action>
                                        </div>
                                    </x-table.td>

                                </x-table.tbody-row>
                            @empty
                            <x-table.tbody-row>
                                <x-table.td colspan="6">
                                    <div class="flex justify-center items-center space-x-2">
                                        {{-- <x-icon.inbox class="h-8 w-8 text-cool-gray-400" /> --}}
                                        <span class="font-medium py-8 text-cool-gray-400 text-xl">No transactions found...</span>
                                    </div>
                                </x-table.td>
                            </x-table.tbody-row>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </x-slot>
            <x-slot name="tablePagination">
                {{ $permissions->links('vendor.pagination.custom') }}
            </x-slot>
        </x-table>
    </div>

    <form wire:submit.prevent="save">
        <x-modal.dialog wire:model.defer="showEditModal">
            <x-slot name="title"><span class="text-gray-500 font-semibold">Edit Permission</span></x-slot>

            <x-slot name="content">
                    <div class="form-group flex flex-col mb-5">
                        <label for="name" class="mb-2 text-gray-400">Name of the permission *</label>
                        <input wire:model="editing.name" class="form-control border-gray-300 px-3 py-2 rounded-md shadow-sm placeholder:text-gray-500 text-gray-500" type="text" id="name" placeholder="Eg : Add product">
                        @error('editing.name')
                            <p class="text-error-color mt-2 font-semibold text-sm">{{ $message }}</p>
                        @enderror
                    </div>
            </x-slot>

            <x-slot name="footer">
                <x-button.secondary wire:click="$set('showEditModal', false)">Cancel</x-button.secondary>

                <x-button.primary type="submit">Save</x-button.primary>
            </x-slot>
        </x-modal.dialog>
    </form>

    <form wire:submit.prevent="deleteSelected">
        <x-modal.confirmation wire:model.defer="showDeleteModal">
            <x-slot name="title"><span class="text-gray-500 font-semibold">Delete Permission</span></x-slot>

            <x-slot name="content">
                <div class="py-8 text-cool-gray-700">Are you sure you? This action is irreversible.</div>
            </x-slot>

            <x-slot name="footer">
                <x-button.secondary wire:click="$set('showDeleteModal', false)">Cancel</x-button.secondary>

                <x-button.primary type="submit">Delete</x-button.primary>
            </x-slot>
        </x-modal.confirmation>
    </form>

</div>

