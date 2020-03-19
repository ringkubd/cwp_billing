@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.server.index.title'))
@section('breadcrumb-links')
    @include('backend.server.includes.breadcrumbs-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.server.index.title') }} <small class="text-muted">{{ __('strings.backend.server.index.create') }}</small>
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    <div class="btn-toolbar float-right" role="toolbar" aria-label="@lang('labels.general.toolbar_btn_groups')">
                        <a href="{{ route('admin.server.create') }}" class="btn btn-success ml-1" data-toggle="tooltip" title="@lang('labels.general.create_new')"><i class="fas fa-plus-circle"></i></a>
                    </div><!--btn-toolbar-->
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table table-responsive-lg">
                            <thead>
                            <tr>
                                <th>@lang('labels.backend.server.table.server_name')</th>
                                <th>@lang('labels.backend.server.table.hostname')</th>
                                <th>@lang('labels.backend.server.table.ip')</th>
                                <th>@lang('labels.backend.server.table.enable')</th>
                                <th>@lang('labels.backend.server.table.ns1')</th>
                                <th>@lang('labels.backend.server.table.ns2')</th>
                                <th>@lang('labels.backend.server.table.ns3')</th>
                                <th>@lang('labels.backend.server.table.ns4')</th>
                                <th>@lang('labels.backend.server.table.username')</th>
                                <th>@lang('labels.backend.server.table.api_key')</th>
                                <th>@lang('labels.backend.server.table.ssl')</th>
                                <th>@lang('labels.general.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $d)
                                <tr>
                                    <td>{{ $d->name }}</td>
                                    <td>{{ $d->host_name }}</td>
                                    <td>{{ $d->server_ip }}</td>
                                    <td>@include('backend.server.includes.enable', ['server' => $d])</td>
                                    <td>{{ $d->ns1 }}</td>
                                    <td>{{ $d->ns2 }}</td>
                                    <td>{{ $d->ns3 }}</td>
                                    <td>{{ $d->ns4 }}</td>
                                    <td>{{ $d->username }}</td>
                                    <td>{{ $d->api_key }}</td>
                                    <td>@include('backend.server.includes.secure', ['server' => $d])</td>
                                    <td class="btn-td">@include('backend.server.includes.actions', ['server' => $d])</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!--col-->
            </div><!--row-->
            <div class="row">
                <div class="col-7">
                    <div class="float-left">

                    </div>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {{--                        {!! $data->render() !!}--}}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->

@endsection
