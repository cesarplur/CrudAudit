<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Test Audit</title>    
        <!--@push('js')-->
        <!--@endpush-->
        <script src="{{ asset('scripts/jquery/jquery-3.3.1.min.js') }}"></script>
        <link href="{{ asset('scripts/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('scripts/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">       
        
    <style>    
       .navbar{
            background-color: #007bff !important;
            --bs-navbar-padding-x: 100;
            --bs-navbar-padding-y: 0.5rem; 
            overflow: hidden;    
            position: fixed; 
            top: 0; 
            width: 100%;         
        }
        .nav-link{
            color: white !important;
            font-size:20px;
        }
        .navbar-brand{
            color: white !important;
            font-size:40px;
        }
        .my-lg-0{
            margin-left: auto !important;
        }
        #mainDiv{
             display: grid !important;
             width: 100%;             
             justify-content: center !important;
             align-items: center !important;
        }
        .tables {
             background-color: red !important;
        }
    </style>
    </head>
    <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Test</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                <a class="nav-link" href="#">Home</a>
                 </li>
                 <li class="nav-item">
                <a class="nav-link" href="#">Auditorias</a>
               </li>     
               <li class="nav-item">
                <a class="nav-link" href="#">Test</a>
               </li>    
               <li class="nav-item">
                <a class="nav-link" href="#">Hello world</a>
               </li>    
             </ul>
         <form class="form-inline my-2 my-lg-0" style="float: right;">
         <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
         <button class="btn btn-dark" type="submit">Buscar</button>    
        </div>
      </nav>
    </header>
         <!--@push('js')-->
        <!--@endpush-->
        <script src="{{ asset('scripts/js/popper.min.js') }}"></script>  
        <script src="{{ asset('scripts/jquery/bootstrap.min.js') }}"></script>         
        <script src="{{ asset('scripts/jquery/jquery.dataTables.min.js') }}" defer></script>         
        <script src="{{ asset('scripts/js/dataTables.bootstrap4.min.js') }}" defer></script>
        <script src="{{ asset('scripts/js/functions/typeAudit.js') }}" defer></script>
        <script src="{{ asset('scripts/js/functions/relAudits.js') }}" defer></script>
        <script src="{{ asset('scripts/js/functions/showAudits.js') }}" defer></script>
        <script src="{{ asset('scripts/js/functions/insertAudits.js') }}" defer></script>
    </body>
</html>