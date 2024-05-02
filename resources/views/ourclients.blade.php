<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="{{ asset('css/navfooter.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ourclients.css') }}" rel="stylesheet">
    <link href="{{ asset('css/scrollAnimations.css') }}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./images/dawnguard_logo.png">
    <title>Dawnguard Security Agency - Our Clients</title>
</head>
<body>

    
    <!--CSS For Navbar Hover Animation Effects-->
    <style>

        .navbarLinks a{

            position: relative;

        }

        .navbarLinks a::before{

            content: '';
            position: absolute;
            width: 100%;
            height: 4px;
            border-radius: 4px;
            background-color: rgb(243, 165, 21);
            bottom: 0;
            left: 0;
            transform-origin: right;
            transform: scaleX(0);
            transition: transform .3s ease-in-out;

        }


        .navbarLinks a:hover::before{

            transform-origin: left;
            transform: scaleX(1);

        }


    </style>

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

         <!--Navbar-->
        <div class="row">

            <nav class="navbar navbar-expand-md navbar_main">
                
                <div class="container-fluid">

                    <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbar">

                        <ul class="navbarLinks navbar-nav">

                            <li class="nav-item pe-5">
                                <a class="nav-link text-light" href="./">Home</a>
                            </li>

                            <li class="nav-item pe-5">
                                <a class="nav-link text-light" href="aboutus">About Us</a>
                            </li>

                            <li class="nav-item pe-5">
                                <a class="nav-link text-light" href="ourclients">Our Clients</a>
                            </li>

                            <li class="nav-item pe-5">
                                <a class="nav-link text-light" href="careers">Careers</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-light" href="contactus">Contact Us</a>
                            </li>

                        </ul>

                    </div>

                        <Button type="button" class="btn btn-light">

                            <a href="login" class="nav-link">Employee Log In</a>

                        </Button>

                </div>

            </nav>

        </div>

    </div>

    <!--Our Clients-->
    <div class="scroll-animations container-md pt-5 pb-5">

        <div class="row">

            <h5 class="h2 text-center pb-2" style="color:  rgb(66, 89, 124);"><b>OUR VALUED CLIENTS</b></h5>
            <hr class="border border-dark" style="width: 50%; margin: 0 25% 0 25%;">
            <h6 class="h4 text-center pt-3" style="color:  rgb(66, 89, 124);">"We Secure And Protect"</h6>


        </div>

     

        <div class="scroll-animations row pt-5">

            <div class="clients_container container-fluid">

                <div class="row d-flex justify-content-center">

                    @if ($clients)

                    @foreach ($clients as $client)
                  
                    <!--Fixed Col-md-3 in order for the auto responsiveness of Clients Container neither Row when added from Admin Dash-->
                    <div class="clients_col col-md-3 p-3" style="width: 20rem;">

                        <div class="clients_Card card h-100">
    
                            <img src="{{ asset('clientlogos/' . $client->clientlogo) }}" class="img-fluid">
    
                            <div class="card-body">
    
                                <h3 class="client_title h4 text-center card-title"> {{ $client->clientname }} </h3>
    
                            </div>
    
                        </div>
    
                    </div>
    
                    
                     @endforeach

                     @endif
                     

                </div>

            </div>


        </div>
            
     
            
      

    </div>

    <!--Ready To Get Started-->
    <div class="get_started container-fluid">

        <div class="row pb-3">

            <h4 class="h3 text-center text-white">READY TO GET STARTED?</h4>

        </div>

        <Div class="row pb-3">

            <div class="col-md-5">

                <hr class="text-white">

            </div>

            <div class="col-md-2 d-flex justify-content-center">

                <span class="text-white">

                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-shield-shaded" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 14.933a1 1 0 0 0 .1-.025q.114-.034.294-.118c.24-.113.547-.29.893-.533a10.7 10.7 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.8 11.8 0 0 1-2.517 2.453 7 7 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7 7 0 0 1-1.048-.625 11.8 11.8 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 63 63 0 0 1 5.072.56"/>
                    </svg>
                    
                </span>

            </div>

            <div class="col-md-5">

                <hr class="text-white">

            </div>

        </Div>

        <div class="row pb-3">

            <h4 class="h4 text-center text-white">For more information of our security and manpower services, get in touch with us now!</h4>

        </div>

        <div class="text-center">

            <a href="contactus" class="btn btn-light text-center">REQUEST INFORMATION</a>

        </div>

    </div>


    <!--Footer-->
    <footer class="pt-5">

        <div class="footer_main container-fluid p-5">

            <div class="row">

                <div class="footer_dawnguard col-md-4">
                    

                    <div class="row">

                        <img src="./images/logo_with_title.png" class="img-fluid" style="width: 30rem;">

                    </div>

                    <div class="row">

                        <p><b>DAWNGUARD SECURITY AGENCY </b>is a duly licensed security service provider operating throughout the country and is being managed by well-experienced, professional, dynamic, and highly trained people who are committed in catering quality security service to meet the demands of clients.</p>

                    </div>

                    <div class="row">

                        <span>
                            <a href="https://www.facebook.com/dawnguard.sec.agency" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z"/></svg>
                            </a>
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" height="34" width="34" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"/></svg>                            </a>
                        </span>

                        

                    </div>

               
                    
                </div>   
                
    
                <div class="footer_main_links col-md-4 pt-4">

                    
                    <h6 class="h6"><b>Main Links:</b></h6>

                    <ul class="navbar-nav">

                        <li class="nav-item">

                            <a class="nav-link pb-3" href="index">Home</a> 

                        </li>

                        <li class="nav-item">

                            <a class="nav-link pb-3" href="aboutus">About US</a> 

                        </li>

                        <li class="nav-item">

                            <a class="nav-link pb-3" href="ourclients">Our Clients</a> 

                        </li>

                        <li class="nav-item">

                            <a class="nav-link pb-3" href="careers">Careers</a> 

                        </li>

                        <li class="nav-item">

                            <a class="nav-link pb-3" href="contactus">Contact Us</a>

                        </li>

                    </ul>
                     

                </div>

                <div class="footer_contact col-md-4 pt-4">

                   <div class="row">

                        <h6><b>Contact Info:</b></h6>

                        <div class="col-md">
    
                                <p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/></svg>
                                    Block 134 Lot 6 Unit 2E C. Arellano St., Katarungan Village, Poblacion, Muntinlupa City 1776
                                </p>

                                <p>

                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                                      </svg>

                                      (02) 70041668 / (02) 88263450 / 09175148697 /     09477615170
                                </p>

                                <p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"/>
                                      </svg>
                                      dawnguard.sec.agency@gmail.com
            
                                </p>

                            
                        </div>
                    

                   </div>

                </div>

            </div>

        </div>

        <div class="footer_copyright container-fluid p-2">

            <p class="text-center">COPYRIGHTS © 2024 DAWNGUARD SECURITY AGENCY | All Rights Reserved.</p>

        </div>


    </footer>


    <script src="{{ asset('javascript/pagesAnimations.js') }}"></script>
    
</body>
</html>