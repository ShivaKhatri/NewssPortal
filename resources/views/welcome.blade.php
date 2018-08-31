<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Times Press</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" media="screen" href={{asset('assets/css/superfish.css')}} type="text/css"/>
    <link rel="stylesheet" media="screen" href={{asset('assets/css/stylesheet.css')}} type="text/css"/>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Serif:regular,italic,bold,bolditalic"
          type="text/css"/>
    <link rel="stylesheet" media="screen" href={{asset('assets/nivo-slider/nivo-slider.css')}} type="text/css"/>
    <script type="text/javascript" src={{asset('assets/js/jquery-1.6.1.min.js')}}></script>
    <script src={{asset('assets/js/hoverIntent.js')}} type="text/javascript"></script>
    <script src={{asset('assets/js/superfish.js')}} type="text/javascript"></script>
    <script type="text/javascript" src={{asset('assets/js/jquery-ui.min.js')}}></script>
    <script type="text/javascript" src={{asset('assets/js/custom.js')}}></script>
    <script type="text/javascript" src={{asset('assets/js/jquery.animate-shadow.js')}}></script>
    <script type='text/javascript' src={{asset('assets/js/jquery.cycle.all.min.js')}}></script>
    <script type='text/javascript' src={{asset('assets/nivo-slider/jquery.nivo.slider.pack.js')}}></script>
    <script type="text/javascript">
        //<![CDATA[
        $(window).load(function () {
            $('#slider').nivoSlider({
                effect: 'slideInLeft', // Specify sets like: 'fold,fade,sliceDown'
                slices: 10,
                boxCols: 10, // For box animations
                boxRows: 5, // For box animations
                animSpeed: 1000, // Slide transition speed
                pauseTime: 4500, // How long each slide will show
                startSlide: 0, // Set starting Slide (0 index)
                directionNav: true, // Next & Prev navigation
                directionNavHide: true, // Only show on hover
                controlNav: true, // 1,2,3... navigation
                controlNavThumbs: true, // Use thumbnails for Control Nav
                controlNavThumbsFromRel: true, // Use image rel for thumbs
                pauseOnHover: true, // Stop animation while hovering
            });
        });
        //]]>
    </script>
    <script type="text/javascript">
        //featured slider
        jQuery('#featured_slider').cycle({
            fx: 'scrollHorz',
            speed: 800,
            timeout: 0,
            easing: 'easeInOutQuint',
            next: '#featured_slider_next',
            prev: '#featured_slider_prev'
        });
    </script>
</head>
<body>
<div id="panel" style="display: none;">
    <p># You can add any kind of announcement or updates happening on your website</p>
