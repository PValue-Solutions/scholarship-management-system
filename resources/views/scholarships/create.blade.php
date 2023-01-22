@extends('layouts.layout')
@section('one_page_js')
    <script src="{{ asset('plugins/dropify/dist/js/dropify.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('plugins/steps/js/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('plugins/steps/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('plugins/validation/additional-methods.min.js') }}"></script>
    <script src="{{ asset('js/flatpickr.js') }}"></script>
@endsection

@section('one_page_css')
    <link href="{{ asset('plugins/dropify/dist/css/dropify.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/sweetalert/sweetalert.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/steps/css/jquery.steps.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/steps/css/steps.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flatpickr.min.css') }}" rel="stylesheet">
@endsection
@section('content')
@endsection
