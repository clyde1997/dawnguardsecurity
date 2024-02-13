<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="{{ asset('css/navfooter.css') }}" rel="stylesheet">
    <link href="{{ asset('css/aboutus.css') }}" rel="stylesheet">
    <link href="{{ asset('css/scrollAnimations.css') }}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./images/dawnguard_logo.png">
    <title>Dawnguard Security Agency - About Us</title>

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

         <!--Navbar-->
        <div class="row">

            <nav class="navbar navbar-expand-md navbar_main">
                
                <div class="container-fluid">

                    <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbar">

                        <ul class="navbar-nav">

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
    
    <!--Our Vision-->
    <div class="ourVision_container container-md pt-5 pb-5">

        <div class="scroll-animations  row">

            <div class="col-md-6">

                <img src="./images/aboutus/gallery_pic1.jpg" class="img-fluid">

            </div>

            <div class="col-md-6 d-inline-grid justify-content-center">
 
                <p>
                    <h3 class="h1"><b>Our Vision</b></h3>
                    To be among the most trusted, service-oriented security agency by achieving the optimal customer satisfaction and provide the best and friendliest service possible and be an exemplary employer in the Philippines as peace, safety and prosperity to our employees and clients are our top priority.
                </p>

            </div>

        </div>

    </div>

    <!--Our Mission-->
    <div class="ourMission_container container-md pt-5 pb-5">

        <div class="scroll-animations  row">

            <div class="col-md-6 d-inline-grid justify-content-center">
 
                <p>
                    <h3 class="h1"><b>Our Mission</b></h3>
                    To provide and serve clients the ultimate protection of its assets through quality and efficient security services characterized by utmost dedication, honesty, and integrity and deliver the highest quality of professional private security services based on trust and confidence.                </p>

            </div>

            <div class="col-md-6">

                <img src="./images/aboutus/gallery_pic2.jpg" class="img-fluid">

            </div>

        </div>

    </div>

     <!--DawnGuard Content-->
     <div class="dawnguard_container container-md pt-5 pb-5">

        <div class="scroll-animations  row">

            <div class="col-md-6">

                <img src="./images/dawnguard_logo.png" class="img-fluid">

            </div>

            <div class="col-md-6 d-flex align-items-center">
 
                <p>
                    <b>DAWNGUARD SECURITY AGENCY</b> is a duly licensed security service provider operating throughout the country and is being managed by well-experienced, professional, dynamic, and highly trained people who are committed in catering quality security service to meet the demands of clients. It has developed stronger relationship with business leaders and ably supported by the current leadership of the NBI, PNP, AFP and Local Officials. As such, it has flexible and accessible leaders and managers.                
                </p>
                    
            </div>

        </div>

    </div>

    
     <!--personnel contents-->
     <div class="personnel_contents container-md pb-5 pt-3">

        <div class="scroll-animations  row">

            <h4 class="h4"><b>Meet The Team</b></h4>

        </div>

        <div class="scroll-animations  row">

            <div class="carousel carousel-fade carousel-dark" id="cater_carousel" data-bs-ride="carousel">

                <div class="carousel-indicators">

                    <button type="button" data-bs-target="#cater_carousel" data-bs-slide-to="0" class="active" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#cater_carousel" data-bs-slide-to="1"  aria-label="Slide 2"></button>
    
                </div>

                <div class="carousel-inner pb-5 p-4">
    
                    <div class="carousel-item active" data-bs-interval="4000">
    
                        <div class="row">

                            <div class="col-md-3 p-3">

                                <div class="personnel_Card1 card h-100">
    
                                    <img src="{{ asset('./images/aboutus/rolando_pic.jpg') }}" class="img-fluid">
        
                                    <div class="card-body">
            
                                        <div class="card-title">

                                            <h3 class="h4 text-center">Mr. Rolando M. Alimboyong</h3>


                                        </div>

                                        <div class="card-text">

                                            <p class="text-center">Owner/ Licensee/Manager<p>
    
                                        </div>

                                
                                    </div>
            
                                </div>

                            </div>

                            <div class="col-md-3 p-3">

                                <div class="personnel_Card2 card h-100">
    
                                    <img src="{{ asset('./images/aboutus/ace_pic.jpg') }}" class="img-fluid">
        
                                    <div class="card-body">
            
                                        <div class="card-title">

                                            <h3 class="h4 text-center">S.O Ace T. Alimboyong</h3>


                                        </div>

                                        <div class="card-text">

                                            <p class="text-center">Personnel/Administrative Officer</p>
    
                                        </div>

                                
                                    </div>
            
                                </div>

                            </div>

                            <div class="col-md-3 p-3">

                                <div class="personnel_Card3 card h-100">
    
                                    <img src="{{ asset('./images/aboutus/sarah_pic.jpg') }}" class="img-fluid">
        
                                    <div class="card-body">
            
                                        <div class="card-title">

                                            <h3 class="h4 text-center">Ms.Sarah Joy T. Alimboyong</h3>


                                        </div>

                                        <div class="card-text">

                                            <p class="text-center">Finance & Accounting Officer</p>
    
                                        </div>
                                
                                    </div>
            
                                </div>
        
                            </div>

                            <div class="col-md-3 p-3">

                                <div class="personnel_Card4 card h-100">
    
                                    <img src="./images/aboutus/profile_empty.jpg" class="img-fluid">
        
                                    <div class="card-body">
                     
                                        <div class="card-title">

                                            <h3 class="h4 text-center">SO Ogie Q. Murillo</h3>


                                        </div>

                                        <div class="card-text">

                                            <p class="text-center">Operations Officer</p>
    
                                        </div>

                                
                                    </div>
            
                                </div>

                            </div>
                            
                        </div>
    
                    </div>
    
                    <div class="carousel-item" data-bs-interval="4000">
    
                        <div class="row">

                            <div class="col-md-3 p-3">

                                <div class="personnel_Card5 card h-100">
    
                                    <img src="./images/aboutus/profile_empty.jpg" class="img-fluid">
        
                                    <div class="card-body">
            
                                        <div class="card-title">

                                            <h3 class="h4 text-center">AGT. Reynante  S. Acosta, CSP</h3>


                                        </div>

                                        <div class="card-text">

                                            <p class="text-center">Consultant on Security Matters</p>
    
                                        </div>

                                
                                    </div>
            
                                </div>

                            </div>

                            <div class="col-md-3 p-3">

                                <div class="personnel_Card6 card h-100">
    
                                    <img src="./images/aboutus/profile_empty.jpg" class="img-fluid">
        
                                    <div class="card-body">
            
                                        <div class="card-title">

                                            <h3 class="h4 text-center">AGT. Manuel L. Sanchez, CSP</h3>


                                        </div>

                                        <div class="card-text">

                                            <p class="text-center">Consultant on Security Matters</p>
    
                                        </div>

                                
                                    </div>
            
                                </div>

                            </div>

                            <div class="col-md-3 p-3">

                                <div class="personnel_Card7 card h-100">
    
                                    <img src="./images/aboutus/profile_empty.jpg" class="img-fluid">
        
                                    <div class="card-body">
            
                                        <div class="card-title">

                                            <h3 class="h4 text-center">Lt. Col. William C.Cruzana (Ret. PA)</h3>


                                        </div>

                                        <div class="card-text">

                                            <p class="text-center">Consultant on Security Matters</p>
    
                                        </div>

                                
                                    </div>
            
                                </div>

                            </div>

                            <div class="col-md-3 p-3">

                                <div class="personnel_Card8 card h-100">
    
                                    <img src="./images/aboutus/profile_empty.jpg" class="img-fluid">
        
                                    <div class="card-body">
            
                                        <div class="card-title">

                                            <h3 class="h4 text-center">ATTY. Ernesto V. Cabrera</h3>


                                        </div>

                                        <div class="card-text">

                                            <p class="text-center">Legal  Advisers</p>
    
                                        </div>

                                
                                    </div>
            
                                </div>

                            </div>

                            
                        </div>
    
                    </div>
    
    
                </div>
    
            </div>


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
                        <a href="#">
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