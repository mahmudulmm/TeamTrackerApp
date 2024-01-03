<li class="menu-item has-arrow {{ Request::is('products/allproduct') ? 'open' : '' }}">
    <a href="javascript:void(0);" class="menu-link menu-toggle">

        <i class="menu-icon ti-icons ti ti-package"></i>
        <div data-i18n="Product">Product</div>
    </a>
    <ul class="menu-sub">
        <li class="menu-item {{ Request::is('products/allproduct') ? 'active' : '' }} ">
            <a href="{{ route('allproduct') }}" class="menu-link">
                <div data-i18n="All Product">All Product</div>
            </a>
        </li>
    </ul>
</li>
