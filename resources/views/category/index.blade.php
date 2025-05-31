@extends('layouts.category')
@section('content')

<title>OhhBuddie | Category</title>
<link rel="icon" type="image/x-icon" href="https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Ohbuddielogo.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

    body{
        background-color: black;
    }
    
    .full-page-image {
    width: 100vw;
    height: calc(100vh - 50px);
    
    object-fit: fill;
    margin: 0;
    padding: 0;
}
</style>
   <style>
        /* Modal styles */
        .bottom-modal {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: black;
            color: white;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
            z-index: 1000;
            padding: 15px;
            transform: translateY(100%);
            transition: transform 0.3s ease-out;
        }
        
        .bottom-modal.show {
            transform: translateY(0);
        }
        
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0,0,0,0.5);
            z-index: 999;
            display: none;
        }
        
        .sort-option {
            padding: 12px 15px;
            display: flex;
            align-items: center;
        }
        
        .sort-option:last-child {
            border-bottom: none;
        }
        
        .sort-header {
            font-weight: bold;
            margin-bottom: 10px;
            padding-bottom: 8px;
            border-bottom: 1px solid #eee;
        }
        
        /* Custom radio style */
        .radio-container {
            display: flex;
            align-items: center;
        }
        
        input[type=checkbox], input[type=radio] {
             margin: 0px 6px 0 0; 
             margin-top: 0px ;
             line-height: normal; 
        }
        input[type="radio"] {
            accent-color: #efc475; 
        }
    </style>
    
    <style>
        /* CSS for the filter modal */
        /* CSS to match the modal in the image */
    .filter-modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1000;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .filter-modal-inner {
        width: 90%;
        max-width: 600px;
        height: 80%;
        background-color: black;
        border-radius: 6px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }
    
    .filter-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px;
        border-bottom: 1px solid #e0e0e0;
    }
    
    .filter-title {
        font-weight: bold;
        color: white;
    }
    
    .clear-all {
        color: #efc475;
        cursor: pointer;
    }
    
    .filter-content {
        display: flex;
        flex-grow: 1;
        overflow: hidden;
    }
    
    .filter-sidebar {
        width: 40%;
        background-color: black;
        height: calc(100% - 110px); /* Adjust for header and footer */
        overflow-y: auto;
    }
    
    .filter-category {
        display: flex;
        justify-content: space-between;
        padding: 15px;
        border-bottom: 1px solid #e0e0e0;
        cursor: pointer;
        color: white;
    }
    
    .filter-category.active {
        background-color: #797676;
    }
    
    .chevron {
        color: #999;
    }
    
    .options-panel {
        width: 54%;
        height: calc(100% - 289px);
        overflow-y: auto;
        background-color: black;
        color: white;
        position: absolute;
        right: 5.1%;
        top: 134px;
    }
    
    .search-container {
        padding: 10px;
        /* border-bottom: 1px solid #e0e0e0; */
    }
    
    .search-input {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    
    .size-options {
        padding: 0 10px;
    }
    
    .size-option {
        padding: 12px 0;
        border-bottom: 1px solid #e0e0e0;
        display: flex;
        justify-content: space-between;
    }
    
    .count {
        color: #999;
        font-size: 0.9em;
    }
    
    .filter-footer {
        display: flex;
        justify-content: space-between;
        padding: 15px;
     
        background-color: black;
        color: white;
    }
    
    .close-button, .apply-button {
        padding: 10px 15px;
        border: none;
        background: none;
        cursor: pointer;
    }
    
    .apply-button {
        color: #efc475;
        font-weight: bold;
    }
    </style>
   <style>
        /* Price Slider Styling */
        .price-slider-container {
            width: 100%;
            padding: 10px;
            color: #fff;
        }
    
        .price-range-display {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            font-size: 14px;
            font-weight: 500;
        }
    
        .range-slider {
            position: relative;
            height: 6px;
            border-radius: 3px;
            background-color: #e0e0e0;
        }
    
        .track {
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: #e0e0e0;
            border-radius: 3px;
            z-index: 1;
        }
    
        .range {
            position: absolute;
            height: 100%;
            background-color: #efc475;
            border-radius: 3px;
            z-index: 2;
        }
    
        .thumb {
            position: absolute;
            width: 16px;
            height: 16px;
            background-color: #fff;
            border: 2px solid #efc475;
            border-radius: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            cursor: pointer;
            z-index: 3;
            transition: box-shadow 0.2s ease;
        }
    
        .thumb:hover {
            box-shadow: 0 0 0 8px rgba(255, 51, 102, 0.1);
        }
    
        .thumb.active {
            box-shadow: 0 0 0 8px rgba(255, 51, 102, 0.2);
        }
    
        .thumb.left {
            left: 0%;
        }
    
        .thumb.right {
            left: 100%;
            transform: translate(-50%, -50%);
        }
    </style>

    <style>
        label {
            display: inline-block;
            max-width: 100%;
             margin-bottom: 0px; 
            font-weight: 700;
        }
        .bottom-button {
          position: absolute;
          bottom: 48px;
          max-width: 268px;
          left: 50%;
          transform: translateX(-50%);
          background-color: #efc475;
          color: white;
          padding: 15px 30px;
          text-decoration: none;
          border-radius: 8px;
          font-weight: 600;
          font-size: 12px;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
          transition: 0.3s;
          text-align: center;
        }
        .bottom-button:hover {
          opacity: 0.9;
          text-decoration: none;
          color: white;
        }
    </style>
    <!-- Add CSS for animation -->
    <style>
    @keyframes tagPulse {
        0% {
            transform: scale(1);
            box-shadow: 0 3px 8px rgba(0,0,0,0.3);
        }
        50% {
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(0,0,0,0.4);
        }
        100% {
            transform: scale(1);
            box-shadow: 0 3px 8px rgba(0,0,0,0.3);
        }
    }
    
    .product-tag-badge:hover {
        transform: scale(1.1) !important;
        transition: transform 0.2s ease;
    }
    
    /* Alternative simple version without animation */
    .simple-tag-badge {
        background: linear-gradient(135deg, #ff6b35, #ff8c42);
        color: white;
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 10px;
        font-weight: bold;
        text-transform: uppercase;
        box-shadow: 0 2px 4px rgba(0,0,0,0.3);
        letter-spacing: 0.5px;
    }
    </style>
    <div class="container" style="padding: 0; margin: 0; width: 100vw; max-width: 100%; margin-top: 96px;">

        <div class="row m-0 product" style="min-height: 81vh;">
            <!-- Product Card 1 -->
                @php
                    use Illuminate\Support\Facades\Crypt;
                @endphp
                
                @if($products->isEmpty())
                    <img src="https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Blank%20Pages/Exciting%20Collection%20Loading%20Soon%20(1).jpg"  class="full-page-image" >
                    
                    <a href="/explore" class="bottom-button">Explore More</a>
                @else
                    @foreach($products as $pdts)
                    
                    
                
                    @php
                        if($pdts->category_id ==88 || $pdts->subcategory_id == 95 )
                        {
                           $cat_id = DB::table('categories')->where('id',$pdts->subcategory_id)->latest()->first();
                           $seller_id = DB::table('sellers')->where('seller_id',$pdts->seller_id)->latest()->first();
                           $sub = $cat_id->subcategory;
                        }
                        else
                        {
                           $cat_id = DB::table('categories')->where('id',$pdts->sub_subcategory_id)->latest()->first();
                           $seller_id = DB::table('sellers')->where('seller_id',$pdts->seller_id)->latest()->first();
                           $sub = $cat_id->sub_subcategory;
                        }
                    @endphp
                    @php
                        $brnd_cnt = DB::table('brands')->where('id',$pdts->brand_id)->count();
                        if($brnd_cnt > 0)
                        {
                            $brnd_name = DB::table('brands')->where('id',$pdts->brand_id)->latest()->first();
                            $brnd_name11 = $brnd_name->brand_name;
                        }
                        else
                        {
                            $brnd_name11 = $seller_id->company_name;
                        }
                        
                    @endphp
                    @php
                    
                     $bname = DB::table('brands')->where('id',$pdts->brand_id)->latest()->first();
                     $bcnt = DB::table('brands')->where('id',$pdts->brand_id)->count();
                    @endphp
                    
                    <div class="col-6"  data-created-at="{{ $pdts->created_at }}" data-price="{{ $pdts->portal_updated_price }}"  data-color="{{ $pdts->color_name }}"  data-size="{{ $pdts->size_name }}">
                        <div class="card position-relative" style="border-radius: unset; background-color: white; color: black; ">
                            <!-- Product Image -->
                            <!--<a  href="/product/{{ Crypt::encryptString($pdts->id) }}" style="text-decoration:none;">-->
                            <a href="/product/{{ \Illuminate\Support\Str::slug($cat_id->subcategory) }}/{{ \Illuminate\Support\Str::slug($brnd_name11) }}/{{ \Illuminate\Support\Str::slug($pdts->product_name) }}/{{$pdts->id}}/buy" style="text-decoration:none;">
   
                                
                                @php
                                    $images = json_decode($pdts->images, true);
                                @endphp
                                @if(empty($images))
                                <img src="https://assets.ajio.com/medias/sys_master/root/20230728/GBrh/64c3db50a9b42d15c979555c/-473Wx593H-466398360-green-MODEL.jpg" alt="Image" style="width:100%; border-top-left-radius: 10px; border-top-right-radius: 10px; height: 314px;">
                                @elseif(!empty($images) && isset($images[0]))
                                    <img src="{{ $images[0] }}" alt="Image" style="width:100%;  height: 314px;">
                                @endif
                                    
             
                                <!-- Rating at the Bottom Right of the Image -->
                                <div class="rating-label position-absolute" style="bottom: 100px; right: 10px; background-color:#04AA6D; color: white; padding: 2px 8px; border-radius: 12px; font-size: 10px;">
                                    No Reviews Yet
                                </div>
                                

                                <div class="card-body product-item-card-body text-left">
                                    
                                    <h8 class="card-title">
                                        @if($bcnt > 0)
                                            <b>{{$bname->brand_name}}</b></h8><br>
                                        @endif
                                        <h8 class="card-title" title="{{ $pdts->product_name }}">
                                            {{ Str::limit($pdts->product_name, 22, '...') }}
                                        </h8>                        
                                    <div class="d-flex">
                                        <p class="card-text me-2" style="text-decoration: line-through; color: red">Rs. {{$pdts->maximum_retail_price}}</p>
                                        <p class="card-text ml-2">Rs. {{$pdts->portal_updated_price}}</p>
                                    </div>                    
                                </div>

                                </a>
                            </div>
                        </div>
                    
                @endforeach
            @endif
        </div>
    </div>

     @if($products->isEmpty())
     
     @else
    <!-- Fixed Bottom Navbar -->
    <div class="fixed-bottom-navbar d-flex justify-content-around align-items-center" style="background-color:black; z-index: 999;">
        
        <!-- Sort Button -->
        <button class="btn-lg d-flex align-items-center gap-2"  style="background-color:transparent; border: none;" id="sortBtn" >
            <i class="bi bi-sort-down" style="font-size:16px; color:white;"></i> <!-- Font Awesome icon for Sort -->
           <span style="font-size:16px; color:white;">SORT</span> 
        </button>

        <!-- Modal Overlay -->
        <div class="modal-overlay" id="overlay"></div>
        
        <!-- Bottom Modal -->
        <div class="bottom-modal" id="sortModal">
            <div class="sort-header">SORT BY</div>
            
            <!--<div class="sort-option">-->
            <!--    <span>Popularity</span>-->
            <!--    <input type="radio" name="sortOption" id="popularity" checked>-->
            <!--</div>-->
            
            <!--<div class="sort-option">-->
            <!--    <input type="radio" name="sortOption" id="latest">-->
            <!--    <span>Latest</span>-->
            <!--</div>-->
            
            <!--<div class="sort-option">-->
            <!--    <input type="radio" name="sortOption" id="discount">-->
            <!--    <span>Discount</span>-->
            <!--</div>-->
            
            <!--<div class="sort-option">-->
            <!--    <input type="radio" name="sortOption" id="priceHighToLow">-->
            <!--    <span>Price: High to Low</span>-->
            <!--</div>-->
            
            <!--<div class="sort-option">-->
            <!--    <input type="radio" name="sortOption" id="priceLowToHigh">-->
            <!--    <span>Price: Low to High</span>-->
            <!--</div>-->
            
            <!-- HTML Form -->
            <form id="sortForm" method="GET" action="">
                <div class="sort-option">
                    <input type="radio" name="sort" id="latest" value="latest" {{ $sort == 'latest' ? 'checked' : '' }}>
                    <label for="latest">Latest</label>
                </div>
            
                <div class="sort-option">
                    <input type="radio" name="sort" id="priceHighToLow" value="price_high_low" {{ $sort == 'price_high_low' ? 'checked' : '' }}>
                    <label for="priceHighToLow">Price: High to Low</label>
                </div>
                
                <div class="sort-option">
                    <input type="radio" name="sort" id="priceLowToHigh" value="price_low_high" {{ $sort == 'price_low_high' ? 'checked' : '' }}>
                    <label for="priceLowToHigh">Price: Low to High</label>
                </div>
            </form>
            
            <!--<div class="sort-option">-->
            <!--    <span>Customer Rating</span>-->
            <!--    <input type="radio" name="sortOption" id="customerRating">-->
            <!--</div>-->
        </div>
    
            
        <div class="divider"></div>

        <!-- Filter Button -->
        <button class="btn-lg d-flex align-items-center gap-2" style="background-color:transparent; border:none;" onclick="openFilterModal()">
            <i class="bi bi-funnel" style="font-size:16px; color:white;"></i> <!-- Font Awesome icon for Filter -->
                      <span style="font-size:16px; color:white;">FILTER</span> 
 
        </button>
    
        
        <!-- Filter Modal -->
      
        <div id="filterModal" class="filter-modal" style="display:none;">
            <div class="filter-modal-inner">
                <div class="filter-header">
                    <div class="filter-title">FILTERS</div>
                    <div class="clear-all" onclick="clearAllFilters()">CLEAR ALL</div>
                </div>
                
                <div class="filter-sidebar">
                    <!-- Only keeping the three categories you mentioned -->
                    
                    @if($products->first()->sub_subcategory_id != 40)
                        <div class="filter-category" onclick="openSizeOptions()">
                            <div>Size</div>
                            <div class="chevron">›</div>
                        </div>
                    @endif


                    <div class="filter-category" onclick="openPriceOptions()">
                        <div>Price</div>
                        <div class="chevron">›</div>
                    </div>
                    
                    <div class="filter-category" onclick="openColorOptions()">
                        <div>Color</div>
                        <div class="chevron">›</div>
                    </div>
                </div>
                
                @if($products->first()->sub_subcategory_id != 40)
                    <!-- Size Options Panel (this is what shows on the right side) -->
                    <div id="sizeOptionsPanel" class="options-panel">
                        <div class="size-options">
                            @foreach($product_size as $size)
                                <div class="size-option d-flex align-items-center gap-2 mb-2"
                                     data-size="{{ $size->size_name }}"
                                     style="cursor: pointer; padding: 5px; border-radius: 5px;">
                                    <!-- Hidden checkbox for multiple selection -->
                                    <input type="checkbox" name="size[]" id="size_{{ $size->size_name }}" value="{{ $size->size_name }}" style="display: none;">
                                    <!-- Size Name -->
                                    <span>{{ $size->size_name }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                
                <!-- Price Options Panel -->
                <div id="priceOptionsPanel" class="options-panel">
                    @php
                        $prices = $products->pluck('portal_updated_price')->filter()->toArray();
                        $minPrice = !empty($prices) ? min($prices) : 0;
                        $maxPrice = !empty($prices) ? max($prices) : 100000;
                    @endphp
                    
                    <div class="price-slider-container">
                        <div class="price-range-display">
                            <span id="min-price-display">₹{{ number_format($minPrice) }}</span>
                            <span>-</span>
                            <span id="max-price-display">₹{{ number_format($maxPrice) }}</span>
                        </div>
                        
                        <div class="range-slider">
                            <div class="track"></div>
                            <div class="range" id="price-range"></div>
                            <div class="thumb left" id="min-thumb"></div>
                            <div class="thumb right" id="max-thumb"></div>
                        </div>
                        
                        <input type="hidden" id="min-price-input" value="{{ $minPrice }}">
                        <input type="hidden" id="max-price-input" value="{{ $maxPrice }}">
                    </div>
                </div>
                
                
                <!--  Color -->
                <div id="colorOptionsPanel" class="options-panel" style="display:none;">
                    <div class="size-options">
                        
                        <!-- Color Filter Section -->
                    @foreach($products->pluck('color_name')->unique()->filter() as $color)
                        @php
                            $cname = DB::table('colors')
                                ->select('id', 'color_name')
                                ->where('hex_code', $color)
                                ->latest()
                                ->first();
                            
                            $colorName = $cname->color_name ?? 'Unknown';
                        @endphp
                        <div class="color-option d-flex align-items-center gap-2 mb-2" 
                             data-color="{{ $color }}" 
                             style="cursor: pointer; padding: 5px; border-radius: 5px;">
                            <!-- Changed to checkbox for multiple selection -->
                            <input type="checkbox" name="color[]" id="color_{{ $color }}" value="{{ $color }}" style="display: block; background-color: #08ADc5; border-color: #08ADc5;">
                            <!-- Color Box -->
                            <span class="color-box" style="width: 20px; height: 20px; background-color: {{ $color }}; border-radius: 50%; display: inline-block; border: 1px solid #ccc;"></span>
                            <!-- Color Name -->
                            <span>{{ $colorName }}</span>
                        </div>
                    @endforeach
                                
                    </div>              
                </div>
                
         
                
                <div class="filter-footer">
                    <button class="close-button" onclick="closeFilterModal()">CLOSE</button>
                    <button class="apply-button" onclick="applyFilters()">APPLY</button>
                </div>
            </div>
        </div>      
        
    </div>
    @endif
    

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
    
    
    
    <script>
        // Get elements
        const sortBtn = document.getElementById('sortBtn');
        const sortModal = document.getElementById('sortModal');
        const overlay = document.getElementById('overlay');
        
        // Open modal when clicking the sort button
        sortBtn.addEventListener('click', function() {
            sortModal.classList.add('show');
            overlay.style.display = 'block';
        });
        
        // Close modal when clicking outside
        overlay.addEventListener('click', function() {
            sortModal.classList.remove('show');
            overlay.style.display = 'none';
        });
        
        // Handle sort option selection
        const sortOptions = document.querySelectorAll('.sort-option');
        sortOptions.forEach(option => {
            option.addEventListener('click', function() {
                // Find the radio button within this option and check it
                const radio = this.querySelector('input[type="radio"]');
                radio.checked = true;
                
                // Close modal after a brief delay
                setTimeout(() => {
                    sortModal.classList.remove('show');
                    overlay.style.display = 'none';
                }, 300);
                
                // Get the selected option text
                const selectedSort = this.querySelector('span').textContent;
                console.log('Selected sort option:', selectedSort);
            });
        });
    </script>
    
    <script>
       function openFilterModal() {
        document.getElementById('filterModal').style.display = 'flex';
        // Show Size options by default when modal opens
        openSizeOptions();
    }
    
    function closeFilterModal() {
        document.getElementById('filterModal').style.display = 'none';
    }
    
    function openSizeOptions() {
        hideAllOptionPanels();
        document.getElementById('sizeOptionsPanel').style.display = 'block';
        highlightCategory('Size');
    }
    
    function openPriceOptions() {
        hideAllOptionPanels();
        document.getElementById('priceOptionsPanel').style.display = 'block';
        highlightCategory('Price');
    }
    
    function openColorOptions() {
        hideAllOptionPanels();
        document.getElementById('colorOptionsPanel').style.display = 'block';
        highlightCategory('Color');
    }
    
    function hideAllOptionPanels() {
        const panels = document.querySelectorAll('.options-panel');
        panels.forEach(panel => {
            panel.style.display = 'none';
        });
    }
    
    function highlightCategory(categoryName) {
        // Remove active class from all categories
        const categories = document.querySelectorAll('.filter-category');
        categories.forEach(cat => {
            cat.classList.remove('active');
        });
        
        // Add active class to selected category
        const category = Array.from(categories).find(cat => 
            cat.textContent.trim().startsWith(categoryName)
        );
        if (category) {
            category.classList.add('active');
        }
    }
    
    function clearAllFilters() {
        // Implementation for clearing all filters
        console.log('All filters cleared');
         location.reload();
    }
    
    function applyFilters() {
        // Implementation for applying filters
        console.log('Filters applied');
        closeFilterModal();
    }
    
    </script>
    
    <script>
        
    // document.addEventListener('DOMContentLoaded', function() {
    //     const minSlider = document.getElementById('min-price-slider');
    //     const maxSlider = document.getElementById('max-price-slider');
    //     const minDisplay = document.getElementById('min-price-display');
    //     const maxDisplay = document.getElementById('max-price-display');
    //     const minInput = document.getElementById('min-price-input');
    //     const maxInput = document.getElementById('max-price-input');
        
    //     minSlider.addEventListener('input', function() {
    //         const minVal = parseInt(minSlider.value);
    //         const maxVal = parseInt(maxSlider.value);
            
    //         if (minVal > maxVal) {
    //             minSlider.value = maxVal;
    //             return;
    //         }
            
    //         minDisplay.textContent = '₹' + minVal.toLocaleString();
    //         minInput.value = minVal;
    //     });
        
    //     maxSlider.addEventListener('input', function() {
    //         const minVal = parseInt(minSlider.value);
    //         const maxVal = parseInt(maxSlider.value);
            
    //         if (maxVal < minVal) {
    //             maxSlider.value = minVal;
    //             return;
    //         }
            
    //         maxDisplay.textContent = '₹' + maxVal.toLocaleString();
    //         maxInput.value = maxVal;
    //     });
    // });
    </script>
    
     <!--For Sorting -->
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    // Get all radio buttons for sorting
    const sortRadios = document.querySelectorAll('input[name="sort"]');
    
    // Get the container and product cards
    // You may need to adjust these selectors to match your HTML structure
    const productsContainer = document.querySelector('.row');
    const productCards = document.querySelectorAll('.col-6');
    
    // Add click event listener to each radio button
    sortRadios.forEach(radio => {
        radio.addEventListener('click', function() {
            const sortValue = this.value;
            console.log("Sort option selected:", sortValue);
            
            // Apply sorting based on the selected value
            sortProducts(sortValue);
        });
    });
    
    // Sorting function
    function sortProducts(sortType) {
        // Convert NodeList to Array for sorting
        const productArray = Array.from(productCards);
        
        switch(sortType) {
            case 'latest':
                productArray.sort((a, b) => {
                    const dateA = new Date(a.dataset.createdAt || 0);
                    const dateB = new Date(b.dataset.createdAt || 0);
                    return dateB - dateA; // Newest first
                });
                break;
                
            case 'price_high_low':
                productArray.sort((a, b) => {
                    const priceA = parseFloat(a.dataset.price || 0);
                    const priceB = parseFloat(b.dataset.price || 0);
                    return priceB - priceA; // High to low
                });
                break;
                
            case 'price_low_high':
                productArray.sort((a, b) => {
                    const priceA = parseFloat(a.dataset.price || 0);
                    const priceB = parseFloat(b.dataset.price || 0);
                    return priceA - priceB; // Low to high
                });
                break;
        }
        
        // Reorder in the DOM
        productArray.forEach(card => {
            productsContainer.appendChild(card);
        });
    }
});
        </script>
    
    <!--For Color Filter-->
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    // Get all color filter divs
    const colorOptions = document.querySelectorAll('.color-option');
    
    // Get the container where products are displayed
    const productCards = document.querySelectorAll('.col-6');
    
    // Track active color filters
    let activeColorFilters = [];
    
    // Add event listeners to the color option divs
    colorOptions.forEach(option => {
        const checkboxInput = option.querySelector('input[type="checkbox"]');
        
        // Handle checkbox click separately to prevent event conflicts
        checkboxInput.addEventListener('click', function(e) {
            e.stopPropagation(); // Prevent the div click event from firing
            
            const color = option.dataset.color;
            
            // Update active filters array based on checkbox state
            if (this.checked) {
                if (!activeColorFilters.includes(color)) {
                    activeColorFilters.push(color);
                }
                option.classList.add('active');
            } else {
                activeColorFilters = activeColorFilters.filter(c => c !== color);
                option.classList.remove('active');
            }
            
            // Apply filters
            applyFilters();
        });
        
        // Also handle div click to toggle checkbox
        option.addEventListener('click', function(e) {
            // Don't trigger if the click was directly on the checkbox (already handled)
            if (e.target !== checkboxInput) {
                checkboxInput.checked = !checkboxInput.checked;
                
                // Trigger the checkbox's click event programmatically
                const event = new Event('click');
                checkboxInput.dispatchEvent(event);
            }
        });
    });
    
    function applyFilters() {
        if (activeColorFilters.length > 0) {
            productCards.forEach(card => {
                const productColor = card.dataset.color;
                
                if (activeColorFilters.includes(productColor)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        } else {
            // Show all products if no filters are active
            productCards.forEach(card => {
                card.style.display = 'block';
            });
        }
    }
    
    // Add improved CSS for active state
    const style = document.createElement('style');
    style.textContent = `
        .color-option.active {
            font-weight: bold;
            color: white;
        
    `;
    document.head.appendChild(style);
});
    </script>
    
    <!--For Size Filter -->
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
                // Get all size filter options
                const sizeOptions = document.querySelectorAll('.size-option');
                
                // Get the product cards
                const productCards = document.querySelectorAll('.col-6');
                
                // Track active size filters
                let activeSizeFilters = [];
                
                // Add event listeners to size options
                sizeOptions.forEach(option => {
                    option.addEventListener('click', function() {
                        const size = this.dataset.size;
                        const checkboxInput = this.querySelector('input[type="checkbox"]');
                        
                        // Toggle the checkbox state
                        checkboxInput.checked = !checkboxInput.checked;
                        
                        // Toggle the active class
                        this.classList.toggle('active');
                        
                        // Update active filters array
                        if (checkboxInput.checked) {
                            // Add size to active filters if not already present
                            if (!activeSizeFilters.includes(size)) {
                                activeSizeFilters.push(size);
                            }
                        } else {
                            // Remove size from active filters
                            activeSizeFilters = activeSizeFilters.filter(s => s !== size);
                        }
                        
                        // Apply size filters
                        if (activeSizeFilters.length > 0) {
                            filterByMultipleSizes(activeSizeFilters);
                        } else {
                            // Show all products if no filters are active
                            productCards.forEach(card => {
                                card.style.display = 'block';
                            });
                        }
                    });
                });
                
                // Function to filter products by multiple sizes
                function filterByMultipleSizes(sizes) {
                    productCards.forEach(card => {
                        const productSize = card.dataset.size;
                        
                        if (sizes.includes(productSize)) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                }
                
                // Add CSS for active state
                const style = document.createElement('style');
                style.textContent = `
                    .size-option.active {
                        background-color: #f0f0f0;
                        font-weight: bold;
                    }
                `;
                document.head.appendChild(style);
            });
    </script>
    
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    // Price slider elements
    const range = document.getElementById('price-range');
    const minThumb = document.getElementById('min-thumb');
    const maxThumb = document.getElementById('max-thumb');
    const track = document.querySelector('.track');
    const minPriceInput = document.getElementById('min-price-input');
    const maxPriceInput = document.getElementById('max-price-input');
    const minPriceDisplay = document.getElementById('min-price-display');
    const maxPriceDisplay = document.getElementById('max-price-display');
    
    // Initial values
    const minPrice = parseFloat(minPriceInput.value);
    const maxPrice = parseFloat(maxPriceInput.value);
    const priceGap = (maxPrice - minPrice) * 0.05; // 5% of total range as minimum gap
    
    // For tracking active thumb
    let activeThumb = null;
    let isDragging = false;
    
    // Set initial positions
    let leftPercent = 0;
    let rightPercent = 100;
    
    // Set initial range position
    updateRangeStyle();
    
    // Function to start dragging - can be called from any mouse/touch down event
    function startDragging(e, clientX) {
        if (isDragging) return;
        
        const trackRect = track.getBoundingClientRect();
        const trackWidth = trackRect.width;
        const trackLeft = trackRect.left;
        
        // Calculate click position as percentage
        let clickPercent = (clientX - trackLeft) / trackWidth * 100;
        clickPercent = Math.max(0, Math.min(clickPercent, 100));
        
        // Determine which thumb to move based on click position
        const leftThumbPos = leftPercent;
        const rightThumbPos = rightPercent;
        
        // Calculate distance to each thumb
        const distToLeftThumb = Math.abs(clickPercent - leftThumbPos);
        const distToRightThumb = Math.abs(clickPercent - rightThumbPos);
        
        // Set the active thumb to the closest one
        if (distToLeftThumb <= distToRightThumb) {
            activeThumb = 'min';
            minThumb.classList.add('active');
            
            // Move left thumb to click position
            leftPercent = clickPercent;
            const newMinPrice = Math.round(minPrice + (clickPercent / 100) * (maxPrice - minPrice));
            minPriceInput.value = newMinPrice;
            minPriceDisplay.textContent = '₹' + numberWithCommas(newMinPrice);
            
            // Ensure min thumb doesn't go beyond max thumb - priceGap
            const minGapPercent = (priceGap / (maxPrice - minPrice)) * 100;
            if (leftPercent > rightPercent - minGapPercent) {
                leftPercent = rightPercent - minGapPercent;
                const adjustedMinPrice = Math.round(minPrice + (leftPercent / 100) * (maxPrice - minPrice));
                minPriceInput.value = adjustedMinPrice;
                minPriceDisplay.textContent = '₹' + numberWithCommas(adjustedMinPrice);
            }
        } else {
            activeThumb = 'max';
            maxThumb.classList.add('active');
            
            // Move right thumb to click position
            rightPercent = clickPercent;
            const newMaxPrice = Math.round(minPrice + (clickPercent / 100) * (maxPrice - minPrice));
            maxPriceInput.value = newMaxPrice;
            maxPriceDisplay.textContent = '₹' + numberWithCommas(newMaxPrice);
            
            // Ensure max thumb doesn't go below min thumb + priceGap
            const minGapPercent = (priceGap / (maxPrice - minPrice)) * 100;
            if (rightPercent < leftPercent + minGapPercent) {
                rightPercent = leftPercent + minGapPercent;
                const adjustedMaxPrice = Math.round(minPrice + (rightPercent / 100) * (maxPrice - minPrice));
                maxPriceInput.value = adjustedMaxPrice;
                maxPriceDisplay.textContent = '₹' + numberWithCommas(adjustedMaxPrice);
            }
        }
        
        updateRangeStyle();
        filterProductsByPrice();
        
        isDragging = true;
    }
    
    // Add mousedown event to the entire slider container to capture all clicks
    const sliderContainer = track.parentElement;
    sliderContainer.addEventListener('mousedown', function(e) {
        e.preventDefault();
        startDragging(e, e.clientX);
        document.addEventListener('mousemove', moveThumb);
        document.addEventListener('mouseup', stopMoving);
    });
    
    // Also add click handler to range element since it overlays the track
    range.addEventListener('mousedown', function(e) {
        e.preventDefault();
        e.stopPropagation();
        startDragging(e, e.clientX);
        document.addEventListener('mousemove', moveThumb);
        document.addEventListener('mouseup', stopMoving);
    });
    
    // Events for min thumb - preserve these for users who directly click on thumb
    minThumb.addEventListener('mousedown', function(e) {
        e.preventDefault();
        e.stopPropagation();
        activeThumb = 'min';
        minThumb.classList.add('active');
        isDragging = true;
        document.addEventListener('mousemove', moveThumb);
        document.addEventListener('mouseup', stopMoving);
    });
    
    // Events for max thumb
    maxThumb.addEventListener('mousedown', function(e) {
        e.preventDefault();
        e.stopPropagation();
        activeThumb = 'max';
        maxThumb.classList.add('active');
        isDragging = true;
        document.addEventListener('mousemove', moveThumb);
        document.addEventListener('mouseup', stopMoving);
    });
    
    // Move thumb function
    function moveThumb(e) {
        if (!activeThumb || !isDragging) return;
        
        const trackRect = track.getBoundingClientRect();
        const trackWidth = trackRect.width;
        const trackLeft = trackRect.left;
        
        let position = (e.clientX - trackLeft) / trackWidth * 100;
        position = Math.max(0, Math.min(position, 100));
        
        if (activeThumb === 'min') {
            // Ensure min thumb doesn't go beyond max thumb - priceGap
            const rightPos = rightPercent;
            const minGapPercent = (priceGap / (maxPrice - minPrice)) * 100;
            
            if (position > rightPos - minGapPercent) {
                position = rightPos - minGapPercent;
            }
            
            leftPercent = position;
            const newMinPrice = Math.round(minPrice + (position / 100) * (maxPrice - minPrice));
            minPriceInput.value = newMinPrice;
            minPriceDisplay.textContent = '₹' + numberWithCommas(newMinPrice);
        } else {
            // Ensure max thumb doesn't go below min thumb + priceGap
            const leftPos = leftPercent;
            const minGapPercent = (priceGap / (maxPrice - minPrice)) * 100;
            
            if (position < leftPos + minGapPercent) {
                position = leftPos + minGapPercent;
            }
            
            rightPercent = position;
            const newMaxPrice = Math.round(minPrice + (position / 100) * (maxPrice - minPrice));
            maxPriceInput.value = newMaxPrice;
            maxPriceDisplay.textContent = '₹' + numberWithCommas(newMaxPrice);
        }
        
        updateRangeStyle();
        filterProductsByPrice();
    }
    
    // Stop moving function
    function stopMoving() {
        if (activeThumb) {
            const activeElement = document.querySelector('.thumb.active');
            if (activeElement) {
                activeElement.classList.remove('active');
            }
            activeThumb = null;
            isDragging = false;
            document.removeEventListener('mousemove', moveThumb);
            document.removeEventListener('mouseup', stopMoving);
        }
    }
    
    // Update the range style
    function updateRangeStyle() {
        range.style.left = leftPercent + '%';
        range.style.width = (rightPercent - leftPercent) + '%';
        minThumb.style.left = leftPercent + '%';
        maxThumb.style.left = rightPercent + '%';
    }
    
    // Filter products by price range
    function filterProductsByPrice() {
        const currentMinPrice = parseInt(minPriceInput.value);
        const currentMaxPrice = parseInt(maxPriceInput.value);
        
        // Get all product cards
        const productCards = document.querySelectorAll('.col-6');
        
        productCards.forEach(card => {
            const productPrice = parseInt(card.dataset.price);
            
            if (productPrice >= currentMinPrice && productPrice <= currentMaxPrice) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }
    
    // Helper function to format numbers with commas
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
    
    // Touch support equivalent to mouse functions
    function startTouchDragging(e, clientX) {
        if (isDragging) return;
        
        const trackRect = track.getBoundingClientRect();
        const trackWidth = trackRect.width;
        const trackLeft = trackRect.left;
        
        // Calculate touch position as percentage
        let touchPercent = (clientX - trackLeft) / trackWidth * 100;
        touchPercent = Math.max(0, Math.min(touchPercent, 100));
        
        // Determine which thumb to move based on touch position
        const leftThumbPos = leftPercent;
        const rightThumbPos = rightPercent;
        
        // Calculate distance to each thumb
        const distToLeftThumb = Math.abs(touchPercent - leftThumbPos);
        const distToRightThumb = Math.abs(touchPercent - rightThumbPos);
        
        // Set the active thumb to the closest one
        if (distToLeftThumb <= distToRightThumb) {
            activeThumb = 'min';
            minThumb.classList.add('active');
            
            // Move left thumb to touch position
            leftPercent = touchPercent;
            const newMinPrice = Math.round(minPrice + (touchPercent / 100) * (maxPrice - minPrice));
            minPriceInput.value = newMinPrice;
            minPriceDisplay.textContent = '₹' + numberWithCommas(newMinPrice);
            
            // Ensure min thumb doesn't go beyond max thumb - priceGap
            const minGapPercent = (priceGap / (maxPrice - minPrice)) * 100;
            if (leftPercent > rightPercent - minGapPercent) {
                leftPercent = rightPercent - minGapPercent;
                const adjustedMinPrice = Math.round(minPrice + (leftPercent / 100) * (maxPrice - minPrice));
                minPriceInput.value = adjustedMinPrice;
                minPriceDisplay.textContent = '₹' + numberWithCommas(adjustedMinPrice);
            }
        } else {
            activeThumb = 'max';
            maxThumb.classList.add('active');
            
            // Move right thumb to touch position
            rightPercent = touchPercent;
            const newMaxPrice = Math.round(minPrice + (touchPercent / 100) * (maxPrice - minPrice));
            maxPriceInput.value = newMaxPrice;
            maxPriceDisplay.textContent = '₹' + numberWithCommas(newMaxPrice);
            
            // Ensure max thumb doesn't go below min thumb + priceGap
            const minGapPercent = (priceGap / (maxPrice - minPrice)) * 100;
            if (rightPercent < leftPercent + minGapPercent) {
                rightPercent = leftPercent + minGapPercent;
                const adjustedMaxPrice = Math.round(minPrice + (rightPercent / 100) * (maxPrice - minPrice));
                maxPriceInput.value = adjustedMaxPrice;
                maxPriceDisplay.textContent = '₹' + numberWithCommas(adjustedMaxPrice);
            }
        }
        
        updateRangeStyle();
        filterProductsByPrice();
        
        isDragging = true;
    }
    
    // Touch events for slider container
    sliderContainer.addEventListener('touchstart', function(e) {
        const touch = e.touches[0];
        startTouchDragging(e, touch.clientX);
        document.addEventListener('touchmove', touchMoveThumb);
        document.addEventListener('touchend', stopTouchMoving);
    });
    
    // Touch events for range element
    range.addEventListener('touchstart', function(e) {
        e.stopPropagation();
        const touch = e.touches[0];
        startTouchDragging(e, touch.clientX);
        document.addEventListener('touchmove', touchMoveThumb);
        document.addEventListener('touchend', stopTouchMoving);
    });
    
    // Touch events for min thumb
    minThumb.addEventListener('touchstart', function(e) {
        e.stopPropagation();
        activeThumb = 'min';
        minThumb.classList.add('active');
        isDragging = true;
        document.addEventListener('touchmove', touchMoveThumb);
        document.addEventListener('touchend', stopTouchMoving);
    });
    
    // Touch events for max thumb
    maxThumb.addEventListener('touchstart', function(e) {
        e.stopPropagation();
        activeThumb = 'max';
        maxThumb.classList.add('active');
        isDragging = true;
        document.addEventListener('touchmove', touchMoveThumb);
        document.addEventListener('touchend', stopTouchMoving);
    });
    
    function touchMoveThumb(e) {
        if (!activeThumb || !isDragging) return;
        
        const touch = e.touches[0];
        const trackRect = track.getBoundingClientRect();
        const trackWidth = trackRect.width;
        const trackLeft = trackRect.left;
        
        let position = (touch.clientX - trackLeft) / trackWidth * 100;
        position = Math.max(0, Math.min(position, 100));
        
        if (activeThumb === 'min') {
            const rightPos = rightPercent;
            const minGapPercent = (priceGap / (maxPrice - minPrice)) * 100;
            
            if (position > rightPos - minGapPercent) {
                position = rightPos - minGapPercent;
            }
            
            leftPercent = position;
            const newMinPrice = Math.round(minPrice + (position / 100) * (maxPrice - minPrice));
            minPriceInput.value = newMinPrice;
            minPriceDisplay.textContent = '₹' + numberWithCommas(newMinPrice);
        } else {
            const leftPos = leftPercent;
            const minGapPercent = (priceGap / (maxPrice - minPrice)) * 100;
            
            if (position < leftPos + minGapPercent) {
                position = leftPos + minGapPercent;
            }
            
            rightPercent = position;
            const newMaxPrice = Math.round(minPrice + (position / 100) * (maxPrice - minPrice));
            maxPriceInput.value = newMaxPrice;
            maxPriceDisplay.textContent = '₹' + numberWithCommas(newMaxPrice);
        }
        
        updateRangeStyle();
        filterProductsByPrice();
    }
    
    function stopTouchMoving() {
        if (activeThumb) {
            const activeElement = document.querySelector('.thumb.active');
            if (activeElement) {
                activeElement.classList.remove('active');
            }
            activeThumb = null;
            isDragging = false;
            document.removeEventListener('touchmove', touchMoveThumb);
            document.removeEventListener('touchend', stopTouchMoving);
        }
    }
});
    </script>
@endsection