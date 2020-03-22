@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.permission.title.index'))

@section('breadcrumb-links')
    @include('backend.auth.permission.includes.breadcrumb-links')
@endsection

@section('content')
@endsection
