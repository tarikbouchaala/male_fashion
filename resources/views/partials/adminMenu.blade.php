<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link gap-2">
            <img src="/img/logo.png" alt="">
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <li class="menu-header small text-uppercase ">
            <span class="menu-header-text">Profile</span>
        </li>
        <li
            class="menu-item {{ Request::path() == 'dashboard/admin/account' || Request::path() == 'dashboard/admin/security' ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Account Settings</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::path() == 'dashboard/admin/account' ? 'active' : '' }}">
                    <a href="{{ route('dashboard-admin-account') }}" class="menu-link">
                        <div data-i18n="Account">Account</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::path() == 'dashboard/admin/security' ? 'active open' : '' }}">
                    <a href="{{ route('dashboard-admin-security') }}" class="menu-link">
                        <div data-i18n="Security">Security</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Management</span>
        </li>
        <li
            class="menu-item {{ Request::path() == 'dashboard/admin/categories' || Request::path() == 'dashboard/admin/category/create' || Str::startsWith(Route::currentRouteName(), 'dashboard-admin-category-update') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-purchase-tag"></i>
                <div data-i18n="Categories">Categories</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::path() == 'dashboard/admin/categories' ? 'active' : '' }}">
                    <a href="{{ route('dashboard-admin-categories-show') }}" class="menu-link">
                        <div data-i18n="My Categories">My Categories</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::path() == 'dashboard/admin/category/create' ? 'active' : '' }}">
                    <a href="{{ route('dashboard-admin-category-create') }}" class="menu-link">
                        <div data-i18n="Create Category">Create Category</div>
                    </a>
                </li>
                <li
                    class="menu-item {{ Str::startsWith(Route::currentRouteName(), 'dashboard-admin-category-update') ? 'active' : '' }}">
                    <a class="menu-link">
                        <div data-i18n="Update Category">Update Category</div>
                    </a>
                </li>
            </ul>
        </li>
        <li
            class="menu-item  {{ Request::path() == 'dashboard/admin/products' || Request::path() == 'dashboard/admin/product/create' || Str::startsWith(Route::currentRouteName(), 'dashboard-admin-product-update') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Products">Products</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::path() == 'dashboard/admin/products' ? 'active' : '' }}">
                    <a href="{{ route('dashboard-admin-products-show') }}" class="menu-link">
                        <div data-i18n="My Products">My Products</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::path() == 'dashboard/admin/product/create' ? 'active' : '' }}">
                    <a href="{{ route('dashboard-admin-product-create') }}" class="menu-link">
                        <div data-i18n="Create Product">Create Product</div>
                    </a>
                </li>
                <li
                    class="menu-item {{ Str::startsWith(Route::currentRouteName(), 'dashboard-admin-product-update') ? 'active' : '' }}">
                    <a class="menu-link">
                        <div data-i18n="Update Product">Update Product</div>
                    </a>
                </li>
            </ul>
        </li>
        <li
            class="menu-item {{ Request::path() == 'dashboard/admin/orders' || Str::startsWith(Route::currentRouteName(), 'dashboard-admin-order-update') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-package"></i>
                <div data-i18n="Orders">Orders</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::path() == 'dashboard/admin/orders' ? 'active' : '' }}">
                    <a href="{{ route('dashboard-admin-orders-show') }}" class="menu-link">
                        <div data-i18n="Client Orders">Client Orders</div>
                    </a>
                </li>
                <li
                    class="menu-item {{ Str::startsWith(Route::currentRouteName(), 'dashboard-admin-order-update') ? 'active' : '' }}">
                    <a class="menu-link">
                        <div data-i18n="Update Order">Update Order</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ Request::path() == 'dashboard/admin/clients' ? 'active' : '' }}">
            <a href="{{ route('dashboard-admin-clients') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Tables">Clients</div>
            </a>
        </li>
        <li class="menu-item mt-5">
            <a href="/logout" class="menu-link">
                <i class="menu-icon tf-icons bx bx-log-out"></i>
                <div data-i18n="Tables">Logout</div>
            </a>
        </li>
    </ul>
</aside>
