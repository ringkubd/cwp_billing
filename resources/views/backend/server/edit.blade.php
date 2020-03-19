@extends('backend.layouts.app')

@section('title', __('labels.backend.server.create') . ' | ' . __('labels.backend.server.title'))

@section('breadcrumb-links')
    @include('backend.server.includes.breadcrumbs-links')
@endsection

@section('content')
    {{ html()->modelForm($server,'PATCH', route('admin.server.update', $server->id))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.server.management')
                        <small class="text-muted">@lang('labels.backend.server.create')</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.server.server_name'))->class('col-md-2 form-control-label')->for('name') }}
                        {{html()->hidden('id')}}
                        <div class="col-md-10">
                            {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.server.server_name'))
                                ->attribute('maxlength', 191)
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.server.hostname'))->class('col-md-2 form-control-label')->for('host_name') }}

                        <div class="col-md-10">
                            {{ html()->text('host_name')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.server.hostname'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.server.ip'))->class('col-md-2 form-control-label')->for('server_ip') }}

                        <div class="col-md-10">
                            {{ html()->text('server_ip')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.server.ip'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.server.ns1'))->class('col-md-2 form-control-label')->for('ns1') }}

                        <div class="col-md-10">
                            {{ html()->text('ns1')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.server.ns1'))
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.server.ns2'))->class('col-md-2 form-control-label')->for('ns2') }}

                        <div class="col-md-10">
                            {{ html()->text('ns2')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.server.ns2'))
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.server.ns3'))->class('col-md-2 form-control-label')->for('ns3') }}

                        <div class="col-md-10">
                            {{ html()->text('ns3')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.server.ns3'))
                                }}
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.server.ns4'))->class('col-md-2 form-control-label')->for('ns4') }}

                        <div class="col-md-10">
                            {{ html()->text('ns4')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.server.ns4'))
                                 }}
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.server.ns4'))->class('col-md-2 form-control-label')->for('ns4') }}

                        <div class="col-md-10">
                            {{ html()->text('ns4')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.server.ns4'))
                                 }}
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.server.username'))->class('col-md-2 form-control-label')->for('username') }}

                        <div class="col-md-10">
                            {{ html()->text('username')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.server.username'))
                                 }}
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.server.password'))->class('col-md-2 form-control-label')->for('password') }}

                        <div class="col-md-10">
                            {{ html()->password('password')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.server.password'))
                                 }}
                        </div><!--col-->
                    </div><!--form-group-->
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.server.api_key'))->class('col-md-2 form-control-label')->for('api_key') }}

                        <div class="col-md-10">
                            {{ html()->text('api_key')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.server.api_key'))
                                ->required()
                                 }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.server.ssl'))->class('col-md-2 form-control-label')->for('secureConnection') }}

                        <div class="col-md-10">
                            <label class="switch switch-label switch-pill switch-primary">
                                {{ html()->checkbox('secureConnection')->class('switch-input') }}
                                <span class="switch-slider" data-checked="yes" data-unchecked="no"></span>
                            </label>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.server.enable'))->class('col-md-2 form-control-label')->for('enable') }}

                        <div class="col-md-10">
                            <label class="switch switch-label switch-pill switch-primary">
                                {{ html()->checkbox('enable')->class('switch-input') }}
                                <span class="switch-slider" data-checked="yes" data-unchecked="no"></span>
                            </label>
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer clearfix">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.server.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
    {{ html()->form()->close() }}
@endsection
