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
            <li class="nav-item">
                <a href="{{ route('admin.dashboard.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/layanan/*') ? 'active' : '' }}">
                <a href="{{ route('admin.layanan.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="list"></i>
                    <span class="link-title">Layanan</span>
                </a>
            </li>
            <li
                class="nav-item {{ request()->is('admin/pesanan') || request()->is('admin/pesanan/*') || request()->is('pesanan/add_pesanan/*') ? 'active' : '' }}">
                <a href="{{ route('admin.pesanan.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="activity"></i>
                    <span class="link-title">Pesanan</span>
                </a>
            </li>
            <li
                class="nav-item {{ request()->is('admin/laporan') || request()->is('admin/lapaoran/*') ? 'active' : '' }}">
                <a href="{{ route('admin.laporan.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="dollar-sign"></i>
                    <span class="link-title">Laporan Omset</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('admin/karyawan/*') || request()->is('admin/administrator/*') ? 'active' : '' }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false"
                    aria-controls="emails">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">User</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ request()->is('admin/karyawan/*') || request()->is('admin/administrator/*') ? 'show' : '' }}" id="emails">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.karyawan.index') }}" class="nav-link {{ request()->is('admin/karyawan/*') ? 'active' : '' }}">Karyawan</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.administrator.index') }}" class="nav-link {{ request()->is('admin/administrator/*') ? 'active' : '' }}">Administrator</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
