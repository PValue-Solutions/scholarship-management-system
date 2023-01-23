<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Company;
use App\Models\Scholarship;
use App\Models\ScholarshipYear;
use App\Models\ScholarshipVillage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScholarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $villages = ScholarshipVillage::where('company_id', session('company_id'))->where('status', 1)->orderBy('name')->pluck('name', 'id');
        return view('scholarships.create', compact('number','years','villages'));
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

        DB::table('settings')->where('company_id', $company->id)
                ->where('key', 'general.invoice_number_next')
                ->update(['value' => $next]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Scholarship $scholarship)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scholarship $scholarship)
    {
        //
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
