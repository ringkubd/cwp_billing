@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.permission.title.create'))

@section('breadcrumb-links')
    @include('backend.auth.permission.includes.breadcrumb-links')
@endsection

@section('content')
    {{ html()->modelForm($permission, 'PATCH', route('admin.auth.permission.update', $permission))->class('form-vertical')->open() }}
    @include('backend.auth.permission.form')
    {{html()->submit('Update')->class('btn btn-success')}}
    {{ html()->form()->close() }}
@endsection
