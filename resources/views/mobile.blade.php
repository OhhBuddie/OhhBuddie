@extends('layouts.mobile_marque')
@section('content')
<link rel="preload" as="image" href="https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Home/Sliders/69%20Minutes%20Delivery.webp">

<style>
    @media (min-width: 768px) {
        .desktop-alert {
            display: block;
        }
        .product-category-container {
            display: flex !important;
        }
        .product-item-card {
            flex: 0 0 33% !important;
        }
    }
    @media (max-width: 767px) {
        .desktop-alert {
            display: none !important;
        }
    }
    .video-lazy {
        opacity: 0;
        transition: opacity 0.3s;
    }
    .video-lazy.loaded {
        opacity: 1;
    }
    .carousel-inner .item img {
        height: auto;
        max-height: 600px;
        width: 100%;
        object-fit: cover;
    }
    .mySlides {
        display: none;
        width: 100%;
    }
    .mySlides.active-slide {
        display: block;
    }
    .dot {
        height: 4px;
        width: 25px;
        margin: 0 3px;
        background-color: white;
        border-radius: 20%;
        display: inline-block;
        transition: background-color 0.3s;
        cursor: pointer;
    }
    .dot.active {
        background-color: #EFC475;
    }
</style>
@php
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cache;
// Pre-calculate encrypted category names
$encryptedCategories = [
    'Saree' => Crypt::encryptString('Saree'),
    'Dresses' => Crypt::encryptString('Dresses'),
    'Jeans' => Crypt::encryptString('Jeans'),
    'Kurti' => Crypt::encryptString('Kurti'),
    'Kids' => Crypt::encryptString('Kids'),
    'Shoes' => Crypt::encryptString('Shoes'),
    'T-Shirt' => Crypt::encryptString('T-Shirt'),
    'Tops' => Crypt::encryptString('Tops')
];
$categories = [
    ['name' => 'Saree', 'icon' => 'https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Home/Category%20Icons/sareebg(brown).gif'],    
    ['name' => 'Dresses', 'icon' => 'https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Home/Category%20Icons/dress1.gif'],
    ['name' => 'Jeans', 'icon' => 'https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Home/Category%20Icons/jeans.gif'],
    ['name' => 'Kurti', 'icon' => 'https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Home/Category%20Icons/kurti.gif'],
    ['name' => 'Nighty', 'icon' => 'https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Home/Category%20Icons/night%20dress.gif'],
    ['name' => 'Housecoat', 'icon' => 'https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Home/Category%20Icons/housecoat(bgblue).gif'],
    ['name' => 'Trousers', 'icon' => 'https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Home/Category%20Icons/traouser.gif'],
    ['name' => 'T-Shirt', 'icon' => 'https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Home/Category%20Icons/tshirt.gif'],
    ['name' => 'Shoes', 'icon' => 'https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Home/Category%20Icons/shoe.gif'],
];
$trendingItems = [
    ['url' => $encryptedCategories['Dresses'], 'video' => 'dress.mp4'],
    ['url' => $encryptedCategories['Jeans'], 'video' => 'jeans.mp4'],
    ['url' => $encryptedCategories['Saree'], 'video' => 'saree.mp4'],
    ['url' => $encryptedCategories['Shoes'], 'video' => 'shoe.mp4'],
    ['url' => $encryptedCategories['T-Shirt'], 'video' => 't+shirt.mp4'],
];
$trendingCategories = [
    ['name' => 'Saree', 'img' => 'https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Home/Cards%202/4%20(1).jpg'],
    ['name' => 'Dresses', 'img' => 'https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Home/Cards%202/ek%20sutta%20-%20Copy.jpg'],
    ['name' => 'T-shirts', 'img' => 'https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Home/Cards%202/good%20sleep%20(5).jpg'],
];
@endphp
<link rel="preconnect" href="https://pub-859cf3e1f0194751917386af714f48e5.r2.dev">
<link rel="dns-prefetch" href="https://pub-859cf3e1f0194751917386af714f48e5.r2.dev">
<div class="category-container">
    @foreach ($categories as $category)
        <div class="category-card">
            <a href="/category/{{ $encryptedCategories[$category['name']] ?? Crypt::encryptString($category['name']) }}" style="text-decoration:none;">
                <img loading="lazy"  src="{{ $category['icon'] }}" class="catimg" alt="{{ $category['name'] }}">
                <p class="cat-text">{{ $category['name'] }}</p>
            </a>
        </div>
    @endforeach
