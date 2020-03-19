@if ($server->isSecure())
    <a href="{{ route( 'admin.server.ssl', $server) }}" data-toggle="tooltip" data-placement="top" title="@lang('buttons.backend.access.users.unconfirm')" name="confirm_item">
        <span class="badge badge-success" style="cursor:pointer">@lang('labels.general.yes')</span>
    </a>
@else
    <a href="{{ route('admin.server.ssl', $server) }}" data-toggle="tooltip" data-placement="top" title="@lang('buttons.backend.access.users.confirm')" name="confirm_item">
        <span class="badge badge-danger" style="cursor:pointer">@lang('labels.general.no')</span>
    </a>
@endif

