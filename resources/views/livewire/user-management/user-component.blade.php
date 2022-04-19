@section('page-heading')
    <h3 class="font-bold text-xl">User Management - User List</h3>
@endsection

<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if (session()->has('success'))
            <div
                x-data="{ show: true }"
                x-show="show"
                class="flex justify-between items-center text-sm font-bold text-green-800 bg-green-200 py-3 px-3 rounded-lg mb-3">
                <div>
                    <span class="mr-3">Success !!</span>
                    {{ session('message') }}
                </div>
                <div>
                    <button type="button" @click="show = false">
                        <span class="text-2xl">&times;</span>
                    </button>
                </div>
            </div>
        @endif
        <x-table>
            <x-slot name="tableTitle">
                <div class="mb-4">
                    <h3 class="font-bold text-lg text-gray-500">Users Details</h3>
                </div>
            </x-slot>
            <x-slot name="tableFilter">
                <div class="mb-6 rounded-md flex items-center justify-between">
                    <div class="w-96">
                        <div class="rounded-md bg-white pl-2 flex items-center border border-gray-200">
                            <input wire:model="search" type="text" placeholder="Search for users" class="placeholder:text-gray-400 py-1.5 px-4 border-none outline-none bg-transparent focus:ring-0">
                        </div>
                    </div>
                    <div class="flex space-x-2 items-center">
                        <x-dropdown.inline class="py-1.5 text-sm">
                            <option value="7">7</option>
                            <option value="15">15</option>
                            <option value="50">50</option>
                        </x-dropdown.inline>

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



                        <div class="bg-secondary-color rounded-md py-1.5">
                            <a href="{{ route('users.create') }}" class="text-sm text-gray-cool px-4">
                                <i class="fa-solid fa-square-plus"></i>
                                <span class="ml-1">Add user</span>
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

                                <x-table.th sortable wire:click="sortBy('name')" :direction="$sortField === 'name' ? $sortDirection : null">
                                    Name
                                </x-table.th>

                                <x-table.th sortable wire:click="sortBy('email')" :direction="$sortField === 'email' ? $sortDirection : null">
                                    Email
                                </x-table.th>

                                <x-table.th>
                                    Roles
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
                                                <span class="text-gray-500">You have selected <strong>{{ $users->count() }}</strong> users, do you want to select all <strong>{{ $users->total() }}</strong> ?</span>
                                                <x-button.link wire:click="selectAll" class="text-gray-600 ml-1 underline font-bold">Select All</x-button.link>
                                           </div>
                                        @else
                                            <span class="text-gray-500">You are currently selecting all <strong>{{ $users->total() }}</strong> users.</span>
                                        @endif
                                    </x-table.td>
                                </x-table.tbody-row>
                            @endif
                            @forelse ($users as $user)
                                <x-table.tbody-row wire:loading.class.delay="opacity-50" wire:key="row-{{ $user->id }}">
                                    <x-table.td>
                                        <x-input.checkbox wire:model="selected" value="{{ $user->id }}" />
                                    </x-table.td>

                                    <x-table.td>
                                        {{ $user->id }}
                                    </x-table.td>

                                    <x-table.td>
                                        {{ $user->name }}
                                    </x-table.td>

                                    <x-table.td>
                                        {{ $user->email }}
                                    </x-table.td>

                                    <x-table.td class="py-6">
                                        <div class="flex flex-row flex-wrap">

                                            @foreach ($user->roles as $key => $role )
                                                <span class="text-xs bg-cyan-600 text-white py-1 px-4 rounded-md mr-1 mb-1">{{ $role->name }}</span>
                                            @endforeach
                                        </div>
                                    </x-table.td>

                                    <x-table.td>
                                        <div class="space-x-0.5">
                                            {{-- <x-button.action wire:click="edit({{ $user->id }})" class="bg-green-50 text-green-500 border-green-300 border">
                                                Edit
                                            </x-button.action> --}}
                                            <a href="{{ route('users.edit',$user->id) }}">Edit</a>
                                        </div>
                                    </x-table.td>

                                </x-table.tbody-row>
                            @empty
                            <x-table.tbody-row>
                                <x-table.td colspan="6">
                                    <div class="flex justify-center items-center space-x-2">
                                        {{-- <x-icon.inbox class="h-8 w-8 text-cool-gray-400" /> --}}
                                        <span class="font-medium py-8 text-cool-gray-400 text-xl">No users found...</span>
                                    </div>
                                </x-table.td>
                            </x-table.tbody-row>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </x-slot>
            <x-slot name="tablePagination">
                {{ $users->links('vendor.pagination.custom') }}
            </x-slot>
        </x-table>
    </div>

    <form wire:submit.prevent="save">
        <x-modal.dialog wire:model.defer="showEditModal">
            <x-slot name="title"><span class="text-gray-500 font-semibold">Add User </span></x-slot>

            <x-slot name="content">
                   <x-input.group label="Name" for="name" :error="$errors->first('user.name')">
                        <input wire:model="user.name" id="name" class="form-input" type="text" placeholder="Eg : Jhon Steve">
                   </x-input.group>

                   <x-input.group label="Email address" for="email" :error="$errors->first('user.email')">
                        <input wire:model.lazy="user.email" id="email" class="form-input" type="email" placeholder="Eg : jhonsteve@gmail.com">
                   </x-input.group>

                   <x-input.group label="Password" for="password" :error="$errors->first('user.password')">
                        <input wire:model.defer="user.password" id="password" class="form-input" type="password" placeholder="***************">
                   </x-input.group>

                   <x-input.group label="Roles" for="roles" :error="$errors->first('selectedRoles')">
                        <div wire:ignore>
                            <div class="mb-2">
                                <span class="select-all cursor-pointer text-xs bg-primary-color text-white py-1 px-4 rounded-md">Select All</span>
                                <span class="deselect-all cursor-pointer text-xs bg-primary-color text-white py-1 px-4 rounded-md">Deselect All</span>
                            </div>
                            <select class="form-input select2  w-full" id="roles" multiple style="width: 100%">
                                <option value="" disabled="disabled">Select roles </option>
                                @foreach ($roles as $id => $role)
                                    <option value="{{ $id }}">{{ $role }}</option>
                                @endforeach
                            </select>
                        </div>
                    </x-input.group>
            </x-slot>

            <x-slot name="footer">
                <x-button.secondary wire:click="$set('showEditModal', false)">Cancel</x-button.secondary>
                <x-button.primary type="submit">Save</x-button.primary>
            </x-slot>
        </x-modal.dialog>
    </form>

    <form wire:submit.prevent="deleteSelected">
        <x-modal.confirmation wire:model.defer="showDeleteModal">
            <x-slot name="title"><span class="text-gray-500 font-semibold">Delete user</span></x-slot>

            <x-slot name="content">
                <div class="py-8 text-cool-gray-700">Are you sure you? This action is irreversible.</div>
            </x-slot>

            <x-slot name="footer">
                <x-button.secondary wire:click="$set('showDeleteModal', false)">Cancel</x-button.secondary>

                <x-button.primary type="submit">Delete</x-button.primary>
            </x-slot>
        </x-modal.confirmation>
    </form>


    @push('scripts')
        <script>
            $(document).ready(function () {

                $('#roles').select2({
                    placeholder: "Select role",
                    multiple: true,
                    allowClear: true,
                });

                $('#roles').on('change', function (e) {
                    let data = $('#roles').select2("val");
                    @this.set('selectedRoles', data);
                });

                // Livewire.on('loadRoles', roles => {
                //     $('#roles').val(roles);
                //     $('#roles').trigger('change');
                // })

            });

        </script>
    @endpush

</div>
