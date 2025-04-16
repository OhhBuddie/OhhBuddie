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
/* Preload optimization */
.video-lazy {
    opacity: 0;
    transition: opacity 0.3s;
}
.video-lazy.loaded {
    opacity: 1;
}
/* Optimize carousel performance */
.carousel-inner .item img {
    height: auto;
    max-height: 600px;
    width: 100%;
    object-fit: cover;
}
</style>
<link rel="preconnect" href="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com">
<link rel="dns-prefetch" href="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com">
<div class="alert alert-warning alert-dismissible show d-flex align-items-center justify-content-between desktop-alert"
    role="alert" style="background-color: black; color: white; border-radius: 0px; position: relative;">
    <strong>For Better Visibility, Please View On Your Mobile!</strong>
    <button type="button" data-dismiss="alert" aria-label="Close"
        style="color: white; position: absolute; right: 10px; top: 13px; background: transparent; border: 1px solid white;">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<!-- Defer loading of non-critical scripts -->
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.4.0" defer></script>
<script src="script.js" defer></script>

<div class="category-container">
@php
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cache;

$categories = [
    ['name' => 'Saree','icon' => 'https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Home/Category+Icons/sareebg(brown).gif'],    
    ['name' => 'Dresses', 'icon' => 'https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Home/Category+Icons/dress1.gif'],
    ['name' => 'Jeans', 'icon' => 'https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Home/Category+Icons/jeans.gif'],
    ['name' => 'Kurti', 'icon' => 'https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Home/Category+Icons/kurti.gif'],
    ['name' => 'Housecoat', 'icon' => 'https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Home/Category+Icons/housecoat(bgblue).gif'],
    ['name' => 'Trousers', 'icon' => 'https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Home/Category+Icons/traouser.gif'],
    ['name' => 'T-Shirt', 'icon' => 'https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Home/Category+Icons/tshirt.gif'],
    ['name' => 'Shoes', 'icon' => 'https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Home/Category+Icons/shoe.gif'],
    ['name' => 'Nighty', 'icon' => 'https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Home/Category+Icons/night+dress.gif'],
];
@endphp

@foreach ($categories as $category)
    @php
    $encryptedCategory = Crypt::encryptString($category['name']);
    @endphp
    <div class="category-card">
        <a href="/category/{{ $encryptedCategory }}" style="text-decoration:none;">
            <img loading="lazy" src="{{ $category['icon'] }}" class="catimg" alt="{{ $category['name'] }}">
            <p class="cat-text">{{ $category['name'] }}</p>
        </a>
    </div>
@endforeach
</div>
@php
    $encryptedSaree = Crypt::encryptString('Saree');
    $encryptedJeans = Crypt::encryptString('Jeans');
    $encryptedkids = Crypt::encryptString('Kids');
@endphp
<!-- Optimized Slider -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="item-active item active">
            <img loading="lazy" src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Home/Sliders/static+slider+western.webp" alt="Slider Image 1">
        </div>
        <div class="item-active item">
            <img loading="lazy" src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Home/Sliders/try+out.webp" alt="Slider Image 5">
        </div>
        <div class="item-active item">
            <a href="/category/{{ $encryptedJeans }}" style="text-decoration:none;">
             <img loading="lazy" src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Home/Sliders/jeans+static+slider+(1).webp" alt="Slider Image 2">
            </a>
        </div>
        <div class="item-active item">
            <img loading="lazy" src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Home/Sliders/static+slider+kids.webp" alt="Slider Image 3">
        </div>
        <div class="item-active item">
            <img loading="lazy" src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Home/Sliders/static+slider+saree.webp" alt="Slider Image 4">
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<h3 class="heading">Weekly Trends</h3>

    <!-- Optimized Video Loading -->
    <div class="tranding">
    <div class="tranding-card" style="height:100%; background-color: unset; border: none;">
        <video width="320" height="240" playsinline muted loop autoplay style="border-radius: 10px;">
            <source src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Home/Trending+Cards/dress.mp4" type="video/mp4">
        </video>
    </div>
    <div class="tranding-card" style="height:100%; background-color: unset; border: none;">
        <video width="320" height="240" playsinline muted loop autoplay style="border-radius: 10px;">
            <source src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Home/Trending+Cards/jeans.mp4" type="video/mp4">
        </video>
    </div>
    <div class="tranding-card" style="height:100%; background-color: unset; border: none;">
        <video width="320" height="240" playsinline muted loop autoplay style="border-radius: 10px;">
            <source src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Home/Trending+Cards/saree.mp4" type="video/mp4">
        </video>
    </div>
    <div class="tranding-card" style="height:100%; background-color: unset; border: none;">
        <video width="320" height="240" playsinline muted loop autoplay style="border-radius: 10px;">
            <source src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Home/Trending+Cards/shoe.mp4" type="video/mp4">
        </video>
    </div>
    <div class="tranding-card" style="height:100%; background-color: unset; border: none;">
        <video width="320" height="240" playsinline muted loop autoplay style="border-radius: 10px;">
            <source src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Home/Trending+Cards/t+shirt.mp4" type="video/mp4">
        </video>
    </div>
