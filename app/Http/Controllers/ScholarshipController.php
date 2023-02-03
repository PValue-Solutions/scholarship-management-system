<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Models\Company;
use App\Models\Scholarship;
use App\Models\ScholarshipClass;
use App\Models\ScholarshipYear;
use App\Models\ScholarshipVillage;
use App\Models\ScholarshipSchool;
use App\Models\ScholarshipCollege;
use App\Models\ScholarshipBankDetail;
use App\Models\StudentDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScholarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->export)
            return $this->doExport($request);
        $scholarships = $this->filter($request)->paginate(10);
        $villages = ScholarshipVillage::where('company_id', session('company_id'))->where('status', 1)->orderBy('name')->pluck('name', 'id');
        $schools = ScholarshipSchool::where('company_id', session('company_id'))->where('status', 1)->orderBy('name')->pluck('name', 'id');
        $colleges = ScholarshipCollege::where('company_id', session('company_id'))->where('status', 1)->orderBy('name')->pluck('name', 'id');
        return view('scholarships.index', compact('scholarships','villages','schools','colleges'));
    }

    private function filter(Request $request)
    {
        $query = Scholarship::with(['studentDetail'])
        ->whereHas('studentDetail', function ($q) use ($request) {
            $q->where('company_id', session('company_id'));
            if ($request->scholarship_village_id)
                $q->where('scholarship_village_id', 'like', $request->scholarship_village_id . '%');
        })
        ->where('company_id', session('company_id'))->latest();

        if ($request->application_no)
            $query->where('application_no', 'like', '%'.$request->application_no.'%');
        if ($request->year)
            $query->where('year', 'like', '%'.$request->year.'%');
        if ($request->school_or_college)
            $query->where('school_or_college', 'like', $request->school_or_college);
        if ($request->scholarship_school_id)
            $query->where('scholarship_school_id', 'like', $request->scholarship_school_id);
        if ($request->scholarship_college_id)
            $query->where('scholarship_college_id', 'like', $request->scholarship_college_id);

        return $query;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = Company::findOrFail(Session::get('company_id'));
        $company->setSettings();
        $number = $this->getNextInvoiceNumber($company);
        $years = ScholarshipYear::where('company_id', session('company_id'))->where('status', 1)->orderBy('name')->pluck('name', 'id');
        $classes = ScholarshipClass::where('company_id', session('company_id'))->where('status', 1)->orderBy('name')->pluck('name', 'id');
        $villages = ScholarshipVillage::where('company_id', session('company_id'))->where('status', 1)->orderBy('name')->pluck('name', 'id');
        $schools = ScholarshipSchool::where('company_id', session('company_id'))->where('status', 1)->orderBy('name')->pluck('name', 'id');
        $colleges = ScholarshipCollege::where('company_id', session('company_id'))->where('status', 1)->orderBy('name')->pluck('name', 'id');
        return view('scholarships.create', compact('number','years','classes','villages','schools','colleges'));
    }

        /**
     * Generate next invoice number
     *
     * @return string
     */
    public function getNextInvoiceNumber($company)
    {
        $prefix = $company->invoice_number_prefix;
        $next = $company->invoice_number_next;
        $digit = $company->invoice_number_digit;
        $number = $prefix . str_pad($next, $digit, '0', STR_PAD_LEFT);
        return $number;
    }

    /**
     * Increase the next invoice number
     */
    public function increaseNextInvoiceNumber($company)
    {
        $currentInvoice = $company->invoice_number_next;
        $next = $currentInvoice + 1;

        DB::table('settings')->where('company_id', $company->id)->where('key', 'general.invoice_number_next')->update(['value' => $next]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'application_no' => ['required', 'string', 'max:255'],
            'year' => ['required', 'string', 'max:255'],
            'annual_income' => ['required', 'numeric'],
            'percentage_marks_obtained' => ['required', 'numeric'],
            'full_name' => ['required', 'string', 'max:255'],
            'father_name' => ['required', 'string', 'max:255'],
            'father_occupation' => ['required', 'string', 'max:255'],
            'mother_name' => ['required', 'string', 'max:255'],
            'mother_occupation' => ['required', 'string', 'max:255'],
            'house_no' => ['required', 'string', 'max:255'],
            'scholarship_village_id' => ['required', 'numeric'],
            'street' => ['required', 'string', 'max:255'],
            'post_office' => ['required', 'string', 'max:255'],
            'taluk' => ['required', 'string', 'max:255'],
            'district' => ['required', 'string', 'max:255'],
            'pincode' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required', 'date'],
            'contact_no_1' => ['required', 'string', 'max:255'],
            'contact_no_2' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'in:male,female'],
            'age' => ['required', 'numeric'],
            'aadhar_no' => ['required', 'string', 'max:255'],
            'school_or_college' => ['required', 'in:1,2'],
            'school_or_college' => ['required', 'in:1,2'],
            'school_year' => ['required', 'numeric'],
            'school_grade' => ['required', 'numeric'],
            'school_contact_person' => ['required', 'string', 'max:255'],
            'school_designation' => ['required', 'in:Principal,Head,Teacher'],
            'school_contact_number' => ['required', 'string', 'max:255'],
            'marks_obtained_type' => ['required', 'in:SSLC,PUC,Degree'],
            'marks_obtained' => ['required', 'string', 'max:255'],
            'further_education_details_school_or_college' => ['required', 'in:1,2'],
            'further_education_details_course_joined' => ['required', 'string', 'max:255'],
            'bank_name' => ['required', 'string', 'max:255'],
            'branch' => ['required', 'string', 'max:255'],
            'account_holder_name' => ['required', 'string', 'max:255'],
            'account_no' => ['required', 'numeric'],
            'ifsc_code' => ['required', 'string', 'max:255'],
            'status' => ['required', 'in:Self,Father,Mother,Teacher'],
            'fee_amount' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date'],
            'given_information' => ['required', 'in:1,0'],
            'any_other_scholarship' => ['required', 'in:1,0'],
            'scholarship_refunded' => ['required', 'in:1,0'],
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:6048'],
            'income_certificate' => ['required', 'mimes:pdf', 'max:6048'],
            'id_proof' => ['required', 'mimes:pdf', 'max:6048'],
            'previous_educational_marks_card' => ['required', 'mimes:pdf', 'max:6048'],
            'bank_passbook' => ['required', 'mimes:pdf', 'max:6048'],
            'original_fee_receipt' => ['required', 'mimes:pdf', 'max:6048'],
        ]);
        if ($request->school_or_college == '1') {
            $request->validate(['scholarship_school_id' => ['required', 'string','max:255'],]);
        }
        if ($request->school_or_college == '2') {
            $request->validate(['scholarship_college_id' => ['required', 'string','max:255'],]);
        }
        if ($request->marks_obtained_type == 'PUC' || $request->marks_obtained_type == 'Degree') {
            $request->validate(['marks_subject' => ['required', 'string','max:255'],]);
        }
        if ($request->further_education_details_school_or_college == '1') {
            $request->validate(['further_education_details_scholarship_school_id' => ['required', 'string','max:255'],]);
        }
        if ($request->further_education_details_school_or_college == '2') {
            $request->validate(['further_education_details_scholarship_college_id' => ['required', 'string','max:255'],]);
        }


        DB::beginTransaction();
        try
        {
            $company = Company::findOrFail(Session::get('company_id'));
            $company->setSettings();
            $studentDetail = StudentDetail::create([
                'user_id' => Auth::user()->id,
                'full_name' => $request->full_name,
                'father_name' => $request->father_name,
                'father_occupation' => $request->father_occupation,
                'mother_name' => $request->mother_name,
                'mother_occupation' => $request->mother_occupation,
                'house_no' => $request->house_no,
                'scholarship_village_id' => $request->scholarship_village_id,
                'street' => $request->street,
                'post_office' => $request->post_office,
                'taluk' => $request->taluk,
                'district' => $request->district,
                'pincode' => $request->pincode,
                'state' => $request->state,
                'contact_no_1' => $request->contact_no_1,
                'contact_no_2' => $request->contact_no_2,
                'date_of_birth' => $request->date_of_birth,
                'age' => $request->age,
                'gender' => $request->gender,
                'aadhar_no' => $request->aadhar_no
            ]);

            $scholarshipBankDetail = ScholarshipBankDetail::create([
                'user_id' => Auth::user()->id,
                'bank_name' => $request->bank_name,
                'branch' => $request->branch,
                'account_holder_name' => $request->account_holder_name,
                'account_no' => $request->account_no,
                'ifsc_code' => $request->ifsc_code,
                'status' => $request->status,
            ]);

            $scholarship = Scholarship::create([
                'user_id' => Auth::user()->id,
                'application_no' => $request->application_no,
                'year' => $request->year,
                'annual_income' => $request->annual_income,
                'percentage_marks_obtained' => $request->percentage_marks_obtained,
                'student_detail_id' => $studentDetail->id,
                'school_or_college' => $request->school_or_college,
                'scholarship_school_id' => $request->scholarship_school_id,
                'scholarship_college_id' => $request->scholarship_college_id,
                'school_year' => $request->school_year,
                'school_grade' => $request->school_grade,
                'school_contact_person' => $request->school_contact_person,
                'school_designation' => $request->school_designation,
                'school_contact_number' => $request->school_contact_number,
                'marks_obtained_type' => $request->marks_obtained_type,
                'marks_subject' => $request->marks_subject,
                'marks_obtained' => $request->marks_obtained,
                'further_education_details_school_or_college' => $request->further_education_details_school_or_college,
                'further_education_details_scholarship_school_id' => $request->further_education_details_scholarship_school_id,
                'further_education_details_scholarship_college_id' => $request->further_education_details_scholarship_college_id,
                'further_education_details_course_joined' => $request->further_education_details_course_joined,
                'fee_amount' => $request->fee_amount,
                'date' => $request->date,
                'given_information' => $request->given_information,
                'any_other_scholarship' => $request->any_other_scholarship,
                'scholarship_bank_detail_id' => $scholarshipBankDetail->id,
                'scholarship_refunded' => $request->scholarship_refunded,
                'photo' => $request->photo->store('scholarship'),
                'income_certificate' => $request->income_certificate->store('scholarship'),
                'id_proof' => $request->id_proof->store('scholarship'),
                'previous_educational_marks_card' => $request->previous_educational_marks_card->store('scholarship'),
                'bank_passbook' => $request->bank_passbook->store('scholarship'),
                'original_fee_receipt' => $request->original_fee_receipt->store('scholarship'),
            ]);
            // Update next invoice number
            $this->increaseNextInvoiceNumber($company);
            DB::commit();
            Session::flash('successMessage', 1);
            echo json_encode(array("status" => 1));

        } catch (Exception $e) {
            DB::rollback();
            Session::flash('errorMessage', 1);
            echo json_encode(array("status" => 0));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function show(Scholarship $scholarship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function edit($id = 0)
    {
        if($id != 0){
            $scholarship = Scholarship::with(['studentDetail', 'scholarshipBankDetail','scholarshipVillage'])->findOrFail($id);
            $company = Company::findOrFail(Session::get('company_id'));
            $company->setSettings();
            $number = $this->getNextInvoiceNumber($company);
            $years = ScholarshipYear::where('company_id', session('company_id'))->where('status', 1)->orderBy('name')->pluck('name', 'id');
            $classes = ScholarshipClass::where('company_id', session('company_id'))->where('status', 1)->orderBy('name')->pluck('name', 'id');
            $villages = ScholarshipVillage::where('company_id', session('company_id'))->where('status', 1)->orderBy('name')->pluck('name', 'id');
            $schools = ScholarshipSchool::where('company_id', session('company_id'))->where('status', 1)->orderBy('name')->pluck('name', 'id');
            $colleges = ScholarshipCollege::where('company_id', session('company_id'))->where('status', 1)->orderBy('name')->pluck('name', 'id');
            return view('scholarships.edit', compact('scholarship','number','years','classes','villages','schools','colleges'));
        } else {
            return false;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scholarship $scholarship)
    {
        //
    }
}
