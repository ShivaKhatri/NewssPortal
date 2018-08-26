<header class="main-header">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                       aria-expanded="false">
                        @if(Auth::user())
                            <img class="nav-user-photo"
                                 src="{{ asset('assets/uploads/userProfile'.'/user.png') }} "
                                 alt="{{ucfirst(Auth::user()->name)}}"/>{{ Auth::user()->name }}
                        @endif
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                            {{--<li><a href="javascript:;"> Profile</a></li>--}}
                            {{--<li>--}}
                            {{--<a href="javascript:;">--}}
                            {{--<span>Settings</span></a>--}}
                            {{--<ul class="nav child_menu">--}}
                            {{--@if (AppHelper::isRouteAccessable('admin.import_file'))--}}
                            {{--<li><a href="{{route('admin.import_file', \Auth::user()->name)}}"> Import Files </a></li>--}}
                            {{--@endif--}}
                            {{--<li><a href="#">About Us</a></li>--}}
                            {{--</ul>--}}
                            {{--</li>--}}
                            <li>
                                <a href="{{route('password', \Auth::user()->id)}}">
                                    <span>Reset Password</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</header>