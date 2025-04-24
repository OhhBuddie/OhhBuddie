@extends('layouts.product')
@section('content')
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Product Details</title>
     <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">
     <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
    
    
        .product-image {
            max-width: 100%;
            height: 500px;
        }
        .badge {
            font-size: 1rem;
        }
        .btn {
            font-size: 1rem;
        }
   
        .offer-section {
           
            padding: 15px 0;
        }
        .offer-section h6 {
            font-weight: bold;
            font-size: small;
        }
        .offer-section p {
            font-size: smaller;
        }

        .size-section, .details-section {
            margin-top: 20px;
        }
    
         .fixed-bottom-navbar {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: #fff;
            padding: 10px;
            z-index: 1030;
        }
        
        
        .fixed-bottom-navbar.unfixed {
          position: static;
          transform: translateY(0);
        }
        
        .row, .accordion-header, .accordion-content{
            background: #1f1f1f;
        }
        
        .wishlist-icon {
            color: white;
            cursor: pointer;
        }

        .wishlist-icon.selected {
            color: #dc3545;
        }
        
        .btn-primary {
            background-color: white;  
            color: black;
        }
        .btn-primary:hover {
            background-color: white;  
            color: black;
        }
        
 
        .btn-outline-secondary {
            color: white; /* Default text color */
        }
        
        .btn-outline-secondary.active {
            color: black; /* Selected button text color */
            background-color: white;
        }
        
        .btn-outline-secondary:not(:disabled):not(.disabled).active, .btn-outline-secondary:not(:disabled):not(.disabled):active, .show>.btn-outline-secondary.dropdown-toggle {
             color: black; 
             background-color: white; 
            border-color: #6c757d;
        }
        
        a:focus, a:hover {
            text-decoration: none;
        }
    </style>
    <style>
        .discount {
            
            background-color: #EFC475;
            padding: 1px 8px;
            margin-left: 5px;
            border-radius: 6px;
            color: black;
            padding-right: 35px;
            position: relative;
        }
        
        .discount::after {
            content: '';
             border-width: 0 30px 30px 21px; 
            border-color: transparent #1f1f1f #1f1f1f transparent;
            transform: rotate(0deg);
            height: 0;
            width: 0;
            border-style: solid;
            z-index: 10;
            position: absolute;
            right: -20px;
            top: 0px;
        }
    </style>
       <style>


        .section-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
            color: white;
        }
        .photos, .reviews {
            display: flex;
            gap: 10px;
            overflow-x: scroll;
            scrollbar-width: none;
        }
        .photos img, .reviews img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
        }
 
        .review p {
            margin: 5px 0;
            color: white;
        }
        .review-meta {
            font-size: 12px;
            color: white;
            
        }
    </style>
  <style>
  
    /* Size chart button */
    .size-chart-button {
      
      cursor: pointer;
      display: inline-block;
    }
    
    .size-chart-button:hover {
      text-decoration: underline;
    }
    
    /* Modal container - hidden by default */
    #modal-container {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.6);
      z-index: 1000;
      justify-content: center;
      align-items: center;
    }
    
    /* Modal content */
    .modal-content {
      background-color: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
      max-width: 90%;
      max-height: 90%;
      position: relative;
    }
    
    /* Modal header */
    .modal-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 15px;
      padding-bottom: 10px;
      border-bottom: 1px solid #eee;
    }
    
    .modal-title {
      margin: 0;
      font-size: 18px;
      color: #333;
    }
    
    /* Close button */
    .close-button {
        background: none;
        border: 1px solid black;
        font-size: 24px;
        cursor: pointer;
        padding: 0;
        height: 39px;
        width: 30px;
        border-radius: 27%;
        color: black;
        position: absolute;
        right: 8px;
        top: 3px;
    }
    
    .close-button:hover {
      background-color: #f3f4f6;
    }
    
    /* Size chart image */
    .size-chart-image {
      max-width: 100%;
      max-height: 70vh;
      display: block;
    }
  </style>
    <style>
        .bg-dangerr, .bg-success{
            color: black !important ;
            background-color: #efc475 !important;
            --bs-btn-border-color: none;
        }
        .custom-toast {
            width: 100%;
            padding: 1rem 2rem;
            font-size: 1.1rem;
            border-radius: 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            animation: slideDownFade 0.5s ease-out;
        }
    
        @keyframes slideDownFade {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
    <style>
  .carousel-container {
    width: 100%;
    max-width: 600px;
    position: relative;
    overflow: hidden;
    border-radius: 8px;
    margin: 0 auto;
  }

  .carousel {
    position: relative;
    width: 100%;
  }

  .carousel-slide {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: 0;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .carousel-slide.active-slide {
    opacity: 1;
    z-index: 1;
    position: relative;
  }

  /* Preload all images to prevent blinking */
  .carousel-slide img {
    width: 100%;
    height: auto;
    max-height: 500px;
    object-fit: contain;
    display: block;
  }

  .product-image {
    width: 100%;
    height: auto;
    max-height: 500px;
    object-fit: contain;
    display: block;
  }

  .carousel-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(255, 255, 255, 0.7);
    border: none;
    font-size: 24px;
    width: 40px;
    height: 40px;
    line-height: 36px;
    text-align: center;
    padding: 0;
    cursor: pointer;
    border-radius: 50%;
    transition: background-color 0.3s;
    z-index: 10;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
  }

  .carousel-btn:hover {
    background-color: rgba(255, 255, 255, 0.9);
  }

  #prevBtn {
    left: 10px;
  }

  #nextBtn {
    right: 10px;
  }

  .carousel-dots {
    position: absolute;
    bottom: 15px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    gap: 8px;
    z-index: 10;
    background-color: rgba(0, 0, 0, 0.3);
    padding: 5px 10px;
    border-radius: 15px;
  }

  .dot {
    width: 20px;
    height: 2px;
    /*border-radius: 50%;*/
    background-color: #ddd;
    cursor: pointer;
    transition: all 0.3s ease;
  }

  .dot.active {
    background-color: #EFC475;
    transform: scale(1.2);
  }

  @media (max-width: 768px) {
    .carousel-container {
      width: 100%;
    }
    
    .carousel-btn {
      width: 30px;
      height: 30px;
      line-height: 26px;
      font-size: 18px;
    }
  }
