@extends('layouts.layout')
@section('one_page_js')
    <script src="{{ asset('plugins/dropify/dist/js/dropify.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('plugins/steps/js/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('plugins/steps/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('plugins/validation/additional-methods.min.js') }}"></script>
    <script src="{{ asset('js/flatpickr.js') }}"></script>
@endsection

@section('one_page_css')
    <link href="{{ asset('plugins/dropify/dist/css/dropify.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/steps/css/jquery.steps.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/steps/css/steps.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flatpickr.min.css') }}" rel="stylesheet">
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
                                    <input id="application_no" class="form-control @if($errors->has('application_no')) is-invalid @endif" name="application_no" type="text" value="{{ old('application_no') }}" required >
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

                    <h6>{{ __('Company Information') }}</h6>
                    <section>
                        <input type="hidden" id="company" name="company" value="{{Session::get('companyInfo')}}">
                        <div class="form-group row">
                            <div class="col-md-2 ambitious-model-from-tc-pt" for="branch"><b>{{ __('Branch') }}</b> <b class="ambitious-crimson">*</b></div>
                            <div class="col-md-4">
                                <select id="branch" class="custom-select form-control required" name="branch" value="{{ old('branch') }}">
                                    <option value="">{{ __('Select Branch') }}</option>

                                </select>
                                @if ($errors->has('branch'))
                                    {{ Session::flash('error',$errors->first('branch')) }}
                                @endif
                            </div>
                            <div class="col-md-2 ambitious-model-from-tc-pt" for="gender"><b>{{ __('Department') }}</b> <b class="ambitious-crimson">*</b></div>
                            <div class="col-md-4">
                                <select id="department" class="custom-select form-control required" name="department" value="{{ old('department') }}">
                                    <option value="">{{ __('Select Department') }}</option>

                                </select>
                                @if ($errors->has('department'))
                                    {{ Session::flash('error',$errors->first('department')) }}
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-2 ambitious-model-from-tc-pt" for="gender"><b>{{ __('Designation') }}</b> <b class="ambitious-crimson">*</b></div>
                            <div class="col-md-4">
                                <select id="designation" class="custom-select form-control required" name="designation" value="{{ old('designation') }}">
                                    <option value="">{{ __('Select Designation') }}</option>

                                </select>
                                @if ($errors->has('designation'))
                                    {{ Session::flash('error',$errors->first('designation')) }}
                                @endif
                            </div>

                            <div class="col-md-2 ambitious-model-from-tc-pt" for="e_id"><b>{{ __('Employee Id') }}</b> <b class="ambitious-crimson">*</b></div>
                            <div class="col-md-4">
                                <input id="e_id" class="form-control" name="e_id" type="text" value="{{ old('e_id') }}" autocomplete="off" required>
                                @if ($errors->has('e_id'))
                                    {{ Session::flash('error',$errors->first('e_id')) }}
                                @endif
                            </div>

                        </div>
                        <div class="form-group row">

                            <div class="col-md-2 ambitious-model-from-tc-pt" for="job_type"><b>{{ __('Job Type') }}</b> <b class="ambitious-crimson">*</b></div>
                            <div class="col-md-4">
                                <select id="job_type" class="custom-select form-control required" name="job_type" value="{{ old('job_type') }}">
                                    <option value="Permanent">{{ __('Permanent') }}</option>
                                    <option value="Part Time">{{ __('Part Time') }}</option>
                                    <option value="Contract">{{ __('Contract') }}</option>
                                </select>
                                @if ($errors->has('job_type'))
                                    {{ Session::flash('error',$errors->first('job_type')) }}
                                @endif
                            </div>

                            <div class="col-md-2 ambitious-model-from-tc-pt" for="joining_date"><b>{{ __('Joining Date') }}</b> <b class="ambitious-crimson">*</b></div>
                            <div class="col-md-4">
                                <input id="joining_date" class="form-control datepicker ambitious-background-white" name="joining_date" type="text" value="{{ old('joining_date') }}" autocomplete="off" placeholder="04-11-2019" required>
                                @if ($errors->has('joining_date'))
                                    {{ Session::flash('error',$errors->first('joining_date')) }}
                                @endif
                            </div>

                        </div>

                        <div class="form-group row">

                            <div class="col-md-2 ambitious-model-from-tc-pt" for="sallary"><b>{{ __('Salary') }}</b> <b class="ambitious-crimson">*</b></div>
                            <div class="col-md-4">
                                <select id="sallary" class="custom-select form-control required" name="sallary" value="{{ old('sallary') }}">
                                    <option value="">{{ __('Select Salary') }}</option>
                                </select>
                                @if ($errors->has('sallary'))
                                    {{ Session::flash('error',$errors->first('sallary')) }}
                                @endif
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
                if(marks < 65 && marks <= 100) {
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
