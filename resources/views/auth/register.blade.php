<x-guest-layout>
    <div class="h-screen bg-gradient-to-r from-grad-left via-grad-center to-grad-right flex justify-center items-center">
        <div class="w-96 bg-white py-8 px-8 rounded-lg h-auto">
            <div>
                <h3>Create an Account</h3>
            </div>
            <div class="mt-4">
                <form method="POST" action="{{ route('admin.register') }}">
                    @csrf
                    <div class="mb-6">
                        @error('name')
                            <label for="name" class="block mb-2 text-sm font-medium text-rose-500">Your Name</label>
                            <input type="text" id="name" name="name" class="bg-gray-50 border border-rose-500 text-gray-900 text-sm rounded-lg focus:ring-rose-500 focus:border-rose-500 block w-full p-2.5 placeholder:text-rose-500" placeholder="Eg: Mike Robert" value="{{ old('name') }}">
                            <p class="text-rose-500 mt-1 font-semibold">{{ $message }}</p>
                        @else
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Your Name</label>
                            <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-color focus:border-primary-color block w-full p-2.5" placeholder="Eg: Mike Robert" value="{{ old('name') }}">
                        @enderror
                    </div>
                    <div class="mb-6">
                        @error('email')
                            <label for="email" class="block mb-2 text-sm font-medium text-rose-500">Email Address</label>
                            <input type="email" id="email" name="email" class="bg-gray-50 border border-rose-500 text-gray-900 text-sm rounded-lg focus:ring-rose-500 focus:border-rose-500 block w-full p-2.5 placeholder:text-rose-500" placeholder="name@domain.com" value="{{ old('email') }}">
                            <p class="text-rose-500 mt-1 font-semibold">{{ $message }}</p>
                        @else
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email Address</label>
                            <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-color focus:border-primary-color block w-full p-2.5" placeholder="name@domain.com" value="{{ old('email') }}">
                        @enderror
                    </div>

                    @error('password')
                        <div class="mb-6">
                            <label for="password" class="block mb-2 text-sm font-medium text-rose-500">Password</label>
                            <input type="password" id="password" name="password" class="bg-gray-50 border border-rose-500 text-gray-900 text-sm rounded-lg focus:ring-rose-500 focus:border-rose-500 block w-full p-2.5" autocomplete="new-password">
                        </div>
                        <div class="mb-6">
                            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-rose-500">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="bg-gray-50 border border-rose-500 text-gray-900 text-sm rounded-lg focus:ring-rose-500 focus:border-rose-500 block w-full p-2.5">
                            <p class="text-rose-500 mt-1 font-semibold">{{ $message }}</p>
                        </div>
                    @else
                        <div class="mb-6">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                            <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-color focus:border-primary-color block w-full p-2.5" autocomplete="new-password">
                        </div>
                        <div class="mb-6">
                            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-color focus:border-primary-color block w-full p-2.5">
                        </div>
                    @enderror


                    {{-- <div class="flex items-start mb-6">
                      <div class="flex items-center h-5">
                        <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-blue-300" required>
                      </div>
                      <div class="ml-3 text-sm">
                        <label for="remember" class="font-medium text-gray-900">Remember me</label>
                      </div>
                    </div> --}}
                    <div class="flex items-center justify-between mt-4">
                        <button type="submit" class="text-white bg-primary-color hover:bg-primary-dark focus:ring-4 focus:ring-primary-dark font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Register</button>
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('admin.login.page') }}">
                            Already registered?
                        </a>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</x-guest-layout>


