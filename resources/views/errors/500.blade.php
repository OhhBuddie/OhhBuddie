<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>Server Error</title>
    <style>
        body {
            margin: 0;
            background-color: #f8f9fa;
        }
        
        /* Default image settings */
        .mobile-image, .desktop-image {
            width: 100%;
            height: 100vh;
            object-fit: cover;
        }

        /* Hide the desktop image by default */
        .desktop-image {
            display: none;
        }

        /* Show the desktop image only on larger screens */
        @media (min-width: 1024px) {
            .mobile-image {
                display: none;
            }
            .desktop-image {
                display: block;
        }
    </style>
</head>
<body>
    <!-- Mobile image (Full screen) -->
    <img class="mobile-image" src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Error+Page/somthingwrong+copy+(1).jpg" alt="500 Server Error">

    <!-- Desktop image (Centered) -->
    <img class="desktop-image" src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Error+Page/somthingwrong2+copy+(1).jpg" alt="500 Server Error">
</body>
</html>
