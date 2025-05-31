<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Keep all your existing head content -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>OhhBuddie | Online Shopping</title>
    <link rel="icon" type="image/x-icon"
        href="https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Ohbuddielogo.png">
    <!-- Font Awesome for Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/mobile_marque.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <!-- Bootstrap's JS and CSS (you can use a CDN link) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!--Bootstrap Carausel-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-KCL2HTR9');
    </script>
    <!-- End Google Tag Manager -->


    <style>
        /* Desktop specific styles */
        @media (min-width: 992px) {
            .website-container {
                width: 40%;
                margin: 0 auto;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            }

            .fixed-top-container {
                width: 40% !important;
                left: 50%;
                transform: translateX(-50%);
            }

            .bottom-navbar {
                width: 40% !important;
                left: 50%;
                bottom: 0px;
                transform: translateX(-50%);
            }
        }

        /* Mobile reset styles */
        @media (max-width: 991px) {
            .website-container {
                width: 100% !important;
                margin: 0;
                box-shadow: none;
            }

            .fixed-top-container {
                width: 100% !important;
                left: 0;
                transform: none;
            }

            .bottom-navbar {
                width: 100% !important;
                left: 0;
                bottom: 0px;
                transform: none;
            }

            .main-body {
                margin-top: 90px !important;
            }
        }

        /* Keep existing styles */
        .main-body {
            background-color: black;
            color: white;
        }

        /* Rest of your existing styles */
    </style>
    <!-- Add your desktop layout constraint CSS here -->
    <style>
        /* Container for the entire website content */
        .website-container {
            width: 40%;
            margin: 0 auto;
            position: relative;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: black;
        }

        /* Only apply this layout on desktop screens */
        @media (max-width: 1200px) {
            .website-container {
                width: 100%;
            }
        }

        /* Make sure all content respects the container */
        .fixed-top-container {
            position: fixed;
            top: 0;
            width: 40%;
            z-index: 1000;
        }

        /* Adjust the width of bottom navbar */
        .bottom-navbar {
            width: 40%;
            left: 50%;
            transform: translateX(-50%);
        }

        /* Make sure accordion respects container width */
        .accordion {
            width: 100%;
        }

        /* Make sure main content area respects container width */
        .main-body {
            width: 100%;
        }

        /* Adjust navbar elements positioning */
        .navbar {
            width: 100%;
        }

        /* Override any full-width elements */
        .container-fluid,
        .container {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        /* Keep your existing styles below */
        .main-body {
            margin-top: 90px;
            background-color: black;
            color: white;
        }

        /* Rest of your existing styles */
        .circle-icon {
            display: inline-flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: radial-gradient(at right center, #D7CCB7, #EFC475);
            margin-right: -5px;
            overflow: hidden;
            font-weight: bold;
            font-family: cursive;

        }

        /* Keep all your other existing styles */
    </style>
    <style>
        .accordion-header {
            background-color: black;
            color: white;
            padding: 15px;
            border: none;
            width: 100%;
            text-align: left;
            font-size: 16px;
            cursor: pointer;
            outline: none;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: background-color 0.2s ease;
        }

        .accordion-header:focus {
            outline: none;
        }

        .accordion-header:active {
            transform: none;
            /* Prevent zoom effect */
        }

        .accordion-content {
            display: none;
            /*padding: 15px;*/
            background-color: black;
            /*border-top: 1px solid #ddd;*/
        }

        .accordion-content.open {
            display: block;
        }

        .accordion i {
            transition: transform 0.2s ease;
        }

        .accordion i.rotate {
            transform: rotate(90deg);
            /* Rotate to simulate arrow down */
        }
    


    </style>
    
    
    
    
    
    
    
    
    <style>
        .translate-middle {
            transform: translate(-58%, -50%) !important;
        }
    </style>
    <style>
        :root {
          --icon-height: 3rem;
          --transition-speed: .45s;
          --timing-function: cubic-bezier(.66, 1.51, .77, 1.13);
          --icon-color: white;
        }
    
        * {
          box-sizing: border-box;
          margin: 0;
          padding: 0;
        }
    
        body {
          background: black;
        }
    
        .search-icon {
          box-sizing: border-box;
          width: var(--icon-height);
          height: var(--icon-height);
          transition: all var(--transition-speed) linear, border-color 0s linear var(--transition-speed);
          border: solid 1px;
          border-color: rgba(255, 255, 255, 0);
          border-radius: 100px;
          padding: .25em;
          z-index: 1001;
          display: flex;
          align-items: center;
          position: relative;
          margin-right: 10px;
        }
    
         .search-icon__wrapper {
          width: var(--icon-height);
          height: var(--icon-height);
          position: absolute;
          border-radius: 100px;
          top: -4px;
          right: 4px;
          display: flex;
          align-items: center;
          justify-content: center;
          cursor: pointer;
          z-index: 1002;
        }
    
        .search-icon__input {
          background: none;
          text-align: center;
          outline: none;
          display: block;
          border: none;
          background: rgba(255, 255, 255, 0);
          width: calc(100% - (var(--icon-height)));
          height: 100%;
          border-radius: 100px;
          transition: all var(--transition-speed) linear;
          font-size: 1em;
          padding: 0.5em 0px 0.5em 0.5em;
          color: white;
        }
    
        .search-icon__input::placeholder {
          color: rgba(255, 255, 255, .75);
        }
    
        .search-icon__svg {
          display: block;
          width: calc(var(--icon-height) * 0.7);
          height: calc(var(--icon-height) * 0.7);
          transition: all var(--transition-speed) var(--timing-function);
        }
    
        .search-icon.open {
          width: 38vw;
          border-color: var(--icon-color);
          transition-delay: var(--transition-speed);
        }
    
        .search-icon.open .search-icon__input {
          transition-delay: var(--transition-speed);
          text-align: left;
        }
    
        .search-icon__svg-search {
          display: block;
            position: absolute;
            transition: opacity var(--transition-speed) var(--timing-function);
            top: 0px;
        }
    
        .search-icon__svg-close {
          display: block;
        opacity: 0;
        position: absolute;
        top: 2px;
        right: -6px;
    
        transition: opacity var(--transition-speed) var(--timing-function);
        }
    
        .search-icon.open .search-icon__svg-search {
          opacity: 0;
        }
    
        .search-icon.open .search-icon__svg-close {
          opacity: 1;
        }
    
        /* Responsive adjustments */
        @media (max-width: 480px) {
          .search-icon.open {
            width: 34vw;
          }
        }
      </style>
      
              

    <style>
    /* !important styles to override any conflicts */
    .search-results-dropdown {
      position: absolute !important;
      background-color: white !important;
      border: 1px solid #ddd !important;
      border-radius: 4px !important;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1) !important;
      z-index: 10000 !important;
      max-height: 300px !important;
      overflow-y: auto !important;
    }
    
    .search-section {
      padding: 10px 0 !important;
    }
    
    .search-section-title {
      color: #666 !important;
      font-size: 10px !important;
      text-transform: uppercase !important;
      padding: 5px 15px !important;
      margin: 0 !important;
      background-color: #f5f5f5 !important;
    }
    
    .search-item {
      padding: 8px 15px !important;
      cursor: pointer !important;
      transition: background-color 0.2s !important;
    }
    
    .search-item:hover {
      background-color: #f0f0f0 !important;
    }
    </style>
    <!-- Keep all your existing styles -->
</head>

<body>
    <!-- Google Tag Manager -->

    <!-- Wrap your entire website content in a container div -->
    <div class="website-container">
        <div class="fixed-top-container">
            <!-- Information Slider -->
            <marquee class="marq" direction="left">
                ️Delivery In 69 Minutes 🚀 &nbsp;&nbsp;&nbsp;&nbsp;Trendiest Styles Available 👗
                &nbsp;&nbsp;&nbsp;&nbsp;Hot Deals From Top Brands 🔥 &nbsp;&nbsp;&nbsp;&nbsp;
                ️Delivery In 69 Minutes 🚀 &nbsp;&nbsp;&nbsp;&nbsp;Trendiest Styles Available 👗
                &nbsp;&nbsp;&nbsp;&nbsp;Hot Deals From Top Brands 🔥 &nbsp;&nbsp;&nbsp;&nbsp;
                ️Delivery In 69 Minutes 🚀 &nbsp;&nbsp;&nbsp;&nbsp;Trendiest Styles Available 👗
                &nbsp;&nbsp;&nbsp;&nbsp;Hot Deals From Top Brands 🔥 &nbsp;&nbsp;&nbsp;&nbsp;
            </marquee>

            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg" style="margin-top: -5px;">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('public/assets/images/logo/logo_showloom.png') }}" class="logoimg"
                        alt="Shoes">
                </a>

                <!-- Icons -->
                <div class="d-flex ml-auto align-items-center">

                    <div class="search-icon">
              
                        <div class="search-container">
                            <input type="text" id="search-input" class="search-icon__input" placeholder="search ..." />
                            <div id="search-results" class="search-results-dropdown" style="display: none;"></div>
                        </div>            
            
            
                    
                        <div class="search-icon__wrapper">
                          <div class="search-icon__svg">
                            <!-- Search icon SVG -->
                            <svg class="search-icon__svg-search" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 50 50" fill="none">
                              <circle cx="20" cy="20" r="9" stroke="white" stroke-width="2"/>
                              <line x1="26" y1="26" x2="34" y2="34" stroke="white" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                            
                            <!-- Close (X) icon SVG -->
                            <svg class="search-icon__svg-close" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 50 50" fill="none">
                              <line x1="15" y1="15" x2="35" y2="35" stroke="white" stroke-width="2" stroke-linecap="round"/>
                              <line x1="35" y1="15" x2="15" y2="35" stroke="white" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                          </div>
                        </div>
                      </div>





                    <a href="/wishlist" class="text-light position-relative"
                        style="font-size: 24px; font-weight: normal; margin-right: 20px;">
                        <i class="far fa-heart"></i>
                    </a>

                    <a href="/addtocart" class="text-light position-relative"
                        style="font-size: 24px; font-weight: normal;">
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
                                    $cartCount = DB::table('carts')
                                        ->where('temp_user_id', $tempUserId)
                                        ->where('user_id', 0)
                                        ->count();
                                }
                            }
                        @endphp

                        @if ($cartCount > 0)
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
                            <span
                                class="cart-count bag-count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ $cartCount }}
                            </span>
                        @else
                            <span
                                class="cart-count bag-count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                0
                            </span>
                        @endif
                    </a>
                </div>
            </nav>
        </div>

        <div class="main-body">
            @yield('content')
        </div>

        <div class="bottom-navbar">
            <ul>
                &nbsp;
                <li>
                    <a href="/">
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
                        <span class="blink-text text-dark">69-Min</span>
                        <span class="blink-text text-dark">Delivery</span>
                    </a>

                    <style>
                        .blink-text {
                            animation: blinker 1s linear infinite;
                            font-weight: 700 !important;
                            /* Force bold */
                            color: black;
                            font-family: cursive;
                        }

                        @keyframes blinker {
                            50% {
                                opacity: 0;
                            }
                        }
                    </style>

                </li>
                <li>
                    <a href="/explore">
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

        <div class="accordion" style="margin-bottom:69px;">
            
            <div class="accordion-item">
                <div class="accordion-header d-flex justify-content-between" style="margin-left-20px">
                    Know More About Ohh! Buddie
                    <i class="fa-solid fa-angles-right fs-1 rotatee"></i>
                </div>
                
     

                <div class="accordion-content" style="display: none;">
                    
                    
                    <footer class="footer" style="text-align:justify">


                        <div class="container" style="background-color:black; color:white;">
                            <div class="row" style="margin-bottom: 70px;">
                                <div class="col-md-4 text-md-start mb-2">
                                    <h5 class="mt-2" style="font-weight:bold;">SHOP FOR</h5>
                                    <div class="social-links d-flex flex-column">
                                        <span style="color: white;">Explore | Men | Women | Kids | Try Out</span>
                                    </div>
                                </div>


                                <div class="col-md-4 text-md-start mb-2">
                                    <br>
                                    <h5 class="mt-2" style="font-weight:bold;">CONNECT WITH US</h5>
                                    <div class="social-links d-flex flex-column">
                                        <span style="color: white;"><img
                                                src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cd/Facebook_logo_%28square%29.png/600px-Facebook_logo_%28square%29.png"
                                                style="height:24px;">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/X_logo.jpg/600px-X_logo.jpg"
                                                style="height:24px;">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Instagram_logo_2022.svg/150px-Instagram_logo_2022.svg.png"
                                                style="height:24px;">
                                            <img src="https://i.pinimg.com/736x/6b/ab/30/6bab3017350ca04c6fa05569672bd31e.jpg"
                                                style="height:24px;"> </span>
                                    </div>
                                </div>

                                <div class="col-md-4 text-md-start mb-2">

                                    <h5 class="mt-2" style="font-weight:bold;">CUSTOMER SERVICES</h5>
                                    <div class="social-links d-flex flex-column">
                                        <span style="color: white; text-decoration:none;"><a
                                                href="https://ohhbuddie.com/terms-and-condition"
                                                style="color:white; text-decoration:none;">Terms & Conditions</a> | <a
                                                href="https://ohhbuddie.com/privacy-policy"
                                                style="color:white; text-decoration:none;">Privacy Policy</a> |<a
                                                href="https://ohhbuddie.com/return-refund" style="color:white;">
                                                Return & Replacement</a>
                                            | <a href="https://ohhbuddie.com/Shipping-and-Delivery-Policy"
                                                style="color:white; text-decoration:none;">Shipping Policy</a></span>
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-4 text-md-start mb-2">
                                    <br>
                                    <h5 class="mt-2" style="font-weight:bold;">USEFUL LINKS</h5>
                                    <div class="social-links d-flex flex-column">
                                        <span style="color: white; text-decoration:none;"><a
                                                href="https://ohhbuddie.com/about-us"
                                                style="color:white; text-decoration:none;">About Us</a> | <a
                                                href="https://ohhbuddie.com/contact-us"
                                                style="color:white; text-decoration:none;">Contact Us</a></span>
                                    </div>

                                </div>

                                @if (Auth::check())
                                    <br>
                                    <div class="col-md-4 text-md-start mb-2">
                                        <br>

                                        <h5 class="mt-2" style="font-weight:bold;">MY ACCOUNT </h5>
                                        <div class="social-links d-flex flex-column">
                                            <span style="color: white;"><a href="/logout">Logout</a> | Order History
                                                |<a href="/wishlist">My Wishlist</a> | Track Order</span>
                                        </div>

                                    </div>
                                @endif
                                <br>
                                <div class="col-md-12 text-md-start mb-2 text-center">
                                    <br>

                                    <h5 class="mt-2"><i style="font-size:14px" class="fa">&#xf1f9;</i> 2025
                                        www.ohhbuddie.com All rights reserved</h5>


                                </div>
                                <hr>
                                <br>


                                <div class="col-md-12 text-md-start mb-2">
                                    <br>

                                    <h5 class="mt-2" style="font-weight:bold;">POPULAR SEARCHES </h5>
                                    <div class="social-links d-flex flex-column">
                                        <span style="color: white;"> Dresses For Girls | T-Shirts | Sandals | Babydolls| Sport Shoes | Boxers | Tops | Kurtis | Designer Blouse |Gowns </span>
                                    </div>

                                </div>

                                <br>
                                <div class="col-md-12 text-md-start mb-2">
                                    <br>

                                    <h5 class="mt-2" style="font-weight:bold;">POPULAR SEARCHES </h5>
                                    <div class="social-links d-flex flex-column">
                                        <span>ONLINE SHOPPING MADE EASY AT Ohhbuddie
                                            <h3><b>ONLINE SHOPPING MADE EASY AT OHH! BUDDIE</h3></b>

                                            <p>If you're looking for the best online shopping experience for men, women,
                                                and kids in India, you've arrived at the perfect destination. Ohh!
                                                Buddie is your one-stop shop for fashion and lifestyle, offering a vast
                                                selection of clothing, footwear, accessories, jewellery, personal care
                                                products, and more. It's time to redefine your style statement with our
                                                exclusive range of trendy and affordable fashion. Enjoy the ease of
                                                online shopping and get your favorite styles delivered straight to your
                                                doorstep!</p>

                                            <h3><b>BEST ONLINE FASHION DESTINATION IN INDIA</h3></b>

                                            <p>Whether you're searching for stylish clothing, trendy footwear, or
                                                must-have accessories, Ohh! Buddie combines fashion and functionality
                                                for everyone. With limitless outfit options for all occasions, we ensure
                                                that you step out in style every day.</p>

                                            <h3><b>Smart Men’s Fashion</h3></b>

                                            <p>Upgrade your wardrobe with sleek formal shirts, trendy T-shirts, dapper
                                                jeans, and classic kurta-pyjama sets. Add an edge to your look with
                                                printed tees, varsity styles, or checkered shirts that pair perfectly
                                                with chinos and cuffed jeans. Brave the elements in biker jackets and
                                                water-resistant outerwear, and explore our innerwear range for all-day
                                                comfort and confidence.</p>

                                            <h3><b>Trendy Women’s Fashion</h3></b>

                                            <p>Shopping for women’s fashion at Ohh! Buddie is an exciting experience!
                                                Stay comfortable in chinos and printed shorts, turn heads in a little
                                                black dress, or embrace nautical fashion with striped tees and dresses.
                                                Whether you're drawn to off-shoulder, embroidered, or peplum tops, pair
                                                them effortlessly with skirts, palazzos, or skinny-fit jeans. For
                                                traditional elegance, explore our sarees, lehenga-choli sets, and
                                                salwar-kameez options that make a statement at any event.</p>

                                            <h3><b>Fashionable Footwear</h3></b>

                                            <p>Your footwear speaks volumes about your personality, and at Ohh! Buddie,
                                                we’ve got something for everyone! From stylish sneakers and loafers to
                                                classic brogues and oxfords, your work-to-weekend style is covered. Find
                                                running shoes, sports-specific footwear, sandals, sliders, and more.
                                                Women can enjoy pumps, heeled boots, and metallic flats that blend
                                                comfort with glam.</p>

                                            <h3><b>Shopping for Kids Made Fun</h3></b>

                                            <p>Your little ones deserve the best! Explore adorable dresses, ballerina
                                                shoes, superhero tees, and fun jerseys. Our wide range of toys ensures
                                                playtime is filled with joy and creativity.</p>




                                        </span>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </footer>

                </div>
            </div>
        </div>
    </div>

       <script>
    const searchIcon = document.querySelector(".search-icon__wrapper");
    searchIcon.addEventListener("click", e => {
      searchIcon.parentElement.classList.toggle("open");
    });
  </script>
    
