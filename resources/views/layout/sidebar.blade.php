<!-- User box -->
<div class="user-box text-center">
    <img src="assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle avatar-md">
    <div class="dropdown">
        <a href="javascript: void(0);" class="dropdown-toggle h5 mb-1 d-block" data-bs-toggle="dropdown">Geneva Kennedy</a>
        <div class="dropdown-menu user-pro-dropdown">

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
                <i class="fe-user me-1"></i>
                <span>My Account</span>
            </a>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
                <i class="fe-settings me-1"></i>
                <span>Settings</span>
            </a>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
                <i class="fe-lock me-1"></i>
                <span>Lock Screen</span>
            </a>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
                <i class="fe-log-out me-1"></i>
                <span>Logout</span>
            </a>

        </div>
    </div>
    <p class="text-muted mb-0">Admin Head</p>
</div>

<!--- Menu -->
<ul class="menu">

    <li class="menu-title">Dashboard</li>

    <li class="menu-item">
        <a href="{{ url('dashboard') }}" class="menu-link">
            <span class="menu-icon"><i data-feather="airplay"></i></span>
            <span class="menu-text"> Dashboards </span>
            <span class="badge bg-success rounded-pill ms-auto">4</span>
        </a>
        <div class="collapse" id="menuDashboards">
            <ul class="sub-menu">
                <li class="menu-item">
                    <a href="index.html" class="menu-link">
                        <span class="menu-text">Dashboard 1</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="dashboard-2.html" class="menu-link">
                        <span class="menu-text">Dashboard 2</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="dashboard-3.html" class="menu-link">
                        <span class="menu-text">Dashboard 3</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="dashboard-4.html" class="menu-link">
                        <span class="menu-text">Dashboard 4</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>

    <li class="menu-title">Feature</li>

    <li class="menu-item">
        <a href="{{ url('menu') }}" class="menu-link">
            <span class="menu-icon"><i data-feather="calendar"></i></span>
            <span class="menu-text"> Menu </span>
        </a>
    </li>

    <li class="menu-item">
        <a href="{{ url('pesanan') }}" class="menu-link">
            <span class="menu-icon"><i data-feather="message-square"></i></span>
            <span class="menu-text"> Pesanan </span>
        </a>
    </li>

    <li class="menu-item">
        <a href="{{ url('riwayat-pesanan') }}" class="menu-link">
            <span class="menu-icon"><i data-feather="database"></i></span>
            <span class="menu-text"> Riwayat Pesanan </span>
        </a>
    </li>
</ul>
<!--- End Menu -->
<div class="clearfix"></div>
