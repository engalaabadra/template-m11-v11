
<!--begin::Header-->
<div id="kt_header" class="header  header-fixed ">

	<!--begin::Container-->
	<div class=" container-fluid  d-flex align-items-stretch justify-content-between">

		<!--begin::Header Menu Wrapper-->
		<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">

			<!--begin::Header Menu-->
			<div id="kt_header_menu" class="header-menu header-menu-mobile  header-menu-layout-default ">

				<!--begin::Header Nav-->
				<ul class="menu-nav ">
					{{-- <li class="menu-item  menu-item-open menu-item-here menu-item-submenu menu-item-rel menu-item-open menu-item-here menu-item-active"><a href="{{route('admin.index')}}" class="menu-link "><span class="menu-text">@lang('admin/dashboard.home')</span><i class="menu-arrow"></i></a>
					</li> --}}
					<li class="menu-item  menu-item-open menu-item-here menu-item-submenu menu-item-rel menu-item-open menu-item-here menu-item-active"><a class="menu-link "><span class="menu-text">@lang('admin/dashboard.home')</span><i class="menu-arrow"></i></a>
					</li>
                </ul>

				<!--end::Header Nav-->
			</div>

			<!--end::Header Menu-->
		</div>

		<!--end::Header Menu Wrapper-->

		<!--begin::Topbar-->
		<div class="topbar">

			<!--begin::Search-->

			<!--end::Search-->

			<!--begin::Notifications-->

			<!--end::Notifications-->

			<!--begin::Quick Actions-->

			<!--end::Quick Actions-->

			<!--begin::Cart-->

			<!--end::Cart-->

			<!--begin::Quick panel-->

			<!--end::Quick panel-->

			<!--begin::Chat-->

			<!--end::Chat-->

			<!--begin::Languages-->
			<div class="dropdown">

				<!--begin::Toggle-->
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                        @if (app()->getLocale() == 'en')
                            <img class="h-20px w-20px rounded-sm"
                                 src="{{asset('dashboard_assets/media/svg/flags/226-united-states.svg')}}" alt=""/>
                        @else
                            <img class="h-20px w-20px rounded-sm"
                                 src="{{asset('dashboard_assets/media/svg/flags/008-saudi-arabia.svg')}}" alt=""/>
                        @endif
                    </div>
                </div>

				<!--end::Toggle-->

				<!--begin::Dropdown-->
				<div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">

					<!--[html-partial:include:{"file":"partials/_extras/dropdown/languages.blade.php"}]/-->
                    @include('dashboard.includes.partials._extras.dropdown.languages')
				</div>

				<!--end::Dropdown-->
			</div>

			<!--end::Languages-->

			<!--begin::User-->
			<div class="topbar-item">
				<div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
					<span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">@lang('admin/dashboard.hi'),</span>
					<span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{auth()->user()->name}}</span>
					<span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
						<span class="symbol-label font-size-h5 font-weight-bold">{{ucfirst(substr(auth()->user()->name,0,1))}}</span>
					</span>
				</div>
			</div>

			<!--end::User-->
		</div>

		<!--end::Topbar-->
	</div>

	<!--end::Container-->
</div>

<!--end::Header-->