</div>
<div class="w3-content w3-display-container" style="position: relative; max-width:600px; margin:auto; ">
<img 
  class="mySlides active-slide" 
  src="https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Home/Sliders/69%20Minutes%20Delivery.webp" 
  alt="Slide 1" 
  fetchpriority="high"
  style="width:100%; display:block;">
    <a href="/allproduct" style="text-decoration:none;"> 
     <img class="mySlides" src="https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Home/Sliders/Flat%2050%20OFF.webp" alt="Slide 2" style="width:100%; display:none;">
    </a>
    <a href="/category/{{ $encryptedCategories['Dresses'] }}" style="text-decoration:none;">
    <img class="mySlides" src="https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Home/Sliders/Fresh%20Drops.webp" alt="Slide 3" style="width:100%; display:none;">
    </a>
    <a href="/category/{{ $encryptedCategories['Kurti'] }}" style="text-decoration:none;">
        <img class="mySlides" src="https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Home/Sliders/NEWBUDDIE20.webp" alt="Slide 4" style="width:100%; display:none;">
    </a>

    <a href="/category/{{ $encryptedCategories['Tops'] }}" style="text-decoration:none;">
        <img class="mySlides" src="https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Home/Sliders/Welcome%20To%20Summer.webp" alt="Slide 5" style="width:100%; display:none;">
    </a>
    <a href="/category/{{ $encryptedCategories['Kids'] }}" style="text-decoration:none;">
        <img class="mySlides" src="https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Home/Sliders/static%20slider%20kids.webp" alt="Slide 6" style="width:100%; display:none;">
    </a>

    <div class="carousel-dots" style="text-align:center; position:absolute; bottom:10px; width:100%;">
        @for ($i = 1; $i <= 6; $i++)
            <span class="dot {{ $i === 1 ? 'active' : '' }}"  onclick="currentSlide({{ $i }})"></span>
        @endfor
    </div>
</div>
<h3 class="heading">Coupons For You</h3>
<div class="Banner">
    <img loading="lazy" src="https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Home/Coupon/NEWBUDDIE20.webp" class="couponimg" alt="Coupon">
</div>
<h3 class="heading">Weekly Trends</h3>
<div class="tranding">
    @foreach ($trendingItems as $item)
        <div class="tranding-card" style="height:100%; background-color: unset; border: none;">
            <a href="/category/{{ $item['url'] }}" style="text-decoration:none;">
                 <video loading="lazy" width="320" height="240" playsinline muted loop autoplay preload="auto" style="border-radius: 10px;">
                    <source src="https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Home/Trending%20Cards/{{ $item['video'] }}" type="video/mp4" >
                </video>
            </a>    
        </div>
    @endforeach
</div>
<div class="Banner">
    <video loading="lazy" playsinline muted loop autoplay preload="auto" width="100%">
        <source src="https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Home/USP%20Banner/usp%20banner%2017.02.mp4" type="video/mp4">
    </video>
</div>
<br>
<!-- Saree Section -->
<div class="Banner">
    <a href="/category/{{ $encryptedCategories['Saree'] }}" style="text-decoration:none;">
        <video loading="lazy" playsinline muted loop autoplay preload="auto" width="100%">
            <source src="https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Home/Category%20Banners/saree%20mobile%20banner.mp4" type="video/mp4">
        </video>
    </a>
</div>
@php
// Pre-fetch data for saree products
$sareeBrandIds = $saree->pluck('brand_id')->filter()->unique();
$sareeCategoryIds = $saree->pluck('sub_subcategory_id')->filter()->unique();
$sareeSellerIds = $saree->pluck('seller_id')->filter()->unique();
$sareeBrands = DB::table('brands')->whereIn('id', $sareeBrandIds)->get()->keyBy('id');
$sareeCategories = DB::table('categories')->whereIn('id', $sareeCategoryIds)->get()->keyBy('id');
$sareeSellers = DB::table('sellers')->whereIn('seller_id', $sareeSellerIds)->get()->keyBy('seller_id');
@endphp
<div class="container" style="padding-right: 0px; padding-left: 0px;">
    <div class="product-category-container" style="margin-left: 5px;">
        @foreach ($saree as $sar)
            @php
                $cat = $sareeCategories[$sar->sub_subcategory_id] ?? null;
                $seller = $sareeSellers[$sar->seller_id] ?? null;
                $brand = $sareeBrands[$sar->brand_id] ?? null;
                $images = json_decode($sar->images, true);
                $brandName = $brand->brand_name ?? '';
                $brandName1 = $brandName ?: ($seller->company_name ?? '');
            @endphp
            <div class="product-item-card">
                <a href="/product/{{ $cat->sub_subcategory ?? 'unknown' }}/{{ \Illuminate\Support\Str::slug($brandName1) }}/{{ \Illuminate\Support\Str::slug($sar->product_name) }}/{{ $sar->id }}/buy" style="text-decoration:none;">
                    @if (empty($images))
                        <img loading="lazy"  src="https://assets.ajio.com/medias/sys_master/root/20230728/GBrh/64c3db50a9b42d15c979555c/-473Wx593H-466398360-green-MODEL.jpg" alt="Image">
                    @elseif(isset($images[0]))
                        <img loading="lazy"  src="{{ $images[0] }}" alt="Image">
                    @endif
                    <div class="card-body product-item-card-body text-left">
                        <h8 class="card-title"><b>{{ $brandName }}</b></h8><br>
                        <h8 class="card-title" title="{{ $sar->product_name }}">
                            {{ \Illuminate\Support\Str::limit($sar->product_name, 16) }}
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
<!-- Kids Section -->
<div class="Banner">
    <a href="/category/{{ $encryptedCategories['Kids'] }}" style="text-decoration:none;">
        <video loading="lazy" playsinline autoplay muted loop width="100%">
            <source src="https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Home/Category%20Banners/kids%20mobile%20banner%20(1).mp4" type="video/mp4" class="catimg" style="width:100%;">
        </video>
    </a>    
