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
                <h3 class="card-title">{{ $title }}</h3>
                <div class="card-tools">
                    {{--  @can('scholarship-export')
                        <a class="btn btn-primary" target="_blank" href="{{ route('scholarship.index') }}?export=1">
                            <i class="fas fa-cloud-download-alt"></i> @lang('Export')
                        </a>
                    @endcan  --}}
                    <button class="btn btn-default" data-toggle="collapse" href="#filter"><i class="fas fa-filter"></i> @lang('Filter')</button>
                </div>
            </div>
            <div class="card-body">
                <div id="filter" class="collapse @if(request()->isFilterActive) show @endif">
                    <div class="card-body border">
                        <form action="" method="get" role="form" autocomplete="off">
                            <input type="hidden" name="isFilterActive" value="true">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>@lang('Application No')</label>
                                        <input type="text" name="application_no" class="form-control" value="{{ request()->application_no }}" placeholder="@lang('Application No')">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>@lang('Year')</label>
                                        <input type="text" name="year" class="form-control" value="{{ request()->year }}" placeholder="@lang('Filter With Year')">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>@lang('Village')</label>
                                        <select class="form-control select2" name="scholarship_village_id" id="scholarship_village_id">
                                            <option value="">Select Village</option>
                                            @foreach ($villages as $key => $value)
                                                <option value="{{ $key }}" {{ old('scholarship_village_id') == $key ? 'selected' : '' }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>@lang('Institution')</label>
                                        <select class="form-control ambitious-form-loading" name="school_or_college" id="school_or_college">
                                            <option value="1" {{ old('school_or_college', request()->school_or_college) == '1' ? 'selected' : ''  }}>@lang('School')</option>
                                            <option value="2" {{ old('school_or_college', request()->school_or_college) == '2' ? 'selected' : ''  }}>@lang('College')</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="school_block" class="col-md-4">
                                    <div class="form-group">
                                        <label>@lang('School')</label>
                                        <select class="form-control select2" name="scholarship_school_id" id="scholarship_school_id">
                                            <option value="">Select School</option>
                                            @foreach ($schools as $key => $value)
                                                <option value="{{ $key }}" {{ old('scholarship_school_id', request()->scholarship_school_id) == $key ? 'selected' : '' }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div id="college_block" class="col-md-4">
                                    <div class="form-group">
                                        <label>@lang('College')</label>
                                        <select class="form-control select2" name="scholarship_college_id" id="scholarship_college_id">
                                            <option value="">Select College</option>
                                            @foreach ($colleges as $key => $value)
                                                <option value="{{ $key }}" {{ old('scholarship_college_id', request()->scholarship_college_id) == $key ? 'selected' : '' }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>@lang('Status')</label>
                                        <select class="form-control ambitious-form-loading" name="status" id="status">
                                            <option value="">Select Status</option>
                                            <option value="pending" {{ old('status', request()->status) == 'pending' ? 'selected' : ''  }}>@lang('Under Verification')</option>
                                            <option value="approved" {{ old('status', request()->status) == 'approved' ? 'selected' : ''  }}>@lang('Approved')</option>
                                            <option value="payment_in_progress" {{ old('status', request()->status) == 'payment_in_progress' ? 'selected' : ''  }}>@lang('Payment In Progress')</option>
                                            <option value="payment_done" {{ old('status', request()->status) == 'payment_done' ? 'selected' : ''  }}>@lang('Payment Done')</option>
                                            <option value="rejected" {{ old('status', request()->status) == 'rejected' ? 'selected' : ''  }}>@lang('Rejected')</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                    @if(request()->isFilterActive)
                                        <a href="{{ route('scholarship.index') }}" class="btn btn-secondary">Clear</a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <table id="laravel_datatable" class="table table-striped compact table-width">
                    <thead>
                        <tr>
                            <th>@lang('Application No')</th>
                            <th>@lang('Student Name')</th>
                            <th>@lang('Village')</th>
                            <th>@lang('Institution')</th>
                            <th>@lang('Status')</th>
                            @canany(['scholarship-update', 'scholarship-delete'])
                                <th data-orderable="false">@lang('Actions')</th>
                            @endcanany
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($scholarships as $scholarship)
                        <tr>
                            <td>{{ $scholarship->application_no }}</td>
                            <td>{{ $scholarship->studentDetail->full_name }}</td>
                            <td>{{ $scholarship->studentDetail->scholarshipVillage->name }}</td>
                            <td>
                                @if($scholarship->school_or_college == '1')
                                    <span class="badge badge-pill badge-info">@lang('School')</span>
                                @else
                                    <span class="badge badge-pill badge-warning">@lang('College')</span>
                                @endif
                            </td>
                            <td>
                                @if($scholarship->status == 'pending')
                                    <span class="badge badge-pill badge-warning">@lang('Under Verification')</span>
                                @elseif ($scholarship->status == 'approved')
                                    <span class="badge badge-pill badge-info">@lang('Approved')</span>
                                @elseif ($scholarship->status == 'payment_in_progress')
                                    <span class="badge badge-pill badge-secondary">@lang('Payment In Progress')</span>
                                @elseif ($scholarship->status == 'payment_done')
                                    <span class="badge badge-pill badge-success">@lang('Payment Done')</span>
                                @else
                                    <span class="badge badge-pill badge-danger">@lang('Rejected')</span>
                                @endif
                            </td>
                            @canany(['scholarship-read','scholarship-update', 'scholarship-delete'])
                                <td>
                                    {{--  @can('scholarship-download')
                                        <a href="{{ route('scholarship.download', $scholarship) }}" class="btn btn-info btn-outline btn-circle btn-lg" data-toggle="tooltip" title="show"><i class="fa fa-download ambitious-padding-btn"></i></a>&nbsp;&nbsp;
                                    @endcan  --}}
                                    <a href="{{ route('scholarship.download', $scholarship) }}" target="_blank" class="btn btn-info btn-outline btn-circle btn-lg" data-toggle="tooltip" title="download"><i class="fa fa-download ambitious-padding-btn"></i></a>&nbsp;&nbsp;

                                    @can('scholarship-read')
                                        <a href="{{ route('scholarship.show', $scholarship) }}" class="btn btn-info btn-outline btn-circle btn-lg" data-toggle="tooltip" title="show"><i class="fa fa-eye ambitious-padding-btn"></i></a>&nbsp;&nbsp;
                                    @endcan
                                    @can('scholarship-update')
                                        <a href="{{ route('scholarship.edit', $scholarship) }}" class="btn btn-info btn-outline btn-circle btn-lg" data-toggle="tooltip" title="Edit"><i class="fa fa-edit ambitious-padding-btn"></i></a>&nbsp;&nbsp;
                                    @endcan
                                    @can('scholarship-delete')
                                        <a href="#" data-href="{{ route('scholarship.destroy', $scholarship) }}" class="btn btn-info btn-outline btn-circle btn-lg" data-toggle="modal" data-target="#myModal" title="Delete"><i class="fa fa-trash ambitious-padding-btn"></i></a>
                                    @endcan
                                </td>
                            @endcanany
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $scholarships->links() }}
            </div>
        </div>
    </div>
</div>
<script>
    "use strict";
    $(document).ready(function() {
        var school_or_college = $('#school_or_college').val();
        if(school_or_college == '1') {
            $('#school_block').show();
            $('#college_block').hide();
        } else {
            $('#school_block').hide();
            $('#college_block').show();
        }

        $('#school_or_college').change(function(){
            if($('#school_or_college').val() == '1') {
                $('#school_block').show();
                $('#college_block').hide();
            } else {
                $('#school_block').hide();
                $('#college_block').show();
            }
        });

        $(".select2").select2();

    });
</script>
@include('layouts.delete_modal')
@include('script.items.index.js')
@endsection

