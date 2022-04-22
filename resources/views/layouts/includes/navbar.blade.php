<nav class="navbar navbar-expand-lg navigation fixed-top sticky ">
    <div class="container">
        <a href="{{route('notes.index')}}">
            <p style="font-size: 25px; color:white ">Blue Arrow</p>
        </a>


        <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-bs-toggle="collapse"
                data-bs-target="#topnav-menu-content">
            <i class="fa fa-fw fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="topnav-menu-content">
            <ul class="navbar-nav ms-auto" id="topnav-menu">

                <li class="nav-item">
                    <a class="nav-link" href="{{route('index')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('notes.index')}}">Notes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('users.index')}}">Users</a>
                </li>
                @guest()
                    <div class="my-2 ms-lg-2 mt-3">
                        <a href="{{route('login')}}" class="btn btn-outline-success w-xs">Sign in</a>
                    </div>
                @endguest
                @auth()


                    <div class="dropdown d-inline-block" >
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="d-none d-xl-inline-block ms-1" key="t-henry" style="color: white">{{auth()->user()->name}}</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block" style="color: white"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <button class="dropdown-item text-danger"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                    class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span
                                    key="t-logout">Logout</span></button>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>


                @endauth
            </ul>
        </div>
    </div>
</nav>
