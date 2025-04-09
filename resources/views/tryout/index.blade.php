@extends('layouts.category')
@section('content')


<title>OhhBuddie | Tryout</title>
<link rel="icon" type="image/x-icon" href="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Ohbuddielogo.png">

    <img src="https://media.showloom.com/uploads/all/web banner mobile-31-12.jpg" style=" width: 100%;
            max-width: 100%;
            height: 160px;
            margin-top: 63px;
            display: block;" >


    <div class="container" style="padding: 0px; margin-top: 5px;">
        <div class="row g-3 m-0" style="margin-top: 40px;">
            <!-- Product Card 1 -->
            <div class="col-6">
                <div class="card position-relative text-light" style="border-radius: unset; background-color:black;">
                    <!-- Product Image -->
                    <img src="https://imagescdn.pantaloons.com/img/app/product/9/926786-11719670.jpg?auto=format&w=450"
                        class="card-img-top product-img" alt="Product 1">
                    
                    <!-- Rating at the Bottom Right of the Image -->
                    <div class="rating-label position-absolute" style="bottom: 65px; right: 10px; background-color:#04AA6D; color: white; padding: 2px 8px; border-radius: 12px; font-size: 14px;">
                        3.5 ★
                    </div>
                    
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="price-wishlist">
                            <h9>Running Shoes</h9>
                                
                            <i class="far fa-heart wishlist-icon"  onclick="toggleWishlist(this)"></i>
                        </div>
                        <p class="card-text m-0">Rs. 25.99</p>
                    </div>
                </div>
            </div>
            <!-- Product Card 2 -->
            <div class="col-6">
                <div class="card text-light"  style="border-radius: unset; background-color:black;">
                    <img src="https://www.jiomart.com/images/product/original/rviie32hdh/ozzy-winterwear-jacket-for-men-product-images-rviie32hdh-2-202303180709.jpg?im=Resize=(500,630)"
                        class="card-img-top product-img" alt="Product 1">
                    <div class="card-body">
                        <div class="rating-label position-absolute" style="bottom: 65px; right: 10px; background-color:#04AA6D; color: white; padding: 2px 8px; border-radius: 12px; font-size: 14px;">
                            3.5 ★
                        </div>
                        <div class="price-wishlist">
                            <h9>Running Shoes</h9>
                            <i class="far fa-heart wishlist-icon"  onclick="toggleWishlist(this)"></i>
                        </div>
                        <p class="card-text m-0">Rs. 25.99</p>
                        
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card text-light"  style="border-radius: unset; background-color:black;">
                    <img src="https://imagescdn.pantaloons.com/img/app/product/9/926786-11719670.jpg?auto=format&w=450"
                        class="card-img-top product-img" alt="Product 1">
                    <div class="card-body">
                        <div class="rating-label position-absolute" style="bottom: 65px; right: 10px; background-color:#04AA6D; color: white; padding: 2px 8px; border-radius: 12px; font-size: 14px;">
                            3.5 ★
                        </div>
                        <div class="price-wishlist">
                            <h9>Running Shoes</h9>
                            <i class="far fa-heart wishlist-icon"  onclick="toggleWishlist(this)"></i>
                        </div>
                        <p class="card-text m-0">Rs. 25.99</p>
                        
                    </div>
                </div>
            </div>
            <div class="col-6"> 
                <div class="card text-light"  style="border-radius: unset; background-color:black;">
                    <img src="https://imagescdn.pantaloons.com/img/app/product/9/926786-11719670.jpg?auto=format&w=450"
                        class="card-img-top product-img" alt="Product 1">
                    <div class="card-body">
                        <div class="rating-label position-absolute" style="bottom: 65px; right: 10px; background-color:#04AA6D; color: white; padding: 2px 8px; border-radius: 12px; font-size: 14px;">
                            3.5 ★
                        </div>
                        <div class="price-wishlist">
                            <h9>Running Shoes</h9>
                            <i class="far fa-heart wishlist-icon"  onclick="toggleWishlist(this)"></i>
                        </div>
                        <p class="card-text m-0">Rs. 25.99</p>
                        
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card text-light"  style="border-radius: unset; background-color:black;">
                    <img src="https://imagescdn.pantaloons.com/img/app/product/9/926786-11719670.jpg?auto=format&w=450"
                        class="card-img-top product-img" alt="Product 1">
                    <div class="card-body">
                        <div class="rating-label position-absolute" style="bottom: 65px; right: 10px; background-color:#04AA6D; color: white; padding: 2px 8px; border-radius: 12px; font-size: 14px;">
                            3.5 ★
                        </div>
                        <div class="price-wishlist">
                            <h9>Running Shoes</h9>
                            <i class="far fa-heart wishlist-icon"  onclick="toggleWishlist(this)"></i>
                        </div>
                        <p class="card-text m-0">Rs. 25.99</p>
                        
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card text-light"  style="border-radius: unset; background-color:black;">
                    <img src="https://imagescdn.pantaloons.com/img/app/product/9/926786-11719670.jpg?auto=format&w=450"
                        class="card-img-top product-img" alt="Product 1">
                    <div class="card-body">
                    <div class="rating-label position-absolute" style="bottom: 65px; right: 10px; background-color:#04AA6D; color: white; padding: 2px 8px; border-radius: 12px; font-size: 14px;">
                        3.5 ★
                    </div>
                        <div class="price-wishlist">
                            <h9>Running Shoes</h9>
                            <i class="far fa-heart wishlist-icon"  onclick="toggleWishlist(this)"></i>
                        </div>
                        <p class="card-text m-0">Rs. 25.99</p>
                        
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card text-light"  style="border-radius: unset; background-color:black;">
                    <img src="https://imagescdn.pantaloons.com/img/app/product/9/926786-11719670.jpg?auto=format&w=450"
                        class="card-img-top product-img" alt="Product 1">
                    <div class="card-body">
                    <div class="rating-label position-absolute" style="bottom: 65px; right: 10px; background-color:#04AA6D; color: white; padding: 2px 8px; border-radius: 12px; font-size: 14px;">
                        3.5 ★
                    </div>
                        <div class="price-wishlist">
                            <h9>Running Shoes</h9>
                            <i class="far fa-heart wishlist-icon"  onclick="toggleWishlist(this)"></i>
                        </div>
                        <p class="card-text m-0">Rs. 25.99</p>
                        
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card text-light"  style="border-radius: unset; background-color:black;">
                    <img src="https://imagescdn.pantaloons.com/img/app/product/9/926786-11719670.jpg?auto=format&w=450"
                        class="card-img-top product-img" alt="Product 1">
                    <div class="card-body">
                    <div class="rating-label position-absolute" style="bottom: 65px; right: 10px; background-color:#04AA6D; color: white; padding: 2px 8px; border-radius: 12px; font-size: 14px;">
                        3.5 ★
                    </div>
                        <div class="price-wishlist">
                            <h9>Running Shoes</h9>
                            <i class="far fa-heart wishlist-icon"  onclick="toggleWishlist(this)"></i>
                        </div>
                        <p class="card-text m-0">Rs. 25.99</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Fixed Bottom Navbar -->



    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script>
        // Toggle wishlist icon color
        function toggleWishlist(icon) {
            icon.classList.toggle('selected');
        }
    </script>
@endsection