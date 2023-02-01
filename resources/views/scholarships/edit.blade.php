@extends('layouts.layout')
@section('one_page_js')
    <script src="{{ asset('plugins/dropify/dist/js/dropify.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('plugins/steps/js/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('plugins/steps/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('plugins/validation/additional-methods.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endsection

@section('one_page_css')
    <link href="{{ asset('plugins/dropify/dist/css/dropify.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/steps/css/jquery.steps.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/steps/css/steps.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('scholarship.index') }}">@lang('Scholarship List')</a></li>
                    <li class="breadcrumb-item active">@lang('Edit Applied Scholarship')</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<link href="{{ asset('css/scholarship.css') }}" rel="stylesheet">
<div class="row">
    <div class="col-12">
        <div class="material-card card">
            <div class="card-header">
                <h3>@lang('Edit Applied Scholarship')</h3>
            </div>
        </div>
    </div>
</div>
@endsection