</div>
<a id="notification" class="btn-slide" href="#">&darr;</a>
<div id="container_wrapper">
    <div id="header">
        <div id="header-top">
            <h2 id="logo"><a href="#"></a></h2>
            <div class="nav-container">
                <ul id="menu">
                    <li><a href={{route('login')}}>Login</a></li>
                    <li><a href="post-page.html">Post Page</a></li>
                    <li class="sub"><a href="#">Dropdowns</a>
                        <ul>
                            <li class="sub"><a href="#">Item one</a></li>
                            <li class="sub"><a href="#">Item two</a></li>
                            <li class="sub"><a href="#">Item three</a></li>
                        </ul>
                    </li>
                    <li><a href="full-width.html">Fullwidth</a></li>
                    <li><a href="archives.html">Archives</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
            <form method="get" id="searchform" action="#" name="searchform">
                <input type="text" class='rounded text_input' value="" name="s" id="s"/>
                <input type="submit" class="button ie6fix" id="searchsubmit" value="&rarr;"/>
            </form>
        </div>
        <div id="header-bottom">
            <div class="category-container">
                <ul class="sf-menu">
                    @php  $i=0 @endphp
                    @foreach($category as $get)
                        @if($i<=4)
                    <li><a href="{{route('categories.show',$get->id)}}">{{$get->name}}</a></li>
                        @elseif($i==5)
                    <li><a href="#">More</a>
                        <ul>
                            <li><a href="{{route('categories.show',$get->id)}}">{{$get->name}}</a></li>
                            @elseif($i>5)
                            <li><a href="{{route('categories.show',$get->id)}}">{{$get->name}}</a></li>
                        @endif
                            @php  $i++ @endphp

                    @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="subscriber_widget"><span class="twitter_count"><a href="#">2552 followers</a></span> <span
                        class="feed"><a href="#">1453 Subscribers</a></span> <span class="email"><a href="#">Subscribe via email</a></span>
            </div>
        </div>
    </div>
    <div id="outer-wrapper">
        <div id="slider-wrapper">
            <div id="slider" class="nivoSlider" style="height:350px;">
                @foreach($image as $get)
                    <a href="#"><img src="{{asset('assets/uploads/image/'.$get->image)}}" alt="" rel="{{asset('assets/uploads/image/'.$get->image)}}" /></a>
                   @endforeach </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div id="featured">
            <h4 id="featured-title"><span>Breaking News</span></h4>
            <div id="featured_slider" style="position:relative; overflow:hidden;">
                @php $j=0; $calc=5@endphp
                @foreach($breakingNews as $get)

                    @if($j==0 || $j==$calc)
                        @if($j==$calc)
                                </div>
                            @php $calc=$calc*2; @endphp
                        @endif
                        <div class="item">
                    @endif
                    <div class="column ">
                        <div class="inner">
                            <div class="image"><a href="#"><img alt="" src="{{asset('assets/uploads/breakingNews/'.$get->image)}}"/></a></div>
                            <h3><a href="#">{{$get->title}}</a></h3>
                        </div>
                    </div>
                    @php $j++;@endphp

                    @endforeach
                    <div class="clear"></div>
                </div>
            </div>
            <div class="nav_controls">
                <div id="featured_slider_prev"><a href="#">‹‹ Previous</a></div>
                <div id="featured_slider_next"><a href="#">Next ››</a></div>
            </div>
            <div class="clear"></div>
        </div>
        <div id="content-wrapper">
            <div id="inner-content">
                <div id="category_sort" class="clearfix">
                    <div class="column">
                        <h4><span>Technology</span></h4>
                        <ul>
                            <li><a href="#">Scientists use inkjet printing to produce solar cells</a></li>
                            <li><a href="#">iPhone 5 delay, Android fears drag Apple stock</a></li>
                            <li><a href="#">Panasonic unveils stereo headset</a></li>
                            <li><a href="#">Google Chrome OS has security holes</a></li>
                            <li><a href="#">Nokia shuts down online stores</a></li>
                        </ul>
                    </div>
                    <div class="column">
                        <h4><span>Hot on Web</span></h4>
                        <ul>
                            <li><a href="#">Google Launches Its Google+ Social Networking Service</a></li>
                            <li><a href="#">World of Warcraft offered 'free'</a></li>
                            <li><a href="#">Skype rolls out free app for Android phones</a></li>
                            <li><a href="#">PayPal Predicts The End of the Wallet By 2015</a></li>
                            <li><a href="#">Apple iPad now has over 100,000 apps</a></li>
                        </ul>
                    </div>
                    <div class="column">
                        <h4><span>Entertainment</span></h4>
                        <ul>
                            <li><a href="#">Spacey's Richard III wows critics</a></li>
                            <li><a href="#">Maria Sharapova returns to Wimbledon final</a></li>
                            <li><a href="#">Beyonce's debut brings curtain down on Glastonbury</a></li>
                            <li><a href="#">Mike Tyson in Big Brother?</a></li>
                            <li><a href="#">Justin Timberlake to promote MySpace</a></li>
                        </ul>
                    </div>
                </div>
                <div id="double_container">
                    <h4 class="cont-title"><span>Some more posts</span></h4>
                    @foreach($article as $get)
                    <div class="post_double">
                        <h4 class="post_title"><a href="#">{{$get->title}}</a></h4>
                        <div class="post_content clearfix">
                            <div class="thumbnail"><a href="#"><img src={{asset('assets/uploads/post/'.$get->image)}} alt=""/></a></div>
                            <div class="summary_article">

                                {!! Str::words( $get->article, 21,'....') !!}
                            </div>
                        </div>
                        <span class="read_more"><a href="{{route('article.show',$get->id)}}">More</a></span></div>
                    @endforeach
                    <div class="clear"></div>
                </div>
                <div id="single_post_container">
                    <div class="post_single">
                        <h4 class="post_title clearfix"><a href="#">Dropbox Bug Made Accounts Accessible Without
                                Passwords</a><span class="comment_bubble"><a href="#">4</a></span></h4>
                        <div class="post_content clearfix">
                            <div class="thumbnail"><a href="#"><img src="post-images/dropbox150x150.jpg" alt=""/></a>
                            </div>
                            <div class="summary_article">
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                    dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                    nascetur ridiculus mus. </p>
                                <p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat
                                    massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.
                                    In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis
                                    ...</p>
                            </div>
                        </div>
                        <span class="read_more"><a href="#">More...</a></span></div>
                    <div class="post_single">
                        <h4 class="post_title"><a href="#">Baidu and Microsoft tie-up for English search in
                                China</a><span class="comment_bubble"><a href="#">10</a></span></h4>
                        <div class="post_content clearfix">
                            <div class="thumbnail"><a href="#"><img src="post-images/baidu150x150.jpg" alt=""/></a>
                            </div>
                            <div class="summary_article">
                                <p>Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por
                                    scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe
                                    solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe
                                    al desirabilite de un nov lingua franca: On refusa continuar payar custosi
                                    traductores. </p>
                                <p>At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun
                                    paroles. Ma quande lingues coalesce, li grammatica del resultant lingue es plu
                                    simplic e regulari quam ti del coalescent lingues. Li nov lingua francaande lingues
                                    ...</p>
                            </div>
                        </div>
                        <span class="read_more"><a href="#">More...</a></span></div>
                    <div class="clear"></div>
                    <div class="pagenavi clearfix"><span class="pages">Page 1 of 18</span><span class="current">1</span>
                        <a class="page_number" href="#">2</a> <a class="page_number" href="#">3</a> <a
                                class="page_number" href="#">4</a> <a class="page_number" href="#">5</a> <a
                                class="page_number" href="#">6</a> <a class="page_number" href="#">7</a> <a
                                class="page_number" href="#">8</a> <a class="nextpostslink" href="#">››</a> <span
                                class="extend">...</span> <a class="last" href="#">Last »</a></div>
                </div>
            </div>
            <div id="sidebar">
                <div class="widget_nostyle">
                    <ul class="sponsors">

                        @foreach($ads as $get)
                            <li><a href="{{$get->title}}"><img src="{{asset('assets/uploads/ads/'.$get->image)}}" alt=""/></a></li>

                        @endforeach
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="widget">
                    <div id="tabs">
                        <ul id="tab-items">
                            <li><a href="#tab-one">Literature Review</a></li>
                            <li><a href="#tab-two">Voice of People</a></li>
                        </ul>
                        <div class="tabs-inner">
                            <div id="tab-one" class="tab">
                                <ul>
                                    @foreach($articleReview as $get)
                                    <li>
                                        <div class="tab-thumb"><a class="thumb" href="#"><img width="45" height="45"
                                                                                              alt=""
                                                                                              src="{{asset('assets/uploads/testimonial/'.$get->image)}}"/></a>
                                        </div>
                                        <h3 class="entry-title"><a class="title" href="#">{!! $get->title !!}</a></h3>
                                        <h4 class="entry-title"><a class="title" href="#">{!! $get->message !!}</a></h4>
                                        <div class="entry-meta entry-header"><span class="published">{{$get->date}}</span>
                                        </div>
                                    </li>
                                        @endforeach
                                </ul>
                            </div>
                            <div class="tab tab-recent" id="tab-two">
                                <ul>
                                    @foreach($literatureReview as $get)
                                        <li>
                                            <div class="tab-thumb"><a class="thumb" href="#"><img width="45" height="45"
                                                                                                  alt=""
                                                                                                  src="{{asset('assets/uploads/literature/'.$get->image)}}"/></a>
                                            </div>
                                            <h3 class="entry-title"><a class="title" href="#">{!! $get->title !!}</a></h3>
                                            <h4 class="entry-title"><a class="title" href="#">{!! $get->message !!}</a></h4>
                                            <div class="entry-meta entry-header"><span class="published">{{$get->date}}</span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="widget">
                    <h2 class="title clearfix"><span>Sort Headings</span></h2>
                    <div class="widget-content">
                        <ul id="twitter_widget">
                            @foreach($sortHeading as $get)
                            <li>
                                <h3>{{$get->title}}</h3>
                                <p>{!! $get->description !!}
                                    <small>{{$get->date}}</small>
                                </p>
                            </li>
                                @endforeach
                        </ul>
                    </div>
                    <div class="follow"><a href="#">Follow On Twitter....</a></div>
                </div>
                <div class="widget">
                    <h2 class="title clearfix"><span>Video widget</span></h2>
                    <div class="widget-content">
                        <iframe src="http://player.vimeo.com/video/17535548?title=0&amp;byline=0&amp;portrait=0"
                                width="252" height="142" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div id="footer"><span id="Scroll"><a href="#">&uarr;</a></span>
        <div id="footer_inner">
            <div class="columns">
                <div class="widget">
                    <h6>About Us</h6>
                    <p>Lorem ipsum dolor sit consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean
                        massa.</p>
                    <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla
                        consequat massa quis enim.</p>
                    <p>Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                </div>
                <div class="clear"></div>
            </div>
            <div class="columns">
                <div class="widget">
                    <h6>My Flickr</h6>
                    <div class="flickr">
                        <div><a href="#"><img alt="" src="flickr/blaclbeard.jpg"/></a></div>
                        <div><a href="#"><img alt="" src="flickr/robo.jpg"/></a></div>
                        <div><a href="#"><img alt="" src="flickr/greenlantern.jpg"/></a></div>
                        <div class="last"><a href="#"><img alt="" src="flickr/grey_matter_2.jpg"/></a></div>
                        <div><a href="#"><img alt="" src="flickr/grey_matter_1.jpg"/></a></div>
                        <div><a href="#"><img alt="" src="flickr/will_be_back.jpg"/></a></div>
                        <div><a href="#"><img alt="" src="flickr/shot.jpg"/></a></div>
                        <div class="last"><a href="#"><img alt="" src="flickr/vector.jpg"/></a></div>
                        <div><a href="#"><img alt="" src="flickr/ribbon.jpg"/></a></div>
                        <div><a href="#"><img alt="" src="flickr/workin.jpg"/></a></div>
                        <div><a href="#"><img alt="" src="flickr/mj.jpg"/></a></div>
                        <div class="last"><a href="#"><img alt="" src="flickr/blaclbeard.jpg"/></a></div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="columns">
                <div class="widget">
                    <h6>Recent Posts</h6>
                    <ul class="recent_posts">
                        <li class="clearfix">
                            <h3 class="title"><a href="#">Samsung seeks ban on sale of key Apple products in US</a></h3>
                        </li>
                        <li class="clearfix">
                            <h3 class="title"><a href="#">Big fast-food chains lag rivals in taste</a></h3>
                        </li>
                        <li class="clearfix">
                            <h3 class="title"><a href="#">Toyota recalls 110,000 hybrid cars on safety concerns</a></h3>
                        </li>
                        <li class="clearfix">
                            <h3 class="title"><a href="#">Sony hacker now on Facebook payroll</a></h3>
                        </li>
                        <li class="clearfix">
                            <h3 class="title"><a href="#">Sarkozy involved in scuffle during handshake tour</a></h3>
                        </li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
            <div class="columns" style="width:15% !important;">
                <div class="widget">
                    <h6>Quick links</h6>
                    <ul class="quick_links">
                        <li><a href="#">World news</a></li>
                        <li><a href="#">Science</a></li>
                        <li><a href="#">Entertainment</a></li>
                        <li><a href="#">Technology</a></li>
                        <li><a href="#">Helth</a></li>
                        <li><a href="#">Business</a></li>
                        <li><a href="#">Sports</a></li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <div class="footer_bottom">
                <ul class="footer_menu">
                    <li><a href="#">Home</a> /</li>
                    <li><a href="#">About</a> /</li>
                    <li><a href="#">Contact</a> /</li>
                    <li><a href="#">Licensing</a></li>
                </ul>
                <p>&copy; Copyright 2011. All rights reserved. Template by <a target="_blank"
                                                                              href="http://www.bloggerzbible.com">Jdsans</a>
                </p>
            </div>
        </div>
    </div>
</div>
</body>

</html>
