@extends('layouts.main')
@section('meta')
    <title> @lang('custom.Template Contact Us')</title>
	<meta name="title" content=" Template App - Contact Us">
	<meta name="description" content="You have questions or inquiries about the Template application and the mental health services that it provides
    We offer? Feel free to contact us now. Download the Template app and join the mental health care community.">

    <!-- Open Graph / Facebook -->
	<meta property="og:type" content="website">
	<meta property="og:url" content="https://metatags.io">
	<meta property="og:title" content="Template App - Contact Us">
	<meta property="og:description" content="You have questions or inquiries about the Template application and the mental health services that it provides
    We offer? Feel free to contact us now. Download the Template app and join the mental health care community.">
    <meta property="og:image" content="https://metatags.io/images/meta-tags.png">

	<!-- twitter -->
	<meta property="twitter:card" content="summary_large_image">
	<meta property="twitter:url" content="https://metatags.io">
	<meta property="twitter:title" content="Template App - Contact Us">
	<meta property="twitter:description" content="You have questions or inquiries about the Template application and the mental health services that it provides
    We offer? Feel free to contact us now. Download the Template app and join the mental health care community.">
    <meta property="twitter:image" content="https://metatags.io/images/meta-tags.png">
	<!-- Meta Tags Generated with https://metatags.io -->

@endsection
@section('main-container')

<!-- Main Start -->
<main id="dc-main" class="dc-main dc-haslayout">
    <div class="dc-haslayout dc-main-section dc-ourcontact-holder">
        <!-- Error 404 Start-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="dc-contactvone">
                        <div class="dc-title">
                            <h4>@lang('custom.Hello')</h4>
                        </div>
                        <form class="dc-formtheme dc-medicalform" action="{{route('website-contact-us')}}" method="post" >
                            @csrf
                            <fieldset>
                                <div class="form-group">
                                    <input type="text" name="full_name" value="" class="form-control" placeholder="@lang('custom.Your Name')*" required="">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" value="" class="form-control" placeholder="@lang('custom.Your Email')*" required="">
                                </div>
                                <div class="form-group">
                                    <textarea name="message" class="form-control" placeholder="@lang('custom.Type Your Query')*"></textarea>
                                </div>
                                <div class="form-group dc-btnarea">
                                    <button type="submit" class="dc-btn">@lang('custom.Send Now')</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="dc-cntctfrmdetail">
                        <div class="dc-title">
                            <h3><span>@lang('custom.Always Get In Touch')</span> @lang('custom.Our Contact Details')</h3>
                        </div>
                        <div class="dc-description">
                            <p>@lang('custom.Template, your go-to mental health support app! Connecting experts with those in need in a secure, family-friendly environment. Lets nurture our mental health together!')</p>
                        </div>
                        <ul class="dc-formcontactus">
                            <li><address><i class="lnr lnr-location"></i> 8428، طريق الملك فهد - 4250 الرياض 12211</address></li>
                            <li><a href="javascript:void(0)"><i class="lnr lnr-envelope"></i> info@template.net </a></li>
                            <li><span><i class="lnr lnr-phone-handset"></i> (+966) 552272756</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Error 404 End-->
    </div>
    <div class="dc-haslayout dc-shadedmap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div id="dc-thememap" class="dc-thememap dc-locationmap"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Emerging Clients End -->
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
                            <li class="dc-viewmore"><a href="javascript:void(0);">@lang('custom.View All')</a></li>
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
                            <li class="dc-viewmore"><a href="javascript:void(0);">@lang('custom.View All')</a></li>
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
                            <li class="dc-viewmore"><a href="javascript:void(0);">@lang('custom.View All')</a></li>
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
                            <li class="dc-viewmore"><a href="javascript:void(0);">@lang('custom.View All')</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Skills End-->
</main>
<!-- Main End -->
@endsection
