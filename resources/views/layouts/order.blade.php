<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OhhBuddie | Online Shopping</title>
    
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
            background-color:black;
        }
        .translate-middle {
            transform: translate(-58%, -50%) !important;
        }
    </style>

</head>

<body>
 
<!-- Navbar -->
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
    
        
    
    <!-------Body  Section------>
    
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KCL2HTR9"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
</body>
</html>