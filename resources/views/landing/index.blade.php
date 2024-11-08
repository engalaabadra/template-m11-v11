@extends('layouts.main')
@section('meta')
	<title>@lang('custom.Template App')</title>
	<meta name="title" content="Template App">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Get the mental health you need with the Template app. Psychotherapy sessions
	With the best psychiatry specialist in Saudi Arabia, available to you in the comfort of your home via the Internet. Start your psychological treatment today">
	<!-- Open Graph / Facebook -->
	<meta property="og:type" content="website">
	<meta property="og:url" content="https://metatags.io">
	<meta property="og:title" content="Template App">
	<meta property="og:description" content="Get the mental health you need with the Template app. Psychotherapy sessions
	With the best psychiatry specialist in Saudi Arabia, available to you in the comfort of your home via the Internet. Start your psychological treatment today">
	<meta property="og:image" content="https://metatags.io/images/meta-tags.png">

	<!-- twitter -->
	<meta property="twitter:card" content="summary_large_image">
	<meta property="twitter:url" content="https://metatags.io">
	<meta property="twitter:title" content="Template App">
	<meta property="twitter:description" content="Get the mental health you need with the Template app. Psychotherapy sessions
	With the best psychiatry specialist in Saudi Arabia, available to you in the comfort of your home via the Internet. Start your psychological treatment today">
	<meta property="twitter:image" content="https://metatags.io/images/meta-tags.png">
	<!-- Meta Tags Generated with https://metatags.io -->
	<meta name="keywords" content="dr.abelmajeed,dr.mohammed,social workers,psychologists,psychotherapy">
    <meta name="Author" content="Template">
    <meta name="copyright" content="© 2023 Template All rights reserved ">
@endsection

