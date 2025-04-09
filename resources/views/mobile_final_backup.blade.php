@extends('layouts.mobile_marque')
@section('content')

<style>
    @media (min-width: 768px) {
        .desktop-alert {
            display: block; /* Show alert only on larger screens */
        }
    }

    @media (max-width: 767px) {
        .desktop-alert {
            display: none !important; /* Ensure it's hidden on mobile */
        }
    }
</style>

<div class="alert alert-warning alert-dismissible show d-flex align-items-center justify-content-between desktop-alert" role="alert"  
     style="background-color: black; color: white; border-radius: 0px; position: relative;">
  
  <strong>For Better Visibility, Please View On Your Mobile!</strong>

  <button type="button" data-dismiss="alert" aria-label="Close" 
          style="color: white; position: absolute; right: 10px; top: 13px; background: transparent; border: 1px solid white;">
    <span aria-hidden="true">&times;</span>
  </button>

</div>



<div class="category-container">

    @php
        use Illuminate\Support\Facades\Crypt;
    
        $categories = [
            ['name' => 'Saree', 'icon' => $saree_icon],
            ['name' => 'Dresses', 'icon' => $dress_icon],
            ['name' => 'Jeans', 'icon' => $jeans_icon],
            ['name' => 'Kurti', 'icon' => $kurti_icon],
            ['name' => 'Housecoat', 'icon' => $housecoat_icon],
            ['name' => 'Trousers', 'icon' => $traouser_icon],
            ['name' => 'T-Shirt', 'icon' => $tshirt_icon],
            ['name' => 'Shoes', 'icon' => $shoe_icon],
            ['name' => 'Nighty', 'icon' => $nighty_icon],
        ];
    @endphp
    
    @foreach ($categories as $category)
        @php
            $encryptedCategory = Crypt::encryptString($category['name']);
        @endphp
        <div class="category-card">
            <a href="/category/{{ urlencode($encryptedCategory) }}" style="text-decoration:none;">
                <img loading="lazy" src="{{ $category['icon'] }}" class="catimg" alt="Image">
                <p class="cat-text">{{ $category['name'] }}</p>
            </a>
        </div>
    @endforeach

</div>


<!--Slider -->


<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->


    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item-active item active">
            <!--<img src="{{ asset('public/assets/images/banners/mobile home slider.jpg') }}" style="height:600px; width:100%;">-->
           <img  loading="lazy"src="{{ $slider1 }}" alt="Image" style="height:600px; width:100%;">
        </div>
        
        <div class="item-active item">
           <img  loading="lazy"src="{{ $slider5 }}" alt="Image" style="height:600px; width:100%;">
        </div>

        <div class="item-active item">
           <img  loading="lazy"src="{{ $slider2 }}" alt="Image" style="height:600px; width:100%;">
        </div>

        <div class="item-active item">
           <img  loading="lazy"src="{{ $slider3 }}" alt="Image" style="height:600px; width:100%;">
        </div>
        
        <div class="item-active item">
           <img  loading="lazy"src="{{ $slider4 }}" alt="Image" style="height:600px; width:100%;">
        </div>
        

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>



<h3 class="heading">Coupons For You</h3>
<div class="coupon-container">
    <div class="coupon-card" style="background-color:transparent; border:none">
       <img  loading="lazy"src="{{ $coupon1 }}"
            alt="Coupon 1">
            <!--<img src="{{ asset('public/assets/images/coupon/coupon for mobile 1.png') }}"-->
            <!--alt="Coupon 1">-->
    </div>
    <div class="coupon-card" style="background-color:transparent; border:none">
       <img  loading="lazy"src="{{ $coupon1 }}"
            alt="Coupon 2">
            <!--<img src="{{ asset('public/assets/images/coupon/coupon for mobile 2.png') }}"-->
            <!--alt="Coupon 1">-->
    </div>
    <div class="coupon-card" style="background-color:transparent; border:none">
       <img  loading="lazy"src="{{ $coupon1 }}"
            alt="Coupon 3">
            <!--<img src="{{ asset('public/assets/images/coupon/coupon for mobile 3.png') }}"-->
            <!--alt="Coupon 1">-->
    </div>
