 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ohhbuddie | Online Shopping</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="icon" type="image/x-icon" href="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Ohbuddielogo.png">
    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <!-- Bootstrap's JS and CSS (you can use a CDN link) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!--Bootstrap Carausel-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Google Tag Manager -->
    
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-KCL2HTR9');</script>
    <!-- End Google Tag Manager -->
    
  
    <style>
    
        .main-body{
            background-color: black;
            
        }
        .product-img {
            height: 150px;
            object-fit: fill;
        }

        .price-wishlist {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .wishlist-icon {
            font-size: 1.2rem;
            color: gray;
            cursor: pointer;
        }

        .wishlist-icon.selected {
            color: #dc3545;
        }


        .footer {
            font-family: sans-serif;
        }

        .footer a {
            text-decoration: none;
            color: #000;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .footer h6 {
            font-weight: bold;
            color: #000;
        }

        .footer ul {
            padding: 0;
            list-style: none;
        }

        .footer ul li {
            margin-bottom: 5px;
        }

        .footer button {
            color: white;
            background: #961311;
        }

        .footer-img img {
            width: 111px;
            height: 60px;


        }

        /* Styles for the Bottom Navbar */
        .bottom-navbar {
            display: none;
            position: fixed;
            bottom: 20;
            left: 0;
            width: 100%;
            background-color: black;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .bottom-navbar ul {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin: 0;
            padding: 5px 0;
            list-style: none;
        }

        .bottom-navbar ul li {
            text-align: center;
        }

        .bottom-navbar ul li a {
            text-decoration: none;
            color: white;
            font-size: 14px;
        }

        .bottom-navbar ul li a i {
            font-size: 20px;
            display: block;
        }

        /* Show navbar on small screens */
        @media (max-width: 768px) {
            .bottom-navbar {
                display: block;
            }
        }

        .circle-icon {
            display: inline-flex;
            flex-direction: column;
            /* Stack the icon and text vertically */
            align-items: center;
            /* Center both the icon and text */
            justify-content: center;
            /* Center the content inside the circle */
            text-align: center;
            position: relative;
            width: 60px;
            /* Adjust the size of the circle */
            height: 60px;
            /* Adjust the size of the circle */
            border-radius: 50%;
            /* Make it a circle */
            background: var(--primary-color);
            margin-right: -5px;
            overflow: hidden;
        }

        .circle-icon i {
            font-size: 30px;
            /* Icon size */
            color: black;
            /* Icon color */
            animation: blink 1s infinite;
            /* Blinking animation */
        }

        .circle-icon span {
            font-size: 12px;
            /* Adjust text size */
            color: black;
            /* Text color */
        }

        /* Blinking animation */
        @keyframes blink {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .circle-icon:hover {
            background: linear-gradient(45deg, #ffcc00, #ff6f61, #66ff66, #66ccff);
            /* Hover effect */
        }

        .slideimg {
            height: 600px;
        }

        .rating {
            color: #ffc107;
        }

        .rating .fa-star {
            margin-right: 0px;
        }
    </style>
           <style>
            body {
                visibility: hidden; /* Initially hide body content */
            }
            
            #content {
                display: none; /* Initially hide main content */
            }
            
            /* Preloader styles */
            #preloader {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(255, 255, 255, 0.7);
                display: flex;
                justify-content: center;
                align-items: center;
                z-index: 9999; /* Ensure it stays on top */
            }
            
            #preloader img {
                width: 150px; /* Adjust size as needed */
                height: auto;
            }
          </style>
        <style>
            .translate-middle {
                transform: translate(-58%, -50%) !important;
            }
        </style>
        @stack('style')

        <script>
            const AIZ = window.AIZ || {};
            AIZ.local = {
                nothing_selected: 'Nothing selected',
                nothing_found: 'Nothing found',
                choose_file: 'Choose File',
                file_selected: 'File selected',
                files_selected: 'Files selected',
                add_more_files: 'Add more files',
                adding_more_files: 'Adding more files',
                drop_files_here_paste_or: 'Drop files here, paste or',
                browse: 'Browse',
                upload_complete: 'Upload complete',
                upload_paused: 'Upload paused',
                resume_upload: 'Resume upload',
                pause_upload: 'Pause upload',
                retry_upload: 'Retry upload',
                cancel_upload: 'Cancel upload',
                uploading: 'Uploading',
                processing: 'Processing',
                complete: 'Complete',
                file: 'File',
                files: 'Files',
            }
        </script>

</head>

<body>

    {{-- <div id="preloader">
        <img src="https://media.showloom.com/uploads/all/for-web-2-unscreen.gif" alt="Loading...">
    </div> --}}
  
    <nav class="navbar navbar-expand-lg" style="position:fixed;">

        <a class="navbar-brand" href="/">
            <img src="{{ asset('public/assets/images/logo/logo_showloom.png') }}" class="logoimg" alt="Shoes">
        </a>

        <!-- Icons -->
        <div class="d-flex ml-auto align-items-center">
            <!--<button onclick="myFunction()">Switch Mode</button>-->
          <a href="#" class="text-light" style="font-size: 24px; font-weight: normal; margin-right: 5px;">
            <!--<i class="fas fa-search"></i>-->
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
              <circle cx="20" cy="20" r="9" stroke="white" stroke-width="2"/>
              <line x1="26" y1="26" x2="34" y2="34" stroke="white" stroke-width="2" stroke-linecap="round"/>
            </svg>
          </a>
          <a href="#" class="text-light position-relative" style="font-size: 24px; font-weight: normal; margin-right: 20px;">
                <i class="far fa-heart"></i>
                
            </a>
                      <a href="/addtocart" class="text-light position-relative" style="font-size: 24px; font-weight: normal;">
                <i class="fa fa-shopping-bag"></i>
                  
            @php
                $cartCount = 0;
            
                if (Auth::check()) {
                    // Logged-in user: Fetch cart count using user_id
                    $cartCount = DB::table('carts')->where('user_id', Auth::id())->count();
                } else {
                    // Guest user: Fetch temp_user_id from session or cookies
                    $tempUserId = session('temp_user_id') ?? request()->cookie('temp_user_id');
                    
                    if ($tempUserId) {
                        $cartCount = DB::table('carts')->where('temp_user_id', $tempUserId)->where('user_id', 0)->count();
                    }
                }
            @endphp


            @if($cartCount > 0)
                <style>
                    .cart-count {
                        opacity: 0;
                        transform: scale(0.5);
                        animation: fadeInScale 0.5s ease-in-out forwards;
                    }
            
                    @keyframes fadeInScale {
                        from {
                            opacity: 0;
                            transform: scale(0.5);
                        }
                        to {
                            opacity: 1;
                            transform: scale(1);
                        }
                    }
                </style>
            
                <span class="cart-count bag-count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{ $cartCount }}
                </span>
                
            @else
                <span class="cart-count bag-count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                   0
                </span>
            
            @endif
            </a>

        </div>
    </nav>



    <div class="main-body">
         @yield('content')
    </div>



    <!-- Footer Section -->


    <div class="bottom-navbar">
        <ul>
            &nbsp;
            <li>
                <a href="/welcome">
                    <i class="fas fa-home"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="#search">
                    <i class="fa fa-shopping-cart"></i>
                    Shop
                </a>
            </li>
            <li>
                <a href="#orders" class="circle-icon">
                    <i class="fas fa-shirt"></i>
                    <span>Tryout</span>
                </a>
            </li>
            <li>
                <a href="/explore">
                    <!--<i class="fas fa-shopping-cart"></i>-->
                     <i class="fas fa-search"></i>
                    Explore
                </a>
            </li>
            <li>
                <a href="{{ url('/account') }}">
                    <i class="fas fa-user"></i>
                    Profile
                </a>
            </li>
            &nbsp;
        </ul>

    </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
      
      <script>
        document.addEventListener("DOMContentLoaded", function () {
        let tempUserId = localStorage.getItem("temp_user_id") || getCookie("temp_user_id");
    
        if (!tempUserId) {
            tempUserId = "temp_" + new Date().getTime();
            localStorage.setItem("temp_user_id", tempUserId);
            document.cookie = `temp_user_id=${tempUserId}; path=/;`;
        }
    
        updateCartCount(tempUserId);
    
        // Poll server every 5 seconds for real-time updates
        setInterval(() => {
            updateCartCount(tempUserId);
        }, 5000);
    });
    
    // Function to fetch cart count
    function updateCartCount(tempUserId) {
        fetch(`/cart/count?temp_user_id=${tempUserId}`)
            .then(response => response.json())
            .then(data => {
                let cartCountElement = document.querySelector(".bag-count");
                if (cartCountElement) {
                    cartCountElement.textContent = data.count;
                }
            });
    }
    
    // Function to get cookie value
    function getCookie(name) {
        let matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }
    
    // Function to call after adding to cart
    function onAddToCartSuccess() {
        let tempUserId = localStorage.getItem("temp_user_id") || getCookie("temp_user_id");
        updateCartCount(tempUserId); // Update immediately after adding an item
    }

    </script>
      <script>
        window.addEventListener('load', function () {
            // Hide the preloader after page load
            document.getElementById('preloader').style.display = 'none';
            
            // Show the main content after page load
            document.body.style.visibility = 'visible'; // Show body content
            document.getElementById('content').style.display = 'block'; // Show main content
        });
      </script>
  
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const nav = document.querySelector('nav');
        const body = document.body;

        if (nav) {
            body.classList.add('has-nav');
        } else {
            body.classList.remove('has-nav');
        }
    });
</script>
<script>
    let slideIndex = 0;
    showSlides();

    // Auto-scroll functionality
    function showSlides() {
        let slides = document.getElementsByClassName("mySlides");
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) { slideIndex = 1 }
        slides[slideIndex - 1].style.display = "block";
        setTimeout(showSlides, 5000); // Change slide every 5 seconds
    }

    // Manual slide control
    function plusSlides(n) {
        showManualSlides(slideIndex += n);
    }

    function showManualSlides(n) {
        let slides = document.getElementsByClassName("mySlides");
        if (n > slides.length) { slideIndex = 1 }
        if (n < 1) { slideIndex = slides.length }
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[slideIndex - 1].style.display = "block";
    }
</script>
  
    <!-------Body  Section------>
    
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KCL2HTR9"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    
</html>