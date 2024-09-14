<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/certificates*') ? 'active' : '' }}" href="/dashboard/certificates">
                    Certificate
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/projects*') ? 'active' : '' }}" href="/dashboard/projects">
                    Project
                </a>
            </li>
        </ul>
    </div>
</nav>
