<!DOCTYPE html>
<html>

{{-- <html lang="{{ \LaravelLocalization::getCurrentLocale() }}"
      dir="{{ \LaravelLocalization::getCurrentLocaleDirection() }}"> --}}

<!--begin::Head-->
<head>
    <base href="">
    <meta charset="utf-8" />
    <title>Template</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Updates and statistics"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="canonical" href="https://keenthemes.com/metronic" />

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cairo:400,700"/>

    <!--end::Fonts-->

    <!--begin::Page Vendors Styles(used by this page)-->

    <link href="{{asset('dashboard_assets/plugins/custom/datatables/datatables.bundle.'.getFileDir().'css')}}" rel="stylesheet" type="text/css" />

    <!--end::Page Vendors Styles-->

    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{asset('dashboard_assets/plugins/global/plugins.bundle.'.getFileDir().'css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dashboard_assets/plugins/custom/prismjs/prismjs.bundle.'.getFileDir().'css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dashboard_assets/css/style.bundle.'.getFileDir().'css')}}" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles-->

    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{asset('dashboard_assets/css/themes/layout/header/base/light.'.getFileDir().'css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dashboard_assets/css/themes/layout/header/menu/light.'.getFileDir().'css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dashboard_assets/css/themes/layout/brand/dark.'.getFileDir().'css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dashboard_assets/css/themes/layout/aside/dark.'.getFileDir().'css')}}" rel="stylesheet" type="text/css" />

    <!--end::Layout Themes-->

    <link rel="shortcut icon" href="{{url('/en/assets/images/logo/logo_black.png')}}" type="image/x-icon">
    @stack('style')
</head>

<!--end::Head-->

<!--begin::Body-->
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

@yield('pages')
{{-- @include('dashboard.includes.partials._extras.scrolltop') --}}

@if(session()->has('message'))
    @include('dashboard.includes.alerts.toaster',[
    'message' => session()->get('message'),
    'alert_status' => session()->get('status')??'success'
    ])
@endif

<!--begin::Global Config(global config for global JS scripts)-->
<script>
    var KTAppSettings = {
        "breakpoints": {
            "sm": 576,
            "md": 768,
            "lg": 992,
            "xl": 1200,
            "xxl": 1400
        },
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#3699FF",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#E4E6EF",
                    "dark": "#181C32"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1F0FF",
                    "secondary": "#EBEDF3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#3F4254",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#EBEDF3",
                "gray-300": "#E4E6EF",
                "gray-400": "#D1D3E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#7E8299",
                "gray-700": "#5E6278",
                "gray-800": "#3F4254",
                "gray-900": "#181C32"
            }
        },
    };
</script>

<!--end::Global Config-->
<script>
    var HOST_URL = "{{ \URL::to('/') }}";
    var LANG = "{{ app()->getLocale() }}";
    var AuthId = "{{auth()->id()}}"
</script>
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{asset('dashboard_assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('dashboard_assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
<script src="{{asset('dashboard_assets/js/scripts.bundle.js')}}"></script>
<script src="{{ asset('dashboard_assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
{{--<script src="{{ asset('dashboard_assets/js/pages/crud/datatables/basic/headers.js')}}"></script>--}}
<script src="{{ asset('dashboard_assets/custom/js/translate.js')}}"></script>
<script src="{{ asset('dashboard_assets/js/custom/delete-item.js')}}"></script>
{{--<script src="{{asset('dashboard_assets/custom/js/table.js')}}"></script>--}}
<script src="{{asset('dashboard_assets/custom/js/custom.js')}}"></script>

<!--end::Global Theme Bundle-->
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable({
            paging: false,
            "order": [],
            pagination:false,
            searching: true,
            info: true,
        });
        $('.easy-select').select2({
            placeholder: "Select ",
        });
        $("#cancel-button").on("click", function () {
            window.history.back();
        });
    });
</script>
<script>
    file_excel = "@lang('admin/dashboard.file_excel')";
    file_pdf = "@lang('admin/dashboard.file_pdf')";
    file_csv = "@lang('admin/dashboard.file_csv')";
    copy_table = "@lang('admin/dashboard.copy_table')";
    custom_column = "@lang('admin/dashboard.custom_column')";
    action = "@lang('admin/dashboard.action')";
</script>
@stack('js')

<!--end::Page Scripts-->
</body>

<!--end::Body-->
</html>