</style>

    
    @php
        $mrp = floatval(preg_replace('/[^0-9.]/', '', $product_details->maximum_retail_price ?? 0));
        $sellingPrice = floatval(preg_replace('/[^0-9.]/', '', $product_details->portal_updated_price ?? 0));
        $discount = $mrp > 0 ? round((($mrp - $sellingPrice) / $mrp) * 100) : 0;
    @endphp
    @php
        $size_data = DB::table('products')->select('id','size_name')->where('product_id',$product_details->product_id)->distinct('size_name')->get();
    @endphp


    

    <div class="container">

        <!-- Full-width Toast Container -->
        <div id="toast-container" class="position-fixed w-100" style="z-index: 9999;top: 66px;"></div>


        <div class="row align-items-center mb-3" style="margin-top:63px;">
            
        <!-- Product Image -->
        <div class="col-12 col-md-6 text-center mb-md-0 position-relative p-0">
            <!-- Carousel -->
            
            
            
        <div class="carousel-container">
          <div class="carousel">
            @if(empty($product_details->images))
              <div class="carousel-slide active-slide">
                <img src="https://assets.ajio.com/medias/sys_master/root/20230728/GBrh/64c3db50a9b42d15c979555c/-473Wx593H-466398360-green-MODEL.jpg" class="product-image" alt="Product Image">
              </div>
            @else
              @php $images = json_decode($product_details->images); @endphp
              
              @foreach($images as $index => $pimages)
                @php
                  // Check if the image URL contains the S3 path
                  $isS3Image = Str::startsWith($pimages, 'https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/products/');
                  
                  // If it's not an S3 image, prepend the seller's image path
                  $imageSrc = $isS3Image ? $pimages : "https://seller.ohhbuddie.com/public/uploads/products/" . basename($pimages);
                @endphp
                
                <div class="carousel-slide {{ $index === 0 ? 'active-slide' : '' }}">
                  <img src="{{ $imageSrc }}" class="product-image" alt="Product Image {{ $index + 1 }}">
                </div>
              @endforeach
            @endif
          </div>
          
          @if(!empty($product_details->images) && count(json_decode($product_details->images)) > 1)
            <!--<button class="carousel-btn" id="prevBtn">❮</button>-->
            <!--<button class="carousel-btn" id="nextBtn">❯</button>-->
            
            <div class="carousel-dots">
              @foreach(json_decode($product_details->images) as $index => $pimages)
                <div class="dot {{ $index === 0 ? 'active' : '' }}" data-index="{{ $index }}"></div>
              @endforeach
            </div>
          @endif
        </div>



        
            <!-- Rating Badge -->
            <!--<span class="badge bg-success me-2 position-absolute" -->
            <!--      style="bottom: 18px; right: 10px; background-color:#04AA6D; color: white; padding: 8px 15px; border-radius: 12px; font-size: 14px;">-->
            <!--  <i class="fa fa-star checked" style="color:white"></i>  4.1 <i class="bi bi-star-fill" style="font-size: 11px;"></i> | 5-->
            <!--</span>-->
            
            <span class="badge badgee bg-success me-2 position-absolute" 
                  style="bottom: 18px; right: 10px; background-color:#04AA6D; color: white; padding: 8px 15px; border-radius: 12px; font-size: 10px; z-index:1000;">
               No Reviews Yet
            </span>
           
            
            
            <!-- GET IT IN 48 HOURS Tag -->
            <!--<div class="position-absolute" -->
            <!--     style="bottom: 10px; left: 0px; background: var(--primary-color); color: black; padding: 4px 10px;  border-top-right-radius: 12px; border-bottom-right-radius: 12px; font-size: 14px; font-weight: bold; text-align: center; opacity: 0.8;">-->
            <!--    GET IT IN 48 HOURS-->
            <!--</div>-->
        </div>

           @php
                $brnd_cnt = DB::table('brands')->where('id',$product_details->brand_id)->count();
                if($brnd_cnt > 0)
                {
                    $brnd_name = DB::table('brands')->where('id',$product_details->brand_id)->latest()->first();
                }
                
                
           @endphp
            <!-- Product Details -->
            <div class="col-12 col-md-6 text-light p-4 ">
                <p class="font-weight-bold" style="color:white; margin: 10px 0px 0px;">
                    @if($brnd_cnt != 0)
                        <span style="text-transform: uppercase;">{{ $brnd_name->brand_name }}</span> -
                    @endif
                    {{ $product_details->product_name }}
                </p>

                <!--<h6 class="fw-bold" style="margin-top: 3px;">{{$product_details->product_name}}</h6>-->
                
                <div >
                  MRP  Rs. <span class="text-muted text-decoration-line-through"> {{$mrp}}</span>
                    <span class=" fw-bold"> Rs. {{$sellingPrice}}</span>
                    <!--<span class="text-danger fw-bold">({{$discount}}% OFF)</span><br>-->
                    <span class="discount">{{$discount}}% OFF</span><br>
                    <span>(Inclusive of all taxes)</span>
                </div>
            </div>
            </div>
            
           @if($colorcnt==0 && $subsubcat_id ==40)
           @else
             <!-- Size Section -->
            <div class="row mt-4 mb-4 size-section pt-4 pb-4 text-light" >
                
            @if(empty($size_data->size_name) || $size_data->size_name == '')
                @if($subsubcat_id ==40)
                @else
                    <div class="px-4 d-flex justify-content-between align-items-center mb-3" style="gap: 1rem;">
                        <h5 class="mb-0">Selected Size: <span id="selectedSize"></span></h5>
                        
                        <h5 class="mb-0 size-chart-button" onclick="openModal()">Size Chart</h5>
                    </div>
                
                    
                    <div class="d-flex mb-4 flex-wrap" style="gap: 0.5rem;">
                        @foreach($size_data as $sdata)
                            @if($product_details->category_id == 88)

                                <button type="button" class="btn btn-outline-secondary newbtn border-light fs-2 m-1"
                                    style="font-weight: bold; height: 41px; border-radius: 16px; width: 81px;"
                                    onclick="selectSize(this, '{{$sdata->size_name}}')">
                                    {{$sdata->size_name}}
                                </button>

                            @else
                                <button type="button" class="btn btn-outline-secondary newbtn border-light fs-2 m-1"
                                    style="font-weight: bold; height: 61px; border-radius: 16px; width: 61px;"
                                    onclick="selectSize(this, '{{$sdata->size_name}}')">
                                    {{$sdata->size_name}}
                                </button>
                            @endif  
                        @endforeach
                    </div>

                    <!--<div id="error-message1" class="d-flex text-danger">-->
                        <!-- Error message will appear here -->
                    <!--</div>-->
                    
                @endif
            @endif
                                        
           <!-- Modal Container -->
          <div id="modal-container">
            <div class="modal-content">
                <h4 class="text-dark"><b>Size Chart</b></h4>
                <button class="close-button" onclick="closeModal()">×</button>
                @if($subcat_id == 23)
                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Size+Chart/Men+---+Footwear.jpg" alt="Men's Bottom Wear Size Chart" class="size-chart-image">
                @elseif($subcat_id == 67)
                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Size+Chart/Women+-+Footware.jpg" alt="Men's Bottom Wear Size Chart" class="size-chart-image">
                @elseif($subcat_id == 39 || $subcat_id == 46 || $subcat_id == 76)
                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Size+Chart/Women+---+Indian+and+fusion+wear%2C+Western+wear%2C+Nightwear.jpg" alt="Men's Bottom Wear Size Chart" class="size-chart-image">
                @elseif($subcat_id == 59)
                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Size+Chart/Women+---+Bottom+Wear.jpg" alt="Men's Bottom Wear Size Chart" class="size-chart-image">
                @elseif($subcat_id == 59)
                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Size+Chart/Women+---+Bottom+Wear.jpg" alt="Men's Bottom Wear Size Chart" class="size-chart-image">
                @elseif($subcat_id == 2 || $subcat_id == 12)
                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Size+Chart/Men+---+Topwear%2C+Indian+and+Festive+Wear%2C+nightwear.jpg" alt="Men's Bottom Wear Size Chart" class="size-chart-image">
                @elseif($subcat_id == 17)
                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Size+Chart/Men+-+Bottom+Wear.jpg" alt="Men's Bottom Wear Size Chart" class="size-chart-image">
                @endif
                
            </div>
          </div>

            @if($colorcnt == 0)
            
            @else
                <h5>Colors </h5>
                 <div class="d-flex mb-2" style="gap: 1.5rem; overflow: scroll; scrollbar-width: none;">
                     @foreach($similar as $sim)
                     
                        @php
                        if($sim->category_id ==88)
                        {
                           $cat_id = DB::table('categories')->where('id',$sim->subcategory_id)->latest()->first();
                           $seller_id = DB::table('sellers')->where('seller_id',$sim->seller_id)->latest()->first();
                           $sub = $cat_id->subcategory;
                        }
                        else
                        {
                           $cat_id = DB::table('categories')->where('id',$sim->sub_subcategory_id)->latest()->first();
                           $seller_id = DB::table('sellers')->where('seller_id',$sim->seller_id)->latest()->first();
                           $sub = $cat_id->sub_subcategory;
                        }
                        @endphp
                        
                        @php
                            $images = json_decode($sim->images, true);
                            
                            $bncnt = DB::table('brands')->where('id',$sim->brand_id)->count();
                            if($bncnt == 0)
                            {
                                $brand_name = 'NA';
                                $brand_name2 = $seller_id->company_name;
                            }
                            else
                            {
                                $brand_name = DB::table('brands')->where('id',$sim->brand_id)->latest()->first();
                                $brand_name2 = $brand_name->brand_name;
                            }
                    
                        @endphp
                        
                        @if(!empty($images) && isset($images[0]))
                        <a href="/product/{{ \Illuminate\Support\Str::slug($sub) }}/{{ \Illuminate\Support\Str::slug($brand_name2) }}/{{ \Illuminate\Support\Str::slug($sim->product_name) }}/{{$sim->id}}/buy" style="text-decoration:none;">

                        <!--<a  href="/product/{{ Crypt::encryptString($sim->id) }}" style="text-decoration:none;">-->
                            <img src="{{ $images[0] }}" alt="Image" style="height:80px; width:60px;border-radius: 10px;">
                        </a>
                        @endif
                     @endforeach
                 </div>
            @endif
                
    
            </div>
          @endif
   
        
        
        <div class="row text-light">
            <div class="mb-4">
                <h5 >Check Delivery & Services :</h5>
                    <div class="input-group d-flex">
                        <input type="number" id="pincode" class="form-control mr-2" placeholder="Enter Your Pin Code"
                               style="width:60%;" oninput="enforceLength(this)" required>
                        <button class="btn" style="background-color: var(--primary-color); color: black; width: 25%;" 
                                onclick="validatePincode()">Check</button>
                    </div>
                    
                    <span id="error-message" class="p-2" style="color: #efc475; display: none;">Pincode Is Not Serviceable</span>
                    <span id="success-message" class="p-2" style="color: #efc475; display: none;">Hurray! Your pincode is valid for 69-Minute delivery</span>

            </div>
            <br>
            <!--<img class="d-block w-100 mb-3" src="{{ $product }}" alt="First slide" style="height:90px;">-->
            
             <video class="d-block w-100 mb-3 p-0" playsinline autoplay muted loop >
                <source src="{{ $product }}" type="video/mp4" >
    
            </video>

        </div>

        
        
        
  
        <!-- Offer Section -->
        <!--<div class="row offer-section mt-4  text-light" >-->
        <!--    <div class="offer">-->
        <!--        <h6>Flat 300 Off</h6>-->
        <!--        <p>Applicable on your first order. Use code: MYNTRA300</p>-->
        <!--    </div>-->
        <!--    <div class="offer">-->
        <!--        <h6>Best Price: <span class="text-danger">₹239</span> <a href="#" style="color:var(--secondary-color);">VIEW PRODUCTS</a></h6>-->
        <!--        <p>Applicable on orders above Rs. 499 (only on first purchase)<br>-->
        <!--        Coupon code: SAVINGSPLUS<br>-->
        <!--        Coupon Discount: 25% off (Your total saving: Rs. 560)</p>-->
        <!--    </div>-->
        <!--    <div class="offer">-->
        <!--        <h6>10% Discount on Kotak Credit and Debit Cards <a href="#" style="color:var(--secondary-color);">T&C</a></h6>-->
        <!--        <p>Min Spend ₹3500, Max Discount ₹1000.</p>-->
        <!--    </div>-->
        <!--    <div class="offer">-->
        <!--        <h6>10% Discount on BOBCARD Credit Cards and Credit Card EMI <a href="#" style="color:var(--secondary-color);">T&C</a></h6>-->
        <!--        <p>Min Spend ₹3500, Max Discount ₹1000.</p>-->
        <!--    </div>-->
        <!--    <div class="offer">-->
        <!--        <h6>10% Discount on ICICI Bank Netbanking <a href="#" style="color:var(--secondary-color);">T&C</a></h6>-->
        <!--        <p>Min Spend ₹3000, Max Discount ₹1000.</p>-->
        <!--    </div>-->
        <!--</div>-->

           <!--<div class="row mt-4">-->
           <!--     <div class="section-title">Customer Photos (51)</div>-->
           <!--     <div class="photos" style="margin-bottom: 10px">-->
           <!--         <img src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcR1rj8LiNLL3ZIt4BNVCiUhap11P3qxDthpklNmSNUck0D7m--hNd9Tve6Iz2Ql6_vOFj4lnihQY2utaYgiBQvUiT3bRFI0WmDrQdvMvclk6yFLWZxgNWBfSQ" alt="Customer Photo">-->
           <!--         <img src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcR1rj8LiNLL3ZIt4BNVCiUhap11P3qxDthpklNmSNUck0D7m--hNd9Tve6Iz2Ql6_vOFj4lnihQY2utaYgiBQvUiT3bRFI0WmDrQdvMvclk6yFLWZxgNWBfSQ" alt="Customer Photo">-->
           <!--         <img src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcR1rj8LiNLL3ZIt4BNVCiUhap11P3qxDthpklNmSNUck0D7m--hNd9Tve6Iz2Ql6_vOFj4lnihQY2utaYgiBQvUiT3bRFI0WmDrQdvMvclk6yFLWZxgNWBfSQ" alt="Customer Photo">-->
           <!--     </div>-->
                
           <!--     <div class="section-title">Customer Reviews (60)</div>-->
           <!--     <div class="review">-->
           <!--         <p>Really I loved this product thanks Myntra to provide such a liket this product i am thankful for you.🙏</p>-->
           <!--         <div class="reviews mt-4">-->
           <!--             <img src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcR1rj8LiNLL3ZIt4BNVCiUhap11P3qxDthpklNmSNUck0D7m--hNd9Tve6Iz2Ql6_vOFj4lnihQY2utaYgiBQvUiT3bRFI0WmDrQdvMvclk6yFLWZxgNWBfSQ" alt="Review Photo">-->
           <!--             <img src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcR1rj8LiNLL3ZIt4BNVCiUhap11P3qxDthpklNmSNUck0D7m--hNd9Tve6Iz2Ql6_vOFj4lnihQY2utaYgiBQvUiT3bRFI0WmDrQdvMvclk6yFLWZxgNWBfSQ" alt="Review Photo">-->
           <!--             <img src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcR1rj8LiNLL3ZIt4BNVCiUhap11P3qxDthpklNmSNUck0D7m--hNd9Tve6Iz2Ql6_vOFj4lnihQY2utaYgiBQvUiT3bRFI0WmDrQdvMvclk6yFLWZxgNWBfSQ" alt="Review Photo">-->
           <!--             <img src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcR1rj8LiNLL3ZIt4BNVCiUhap11P3qxDthpklNmSNUck0D7m--hNd9Tve6Iz2Ql6_vOFj4lnihQY2utaYgiBQvUiT3bRFI0WmDrQdvMvclk6yFLWZxgNWBfSQ" alt="Review Photo">-->
           <!--             <img src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcR1rj8LiNLL3ZIt4BNVCiUhap11P3qxDthpklNmSNUck0D7m--hNd9Tve6Iz2Ql6_vOFj4lnihQY2utaYgiBQvUiT3bRFI0WmDrQdvMvclk6yFLWZxgNWBfSQ" alt="Review Photo">-->
           <!--             <img src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcR1rj8LiNLL3ZIt4BNVCiUhap11P3qxDthpklNmSNUck0D7m--hNd9Tve6Iz2Ql6_vOFj4lnihQY2utaYgiBQvUiT3bRFI0WmDrQdvMvclk6yFLWZxgNWBfSQ" alt="Review Photo">-->
           <!--             <img src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcR1rj8LiNLL3ZIt4BNVCiUhap11P3qxDthpklNmSNUck0D7m--hNd9Tve6Iz2Ql6_vOFj4lnihQY2utaYgiBQvUiT3bRFI0WmDrQdvMvclk6yFLWZxgNWBfSQ" alt="Review Photo">-->
           <!--             <img src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcR1rj8LiNLL3ZIt4BNVCiUhap11P3qxDthpklNmSNUck0D7m--hNd9Tve6Iz2Ql6_vOFj4lnihQY2utaYgiBQvUiT3bRFI0WmDrQdvMvclk6yFLWZxgNWBfSQ" alt="Review Photo">-->
           <!--             <img src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcR1rj8LiNLL3ZIt4BNVCiUhap11P3qxDthpklNmSNUck0D7m--hNd9Tve6Iz2Ql6_vOFj4lnihQY2utaYgiBQvUiT3bRFI0WmDrQdvMvclk6yFLWZxgNWBfSQ" alt="Review Photo">-->

           <!--         </div>-->
           <!--         <p class="review-meta">Santanu | 8 Feb 2025</p>-->
           <!--     </div>-->
                
           <!--     <div style="display: flex; align-items: center; justify-content: center; width: 100vw; margin: 5px 0px;">-->
           <!--      <hr style="height: 2px; background-color: grey; border: none; width: 80%; margin: 0px;">-->
           <!--     </div>-->
                
                
           <!--     <div class="review">-->
           <!--         <p>Nice shoes</p>-->
           <!--         <div class="reviews mt-4">-->
           <!--             <img src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcR1rj8LiNLL3ZIt4BNVCiUhap11P3qxDthpklNmSNUck0D7m--hNd9Tve6Iz2Ql6_vOFj4lnihQY2utaYgiBQvUiT3bRFI0WmDrQdvMvclk6yFLWZxgNWBfSQ" alt="Review Photo">-->
           <!--             <img src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcR1rj8LiNLL3ZIt4BNVCiUhap11P3qxDthpklNmSNUck0D7m--hNd9Tve6Iz2Ql6_vOFj4lnihQY2utaYgiBQvUiT3bRFI0WmDrQdvMvclk6yFLWZxgNWBfSQ" alt="Review Photo">-->
           <!--         </div>-->
           <!--         <p class="review-meta">Aakash | 16 Feb 2025</p>-->
           <!--     </div>-->
                
           <!--     <div style="display: flex; align-items: center; justify-content: center; width: 100vw; margin: 5px 0px;">-->
           <!--         <hr style="height: 2px; background-color: grey; border: none; width: 80%; margin: 0px;">-->
           <!--     </div>-->
                
           <!--     <div style="text-align: center; margin: 10px 0px;">-->
           <!--         <a href="#" style="color: white; cursor: pointer; font-weight: bold;">See All Reviews</a >-->
           <!--     </div>-->
           <!-- </div>-->
       

        
        
        <h5 class="px-4 text-light mt-4 mb-0 row p-3">Product Information</h5>
        <div class="row mb-2">
            
          <div class="accordion accordionn" style="padding:0px; border: none;">
              
            <div class="accordion-item" style="background-color: #1f1f1f; border:none;">
                
              <button class="accordion-header d-flex justify-content-between">
                Product Details
                <i class="fa-solid fa-angles-right fs-1"></i>
              </button>
              <div class="accordion-content px-4 text-light">
                <p><b>SKU:</b> {{$product_details->sku}}</p>
                @php
                $fields = [
                    'saree_length' => 'Saree Length',
                    'blouse_fabric' => 'Blouse Fabric',
                    'blouse_piece_included' => 'Blouse Piece Included',
                    'blouse_length' => 'Blouse Length',
                    'blouse_stitched' => 'Blouse Stitched',
                    'work_details' => 'Work Details',
                    'border_type' => 'Border Type',
                    'weave_type' => 'Weave Type',
                    'pattern' => 'Pattern',
                
                    'gown_type' => 'Gown Type',
                    'sleeve_length' => 'Sleeve Length',
                    'sleeve_pattern' => 'Sleeve Pattern',
                    'neck_style' => 'Neck Style',
                    'closure_type' => 'Closure Type',
                    'embellishment_details' => 'Embellishment Details',
                    'lining_present' => 'Lining Present',
                
                    'top_type' => 'Top Type',
                    'hemline' => 'Hemline',
                    'transparency_level' => 'Transparency Level',
                
                    'set_type' => 'Set Type',
                    'bottom_included' => 'Bottom Included',
                    'bottom_type' => 'Bottom Type',
                    'dupatta_fabric' => 'Dupatta Fabric',
                    'dupatta_length' => 'Dupatta Length',
                
                    'lehenga_type' => 'Lehenga Type',
                    'lehenga_length' => 'Lehenga Length',
                    'choli_included' => 'Choli Included',
                    'choli_length' => 'Choli Length',
                    'choli_sleeve_length' => 'Choli Sleeve Length',
                    'dupatta_included' => 'Dupatta Included',
                    'work_details' => 'Work Details',
                    'flare_type' => 'Flare Type',
                
                    'tshirt_type' => 'T-Shirt Type',
                    'sleeve_style' => 'Sleeve Style',
                    'collar_type' => 'Collar Type',
                
                    'dress_type' => 'Dress Type',
                    'dress_length' => 'Dress Length',
                
                    'jumpsuit_type' => 'Jumpsuit Type',
                    'leg_style' => 'Leg Style',
                
                    'hoodie_type' => 'Hoodie Type',
                    'hood_included' => 'Hood Included',
                    'pocket_type' => 'Pocket Type',
                
                    'jacket_type' => 'Jacket Type',
                    'pocket_details' => 'Pocket Details',
                
                    'playsuit_type' => 'Playsuit Type',
                
                    'shacket_type' => 'Shacket Type',
                    'lining_present' => 'Lining Present',
                
                    'fit_type' => 'Fit Type',
                    'stretchability' => 'Stretchability',
                    'distressed' => 'Distressed/Non-Distressed',
                    'number_of_pockets' => 'Number of Pockets',
                
                    'waistband_type' => 'Waistband Type',
                    'length' => 'Length',
                
                    'short_skirt_type' => 'Short/Skirt Type',
                    'waist_rise' => 'Waist Rise',
                
                    'legging_type' => 'Legging Type',
                    'compression_level' => 'Compression Level',
                
                    'cargo_type' => 'Cargo Type',
                
                    // Newly Added Fields
                    'sole_material' => 'Sole Material',
                    'upper_material' => 'Upper Material',
                    'closure_type' => 'Closure Type',
                    'toe_shape' => 'Toe Shape',
                    'heel_type' => 'Heel Type',
                ];
                
                @endphp
                
                @foreach($fields as $key => $label)
                    @if(!empty($product_details->$key))
                        <p><b>{{ $label }}:</b> {{ $product_details->$key }}</p>
                    @endif
                @endforeach
                
                
                
                <p><b>Fabric Care:</b> {{$product_details->care_instructions}}</p>
                <p><b>Pack Of:</b> {{$product_details->pack_of}}</p>
                
                <p><b>Ideal for:</b> {{ DB::table('categories')->where('id', $product_details->category_id)->first()->category ?? 'N/A' }} </p>
                <p><b>HSN:</b> {{$product_details->hsn}}</p>
                <p><b>GST:</b> {{$product_details->gst_rate}} %</p>
              </div>
              
            </div>
            <div class="accordion-item" style="background-color: #1f1f1f; border:none;">
                
              <button class="accordion-header d-flex justify-content-between">
                Know Your Product 
                <i class="fa-solid fa-angles-right fs-1"></i>
              </button>
              <div class="accordion-content px-4 text-light">
                <p style="text-align:justify"><b>Description: {!!$product_details->description!!}</b></p>
              </div>
              
            </div>
            <div class="accordion-item" style="background-color: #1f1f1f; border:none;">
                
              <button class="accordion-header d-flex justify-content-between">
                Seller Details
                <i class="fa-solid fa-angles-right fs-1"></i>
              </button>
              
              @php
                $slr_detail = DB::table('sellers')->where('seller_id',$product_details->seller_id)->latest()->first();
              @endphp
              <div class="accordion-content px-4 text-light">
                  <p><b>Seller Name:</b> {{$slr_detail->company_name}}</p>
                  <p><b>Country of origin:</b> India</p>
                  <p><b>Manufacturer details:</b> {{$slr_detail->company_name}}</p>
                  <p><b>Sold by:</b> {{$slr_detail->company_name}}</p>

              </div>
              
            </div>
            
            
          </div>
        </div>


        
        
        
        
        
        
        </div>
    
         <!-- Bottom Navbar -->
        <div class=" fixed-bottom-navbar d-flex flex-row flex-md-row gap-3 " id="bottomNavbar" style="background-color:black; color:white; border:none;">
    
    

