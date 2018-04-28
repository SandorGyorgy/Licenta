<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
         <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        
         <meta name="csrf-token" content="{{ csrf_token() }}">
         
         <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
         rel="stylesheet" 
         integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
         crossorigin="anonymous"> 

         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         
         <style>
         body{
            background-color : #C5DBE3       ;
         }

          .pageStyle{
        background-color: white;
        border-radius: 5px;
       
    }

    .navbarCustom{
        

    }
         </style>
    </head>
    <body>


      
      <div id="app" class="container">
      
            <navbar-component></navbar-component>
            <div class="container mt-2 mb-2">
                <router-view></router-view>
            </div>

            <footer-component></footer-component>
      
      </div>



      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
         integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
         crossorigin="anonymous"></script>
<script src="/js/app.js"></script>
    </body>
</html>