</div>


<h3 class="heading">Weekly Trends</h3>
<div class="tranding">
    <div class="tranding-card" style="height:100%; background-color: unset;
    border: none;">
        <video width="320" height="240" playsinline autoplay muted loop style="border-radius: 10px;">
          <source src="{{ $product1 }}" type="video/mp4" class="catimg" style="width:100%;">

        </video>
    </div>
    <div class="tranding-card"  style="height:100%;background-color: unset;
    border: none;">
             <video width="320" height="240" playsinline autoplay muted loop style="border-radius: 10px;">
          <source src="{{ $product2 }}" type="video/mp4" class="catimg" style="width:100%;">

        </video>
    </div>
    <div class="tranding-card"  style="height:100%;background-color: unset;
    border: none;">
               <video width="320" height="240" playsinline autoplay muted loop style="border-radius: 10px;">
          <source src="{{ $product3 }}" type="video/mp4" class="catimg" style="width:100%;">

        </video>
    </div>
    <div class="tranding-card"  style="height:100%;background-color: unset;
    border: none;">
        <video width="320" height="240" playsinline autoplay muted loop style="border-radius: 10px;">
          <source src="{{ $product4 }}" type="video/mp4" class="catimg" style="width:100%;">

        </video>
    </div>
    <div class="tranding-card"  style="height:100%;background-color: unset;
    border: none;">
               <video width="320" height="240" playsinline autoplay muted loop style="border-radius: 10px;">
          <source src="{{ $product5 }}" type="video/mp4" class="catimg" style="width:100%;">

        </video>
    </div>
    
</div>

<h3 class="heading">OUR USP</h3>
<div class="Banner">
   <img  loading="lazy"src="{{ $usp }}" class="couponimg" alt="Shoes">
    

</div>

<br>
<!--Saree-->
<div class="Banner">
    <!--<img src="{{ $product1 }}" class="couponimg" alt="Shoes">-->
    <video  playsinline autoplay muted loop width="100%">
          <source src="{{ $category1 }}" type="video/mp4" class="catimg" style="width:100%;">

    </video>
    
    
   
