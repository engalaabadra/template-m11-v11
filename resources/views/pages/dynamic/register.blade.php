@extends('layouts.main')
@section('meta')
    <title> @lang('admin/dashboard.register_now')</title>
	<meta name="title" content="Template Blog ">
	<meta name="description" content="Explore Template's blog for the latest articles and information on safety and health
    Mental . Learn advice from professional psychologists and mental health counselors.">

    <!-- Open Graph / Facebook -->
	<meta property="og:type" content="website">
	<meta property="og:url" content="https://metatags.io">
	<meta property="og:title" content="Template Blog ">
	<meta property="og:description" content="Explore Template's blog for the latest articles and information on safety and health
    Mental . Learn advice from professional psychologists and mental health counselors.">
    <meta property="og:image" content="https://metatags.io/images/meta-tags.png">

	<!-- twitter -->
	<meta property="twitter:card" content="summary_large_image">
	<meta property="twitter:url" content="https://metatags.io">
	<meta property="twitter:title" content="Template Blog ">
	<meta property="twitter:description" content="Explore Template's blog for the latest articles and information on safety and health
    Mental . Learn advice from professional psychologists and mental health counselors.">
    <meta property="twitter:image" content="https://metatags.io/images/meta-tags.png">
	<!-- Meta Tags Generated with https://metatags.io -->


@endsection

@section('main-container')


