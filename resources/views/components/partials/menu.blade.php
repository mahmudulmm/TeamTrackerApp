<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <br>
    <div class="app-brand demo position-fixed">
        <img src="{{ asset('dashboard_asset') }}/assets/img/branding/brand-logo.png" width="200" height="140" />
    </div>
    <div class="divider my-5">
        <div class="divider-text">-</div>
    </div>

    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-3">
        <x-partials.dashboard />
        <x-partials.hr />
        <x-partials.host />
        <x-partials.mlayouts />
        <x-partials.order />
        <x-partials.product />
        <x-partials.payment />
        <x-partials.maps />
    </ul>
</aside>
