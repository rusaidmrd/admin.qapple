<div>
    <ul class="text-pr-color pl-5 mt-8">
        <li class="mb-1 nav__link">
            <a
                href="{{ route('admin.dashboard') }}"
                @class([
                    'py-4 block pl-4 text-sm hover:bg-primary-dark',
                    'text-secondary-color border-secondary-color border-r-5' => request()->routeIs('admin.dashboard')
                ])
            >
                <i class="fa-solid fa-gauge"></i>
                <span class="ml-1">Dashboard</span>
            </a>
        </li>
        <li class="mb-1 nav__link">
            <a
                href="#"
                class="py-4 block pl-4 text-sm hover:bg-primary-dark"
                >
                <i class="fa-solid fa-cart-shopping"></i>
                <span class="ml-1">Orders</span>
            </a>
        </li>
        <li class="mb-1 nav__link">
            <a href="#" class="py-4 block pl-4 text-sm hover:bg-primary-dark">
                <i class="fa-solid fa-bag-shopping"></i>
                <span class="ml-1">Products</span>
            </a>
        </li>
        <li class="mb-1 nav__link">
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
        <li class="mb-1 nav__link">
            <a href="#" class="py-4 block pl-4 text-sm hover:bg-primary-dark">
                <i class="fa-solid fa-globe"></i>
                <span class="ml-1">Brands</span>
            </a>
        </li>
        <li class="mb-1 nav__link">
            <a href="#" class="py-4 block pl-4 text-sm hover:bg-primary-dark">
                <i class="fa-solid fa-bars-staggered"></i>
                <span class="ml-1">Attributes</span>
            </a>
        </li>
        <li class="mb-1 nav__link">
            <a href="#" class="py-4 block pl-4 text-sm hover:bg-primary-dark">
                <i class="fa-solid fa-user-gear"></i>
                <span class="ml-1">User management <i class="fa-solid fa-chevron-down ml-3"></i></span>
            </a>
            <ul class="pl-4 sub-menu">
                <li>
                    <a href="#" class="py-2 pl-4 block text-sm hover:bg-primary-dark">User list</a>
                </li>
                <li>
                    <a href="#" class="py-2 pl-4 block text-sm hover:bg-primary-dark">Roles</a>
                </li>
                <li>
                    <a href="#" class="py-2 pl-4 block text-sm hover:bg-primary-dark">Permissions</a>
                </li>
            </ul>
        </li>
    </ul>
</div>

<div class="mt-10">
    <ul class="text-pr-color pl-5 mt-8">
        <li class="mb-1 nav__link">
            <a href="#" class="py-4 block pl-4 text-sm text-secondary-color border-secondary-color border-r-5">
                <i class="fa-solid fa-chart-line"></i>
                <span class="ml-1">Reports</span>
            </a>
        </li>
        <li class="mb-1 nav__link">
            <a href="#" class="py-4 block pl-4 text-sm hover:bg-primary-dark">
                <i class="fa-solid fa-user-group"></i>
                <span class="ml-1">Customers</span>
            </a>
        </li>
        <li class="mb-1 nav__link">
            <a href="#" class="py-4 block pl-4 text-sm hover:bg-primary-dark">
                <i class="fa-solid fa-gear"></i>
                <span class="ml-1">Settings</span>
            </a>
        </li>

    </ul>
</div>
