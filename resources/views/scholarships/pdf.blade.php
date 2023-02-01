<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>


<div class="container">
  <div class="row mt-5">
        <div class="col-sm-12">
            <div class="text-center">
                {{-- <img src="{{asset('pdf/img/logo.png')}}" class="img-fluid" alt="logo"> --}}
            </div>
            <p class="font-weight-bold text-justify text-center"><u>The Rotary Bangalore Midtown in association with Sansera Foundation invites application
                from Students who have secured marks in excess of 60% in 10th standard exam last held.</u></p>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-sm-4">
            <div>
                <span><small>Application No.:</small>{{$data->application_no}}</span>
            </div>
        </div>

        <div class="col-sm-4">
            <div>
                <span><small>Year :</small>{{$data->year}}</span>
            </div>
        </div>

        <div class="col-sm-4">
            <div>
                <span><small>Annual Income:</small>{{$data->annual_income}}</span>
            </div>
        </div>
        
    </div>

    <div class="row mt-5">
        <div class="col-sm-12">
            <h6 class="font-weight-bold">PERSONAL DETAILS:</h6>
        </div>
        <div class="col-sm-4">
            <p>1. Full Name :</p>
            <p>2. Father Name :</p>
            <p>Occupation :</p>
            <p>3. Mother Name:</p>
            <p>4. Full Address :</p>
            <p>House no.  :</p>
            <p>Village :</p>
            <p>Taluk :</p>
            <p>Pin code :</p>
            <p>5. Contact no. 1  :</p>
            <p>6. Date of Birth :</p>
            <p>7. Male/ Female: :</p>
            <p>8. Aadhar no. :</p>
           
          


        </div>

        <div class="col-sm-8">
            <div class="row">
                <div class="col-sm-12 mb-5">
                    <div class="text-right">
                        {{-- <img style="width: 200px; height: 150px;" src="{{asset('pdf/img/pro.png')}}" class="img-fluid" alt="prfile"> --}}
                    </div>
                 </div>
         
                 <div class="col-sm-12">
                     <p><small>Street/ Cross :</small></p>
                     <p><small>Post office :</small></p>
                     <p><small>District :</small></p>
                     <p><small>State :</small></p>
                     <p><small>Contact no. 2 :</small></p>
                     <p><small>Age :</small></p>
                 </div>
            </div>
        </div>
        
    </div>

    <div class="row mt-5">
        <div class="col-sm-12">
            <h6 class="font-weight-bold"> DETAILS OF STUDIED SCHOOL / COLLEGE :</h6>
        </div>

        <div class="col-sm-12">
           <p>Govt. / Govt. Aided / Private: </p>
        </div>

        <div class="col-sm-12">
           <div class="row">
            <div class="col-sm-4">
                <p>Village:</p>
            </div>
            <div class="col-sm-4">
                Taluk : 
            </div>
            <div class="col-sm-4">
                <p>District:</p>
            </div>
           </div>
        </div>

        
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-6">
                    <p>Marks Obtained in last Examination  SSLC/PUC/Degree: </p>
                </div>
                <div class="col-sm-6">
                    <p>Year :</p>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <p>If PUC / Degree please specify the subject :</p>
        </div>

        <div class="col-sm-6">Grade/ Class :</div>
        <div class="col-sm-6">Percentage :</div>
        <div class="col-sm-6">Contact Person:</div>
        <div class="col-sm-6">Designation :</div>
        <div class="col-sm-6">Contact no. : </div>
        <div class="col-sm-6">Seal & Signature:</div>
        

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
          {{--   <img src="{{asset('pdf/img/qr.png')}}" alt=""> --}}
        </div>
    </div>

</div>

</body>
</html>
