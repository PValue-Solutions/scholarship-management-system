@extends('layouts.layout')
@section('one_page_js')
    <script src="{{ asset('js/quill.js') }}"></script>
    <script src="{{ asset('plugins/dropify/dist/js/dropify.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endsection
@section('one_page_css')
    <link href="{{ asset('css/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/dropify/dist/css/dropify.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('scholarship-school.index') }}">{{ __('School List') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('Create School') }}</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>{{ __('New School') }}</h3>
            </div>
            <div class="card-body">
                <form id="itemQuickForm" class="form-material form-horizontal" action="{{ route('scholarship-school.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">
                                    @lang('Name') <b class="ambitious-crimson">*</b>
                                </label>
                                <input class="form-control ambitious-form-loading @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" id="name" type="text" placeholder="{{ __('Type Your School Name Here') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="school_type">
                                    @lang('Type') <b class="ambitious-crimson">*</b>
                                </label>
                                <select class="form-control ambitious-form-loading @error('school_type') is-invalid @enderror" required="required" name="school_type" id="school_type">
                                    <option value="">@lang('Select School Type')</option>
                                    <option value="Govt." {{ old('school_type') === 'Govt.' ? 'selected' : '' }}>@lang('Govt.')</option>
                                    <option value="Govt. Aided" {{ old('school_type') === 'Govt. Aided' ? 'selected' : '' }}>@lang('Govt. Aided')</option>
                                    <option value="Private" {{ old('school_type') === 'Private' ? 'selected' : '' }}>@lang('Private')</option>
                                </select>
                                @error('school_type')
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
                                <label for="village">
                                    @lang('Village') <b class="ambitious-crimson">*</b>
                                </label>
                                <select class="form-control select2" name="scholarship_village_id" id="scholarship_village_id" required>
                                    <option value="">Select Village</option>
                                    @foreach ($villages as $key => $value)
                                        <option value="{{ $key }}" {{ old('scholarship_village_id') == $key ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
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
                                    @lang('District') <b class="ambitious-crimson">*</b>
                                </label>
                                <input class="form-control ambitious-form-loading @error('district') is-invalid @enderror" name="district" value="{{ old('district') }}" id="district" type="text" placeholder="{{ __('Type Your District Name Here') }}" required>
                                @error('district')
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
                                <input class="form-control ambitious-form-loading @error('website') is-invalid @enderror" name="website" value="{{ old('website') }}" id="website" type="text" placeholder="@lang('Enter Website')">
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
                                <input class="form-control ambitious-form-loading @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="email" type="email" placeholder="@lang('Type Your Email Here')">
                                @error('email')
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
                                <input type="hidden" name="description" value="{{ old('description') }}" id="description">
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
                                    <option value="1" {{ old('status') === 1 ? 'selected' : '' }}>@lang('Active')</option>
                                    <option value="0" {{ old('status') === 0 ? 'selected' : '' }}>@lang('Inactive')</option>
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
                                <a href="{{ route('scholarship-school.index') }}" class="btn btn-outline btn-warning btn-lg" style="float:right">@lang('Cancel')</a>
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
