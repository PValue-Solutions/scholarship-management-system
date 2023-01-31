@extends('layouts.layout')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                @can('scholarship-create')
                    <h3><a href="{{ route('scholarship.create') }}" class="btn btn-outline btn-info">+ {{ __('Add New Application') }}</a></h3>
                @endcan
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">@lang('Dashboard')</a></li>
                    <li class="breadcrumb-item active">{{ __('Application List') }}</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">@lang('Schools') </h3>
                <div class="card-tools">
                    @can('school-export')
                        <a class="btn btn-primary" target="_blank" href="{{ route('scholarship-school.index') }}?export=1">
                            <i class="fas fa-cloud-download-alt"></i> @lang('Export')
                        </a>
                    @endcan
                    <button class="btn btn-default" data-toggle="collapse" href="#filter"><i class="fas fa-filter"></i> @lang('Filter')</button>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.delete_modal')
@include('script.items.index.js')
@endsection