</div>
@php
// Pre-fetch data for kids products
$kidsBrandIds = $kids->pluck('brand_id')->filter()->unique();
$kidsCategoryIds = $kids->pluck('subcategory_id')->filter()->unique();
$kidsSellerIds = $kids->pluck('seller_id')->filter()->unique();
$kidsBrands = DB::table('brands')->whereIn('id', $kidsBrandIds)->get()->keyBy('id');
$kidsCategories = DB::table('categories')->whereIn('id', $kidsCategoryIds)->get()->keyBy('id');
$kidsSellers = DB::table('sellers')->whereIn('seller_id', $kidsSellerIds)->get()->keyBy('seller_id');
@endphp
<div class="container" style="padding-right: 0px; padding-left: 0px;">
    <div class="product-category-container" style="margin-left: 5px;">
        @foreach ($kids as $kds)
            @php
                $cat = $kidsCategories[$kds->subcategory_id] ?? null;
                $seller = $kidsSellers[$kds->seller_id] ?? null;
                $brand = $kidsBrands[$kds->brand_id] ?? null;
                $brandName = $brand->brand_name ?? 'NA';
                $brandNameForURL = $brandName !== 'NA' ? $brandName : ($seller->company_name ?? 'unknown');
                $images = json_decode($kds->images, true);
            @endphp
            <div class="product-item-card">
                <a href="/product/{{ \Illuminate\Support\Str::slug($cat->subcategory ?? 'unknown') }}/{{ \Illuminate\Support\Str::slug($brandNameForURL) }}/{{ \Illuminate\Support\Str::slug($kds->product_name) }}/{{ $kds->id }}/buy" style="text-decoration:none;">
                    @if(!empty($images) && isset($images[0]))
                        <img loading="lazy" src="{{ $images[0] }}" alt="Image">
                    @endif
                    <div class="card-body product-item-card-body text-left">
                        <h8 class="card-title"><b>{{ $brandName !== 'NA' ? $brandName : '' }}</b></h8><br>
                        <h8 class="card-title" title="{{ $kds->product_name }}">
                            {{ \Illuminate\Support\Str::limit($kds->product_name, 16, '...') }}
                        </h8>
                        <div class="d-flex">
                            <p class="card-text me-2" style="text-decoration: line-through; color:red">Rs. {{ $kds->maximum_retail_price }}</p>
                            <p class="card-text ml-2">Rs. {{ $kds->portal_updated_price }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
<div class="Banner">
    <a href="/category/{{ $encryptedCategories['Kids'] }}" style="text-decoration:none;">
        <video loading="lazy" playsinline autoplay muted loop width="100%">
            <source src="https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Home/Category%20Banners/co-ordsetmobile%20banner.mp4" type="video/mp4" class="catimg" style="width:100%;">
        </video>
    </a>    
</div>
@php
// Pre-fetch data for western products
$westernBrandIds = $western->pluck('brand_id')->filter()->unique();
$westernCategoryIds = $western->pluck('sub_subcategory_id')->filter()->unique();
$westernSellerIds = $western->pluck('seller_id')->filter()->unique();
$westernBrands = DB::table('brands')->whereIn('id', $westernBrandIds)->get()->keyBy('id');
$westernCategories = DB::table('categories')->whereIn('id', $westernCategoryIds)->get()->keyBy('id');
$westernSellers = DB::table('sellers')->whereIn('seller_id', $westernSellerIds)->get()->keyBy('seller_id');
@endphp
<div class="container" style="padding-right: 0px; padding-left: 0px;">
    <div class="product-category-container" style="margin-left: 5px;">
        @foreach ($western as $wstrn)
            @php
                $cat = $westernCategories[$wstrn->sub_subcategory_id] ?? null;
                $seller = $westernSellers[$wstrn->seller_id] ?? null;
                $brand = $westernBrands[$wstrn->brand_id] ?? null;
                $brandName = $brand->brand_name ?? '';
                $brandName3 = $brandName !== '' ? $brandName : ($seller->company_name ?? 'unknown');
                $images = json_decode($wstrn->images, true);
            @endphp
            <div class="product-item-card">
                <a href="/product/{{ \Illuminate\Support\Str::slug($cat->sub_subcategory ?? 'unknown') }}/{{ \Illuminate\Support\Str::slug($brandName3) }}/{{ \Illuminate\Support\Str::slug($wstrn->product_name) }}/{{ $wstrn->id }}/buy" style="text-decoration:none;">
                    @if (!empty($images) && isset($images[0]))
                        <img loading="lazy"  src="{{ $images[0] }}" alt="Image">
                    @endif
                    <div class="card-body product-item-card-body text-left">
                        <h8 class="card-title"><b>{{ $brandName }}</b></h8><br>
                        <h8 class="card-title" title="{{ $wstrn->product_name }}">
                            {{ \Illuminate\Support\Str::limit($wstrn->product_name, 16, '...') }}
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
<!-- Kurti Section -->
<div class="Banner"> 
    <a href="/category/{{ $encryptedCategories['Kurti'] }}" style="text-decoration:none;">
        <video loading="lazy" playsinline muted loop autoplay preload="auto" width="100%">
            <source src="https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Home/Category%20Banners/salwar%20mobile%20banner.mp4" type="video/mp4">
        </video>
    </a>    
</div>
@php
// Pre-fetch data for kurti products
$kurtiBrandIds = $kurti->pluck('brand_id')->filter()->unique();
$kurtiCategoryIds = $kurti->pluck('sub_subcategory_id')->filter()->unique();
$kurtiSellerIds = $kurti->pluck('seller_id')->filter()->unique();
$kurtiBrands = DB::table('brands')->whereIn('id', $kurtiBrandIds)->get()->keyBy('id');
$kurtiCategories = DB::table('categories')->whereIn('id', $kurtiCategoryIds)->get()->keyBy('id');
$kurtiSellers = DB::table('sellers')->whereIn('seller_id', $kurtiSellerIds)->get()->keyBy('seller_id');
@endphp
<div class="container" style="padding-right: 0px; padding-left: 0px;">
    <div class="product-category-container" style="margin-left: 5px;">
        @foreach ($kurti as $krti)
            @php
                $cat = $kurtiCategories[$krti->sub_subcategory_id] ?? null;
                $seller = $kurtiSellers[$krti->seller_id] ?? null;
                $brand = $kurtiBrands[$krti->brand_id] ?? null;
                $brandName = $brand->brand_name ?? '';
                $brandName4 = $brandName !== '' ? $brandName : ($seller->company_name ?? 'unknown');
                $images = json_decode($krti->images, true);
            @endphp
            <div class="product-item-card">
                <a href="/product/{{ \Illuminate\Support\Str::slug($cat->sub_subcategory ?? 'unknown') }}/{{ \Illuminate\Support\Str::slug($brandName4) }}/{{ \Illuminate\Support\Str::slug($krti->product_name) }}/{{ $krti->id }}/buy" style="text-decoration:none;">
                    @if (!empty($images) && isset($images[0]))
                        <img loading="lazy"  src="{{ $images[0] }}" alt="Image">
                    @endif
                    <div class="card-body product-item-card-body text-left">
                        <h8 class="card-title"><b>{{ $brandName }}</b></h8><br>
                        <h8 class="card-title" title="{{ $krti->product_name }}">
                            {{ \Illuminate\Support\Str::limit($krti->product_name, 16, '...') }}
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
<!-- Footwear Section -->
<div class="Banner">
    <a href="/category/{{ $encryptedCategories['Shoes'] }}" style="text-decoration:none;">
        <video loading="lazy" playsinline muted loop autoplay preload="auto" width="100%">
            <source src="https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Home/Category%20Banners/Shoe.mp4" type="video/mp4">
        </video>
    </a>    
</div>
@php
// Pre-fetch data for shoes products
$shoesBrandIds = $shoes->pluck('brand_id')->filter()->unique();
$shoesCategoryIds = $shoes->pluck('sub_subcategory_id')->filter()->unique();
$shoesSellerIds = $shoes->pluck('seller_id')->filter()->unique();
$shoesBrands = DB::table('brands')->whereIn('id', $shoesBrandIds)->get()->keyBy('id');
$shoesCategories = DB::table('categories')->whereIn('id', $shoesCategoryIds)->get()->keyBy('id');
$shoesSellers = DB::table('sellers')->whereIn('seller_id', $shoesSellerIds)->get()->keyBy('seller_id');
@endphp
<div class="container" style="padding-right: 0px; padding-left: 0px;">
    <div class="product-category-container" style="margin-left: 5px;">
        @foreach ($shoes as $shs)
            @php
                $category = $shoesCategories[$shs->sub_subcategory_id] ?? null;
                $seller = $shoesSellers[$shs->seller_id] ?? null;
                $brand = $shoesBrands[$shs->brand_id] ?? null;
                $brandName = $brand->brand_name ?? '';
                $brandName5 = $brandName !== '' ? $brandName : ($seller->company_name ?? 'unknown');
                $images = json_decode($shs->images, true);
            @endphp
            <div class="product-item-card">
                <a href="/product/{{ \Illuminate\Support\Str::slug($category->sub_subcategory ?? 'unknown') }}/{{ \Illuminate\Support\Str::slug($brandName5) }}/{{ \Illuminate\Support\Str::slug($shs->product_name) }}/{{ $shs->id }}/buy" style="text-decoration:none;">
                    @if (!empty($images) && isset($images[0]))
                        <img loading="lazy"  src="{{ $images[0] }}" alt="Image">
                    @endif
                    <div class="card-body product-item-card-body text-left">
                        <h8 class="card-title"><b>{{ $brandName }}</b></h8><br>
                        <h8 class="card-title" title="{{ $shs->product_name }}">
                            {{ \Illuminate\Support\Str::limit($shs->product_name, 16, '...') }}
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
    @foreach ($trendingCategories as $category)
        <div class="tranding-card">
            <a href="/category/{{ $encryptedCategories[$category['name']] ?? Crypt::encryptString($category['name']) }}" style="text-decoration:none;">
                <img loading="lazy"  src="{{ $category['img'] }}" class="catimg" alt="{{ $category['name'] }}">
            </a>
        </div>
    @endforeach
    <div class="tranding-card">
        <img loading="lazy"  src="https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Home/Cards%202/For%20the%20Track(1).jpg" class="catimg" alt="Trending Item">
    </div>
</div>
<div class="Banner">
    <a href="/category/{{ $encryptedCategories['Shoes'] }}" style="text-decoration:none;">
        <img loading="lazy"  src="https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Home/Promotional%20Banners/Shoe%20banner%20copy.webp" class="couponimg" alt="Shoes">
    </a>
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
<script defer>
document.addEventListener("DOMContentLoaded", function () {
    var slideIndex = 0;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    var slideTimer;
    function showSlide(n) {
        if (n >= slides.length) slideIndex = 0;
        else if (n < 0) slideIndex = slides.length - 1;
        else slideIndex = n;
        for (var i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
            dots[i].style.backgroundColor = "#bbb";
            dots[i].classList.remove("active");
        }
        slides[slideIndex].style.display = "block";
        dots[slideIndex].style.backgroundColor = "#717171";
        dots[slideIndex].classList.add("active");
    }
    function autoSlide() {
        slideIndex++;
        showSlide(slideIndex);
        slideTimer = setTimeout(autoSlide, 5000);
    }
    window.currentSlide = function (n) {
        clearTimeout(slideTimer);
        showSlide(n - 1);
        slideTimer = setTimeout(autoSlide, 5000);
    };
    showSlide(slideIndex);
    slideTimer = setTimeout(autoSlide, 5000);
    // Swipe detection
    let touchStartX = 0;
    let touchEndX = 0;
    const minSwipeDistance = 50;
    const sliderContainer = document.querySelector(".w3-content");
    sliderContainer.addEventListener("touchstart", function (e) {
        touchStartX = e.changedTouches[0].screenX;
    });
    sliderContainer.addEventListener("touchend", function (e) {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipeGesture();
    });
    function handleSwipeGesture() {
        let deltaX = touchEndX - touchStartX;
        if (Math.abs(deltaX) > minSwipeDistance) {
            clearTimeout(slideTimer);
            if (deltaX < 0) {
                // Swipe left
                slideIndex++;
            } else {
                // Swipe right
                slideIndex--;
            }
            showSlide(slideIndex);
            slideTimer = setTimeout(autoSlide, 5000);
        }
    }
});
</script>
@endsection