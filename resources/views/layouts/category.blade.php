<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
     <link rel="icon" type="image/x-icon" href="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Ohbuddielogo.png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome for Wishlist Icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">-->

    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}"> 
    <!-- {{-- <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">  --}} -->
    
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>-->
    <!--<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>-->
    
    <!-- Bootstrap's JS and CSS (you can use a CDN link) -->
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>-->
    <!--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>-->
    <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>-->
    
    <!--Bootstrap Carausel-->
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>-->
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-KCL2HTR9');</script>
    <!-- End Google Tag Manager -->
    

    <style>
        .product-img {
            height: 280px;
            object-fit: fill;
        }

        .price-wishlist {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .wishlist-icon {
            font-size: 1.2rem;
            /*color: gray;*/
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
            background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(150, 19, 17, 1) 35%, rgba(150, 19, 17, 1) 100%);
            margin-right: -5px;
            overflow: hidden;
        }

        .circle-icon i {
            font-size: 30px;
            /* Icon size */
            color: white;
            /* Icon color */
            animation: blink 1s infinite;
            /* Blinking animation */
        }

        .circle-icon span {
            font-size: 12px;
            /* Adjust text size */
            color: white;
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

        .col-6 {
            padding: 0px;
            margin: 0px;
        }


        .btn {
            font-size: 1rem;
        }

        .fixed-bottom-navbar {
            position:fixed;
            bottom: -2px;
            right:0;
            left:0;
            height: 60px;
            /* Adjust height */
            padding: 0 20px;
        }

        .divider {
            width: 1px;
            height: 30px;
            background-color: #ddd;
        }

        button i {
            font-size: 1.25rem;
            /* Adjust icon size */
        }
    </style>
    
    <!--Accordian -->
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
          transform: none; /* Prevent zoom effect */
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
          transform: rotate(90deg); /* Rotate to simulate arrow down */
        }

    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg" style="position:fixed;">
        <!-- Back Button -->
        <a href="javascript:history.back();" style="font-size: 17px; margin-right: 0px; color: white;">
           <i class="fa-solid fa-arrow-left"></i>
        </a>
    
        <!-- Logo -->
        <a class="navbar-brand" href="/" style="padding: 15px 28px;">
            <img src="{{ asset('public/assets/images/logo/logo_showloom.png') }}" class="logoimg" alt="Shoes">
        </a>
    
        <!-- Icons -->
        <div class="d-flex ml-auto align-items-center">
            <a href="#" class="text-light" style="font-size: 24px; font-weight: normal; margin-right: 20px;">
                <i class="fas fa-search"></i>
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
    <div class="container" style="padding: 0px;">
        @yield('content')
    </div>




     @if($products->isEmpty())
     
     @else
         <div class="accordion" style="margin-bottom:58px; padding:0px; margin-top: 0px;">
            <div class="accordion-item" style="border:none;">
              <button class="accordion-header d-flex justify-content-between" style="margin-left-20px">
                Know More About OhhBuddie
                <i class="fa-solid fa-angles-right fs-1"></i>
              </button>
              <div class="accordion-content">
                
           

                <footer class="footer" > 
                  
        
                    <div class="container" style="background-color:black; color:white;">
                        <div style="margin-bottom: 70px;">
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
                                     <span style="color: white;"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cd/Facebook_logo_%28square%29.png/600px-Facebook_logo_%28square%29.png" style="height:24px;"> 
                                     <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/X_logo.jpg/600px-X_logo.jpg" style="height:24px;">  
                                     <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Instagram_logo_2022.svg/150px-Instagram_logo_2022.svg.png" style="height:24px;">   
                                     <img src="https://i.pinimg.com/736x/6b/ab/30/6bab3017350ca04c6fa05569672bd31e.jpg" style="height:24px;">  </span>
                                </div>
                            </div>
                         
                            <div class="col-md-4 text-md-start mb-2">
                             
                                <h5 class="mt-2" style="font-weight:bold;">CUSTOMER SERVICES</h5>
                                <div class="social-links d-flex flex-column">
                                    <span style="color: white;">Terms & Conditions  |  Privacy Policy | Return & Replacement | Seller Policy
                                    | Return Policy | FAQ | Shipping Policy | </span>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-4 text-md-start mb-2">
                                <br>
                                <h5 class="mt-2" style="font-weight:bold;">USEFUL LINKS</h5>
                                <div class="social-links d-flex flex-column">
                                    <span style="color: white;">About Us  |  Contact Us | Blog | Site Map</span>
                                </div>
        
                            </div>
        
                             @if (Auth::check())
                                <br>
                                <div class="col-md-4 text-md-start mb-2">
                                    <br>
                                    
                                    <h5 class="mt-2" style="font-weight:bold;">MY ACCOUNT  </h5>
                                    <div class="social-links d-flex flex-column">
                                        <span style="color: white;">Logout  | Order History | My Wishlist | Track Order</span>
                                    </div>
                                    
                                </div>
                            @endif
                                <br>
                                <div class="col-md-12 text-md-start mb-2 text-center">
                                    <br>
                                    
                                    <h5 class="mt-2"><i style="font-size:14px" class="fa">&#xf1f9;</i> 2025 www.showloom.com All rights reserved</h5>
                                    
                                    
                                </div>
                                <hr>
                                <br>
                                
                                
                                <div class="col-md-12 text-md-start mb-2">
                                    <br>
                                    
                                    <h5 class="mt-2" style="font-weight:bold;">POPULAR SEARCHES  </h5>
                                    <div class="social-links d-flex flex-column">
                                        <span style="color: white;">Makeup | Dresses For Girls | T-Shirts | Sandals | Headphones | Babydolls | Blazers For Men | Handbags | Ladies Watches | Bags  
                                        | Sport Shoes | Reebok Shoes | Puma Shoes | Boxers | Wallets | Tops | Earrings | Fastrack Watches | Kurtis | Nike | Smart Watches | Titan Watches | Designer Blouse |
                                        Gowns | Rings </span>
                                    </div>
                                    
                                </div>
                                
                               <br>
                                <div class="col-md-12 text-md-start mb-2">
                                    <br>
                                    
                                    <h5 class="mt-2" style="font-weight:bold;">POPULAR SEARCHES  </h5>
                                    <div class="social-links d-flex flex-column">
                                        <span>ONLINE SHOPPING MADE EASY AT OhhBuddie
                    If you would like to experience the best of online shopping for men, women and kids in India, you are at the right place. OhhBuddieis the ultimate destination for fashion and lifestyle, being host to a wide array of merchandise including clothing, footwear, accessories, jewellery, personal care products and more. It is time to redefine your style statement with our treasure-trove of trendy items. Our online store brings you the latest in designer products straight out of fashion houses. You can shop online at OhhBuddiefrom the comfort of your home and get your favourites delivered right to your doorstep.
                    
                    BEST ONLINE SHOPPING SITE IN INDIA FOR FASHION
                    Be it clothing, footwear or accessories, OhhBuddieoffers you the ideal combination of fashion and functionality for men, women and kids. You will realise that the sky is the limit when it comes to the types of outfits that you can purchase for different occasions.
                    
                    Smart men’s clothing - At OhhBuddieyou will find myriad options in smart formal shirts and trousers, cool T-shirts and jeans, or kurta and pyjama combinations for men. Wear your attitude with printed T-shirts. Create the back-to-campus vibe with varsity T-shirts and distressed jeans. Be it gingham, buffalo, or window-pane style, checked shirts are unbeatably smart. Team them up with chinos, cuffed jeans or cropped trousers for a smart casual look. Opt for a stylish layered look with biker jackets. Head out in cloudy weather with courage in water-resistant jackets. Browse through our innerwear section to find supportive garments which would keep you confident in any outfit.
                    Trendy women’s clothing - Online shopping for women at OhhBuddieis a mood-elevating experience. Look hip and stay comfortable with chinos and printed shorts this summer. Look hot on your date dressed in a little black dress, or opt for red dresses for a sassy vibe. Striped dresses and T-shirts represent the classic spirit of nautical fashion. Choose your favourites from among Bardot, off-shoulder, shirt-style, blouson, embroidered and peplum tops, to name a few. Team them up with skinny-fit jeans, skirts or palazzos. Kurtis and jeans make the perfect fusion-wear combination for the cool urbanite. Our grand sarees and lehenga-choli selections are perfect to make an impression at big social events such as weddings. Our salwar-kameez sets, kurtas and Patiala suits make comfortable options for regular wear.
                    Fashionable footwear - While clothes maketh the man, the type of footwear you wear reflects your personality. We bring you an exhaustive lineup of options in casual shoes for men, such as sneakers and loafers. Make a power statement at work dressed in brogues and oxfords. Practice for your marathon with running shoes for men and women. Choose shoes for individual games such as tennis, football, basketball, and the like. Or step into the casual style and comfort offered by sandals, sliders, and flip-flops. Explore our lineup of fashionable footwear for ladies, including pumps, heeled boots, wedge-heels, and pencil-heels. Or enjoy the best of comfort and style with embellished and metallic flats.
                    Stylish accessories - OhhBuddieis one of the best online shopping sites for classy accessories that perfectly complement your outfits. You can select smart analogue or digital watches and match them up with belts and ties. Pick up spacious bags, backpacks, and wallets to store your essentials in style. Whether you prefer minimal jewellery or grand and sparkling pieces, our online jewellery collection offers you many impressive options.
                    Fun and frolic - Online shopping for kids at OhhBuddieis a complete joy. Your little princess is going to love the wide variety of pretty dresses, ballerina shoes, headbands and clips. Delight your son by picking up sports shoes, superhero T-shirts, football jerseys and much more from our online store. Check out our lineup of toys with which you can create memories to cherish.
                    Beauty begins here - You can also refresh, rejuvenate and reveal beautiful skin with personal care, beauty and grooming products from ShowLoom. Our soaps, shower gels, skin care creams, lotions and other ayurvedic products are specially formulated to reduce the effect of aging and offer the ideal cleansing experience. Keep your scalp clean and your hair uber-stylish with shampoos and hair care products. Choose makeup to enhance your natural beauty.
                    OhhBuddieis one of the best online shopping sites in India which could help transform your living spaces completely. Add colour and personality to your bedrooms with bed linen and curtains. Use smart tableware to impress your guest. Wall decor, clocks, photo frames and artificial plants are sure to breathe life into any corner of your home.
                    
                    AFFORDABLE FASHION AT YOUR FINGERTIPS
                    OhhBuddieis one of the unique online shopping sites in India where fashion is accessible to all. Check out our new arrivals to view the latest designer clothing, footwear and accessories in the market. You can get your hands on the trendiest style every season in western wear. You can also avail the best of ethnic fashion during all Indian festive occasions. You are sure to be impressed with our seasonal discounts on footwear, trousers, shirts, backpacks and more. The end-of-season sale is the ultimate experience when fashion gets unbelievably affordable.
                    
                    OhhBuddieINSIDER
                    Every online shopping experience is precious. Hence, a cashless reward-based customer loyalty program called OhhBuddieInsider was introduced to enhance your online experience. The program is applicable to every registered customer and measures rewards in the form of Insider Points.
                    
                    There are four levels to achieve in the program, as the Insider Points accumulate. They are - Insider, Select, Elite or Icon. Apart from offering discounts on OhhBuddieand partner platform coupons, each tier comes with its own special perks.
                    
                    Insider
                    
                    Opportunity to master any domain in fashion with tips from celebrity stylists at OhhBuddieMasterclass sessions.
                    Curated collections from celeb stylists.
                    Elite
                    
                    VIP access to special sale events such as the End of Reason Sale (EORS) and product launches.
                    Exclusive early access to Limited Edition products
        
        
        
                    </span>
                                    </div>
                                    
                                </div>
                            
                            
                        </div>
                    </div>
                </footer>

     
              </div>
            </div>
            
          </div>
     
     @endif

    <!-- @if($products->isEmpty())-->
     
    <!-- @else-->
    <!-- Fixed Bottom Navbar -->
    <!--<div class="fixed-bottom-navbar d-flex justify-content-around align-items-center" style="background-color:black;">-->
        <!-- Sort Button -->
    <!--    <button class="btn-lg d-flex align-items-center gap-2"  style="background-color:transparent; border: none;">-->
    <!--        <i class="bi bi-sort-down" style="font-size:16px; color:white;"></i> <!-- Font Awesome icon for Sort -->
    <!--       <span style="font-size:16px; color:white;">SORT</span> -->
    <!--    </button>-->

    <!--    <div class="divider"></div>-->

        <!-- Filter Button -->
    <!--    <button class="btn-lg d-flex align-items-center gap-2" style="background-color:transparent; border:none;">-->
    <!--        <i class="bi bi-funnel" style="font-size:16px; color:white;"></i> <!-- Font Awesome icon for Filter -->
    <!--                  <span style="font-size:16px; color:white;">FILTER</span> -->
 
    <!--    </button>-->
    <!--</div>-->
    <!--@endif-->
    



    <!-- Bootstrap JS Bundle -->
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>-->
    <!-- Font Awesome JS -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>-->
    
        
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
        // Toggle wishlist icon color
        function toggleWishlist(icon) {
            icon.classList.toggle('selected');
        }
    </script>
     <script>

        // Accordian 
        
        document.addEventListener("DOMContentLoaded", () => {
          const accordionHeaders = document.querySelectorAll(".accordion-header");
        
          accordionHeaders.forEach(header => {
            header.addEventListener("click", () => {
              const content = header.nextElementSibling;
              const icon = header.querySelector("i");
        
              // Toggle content visibility
              const isVisible = content.style.display === "block";
              content.style.display = isVisible ? "none" : "block";
        
              // Toggle icon rotation
              icon.classList.toggle("rotate", !isVisible);
            });
          });
        });
    </script>
    
        
    <!-------Body  Section------>
    
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KCL2HTR9"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
</body>
</html>