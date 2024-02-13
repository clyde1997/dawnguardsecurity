<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="{{ asset('css/navfooter.css') }}" rel="stylesheet">
    <link href="{{ asset('css/userdash.css') }}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./images/dawnguard_logo.png">
    <title>Dawnguard Security Agency - User Dashboard</title>
</head>
<body>

     <!--Upper Content-->
    <div class="container-fluid sticky-top">

        <div class="row bg-white">
    
            <!-- Column for the logo -->
            <div class="dawnguard_logo col-md-6">
                
                <img src="./images/logo_with_title.png" class="img-fluid">
            
            </div>

            <div class="sub_logo col-md-6">
                
                <img src="./images/sub_logos.png" class="img-fluid">
            
            </div>
    
        </div>


    </div>

    <!--The Dashboard-->
    <div class="wholeuserContainer container-md">

        <div class="row">

            <div class="navbars_profileContainer col-md-4 p-5 border">

                <div class="row pb-5">

                    @if(auth()->check() && auth()->user()->avatar)

                    <img src="{{ asset('avatars/' . auth()->user()->avatar->image) }}" class="img-fluid rounded" id="profile_pic" alt="User Avatar">

                    @else

                        <img src="{{ asset('images/userdash/profile_empty.jpg') }}" class="img-fluid rounded" id="profile_pic" alt="User Avatar">

                    @endif

                    <div class="hello_employee pt-4">
                        @auth

                         <h4 class="h4 text-center" id="profile_name">Hello {{auth()->user()->username}}</h4>
                        
                        @endauth

                    </div>

                    <div class="change_avatar text-center">

                        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#changeavatar">

                            Change Avatar

                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                  </svg>
                            </span>

                        </button>

                        <form method="POST" action="{{ route('delete.avatar')}}">
                        @csrf
                            <button type="submit" class="btn btn-light">

                                Delete Avatar

                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                      </svg>
                                </span>

                            </button>

                        </form>

                        @if(session('successdeleteavatar'))

                        <script>

                            alert('{{ session('successdeleteavatar') }}');

                        </script>

                        @elseif (session('errordeleteavatar'))

                        <script>

                            alert('{{ session('errordeleteavatar') }}');

                        </script>

                        @endif

                     

                        <!-- Modal For Change Avatar -->
                        <div class="modal fade" id="changeavatar" tabindex="-1" aria-hidden="true">

                            <div class="modal-dialog">

                                <form method="POST" action="{{ route('employee.avatar') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-content">

                                        <div class="modal-header">
    
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Change Avatar</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    
                                        </div>
    
                                        <div class="modal-body">
                                    
                                            <input type="file" name="image" id="image" class="form-control">
    
                                        </div>
    
                                        <div class="modal-footer">
    
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="changeavatarimg">Save changes</button>
    
                                        </div>
                                        
                                    </div>

                                </form>

                                @if(session('success'))

                                <script>

                                    alert('{{ session('success') }}');

                                </script>

                                @elseif (session('error'))

                                <script>

                                    alert('{{ session('error') }}');

                                </script>

                                @endif

                            

                            </div>

                        </div>

                    </div>

                </div>

                <div class="row d-grid justify-content-center">

                    <ul class="navbar-nav">

                        <li class="nav-item">

                            <a href="#employee_details" class="nav-link" onclick="showContent('employee_details', event)">Employee Details</a>

                        </li>

                        <li class="nav-item">

                            <a href="#employeeuploaddocument" class="nav-link" onclick="showContent('employeeuploaddocument', event)">Upload Documents</a>

                        </li>

                        <li class="nav-item">

                            <a href="#viewpayslips" class="nav-link" onclick="showContent('viewpayslips', event)">View Payslips</a>

                        </li>

                        <div class="logout_button pt-5 pb-5">

                            <form action="{{ route('employee.logout') }}" method="POST">

                                @csrf
                                <button type="submit" class="btn btn-danger">Log Out</button>


                            </form>

                        </div>

                    </ul>

                </div>

            </div>

         

            <div class="collapsable_contents_container col-md-8 border">

                <!--Contents For Employee Details-->
                <div class="collapse container-md p-3" id="employee_details">

                    <!--Above Logo and contents-->
                    <div class="row d-grid justify-content-center">

                        <img src="./images/userdash/logo_with_title.png" class="img-fluid">

                        <p class="text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/></svg>
                            Block 134 Lot 6 Unit 2E C. Arellano St., Katarungan Village, Poblacion, Muntinlupa City 1776
                        </p>

                        <p class="text-center">

                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                              </svg>

                              (02) 70041668 / (02) 88263450 / 09175148697 /     09477615170
                        </p>

                        <p class="text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"/>
                              </svg>
                              dawnguard.sec.agency@gmail.com
    
                        </p>


                    </div>

          
                    @if ($employeeDetails)
                    <!--The Form Contents 201 File-->
                    <form id="employee_201" method="post">

                        <h4 class="h4 text-center pt-5 pb-3">Employment Application Data</h4>

                        <div class="row p-2">

                            <div class="col-md-6">
                                <label class="form-label">Name:</label>
                                <input type="text" class="form-control" id="employeename" name="employeename"  value="{{ $employeeDetails->employeename }}" disabled>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Address:</label>
                                <textarea class="form-control" id="employeeaddress" name="employeeaddress" disabled>{{ $employeeDetails->employeeaddress }}</textarea>
                            </div>

                        </div>

                        <div class="row p-2">

                            <div class="col-md-6">
                                <label class="form-label">Position Applied:</label>
                                <input type="text" class="form-control" id="employeeposition" name="employeeposition" value="{{ $employeeDetails->employeeposition }}" disabled >
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Contact Number:</label>
                                <input type="tel" class="form-control" id="employeecontact" name="employeecontact" value="{{ $employeeDetails->employeecontact }}" disabled>
                            </div>

                        </div>

                        <div class="row p-2">

                            <div class="col-md-12">
                                <label class="form-label">Email Address:</label>
                                <input type="email" class="form-control" id="employeeemail" name="employeeemail" value="{{ $employeeDetails->employeeemail }}" disabled>
                            </div>

                        </div>

                        <div class="row p-2">

                            <div class="col-md-6">
                                <label class="form-label">Age:</label>
                                <input type="number" class="form-control" id="employeeage" name="employeeage" value="{{ $employeeDetails->employeeage }}" disabled>
                            </div>

                            <div class="col-md-6">

                                <label class="form-label">Gender:</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="Male" {{ $employeeDetails->gender == 'Male' ? 'checked' : '' }} disabled>
                                        <label class="form-check-label" for="gendermale">
                                        Male
                                        </label>
                                    </div>
                                  <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="Female" {{ $employeeDetails->gender == 'Female' ? 'checked' : '' }} disabled>
                                        <label class="form-check-label" for="gendermale">
                                        Female
                                        </label>
                                  </div>                           
                            </div>

                        </div>

                        <div class="row p-2">

                            <div class="col-md-6">
                                <label class="form-label">Birthdate:</label>
                                <input type="date" class="form-control" id="employeebirthdate" name="employeebirthdate" value="{{ $employeeDetails->employeebirthdate }}" disabled>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Birthplace:</label>
                                <input type="text" class="form-control" id="employeebirthplace" name="employeebirthplace" value="{{ $employeeDetails->employeebirthplace }}" disabled>
                            </div>

                        </div>

                        <div class="row p-2">

                            <div class="col-md-6">
                                <label class="form-label">Religion:</label>
                                <input type="text" class="form-control" id="employeereligion" name="employeereligion" value="{{ $employeeDetails->employeereligion }}" disabled>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Civil Status:</label>
                                <input type="text" class="form-control" id="employeecivilstatus" name="employeecivilstatus" value="{{ $employeeDetails->employeecivilstatus }}" disabled>
                            </div>

                        </div>

                        <div class="row p-2">

                            <div class="col-md-6">
                                <label class="form-label">SG/SO License Number:</label>
                                <input type="text" class="form-control" id="employeelicense" name="employeelicense" value="{{ $employeeDetails->employeelicense }}" disabled>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Date Of Expiration:</label>
                                <input type="date" class="form-control" id="dateofexpiration" name="dateofexpiration" value="{{ $employeeDetails->dateofexpiration }}" disabled>
                            </div>

                        </div>

                        <div class="row p-2 pb-5">

                            <div class="col-md-4">
                                <label class="form-label">Father's Name:</label>
                                <input type="text" class="form-control" id="employeefathername" name="employeefathername" value="{{ $employeeDetails->employeefathername }}" disabled>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Mother's Name:</label>
                                <input type="text" class="form-control" id="employeemothername" name="employeemothername" value="{{ $employeeDetails->employeemothername }}" disabled>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Spouse Name:</label>
                                <input type="text" class="form-control" id="employeespousename" name="employeespousename" value="{{ $employeeDetails->employeespousename }}" disabled>
                            </div>

                        </div>


                        <div class="row p-2 pb-5">

                            <label class="form-label text-center"><b>Immediate Relative to be contacted</b></label>

                            <div class="col-md-6">
                                <label class="form-label">Name:</label>
                                <input type="text" class="form-control" id="employeerelativename" name="employeerelativename" value="{{ $employeeDetails->employeerelativename }}" disabled>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Contact Number:</label>
                                <input type="tel" class="form-control" id="employeerelativenumber" name="employeerelativenumber" value="{{ $employeeDetails->employeerelativenumber }}" disabled>
                            </div>

                        </div>

                        <div class="row p-2">

                            <label class="form-label text-center"><b>Government Benefits</b></label>

                            <div class="col-md-6">
                                <label class="form-label">SSS:</label>
                                <input type="number" class="form-control" id="employeesss" name="employeesss" value="{{ $employeeDetails->employeesss }}" disabled>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">PHILHEALTH:</label>
                                <input type="number" class="form-control" id="employeephilhealth" name="employeephilhealth" value="{{ $employeeDetails->employeephilhealth }}" disabled>
                            </div>

                        </div>

                        <div class="row p-2 pb-4">

                            <div class="col-md-6">
                                <label class="form-label">TIN:</label>
                                <input type="number" class="form-control" id="employeetin" name="employeetin" value="{{ $employeeDetails->employeetin }}" disabled>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">PAGIBIG:</label>
                                <input type="number" class="form-control" id="employee_pagibig" name="employeepagibig" value="{{ $employeeDetails->employeepagibig }}" disabled>
                            </div>

                        </div>

                        <div class="row p-2 pb-5">

                            <div class="col-md-6">
                                <label class="form-label">Your Image:</label>

                                @if ($employeeDetails->uploadpic)

                                <img src="{{ asset('employeeimages/' . $employeeDetails->uploadpic) }}" class="img-fluid" id="employeeimage" name="employeeimage">

                                @endif

                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Your Signature</label>

                                @if ($employeeDetails->change_signature)

                                <img src="{{ asset('employeesignature/' . $employeeDetails->change_signature) }}" class="img-fluid" id="employeesignature" name="employeesignature">
                                
                                @endif

                            </div>

                        </div>

                        <div class="row p-2">

                            <label class="form-label text-center"><b>Education Background</b></label>

                            <label class="form-label">High School:</label>

                            <div class="col-md-4">

                                <input type="text" class="form-control" id="hsnameofschool" name="hsnameofschool" value="{{ $employeeDetails->hsnameofschool }}" disabled>
                            
                            </div>

                            <div class="col-md-4">

                                <input type="text" class="form-control" id="hscoursedegree" name="hscoursedegree" value="{{ $employeeDetails->hscoursedegree }}" disabled>
                            
                            </div>

                            <div class="col-md-4">
        
                                <input type="text" class="form-control" id="hsyearcompleted" name="hsyearcompleted"  value="{{ $employeeDetails->hsyearcompleted }}" disabled>
                            
                            </div>

                        </div>

                        <div class="row p-2">

                            <label class="form-label">College:</label>

                            <div class="col-md-4">

                                <input type="text" class="form-control" id="collegenameofschool" name="collegenameofschool" value="{{ $employeeDetails->collegenameofschool }}" disabled>
                            
                            </div>

                            <div class="col-md-4">

                                <input type="text" class="form-control" id="collegecoursedegree" name="collegecoursedegree" value="{{ $employeeDetails->collegecoursedegree }}" disabled>
                            
                            </div>

                            <div class="col-md-4">
        
                                <input type="text" class="form-control" id="collegeyearcompleted" name="collegeyearcompleted" value="{{ $employeeDetails->collegeyearcompleted }}" disabled>
                            
                            </div>

                        </div>

                        <div class="row p-2">

                            <label class="form-label">Technical/Vocational:</label>

                            <div class="col-md-4">

                                <input type="text" class="form-control" id="vocationalnameofschool" name="vocationalnameofschool" value="{{ $employeeDetails->vocationalnameofschool }}" disabled>
                            
                            </div>

                            <div class="col-md-4">

                                <input type="text" class="form-control" id="vocationalcoursedegree" name="vocationalcoursedegree" value="{{ $employeeDetails->vocationalcoursedegree }}" disabled>
                            
                            </div>

                            <div class="col-md-4">
        
                                <input type="text" class="form-control" id="vocationalyearcompleted" name="vocationalyearcompleted" value="{{ $employeeDetails->vocationalyearcompleted }}" disabled>
                            
                            </div>

                        </div>



                        <div class="row p-2 pt-5">

                            <label class="form-label text-center"><b>Work Experiences</b></label>

                            <div class="col-md-3">

                                <label class="form-label">Company Name:</label>
                                <input type="text" class="form-control" id="companyname1" name="companyname1" value="{{ $employeeDetails->companyname1 }}" disabled>
                            
                            </div>

                            <div class="col-md-3">

                                <label class="form-label">Position / Designation:</label>
                                <input type="text" class="form-control" id="position1" name="position1" value="{{ $employeeDetails->position1 }}" disabled>
                            
                            </div>

                            <div class="col-md-3">
                                
                                <label class="form-label">Company Address:</label>
                                <input type="text" class="form-control" id="companyaddress1" name="companyaddress1" value="{{ $employeeDetails->companyaddress1 }}"  disabled>
                            
                            </div>

                            <div class="col-md-3">
        
                                <label class="form-label">Years Of Tenure:</label>
                                <input type="text" class="form-control" id="yearsoftenure1" name="yearsoftenure1" value="{{ $employeeDetails->yearsoftenure1 }}" disabled>
                            
                            </div>

                        </div>

                        <div class="row p-2">

                            <div class="col-md-3">

                                <label class="form-label">Company Name:</label>
                                <input type="text" class="form-control" id="companyname2" name="companyname2" value="{{ $employeeDetails->companyname2 }}" disabled>
                            
                            </div>

                            <div class="col-md-3">

                                <label class="form-label">Position / Designation:</label>
                                <input type="text" class="form-control" id="position2" name="position2" value="{{ $employeeDetails->position2 }}" disabled>
                            
                            </div>

                            <div class="col-md-3">
                                
                                <label class="form-label">Company Address:</label>
                                <input type="text" class="form-control" id="companyaddress2" name="companyaddress2" value="{{$employeeDetails->companyaddress2}}"  disabled>
                            
                            </div>

                            <div class="col-md-3">
        
                                <label class="form-label">Years Of Tenure:</label>
                                <input type="text" class="form-control" id="yearsoftenure2" name="yearsoftenure2" value="{{ $employeeDetails->yearsoftenure2 }}"disabled>
                            
                            </div>

                        </div>

                        <div class="row p-2">

                            <div class="col-md-3">

                                <label class="form-label">Company Name:</label>
                                <input type="text" class="form-control" id="companyname3" name="companyname3" value="{{ $employeeDetails->companyname3 }}" disabled>
                            
                            </div>

                            <div class="col-md-3">

                                <label class="form-label">Position / Designation:</label>
                                <input type="text" class="form-control" id="position3" name="position3" value="{{ $employeeDetails->position3 }}" disabled>
                            
                            </div>

                            <div class="col-md-3">
                                
                                <label class="form-label">Company Address:</label>
                                <input type="text" class="form-control" id="companyaddress3" name="companyaddress3" value="{{ $employeeDetails->companyaddress3 }}" disabled>
                            
                            </div>

                            <div class="col-md-3">
        
                                <label class="form-label">Years Of Tenure:</label>
                                <input type="text" class="form-control" id="yearsoftenure3" name="yearsoftenure3" value="{{ $employeeDetails->yearsoftenure3 }}" disabled>
                            
                            </div>

                        </div>

                        <div class="row p-2">

                            <div class="col-md-3">

                                <label class="form-label">Company Name:</label>
                                <input type="text" class="form-control" id="companyname4" name="companyname4" value="{{ $employeeDetails->companyname4 }}" disabled>
                            
                            </div>

                            <div class="col-md-3">

                                <label class="form-label">Position / Designation:</label>
                                <input type="text" class="form-control" id="position4" name="position4" value="{{ $employeeDetails->position4 }}" disabled>
                            
                            </div>

                            <div class="col-md-3">
                                
                                <label class="form-label">Company Address:</label>
                                <input type="text" class="form-control" id="companyaddress4" name="companyaddress4" value="{{ $employeeDetails->companyaddress4 }}" disabled>
                            
                            </div>

                            <div class="col-md-3">
        
                                <label class="form-label">Years Of Tenure:</label>
                                <input type="text" class="form-control" id="yearsoftenure4" name="yearsoftenure4" value="{{ $employeeDetails->yearsoftenure4 }}" disabled>
                            
                            </div>

                        </div>

                        <div class="row p-2">

                            <div class="col-md-12">

                                <label class="form-label">
                                    Are you a member of any Law Enforcement Agency Before? If Yes, how many
                                    years in service and state the reason / cause of separation from the service (Retired/Terminated/Awol):

                                </label>
                                <textarea class="form-control" id="employeeotherdata" name="employeeotherdata" disabled>{{ $employeeDetails->employeeotherdata }}</textarea>

                            </div>



                        </div>

                    </form>

                    @else

                    <p class="lead pt-5 text-center">You Have No Employee Details</p>
                
                    @endif
                </div>

                <!--Contents For Upload Documents-->
                <div class="collapse container-md p-3 pt-5" id="employeeuploaddocument">

                    <form method="POST" action="{{ route('add.Document') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row pb-4">

                            <h4 class="h4 text-center pb-5">Upload Documents</h4>

                            <label class="form-label" for="documents">Upload Documents</label>
                            <input class="form-control" type="file" id="documents" name="documents">
    
                        </div>

                        <div class="button-document text-center">

                            <button type="submit" class="btn btn-primary" name="submitdocs">Submit Documents</button>

                        </div>

                    </form>

                    @if(session('status'))

                    <script>
    
                        alert('{{ session('status') }}');
    
                    </script>
    
                    @endif

                
                </div>

                <!--Contents For View Payslips-->
                <div class="collapse container-md p-3 pt-5" id="viewpayslips">

                    @if($employeePayslips)

                    <div class="row table-responsive">

                        <h4 class="h4 text-center pb-4">View Payslips</h4>

                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Payslip File</th>
                                <th scope="col">Upload Date</th>
                              </tr>
                            </thead>

                            <tbody>

                                @foreach($employeePayslips as $payslip)
                                <tr>
                                    <td><a href="{{ route('download.payslip', ['id' => $payslip->id]) }}" target="_blank">{{ $payslip->payslip }}</a></td>
                                    <td>{{ $payslip->created_at }}</td>
                                </tr>
                                @endforeach
        

                            </tbody>

                          </table>

                    </div>

                    @else

                    <p class="lead pt-5 text-center">You Have No Payslip</p>
                
                    @endif
                    
                     <!--The Pagination Links-->
                     <div class="row pt-4">

                        <div class="pagination d-flex justify-content-center">

                            {{ $employeePayslips->links() }}

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!--Copyright-->
        <div class="copyright_text container-md pt-5">

            <h6 class="h6 text-center text-white">COPYRIGHTS © 2024 DAWNGUARD SECURITY AGENCY | All Rights Reserved.</h4>

        </div>

    </div>

    <script src="{{ asset('javascript/userShowContent.js') }}"></script>
</body>
</html>