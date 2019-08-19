
<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav">

    <div class="breadcrumb-dn mr-auto ml-2">
        <a href="{{ route('home') }}">
            <img src="{{ url('images/').'/logo.png' }}" alt="" style="height: 40px;">
        </a>
    </div>

    <div class="d-flex change-mode">
        <!-- Navbar links -->
        <ul class="nav navbar-nav nav-flex-icons ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block">{{ auth()->user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a class="dropdown-item" href="{{ route('Profile.show', auth()->user()->id) }}">My account</a>
                </div>
            </li>

        </ul>
        <!-- Navbar links -->

    </div>

</nav>
<!-- Navbar -->