</div>

<h3 class="heading">OUR USP</h3>
<div class="Banner">
    <video playsinline muted loop autoplay width="100%">
        <source src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Home/USP+Banner/usp+banner+17.02.mp4" type="video/mp4">
    </video>
</div>

<br>

<!-- Saree -->
<div class="Banner">
    <video playsinline muted loop autoplay width="100%">
        <source src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Home/Category+Banners/saree+mobile+banner.mp4" type="video/mp4">
    </video>
</div>


<div class="container" style="padding-right: 0px; padding-left: 0px;">
    <div class="product-category-container" style="margin-left: 5px;">
        @php
        // Pre-fetch brand data to avoid repeated queries
        $brandCache = [];
        $sareeIds = $saree->pluck('brand_id')->filter()->unique()->toArray();
        
        if (!empty($sareeIds)) {
            $brands = DB::table('brands')->whereIn('id', $sareeIds)->get();
            foreach ($brands as $brand) {
                $brandCache[$brand->id] = $brand->brand_name;
            }
        }
        @endphp
        
        @foreach ($saree as $sar)
            <div class="product-item-card">
                <a href="/product/{{ Crypt::encryptString($sar->id) }}" style="text-decoration:none;">
                    @php
                    $images = json_decode($sar->images, true);
                    $brandName = isset($brandCache[$sar->brand_id]) ? $brandCache[$sar->brand_id] : '';
                    @endphp
                    
                    @if (empty($images))
                        <img loading="lazy" src="https://assets.ajio.com/medias/sys_master/root/20230728/GBrh/64c3db50a9b42d15c979555c/-473Wx593H-466398360-green-MODEL.jpg" alt="Image">
                    @elseif(!empty($images) && isset($images[0]))
                        <img loading="lazy" src="{{ $images[0] }}" alt="Image">
                    @endif
                    
                    <div class="card-body product-item-card-body text-left">
                        <h8 class="card-title"><b>{{ $brandName }}</b></h8><br>
                        <h8 class="card-title" title="{{ $sar->product_name }}">
                            {{ strlen($sar->product_name) <= 16 ? $sar->product_name : substr($sar->product_name, 0, 16) . '...' }}
                        </h8>
                        <div class="d-flex">
                            <p class="card-text me-2" style="text-decoration: line-through; color:red">Rs. {{ $sar->maximum_retail_price }}</p>
                            <p class="card-text ml-2">Rs. {{ $sar->portal_updated_price }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

 <div class="Banner">
      
            <video  playsinline autoplay muted loop width="100%">
              <source src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Home/Category+Banners/kids+mobile+banner+(1).mp4" type="video/mp4" class="catimg" style="width:100%;">
    
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
                                    {{ Str::limit($kds->product_name, 16, '...') }}
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


<div class="container" style="padding-right: 0px; padding-left: 0px;">
    <div class="product-category-container" style="margin-left: 5px;">
        @php
        // Pre-fetch brand data for western products
        $westernBrandCache = [];
        $westernIds = $western->pluck('brand_id')->filter()->unique()->toArray();
        
        if (!empty($westernIds)) {
            $westernBrands = DB::table('brands')->whereIn('id', $westernIds)->get();
            foreach ($westernBrands as $brand) {
                $westernBrandCache[$brand->id] = $brand->brand_name;
            }
        }
        @endphp
        
        @foreach ($western as $wstrn)
            <div class="product-item-card">
                <a href="/product/{{ Crypt::encryptString($wstrn->id) }}" style="text-decoration:none;">
                    @php
                    $images = json_decode($wstrn->images, true);
                    $brandName = isset($westernBrandCache[$wstrn->brand_id]) ? $westernBrandCache[$wstrn->brand_id] : '';
                    @endphp
                    
                    @if (!empty($images) && isset($images[0]))
                        <img loading="lazy" src="{{ $images[0] }}" alt="Image">
                    @endif
                    
                    <div class="card-body product-item-card-body text-left">
                        <h8 class="card-title"><b>{{ $brandName }}</b></h8><br>
                        <h8 class="card-title" title="{{ $wstrn->product_name }}">
                            {{ strlen($wstrn->product_name) <= 16 ? $wstrn->product_name : substr($wstrn->product_name, 0, 16) . '...' }}
                        </h8>
                        <div class="d-flex">
                            <p class="card-text me-2" style="text-decoration: line-through; color:red">Rs. {{ $wstrn->maximum_retail_price }}</p>
                            <p class="card-text ml-2">Rs. {{ $wstrn->portal_updated_price }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

 <div class="Banner">
    <video playsinline muted loop autoplay width="100%">
        <source src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Home/Category+Banners/salwar+mobile+banner.mp4" type="video/mp4">
    </video>
 </div>

<div class="container" style="padding-right: 0px; padding-left: 0px;">
    <div class="product-category-container" style="margin-left: 5px;">
        @php
        // Pre-fetch brand data for kurti products
        $kurtiBrandCache = [];
        $kurtiIds = $kurti->pluck('brand_id')->filter()->unique()->toArray();
        
        if (!empty($kurtiIds)) {
            $kurtiBrands = DB::table('brands')->whereIn('id', $kurtiIds)->get();
            foreach ($kurtiBrands as $brand) {
                $kurtiBrandCache[$brand->id] = $brand->brand_name;
            }
        }
        @endphp
        
        @foreach ($kurti as $krti)
            <div class="product-item-card">
                <a href="/product/{{ Crypt::encryptString($krti->id) }}" style="text-decoration:none;">
                    @php
                    $images = json_decode($krti->images, true);
                    $brandName = isset($kurtiBrandCache[$krti->brand_id]) ? $kurtiBrandCache[$krti->brand_id] : '';
                    @endphp
                    
                    @if (!empty($images) && isset($images[0]))
                        <img loading="lazy" src="{{ $images[0] }}" alt="Image">
                    @endif
                    
                    <div class="card-body product-item-card-body text-left">
                        <h8 class="card-title"><b>{{ $brandName }}</b></h8><br>
                        <h8 class="card-title" title="{{ $krti->product_name }}">
                            {{ strlen($krti->product_name) <= 16 ? $krti->product_name : substr($krti->product_name, 0, 16) . '...' }}
                        </h8>
                        <div class="d-flex">
                            <p class="card-text me-2" style="text-decoration: line-through; color:red">Rs. {{ $krti->maximum_retail_price }}</p>
                            <p class="card-text ml-2">Rs. {{ $krti->portal_updated_price }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

<!-- Footwear -->
<div class="Banner">
    <video playsinline muted loop autoplay width="100%">
        <source src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Home/Category+Banners/Shoe.mp4" type="video/mp4">
    </video>
</div>

<div class="container" style="padding-right: 0px; padding-left: 0px;">
    <div class="product-category-container" style="margin-left: 5px;">
        @php
        // Pre-fetch brand data for shoes products
        $shoesBrandCache = [];
        $shoesIds = $shoes->pluck('brand_id')->filter()->unique()->toArray();
        
        if (!empty($shoesIds)) {
            $shoesBrands = DB::table('brands')->whereIn('id', $shoesIds)->get();
            foreach ($shoesBrands as $brand) {
                $shoesBrandCache[$brand->id] = $brand->brand_name;
            }
        }
        @endphp
        
        @foreach ($shoes as $shs)
            <div class="product-item-card">
                <a href="/product/{{ Crypt::encryptString($shs->id) }}" style="text-decoration:none;">
                    @php
                    $images = json_decode($shs->images, true);
                    $brandName = isset($shoesBrandCache[$shs->brand_id]) ? $shoesBrandCache[$shs->brand_id] : '';
                    @endphp
                    
                    @if (!empty($images) && isset($images[0]))
                        <img loading="lazy" src="{{ $images[0] }}" alt="Image">
                    @endif
                    
                    <div class="card-body product-item-card-body text-left">
                        <h8 class="card-title"><b>{{ $brandName }}</b></h8><br>
                        <h8 class="card-title" title="{{ $shs->product_name }}">
                            {{ strlen($shs->product_name) <= 16 ? $shs->product_name : substr($shs->product_name, 0, 16) . '...' }}
                        </h8>
                        <div class="d-flex">
                            <p class="card-text me-2" style="text-decoration: line-through; color:red">Rs. {{ $shs->maximum_retail_price }}</p>
                            <p class="card-text ml-2">Rs. {{ $shs->portal_updated_price }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

<h3 class="heading">Trendings</h3>
<div class="tranding">
    <div class="tranding-card">
        <a href="/category/{{ urlencode(Crypt::encryptString('Saree')) }}" style="text-decoration:none;">
            <img loading="lazy" src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Home/Cards+2/4+(1).jpg" class="catimg" alt="Saree">
        </a>
    </div>
    <div class="tranding-card">
        <a href="/category/{{ urlencode(Crypt::encryptString('Dresses')) }}" style="text-decoration:none;">
            <img loading="lazy" src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Home/Cards+2/ek+sutta+-+Copy.jpg" class="catimg" alt="Dresses">
        </a>
    </div>
    <div class="tranding-card">
        <a href="/category/{{ urlencode(Crypt::encryptString('T-shirts')) }}" style="text-decoration:none;">
            <img loading="lazy" src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Home/Cards+2/good+sleep+(5).jpg" class="catimg" alt="T-shirts">
        </a>
    </div>
    <div class="tranding-card">
        <img loading="lazy" src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Home/Cards+2/For+the+Track(1).jpg" class="catimg" alt="Trending Item">
    </div>
</div>

<div class="Banner">
    <img loading="lazy" src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Home/Promotional+Banners/Shoe+banner+copy.webp" class="couponimg" alt="Shoes">
</div>

@if ($logincount == 0)
<div id="pageLoadModal" class="modal">
    <div class="modal-content">
        <h3 style="text-align:left">Whats your name?</h3><br>
        <form method="POST" action="{{ route('name.update') }}">
            @csrf
            <div class="input-group">
                <div class="mobile-input-wrapper" style="width:100%">
                    <input type="text" placeholder="Enter Your Name" name="name" style="background-color:transperant; color: #000054; border-color: #000054;" required>
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
            <br><br>
            <p>Enter your name Here and Keep Shopping</p>
        </form>
    </div>
</div>
@endif

<!-- Optimized script loading -->
<script>
// Add intersection observer for efficient lazy loading of videos
document.addEventListener("DOMContentLoaded", function() {
    // Handle modal behavior
    const modal = document.getElementById("pageLoadModal");
    if (modal) {
        modal.style.display = "flex"; // Show modal on page load
    }
    
    // Function to close the modal
    window.closeModal = function() {
        const modal = document.getElementById("pageLoadModal");
        if (modal) {
            modal.style.display = "none";
        }
    };
    
    // Setup navigation class for proper styling
    const nav = document.querySelector('nav');
    const body = document.body;
    if (nav) {
        body.classList.add('has-nav');
    } else {
        body.classList.remove('has-nav');
    }
    
    // Lazy load videos using Intersection Observer
    const lazyVideos = document.querySelectorAll("video.video-lazy");
    if ("IntersectionObserver" in window) {
        const videoObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const video = entry.target;
                    const src = video.dataset.src;
                    if (src) {
                        video.src = src;
                        video.load();
                        video.classList.add("loaded");
                        // Only start playing when in viewport
                        video.play().catch(error => {
                            // Handle autoplay restrictions
                            console.log("Video play prevented:", error);
                        });
                        videoObserver.unobserve(video);
                    }
                }
            });
        }, {
            rootMargin: "100px 0px",
            threshold: 0.1
        });
        
        lazyVideos.forEach(video => {
            videoObserver.observe(video);
        });
    } else {
        // Fallback for browsers that don't support Intersection Observer
        lazyVideos.forEach(video => {
            const src = video.dataset.src;
            if (src) {
                video.src = src;
                video.classList.add("loaded");
            }
        });
    }
});