@php
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Session;

    $userId = Auth::check() ? Auth::id() : 0;

    if (Auth::check()) {
        $tempUserId = null;
    } else {
        $tempUserId = request()->cookie('temp_user_id') ?? Session::get('temp_user_id');

        if (!$tempUserId) {
            
            $tempUserId = 'temp_' . time();
            
            session(['temp_user_id' => $tempUserId]);
            
        }
    }

    $productId = $product_details->id;

    $isWishlisted = DB::table('wishlists')
        ->where('product_id', $productId)
        ->where(function ($query) use ($userId, $tempUserId) {
            if ($userId) {
                $query->where('user_id', $userId);
            } else {
                $query->where('temp_user_id', $tempUserId);
            }
        })
        ->exists();

    $cartRow = DB::table('carts')
        ->where(function ($query) use ($userId, $tempUserId) {
            if ($userId) {
                $query->where('user_id', $userId);
            } else {
                $query->where('temp_user_id', $tempUserId);
            }
        })
        ->where('product_id', $productId)
        ->first();

    $cartId = $cartRow ? $cartRow->id : null;
@endphp




<div class="btn btn-lg fs-5 text-light"
     style="flex: 0 0 40%; max-width: 40%; border: 1px solid white; cursor: pointer;"
     onclick="addToWishlist(this, '{{ $tempUserId }}', '{{ $userId }}', '{{ $productId }}', '{{ $cartId }}')">

    <i class="{{ $isWishlisted ? 'fas' : 'far' }} {{ $isWishlisted ? 'text-danger' : '' }} fa-heart wishlist-icon"
       style="margin-right: 5px; font-size: 17px;"></i>
    Wishlist

