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
                    <li class="breadcrumb-item active">@lang('Create Scholarship')</li>
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
                <h3>@lang('Create Scholarship')</h3>
            </div>
            <div class="card-body wizard-content">
                <form enctype="multipart/form-data" action="#" id="scholarship_create_form" class="validation-wizard wizard-circle mt-5" method="post">
                    <!-- Step 1 -->
                    <h6>{{ __('Basic') }}</h6>
                    <section>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="application_no">
                                        {{ __('Application No') }} <b class="ambitious-crimson">*</b>
                                    </label>
                                    <input id="application_no" class="form-control @if($errors->has('application_no')) is-invalid @endif" name="application_no" type="text" value="{{ old('application_no', $number) }}" required readonly>
                                    @error('application_no')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="year">
                                        {{ __('Year') }} <b class="ambitious-crimson">*</b>
                                    </label>
                                    <input id="year" class="form-control" name="year" type="text" value="{{ old('year', date("Y")) }}" required readonly>
                                    @if ($errors->has('year'))
                                        {{ Session::flash('error',$errors->first('year')) }}
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="annual_income">
                                        {{ __('Annual Income') }} <b class="ambitious-crimson">*</b>
                                    </label>
                                    <input id="annual_income" class="form-control @if($errors->has('annual_income')) is-invalid @endif" name="annual_income" type="number" value="{{ old('annual_income') }}" placeholder="Annual Income Of Your Glargine" required>
                                    @if ($errors->has('annual_income'))
                                        {{ Session::flash('error',$errors->first('annual_income')) }}
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="percentage_marks_obtained">
                                        {{ __('Last Examination Marks') }} <b class="ambitious-crimson">*</b>
                                    </label>
                                    <input id="percentage_marks_obtained" class="form-control @if($errors->has('percentage_marks_obtained')) is-invalid @endif" name="percentage_marks_obtained" type="number" value="{{ old('percentage_marks_obtained') }}" placeholder="Percentage Marks In Your Last Examination" required>
                                    @if ($errors->has('percentage_marks_obtained'))
                                        {{ Session::flash('error',$errors->first('percentage_marks_obtained')) }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </section>

                    <h6>{{ __('Personal Details') }}</h6>
                    <section>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="father_name">
                                        {{ __('Father Name') }} <b class="ambitious-crimson">*</b>
                                    </label>
                                    <input id="father_name" class="form-control @if($errors->has('father_name')) is-invalid @endif" name="father_name" type="text" value="{{ old('father_name') }}" placeholder="Type Your Father Name" required>
                                    @if ($errors->has('father_name'))
                                        {{ Session::flash('error',$errors->first('father_name')) }}
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="father_occupation">
                                        {{ __('Father Occupation') }} <b class="ambitious-crimson">*</b>
                                    </label>
                                    <input id="father_occupation" class="form-control @if($errors->has('father_occupation')) is-invalid @endif" name="father_occupation" type="text" value="{{ old('father_occupation') }}" placeholder="Type Your Father Occupation" required>
                                    @if ($errors->has('father_occupation'))
                                        {{ Session::flash('error',$errors->first('father_occupation')) }}
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mother_name">
                                        {{ __('Mother Name') }} <b class="ambitious-crimson">*</b>
                                    </label>
                                    <input id="mother_name" class="form-control @if($errors->has('mother_name')) is-invalid @endif" name="mother_name" type="text" value="{{ old('mother_name') }}" placeholder="Type Your Mother Name" required>
                                    @if ($errors->has('mother_name'))
                                        {{ Session::flash('error',$errors->first('mother_name')) }}
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mother_occupation">
                                        {{ __('Father Occupation') }} <b class="ambitious-crimson">*</b>
                                    </label>
                                    <input id="mother_occupation" class="form-control @if($errors->has('mother_occupation')) is-invalid @endif" name="mother_occupation" type="text" value="{{ old('mother_occupation') }}" placeholder="Type Your Mother Occupation" required>
                                    @if ($errors->has('mother_occupation'))
                                        {{ Session::flash('error',$errors->first('mother_occupation')) }}
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="house_no">
                                        {{ __('House No.') }} <b class="ambitious-crimson">*</b>
                                    </label>
                                    <input id="house_no" class="form-control @if($errors->has('house_no')) is-invalid @endif" name="house_no" type="text" value="{{ old('house_no') }}" placeholder="Type Your House No" required>
                                    @if ($errors->has('house_no'))
                                        {{ Session::flash('error',$errors->first('house_no')) }}
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="scholarship_village_id">
                                        {{ __('Village') }} <b class="ambitious-crimson">*</b>
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
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="street">
                                        {{ __('Street') }} <b class="ambitious-crimson">*</b>
                                    </label>
                                    <input id="street" class="form-control @if($errors->has('street')) is-invalid @endif" name="street" type="text" value="{{ old('street') }}" placeholder="Type Your Street" required>
                                    @if ($errors->has('street'))
                                        {{ Session::flash('error',$errors->first('street')) }}
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="post_office">
                                        {{ __('Post Office') }} <b class="ambitious-crimson">*</b>
                                    </label>
                                    <input id="post_office" class="form-control @if($errors->has('post_office')) is-invalid @endif" name="post_office" type="text" value="{{ old('post_office') }}" placeholder="Type Your Post Office" required>
                                    @if ($errors->has('post_office'))
                                        {{ Session::flash('error',$errors->first('post_office')) }}
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="taluk">
                                        {{ __('Taluk') }} <b class="ambitious-crimson">*</b>
                                    </label>
                                    <input id="taluk" class="form-control @if($errors->has('taluk')) is-invalid @endif" name="taluk" type="text" value="{{ old('taluk') }}" placeholder="Type Your Taluk" required>
                                    @if ($errors->has('taluk'))
                                        {{ Session::flash('error',$errors->first('taluk')) }}
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="district">
                                        {{ __('District') }} <b class="ambitious-crimson">*</b>
                                    </label>
                                    <input id="district" class="form-control @if($errors->has('district')) is-invalid @endif" name="district" type="text" value="{{ old('district') }}" placeholder="Type Your District" required>
                                    @if ($errors->has('district'))
                                        {{ Session::flash('error',$errors->first('district')) }}
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="pincode">
                                        {{ __('Pincode') }} <b class="ambitious-crimson">*</b>
                                    </label>
                                    <input id="pincode" class="form-control @if($errors->has('pincode')) is-invalid @endif" name="pincode" type="text" value="{{ old('pincode') }}" placeholder="Type Your Pincode" required>
                                    @if ($errors->has('pincode'))
                                        {{ Session::flash('error',$errors->first('pincode')) }}
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="state">
                                        {{ __('Pincode') }} <b class="ambitious-crimson">*</b>
                                    </label>
                                    <input id="state" class="form-control @if($errors->has('state')) is-invalid @endif" name="state" type="text" value="{{ old('state') }}" placeholder="Type Your State" required>
                                    @if ($errors->has('state'))
                                        {{ Session::flash('error',$errors->first('state')) }}
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="date_of_birth">@lang('Date of Birth') <b class="ambitious-crimson">*</b></label>
                                    <input type="text" name="date_of_birth" id="date_of_birth" class="form-control flatpickr @error('date_of_birth') is-invalid @enderror" placeholder="@lang('Date of Birth')" required>
                                    @if ($errors->has('date_of_birth'))
                                        {{ Session::flash('error',$errors->first('date_of_birth')) }}
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="contact_no_1">
                                        {{ __('Contact No 1') }} <b class="ambitious-crimson">*</b>
                                    </label>
                                    <input id="contact_no_1" class="form-control @if($errors->has('contact_no_1')) is-invalid @endif" name="contact_no_1" type="text" value="{{ old('contact_no_1') }}" placeholder="Type Your Contact No 1" required>
                                    @if ($errors->has('contact_no_1'))
                                        {{ Session::flash('error',$errors->first('contact_no_1')) }}
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="contact_no_2">
                                        {{ __('Contact No 2') }} <b class="ambitious-crimson">*</b>
                                    </label>
                                    <input id="contact_no_2" class="form-control @if($errors->has('contact_no_2')) is-invalid @endif" name="contact_no_2" type="text" value="{{ old('contact_no_2') }}" placeholder="Type Your Contact No 2" required>
                                    @if ($errors->has('contact_no_2'))
                                        {{ Session::flash('error',$errors->first('contact_no_2')) }}
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="gender">@lang('Gender') <b class="ambitious-crimson">*</b></label>
                                    <select name="gender" class="form-control @error('gender') is-invalid @enderror" id="gender" required>
                                        <option value="">--@lang('Select')--</option>
                                        <option value="male" {{ old('gender') === 'male' ? 'selected' : '' }}>@lang('Male')</option>
                                        <option value="female" {{ old('gender') === 'female' ? 'selected' : '' }}>@lang('Female')</option>
                                    </select>
                                    @if ($errors->has('gender'))
                                        {{ Session::flash('error',$errors->first('gender')) }}
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="age">
                                        {{ __('Age') }} <b class="ambitious-crimson">*</b>
                                    </label>
                                    <input id="age" class="form-control @if($errors->has('age')) is-invalid @endif" name="age" type="text" value="{{ old('age') }}" placeholder="Type Your Age" required>
                                    @if ($errors->has('age'))
                                        {{ Session::flash('error',$errors->first('age')) }}
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="aadhar_no">
                                        {{ __('Aadhar No') }} <b class="ambitious-crimson">*</b>
                                    </label>
                                    <input id="aadhar_no" class="form-control @if($errors->has('aadhar_no')) is-invalid @endif" name="aadhar_no" type="text" value="{{ old('aadhar_no') }}" placeholder="Type Aadhar No" required>
                                    @if ($errors->has('aadhar_no'))
                                        {{ Session::flash('error',$errors->first('aadhar_no')) }}
                                    @endif
                                </div>
                            </div>
                        </div>




                    </section>
                    <!-- Step 4 -->


                    <!-- Step 3 -->
                    <h6>{{ __('Emergency Contact') }}</h6>
                    <section>
                        <div class="form-group row">
                            <div class="col-md-2 ambitious-model-from-tc-pt" for="emergency_contact_name"><b>{{ __('Contact Name') }}</b></div>
                            <div class="col-md-10">
                                <input id="emergency_contact_name" class="form-control" name="emergency_contact_name" type="text"  value="{{ old('emergency_contact_name') }}" autocomplete="off" placeholder="Emergency Contact Name">
                                @if ($errors->has('emergency_contact_name'))
                                    {{ Session::flash('error',$errors->first('emergency_contact_name')) }}
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2 ambitious-model-from-tc-pt" for="emergency_contact_number"><b>{{ __('Contact Number') }}</b></div>
                            <div class="col-md-4">
                                <input id="emergency_contact_number" class="form-control" name="emergency_contact_number" type="text"  value="{{ old('emergency_contact_number') }}" autocomplete="off" placeholder="Emergency Contact Number">
                                @if ($errors->has('emergency_contact_number'))
                                    {{ Session::flash('error',$errors->first('emergency_contact_number')) }}
                                @endif
                            </div>

                            <div class="col-md-2 ambitious-model-from-tc-pt" for="emergency_contact_relation"><b>{{ __('Contact Relation') }}</b></div>
                            <div class="col-md-4">
                                <input id="emergency_contact_relation" class="form-control" name="emergency_contact_relation" type="text" value="{{ old('emergency_contact_relation') }}" autocomplete="off" placeholder="Emergency Contact Relation">
                                @if ($errors->has('emergency_contact_relation'))
                                    {{ Session::flash('error',$errors->first('emergency_contact_relation')) }}
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2 ambitious-model-from-tc-pt" for="emergency_contact_note"><b>{{ __('Contact Note') }}</b></div>
                            <div class="col-md-10">
                                <textarea id="emergency_contact_note" class="form-control" name="emergency_contact_note" rows="5" placeholder="Emergency contact note">{{ old('emergency_contact_note') }}</textarea>
                            </div>
                            @if ($errors->has('emergency_contact_note'))
                                {{ Session::flash('error',$errors->first('emergency_contact_note')) }}
                            @endif
                        </div>

                    </section>
                    <h6>{{ __('Files') }}</h6>
                    <section>
                        <div class="form-group row">
                            <div class="col-md-2 ambitious-model-from-tc-pt"><b>{{ __('Resume') }}</b></div>
                            <div class="col-md-4">
                                {{ __('Max Size 250kb') }}
                                <input id="resume" class="dropify" name="resume" type="file" value="{{ old('resume') }}" data-allowed-file-extensions="pdf doc docx" data-max-file-size="250K"/>
                                @if ($errors->has('resume'))
                                    <div class="error ambitious-red">{{ $errors->first('resume') }}</div>
                                @endif
                            </div>

                            <div class="col-md-2 ambitious-model-from-tc-pt"><b>{{ __('Offer Letter') }}</b></div>
                            <div class="col-md-4">
                                {{ __('Max Size 250kb') }}
                                <input id="offer_letter" class="dropify" name="offer_letter" type="file" value="{{ old('offer_letter') }}" data-allowed-file-extensions="pdf doc docx" data-max-file-size="250K"/>
                                @if ($errors->has('offer_letter'))
                                    <div class="error ambitious-red">{{ $errors->first('offer_letter') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2 ambitious-model-from-tc-pt"><b>{{ __('Joining Letter') }}</b></div>
                            <div class="col-md-4">
                                {{ __('Max Size 250kb') }}
                                <input id="joining_letter" class="dropify" name="joining_letter" type="file" value="{{ old('joining_letter') }}" data-allowed-file-extensions="pdf doc docx" data-max-file-size="250K"/>
                                @if ($errors->has('joining_letter'))
                                    <div class="error ambitious-red">{{ $errors->first('joining_letter') }}</div>
                                @endif
                            </div>

                            <div class="col-md-2 ambitious-model-from-tc-pt"><b>{{ __('Contract Agreement') }}</b></div>
                            <div class="col-md-4">
                                {{ __('Max Size 250kb') }}
                                <input id="contract_and_agreement" class="dropify" name="contract_and_agreement" type="file" value="{{ old('contract_and_agreement') }}" data-allowed-file-extensions="pdf doc docx" data-max-file-size="250K"/>
                                @if ($errors->has('contract_and_agreement'))
                                    <div class="error ambitious-red">{{ $errors->first('contract_and_agreement') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2 ambitious-model-from-tc-pt"><b>{{ __('Identity Proof') }}</b></div>
                            <div class="col-md-4">
                                {{ __('Max Size 250kb') }}
                                <input id="identity_proof" class="dropify" name="identity_proof" type="file" value="{{ old('identity_proof') }}" data-allowed-file-extensions="pdf doc docx" data-max-file-size="250K"/>
                                @if ($errors->has('identity_proof'))
                                    <div class="error ambitious-red">{{ $errors->first('identity_proof') }}</div>
                                @endif
                            </div>
                        </div>

                    </section>
                    <!-- Step 5 -->
                    <h6>{{ __('Account Information') }}</h6>
                    <section>
                        <div class="form-group row">
                            <div class="col-md-2 ambitious-model-from-tc-pt" for="email"><b>{{ __('Email') }} </b><b class="ambitious-crimson"> *</b></div>
                            <div class="col-md-10">
                                <input id="email" class="form-control" name="email" type="email" value="{{ old('email') }}" autocomplete="off" required>
                                @if ($errors->has('email'))
                                    {{ Session::flash('error',$errors->first('email')) }}
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2 ambitious-model-from-tc-pt" for="password"><b>{{ __('Password') }} </b><b class="ambitious-crimson"> *</b></div>
                            <div class="col-md-10">
                                <input id="password" class="form-control" name="password" type="password" value="{{ old('password') }}" autocomplete="off" required>
                                @if ($errors->has('password'))
                                    {{ Session::flash('error',$errors->first('password')) }}
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2 ambitious-model-from-tc-pt" for="confirm_password"><b>{{ __('Confirm Password') }} </b><b class="ambitious-crimson"> *</b></div>
                            <div class="col-md-10">
                                <input id="confirm_password" class="form-control" name="confirm_password" type="password" value="{{ old('confirm_password') }}" autocomplete="off" required>
                                @if ($errors->has('confirm_password'))
                                    {{ Session::flash('error',$errors->first('confirm_password')) }}
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2 ambitious-model-from-tc-pt" for="roles"><b>{{ __('Role') }}</b></div>
                            <div class="col-md-10">
                                <select id="roles" class="form-control required" name="roles" value="{{ old('roles') }}">

                                </select>
                                @if ($errors->has('roles'))
                                    {{ Session::flash('error',$errors->first('roles')) }}
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2 ambitious-model-from-tc-pt" for="bank_name"><b>{{ __('Bank Name') }}</b></div>
                            <div class="col-md-4">
                                <input id="bank_name" class="form-control" name="bank_name" type="text" value="{{ old('bank_name') }}" autocomplete="off">
                                @if ($errors->has('bank_name'))
                                    {{ Session::flash('error',$errors->first('bank_name')) }}
                                @endif
                            </div>

                            <div class="col-md-2 ambitious-model-from-tc-pt" for="branch_name"><b>{{ __('Branch Name') }}</b></div>
                            <div class="col-md-4">
                                <input id="branch_name" class="form-control" name="branch_name" type="text" value="{{ old('branch_name') }}" autocomplete="off">
                                @if ($errors->has('branch_name'))
                                    {{ Session::flash('error',$errors->first('branch_name')) }}
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2 ambitious-model-from-tc-pt" for="account_name"><b>{{ __('Account Name') }}</b></div>
                            <div class="col-md-4">
                                <input id="account_name" class="form-control" name="account_name" type="text" value="{{ old('account_name') }}" autocomplete="off">
                                @if ($errors->has('account_name'))
                                    {{ Session::flash('error',$errors->first('account_name')) }}
                                @endif
                            </div>

                            <div class="col-md-2 ambitious-model-from-tc-pt" for="account_number"><b>{{ __('Account Number') }}</b></div>
                            <div class="col-md-4">
                                <input id="account_number" class="form-control" name="account_number" type="text" value="{{ old('account_number') }}" autocomplete="off">
                                @if ($errors->has('account_number'))
                                    {{ Session::flash('error',$errors->first('account_number')) }}
                                @endif
                            </div>
                        </div>
                    </section>
                </form>
            </div>
        </div>





    </div>
</div>
<script src="{{ asset('plugins/sweetalert/sweetalert.min.js') }}"></script>
<script>

    $(document).ready(function() {
        $(".flatpickr").flatpickr({
            enableTime: false
        });
    });


    var form = $(".validation-wizard").show();

    $(".validation-wizard").steps({
        headerTag: "h6",
        bodyTag: "section",
        transitionEffect: "fade",
        titleTemplate: '<span class="step">#index#</span> #title#',
        labels: {
            finish: "Submit"
        },
        onStepChanging: function(event, currentIndex, newIndex) {
            var itemName = "{{ $ApplicationSetting->item_name  }}";
            if(currentIndex == 0) {
                var percentage_marks_obtained = $("#percentage_marks_obtained").val();

                var marks = Number(percentage_marks_obtained);

                if(marks == 0) {
                    Swal.fire(
                        itemName,
                        '{{ __('Please Give Your Last Examination Marks') }}',
                        'warning'
                    );
                }

                if(marks > 0 && marks < 65 && marks <= 100) {
                    Swal.fire(
                            itemName,
                            '{{ __('You Are Not Eligible For The Scholarship') }}',
                            'warning'
                        ).then(function() {
                            document.location.href="{{ route('dashboard') }}";
                        });
                    return false;
                }
            }

            return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
        },
        onFinishing: function(event, currentIndex) {
            return form.validate().settings.ignore = ":disabled", form.valid()
        },
        onFinished: function(event, currentIndex) {
            var itemName = "{{ $ApplicationSetting->item_name  }}";
            var queryString = new FormData($("#scholarship_create_form")[0]);
            $.ajax({
                url: '#',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                type:'POST',
                data:queryString,
                dataType : 'JSON',
                cache: false,
                contentType: false,
                processData: false,
                success:function(response){
                    if(response.status==0){
                        Swal.fire(
                            itemName,
                            '{{ __('Oops Something Wrong') }}',
                            'warning'
                        ).then(function() {
                            document.location.href="#";
                        });
                    }
                    else {
                        Swal.fire(
                          itemName,
                          '{{ __('User Created Successfully') }}',
                          'success'
                        ).then(function() {
                            document.location.href="#";
                        });
                    }
                }
            });
        }
    }), $(".validation-wizard").validate({
        ignore: "input[type=hidden]",
        errorClass: "text-danger",
        successClass: "text-success",
        highlight: function(element, errorClass) {
            $(element).removeClass(errorClass)
        },
        unhighlight: function(element, errorClass) {
            $(element).removeClass(errorClass)
        },
        errorPlacement: function(error, element) {
            error.insertAfter(element)
        },
        rules: {
            email: {
                email: !0
            },

            password:{
                required: true,
                minlength: 6
            },
            confirm_password:{
                required: true,
                minlength: 6,
                equalTo: "#password"
            }


        }
    })
</script>
@endsection
