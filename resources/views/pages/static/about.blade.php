@extends('layouts.main')
@section('meta')
    <title> @lang('custom.About Template')</title>
	<meta name="title" content=" About Template">
	<meta name="description" content="Learn about the leading mental health application in the Kingdom of Saudi Arabia. Template
    It provides online psychotherapy sessions and psychological consultations aimed at promoting mental health and well-being. Find out how we provide support
    You need it to achieve optimal mental health.">

    <!-- Open Graph / Facebook -->
	<meta property="og:type" content="website">
	<meta property="og:url" content="https://metatags.io">
	<meta property="og:title" content=" About Template">
	<meta property="og:description" content="Learn about the leading mental health application in the Kingdom of Saudi Arabia. Template
    It provides online psychotherapy sessions and psychological consultations aimed at promoting mental health and well-being. Find out how we provide support
    You need it to achieve optimal mental health.">
    <meta property="og:image" content="https://metatags.io/images/meta-tags.png">

	<!-- twitter -->
	<meta property="twitter:card" content="summary_large_image">
	<meta property="twitter:url" content="https://metatags.io">
	<meta property="twitter:title" content=" About Template">
	<meta property="twitter:description" content="Learn about the leading mental health application in the Kingdom of Saudi Arabia. Template
    It provides online psychotherapy sessions and psychological consultations aimed at promoting mental health and well-being. Find out how we provide support
    You need it to achieve optimal mental health.">
    <meta property="twitter:image" content="https://metatags.io/images/meta-tags.png">
	<!-- Meta Tags Generated with https://metatags.io -->

@endsection

@section('main-container')

<!-- Main Start -->
<main id="dc-main" class="dc-main dc-haslayout">
    <!-- About Welcome Start -->
    <section class="dc-main-section dc-haslayout">
        <div class="container">
            <div class="row">
                <div class="dc-aboutstep">
                    <div class="col-xs-12 col-sm-12 col-md-10 push-md-1 col-lg-10 push-lg-1">
                        <div class="dc-sectionhead dc-sectionheadvtwo">
                            <div class="dc-sectiontitle">
                                <h2>@lang('custom.Make a Smart Choice')<span>@lang('custom.Take a Right Step For Your Life')</span></h2>
                            </div>
                        </div>
                    </div>
                    <div class="dc-welcome-holder">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 ">
                            <div class="dc-welcomecontent">
                                <figure class="dc-welcomeimg"><img src="{{url('/assets/images/welcome/img-01.jpg')}}" alt="@lang('custom.img description')"></figure>
                                <div class="dc-title">
                                    <h3><span>@lang('custom.Search Best Online')</span>@lang('custom.Professional')</h3>
                                </div>
                                <div class="dc-description">
                                    <p>@lang('custom.Template, your go-to mental health support app! Connecting experts with those in need in a secure, family-friendly environment. Lets nurture our mental health together!')</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 ">
                            <div class="dc-welcomecontent">
                                <figure class="dc-welcomeimg"><img src="{{url('/assets/images/welcome/img-02.jpg')}}" alt="@lang('custom.img description')"></figure>
                                <div class="dc-title">
                                    <h3><span>@lang('custom.Get Instant')</span>@lang('custom.Appointment')</h3>
                                </div>
                                <div class="dc-description">
                                    <p>@lang('custom.Template, your go-to mental health support app! Connecting experts with those in need in a secure, family-friendly environment. Lets nurture our mental health together!')</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 ">
                            <div class="dc-welcomecontent">
                                <figure class="dc-welcomeimg"><img src="{{url('/assets/images/welcome/img-03.jpg')}}" alt="@lang('custom.img description')"></figure>
                                <div class="dc-title">
                                    <h3><span>@lang('custom.Leave Your')</span>@lang('custom.Feedback')</h3>
                                </div>
                                <div class="dc-description">
                                    <p>@lang('custom.Template, your go-to mental health support app! Connecting experts with those in need in a secure, family-friendly environment. Lets nurture our mental health together!')</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Welcome End !-->
    <!-- Works Section Start -->
    <section class="dc-haslayout">
        <div class="dc-haslayout dc-bgcolor dc-main-section dc-workholder">
        </div>
        <div class="dc-haslayout dc-main-section dc-workdetails-holder">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="dc-workdetails">
                            <div class="dc-workdetail">
                                <figure>
                                    <img src="{{url('/assets/images/work-icon/img-01.png')}}" alt="@lang('custom.img description')">
                                </figure>
                            </div>
                            <div class="dc-title">
                                <span>@lang('custom.Search Best Online')</span>
                                <h3><a href="javascript:void(0);">@lang('custom.Professional')</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="dc-workdetails dc-workdetails-border">
                            <div class="dc-workdetail">
                                <figure>
                                    <img src="{{url('/assets/images/work-icon/img-02.png')}}" alt="@lang('custom.img description')">
                                </figure>
                            </div>
                            <div class="dc-title">
                                <span>@lang('custom.SGet Instant')</span>
                                <h3><a href="javascript:void(0);">@lang('custom.Appointment')</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="dc-workdetails dc-workdetails-bordertwo">
                            <div class="dc-workdetail">
                                <figure>
                                    <img src="{{url('/assets/images/work-icon/img-03.png')}}" alt="@lang('custom.img description')">
                                </figure>
                            </div>
                            <div class="dc-title">
                                <span>@lang('custom.Leave Your')</span>
                                <h3><a href="javascript:void(0);">@lang('custom.Feedback')</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.skills')

</main>
<!-- Main End -->

@endsection
