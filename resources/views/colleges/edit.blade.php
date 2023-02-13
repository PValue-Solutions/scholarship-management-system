@extends('layouts.layout')
@section('one_page_js')
    <script src="{{ asset('js/quill.js') }}"></script>
    <script src="{{ asset('plugins/dropify/dist/js/dropify.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endsection
@section('one_page_css')
    <link href="{{ asset('css/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/dropify/dist/css/dropify.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('scholarship-college.index') }}">{{ __('College List') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('Edit College') }}</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>{{ __('Edit College') }}</h3>
            </div>
            <div class="card-body">
                <form class="form-material form-horizontal" action="{{ route('scholarship-college.update', $scholarshipCollege) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">
                                    @lang('Name') <b class="ambitious-crimson">*</b>
                                </label>
                                <input class="form-control ambitious-form-loading @error('name') is-invalid @enderror" name="name" value="{{ old('name', $scholarshipCollege->name) }}" id="name" type="text" placeholder="{{ __('Type Your College Name Here') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="college_type">
                                    @lang('Type')
                                </label>
                                <select class="form-control ambitious-form-loading @error('college_type') is-invalid @enderror" name="college_type" id="college_type">
                                    <option value="">@lang('Select College Type')</option>
                                    <option value="Govt." @if(old('college_type', $scholarshipCollege->college_type) == 'Govt.') selected @endif>@lang('Govt.')</option>
                                    <option value="Govt. Aided" @if(old('college_type', $scholarshipCollege->college_type) == 'Govt. Aided') selected @endif>@lang('Govt. Aided')</option>
                                    <option value="Private" @if(old('college_type', $scholarshipCollege->college_type) == 'Private') selected @endif>@lang('Private')</option>
                                </select>
                                @error('college_type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="website">
                                    @lang('Website')
                                </label>
                                <input class="form-control ambitious-form-loading @error('website') is-invalid @enderror" name="website" value="{{ old('website', $scholarshipCollege->website) }}" id="website" type="text" placeholder="@lang('Enter Website')">
                                @error('website')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="website">
                                    @lang('Email')
                                </label>
                                <input class="form-control ambitious-form-loading @error('email') is-invalid @enderror" name="email" value="{{ old('email', $scholarshipCollege->email) }}" id="email" type="email" placeholder="@lang('Type Your Email Here')" required>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="scholarship_village_id">
                                    @lang('Village') <b class="ambitious-crimson">*</b>
                                </label>
                                <select class="form-control select2" name="scholarship_village_id" id="scholarship_village_id" required>
                                    <option value="">Select Village</option>
                                    @foreach ($villages as $key => $value)
                                        <option value="{{ $key }}" @if(old('scholarship_village_id', $scholarshipCollege->scholarship_village_id) == $key) selected @endif>{{ $value }}</option>
                                    @endforeach
                                </select>
                                {{--  <input class="form-control ambitious-form-loading @error('village') is-invalid @enderror" name="village" value="{{ old('village', $scholarshipCollege->village) }}" id="village" type="text" placeholder="{{ __('Type Your Village Name Here') }}">  --}}
                                @error('scholarship_village_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="district">
                                    @lang('District')
                                </label>
                                <input class="form-control ambitious-form-loading @error('district') is-invalid @enderror" name="district" value="{{ old('district', $scholarshipCollege->district) }}" id="district" type="text" placeholder="{{ __('Type Your District Name Here') }}">
                                @error('district')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    @lang('Description')
                                </label>
                                <div id="input_description" class="@error('description') is-invalid @enderror" style="min-height: 55px;"></div>
                                <input type="hidden" name="description" value="{{ old('description', $scholarshipCollege->description) }}" id="description">
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>@lang('Picture')</label>
                                <input id="picture" class="dropify" name="picture" value="{{ old('picture') }}" type="file" data-allowed-file-extensions="png jpg jpeg" data-max-file-size="2024K" />
                                <small id="name" class="form-text text-muted">@lang('Leave Blank For Remain Unchanged')</small>
                                <p>@lang('Max Size: 2mb, Allowed Format: png, jpg, jpeg')</p>
                                @if ($errors->has('picture'))
                                    <div class="error ambitious-red">{{ $errors->first('picture') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">@lang('Status') <b class="ambitious-crimson">*</b></label>
                                <select class="form-control ambitious-form-loading @error('status') is-invalid @enderror" required="required" name="status" id="status">
                                    <option value="1" @if(old('status', $scholarshipCollege->status) == '1') selected @endif>@lang('Active')</option>
                                    <option value="0" @if(old('status', $scholarshipCollege->status) == '0') selected @endif>@lang('Inactive')</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" value="@lang('Submit')" class="btn btn-outline btn-info btn-lg"/>
                                <a href="{{ route('scholarship-college.index') }}" class="btn btn-outline btn-warning btn-lg" style="float:right">@lang('Cancel')</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('script.items.create.js')
@endsection