@section('main-container')

	<!-- Home Slider Start -->
	<div class="dc-homesliderholder dc-haslayout">
		<div id="dc-homeslider" class="dc-homeslider">
			<div id="dc-bannerslider" class="dc-bannerslider carousel slide" data-ride="false" data-interval="false">
			<ol class="carousel-indicators dc-bannerdots">
				<li data-target="#dc-bannerslider" data-slide-to="0" class="active"></li>
				<li data-target="#dc-bannerslider" data-slide-to="1"></li>
				<li data-target="#dc-bannerslider" data-slide-to="2"></li>
			</ol>
				<div class="carousel-inner">
					<div class="carousel-item active" id="carousel-item-1">
						<div class="d-flex justify-content-center dc-craousel-content">
							<div class="mx-auto">
								<img class="d-block dc-bannerimg" src="{{url('/assets/images/slider/board1.svg')}}" style="width: 281px;" alt="First slide">
								<div class="dc-bannercontent dc-bannercotent-craousel" >
									<div class="dc-content-carousel">
										<h1><em style="color: #284A6E">@lang('custom.Emergency?')</em> <span style="color: black;">@lang('custom.Find Nearest')</span><span style="color: #284A6E"> @lang('custom.Medical Facility')</span></h1>
										<div class="dc-btnarea">
											<a href="{{ route('blogs') }}" class="dc-btn dc-btnactive" style="background-color: #284A6E">@lang('custom.View Blogs')</a>
											<a href="{{ route('doctors') }}" class="dc-btn" style="color: #284A6E">@lang('custom.View Doctors')</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="carousel-item" id="carousel-item-2">
						<div class="d-flex justify-content-center dc-craousel-content">
							<div class="mx-auto">
								<img class="d-block dc-bannerimg" src="{{url('/assets/images/slider/board2.svg')}}" style="width: 281px;" alt="Second slide">
								<div class="dc-bannercontent dc-bannercotent-craousel" >
									<div class="dc-content-carousel">
										<h1><em style="color: #284A6E">@lang('custom.Emergency?')</em> <span style="color: black;">@lang('custom.Find Nearest')</span><span style="color: #284A6E"> @lang('custom.Medical Facility')</span></h1>
										<div class="dc-btnarea">
											<a href="{{ route('blogs') }}" class="dc-btn dc-btnactive">@lang('custom.View Blogs')</a>
											<a href="{{ route('doctors') }}" class="dc-btn">@lang('custom.View Doctors')</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="carousel-item" id="carousel-item-3">
						<div class="d-flex justify-content-center dc-craousel-content">
							<div class="mx-auto">
								<img class="d-block dc-bannerimg" src="{{url('/assets/images/slider/board3.svg')}}" style="width: 218px;" alt="Third slide">
								<div class="dc-bannercontent dc-bannercotent-craousel" >
									<div class="dc-content-carousel">
										<h1><em style="color: #284A6E">@lang('custom.Emergency?')</em> <span style="color: black;">@lang('custom.Find Nearest')</span><span style="color: #284A6E"> @lang('custom.Medical Facility')</span></h1>
										<div class="dc-btnarea">
											<a href="{{ route('blogs') }}" class="dc-btn dc-btnactive">@lang('custom.View Blogs')</a>
											<a href="{{ route('doctors') }}" class="dc-btn">@lang('custom.View Doctors')</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<a class="dc-carousel-control-prev" href="#dc-bannerslider" role="button" data-slide="prev">
						<span class="dc-carousel-control-prev-icon" aria-hidden="true"><span>@lang('custom.PR')</span></span>
						<span class="sr-only">@lang('custom.Previous')</span>
					</a>
					<a class="dc-carousel-control-next" href="#dc-bannerslider" role="button" data-slide="next">
						<span class="dc-carousel-control-next-icon " aria-hidden="true"><span>@lang('custom.NE')</span></span>
						<span class="sr-only">@lang('custom.Next')</span>
					</a>
				</div>
			</div>
		</div>
	</div>
	<!-- Home Slider End -->
		<!-- Main Start -->
		<main id="dc-main" class="dc-main dc-haslayout">
			<!-- Search Section Start -->
			<section class="dc-searchholder dc-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="dc-searchform-holder">
								<div class="dc-advancedsearch">
									<div class="dc-title">
										<h2>@lang('custom.Start Your Search')</h2>
									</div>
									<form class="dc-formtheme dc-form-advancedsearch" action="{{route('doctors')}}" method="get">
                                        @csrf
										<fieldset>
											<div class="form-group" style="width: 550px;">
												<input type="text" value="{{old('search')}}" name="search" class="form-control" placeholder="@lang('custom.Search doctors, clinics, hospitals, etc.')">
											</div>
											<div class="dc-formbtn">
                                                <button type="submit" class="btn-search"><i class="ti-arrow-right"></i></button>
											</div>
										</fieldset>
									</form>
								</div>
								<div class="dc-jointeamholder">
									<div class="dc-jointeam">
										<span class="dc-jointeamnoti"><i class="ti-light-bulb"></i></span>
										<figure class="dc-jointeamimg">
											<img src="{{url('/assets/images/slider/img-04.png')}}" alt="@lang('custom.img description')">
										</figure>
										<div class="dc-jointeamcontent">
											<h3><span>@lang('custom.Are You a Doctor?')</span>@lang('custom.Join Our Team')</h3>
											<a href="{{route('website-register')}}" class="dc-btn dc-btnactive">@lang('custom.Join as Doctor')</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="dc-haslayout">
					<div class="container-fluid">
						<div class="row">
							<div id="dc-doctorslider" class="dc-doctorslider owl-carousel">
								<div class="item dc-doctordetails-holder dc-titlecolor1">
									<span class="dc-slidercounter">@lang('custom.01')</span>
									<h3><span>@lang('custom.Live Chat With')</span> @lang('custom.Doctors')</h3>
									<a href="{{route('website-register')}}" class="dc-btn">@lang('admin/dashboard.register_now')</a>
								</div>
								<div class="item dc-doctordetails-holder dc-titlecolor2">
									<span class="dc-slidercounter">@lang('custom.02')</span>
									<h3><span>@lang('custom.Fast Appointment With')</span> @lang('custom.Best Doctors')</h3>
									<a href="{{ route('doctors') }}" class="dc-btn">@lang('custom.Show All Doctors')</a>
								</div>
								<div class="item dc-doctordetails-holder dc-titlecolor3">
									<span class="dc-slidercounter">@lang('custom.03')</span>
									<h3><span>@lang('custom.Articles From Top')</span> @lang('custom.Doctors')</h3>
									<a href="{{ route('blogs') }}" class="dc-btn">@lang('custom.View Blogs')</a>
								</div>
								<div class="item dc-doctordetails-holder dc-titlecolor4">
									<span class="dc-slidercounter">@lang('custom.04')</span>
									<h3><span>@lang('custom.Our 24/7 Active')</span> @lang('custom.Help Support')</h3>
									<a href="{{ route('contact') }}" class="dc-btn">@lang('admin/dashboard.contact_us')</a>
								</div>
								<div class="item dc-doctordetails-holder dc-titlecolor5">
									<span class="dc-slidercounter">@lang('custom.05')</span>
									<h3><span>@lang('custom.Help on The Go')</span> @lang('custom.Download App')</h3>
									<a href="#download-section" class="dc-btn">@lang('admin/dashboard.go_now')</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Search Section End -->
			<!-- Bring Care Start -->
			<section class="dc-haslayout dc-main-section dc-sectionbg">
				<div class="container">
					<div class="row">
						<div class="col-12 col-sm-12 col-md-12 col-lg-6 align-self-center">
							<div class="dc-bringcarecontent">
								<div class="dc-sectionhead dc-sectionheadvtwo">
									<div class="dc-sectiontitle">
										<h2>@lang('custom.Bring Care to Your')<span>@lang('custom.Home With One Click')</span></h2>
									</div>
									<div class="dc-description">
										<p>
											@lang('custom.Navigate your mental wellness with Template, your personalized consultation app.')
										</p>
									</div>
								</div>
								<div class="dc-btnarea">
									<a href="{{ route('about') }}" class="dc-btn" style="color: #284A6E">@lang('custom.About Us')</a>
									<a href="{{ route('contact') }}" class="dc-btn dc-btnactive" style="color: #284A6E">@lang('custom.Contact')</a>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-12 col-md-12 col-lg-6">
							<div class="dc-bringimg-holder">
								<figure class="dc-doccareimg">
									<img src="{{url('/assets/images/doc-imgs/board1.svg')}}" style="width: 252px;" alt="@lang('custom.img description')">
									<figcaption>
										<div class="dc-doccarecontent">
											<h3><em>@lang('custom.Greetings') &amp; @lang('custom.Welcome') </em>د.عبدالمجيد الخميس</h3>
										</div>
									</figcaption>
								</figure>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Bring Care End -->
			<!-- Works Section Start -->
			<section class="dc-haslayout">
				<div class="dc-haslayout dc-bgcolor dc-main-section dc-workholder">
					<div class="container">
						<div class="row justify-content-center align-self-center">
							<div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-8 push-lg-2">
								<div class="dc-sectionhead dc-text-center">
									<div class="dc-sectiontitle">
										<h2><span>@lang('custom.We Made It Simple')</span>@lang('custom.How It') <em>@lang('custom.Works?')</em></h2>
									</div>
									<div class="dc-description">
										<p>
											@lang('custom.Template, your go-to mental health support app! Connecting experts with those in need in a secure, family-friendly environment. Lets nurture our mental health together!')
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="dc-haslayout dc-main-section dc-workdetails-holder">
					<div class="container">
						<div class="row">
							<div class="col-12 col-sm-6 col-md-4 col-lg-4">
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
							<div class="col-12 col-sm-6 col-md-4 col-lg-4">
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
							<div class="col-12 col-sm-6 col-md-4 col-lg-4">
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
			<!-- Works Section End -->
			<!-- Our Rated Start -->
			<section class="dc-haslayout dc-main-section">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-3">
							<div class="row">
								<div class="dc-ratedecontent dc-bgcolor">
									<figure class="dc-neurosurgeons-img">
										<img src="{{url('/assets/images/doc-imgs/img-02.png')}}" alt="@lang('custom.img description')">
									</figure>
									<div class="dc-sectionhead dc-sectionheadvtwo dc-text-center">
										<div class="dc-sectiontitle">
											<h2>@lang('custom.Our Top Rated')<span>@lang('custom.psychological')</span></h2>
										</div>
										<div class="dc-description">
											<p>@lang('custom.Template, your go-to mental health support app! Connecting experts with those in need in a secure, family-friendly environment. Lets nurture our mental health together!.')</p>
										</div>
									</div>
									<div class="dc-btnarea">
										<a href="{{ route('doctors') }}" class="dc-btn" style="color: #284A6E">@lang('custom.View All')</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">
							<div class="row">
								<div id="dc-docpostslider" class="dc-docpostslider owl-carousel">
									@foreach($doctors as $doctor)
										@if($doctor->full_name)
											<div class="item" >
												<div class="dc-docpostholder">
													<figure class="dc-docpostimg">
														@if($doctor->file)
															<img src="{{url('/'.$doctor->file->url)}}" alt="@lang('custom.img description')" style="height: 200px">
														@else
															<img src="{{url('/assets/images/logo/logo_footer.png')}}" style="height: 200px" alt="@lang('custom.img description')">
														@endif
														<figcaption>
															<span class="dc-featuredtag"><i class="fa fa-bolt"></i></span>
														</figcaption>
													</figure>
													<div class="dc-docpostcontent">
														<div class="dc-title">
															@foreach($doctor->specialties as $specialty)
																<a href="javascript:void(0)" class="dc-docstatus">{{$specialty->name}}</a>
															@endforeach
															<h3><a href="{{ route('single-doctor',['id'=>$doctor->id]) }}">{{$doctor->full_name}}</a> <i class="fa fa-award dc-awardtooltip"><em>Medical Registration Verified</em></i> <i class="fa fa-check-circle dc-awardtooltip"><em>Medical Registration Verified</em></i></h3>
															<ul class="dc-docinfo">
																<li>
																	@php
																		if($doctor->profile){
																			if ($doctor->profile->bio && strlen($doctor->profile->bio) > $maxLengthBio) {
																				$doctor->profile->bio = substr($doctor->profile->bio, 0, $maxLengthBio) . '...';
																			} else {
																				$doctor->profile->bio;
																			}
																		}
																	@endphp
																	<em>{{$doctor->profile ? $doctor->profile->bio : null}}</em>
																</li>
																<li>
																	<span class="dc-stars"><span></span></span>
																</li>
															</ul>
														</div>
														<div class="dc-doclocation">
															<span> {{$doctor->country ? $doctor->country->name : null}}  <i class="ti-direction-alt"></i></span>

															<a href="{{ route('single-doctor',['id'=>$doctor->id]) }}" class="dc-btn" style="color: #284A6E">View</a>
														</div>
													</div>
												</div>
											</div>
										@endif
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Our Rated End -->
			<!-- Mobile App Start -->
			<section class="dc-haslayout dc-bgcolor" id="download-section">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
							<div class="dc-appbgimg">
								<figure>
									<img src="{{url('/assets/images/app-imgs/img-01.png')}}" alt="@lang('custom.img description')">
								</figure>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 justify-content-center align-self-center">
							<div class="dc-appcontent">
								<div class="dc-sectionhead dc-sectionheadvtwo">
									<div class="dc-sectiontitle">
										<h2>@lang('custom.Care on the GO')<span>@lang('custom.Download Mobile App')</span></h2>
									</div>
									<div class="dc-description">
										<p>@lang('custom.Template, your go-to mental health support app! Connecting experts with those in need in a secure, family-friendly environment. Lets nurture our mental health together!.')</p>
									</div>
								</div>
								<ul class="dc-appicons">

									<li><a href="https://play.google.com/store/apps/details?id=com.template.template" target="_blank"><img src="{{url('/assets/images/app-imgs/img-03.png')}}" alt="@lang('custom.img description')"></a></li>
									<li><a href="https://apps.apple.com/app/template-app/id6464413895" target="_blank"><img src="{{url('/assets/images/app-imgs/img-02.png')}}" alt="@lang('custom.img description')"></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Mobile App End -->
			<!-- Latest Articles Start -->
			<section class="dc-haslayout dc-main-section">
				<div class="container">
					<div class="row justify-content-center align-self-center">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 push-lg-2">
							<div class="dc-sectionhead dc-text-center">
								<div class="dc-sectiontitle">
									<h2><span>@lang('custom.Read Professional Articles')</span>@lang('custom.Latest') <em>@lang('custom.Articles')</em></h2>
								</div>
								<div class="dc-description">
									<p>@lang('custom.Template, your go-to mental health support app! Connecting experts with those in need in a secure, family-friendly environment. Lets nurture our mental health together!.')</p>
								</div>
							</div>
						</div>
						<div class="dc-articlesholder">
							@foreach($latestArticles as $article)
								<div class="col-12 col-sm-12 col-md-6 col-lg-4 float-left">
									<div class="dc-article">
										<figure class="dc-articleimg">
											@if($article->file)
											<img src="{{url('/'.$article->file->url)}}" style="height: 200px" alt="@lang('custom.img description')">
											@else
											<img src="{{url('/assets/images/logo/logo_footer.png')}}" style="height: 200px" alt="@lang('custom.img description')">
											@endif
										</figure>
										<div class="dc-articlecontent">
											<div class="dc-title">
												<a href="{{ route('single-blog',['id'=>$article->id]) }}" class="dc-articleby">{{$article->title}}</a>
												@php
													if (strlen($article->description) > $maxLengthArticle) {
														$article->description = substr($article->description, 0, $maxLengthArticle) ;
													} else {
														$article->description;
													}
												@endphp
												<h3><a href="{{ route('single-blog',['id'=>$article->id]) }}">{{$article->description}}</a></h3>
												<span class="dc-datetime"> {{$article->created_at}} <i class="ti-calendar"></i></span>
											</div>
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</section>
			<!-- Latest Articles End -->
			<!--Skills Start-->
			<section class="dc-haslayaout dc-footeraboutus dc-bgcolor">
				<div class="container">
					<div class="row">
						<div class="col-12 col-sm-6 col-md-3 col-lg-3">
							<div class="dc-widgetskills">
								<div class="dc-fwidgettitle">
									<h3>@lang('custom.By Speciality')</h3>
								</div>
								<ul class="dc-fwidgetcontent">
									<li><a href="javascript:void(0);">@lang('custom.Allergy Specialist')</a></li>
									<li><a href="javascript:void(0);">@lang('custom.Andrologist')</a></li>
									<li><a href="javascript:void(0);">@lang('custom.Anesthetist')</a></li>
									<li><a href="javascript:void(0);">@lang('custom.Audiologist')</a></li>
									<li><a href="javascript:void(0);">@lang('custom.Dietitian/Nutritionist')</a></li>
									<li class="dc-viewmore"><a href="javascript:void(0);" style="color: #284A6E">@lang('custom.View All')</a></li>
								</ul>
							</div>
						</div>
						<div class="col-12 col-sm-6 col-md-3 col-lg-3">
							<div class="dc-widgetskill">
								<div class="dc-fwidgettitle">
									<h3>@lang('custom.Doctors In US')</h3>
								</div>
								<ul class="dc-fwidgetcontent">
									<li><a href="javascript:void(0);">@lang('custom.Laproscopic Surgeon')</a></li>
									<li><a href="javascript:void(0);">@lang('custom.Oral And Maxillofacial Surgeon')</a></li>
									<li><a href="javascript:void(0);">@lang('custom.Orthopedic Surgeon')</a></li>
									<li><a href="javascript:void(0);">@lang('custom.Pediatric Cardiac Surgeon')</a></li>
									<li><a href="javascript:void(0);">@lang('custom.Pediatric Orthopedic Surgeon')</a></li>
									<li class="dc-viewmore"><a href="javascript:void(0);" style="color: #284A6E">@lang('custom.View All')</a></li>
								</ul>
							</div>
						</div>
						<div class="col-12 col-sm-6 col-md-3 col-lg-3">
							<div class="dc-footercol dc-widgetcategories">
								<div class="dc-fwidgettitle">
									<h3>@lang('custom.By Categories')</h3>
								</div>
								<ul class="dc-fwidgetcontent">
									<li><a href="javascript:void(0);">@lang('custom.Cosmetic Surgeon')</a></li>
									<li><a href="javascript:void(0);">@lang('custom.Eye Specialist')</a></li>
									<li><a href="javascript:void(0);">@lang('custom.Gastroenterologist')</a></li>
									<li><a href="javascript:void(0);">@lang('custom.General Physician')</a></li>
									<li><a href="javascript:void(0);">@lang('custom.General Practitioner')</a></li>
									<li class="dc-viewmore"><a href="javascript:void(0);" style="color: #284A6E">@lang('custom.View All')</a></li>
								</ul>
							</div>
						</div>
						<div class="col-12 col-sm-6 col-md-3 col-lg-3">
							<div class="dc-widgetbylocation">
								<div class="dc-fwidgettitle">
									<h3>@lang('custom.By Location')</h3>
								</div>
								<ul class="dc-fwidgetcontent">
									<li><a href="javascript:void(0);">@lang('custom.Switzerland')</a></li>
									<li><a href="javascript:void(0);">@lang('custom.Canada')</a></li>
									<li><a href="javascript:void(0);">@lang('custom.Germany')</a></li>
									<li><a href="javascript:void(0);">@lang('custom.United Kingdom')</a></li>
									<li><a href="javascript:void(0);">@lang('custom.Japan')</a></li>
									<li class="dc-viewmore"style="color: #284A6E"><a href="javascript:void(0);" >@lang('custom.View All')</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--Skills Start End-->
		</main>
		<!-- Main End -->

@endsection
