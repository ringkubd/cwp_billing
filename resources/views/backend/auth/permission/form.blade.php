<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-8">
                <h4 class="card-title mb-0">
                    @lang('labels.backend.permission.title.index')
                    <small class="text-muted">@lang('labels.backend.permission.title.add')</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <hr>
        <div class="row mt-4 mb-4">
            <div class="col">
                <div class="form-group row">
                    {{html()->label(__('validation.attributes.backend.access.permissions.name'))->class('col-md-2 form-control-label')->for('name')}}
                    <div class="col-md-5">
                        {{html()->text('name')->class('form-control')->placeholder(__('validation.attributes.backend.access.permissions.permission_name'))
                                ->attribute('maxlength', 191)
                                ->required()
                                ->autofocus()}}
                    </div>
                </div>
                <div class="form-group row">
                    {{html()->label(__('validation.attributes.backend.access.permissions.guard'))->class('col-md-2 form-control-label')->for('guard_name')}}
                    <div class="col-md-5">
                        {{html()->select('guard_name', $guards)->class('form-control')
                                ->placeholder(__('validation.attributes.backend.access.permissions.guard_name'))
                                ->attribute('maxlength', 191)
                                ->required()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
