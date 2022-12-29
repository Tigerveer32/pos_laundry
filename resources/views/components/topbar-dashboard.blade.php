<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if(!empty(Auth::user()->profile))
                    <img class="wd-30 ht-30 rounded-circle" src="{{ Storage::url(Auth::user()->profile) }}" alt="profile">
                    @else
                    <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="profile">
                    @endif
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                    <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                        <div class="mb-3">
                           @if(!empty(Auth::user()->profile))
                            <img class="wd-30 ht-30 rounded-circle" src="{{ Storage::url(Auth::user()->profile) }}" alt="profile">
                            @else
                            <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/80x80" alt="profile">
                            @endif
                        </div>
                        <div class="text-center">
                            <p class="tx-16 fw-bolder">{{ Auth::user()->nama_lengkap }}</p>
                            <p class="tx-12 text-muted">
                                @if(!empty(Auth::user()->role))
                                    @if( Auth::user()->role == 1 )
                                        <span class="bg bg-success rounded text-white p-1">Administrator</span>
                                    @elseif (Auth::user()->role == 2)    
                                        <span class="bg bg-warning rounded text-white p-1">Karyawan</span>
                                    @endif                             
                                @else
                                    <span class="bg bg-danger">-</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    <ul class="list-unstyled p-1">
                        <li class="dropdown-item py-2">
                            <a href="pages/general/profile.html" class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="user"></i>
                                <span>Profile</span>
                            </a>
                        </li>
                        <li class="dropdown-item py-2">
                            <a href="javascript:;" class="text-body ms-0" onclick="event.preventDefault(); document.getElementById('logout').submit();">
                                <i class="me-2 icon-md" data-feather="log-out"></i>
                                <span>Log Out</span>
                            </a>
                        </li>

                        <form action="{{ route('logout') }}" method="POST" enctype="multipart/form-data" id="logout">
                            @csrf
                            @method('POST')
                        </form>

                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>