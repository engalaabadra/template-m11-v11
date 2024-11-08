@extends('layouts.main')
@section('main-container')    

<!-- Main Start -->
<main id="dc-main" class="dc-main dc-haslayout">
    <div class="dc-haslayout dc-main-section">
        <!-- Error 404 Start-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="dc-errorpage">
                        <figure>
                            <img src="{{url('/assets/images/doc-error/img-01.jpg')}}">
                        </figure>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="dc-errorcontent">
                        <div class="dc-title">
                            <h4>@lang('custom.Something Went Wrong')</h4>
                            <h3>@lang('custom.Ooopps! Page Not Found')</h3>
                        </div>
                        <div class="dc-description">
                            <p>@lang('custom.Amet consectetur adipisicing eliteiuim sete eiuode tempor incint utoreas etnalom dolore maena aliqua udiminimate veniam quis norud exerciton ullamco laboris nisiquip commodo lokate.')</p>
                        </div>
                        <form class="dc-formtheme dc-formnewsletter">
                            <fieldset>
                                <div class="form-group">
                                    <input type="email" name="email" value="" class="form-control" placeholder="@lang('custom.Perhaps Searching Can Help')" required="">
                                </div>
                            </fieldset>
                        </form>
                        <div class="dc-btnarea">
                            <a href="javascript:void(0);" class="dc-btn">@lang('custom.Search')</a>
                            <span>@lang('custom.You can go back to') <a href="javascript:void(0);"> @lang('custom.Homepage')</a> @lang('custom.and start again')</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Error 404 End-->
    </div>
    <!-- Emerging Clients End -->
    @include('layouts.skills')

</main>
<!-- Main End -->
@endsection
