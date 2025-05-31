<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>OhhBuddie |Product Page</title>
    
     <link rel="icon" type="image/x-icon" href="https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Ohbuddielogo.png">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome for Wishlist Icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">



    <!-- Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}"> 

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


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
          width: 18vw;
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
   

    
</head>

<body>
        <nav class="navbar navbar-expand-lg" style="position:fixed;">
        <!-- Back Button -->
        <a href="javascript:history.back();" style="font-size: 17px; margin-right: 0px; color: white;">
           <i class="fa-solid fa-arrow-left"></i>
        </a>
    
        <!-- Logo -->
        <a class="navbar-brand" href="/" style="padding: 15px 11px;">
            <img src="{{ asset('public/assets/images/logo/logo_showloom.png') }}" class="logoimg" alt="Shoes">
        </a>
    
        <!-- Icons -->
        <div class="d-flex ml-auto align-items-center">
                                
            <div class="search-icon">
              
                <div class="search-container">
                    <input type="text" id="search-input" class="search-icon__input" placeholder="search ..." autocomplete="off"/>
                    <div id="search-results" class="search-results-dropdown" style="display: none;"></div>
                </div>            
    
    
            
                <div class="search-icon__wrapper">
                  <div class="search-icon__svg">
                    <!-- Search icon SVG -->
                    <!--<svg class="search-icon__svg-search" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 50 50" fill="none">-->
                    <!--  <circle cx="20" cy="20" r="9" stroke="white" stroke-width="2"/>-->
                    <!--  <line x1="26" y1="26" x2="34" y2="34" stroke="white" stroke-width="2" stroke-linecap="round"/>-->
                    <!--</svg>-->
                    
                    <a href="#" class="text-light search-icon__svg-search" style="font-size: 24px; font-weight: normal; margin-right: 20px;">
                        <i class="fas fa-search"></i>
                    </a>
                    
                    <!-- Close (X) icon SVG -->
                    <svg class="search-icon__svg-close" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 50 50" fill="none">
                      <line x1="15" y1="15" x2="35" y2="35" stroke="white" stroke-width="2" stroke-linecap="round"/>
                      <line x1="35" y1="15" x2="15" y2="35" stroke="white" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                  </div>
                </div>
              </div>


            <a href="/wishlist" class="text-light position-relative" style="font-size: 24px; font-weight: normal; margin-right: 20px;">
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

   
        @yield('content')
   






         


    <!-- Bootstrap JS Bundle -->
    <!-- Font Awesome JS -->
    <script>
        // Toggle wishlist icon color
        function toggleWishlist(icon) {
            icon.classList.toggle('selected');
        }
    </script>
    
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
         
    <!-- Add jQuery if you don't already have it -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        const searchIcon = document.querySelector(".search-icon__wrapper");
        searchIcon.addEventListener("click", e => {
        searchIcon.parentElement.classList.toggle("open");
        });

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
        
    
</body>

</html>