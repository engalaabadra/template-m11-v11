
<aside id="dc-sidebar" class="dc-sidebar dc-sidebar-grid float-left mt-md-0">
    <div class="dc-widget dc-categories">
        <div class="dc-widgettitle">
            <h3>@lang('custom.Categories')</h3>
        </div>
        <div class="dc-widgetcontent">
            <ul class="dc-categories-content">
                @foreach($articleCategories as $category)
                    <li><a href="javascript:void(0);">{{$category->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</aside>