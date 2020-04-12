@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.permission.title.index'))

@section('breadcrumb-links')
    @include('backend.auth.permission.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.permission.title.index')
                    </h4>
                </div><!--col-->

                <div class="col-sm-7 pull-right">
                    @include('backend.auth.permission.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>@lang('labels.backend.permission.table.permission')</th>
                                <th>@lang('labels.backend.permission.table.guard')</th>
                                <th>@lang('labels.general.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permission as $p)
                                <tr>
                                    <td>{{ucwords($p->name)}}</td>
                                    <td>{{ucwords($p->guard_name)}}</td>
                                    <td>@include('backend.auth.permission.includes.actions', ['permission' => $p])</td>
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

                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection
