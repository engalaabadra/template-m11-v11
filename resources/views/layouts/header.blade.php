<!doctype html >
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->

<!-- Mirrored from amentotech.com/htmls/doclist/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Sep 2023 20:20:12 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @yield('meta')
    <link rel="icon" href="{{url('/assets/images/logo/logo_black.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{url('/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('/assets/css/normalize.css')}}">
    <link rel="stylesheet" href="{{url('/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('/assets/css/fontawesome/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{url('/assets/css/linearicons.css')}}">
    <link rel="stylesheet" href="{{url('/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{url('/assets/css/fullcalendar.min.css')}}">
    <link rel="stylesheet" href="{{url('/assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{url('/assets/css/owl.carousel.'.getFileDir().'min.css')}}">
    <link rel="stylesheet" href="{{url('/assets/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{url('/assets/css/prettyPhoto.css')}}">
    <link rel="stylesheet" href="{{url('/assets/css/chosen.css')}}">
    <link rel="stylesheet" href="{{ url('/assets/css/main.'.getFileDir().'css') }}">

    <link rel="stylesheet" href="{{url('/assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{url('/assets/css/transitions.css')}}">
    <script src="{{url('/assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>
</head>
<body class="dc-home">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Preloader Start -->
<div class="preloader-outer">
    <div class="wt-preloader-holder">
        <div class="wt-loader"></div>
    </div>
</div>
<!-- Preloader End -->
<!-- Wrapper Start -->
<div id="dc-wrapper" class="dc-wrapper dc-haslayout">
    <!-- Header Start -->
    <header id="dc-header" class="dc-header dc-haslayout">
        <div class="dc-topbar">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div
                        class="col-12 col-sm-12 col-md-12 col-lg-12 + {{ session()->get('lang')=== 'ar' ? 'row flex-row-reverse' : '' }}">
                        <div class="dc-helpnum">
                            <span>@lang('custom.Emergency Help!')</span>
                            <a href="tel:123456789" style="color: #284A6E">+966552272756</a>
                        </div>
                        <div class="dc-rightarea mr-auto">
                            <ul class="dc-simplesocialicons dc-socialiconsborder">
                                <li class="dc-facebook"><a href="https://www.facebook.com/TemplateApp"><i
                                            class="fab fa-facebook-f"></i></a></li>
                                <li class="dc-twitter"><a href="https://twitter.com/Templateco"><i
                                            class="fab fa-twitter"></i></a></li>
                                <li class="dc-linkedin"><a
                                        href="https://www.linkedin.com/company/100702383/admin/feed/posts/?feedType=following&shareMsgArgs=null"><i
                                            class="fab fa-linkedin-in"></i></a></li>
                                <li class="dc-instagram"><a href="https://www.instagram.com/templateco/"><i
                                            class="fab fa-google-plus-g"></i></a></li>
                                <li class="dc-youtube"><a
                                        href="https://www.youtube.com/channel/UC9E9CQeyAkiWYjPqSG7FS_A"><i
                                            class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dc-navigationarea">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 header-two">
                        <strong class="dc-logo"><a href="{{route('home')}}"><img
                                    src="{{url('/assets/images/logo/logo_template.png')}}" style="width: 138px;"
                                    alt="company logo here"></a></strong>
                        <div class="dc-rightarea">
                            <nav id="dc-nav" class="dc-nav navbar-expand-lg">
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                        aria-label="Toggle navigation">
                                    <i class="lnr lnr-menu"></i>
                                </button>
                                <div class="collapse navbar-collapse dc-navigation" id="navbarNav">
                                    <ul class="navbar-nav">
                                        @if(getLang() === 'ar')
                                            <li>
                                                <a href="{{ route('contact') }}">@lang('custom.Contact Us')</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('about') }}">@lang('custom.About')</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('blogs') }}">@lang('custom.Articles')</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('doctors') }}">@lang('custom.Doctors')</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('home') }}">@lang('custom.Home')</a>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ route('home') }}">@lang('custom.Home')</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('doctors') }}">@lang('custom.Doctors')</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('blogs') }}">@lang('custom.Articles')</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('about') }}">@lang('custom.About')</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('contact') }}">@lang('custom.Contact Us')</a>
                                            </li>
                                        @endif


                                    </ul>

                                </div>
                            </nav>
                        </div>
                        <div class="dc-loginarea">
                            <a href="{{route('register-form')}}" class="dc-btn">@lang('custom.Join Now')</a>
                        </div>
                        <div class="menu-item-has-children page_item_has_children " style="width: 30px;line-height: 0.5;">
                                @if (app()->getLocale() == 'en')
                                        <a hreflang="ar" href="{{ route('lang.switch',['lang'=>'ar']) }}"
                                           class="navi-link">
                                            <span class="symbol symbol-20 mr-3">
                                                <img src="{{asset('dashboard_assets/media/svg/flags/008-saudi-arabia.svg')}}" class="responsive-circle-image" alt=""/>
                                            </span>
{{--                                            <span class="navi-text">{{__('admin/dashboard.arabic')}}</span>--}}
                                        </a>
                                @else
                                        <a hreflang="ar" href="{{ route('lang.switch',['lang'=>'en']) }}"
                                           class="navi-link">
                                            <span class="symbol symbol-20 mr-3">
                                                <img src="{{asset('dashboard_assets/media/svg/flags/226-united-states.svg')}}" class="responsive-circle-image"  alt=""/>
                                            </span>
{{--                                            <span class="navi-text">{{__('admin/dashboard.english')}}</span>--}}
                                        </a>
                                @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

