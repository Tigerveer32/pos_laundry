<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('admin.dashboard.index') }}" class="sidebar-brand">
            POS<span>Laundry</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                <a href="/" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
             <li class="nav-item {{ request()->is('daftar_layanan') || request()->is('daftar_layanan/*') ? 'active' : '' }}">
                <a href="{{ route('daftar_layanan.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="list"></i>
                    <span class="link-title">Layanan</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('pesanan') || request()->is('pesanan/*') || request()->is('pesanan/add_pesanan/*') ? 'active' : '' }}">
                <a href="{{ route('pesanan.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="activity"></i>
                    <span class="link-title">Pesanan</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('pelanggan/*') ? 'active' : '' }}">
                <a href="{{ route('pelanggan.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Data Pelanggan</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