// Optimize carousel to reduce repaints
const carouselItems = document.querySelectorAll('#myCarousel .item img');
carouselItems.forEach(img => {
    if (img.complete) {
        img.classList.add('loaded');
    } else {
        img.addEventListener('load', () => {
            img.classList.add('loaded');
        });
    }
});
</script>
<script>
    // Add this to your <head> section
document.addEventListener("DOMContentLoaded", function() {
    // Preload video metadata when page loads
    const videoElements = document.querySelectorAll('video.video-lazy');
    
    // First, set up the observer
    const videoObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            const video = entry.target;
            
            if (entry.isIntersecting) {
                // Video is in view
                const src = video.dataset.src;
                if (src && !video.src) {
                    console.log("Loading video:", src);
                    
                    // Set source and load
                    video.src = src;
                    video.load();
                    
                    // Play faster than normal
                    video.playbackRate = 1.5;
                    
                    video.classList.add("loaded");
                    
                    // Attempt to play
                    const playPromise = video.play();
                    if (playPromise !== undefined) {
                        playPromise.catch(error => {
                            console.log("Autoplay prevented:", error);
                            // Could show play button here if needed
                        });
                    }
                }
            } else {
                // Video is out of view
                if (video.src) {
                    video.pause();
                    
                    // Optional: completely unload the video to save resources
                    // Comment this part out if you want videos to stay loaded
                    if (!video.dataset.keepLoaded) {
                        video.src = '';
                        video.load();
                        video.classList.remove("loaded");
                    }
                }
            }
        });
    }, {
        rootMargin: "100px 0px", // Load when within 100px of viewport
        threshold: 0.1 // Trigger when at least 10% is visible
    });
    
    // Apply observer to all lazy videos
    videoElements.forEach(video => {
        // Add poster if not already present
        if (!video.hasAttribute('poster')) {
            video.setAttribute('poster', 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzIwIiBoZWlnaHQ9IjI0MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjZTllOWU5Ii8+PC9zdmc+');
        }
        
        // Set preload attribute
        video.setAttribute('preload', 'metadata');
        
        // Observe this video
        videoObserver.observe(video);
    });
    
    // Preconnect to known video domains to speed up loading
    const domains = [
        'https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com'
    ];
    
    domains.forEach(domain => {
        const link = document.createElement('link');
        link.rel = 'preconnect';
        link.href = domain;
        document.head.appendChild(link);
        
        const dnsPrefetch = document.createElement('link');
        dnsPrefetch.rel = 'dns-prefetch';
        dnsPrefetch.href = domain;
        document.head.appendChild(dnsPrefetch);
    });
});
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const videos = document.querySelectorAll("video.video-lazy");

        videos.forEach(video => {
            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const vid = entry.target;
                        const source = document.createElement("source");
                        source.src = vid.getAttribute("data-src");
                        source.type = "video/mp4";
                        vid.appendChild(source);
                        vid.load();
                        vid.play();
                        observer.unobserve(vid);
                    }
                });
            }, {
                threshold: 0.25
            });

            observer.observe(video);
        });
    });
</script>

@endsection