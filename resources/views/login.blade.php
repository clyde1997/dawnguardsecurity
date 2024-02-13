<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./images/dawnguard_logo.png">
    <title>Dawnguard Security Agency - Log In</title>
</head>
<body>

    <!--For Login Background Image-->
    <style>

        body{

            background-image: url("./images/login/gallery_pic4.jpg");
            width: auto;    

        }

    </style>       
    
    <div class="container-md d-inline justify-content-center">

          <!--Logo-->
        <div class="logo_container container-md pt-4 pb-4">

            <div class="row">

                <div class="col-md-12 d-flex justify-content-center">

                    <a href="./">

                        <img src="./images/logo_with_title.png" class="img-fluid">


                    </a>

                </div>


            </div>

        </div>

   
        <div class="form_container container-md">

            <!--Form for Employee-->
            <div class="collapse form_body container-md show active" id="employeeform">

                <form method="POST" action="employeelogin" id="user_login_form" class="form needs-validation" novalidate>
                    @csrf
                    <div class="row pb-4">
    
                        <div class="col-md-12">
        
                            <label class="form-label text-white"><b>User Name:</b></label>
                            <input type="text" class="form-control" name="employeeusername" id="employeeusername" placeholder="Enter Employee Username" required> 
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Enter Username!</div>
        
                        </div>
        
                    </div>
        
                    <div class="row pb-4">
        
                        <div class="col-md-12">
        
                            <label class="form-label text-white"><b>Password:</b></label>
                            <input type="password" class="form-control" name="employeepassword" id="employeepassword" placeholder="Enter Employee Password" required> 
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Enter Password!</div>
        
                        </div>
        
                    </div>

    
                    <div class="text-center pt-4">
    
                        <button class="btn btn-light" type="submit" name="proceedLogin">LOG IN</button>
    
    
                    </div>

    
                </form>

                
                @if(session('login_error'))

                <script>

                    alert('{{ session('login_error') }}');

                </script>

                @endif

            </div>          

        </div>

            <!--Home Button-->
        <div class="container-fluid pt-5">

            <div class="row text-center">

                <div class="Home Button">

                    <a href="./" class="btn btn-dark">

                        <span>
        
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
                            </svg>
        
                        </span>

                        Back To Home
        
                    </a>

                </div>

            </div>

        </div>

        <!--Copyright-->
        <div class="copyright_text container-md pt-5">

            <h6 class="h6 text-center">COPYRIGHTS © 2024 DAWNGUARD SECURITY AGENCY | All Rights Reserved.</h4>

        </div>

    </div>

    <script src="{{ asset('javascript/formvalidations.js') }}"></script>

</body>
</html>