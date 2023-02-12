@extends('layouts.layout')

@section('one_page_css')
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
@endsection
@section('one_page_js')
<script src="{{ asset('plugins/bower_components/chart.js/bundle.js') }}"></script>
<script src="{{ asset('plugins/bower_components/chart.js/utils.js') }}"></script>
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h2>@lang('Dashboard')</h2>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">@lang('Dashboard')</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<div class="container-fluid">

    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-globe"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Application</span>
                    <span class="info-box-number">{{ $data_total->total_scholarships }}</span>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-primary"><i class="fas fa-money-bill-wave"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Payment In Progress</span>
                    <span class="info-box-number">{{ $data_payment_in_progress->total_scholarships }}</span>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fas fa-hand-holding-usd"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Payment Done</span>
                    <span class="info-box-number">{{ $data_payment_done->total_scholarships }}</span>
                </div>
            </div>
        </div>




    </div>
    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fas fa-thumbs-up"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Approved</span>
                    <span class="info-box-number">{{ $data_approved->total_scholarships }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-warning"><i class="fas fa-stop"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Under Verification</span>
                    <span class="info-box-number">{{ $data_pending->total_scholarships }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-danger"><i class="fas fa-times-circle"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Rejected</span>
                    <span class="info-box-number">{{ $data_rejected->total_scholarships }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@include('script.dashboard.view.js')

@endsection