</div>


        
        <a id="addToBagBtn" class="btn btn-lg fs-5 addtobag" 
           style="flex: 0 0 57%; max-width: 57%; background-color: var(--primary-color); color: black;" 
           onclick="addToCart()">
           <i class="fa fa-shopping-bag mx-2"></i>
           Add to Bag
        </a>
        
        <a id="goToBagBtn" class="btn btn-lg fs-5" 
           style="flex: 0 0 57%; max-width: 57%; background-color: var(--primary-color); color: black;   display:none;" 
           onclick="window.location.href='/addtocart'">
           <i class="fa fa-shopping-bag mx-2"></i>
           Go to Bag
        </a>
        </div>

    
    <div class="container pr-0" style="background-color: #1f1f1f;">
    
        <!--Product -->
         <h5 class=" text-light">Similar Products</h5>
          <div id="contentDiv"></div>
         <div style="padding-right: 0px; padding-left: 0px;">
            <div class="product-category-container">
                <!-- Category Product 1 -->
                @foreach($same_products as $same_p)
                
                    @php
                        if($same_p->category_id ==88)
                        {
                           $cat_id = DB::table('categories')->where('id',$same_p->subcategory_id)->latest()->first();
                           $seller_id = DB::table('sellers')->where('seller_id',$same_p->seller_id)->latest()->first();
                           $sub = $cat_id->subcategory;
                        }
                        else
                        {
                           $cat_id = DB::table('categories')->where('id',$same_p->sub_subcategory_id)->latest()->first();
                           $seller_id = DB::table('sellers')->where('seller_id',$same_p->seller_id)->latest()->first();
                           $sub = $cat_id->sub_subcategory;
                        }
                    @endphp
                    @php
                        $brnd_cnt = DB::table('brands')->where('id',$same_p->brand_id)->count();
                        if($brnd_cnt > 0)
                        {
                            $brnd_name = DB::table('brands')->where('id',$same_p->brand_id)->latest()->first();
                            $brnd_name11 = $brnd_name->brand_name;
                        }
                        else
                        {
                            $brnd_name11 = $seller_id->company_name;
                        }
                        
                    @endphp


                <!--<a  href="/product/{{ Crypt::encryptString($same_p->id) }}" style="text-decoration:none;">-->
                <a href="/product/{{ \Illuminate\Support\Str::slug($sub) }}/{{ \Illuminate\Support\Str::slug($brnd_name11) }}/{{ \Illuminate\Support\Str::slug($same_p->product_name) }}/{{$same_p->id}}/buy" style="text-decoration:none;">

                <div class="product-item-card">
                    @php
                        $images = json_decode($same_p->images, true);
                    @endphp
                    
                    @if(!empty($images) && isset($images[0]))
                        <img src="{{ $images[0] }}" alt="Image" style="height: 200px; width: 150px;">
                    @endif

                    <div class="card-body product-item-card-body text-left" style="height:95px;">
                        <h8 class="card-title" title="{{ $same_p->product_name }}">
                            @if($brnd_cnt != 0)
                                <span style="text-transform: uppercase;"><b>{{ $brnd_name->brand_name }}</b></span>
                            @endif<br>
                            {{ strlen($same_p->product_name) <= 16 ? $same_p->product_name : substr($same_p->product_name, 0, 16) . '...' }}
                        </h8>
                        <div class="d-flex">
                            <p class="card-text me-2" style="text-decoration: line-through; color:red">Rs. {{$same_p->maximum_retail_price}}</p>
                            <p class="card-text ml-2">Rs. {{$same_p->portal_updated_price}}</p>
                        </div>                     
                    </div>
                </div>
                </a>
                @endforeach
                
            </div>
        </div>
    </div>
       
    
   


        <!-- Bootstrap JS Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
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
                delay: 3000,   // Show for 3 seconds
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
        var userId = "{{ Auth::check() ? Auth::user()->id : null }}"; // Get logged-in user ID
    </script>
    
       <script>
            function selectSize(button, size) {
                // Remove active class from all buttons
                document.querySelectorAll('.btn-outline-secondary').forEach(btn => {
                    btn.classList.remove('active');
                });
            
                // Add active class to the clicked button
                button.classList.add('active');
                
               document.getElementById('selectedSize').textContent = size;
            }
            
            
   
        </script>
        
        
        
    <script>
    
    var cat = @json($subsubcat_id);
    

          document.addEventListener("DOMContentLoaded", function () {
            let tempUserId = localStorage.getItem("temp_user_id") || getCookie("temp_user_id");
        
            if (!tempUserId) {
                tempUserId = "temp_" + new Date().getTime(); // Generate unique temp ID
                localStorage.setItem("temp_user_id", tempUserId);
                document.cookie = `temp_user_id=${tempUserId}; path=/;`;
            }
        });


        function addToCart() {

                // Force sizeSelected to null if cat is 38
                if (cat == 40) {
                    sizeSelected = null;
                    
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
                    product_id: "{{ $product_details->product_id }}",
                    price: "{{ $product_details->portal_updated_price }}",
                    gst_rate: "{{ $product_details->gst_rate }}",
                    size_name: sizeSelected,
                    color_name: "{{ $product_details->color_name }}",
                    mrp: "{{ $product_details->maximum_retail_price }}",
                    quantity: 1,
                },
                success: function (response) {
                    showToast("Product added to cart successfully!", "success");
                    localStorage.setItem("temp_user_id", response.temp_user_id);
                    document.cookie = `temp_user_id=${response.temp_user_id}; path=/;`;
                    onAddToCartSuccess(); // Update cart count in real time
                    document.getElementById("addToBagBtn").style.display = "none";
                    document.getElementById("goToBagBtn").style.display = "block";
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                    showToast("Something went wrong! Please try again.", "dangerr");
                }

            });
                } 
                else{
                    let sizeSelected = document.getElementById("selectedSize").textContent;
                    if (!sizeSelected)
                    {
                        // document.getElementById("error-message1").textContent = "Please select a Size";
                        showToast("Please select a Size!", "success");
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
                    product_id: "{{ $product_details->product_id }}",
                    price: "{{ $product_details->portal_updated_price }}",
                    gst_rate: "{{ $product_details->gst_rate }}",
                    size_name: sizeSelected,
                    color_name: "{{ $product_details->color_name }}",
                    mrp: "{{ $product_details->maximum_retail_price }}",
                    quantity: 1,
                },
                success: function (response) {
                        showToast("Product added to cart successfully!", "success");
                        localStorage.setItem("temp_user_id", response.temp_user_id);
                        document.cookie = `temp_user_id=${response.temp_user_id}; path=/;`;
                        onAddToCartSuccess(); // Update cart count in real time
                        document.getElementById("addToBagBtn").style.display = "none";
                        document.getElementById("goToBagBtn").style.display = "block";
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                        showToast("Something went wrong! Please try again.", "dangerr");
                    }

                });

                }

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

         document.addEventListener("scroll", () => {
          const contentDiv = document.getElementById("contentDiv");
          const navbar = document.getElementById("bottomNavbar");
        
          // Get the position of the content div relative to the viewport
          const contentRect = contentDiv.getBoundingClientRect();
          const contentBottom = contentRect.bottom;
        
          // Check if the bottom of the content div is above the viewport bottom
          if (contentBottom <= window.innerHeight) {
            // If the content is scrolled past, make the navbar static
            navbar.classList.add("unfixed");
          } else {
            // If the content is visible, keep the navbar fixed
            navbar.classList.remove("unfixed");
          }
        });


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

    <script>
    // If not present, create and store it in localStorage & cookie
    let tempUserId = localStorage.getItem("temp_user_id") || getCookie("temp_user_id");

    if (!tempUserId) {
        tempUserId = "temp_" + Date.now();
        localStorage.setItem("temp_user_id", tempUserId);
        setCookie("temp_user_id", tempUserId, 30);
    }

    // Set a JS-accessible hidden input so Blade/PHP can read it if needed
    document.cookie = `temp_user_id=${tempUserId}; path=/; max-age=${60 * 60 * 24 * 30}`;
    
    