<!-- Add jQuery if you don't already have it -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
$(document).ready(function() {
    console.log("jQuery search script loaded");
    
    // Direct reference to your search elements
    const $searchInput = $("#search-input");
    let $searchResults = $("#search-results");
    
    // Check if elements exist
    if ($searchInput.length === 0) {
        console.error("Search input not found");
        return;
    }
    
    if ($searchResults.length === 0) {
        console.log("Search results container not found, creating one");
        // Create the results container if it doesn't exist
        $searchInput.after('<div id="search-results" class="search-results-dropdown"></div>');
        $searchResults = $("#search-results");
    }
    
    let typingTimer;
    const doneTypingInterval = 300;
    
    // Handle input events
    $searchInput.on("input", function() {
        const searchValue = $(this).val().trim();
        console.log("Search input: " + searchValue);
        
        clearTimeout(typingTimer);
        
        if (searchValue.length > 0) {
            typingTimer = setTimeout(function() {
                performSearch(searchValue);
            }, doneTypingInterval);
        } else {
            $searchResults.empty().hide();
        }
    });
    
    // Close dropdown when clicking outside
    $(document).on("click", function(event) {
        if (!$(event.target).closest(".search-container, #search-results").length) {
            $searchResults.hide();
        }
    });
    
    function performSearch(query) {
        console.log("Performing search for: " + query);

        // AJAX search
        $.ajax({
            url: "/search",
            data: { q: query },
            type: "GET",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                console.log("Search successful", data);
                displayResults(data);
            },
            error: function(error) {
                console.error("Search error:", error);
                $searchResults.html('<div class="search-item">An error occurred while searching</div>').show();
                positionDropdown();
            }
        });
    }
    
    function displayResults(data) {
        // Clear previous results
        $searchResults.empty();
        
        // Check if we have results
        const hasCategories = data.categories && data.categories.length > 0;
        const hasProducts = data.products && data.products.length > 0;
        
        if (!hasCategories && !hasProducts) {
            $searchResults.html('<div class="search-item">No results found</div>');
            positionDropdown();
            return;
        }
        
        // Categories section
        if (hasCategories) {
            const $categorySection = $('<div class="search-section"></div>');
            $categorySection.append('<div class="search-section-title">CATEGORY SUGGESTIONS</div>');
            
            $.each(data.categories, function(i, category) {
                const $item = $('<div class="search-item"></div>').text(category.name);
                $item.on("click", function() {
                    // Using the encrypted ID directly
                    window.location.href = "/category/" + encodeURIComponent(category.id);
                });
                $categorySection.append($item);
            });
            
            $searchResults.append($categorySection);
        }
        
        // Products section
        if (hasProducts) {
            const $productsSection = $('<div class="search-section"></div>');
            $productsSection.append('<div class="search-section-title">PRODUCTS</div>');
            
            $.each(data.products, function(i, product) {
                const $item = $('<div class="search-item"></div>').text(product.product_name);
                $item.on("click", function() {
                    // Using the encrypted ID directly
                    window.location.href = "/product/" + encodeURIComponent(product.id);
                });
                $productsSection.append($item);
            });
            
            $searchResults.append($productsSection);
        }
        
        // Position and show the dropdown
        positionDropdown();
    }
    
    function positionDropdown() {
        // Position the dropdown directly below the search input
        const inputPos = $searchInput.position(); // Use position instead of offset
        const inputHeight = $searchInput.outerHeight();
        const inputWidth = $searchInput.outerWidth();
        
        // Get the parent container's position (to handle relative positioning)
        const parentOffset = $searchInput.parent().offset();
        const searchInputOffset = $searchInput.offset();
        
        // Set the dropdown position
        $searchResults.css({
            position: 'absolute',
            top: (inputPos.top + inputHeight) + 'px',
            left: ( inputPos.left - 10 ) + 'px',
            width: (inputWidth + 50) + 'px',
            zIndex: 10000
        }).show();
    }
    
    // Apply dropdown styling
    $searchResults.css({
        backgroundColor: 'white',
        border: '1px solid #ddd',
        borderRadius: '4px',
        boxShadow: '0 2px 10px rgba(0,0,0,0.1)',
        maxHeight: '300px',
        overflowY: 'auto'
    });
    
});
</script>
    
    
    
    
    
    <script>
        // Accordian 

      document.querySelectorAll(".accordion-header").forEach(header => {
  header.addEventListener("click", () => {
    const content = header.nextElementSibling;
    const icon = header.querySelector(".rotatee");

    const isOpen = content.style.display === "block";

    // Toggle content visibility
    content.style.display = isOpen ? "none" : "block";

    // Toggle rotation class
    icon.classList.toggle("rotate", !isOpen);
  });
});




    </script>



    <script>
        function toggleSearchBar() {
            const searchInput = document.querySelector('.search-input');
            searchInput.classList.toggle('active');

            if (searchInput.classList.contains('active')) {
                // Small delay to ensure transition works properly on mobile
                setTimeout(() => {
                    searchInput.focus();
                }, 50);
            }
        }

        // Close search when clicking outside (optional but helpful on mobile)
        document.addEventListener('click', function(event) {
            const searchContainer = document.querySelector('.search-container');
            const searchInput = document.querySelector('.search-input');

            if (!searchContainer.contains(event.target) && searchInput.classList.contains('active')) {
                searchInput.classList.remove('active');
            }
        });

        // Prevent the search container click from closing the search
        document.querySelector('.search-container').addEventListener('click', function(event) {
            event.stopPropagation();
        });
    </script>
    @if (Auth::check())
    <script src="https://cdn.logrocket.io/LogRocket.min.js"></script>
    <script>
        LogRocket.init('a4hegy/ohh-buddie'); // Replace this with your actual LogRocket ID

        LogRocket.identify("{{ Auth::user()->id }}", {
            name: "{{ Auth::user()->name }}",
            email: "{{ Auth::user()->email }}",
            phone: "{{ Auth::user()->phone }}"
        });
    </script>
    @endif
    <!-------Body  Section------>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KCL2HTR9" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>

</body>

</html>
