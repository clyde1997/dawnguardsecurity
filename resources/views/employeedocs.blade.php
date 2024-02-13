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
    <title>Dawnguard Security Agency - Employee Documents</title>
</head>
<body>

    <div class="container-md pt-3">

        <div class="row pb-4">

            <!--Above Logo and contents-->
            <div class="row d-grid justify-content-center">

                <img src="{{ asset('images/userdash/logo_with_title.png') }}" class="img-fluid">

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

        </div>

 
        @if ($employeeDocuments)

            <div class="row table-responsive">

                <h4 class="h4 text-center pb-4">Documents</h4>

                
                <table class="table">

                        <thead>

                            <tr>
                                
                                <th scope="col">Filename</th>
                                <th scope="col">Upload Date</th>
        
                            </tr>
        
                        </thead>

                    @foreach ($employeeDocuments as $employeedocument)
        
                        <tbody>
        
                            <tr>
        
                                <td><a href="{{ route('download.documents', ['id' => $employeedocument->id]) }}" target="_blank">{{ $employeedocument->documents }}</a></td>
                                <td>{{ $employeedocument->created_at }}</td>
        
                            </tr>
        
                        </tbody>

                    @endforeach


                </table>

            </div>

            
        @else

        <script>

            alert('No Uploaded Documents From This Employee');
            window.close();

        </script>

        @endif
            
    </div>
    
    
</body>
</html>