<x-app-layout>
    @section('page-heading')
    <h3 class="font-bold text-xl">Add User</h3>
@endsection

<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-md sm:rounded-lg p-8">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <x-input.group label="Name" for="name" :error="$errors->first('name')">
                    <input name="name" id="name" class="form-input" type="text" placeholder="Eg : Jhon Steve" value="{{ old('name') }}">
               </x-input.group>

               <x-input.group label="Email address" for="email" :error="$errors->first('email')">
                    <input name="email" id="email" class="form-input" type="email" placeholder="Eg : jhonsteve@gmail.com" value="{{ old('email') }}">
               </x-input.group>

               <x-input.group label="Password" for="password" :error="$errors->first('password')">
                    <input name="password" id="password" class="form-input" type="password" placeholder="***************" value="{{ old('password') }}">
               </x-input.group>

               <x-input.group label="Roles" for="roles" :error="$errors->first('selectedRoles')">
                    <div>
                        <div class="mb-2">
                            <span class="select-all cursor-pointer text-xs bg-primary-color text-white py-1 px-4 rounded-md">Select All</span>
                            <span class="deselect-all cursor-pointer text-xs bg-primary-color text-white py-1 px-4 rounded-md">Deselect All</span>
                        </div>
                        <select name="roles[]" class="form-input select2  w-full" id="roles" multiple style="width: 100%">
                            <option value="" disabled="disabled">Select roles </option>
                            @foreach ($roles as $id => $role)
                                <option value="{{ $id }}" {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>{{ $role }}</option>
                            @endforeach
                        </select>
                    </div>
                </x-input.group>

                <div class="space-x-2">
                    <a href="{{ route('users.index') }}" class="bg-secondary-color text-white py-3 px-4 rounded-md border-secondary-color ">
                        Back
                    </a>
                    <x-button.primary class="py-3 text-base" type="submit">
                        Create
                    </x-button.primary>
                </div>
           </form>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function () {
                $('#roles').select2({
                    placeholder: "Select role",
                    multiple: true,
                    allowClear: true,
                });
            });

        </script>
    @endpush

</div>

</x-app-layout>

