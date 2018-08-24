<aside class="main-sidebar">
    <section class="sidebar">
        <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
                <a href="{{route('dashboard')}}" class="site_title">
                    Dashboard
                    {{--<img class="img-circle" width="40px"--}}
                         {{--height="40px" border-radius="50%"--}}
{{--                         src="{{ asset(config('impact.url.frontend.image').'users').'/'. Auth::user()->picture }} "--}}
{{--                         alt="{{ Auth::user()->name }}"/> &nbsp;{{ Auth::user()->name }}--}}
                </a>
            </div>
            <div class="clearfix"></div>
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                    <ul class="nav side-menu">
{{--                        @if (AppHelper::isRouteAccessable('admin.dashboard'))--}}
                            <li><a href="{{route('dashboard')}}"><i class="fa fa-home"></i> Home
                                    <span class="label label-success"></span></a>
                            </li>
                            <li><a href="{{route('categories.index')}}"><i class="fa fa-list"></i> Category
                                    <span class="label label-success"></span></a>
                            </li>
                            <li><a href="{{route('article.index')}}"><i class="fa fa-hacker-news"></i> Main Stories
                                    <span class="label label-success"></span></a>
                            </li>

                            <li><a href="{{route('BreakingNews.index')}}"><i class="fa fa-newspaper-o"></i> Breaking News
                                    <span class="label label-success"></span></a>
                            </li>
                        <li><a href="{{route('headings.index')}}"><i class="fa fa-header"></i> Sort Heading
                                <span class="label label-success"></span></a>
                        </li>
                            <li><a href="{{route('images.index')}}"><i class="fa fa-image"></i> Image Of The Month
                                    <span class="label label-success"></span></a>
                            </li>
                        <li><a href="{{route('videos.index')}}"><i class="fa fa-file-video-o"></i> Latest Video Release
                                <span class="label label-success"></span></a>
                        </li>
                            <li><a href="{{route('testimonials.index')}}"><i class="fa fa-user"></i> Voice Of People
                                    <span class="label label-success"></span></a>
                            </li>
                            <li><a href="{{route('literature.index')}}"><i class="fa fa-users"></i> Literature Review
                                    <span class="label label-success"></span></a>
                            </li>




                    </ul>
                </div>
            </div>
            <!-- /sidebar menu -->
            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
                <a data-toggle="tooltip" data-placement="top" title="Settings">
                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Lock">
                    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                </a>
                {{--<a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}"--}}
                   {{--onclick="event.preventDefault(); document.getElementById('logout-form').submit();">--}}
                    {{--<span class="glyphicon glyphicon-off" aria-hidden="true"></span>--}}
                {{--</a>--}}
            </div>
        </div>
    </section>
</aside>