</div>



    <div class="container"  style="padding-right: 0px; padding-left: 0px;">
        <div class="product-category-container" style="margin-left: 5px;">
             <!--Category Product -->
    
            @foreach ($saree as $sar)
            <div class="product-item-card">
                <a  href="/product/{{ Crypt::encryptString($sar->id) }}" style="text-decoration:none;">

                        @php
                            $images = json_decode($sar->images, true);
                            
                            $bncnt = DB::table('brands')->where('id',$sar->brand_id)->count();
                            if($bncnt == 0)
                            {
                                $brand_name = 'NA';
                            }
                            else
                            {
                                $brand_name = DB::table('brands')->where('id',$sar->brand_id)->latest()->first();
                            }
                            
                        @endphp
                        
                        @if(empty($images))
                            <img src="https://assets.ajio.com/medias/sys_master/root/20230728/GBrh/64c3db50a9b42d15c979555c/-473Wx593H-466398360-green-MODEL.jpg" alt="Image">

                        @elseif(!empty($images) && isset($images[0]))
                            <img src="{{ $images[0] }}" alt="Image">
                        @endif

                    <div class="card-body product-item-card-body text-left">
                        <h8 class="card-title"><b>
                            @if($brand_name == 'NA')
                            
                            @else
                                {{$brand_name->brand_name}}
                            @endif
                            </b></h8><br>
                            <h8 class="card-title" title="{{ $sar->product_name }}">
                                {{ strlen($sar->product_name) <= 16 ? $sar->product_name : Str::limit($sar->product_name, 16, '...') }}
                            </h8>
                                                
                            <div class="d-flex">
                            <p class="card-text me-2" style="text-decoration: line-through; color:red">Rs. {{$sar->maximum_retail_price}}</p>
                            <p class="card-text ml-2">Rs. {{$sar->portal_updated_price}}</p>
                        </div>                    
                    </div>
                </a>
            </div>
            @endforeach
    
    </div>


    <div class="Banner">
       <img  loading="lazy"src="{{ $category2 }}" class="couponimg" alt="Shoes">
    </div>
    
    @if($logincount == 0)
      <div id="pageLoadModal" class="modal">
            
                <div class="modal-content">
    
                    <h3 style="text-align:left">Whats your name?</h3><br>
                    
                    
                    
                    	<form method="POST" action="{{ route('name.update') }}">
    
                                @csrf
        						<div class="input-group">
                                    <!--<label for="mobile_no" class="col-md-4 col-form-label text-md-end">{{ __('Mobile No') }}</label>-->
                                    
                                    <div class="mobile-input-wrapper" style="width:100%">
    
                                        <input type="text" placeholder="Enter Your Name" name="name"  style="background-color:transperant; color: #000054; border-color: #000054;" required>
                                    </div>
                                        @error('mobile_no')
        
                                            <span class="invalid-feedback" role="alert">
        
                                                <strong>{{ $message }}</strong>
        
                                            </span>
        
                                        @enderror
        						</div>
        						<br>
        						<h6 style="text-align:left">Your account will be updated with your name</h6><br>
                                
        						<button class="btn btn-danger" style="background-color:#961311;">Submit</button>
                                <br>
                                <br>
                                <p>Enter your name Here and Keep Shopping</p>
    					</form>
                </div>
        </div>
    @endif
    
    
    <div class="container" style="padding-right: 0px; padding-left: 0px;">
        <div class="product-category-container" style="margin-left: 5px;">
            <!-- Category Product 1 -->
               @foreach ($western as $wstrn)
                <div class="product-item-card">
                    <a  href="/product/{{ Crypt::encryptString($wstrn->id) }}" style="text-decoration:none;">
    
                            @php
                                $images = json_decode($wstrn->images, true);
                                
                                $bncnt = DB::table('brands')->where('id',$wstrn->brand_id)->count();
                                if($bncnt == 0)
                                {
                                    $brand_name = 'NA';
                                }
                                else
                                {
                                    $brand_name = DB::table('brands')->where('id',$wstrn->brand_id)->latest()->first();
                                }
                                
                            @endphp
                            
                            @if(!empty($images) && isset($images[0]))
                                <img src="{{ $images[0] }}" alt="Image">
                            @endif
    
                        <div class="card-body product-item-card-body text-left">
                            <h8 class="card-title"><b>
                                @if($brand_name == 'NA')
                                
                                @else
                                    {{$brand_name->brand_name}}
                                @endif
                                </b></h8><br>
                                <h8 class="card-title" title="{{ $wstrn->product_name }}">
                                    {{ Str::limit($jns->product_name, 16, '...') }}
                                </h8>                        
                                <div class="d-flex">
                                <p class="card-text me-2" style="text-decoration: line-through; color:red">Rs. {{$wstrn->maximum_retail_price}}</p>
                                <p class="card-text ml-2">Rs. {{$wstrn->portal_updated_price}}</p>
                            </div>                    
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    
    
    <div class="Banner">
             <video  playsinline autoplay muted loop width="100%">
              <source src="{{ $category3 }}" type="video/mp4" class="catimg" style="width:100%;">
    
        </video>
    </div>
    
    
    <div class="container" style="padding-right: 0px; padding-left: 0px;">
        <div class="product-category-container" style="margin-left: 5px;">
            <!-- Category Product 1 -->
        @foreach ($kurti as $krti)
                <div class="product-item-card">
                    <a  href="/product/{{ Crypt::encryptString($krti->id) }}" style="text-decoration:none;">
    
                            @php
                                $images = json_decode($krti->images, true);
                                
                                $bncnt = DB::table('brands')->where('id',$krti->brand_id)->count();
                                if($bncnt == 0)
                                {
                                    $brand_name = 'NA';
                                }
                                else
                                {
                                    $brand_name = DB::table('brands')->where('id',$krti->brand_id)->latest()->first();
                                }
                                
                            @endphp
                            
                            @if(!empty($images) && isset($images[0]))
                                <img src="{{ $images[0] }}" alt="Image">
                            @endif
    
                        <div class="card-body product-item-card-body text-left">
                            <h8 class="card-title"><b>
                                @if($brand_name == 'NA')
                                
                                @else
                                    {{$brand_name->brand_name}}
                                @endif
                                </b></h8><br>
                                <h8 class="card-title" title="{{ $krti->product_name }}">
                                    {{ Str::limit($jns->product_name, 16, '...') }}
                                </h8>                        
                                <div class="d-flex">
                                <p class="card-text me-2" style="text-decoration: line-through; color:red">Rs. {{$krti->maximum_retail_price}}</p>
                                <p class="card-text ml-2">Rs. {{$krti->portal_updated_price}}</p>
                            </div>                    
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    
    
    
    
    <!--Footwear-->
    <div class="Banner">
             <video  playsinline autoplay muted loop width="100%">
              <source src="{{ $category4 }}" type="video/mp4" class="catimg" style="width:100%;">
    
        </video>
    </div>
    
    
    <div class="container" style="padding-right: 0px; padding-left: 0px;">
        <div class="product-category-container" style="margin-left: 5px;">
            <!-- Category Product 1 -->
            @foreach ($shoes as $shs)
                <div class="product-item-card">
                    <a  href="/product/{{ Crypt::encryptString($shs->id) }}" style="text-decoration:none;">
    
                            @php
                                $images = json_decode($shs->images, true);
                                
                                $bncnt = DB::table('brands')->where('id',$shs->brand_id)->count();
                                if($bncnt == 0)
                                {
                                    $brand_name = 'NA';
                                }
                                else
                                {
                                    $brand_name = DB::table('brands')->where('id',$shs->brand_id)->latest()->first();
                                }
                                
                            @endphp
                            
                            @if(!empty($images) && isset($images[0]))
                                <img src="{{ $images[0] }}" alt="Image">
                            @endif
    
                        <div class="card-body product-item-card-body text-left">
                            <h8 class="card-title"><b>
                                @if($brand_name == 'NA')
                                
                                @else
                                    {{$brand_name->brand_name}}
                                @endif
                                </b></h8><br>
                                <h8 class="card-title" title="{{ $shs->product_name }}">
                                    {{ Str::limit($shs->product_name, 16, '...') }}
                                </h8>                        
                                <div class="d-flex">
                                <p class="card-text me-2" style="text-decoration: line-through; color:red">Rs. {{$shs->maximum_retail_price}}</p>
                                <p class="card-text ml-2">Rs. {{$shs->portal_updated_price}}</p>
                            </div>                    
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    
    
    
    
    
    <!--Product4-->
    <div class="Banner">
             <video  playsinline autoplay muted loop width="100%">
              <source src="{{ $category4 }}" type="video/mp4" class="catimg" style="width:100%;">
    
        </video>
    </div>
    
    
    <div class="container" style="padding-right: 0px; padding-left: 0px;">
        <div class="product-category-container" style="margin-left: 5px;">
            <!-- Category Product 1 -->
            @foreach ($tshirt as $tshrt)
                <div class="product-item-card">
                    <a  href="/product/{{ Crypt::encryptString($tshrt->id) }}" style="text-decoration:none;">
    
                            @php
                                $images = json_decode($tshrt->images, true);
                                
                                $bncnt = DB::table('brands')->where('id',$tshrt->brand_id)->count();
                                if($bncnt == 0)
                                {
                                    $brand_name = 'NA';
                                }
                                else
                                {
                                    $brand_name = DB::table('brands')->where('id',$tshrt->brand_id)->latest()->first();
                                }
                                
                            @endphp
                            
                            @if(!empty($images) && isset($images[0]))
                                <img src="{{ $images[0] }}" alt="Image">
                            @endif
    
                        <div class="card-body product-item-card-body text-left">
                            <h8 class="card-title"><b>
                                @if($brand_name == 'NA')
                                
                                @else
                                    {{$brand_name->brand_name}}
                                @endif
                                </b></h8><br>
                                <h8 class="card-title" title="{{ $tshrt->product_name }}">
                                    {{ Str::limit($jns->product_name, 16, '...') }}
                                </h8>                        
                                <div class="d-flex">
                                <p class="card-text me-2" style="text-decoration: line-through; color:red">Rs. {{$tshrt->maximum_retail_price}}</p>
                                <p class="card-text ml-2">Rs. {{$tshrt->portal_updated_price}}</p>
                            </div>                    
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <!--product5-->
    
    <div class="Banner">
        <!--<img src="{{ asset('public/assets/images/banners/product 3.jpg') }}" class="couponimg" alt="Shoes">-->
        <!--<img src="{{ $product5 }}" class="couponimg" alt="Shoes">-->
            <video  playsinline autoplay muted loop width="100%">
              <source src="{{ $category5 }}" type="video/mp4" class="catimg" style="width:100%;">
    
        </video>
    </div>


    <div class="container" style="padding-right: 0px; padding-left: 0px;">
        <div class="product-category-container" style="margin-left: 5px;">
            <!-- Category Product 1 -->
               @foreach ($kids as $kds)
                <div class="product-item-card">
                    <a  href="/product/{{ Crypt::encryptString($kds->id) }}" style="text-decoration:none;">
    
                            @php
                                $images = json_decode($kds->images, true);
                                
                                $bncnt = DB::table('brands')->where('id',$kds->brand_id)->count();
                                if($bncnt == 0)
                                {
                                    $brand_name = 'NA';
                                }
                                else
                                {
                                    $brand_name = DB::table('brands')->where('id',$kds->brand_id)->latest()->first();
                                }
                                
                            @endphp
                            
                            @if(!empty($images) && isset($images[0]))
                                <img src="{{ $images[0] }}" alt="Image">
                            @endif
    
                        <div class="card-body product-item-card-body text-left">
                            <h8 class="card-title"><b>
                                @if($brand_name == 'NA')
                                
                                @else
                                    {{$brand_name->brand_name}}
                                @endif
                                </b></h8><br>
                                <h8 class="card-title" title="{{ $kds->product_name }}">
                                    {{ Str::limit($jns->product_name, 16, '...') }}
                                </h8>                        
                                <div class="d-flex">
                                <p class="card-text me-2" style="text-decoration: line-through; color:red">Rs. {{$kds->maximum_retail_price}}</p>
                                <p class="card-text ml-2">Rs. {{$kds->portal_updated_price}}</p>
                            </div>                    
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>


    <h3 class="heading">Trendings</h3>
    <div class="tranding">
        <div class="tranding-card" >
            <a href="/category/{{ urlencode(Crypt::encryptString('Saree')) }}" style="text-decoration:none;">
               <img loading="lazy" src="{{ $tranding1 }}" class="catimg" alt="Item 1">
            </a>
                
        </div>
        <div class="tranding-card">
             <a href="/category/{{ urlencode(Crypt::encryptString('Dresses')) }}" style="text-decoration:none;">
               <img  loading="lazy"src="{{ $tranding2 }}" class="catimg" alt="Item 1">
            </a>
        </div>
        <div class="tranding-card">
            <a href="/category/{{ urlencode(Crypt::encryptString('T-shirts')) }}" style="text-decoration:none;">
                <img  loading="lazy"src="{{ $tranding4 }}" class="catimg" alt="Item 1">
            </a>
        </div>
        <div class="tranding-card">
           <img  loading="lazy"src="{{ $tranding3 }}"
                class="catimg" alt="Item 1">
        </div>
        
    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    
    // JavaScript to handle modal behavior
    document.addEventListener("DOMContentLoaded", function () {
        const modal = document.getElementById("pageLoadModal");
        modal.style.display = "flex"; // Show modal on page load
    });
    
    function closeModal() {
        const modal = document.getElementById("pageLoadModal");
        modal.style.display = "none"; // Hide modal on close button click
    }
    </script>

@endsection