<!-- Main Start -->
<main id="dc-main" class="dc-main dc-haslayout dc-innerbgcolor">
    <!--Register Form Start-->
    <div class="dc-haslayout dc-main-section">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 push-lg-2">
                    <div class="dc-registerformhold">
                        <div class="dc-registerformmain">
                            <div class="dc-registerhead">
                                <div class="dc-title">
                                    <h3> مرحبا بك نحن سعداء لأنضمامك إلينا</h3>
                                    <h5> برجاء إدخال البيانات التاليه</h5>
                                </div>
                            </div>
                            <div class="dc-joinforms">
                                <form class="dc-formtheme dc-formregister" action="{{route('website-register')}}" method="post">
                                    @csrf
                                    <fieldset class="dc-registerformgroup">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="form-group">
                                                    <input type="text" name="phone_no" value="{{old('phone_no')}}"
                                                           class="form-control {{ $errors->has('phone_no') ? 'is-invalid' : '' }}"
                                                           placeholder="@lang('admin/dashboard.enter') @lang('admin/dashboard.phone') "
                                                           aria-describedby="basic-addon1"
                                                    />
                                                    <div class="text-danger">
                                                        <strong>{{ $errors->has('phone_no') ? $errors->first('phone_no') : '' }}</strong>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <div class="dc-select">
                                                        <select class="chosen-select locations" data-placeholder="Country" name="country_id">
                                                            @foreach($countries as $country)
                                                                <option value="{{$country->id}}" {{$country->id === 187 ? 'selected' : ''}}>{{$country->name}}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-8">
                                                <div class="form-group">
                                                    <input type="text" name="full_name" value="{{old('full_name')}}"
                                                           class="form-control {{ $errors->has('full_name') ? 'is-invalid' : '' }}"
                                                           placeholder="@lang('admin/dashboard.enter') @lang('admin/dashboard.name') "
                                                           aria-describedby="basic-addon1"
                                                    />
                                                    <div class="text-danger">
                                                        <strong>{{ $errors->has('full_name') ? $errors->first('full_name') : '' }}</strong>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <div class="dc-select">
                                                        <select name="type">
                                                            <option value="">@lang('admin/dashboard.type')</option>
                                                            <option value="1" {{old('value') === '1' ? 'selected' : '' }}>@lang('admin/dashboard.doctor')</option>
                                                            <option value="0" {{old('value') === '0' ? 'selected' : '' }}>@lang('admin/dashboard.patient')</option>
                                                        </select>
                                                    </div>
                                                    <div class="text-danger">
                                                        <strong>{{ $errors->has('type') ? $errors->first('type') : '' }}</strong>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <input type="password" name="confirm_password" value="{{old('confirm_password')}}"
                                                               class="form-control {{ $errors->has('confirm_password') ? 'is-invalid' : '' }}"
                                                               placeholder="@lang('admin/dashboard.enter') @lang('admin/dashboard.password_confirm') "
                                                               aria-describedby="basic-addon1"
                                                        />
                                                        <div class="text-danger">
                                                            <strong>{{ $errors->has('confirm_password') ? $errors->first('confirm_password') : '' }}</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <input type="password" name="password" value="{{old('password')}}"
                                                               class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                                               placeholder="@lang('admin/dashboard.enter') @lang('admin/dashboard.password') "
                                                               aria-describedby="basic-addon1"
                                                        />
                                                        <div class="text-danger">
                                                            <strong>{{ $errors->has('password') ? $errors->first('password') : '' }}</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6"></div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <input type="email" name="email" value="{{old('email')}}"
                                                           class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                           placeholder="@lang('admin/dashboard.enter') @lang('admin/dashboard.email') "
                                                           aria-describedby="basic-addon1"
                                                    />
                                                    <div class="text-danger">
                                                        <strong>{{ $errors->has('email') ? $errors->first('email') : '' }}</strong>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </fieldset>
                                    <div class="dc-registerformfooter">
                                        <button type="submit" class="dc-btn">@lang('admin/dashboard.register_now')</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Register Form End-->
    <!--Skills Start-->
    <section class="dc-haslayaout dc-footeraboutus dc-bgcolor">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                    <div class="dc-widgetskills">
                        <div class="dc-fwidgettitle">
                            <h3>By Speciality</h3>
                        </div>
                        <ul class="dc-fwidgetcontent">
                            <li><a href="javascript:void(0);">Allergy Specialist</a></li>
                            <li><a href="javascript:void(0);">Andrologist</a></li>
                            <li><a href="javascript:void(0);">Anesthetist</a></li>
                            <li><a href="javascript:void(0);">Audiologist</a></li>
                            <li><a href="javascript:void(0);">Dietitian/Nutritionist</a></li>
                            <li class="dc-viewmore"><a href="javascript:void(0);">View All</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                    <div class="dc-widgetskill">
                        <div class="dc-fwidgettitle">
                            <h3>Doctors In US</h3>
                        </div>
                        <ul class="dc-fwidgetcontent">
                            <li><a href="javascript:void(0);">Laproscopic Surgeon</a></li>
                            <li><a href="javascript:void(0);">Oral And Maxillofacial Surgeon</a></li>
                            <li><a href="javascript:void(0);">Orthopedic Surgeon</a></li>
                            <li><a href="javascript:void(0);">Pediatric Cardiac Surgeon</a></li>
                            <li><a href="javascript:void(0);">Pediatric Orthopedic Surgeon</a></li>
                            <li class="dc-viewmore"><a href="javascript:void(0);">View All</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                    <div class="dc-footercol dc-widgetcategories">
                        <div class="dc-fwidgettitle">
                            <h3>By Categories</h3>
                        </div>
                        <ul class="dc-fwidgetcontent">
                            <li><a href="javascript:void(0);">Cosmetic Surgeon</a></li>
                            <li><a href="javascript:void(0);">Eye Specialist</a></li>
                            <li><a href="javascript:void(0);">Gastroenterologist</a></li>
                            <li><a href="javascript:void(0);">General Physician</a></li>
                            <li><a href="javascript:void(0);">General Practitioner</a></li>
                            <li class="dc-viewmore"><a href="javascript:void(0);">View All</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                    <div class="dc-widgetbylocation">
                        <div class="dc-fwidgettitle">
                            <h3>By Location</h3>
                        </div>
                        <ul class="dc-fwidgetcontent">
                            <li><a href="javascript:void(0);">Switzerland</a></li>
                            <li><a href="javascript:void(0);">Canada</a></li>
                            <li><a href="javascript:void(0);">Germany</a></li>
                            <li><a href="javascript:void(0);">United Kingdom</a></li>
                            <li><a href="javascript:void(0);">Japan</a></li>
                            <li class="dc-viewmore"><a href="javascript:void(0);">View All</a></li>
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
