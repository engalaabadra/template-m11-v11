@extends('layouts.dashboard.app')
@section('pages')
    @include('dashboard.includes.partials._extras.offcanvas.quick-user')

    <!--begin::Main-->

    <!--[html-partial:include:{"file":"partials/_header-mobile.blade.php"}]/-->
    @include('dashboard.includes.partials._header-mobile')
    <div class="d-flex flex-column flex-root">

        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">

            @include('dashboard.includes.partials._aside')
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

                @include('dashboard.includes.partials._header')

                <!--begin::Content-->
                <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">

                    @include('dashboard.includes.partials._subheader.subheader-v1')
{{--                    <!--Content area here-->--}}
                    @yield('content')

                </div>

                <!--end::Content-->

                @include('dashboard.includes.partials._footer')
            </div>

            <!--end::Wrapper-->
        </div>

        <!--end::Page-->
    </div>

    <!--end::Main-->
@endsection
