<header class="px-7 flex items-center justify-between bg-white h-16">
    <div>
        <div class="humburger cursor-pointer lg:hidden" @click="isNavOpen=true">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </div>

        <div class="heading">
            @yield('page-heading')
        </div>
    </div>

    <div class="flex items-center justify-between">
        <form action="" class="search">
            <div class="rounded-3xl bg-gray-color pl-4 flex items-center">
                <div class="text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" placeholder="Search..." class="border-none outline-none bg-transparent focus:ring-0">
            </div>
        </form>
        <div class="notification text-gray-500 ml-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
        </div>

        <div class="account-info flex items-center justify-between ml-5 relative" x-data="{isprofileMenuOpen:false}">
            <div class="profile-img">
                <img src="{{ asset('images/no_profile.png') }}" alt="profile image" class="ml-4 w-10 h-10 rounded-full border-2 border-gray-400">
            </div>
            <div
                class="ml-2 relative cursor-pointer leading-none"
                @click="isprofileMenuOpen = !isprofileMenuOpen"
            >
                <div class="flex justify-between items-start">
                    <h4 class="text-sm font-bold mr-1">{{ Auth::user()->name }}</h4>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>

                <span class="text-xs text-gray-400">Admin</span>
            </div>
            <div
                @click.away="isprofileMenuOpen = false"
                class="absolute right-0 top-12 px-4 py-4 rounded-lg bg-white w-40 shadow-md"
                x-cloak
                x-show="isprofileMenuOpen"
                x-transition.origin.top.bottom
            >
                <ul>
                    <li>
                        <a href="#" class="text-gray-500 text-sm py-1 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="ml-2">Settings</span>
                        </a>
                    </li>
                    <li>
                       <form action="{{ route('logout') }}" method="POST">
                            @csrf

                            <a
                                href="{{ route('logout') }}"
                                class="text-gray-500 text-sm py-1 flex items-center"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                <span class="ml-2">Logout</span>
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</header>