</script>
        <script>
        // Toggle wishlist icon color
    
    function addToWishlist(divElement, tempUserId, userId, productId, cartId) {
        const icon = divElement.querySelector('.wishlist-icon');

        $.ajax({
            url: "/wishlist/store",
            type: "POST",
            data: {
                _token: document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                temp_user_id: tempUserId,
                user_id: userId,
                product_id: productId,
                ppid: cartId
            },
            success: function(response) {
                // alert(response.message);
                showToast("Product added to Wishlist successfully!", "success");
                if (response.success) {
                    toggleWishlist(icon);
                    window.location.href = response.redirect;
                }
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });
    }




    function toggleWishlist(icon) {
            icon.classList.toggle('selected');
        }


    </script>
    
    

    <script>
        function enforceLength(input) {
            let value = input.value;
    
            // Remove non-numeric characters (for safety)
            value = value.replace(/\D/g, '');
    
            // Enforce max length of 6
            if (value.length > 6) {
                value = value.slice(0, 6);
            }
    
            input.value = value;
        }
    
        function validatePincode() {
            let pincode = document.getElementById("pincode").value;
            let errorMessage = document.getElementById("error-message");
            let successMessage = document.getElementById("success-message");
    
            if (pincode.length !== 6) {
                errorMessage.style.display = "flex";
                successMessage.style.display = "none";
                return;
            }
    
            // AJAX request to check pincode
            $.ajax({
                url: "{{ route('check.pincode') }}",  // Laravel route to check pincode
                type: "GET",
                data: { pincode: pincode },
                success: function(response) {
                    if (response.valid) {
                        successMessage.style.display = "flex";
                        // successMessage.textContent = "Valid Pincode";
                        errorMessage.style.display = "none";
                    } else {
                        errorMessage.style.display = "flex";
                        // errorMessage.textContent = "Pincode Not Valid";
                        successMessage.style.display = "none";
                    }
                },
                error: function() {
                    errorMessage.style.display = "flex";
                    errorMessage.textContent = "Error checking pincode";
                    successMessage.style.display = "none";
                }
            });
        }
    </script>


      <script>
        // Simple function to open the modal portion
        function openModal() {
          document.getElementById('modal-container').style.display = 'flex';
          document.body.style.overflow = 'hidden';
        }
        
        // Simple function to close the modal
        function closeModal() {
          document.getElementById('modal-container').style.display = 'none';
          document.body.style.overflow = 'auto';
        }
        
        // Close when clicking outside the modal content
        document.getElementById('modal-container').addEventListener('click', function(event) {
          if (event.target === this) {
            closeModal();
          }
        });
        
        // Close with escape key
        document.addEventListener('keydown', function(event) {
          if (event.key === 'Escape') {
            closeModal();
          }
        });
      </script>
     <script>
  document.addEventListener('DOMContentLoaded', () => {
    initializeCarousel();
  });
  
  function initializeCarousel() {
    const slides = document.querySelectorAll('.carousel-slide');
    if (slides.length <= 1) return; // Don't initialize carousel if there's only one slide
    
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const dots = document.querySelectorAll('.dot');
    
    let currentIndex = 0;
    const totalSlides = slides.length;
    
    // Preload all images to prevent blinking
    const images = document.querySelectorAll('.carousel-slide img');
    let loadedImages = 0;
    
    images.forEach(img => {
      if (img.complete) {
        loadedImages++;
        if (loadedImages === images.length) {
          setupCarousel();
        }
      } else {
        img.addEventListener('load', () => {
          loadedImages++;
          if (loadedImages === images.length) {
            setupCarousel();
          }
        });
        
        img.addEventListener('error', () => {
          loadedImages++;
          if (loadedImages === images.length) {
            setupCarousel();
          }
        });
      }
    });
    
    // Set fixed height for carousel based on first slide
    function setupCarousel() {
      const firstSlide = slides[0];
      const carouselElement = document.querySelector('.carousel');
      carouselElement.style.height = `${firstSlide.offsetHeight}px`;
      
      // Make all slides initially hidden except the first
      slides.forEach((slide, index) => {
        if (index !== 0) {
          slide.style.visibility = 'hidden';
        } else {
          slide.style.visibility = 'visible';
        }
      });
    }
    
    // If all images are cached and already loaded
    if (loadedImages === images.length) {
      setupCarousel();
    }
    
    // Function to update the carousel display
    function updateCarousel() {
      // First make all slides visible but opacity 0
      slides.forEach((slide) => {
        slide.style.visibility = 'visible';
        slide.classList.remove('active-slide');
      });
      
      // Then show current slide
      slides[currentIndex].classList.add('active-slide');
      
      // Hide non-active slides after transition
      setTimeout(() => {
        slides.forEach((slide, index) => {
          if (index !== currentIndex) {
            slide.style.visibility = 'hidden';
          }
        });
      }, 300); // Match this with the CSS transition time
      
      // Update dots
      if (dots.length > 0) {
        dots.forEach((dot, index) => {
          dot.classList.toggle('active', index === currentIndex);
        });
      }
    }
    
    // Initialize dot click events
    dots.forEach((dot, index) => {
      dot.addEventListener('click', () => {
        currentIndex = index;
        updateCarousel();
        resetInterval();
      });
    });
    
    // Previous button click
    if (prevBtn) {
      prevBtn.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
        updateCarousel();
        resetInterval();
      });
    }
    
    // Next button click
    if (nextBtn) {
      nextBtn.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % totalSlides;
        updateCarousel();
        resetInterval();
      });
    }
    
    // Automatic slide change
    let interval = setInterval(autoSlide, 5000);
    
    function autoSlide() {
      currentIndex = (currentIndex + 1) % totalSlides;
      updateCarousel();
    }
    
    function resetInterval() {
      clearInterval(interval);
      interval = setInterval(autoSlide, 5000);
    }
    
    // Pause on hover
    const carouselContainer = document.querySelector('.carousel-container');
    if (carouselContainer) {
      carouselContainer.addEventListener('mouseenter', () => {
        clearInterval(interval);
      });
      
      carouselContainer.addEventListener('mouseleave', () => {
        interval = setInterval(autoSlide, 5000);
      });
    }
    
    // Handle touch events for mobile
    let touchStartX = 0;
    let touchEndX = 0;
    
    carouselContainer.addEventListener('touchstart', (e) => {
      touchStartX = e.touches[0].clientX;
      clearInterval(interval);
    });
    
    carouselContainer.addEventListener('touchend', (e) => {
      touchEndX = e.changedTouches[0].clientX;
      handleSwipe();
      interval = setInterval(autoSlide, 5000);
    });
    
    function handleSwipe() {
      const difference = touchStartX - touchEndX;
      
      // If swipe is significant (more than 50px)
      if (Math.abs(difference) > 50) {
        if (difference > 0) {
          // Swipe left - next slide
          currentIndex = (currentIndex + 1) % totalSlides;
        } else {
          // Swipe right - previous slide
          currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
        }
        updateCarousel();
      }
    }
    
    // Initialize with first slide active
    updateCarousel();
  }
</script>               
            
@endsection