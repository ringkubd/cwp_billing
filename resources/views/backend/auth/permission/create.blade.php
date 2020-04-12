@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.permission.title.create'))

@section('breadcrumb-links')
    @include('backend.auth.permission.includes.breadcrumb-links')
@endsection

@section('content')
    {{ html()->form('POST', route('admin.auth.permission.store'))->class('form-vertical')->open() }}
    @include('backend.auth.permission.form')
    {{html()->submit('Add')->class('btn btn-success')}}
    {{ html()->form()->close() }}
@endsection
