<nav
    class="absolute inset-0 transform duration-200 lg:transform-none lg:relative z-10 bg-dark-color text-white h-100 w-64 overflow-auto" id="sidebar-scroll"
    :class="{'translate-x-0':isNavOpen===true,'-translate-x-full':isNavOpen===false}"
>
    <div class="logo bg-primary-dark flex items-center h-16 justify-between pl-10 pr-4">
        {{-- <img class="h-8" src="{{ asset('images/logo.png') }}" alt="logo"> --}}
        <h3 class="font-bold text-lg">Qapple.store</h3>
        <div class="cursor-pointer text-secondary-color lg:hidden" @click="isNavOpen=false">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </div>
    </div>
    <x-sidebar/>
</nav>
