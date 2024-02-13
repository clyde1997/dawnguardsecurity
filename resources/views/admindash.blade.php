<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="{{ asset('css/navfooter.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admindash.css') }}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./images/dawnguard_logo.png">
    <title>Dawnguard Security Agency - Admin Dash</title>
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

                    <img src="./images/admindash/admin_profilepic.jpg" class="img-fluid" id="pofile_pic">

                    <div class="hello_employee pt-4">

                        <h4 class="h4 text-center" id="profile_name">Hello Admin</h4>

                    </div>

                </div>

                <div class="row d-grid justify-content-center">

                    <ul class="navbar-nav">

                        <li class="nav-item">

                            <a href="#adminrecords" class="nav-link" onclick="showContent('adminrecords')">Records</a>

                        </li>

                        <li class="nav-item">

                            <a href="#employeemanagement" class="nav-link" onclick="showContent('employeemanagement')">Employee Management</a>

                        </li>

                        <li class="nav-item">

                            <a href="#inquirymanagement" class="nav-link" onclick="showContent('inquirymanagement')">Inquiry Management</a>

                        </li>

                        <li class="nav-item">

                            <a href="#client_management" class="nav-link" onclick="showContent('client_management')">Client Management</a>

                        </li>

                        <li class="nav-item">

                            <a href="#upload_payslip" class="nav-link" onclick="showContent('upload_payslip')">Upload Payslips</a>

                        </li>

                        <li class="nav-item">

                            <a href="#addcareers" class="nav-link" onclick="showContent('addcareers')">Add Careers</a>

                        </li>


                        <div class="logout_button pt-5 pb-5">

                            <form action="{{ route('admin.logout') }}" method="POST">

                                @csrf
                                <button type="submit" class="btn btn-danger">Log Out</button>


                            </form>


                        </div>

                    </ul>

                </div>

            </div>

         

            <div class="collapsable_contents_container col-md-8 border">

                <!--Contents For Records-->
                <div class="collapse container-md p-3 pt-5" id="adminrecords">

                    <div class="row table-responsive">

                        <h4 class="h4 text-center pb-4">Records</h4>
                       
                        <div class="row">

                      
                            <div class="col-md-6 buttonfor201 pt-2 pb-4">

                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#employeeform">Fillout Employee Details</button>
    
                            </div>
                      
                            
                            <!--
                            <div class="col-md-6 searchEmployee pt-2">
                            
                                <div class="searchcontainer d-flex">

                                    <input type="text" name="search" class="form-control me-2" placeholder="Search Employee Here" aria-label="Search by fullname" aria-describedby="button-search" onchange="employeeSearch()">

                                </div>

                            </div>
                            -->

                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Client Designation</th>
                                <th scope="col">View Employee Documents</th>
                                <th scope="col">View Employee Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($employees as $employee)
                                    
                                <tr>

                                    <td>{{ $employee->fullname }}</td>
                                    <td>{{ $employee->clientdesignation }}</td>
                                    <td>
                                        <!--To View Employee Uploaded Documents Per Id-->
                                        <a href="{{ route('employee.documents', ['id' => $employee->id]) }}" class="btn btn-primary" target="_blank">View Documents</a>                
                                    </td>
                                    <Td>
                                         <!--To View Employee 201 Form Details Per Id-->
                                        <a href="{{ route('employee.details', ['id' => $employee->id]) }}" class="btn btn-primary" target="_blank">View Details</a>                
                                    </Td>
                                   
                                </tr>

                                @endforeach

                            </tbody>

                            </table>

                    </div>

                        <!--The Pagination Links-->
                        <div class="row pt-4">

                            <div class="pagination d-flex justify-content-center">

                                {{ $employees->links() }}

                            </div>

                        </div>

                    


                </div>

                <!--Contents For Employee Management-->
                <div class="collapse container-md p-3 pt-5" id="employeemanagement">

                    <div class="row table-responsive">

                        <h4 class="h4 text-center pb-4">Employee Management</h4>

                        <div class="addemployee_button pb-4">

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addemployee">Add Employee</button>

                        </div>

                        <table class="table">

                            <thead>

                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Client Designation</th>
                                <th scope="col">Employee Status</th>
                            </tr>

                            </thead>

                            <tbody>

                                @foreach ($employees as $employee)

                                <tr>
                                    <td>{{ $employee->fullname }}</td>
                                    <td>{{ $employee->clientdesignation }}</td>

                                    <td>

                                        <form method="POST" action="{{ route('updateEmployeeStatus', $employee->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="employee_id" value="{{ $employee->id }}">
                                            <select class="form-select" name="status" aria-label="status" onchange="this.form.submit()">
                                                <option value="Set Status" {{ $employee->status === 'Set Status' ? 'selected' : '' }}>Set Status</option>
                                                <option value="Active Duty" {{ $employee->status === 'Active Duty' ? 'selected' : '' }}>Active Duty</option>
                                                <option value="Resigned" {{ $employee->status === 'Resigned' ? 'selected' : '' }}>Resigned</option>
                                                <option value="Awol" {{ $employee->status === 'Awol' ? 'selected' : '' }}>Awol</option>
                                                <option value="Terminated" {{ $employee->status === 'Terminated' ? 'selected' : '' }}>Terminated</option>
                                            </select>
                                        </form>

                                    </td>
                                
                                </tr>

                                
                                @endforeach

                            </tbody>

                        </table>

                         <!--The Pagination Links-->
                         <div class="row pt-4">

                            <div class="pagination d-flex justify-content-center">

                                {{ $employees->links() }}

                            </div>

                        </div>

                    </div>

                    <!-- Modal for Employee Docs -->
                    <div class="modal fade" id="employeepayslip" tabindex="-1" aria-hidden="true">

                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">

                            <div class="modal-content">

                                <div class="modal-header">

                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Payslips</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            
                                </div>

                                <form method="POST">

                                    <div class="modal-body">

                                        <label class="form-label" for="uploadpayslip">Upload Payslip</label>
                                        <input type="file" class="form-control" name="uploadpayslip" id="uploadpayslip" multiple>
                                        
                                        <div class="button_payslip text-center pt-5">

                                            <button class="btn btn-primary" name="payslipupload" type="submit">Upload Payslip</button>

                                        </div>

                                    </div>

                                </form>


                                <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!--Contents For Inquiry Management-->
                <div class="collapse container-md p-3 pt-5" id="inquirymanagement">

                    <div class="row pb-4">

                        <h4 class="h4 text-center pb-4">Inquiry Management</h4>                      

                    </div>

                    <div class="row">

                        <div class="table-responsive">

                            <table class="table">

                                <thead>

                                    <td>First Name</td>
                                    <td>Last Name</td>
                                    <td>Email Address</td>
                                    <td>Phone Number</td>
                                    <td>Subject</td>
                                    <td>Message</td>
                                    <td>Status</td>
                                    <td>Inquiry Date</td>
                                </thead>

                                <tbody>

                                    @foreach($inquiries as $inquiry)
                                    <tr>   

                                        <td>{{ $inquiry->firstname }}</td>

                                        <td>{{ $inquiry->lastname }}</td>

                                        <td>{{ $inquiry->email }}</td>

                                        <td>{{ $inquiry->contactnumber }}</td>

                                        <td>{{ $inquiry->subject }}</td>

                                        <td>

                                            <textarea class="form-control" style="width: 35rem; height:5rem" disabled>

                                                {{ $inquiry->message }}
                                                
                                            </textarea>
                                        
                                        </td>

                                        <td>

                                            <form method="post" action="{{ route('admin.contactus.update-status', ['id' => $inquiry->id]) }}">
                                                @csrf
                                                @method('post')

                                                <select class="form-select" style="width: 15rem" aria-label="Default select example" name="contactstatus" id="contactstatus" onchange="this.form.submit()">

                                                    <option value="Not Yet Replied" {{ $inquiry->status === 'Not Yet Replied' ? 'selected' : '' }}>Not Yet Replied</option>
                                                    <option value="Replied" {{ $inquiry->status === 'Replied' ? 'selected' : '' }}>Replied</option>

                                                </select>

                                            </form>

                                        </td>

                                        <td>{{ $inquiry->created_at }}</td>

                                    </tr>

                                </tbody>
                                @endforeach

                         

                                @if(session('status'))

                                <script>
                
                                    alert('{{ session('status') }}');
                
                                </script>
                
                                @endif

                                </tbody>


                            </table>

                        </div>


                    </div>


                    <!--The Pagination Links-->
                    <div class="row pt-4">

                        <div class="pagination d-flex justify-content-center">

                        {{ $inquiries->links() }}

                        </div>

                    </div>

                </div>

                <!--Contents For Add Careers-->
                <div class="collapse container-md p-3 pt-5" id="addcareers">

                    <div class="row pb-4">

                        <h4 class="h4 text-center pb-4">Add Careers</h4>                      

                    </div>

                    <div class="addCareersButton pt-2 pb-4">

                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addCareers">Add Careers</button>

                    </div>

                    <div class="table-responsive">

                        <table class="table">

                            <thead>
                                <tr>
                                <Th>Position Title</Th>
                                <Th>Location</Th>
                                <Th>Job Description</Th>
                                <Th>Qualifications 1</Th>  
                                <Th>Qualifications 2</Th>   
                                <Th>Qualifications 3</Th>   
                                <Th>Qualifications 4</Th>   
                                <Th>Qualifications 5</Th>   
                                <Th>Qualifications 6</Th>   
                                <Th>Qualifications 7</Th>   
                                <Th>Qualifications 8</Th>    
                                <th>Action</th> 

                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($careers as $career)
                                <tr>

                                    <td>{{ $career->positiontitle }}</td>
                                    <td>{{ $career->location }}</td>
                                    <td><textarea class="form-control" style="width: 20rem; height: 7rem" disabled>{{ $career->jobdescription }}</textarea></td>
                                    <td>{{ $career->qualifications1 }}</td>
                                    <td>{{ $career->qualifications2 }}</td>
                                    <td>{{ $career->qualifications3 }}</td>
                                    <td>{{ $career->qualifications4 }}</td>
                                    <td>{{ $career->qualifications5 }}</td>
                                    <td>{{ $career->qualifications6 }}</td>
                                    <td>{{ $career->qualifications7 }}</td>
                                    <td>{{ $career->qualifications8 }}</td>
                                    <td>

                                        <!--Function to delete career per item-->
                                        <form action="{{ url('deleteCareer/'.$career->id) }}" method="POST" id="deleteConfirmation" onclick="deleteCareer()">
                                            @csrf
                                            @method('DELETE')

                                                <button type="submit" class="btn btn-danger btn-sm">

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                                    </svg>

                                                </button>

                                        </form>

                                    </td>
                                    
                                </tr>
                                @endforeach

                           
                            </tbody>

                        </table>

                    </div>

                        <!--The Pagination Links-->
                        <div class="row pt-4">

                            <div class="pagination d-flex justify-content-center">

                                {{ $careers->links() }}

                            </div>

                        </div>

                </div>

                <!--Contents For Adding Payslip-->
                <div class="collapse container-md p-3 pt-5" id="upload_payslip">

                    <div class="row pb-4">

                        <h4 class="h4 text-center pb-4">Upload Payslip</h4>                      

                    </div>

                    <div class="row">

                        <form method="POST" action="{{ url('uploadEmployeePayslip') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row pt-2 pb-4">

                                <h4 class="h4 pb-2">Step 1: Select Employee</h4>        

                                <div class="col-md-6">

                                    <label class="form-label">Select Employee Account</label>

                                    <select class="form-select" aria-label="Default select example" name="employeeaccount_id">
                                    
                                    @foreach ($employees as $employee )

                                    <option value=" {{$employee->id}} "> {{$employee->fullname}} </option>
                                        
                                    @endforeach

                                    </select>

                                </div>

                            </div>

                            <div class="row pt-2 pb-4">

                                <h4 class="h4 pb-2">Step 2: Upload Payslip</h4>

                                <div class="col-md-12">

                                    <label class="form-label">Upload Payslip</label>
                                    <input type="file" name="payslip" id="payslip" class="form-control"> 

                                </div>

                            </div>

                            <Div class="row pt-2 pb-4">

                                <div class="button">

                                    <button class="btn btn-primary" type="submit">Submit Payslip</button> 

                                </div>

                            </Div>


                        </form>

                    </div>


                </div>

                <!--Contents For Adding Clients-->
                <div class="collapse container-md p-3 pt-5" id="client_management">

                    <div class="row pb-4">

                        <h4 class="h4 text-center pb-4">Client Management</h4>                      

                    </div>

                    <div class="addClientsButton pt-2 pb-4">

                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addClient">Add Client</button>

                    </div>

                    <div class="row">

                        <div class="table-responsive">

                            <table class="table">

                                <thead>

                                    <tr>
    
                                            <th>Client Name</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                    
                                    </tr>
    
                                </thead>
    
                                <tbody>

                                    @foreach ($clients as $client)

                                    <tr>
    
                                        <td> {{ $client->clientname }} </td>
                                        <td> {{ $client->created_at }} </td>

                                        <td>

                                            <!--Function to delete career per item-->
                                            <form action="{{ url('deleteClient/'.$client->id) }}" method="POST" id="deleteConfirmation" onclick="deleteClient()">
                                                @csrf
                                                @method('DELETE')
    
                                                    <button type="submit" class="btn btn-danger btn-sm">
    
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                                        </svg>
    
                                                    </button>
    
                                            </form>
    
                                        </td>
    
                                    </tr>
                                        
                                    @endforeach
    
                                </tbody>

                            </table>

                        </div>

                            <!--The Pagination Links-->
                            <div class="row pt-4">

                                <div class="pagination d-flex justify-content-center">

                                    {{ $clients->links() }}

                                </div>

                            </div>
                    
                    </div>

                </div>
                
            </div>

            
            <!-- Modal For Employee Form -->
            <div class="modal fade" id="employeeform" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                
                    <div class="modal-dialog modal-dialog-scrollable modal-xl">

                        <div class="modal-content">

                            <div class="modal-header">

                                <h1 class="modal-title fs-5" id="staticBackdropLabel">201 Form</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            
                            </div>

                            <!--The 201 FORM Modal-->
                            <div class="modal-body">

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

                                    <!--The Form Contents 201 File-->
                                    <form class="needs-validation" id="employee_201" method="POST" action="{{ url('addOrEditEmployeeDetails') }}" enctype="multipart/form-data" novalidate>
                                        @csrf
                                        
                                        <h4 class="h4 text-center pt-5 pb-3">Employment Application Data</h4>

                                        <div class="row pt-2 pb-4">

                                            <div class="col-md-6">

                                                <label class="form-label">Select Employee Account</label>

                                                <select class="form-select" aria-label="Default select example" name="employeeaccount_id">
                                                
                                                @foreach ($employees as $employee )

                                                <option value=" {{$employee->id}} "> {{$employee->fullname}} </option>
                                                    
                                                @endforeach

                                                </select>

                                            </div>

                                        </div>

                                        <div class="row p-2">

                                            <div class="col-md-6">
                                                <label class="form-label">Name:</label>
                                                <input type="text" class="form-control" id="employeename" name="employeename" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Employee Name!</div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Address:</label>
                                                <textarea class="form-control" id="employeeaddress" name="employeeaddress" required></textarea>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Employee Address!</div>
                                            </div>

                                        </div>

                                        <div class="row p-2">

                                            <div class="col-md-6">
                                                <label class="form-label">Position Applied:</label>
                                                <input type="text" class="form-control" id="employeeposition" name="employeeposition" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Employee Position!</div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Contact Number:</label>
                                                <input type="tel" class="form-control" id="employeecontact" name="employeecontact" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Employee Number!</div>
                                            </div>

                                        </div>

                                        <div class="row p-2">

                                            <div class="col-md-12">
                                                <label class="form-label">Email Address:</label>
                                                <input type="email" class="form-control" id="employeeemail" name="employeeemail" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Employee Email!</div>
                                            </div>

                                        </div>

                                        <div class="row p-2">

                                            <div class="col-md-6">
                                                <label class="form-label">Age:</label>
                                                <input type="number" class="form-control" id="employeeage" name="employeeage" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Employee Age!</div>
                                            </div>

                                            <div class="col-md-6">

                                                <label class="form-label">Gender:</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" value="Male" type="radio" name="gender" id="gender" required>
                                                        <label class="form-check-label" for="gendermale">
                                                        Male
                                                        </label>
                                                    </div>
                                                <div class="form-check">
                                                        <input class="form-check-input" value="Female" type="radio" name="gender" id="gender" required>
                                                        <label class="form-check-label" for="gendermale">
                                                        Female
                                                        </label>
                                                </div>   
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Employee Gender</div>                        
                                            </div>

                                        </div>

                                        <div class="row p-2">

                                            <div class="col-md-6">
                                                <label class="form-label">Birthdate:</label>
                                                <input type="date" class="form-control" id="employeebirthdate" name="employeebirthdate" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Employee Birthdate!</div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Birthplace:</label>
                                                <input type="text" class="form-control" id="employeebirthplace" name="employeebirthplace" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Employee Birthplace!</div>
                                            </div>

                                        </div>

                                        <div class="row p-2">

                                            <div class="col-md-6">
                                                <label class="form-label">Religion:</label>
                                                <input type="text" class="form-control" id="employeereligion" name="employeereligion" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Employee Religion!</div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Civil Status:</label>
                                                <input type="text" class="form-control" id="employeecivilstatus" name="employeecivilstatus" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Employee Civil Status!</div>
                                            </div>

                                        </div>

                                        <div class="row p-2">

                                            <div class="col-md-6">
                                                <label class="form-label">SG/SO License Number:</label>
                                                <input type="number" class="form-control" id="employeelicense" name="employeelicense" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Employee License Number!</div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Date Of Expiration:</label>
                                                <input type="date" class="form-control" id="dateofexpiration" name="dateofexpiration" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter License Expiration!</div>
                                            </div>

                                        </div>

                                        <div class="row p-2 pb-5">

                                            <div class="col-md-4">
                                                <label class="form-label">Father's Name:</label>
                                                <input type="text" class="form-control" id="employeefathername" name="employeefathername" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Employee Father's Name!</div>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Mother's Name:</label>
                                                <input type="text" class="form-control" id="employeemothername" name="employeemothername" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Employee Mother's Name!</div>
                                                
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Spouse Name:</label>
                                                <input type="text" class="form-control" id="employeespousename" name="employeespousename" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Employee Mother's Name!</div>
                                            </div>

                                        </div>


                                        <div class="row p-2 pb-5">

                                            <label class="form-label text-center"><b>Immediate Relative to be contacted</b></label>

                                            <div class="col-md-6">
                                                <label class="form-label">Name:</label>
                                                <input type="text" class="form-control" id="employeerelativename" name="employeerelativename" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Immediate Relative Name!</div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Contact Number:</label>
                                                <input type="tel" class="form-control" id="employeerelativenumber" name="employeerelativenumber" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Immediate Relative Contact Number!</div>
                                            </div>

                                        </div>

                                        <div class="row p-2">

                                            <label class="form-label text-center"><b>Government Benefits</b></label>

                                            <div class="col-md-6">
                                                <label class="form-label">SSS:</label>
                                                <input type="number" class="form-control" id="employeesss" name="employeesss" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Employee SSS Number!</div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">PHILHEALTH:</label>
                                                <input type="number" class="form-control" id="employeephilhealth" name="employeephilhealth" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Employee Philhealth Number!</div>
                                            </div>

                                        </div>

                                        <div class="row p-2 pb-4">

                                            <div class="col-md-6">
                                                <label class="form-label">TIN:</label>
                                                <input type="number" class="form-control" id="employeetin" name="employeetin" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Employee Tin Number!</div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">PAGIBIG:</label>
                                                <input type="number" class="form-control" id="employee_pagibig" name="employeepagibig" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Employee PagIbig Number!</div>
                                            </div>

                                        </div>

                                        <div class="row p-2 pb-5">

                                            <div class="col-md-6">
                                                <label class="form-label">Employee Image:</label>
                                                <img src="./images/userdash/profile_empty.jpg" class="img-fluid" id="employeeimage" name="employeeimage">
                                            
                                                <div class="button-changepic">

                                                    <input type="file" class="form-control" id="uploadpic" name="uploadpic" onchange="updateImage('employeeimage','uploadpic')" required>
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">Upload Employee Image!</div>

                                                </div>
                                                
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Employee Signature</label>
                                                <img src="./images/admindash/sample_signature.png" class="img-fluid" id="employeesignature" name="employeesignature">
                                        
                                                <div class="button-changesignature">

                                                    <input type="file" class="form-control" id="change_signature" name="change_signature" onchange="updateImage('employeesignature','change_signature')" required>
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">Upload Employee Digital Signature!</div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="row p-2">

                                            <label class="form-label text-center"><b>Education Background</b></label>

                                            <label class="form-label">High School:</label>

                                            <div class="col-md-4">

                                                <input type="text" class="form-control" id="hsnameofschool" name="hsnameofschool" placeholder="Name Of School" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter HS School Name!</div>
                                            
                                            </div>

                                            <div class="col-md-4">

                                                <input type="text" class="form-control" id="hscoursedegree" name="hscoursedegree" placeholder="Course/Degree" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter HS Degree!</div>
                                            
                                            </div>

                                            <div class="col-md-4">
                        
                                                <input type="number" class="form-control" id="hsyearcompleted" name="hsyearcompleted" placeholder="Year Completed" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter HS Year Completed!</div>
                                            
                                            </div>

                                        </div>

                                        <div class="row p-2">

                                            <label class="form-label">College:</label>

                                            <div class="col-md-4">

                                                <input type="text" class="form-control" id="collegenameofschool" name="collegenameofschool" placeholder="Name Of School" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter College School Name!</div>
                                            
                                            </div>

                                            <div class="col-md-4">

                                                <input type="text" class="form-control" id="collegecoursedegree" name="collegecoursedegree" placeholder="Course/Degree" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter College Degree!</div>
                                            
                                            </div>

                                            <div class="col-md-4">
                        
                                                <input type="text" class="form-control" id="collegeyearcompleted" name="collegeyearcompleted" placeholder="Year Completed" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter College Year Completed!</div>
                                            
                                            </div>

                                        </div>

                                        <div class="row p-2">

                                            <label class="form-label">Technical/Vocational:</label>

                                            <div class="col-md-4">

                                                <input type="text" class="form-control" id="vocationalnameofschool" name="vocationalnameofschool" placeholder="Name Of School" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Vocational School Name!</div>
                                            
                                            </div>

                                            <div class="col-md-4">

                                                <input type="text" class="form-control" id="vocationalcoursedegree" name="vocationalcoursedegree" placeholder="Course/Degree" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Vocational Degree!</div>
                                            
                                            </div>

                                            <div class="col-md-4">
                        
                                                <input type="text" class="form-control" id="vocationalyearcompleted" name="vocationalyearcompleted" placeholder="Year Completed" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Vocational Year Completed!</div>
                                            
                                            </div>

                                        </div>



                                        <div class="row p-2 pt-5">

                                            <label class="form-label text-center"><b>Work Experiences</b></label>

                                            <div class="col-md-3">

                                                <label class="form-label">Company Name:</label>
                                                <input type="text" class="form-control" id="companyname1" name="companyname1" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Company Name!</div>
                                            
                                            </div>

                                            <div class="col-md-3">

                                                <label class="form-label">Position / Designation:</label>
                                                <input type="text" class="form-control" id="position1" name="position1" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Position / Designation!</div>
                                            
                                            </div>

                                            <div class="col-md-3">
                                                
                                                <label class="form-label">Company Address:</label>
                                                <input type="text" class="form-control" id="companyaddress1" name="companyaddress1"  required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Company Address!</div>
                                            
                                            </div>

                                            <div class="col-md-3">
                        
                                                <label class="form-label">Years Of Tenure:</label>
                                                <input type="text" class="form-control" id="yearsoftenure1" name="yearsoftenure1"  required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Years Of Tenure!</div>
                                            
                                            </div>

                                        </div>

                                        <div class="row p-2">

                                            <div class="col-md-3">

                                                <label class="form-label">Company Name:</label>
                                                <input type="text" class="form-control" id="companyname2" name="companyname2"  required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Company Name!</div>
                                            
                                            </div>

                                            <div class="col-md-3">

                                                <label class="form-label">Position / Designation:</label>
                                                <input type="text" class="form-control" id="position2" name="position2"  required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Position / Designation!</div>
                                            
                                            </div>

                                            <div class="col-md-3">
                                                
                                                <label class="form-label">Company Address:</label>
                                                <input type="text" class="form-control" id="companyaddress2" name="companyaddress2"  required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Company Address!</div>
                                            
                                            </div>

                                            <div class="col-md-3">
                        
                                                <label class="form-label">Years Of Tenure:</label>
                                                <input type="text" class="form-control" id="yearsoftenure2" name="yearsoftenure2"  required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Years Of Tenure!</div>
                                            
                                            </div>

                                        </div>

                                        <div class="row p-2">

                                            <div class="col-md-3">

                                                <label class="form-label">Company Name:</label>
                                                <input type="text" class="form-control" id="companyname3" name="companyname3"  required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Company Name!</div>
                                            
                                            </div>

                                            <div class="col-md-3">

                                                <label class="form-label">Position / Designation:</label>
                                                <input type="text" class="form-control" id="position3" name="position3"  required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Position / Designation!</div>
                                            
                                            </div>

                                            <div class="col-md-3">
                                                
                                                <label class="form-label">Company Address:</label>
                                                <input type="text" class="form-control" id="companyaddress3" name="companyaddress3"  required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Company Address!</div>
                                            
                                            </div>

                                            <div class="col-md-3">
                        
                                                <label class="form-label">Years Of Tenure:</label>
                                                <input type="text" class="form-control" id="yearsoftenure3" name="yearsoftenure3"  required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Years Of Tenure!</div>
                                            
                                            </div>

                                        </div>

                                        <div class="row p-2">

                                            <div class="col-md-3">

                                                <label class="form-label">Company Name:</label>
                                                <input type="text" class="form-control" id="companyname4" name="companyname4"  required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Company Name!</div>
                                            
                                            </div>

                                            <div class="col-md-3">

                                                <label class="form-label">Position / Designation:</label>
                                                <input type="text" class="form-control" id="position4" name="position4"  required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Position / Designation!</div>
                                            
                                            </div>

                                            <div class="col-md-3">
                                                
                                                <label class="form-label">Company Address:</label>
                                                <input type="text" class="form-control" id="companyaddress4" name="companyaddress4"  required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Company Address!</div>
                                            
                                            </div>

                                            <div class="col-md-3">
                        
                                                <label class="form-label">Years Of Tenure:</label>
                                                <input type="text" class="form-control" id="yearsoftenure4" name="yearsoftenure4"  required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Years Of Tenure!</div>
                                            
                                            </div>

                                        </div>

                                        <div class="row p-2">

                                            <div class="col-md-12">

                                                <label class="form-label">
                                                    Are you a member of any Law Enforcement Agency Before? If Yes, how many
                                                    years in service and state the reason / cause of separation from the service (Retired/Terminated/Awol):

                                                </label>
                                                <textarea class="form-control" id="employeeotherdata" name="employeeotherdata" required></textarea>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Enter Other Data!</div>

                                            </div>



                                        </div>
                                

                            </div>

                                        <div class="modal-footer">

                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="201submit">Save And Proceed</button>
                                    
                                        </div>

                                    </form>

                                                            
                                    @if(session('status'))

                                    <script>

                                        alert('{{ session('status') }}');

                                    </script>

                                    @endif

                                    </div>

                                </div>

            </div>

             <!--Modal Contents For Add Employee-->
             <div class="modal fade" id="addemployee" tabindex="-1" aria-labelledby="addemployee" aria-hidden="true">

                <form method="POST" action="addemployee" class="needs-validation" novalidate>
                    @csrf
                    <div class="modal-dialog">

                        <div class="modal-content">

                        <div class="modal-header">

                            <h1 class="modal-title fs-5" id="addemployee">Add Employee</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                        </div>

                        <div class="modal-body">
                            
                            <div class="container-md">

                                <div class="row pb-3">

                                    <div class="col-md-12">

                                        <label class="form-label" for="fullname">Employee Full Name:</label>
                                        <input type="text" class="form-control" name="fullname" id="fullname" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Enter Full Name!</div>
                

                                    </div>


                                </div>

                                <div class="row pb-3">

                                    <div class="col-md-12">

                                        <label class="form-label" for="clientdesignation">Client Designation:</label>
                                        <input type="text" class="form-control" name="clientdesignation" id="clientdesignation" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Enter Client Designation!</div>


                                    </div>

                                </div>

                                <div class="row pb-3">

                                    <div class="col-md-12">

                                        <label class="form-label" for="username">Username:</label>
                                        <input type="text" class="form-control" name="username" id="username" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Enter Username!</div>


                                    </div>

                                </div>

                                <div class="row pb-3">

                                    <div class="col-md-12">

                                        <label class="form-label" for="password">Password:</label>
                                        <input type="password" class="form-control" name="password" id="password" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Enter Password!</div>


                                    </div>

                                </div>

                                <div class="row pb-3">

                                    <div class="col-md-12">

                                        <label class="form-label" for="confirmpassword">Confirm Password:</label>
                                        <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Enter Confirm Password!</div>


                                    </div>

                                </div>

                                <div class="row pb-3">

                                    <p class="lead text-danger">Note: After Creation Of Employee Account, kindly fill out their Employee 201 Form immediately.</p>

                                </div>


                            </div>


                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="registeremployee" onclick="passwordvalid()">Add Employee</button>

                        </div>

                        </div>

                        @if(session('addemployeestatus'))

                        <script>
        
                            alert('{{ session('addemployeestatus') }}');
        
                        </script>
        
                        @endif

                    </div>

                </form>

            
            </div>

             <!--Modal Contents For Add Clients-->
             <div class="modal fade" id="addClient" tabindex="-1" aria-labelledby="addemployee" aria-hidden="true">

                <form method="POST" action="{{ route('add.client') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    <div class="modal-dialog">

                        <div class="modal-content">

                        <div class="modal-header">

                            <h1 class="modal-title fs-5" id="addemployee">Add Clients</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                        </div>

                        <div class="modal-body">
                            
                            <div class="container-md">

                                <div class="row pb-3">

                                    <div class="col-md-12">

                                        <label class="form-label" for="clientlogo">Client Logo:</label>
                                        <input type="file" class="form-control" name="clientlogo" id="clientlogo" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Upload Client Logo</div>
                

                                    </div>


                                </div>

                                <div class="row pb-3">

                                    <div class="col-md-12">

                                        <label class="form-label" for="clientname">Client Name:</label>
                                        <input type="text" class="form-control" name="clientname" id="clientname" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Enter Client Designation!</div>


                                    </div>

                                </div>

                            </div>


                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="addClient">Add Client</button>

                        </div>

                        </div>

                        @if(session('clientstatus'))

                        <script>
        
                            alert('{{ session('clientstatus') }}');
        
                        </script>
        
                        @endif

                    </div>

                </form>

            
            </div>
            
             <!--Modal Contents For Add Careers-->
             <div class="modal fade" id="addCareers" tabindex="-1" aria-labelledby="addcareers" aria-hidden="true">

                <form method="POST" action="{{url('addCareers')}}" class="needs-validation" novalidate>
                    @csrf
                    <div class="modal-dialog">

                        <div class="modal-content">

                        <div class="modal-header">

                            <h1 class="modal-title fs-5" id="addemployee">Add Careers</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                        </div>

                        <div class="modal-body">
                            
                            <div class="container-md">

                                <div class="row pb-3">

                                    <div class="col-md-12">

                                        <label class="form-label" for="Position Title">Position Title:</label>
                                        <input type="text" class="form-control" name="positiontitle" id="positiontitle" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Enter Full Name!</div>
                

                                    </div>


                                </div>

                                <div class="row pb-3">

                                    <div class="col-md-12">

                                        <label class="form-label" for="Location">Location:</label>
                                        <input type="text" class="form-control" name="location" id="location" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Enter Full Name!</div>
                

                                    </div>


                                </div>

                                <div class="row pb-3">

                                    <div class="col-md-12">

                                        <label class="form-label" for="Job Description">Job Description:</label>
                                        <textarea class="form-control" id="jobdescription" name="jobdescription"></textarea>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Enter Client Designation!</div>


                                    </div>

                                </div>

                                <div class="row pb-3">

                                    <div class="col-md-12">

                                        <h4 class="h4 pb-3">Qualifications</h4>

                                        <label class="form-label" for="qualifications">Qualifications 1:</label>
                                        <input type="text" class="form-control" name="qualifications1" id="qualifications1" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Enter Username!</div>


                                    </div>

                                </div>

                                <div class="row pb-3">

                                    <div class="col-md-12">

                                        <label class="form-label" for="qualifications">Qualifications 2:</label>
                                        <input type="text" class="form-control" name="qualifications2" id="qualifications2" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Enter Username!</div>


                                    </div>

                                </div>

                                
                                <div class="row pb-3">

                                    <div class="col-md-12">

                                        <label class="form-label" for="qualifications">Qualifications 3:</label>
                                        <input type="text" class="form-control" name="qualifications3" id="qualifications3" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Enter Username!</div>


                                    </div>

                                </div>

                                
                                <div class="row pb-3">

                                    <div class="col-md-12">

                                        <label class="form-label" for="qualifications">Qualifications 4:</label>
                                        <input type="text" class="form-control" name="qualifications4" id="qualifications4" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Enter Username!</div>


                                    </div>

                                </div>

                                
                                <div class="row pb-3">

                                    <div class="col-md-12">

                                        <label class="form-label" for="qualifications">Qualifications 5:</label>
                                        <input type="text" class="form-control" name="qualifications5" id="qualifications5" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Enter Username!</div>


                                    </div>

                                </div>

                                
                                <div class="row pb-3">

                                    <div class="col-md-12">

                                        <label class="form-label" for="qualifications">Qualifications 6:</label>
                                        <input type="text" class="form-control" name="qualifications6" id="qualifications6" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Enter Username!</div>


                                    </div>

                                </div>

                                
                                <div class="row pb-3">

                                    <div class="col-md-12">

                                        <label class="form-label" for="qualifications">Qualifications 7:</label>
                                        <input type="text" class="form-control" name="qualifications7" id="qualifications7" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Enter Username!</div>


                                    </div>

                                </div>

                                
                                <div class="row pb-3">

                                    <div class="col-md-12">

                                        <label class="form-label" for="qualifications">Qualifications 8:</label>
                                        <input type="text" class="form-control" name="qualifications8" id="qualifications8" required>
                                        <div class="valid-feedback">Looks good!</div>
                                        <div class="invalid-feedback">Enter Username!</div>


                                    </div>

                                </div>


                            </div>


                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Career</button>

                        </div>

                        </div>

                    </div>

                </form>

                @if(session('statusforcareer'))

                <script>

                    alert('{{ session('statusforcareer') }}');

                </script>

                @endif

            </div>

        <!--Copyright-->
        <div class="copyright_text container-md pt-5">

            <h6 class="h6 text-center text-white">COPYRIGHTS © 2024 DAWNGUARD SECURITY AGENCY | All Rights Reserved.</h4>

        </div>

    </div>

    <script src="{{ asset('javascript/201form.js') }}"></script>
    <script src="{{ asset('javascript/adminShowContent.js') }}"></script>
    <script src="{{ asset('javascript/passwordvalidations.js') }}"></script>
    <script src="{{ asset('javascript/formvalidations.js') }}"></script>
    <script src="{{ asset('javascript/deleteconfirmations.js') }}"></script>
    


</body>
</html>