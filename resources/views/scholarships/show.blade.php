@extends('layouts.layout')
@section('content')
<div class="container">
  <div class="row mt-5">
        <div class="col-sm-12">
            <div class="text-center">
                <img src="{{asset('pdf/img/logo.png')}}" class="img-fluid" alt="...">
            </div>
            <p class="font-weight-bold text-justify text-center"><u>The Rotary Bangalore Midtown in association with Sansera Foundation invites application
                from Students who have secured marks in excess of 60% in 10th standard exam last held.</u></p>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-sm-4">
            <div>
                <span>Application No. : {{$scholarship->application_no}}</span>
            </div>
        </div>

        <div class="col-sm-4">
            <div>
                <span>Year : {{$scholarship->year}}</span>
            </div>
        </div>

        <div class="col-sm-4">
            <div>
                <span> Annual Income: {{$scholarship->annual_income}}</span>
            </div>
        </div>
        
    </div>

    <div class="row mt-5">
        <div class="col-sm-12">
            <h6 class="font-weight-bold">PERSONAL DETAILS:</h6>
        </div>
        <table class="table table-borderless p-0 m-0" >
            <tr>
                <td>1. Full Name : </td>
                <td> : </td>
                <td>{{$scholarship->studentDetail->full_name}}</td>
                <td rowspan="5">
                    <div class="text-right">
                        <img width="200" height="200" src="{{asset('img/profile/male.png')}}" class="rounded" alt="prfile">
                    </div>
                </td>
            </tr>
            <tr>
                <td>2. Father Name </td>
                <td>: </td>
                <td>{{$scholarship->studentDetail->father_name}}</td>
            </tr>
            <tr>
                <td><span class="ml-3">Occupation</span> </td>
                <td> : </td>
                <td>{{$scholarship->studentDetail->father_occupation}}</td>
            </tr>
            <tr>
                <td>3. Mother Name</td>
                <td> : </td>
                <td>{{$scholarship->studentDetail->mother_name}}</td>
            </tr>
            <tr>
                <td><span class="ml-3">Occupation</span></td>
                <td> : </td>
                <td> {{$scholarship->studentDetail->mother_occupation}}</td>
            </tr>
            <tr>
                <td colspan="4">4. Full Address </td>
                
            </tr>
            <tr>
                <td> <span class="ml-3">House no.</span> </td>
                <td>:</td>
                <td>{{$scholarship->studentDetail->house_no}}</td>
                <td>Street/ Cross </td>
                <td>:</td>
                <td>{{$scholarship->studentDetail->state}}</td>
            </tr>
            <tr>
                <td> <span class="ml-3">Village</span>  </td>
                <td> : </td>
                <td>{{$scholarship->studentDetail->scholarshipVillage->name}}</td>
                <td>Post office :</td>
                <td> : </td>
                <td>{{$scholarship->studentDetail->post_office}}</td>
            </tr>
            <tr>
                <td><span class="ml-3">Taluk</span>  </td>
                <td> : </td>
                <td>{{$scholarship->studentDetail->taluk}}</td>
                <td>District :</td>
                <td> : </td>
                <td>{{$scholarship->studentDetail->district}}</td>
            </tr>
            <tr>
                <td><span class="ml-3">Pin code</span> </td>
                <td> : </td>
                <td>{{$scholarship->studentDetail->pincode}}</td>
                <td>State </td>
                <td> : </td>
                <td>{{$scholarship->studentDetail->state}}</td>
            </tr>
            <tr>
                <td>5. Contact no. 1 :</td>
                <td>:</td>
                <td>{{$scholarship->studentDetail->contact_no_1}}</td>
                <td>Contact no : </td>
                <td>:</td>
                <td>{{$scholarship->studentDetail->contact_no_2}}</td>
            </tr>

            <tr>
                <td>6. Date of Birth </td>
                <td>:</td>
                <td>{{$scholarship->studentDetail->date_of_birth}}</td>
                <td>Age </td>
                <td>:</td>
                <td>{{$scholarship->studentDetail->age}}</td>
            </tr>
            <tr>
                <td>7. Male/ Female </td>
                <td>:</td>
                <td colspan="4">{{$scholarship->studentDetail->gender}}</td>
            </tr>
            <tr>
                <td>8. Aadhar no.  </td>
                <td>:</td>
                <td colspan="4">{{$scholarship->studentDetail->aadhar_no}}</td>
            </tr>
        </table>
        
    </div>

    <div class="row mt-5">
        <div class="col-sm-12">
            <h6 class="font-weight-bold"> DETAILS OF STUDIED SCHOOL / COLLEGE :</h6>
        </div>

        <table>
            <tbody class="table table-bordered">
                <tr>
                    <td>Govt. / Govt. Aided / Private</td>
                    <td>:</td>
                    <td colspan="7">sjfisdf sijdfisdjf isjdfilsdf</td>
                </tr>
                <tr>
                    <td> Village </td>
                    <td>: </td>
                    <td>sfsdfsdf</td>

                    <td> Taluk </td>
                    <td>: </td>
                    <td>sfsdfsdf</td>

                    <td> District </td>
                    <td>: </td>
                    <td>sfsdfsdf</td>
                </tr>
                <tr>
                    <td colspan="4">Marks Obtained in last Examination  SSLC/PUC/Degree</td>
                    <td> : </td>
                    <td>jkdsgjk dsgjkkl dsfgk</td>

                    <td>Year</td>
                    <td> : </td>
                    <td>yeart jkdsgjk dsgjkkl dsfgk</td>
                </tr>
                <tr>
                    <td colspan="4">If PUC / Degree please specify the subject </td>
                    <td>:</td>
                    <td colspan="4">sjfklsdjfkl</td>
                </tr>
                <tr>
                    <td>Grade/ Class</td>
                    <td>:</td>
                    <td colspan="2">fdsfdsfds</td>

                    <td colspan="2">Percentage</td>
                    <td>:</td>
                    <td colspan="2">me sdfsd sdfsdf</td>
                </tr>

                <tr>
                    <td>Contact Person:</td>
                    <td>:</td>
                    <td colspan="2">fdsfdsfds</td>
                    <td colspan="2">Designation</td>
                    <td >:</td>
                    <td colspan="2">sgsdfsd</td>
                </tr>

                <tr>
                    <td>Contact no.</td>
                    <td>:</td>
                    <td colspan="2">gdfgdfgfd</td>
                    <td colspan="2">Seal & Signature</td>
                    <td>:</td>
                    <td colspan="2">sfsd sdfsdf dsfsd</td>
                </tr>
            </tbody>
        </table>
    </div>


    <div class="row mt-5">
        <div class="col-sm-12">
            <h6 class="font-weight-bold"> FURTHER EDUCATION DETAILS :</h6>
        </div>
        <div class="col-sm-12">
           <p> Course Joined :</p>
        </div>

        <div class="col-sm-12">
           <p> College /Institute : </p>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-sm-12">
            <h6 class="font-weight-bold"> DECLARATION OF STUDENT </h6>
        </div>
        <div class="col-sm-12">
           <p> 1. I certified that the information given in above istrue and correct.</p>
           <p> 2. I am not availing any otherscholarship forthis purpose from any NGO/State/Central Govt.</p>
           <p>3. If the information given by me isfound to be false/incorrect, the scholarship sanction to me may be
            cancelled and the amount of scholarship refunded by me</p>
        </div>

        <div class="col-sm-4"><p> Date : </p></div>
        <div class="col-sm-4"><p> Student Signature  </p></div>
        <div class="col-sm-4"><p> Parents/ Guardian Signature  </p></div>
        <div class="col-sm-12"><p> Place : </p></div>
    </div>

    <div class="row mt-5">
        <div class="col-sm-12">
            <h6 class="font-weight-bold">DOCUMENTS TO BE ATTACH :</h6>
        </div>
        <div class="col-sm-12">
           <p> 1. Income certificate of Parents/ Guardian </p>
           <p> 2. Any Govt. ID proof (Aadhar, Ration card etc.) </p>
           <p> 3. Previous educational marks card </p>
           <p> 4. Original fee receipt </p>
           <p> 5. Bank passbook copy </p>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-sm-12">
            <h6 class="font-weight-bold">FOR OFFICE USE` :</h6>
        </div>
        <div class="col-sm-12">
           <p> 1. Applicant Selected / Not selected : </p>
           <p> 2. If Not selected : </p>
           <p> 3. Sanctioned amount : </p>
           <p>I, [Name of Principal], being first duly sworn, hereby state that: I am the principal of [Name of School], located at
            [Address of School]. [Student's Name], date of birth [Student's Date of Birth], is a student at [Name of School]
            and is enrolled in the [Grade Level] grade. This affidavit is being executed for the purpose of verifying [Student's
            Name]'s complete information provided above in the portal is true and attendance for the purpose of applying
            for a scholarship.
            <p class="mt-5">I declare under penalty of perjury that the foregoing is true and correct.</p>
        </p>
        </div>
        <div class="col-sm-4"><p>Date: </p></div>
        <div class="col-sm-4"><p>Signature </p></div>
        <div class="col-sm-4"><p>Seal </p></div>
    </div>

    <div class="row my-5">
        <div class="col-sm-12">
            <h6 class="font-weight-bold">SANSERA FOUNDATION</h6>
            <p>No 143/A, Jirani link Road Near OMEX Circle Bengaluru 560099,Mobil No: 9845620096</p>
            <img src="./img/Screenshot from 2023-01-28 22-22-18.png" alt="">
        </div>
    </div>

</div>
@endsection