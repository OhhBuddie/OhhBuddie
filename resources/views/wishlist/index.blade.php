<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>Ohhbuddie | WishList</title>
    
    <link rel="icon" type="image/x-icon" href="https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Ohbuddielogo.png">
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <style>
        @media (min-width: 778px) {
            
            .navbar-fixed-top{
                left: 29% !important;
                right: 29% !important;
            }
            .container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
                max-width: 40% !important;
            }
            .badge {
                --bs-badge-padding-x: 0.35em !important;
                --bs-badge-padding-y: 0.15em !important;
                --bs-badge-font-size: 0.5em !important;
            }
        }    
    </style>
    
    
    <style>
         .navbar-fixed-top {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
            background: black;
            /*border-bottom: 1px solid #ddd;*/
        }
        .header {
            padding: 16px;
            font-size: 16px;
            font-weight: bold;
            color:white;
        }

        .card{
             border-radius: 8px;
             background: white; 
             color: black;
            
        }
        
        .card img{
            border-radius: unset;
            height: 25vh;
        }
        
        .card-text{
            font-size: 13px;
        }
        
        .card-body{
   
            display: flex;
            padding: 5px 10px 10px 10px;
            flex-direction: column;
        }
        .price-wishlist {
            display: flex;
           
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
        
        .rating{
            bottom: 215px; right: 10px; background-color:#04AA6D; color: white; padding: 2px 8px; border-radius: 12px; font-size: 14px;
        }
        
        .move{
             background-color: black; 
             color: var(--primary-color); 
             border:1px solid #333; 
             width: 100%;
        }
        
        .col-6{
            width: 49%;
        }
        
        .form-control{
            border: var(--bs-border-width) solid black;
        }
        
        .size-selector {
            appearance: none; /* Hides the default arrow */
            -webkit-appearance: none; /* Safari fix */
            -moz-appearance: none; /* Firefox fix */
            background: url('https://cdn-icons-png.flaticon.com/16/32/32195.png') no-repeat right 10px center;
            background-size: 16px;
            padding-right: 30px; /* Ensures text doesn't overlap arrow */
            cursor: pointer;
        }


    </style>
            <style>
        .translate-middle {
            transform: translate(-50%, -42%) !important;
        }
        
        .badge {
        --bs-badge-padding-x: 0.45em;
        --bs-badge-padding-y: 0.25em;
        --bs-badge-font-size: 0.65em;
        
        }
    </style>
    </head>
<body style="background-color:black;">
    <div class="d-flex justify-content-between align-items-center px-3 navbar-fixed-top">

        <div class="d-flex ml-auto align-items-center">
            
                <!-- Back Button -->
            <a href="javascript:void(0);" onclick="goBackAndRefresh()" style="font-size: 22px; margin-right: 6px; color: white;">
                <i class="fa-solid fa-arrow-left"></i>
            </a>

            
            <div class="header">WISHLIST</div>
        </div>
        <!-- Icons -->
        <div class="d-flex ml-auto align-items-center">
            <!--<button onclick="myFunction()">Switch Mode</button>-->
          <a href="#" class="text-light" style="font-size: 24px; font-weight: normal; margin-top: 5px;">
            <!--<i class="fas fa-search"></i>-->
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
              <circle cx="20" cy="20" r="9" stroke="white" stroke-width="2"/>
              <line x1="26" y1="26" x2="34" y2="34" stroke="white" stroke-width="2" stroke-linecap="round"/>
            </svg>
          </a>
          <a href="#" class="text-light" style="font-size: 24px; font-weight: normal; margin-right: 20px;">
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
    </div>
    
    
    
    <div class="container" style="padding: 0px; margin-top: 60px;">

        <div id="toast-container" class="position-fixed w-100" style="z-index: 9999;top: 66px;"></div>

            
    @if(!$wish_list)
        <img src="https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Blank%20Pages/Whishlish%20is%20Empty.jpg" 
             style="width: 100%; height: calc( 100vh - 60px); display: block; margin: 0px;">
    @endif

        
        <div class="row g-3 m-0" style="gap:6px;" >
            <!-- Product Card 1 -->

        @foreach($wish_list as $wslt)
            <div class="col-6 p-0 m-0">
                <div class="card position-relative">
                    
                    @php
                        $mrp = $wslt['mrp'];
                        $sellingPrice = $wslt['price'];
                        $discount = $mrp > 0 ? round((($mrp - $sellingPrice) / $mrp) * 100) : 0;
                        $images = json_decode($wslt['images'], true);
                    @endphp
                    @php
                        $size_data = DB::table('products')->select('id','size_name')->where('product_id',$wslt['pid'])->latest()->get();
                    @endphp
        
                    @if(!empty($images) && isset($images[0]))
                        <img src="{{ $images[0] }}" class="card-img-top product-img" alt="Image" style="height:300px">
                    @endif
                    
                    <div class="rating-label position-absolute rating" style="font-size:10px; margin-top:200px;">
                       No reviews Yet
                    </div>
                    
                    <div class="card-body">
                        <div class="price-wishlist">
                            
                        <h6 class="card-title" title="{{ $wslt['name'] }}">
                            {{ strlen($wslt['name']) <= 16 ? $wslt['name'] : substr($wslt['name'], 0, 16) . '...' }}
                        </h6>
                        
                        
                        </div>
                        
                        <p class="card-text m-0">
                            MRP Rs. <span class=" text-decoration-line-through">{{ $mrp }}</span> Rs. {{ $sellingPrice }}
                            <span class="discount">{{ $discount }}% OFF</span><br>
                        </p>
                        
                        <!-- Size Dropdown (if required) -->
                        @if($wslt['sid'] != 40)
                            <select class="form-control size-selector" id="size_{{ $wslt['id'] }}" style="margin: 7px 0px 0px;">
                                <option value="">Select Size</option>
                                @foreach($size_data as $size)
                                    <option value="{{ $size->size_name }}">{{ $size->size_name }}</option>
                                @endforeach
                            </select>
                        @endif
        
                        <!-- Add to Cart Button -->
                        <a class="btn mt-2 move move addtobag" 
                           style="flex: 0 0 57%;  background-color: var(--primary-color); color: black;" 
                           onclick="addToCart({{ json_encode($wslt) }})">
                           More to Cart
                        </a>
                        
                                                   

                         <form action="{{ route('wishlists.destroy', $wslt['wid']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item delete mt-2" style="background-color:red; color:white; text-align:center; border-radius:5px;" >REMOVE</button>
                                </form>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            function showToast(message, type = 'primary') {
                const toastContainer = document.getElementById('toast-container');
    
                const toast = document.createElement('div');
                toast.className = `toast custom-toast bg-${type} text-white border-0`;
                toast.setAttribute('role', 'alert');
                toast.setAttribute('aria-live', 'assertive');
                toast.setAttribute('aria-atomic', 'true');
    
                toast.innerHTML = `
                    <div class="toast-body w-100 d-flex justify-content-between align-items-center">
                        ${message}
                        <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                `;
    
                toastContainer.appendChild(toast);
    
                // Initialize Toast
                const bsToast = new bootstrap.Toast(toast, {
                    delay: 3000, // Show for 3 seconds
                    autohide: true
                });
    
                bsToast.show();
    
                // Remove from DOM after hidden
                toast.addEventListener('hidden.bs.toast', () => {
                    toast.remove();
                });
            }
        </script>
    <script>
        // Toggle wishlist icon color
        function toggleWishlist(icon) {
            icon.classList.toggle('selected');
        }
    </script>
    
        <script>
            function goBackAndRefresh() {
                window.location.href = '/addtocart';
                setTimeout(function () {
                    location.reload();
                }, 500); // Reloads after going back
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
            });
            
            function addToCart(product) {
                let sizeDropdown = document.getElementById("size_" + product.id);
                
                let selectedSize = sizeDropdown ? sizeDropdown.value : null;
                if (!selectedSize && product.sid != 40) {
                    // alert("Please select a size");
                    showToast("Please select a size", "success");

                    return;
                }
            
                let tempUserId = localStorage.getItem("temp_user_id") || getCookie("temp_user_id");
                let userId = "{{ Auth::check() ? Auth::user()->id : 0 }}";
                let token = "{{ csrf_token() }}";
            
                $.ajax({
                    url: "{{ route('cart.store') }}",
                    type: "POST",
                    data: {
                        _token: token,
                        user_id: userId > 0 ? userId : 0,
                        temp_user_id: tempUserId,
                        product_id: product.pid,
                        price: product.price,
                        gst_rate: product.gst_rate,
                        size_name: selectedSize,
                        color_name: product.color_name,
                        mrp: product.mrp,
                        quantity: 1,
                        newid:product.id,
                    },
                    success: function (response) {
                        // alert("Product added to cart successfully!");
                        showToast("Product added to cart successfully!", "success");

                        window.location.reload();
                        localStorage.setItem("temp_user_id", response.temp_user_id);
                        document.cookie = `temp_user_id=${response.temp_user_id}; path=/;`;
                        onAddToCartSuccess();
                        
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                        // alert("Something went wrong! Please try again.");
                        showToast("Something went wrong! Please try again.", "success");

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