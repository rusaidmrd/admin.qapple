<div>
    <ul class="text-pr-color pl-5 mt-8">
        <li class="mb-1">
            <a
                href="{{ route('dashboard') }}"
                @class([
                    'py-4 block pl-4 text-sm hover:bg-primary-dark',
                    'text-secondary-color border-secondary-color border-r-5' => request()->routeIs('dashboard')
                ])
            >
                <i class="fa-solid fa-gauge"></i>
                <span class="ml-1">Dashboard</span>
            </a>
        </li>
        <li class="mb-1">
            <a
                href="{{ route('permissions.index') }}"
                class="py-4 block pl-4 text-sm hover:bg-primary-dark"
                >
                <i class="fa-solid fa-cart-shopping"></i>
                <span class="ml-1">Orders</span>
            </a>
        </li>
        <li class="mb-1">
            <a
                href="{{ route('products.index') }}"
                @class([
                    'py-4 block pl-4 text-sm hover:bg-primary-dark',
                    'text-secondary-color border-secondary-color border-r-5' => request()->routeIs('products.*')
                ])
            >
                <i class="fa-solid fa-bag-shopping"></i>
                <span class="ml-1">Products</span>
            </a>
        </li>
        <li class="mb-1">
            <a
                href="{{ route('category.index') }}"
                @class([
                    'py-4 block pl-4 text-sm hover:bg-primary-dark',
                    'text-secondary-color border-secondary-color border-r-5' => request()->routeIs('category.index')
                ])
            >
                <i class="fa-solid fa-folder-tree"></i>
                <span class="ml-1">Categories</span>
            </a>
        </li>
        <li class="mb-1">
            <a href="#" class="py-4 block pl-4 text-sm hover:bg-primary-dark">
                <i class="fa-solid fa-globe"></i>
                <span class="ml-1">Brands</span>
            </a>
        </li>
        <li class="mb-1">
            <a
                href="{{ route('attributes.index') }}"
                @class([
                    'py-4 block pl-4 text-sm hover:bg-primary-dark',
                    'text-secondary-color border-secondary-color border-r-5' => request()->routeIs('attributes.index')
                ])
            >
                <i class="fa-solid fa-bars-staggered"></i>
                <span class="ml-1">Attributes</span>
            </a>
        </li>
        <li class="mb-1 nav__link" x-data="{ isSubMenuOpen: false }">
            <button type="button" class="py-4 block pl-4 text-sm hover:bg-primary-dark" @click.prevent="isSubMenuOpen = !isSubMenuOpen">
                <i class="fa-solid fa-user-gear"></i>
                <span class="ml-1">User management <i class="fa-solid fa-chevron-down ml-3"></i></span>
            </button>
            <ul class="pl-4 sub-menu" :class="{ 'show-menu': isSubMenuOpen }">
                <li>
                    <a href="{{ route('users.index') }}" class="py-2 pl-4 block text-sm hover:bg-primary-dark">User list</a>
                </li>
                <li>
                    <a href="{{ route('roles.index') }}" class="py-2 pl-4 block text-sm hover:bg-primary-dark">Roles</a>
                </li>
                @can('permission_show')
                    <li>
                        <a href="{{ route('permissions.index') }}" class="py-2 pl-4 block text-sm hover:bg-primary-dark">Permissions</a>
                    </li>
                @endcan

            </ul>
        </li>
    </ul>
</div>

<div class="mt-10">
    <ul class="text-pr-color pl-5 mt-8">
        <li class="mb-1">
            <a href="#" class="py-4 block pl-4 text-sm text-secondary-color border-secondary-color border-r-5">
                <i class="fa-solid fa-chart-line"></i>
                <span class="ml-1">Reports</span>
            </a>
        </li>
        <li class="mb-1">
            <a href="#" class="py-4 block pl-4 text-sm hover:bg-primary-dark">
                <i class="fa-solid fa-user-group"></i>
                <span class="ml-1">Customers</span>
            </a>
        </li>
        <li class="mb-1">
            <a href="#" class="py-4 block pl-4 text-sm hover:bg-primary-dark">
                <i class="fa-solid fa-gear"></i>
                <span class="ml-1">Settings</span>
            </a>
        </li>

    </ul>
</div>
