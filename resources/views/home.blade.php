<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

     <!--<link rel="shortcut icon" href="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Ohbuddielogo.png" />-->
    <link rel="icon" type="image/x-icon" href="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Ohbuddielogo.png">
    
    
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  
    <style>
        /* Hide desktop layout on small screens */
        @media screen and (max-width: 768px) {
            .desktop-layout {
                display: none;
            }
            .mobile-layout {
                display: block;
            }
        }

        /* Hide mobile layout on large screens */
        @media screen and (min-width: 769px) {
            .desktop-layout {
                display: block;
            }
            .mobile-layout {
                display: none;
            }
        }
    </style>
</head>
<body>
    



        <div class="desktop-layout">
            @include('mobile')
        </div>  


    <!-- Desktop Layout -->


    <!-- Mobile Layout -->
    <div class="mobile-layout">
        @include('mobile')
    </div>
</body>
</html>
