<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@lang('menus.backend.server.main')</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.server.index') }}">@lang('menus.backend.server.all')</a>
                <a class="dropdown-item" href="{{ route('admin.server.create') }}">@lang('menus.backend.server.create')</a>
                <a class="dropdown-item" href="{{ route('admin.server.disabled') }}">@lang('menus.backend.server.deactivated')</a>
                <a class="dropdown-item" href="{{ route('admin.server.deleted') }}">@lang('menus.backend.server.deleted')</a>
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>
