@extends('layouts.category')
@section('content')

<title>OhhBuddie | Category</title>
<link rel="icon" type="image/x-icon" href="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Ohbuddielogo.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

    body{
        background-color: black;
    }
    
    .full-page-image {
    width: 100vw;
    height: 100vh;
    object-fit: cover;
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
           
            border-bottom: 1px solid #eee;
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
        border-bottom: 1px solid #e0e0e0;
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
        .price-slider-container {
    width: 100%;
    padding: 20px 10px;
}

.price-range-display {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
}

.slider-container {
    position: relative;
    height: 30px;
}

.slider {
    position: absolute;
    width: 100%;
    height: 5px;
    background: none;
    pointer-events: none;
}

.slider::-webkit-slider-thumb {
    height: 20px;
    width: 20px;
    border-radius: 50%;
    background: #ff5722;
    cursor: pointer;
    pointer-events: auto;
}

.filter-button {
    margin-top: 15px;
    padding: 8px 15px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
    </style>
    <div class="container" style="padding: 0; margin: 0; width: 100vw; max-width: 100%; margin-top: 60px;">
        <div class="row m-0">
            <!-- Product Card 1 -->
                @php
                    use Illuminate\Support\Facades\Crypt;
                @endphp
                
                @if($products->isEmpty())
                    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Blank+Pages/Exciting+Collection+Loading+Soon+(1).jpg"  class="full-page-image" >
                    
                @else
                    @foreach($products as $pdts)
                    <div class="col-6">
                        <div class="card position-relative" style="border-radius: unset; background-color: white; color: black; border-radius: 10px;">
                            <!-- Product Image -->
                            <a  href="/product/{{ Crypt::encryptString($pdts->id) }}" style="text-decoration:none;">
                                @php
                                    $images = json_decode($pdts->images, true);
                                @endphp
                                @if(empty($images))
                                <img src="https://assets.ajio.com/medias/sys_master/root/20230728/GBrh/64c3db50a9b42d15c979555c/-473Wx593H-466398360-green-MODEL.jpg" alt="Image" style="width:100%; border-top-left-radius: 10px; border-top-right-radius: 10px; height: 245px;">
                                @elseif(!empty($images) && isset($images[0]))
                                    <img src="{{ $images[0] }}" alt="Image" style="width:100%; border-top-left-radius: 10px; border-top-right-radius: 10px; height: 245px;">
                                @endif
                                    
             
                                <!-- Rating at the Bottom Right of the Image -->
                                <div class="rating-label position-absolute" style="bottom: 80px; right: 10px; background-color:#04AA6D; color: white; padding: 2px 8px; border-radius: 12px; font-size: 10px;">
                                    No Reviews Yet
                                </div>
                                @php
                                
                                 $bname = DB::table('brands')->where('id',$pdts->brand_id)->latest()->first();
                                 $bcnt = DB::table('brands')->where('id',$pdts->brand_id)->count();
                                @endphp
                                <div class="card-body product-item-card-body text-left">
                                    <h8 class="card-title"><b>{{$bname->brand_name}}</b></h8><br>
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
    <div class="fixed-bottom-navbar d-flex justify-content-around align-items-center" style="background-color:black;">
        
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
            
            <form method="GET" id="sortForm">
                <select name="sort" onchange="document.getElementById('sortForm').submit();">
                    <option value="" {{ $sort == '' ? 'selected' : '' }}>Latest</option>
                    <option value="priceLowToHigh" {{ $sort == 'priceLowToHigh' ? 'selected' : '' }}>Price Low to High</option>
                    <option value="priceHighToLow" {{ $sort == 'priceHighToLow' ? 'selected' : '' }}>Price High to Low</option>
                </select>
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
                    <div class="filter-category" onclick="openSizeOptions()">
                        <div>Size</div>
                        <div class="chevron">›</div>
                    </div>
                    
                    <div class="filter-category" onclick="openPriceOptions()">
                        <div>Price</div>
                        <div class="chevron">›</div>
                    </div>
                    
                    <div class="filter-category" onclick="openColorOptions()">
                        <div>Color</div>
                        <div class="chevron">›</div>
                    </div>
                </div>
                
                <!-- Size Options Panel (this is what shows on the right side) -->
                <div id="sizeOptionsPanel" class="options-panel">
                    <!--<div class="search-container">-->
                    <!--    <input type="text" placeholder="Search by Size" class="search-input">-->
                    <!--</div>-->
                    <div class="size-options">
                        
                        @foreach($product_size as $size)
                            <div class="size-option">{{ $size->size_name }}</div>
                        @endforeach
                    </div>
                </div>
                
                <div id="priceOptionsPanel" class="options-panel" style="display:none;">
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
                        
                        <div class="slider-container">
                            <input type="range" id="min-price-slider" min="{{ $minPrice }}" max="{{ $maxPrice }}" value="{{ $minPrice }}" class="slider">
                            <input type="range" id="max-price-slider" min="{{ $minPrice }}" max="{{ $maxPrice }}" value="{{ $maxPrice }}" class="slider">
                        </div>
                        
                        <form id="price-filter-form" action="#" method="GET">
                            <input type="hidden" name="min_price" id="min-price-input" value="{{ $minPrice }}">
                            <input type="hidden" name="max_price" id="max-price-input" value="{{ $maxPrice }}">
                            <!-- Add other existing filter parameters here -->
                            <button type="submit" class="filter-button">Apply Price Filter</button>
                        </form>
                    </div>
                </div>
                
                
                <!-- Similar panels for Price and Color would be defined here -->
                <div id="colorOptionsPanel" class="options-panel" style="display:none;">
                    <div class="size-options">
                        
                    @foreach($products->pluck('color_name')->unique()->filter() as $color)
                        @php
                            $cname = DB::table('colors')
                                ->select('id', 'color_name')
                                ->where('hex_code', $color)
                                ->latest()
                                ->first();
                        @endphp
            
                        
                        
                        <div class="size-option d-flex align-items-center gap-2">
                            <!-- Color Box -->
                            <span class="color-box" style="width: 20px; height: 20px; background-color: {{ $color }}; border-radius: 50%; display: inline-block; border: 1px solid #ccc;"></span>
                            <!-- Color Name -->
                            <span >{{ $cname->color_name ?? 'Unknown' }}</span>
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
    }
    
    function applyFilters() {
        // Implementation for applying filters
        console.log('Filters applied');
        closeFilterModal();
    }
    </script>
    
    <script>
        
        document.addEventListener('DOMContentLoaded', function() {
    const minSlider = document.getElementById('min-price-slider');
    const maxSlider = document.getElementById('max-price-slider');
    const minDisplay = document.getElementById('min-price-display');
    const maxDisplay = document.getElementById('max-price-display');
    const minInput = document.getElementById('min-price-input');
    const maxInput = document.getElementById('max-price-input');
    
    minSlider.addEventListener('input', function() {
        const minVal = parseInt(minSlider.value);
        const maxVal = parseInt(maxSlider.value);
        
        if (minVal > maxVal) {
            minSlider.value = maxVal;
            return;
        }
        
        minDisplay.textContent = '₹' + minVal.toLocaleString();
        minInput.value = minVal;
    });
    
    maxSlider.addEventListener('input', function() {
        const minVal = parseInt(minSlider.value);
        const maxVal = parseInt(maxSlider.value);
        
        if (maxVal < minVal) {
            maxSlider.value = minVal;
            return;
        }
        
        maxDisplay.textContent = '₹' + maxVal.toLocaleString();
        maxInput.value = maxVal;
    });
});
    </script>
    
    
    
    
    
    
    
    
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Sort Button Click
        document.querySelectorAll('input[name="sortOption"]').forEach(function (radio) {
            radio.addEventListener('change', function () {
                let sortBy = this.id;
                fetchSortedProducts(sortBy);
                document.getElementById('sortModal').classList.remove('show');
                document.getElementById('overlay').style.display = 'none';
            });
        });

        document.getElementById("sortBtn").addEventListener("click", function () {
            document.getElementById("sortModal").classList.add("show");
            document.getElementById("overlay").style.display = "block";
        });

        document.getElementById("overlay").addEventListener("click", function () {
            document.getElementById("sortModal").classList.remove("show");
            document.getElementById("overlay").style.display = "none";
        });
    });

    function fetchSortedProducts(sortBy) {
        const url = new URL(window.location.href);
        url.searchParams.set('sort', sortBy); // Append the sort parameter
        window.location.href = url.toString(); // Reload with new sort param
    }
</script>
@endsection