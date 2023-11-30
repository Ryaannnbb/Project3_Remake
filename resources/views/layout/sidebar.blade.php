<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 bg-slate-900 fixed-start " id="sidenav-main">
    <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand d-flex align-items-center m-0" href=" https://demos.creative-tim.com/corporate-ui-dashboard/pages/dashboard.html " target="_blank">
        <span class="font-weight-bold text-lg">PetShop</span>
    </a>
    </div>
    <div class="collapse navbar-collapse px-4  w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link {{ request()->is('home/*') ? 'active' : ( request()->is('home') ? 'active' : '') }}" href="{{ route('home') }}">
                <i class="fa-solid fa-house icon icon-sm px-0 text-center d-flex align-items-center justify-content-center" style="color: white;"></i>
                <span class="nav-link-text ms-1">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('pesanan/*') ? 'active' : ( request()->is('pesanan') ? 'active' : '') }}" href="{{ route('pesanan.index') }}">
                <i class="fa-regular fa-clipboard icon icon-sm px-0 text-center d-flex align-items-center justify-content-center" style="color: white;"></i>
                <span class="nav-link-text ms-1">Order</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('pengiriman/*') ? 'active' : ( request()->is('pengiriman') ? 'active' : '') }}" href="{{ route('pengiriman.index') }}">
                <i class="fa-solid fa-truck icon icon-sm px-0 text-center d-flex align-items-center justify-content-center" style="color: white;"></i>
                <span class="nav-link-text ms-1">Delivery</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('kategori/*') ? 'active' : ( request()->is('kategori') ? 'active' : '') }}" href="{{ route('kategori') }}">
                <i class="fa-solid fa-list-ul icon icon-sm px-0 text-center d-flex align-items-center justify-content-center" style="color: white;"></i>
                <span class="nav-link-text ms-1">Category</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('pelanggan/*') ? 'active' : ( request()->is('pelanggan') ? 'active' : '') }}" href="{{ route('pelanggan') }}">
                <i class="fa-solid fa-user-tag icon icon-sm px-0 text-center d-flex align-items-center justify-content-center" style="color: white;"></i>
                <span class="nav-link-text ms-1">Customer</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('pembayaran/*') ? 'active' : ( request()->is('pembayaran') ? 'active' : '') }}" href="{{ route('pembayaran') }}">
                <i class="fa-regular fa-credit-card icon icon-sm px-0 text-center d-flex align-items-center justify-content-center" style="color: white;"></i>
                <span class="nav-link-text ms-1">Payment</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('produk/*') ? 'active' : ( request()->is('produk') ? 'active' : '') }}" href="{{ route('produk.index') }}">
                <i class="fa-solid fa-box-open icon-sm px-0 text-center d-flex align-items-center justify-content-center" style="color: white;"></i>
                <span class="nav-link-text ms-1">Products</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('supplier/*') ? 'active' : ( request()->is('supplier') ? 'active' : '') }}" href="{{ route('supplier.index') }}">
                <i class="fa-solid fa-user-gear icon icon-sm px-0 text-center d-flex align-items-center justify-content-center" style="color: white;"></i>
                <span class="nav-link-text ms-1">Supplier</span>
            </a>
        </li>
    </ul>
    </div>
</aside>
