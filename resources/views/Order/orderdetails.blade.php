@extends('layouts.order')
@section('content')

    <style>
         body{
        background-color: #e2e2e2;
         }
         
         .card{
             background-color: #1f1f1f;
             color:white;
         }
    .product-image {
      max-width: 105px;
    }
    .rating-stars i {
      color: #ccc;
      font-size: 1.2rem;
    }
    .rating-stars i:hover {
      color: #f5c518;
    }

    .help{
        position:absolute; 
        right: 14px;
        font-size:13px;
    background: white;
    border-radius: 20px;
    padding: 2px 10px;
    }
    
    .product-rating-section {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 15px 0;
    }
  

    .rating-section .fa-star {
      font-size: 24px;
      color: #ddd;
      cursor: pointer;
    }
    .rating-section .fa-star:hover,
    .rating-section .fa-star.selected {
      color: #ffc107;
    }
    .rating-text {
      font-size: 14px;
      color: #000;
      margin-top: 5px;
    }
    </style>
    
    <style>
    /* Custom Modal Sliding from Bottom */
   .modal.fade {
      transition: transform 0.3s ease-out;
      transform: translateY(100%);
    }

    .modal.fade.show {
      transform: translateY(0);
    }
    
    .modal-dialog-centered {
      position: absolute;
      bottom: 20px;
      width: 100%;
      max-width: 600px;
    }
    
    .modal-content {
      border-radius: 8px;
      overflow: hidden;
    }


  
  </style>
  
  


      
    <div class=" p-3" style="margin-top:60px;">
            @php
                $orderdetails = DB::table('orderdetails')->where('order_id',$myorders->id)->latest()->first();
                $product_data = DB::table('products')->where('id',$orderdetails->product_id)->latest()->first();
                
                
                $bncnt = DB::table('brands')->where('id',$product_data->brand_id)->count();
                if($bncnt == 0)
                {
                    $brand_name = 'NA';
                    $brand_data = 'NA';
                }
                else
                {
                    $brand_name = DB::table('brands')->where('id',$product_data->brand_id)->latest()->first();
                    $brand_data = DB::table('brands')->where('id',$product_data->brand_id)->latest()->first();
                }
                            
                $orders_data =  DB::table('orders')->where('id',$orderdetails->order_id)->latest()->first();           
                            
                $color_data = DB::table('colors')->where('hex_code',$product_data->color_name)->latest()->first();
                $address_data = DB::table('addresses')->where('id',$orders_data->shipping_address)->latest()->first();
                $user_data = DB::table('users')->where('id',$address_data->user_id)->latest()->first();
                
            @endphp
    
        <div class="help d-flex flex-row align-items-center gap-2">
            <strong>Help</strong> 
                        @php
                            $images = json_decode($product_data->images, true);
                        @endphp
                     
            <!--<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQviJWxjVWRtXzYNBai88xRpl3hXtIlilwl1r41Dm_5_R52EuC3eX7YSm5wJpozGkTujl0&usqp=CAU"  style="width: 16px;">-->
        </div>
        
        
      <div class="pt-5">
        <div class="col-md-3 text-center">
            <img src="{{ $images[0] }}" alt="Image" style="width: 126px;">        
        </div>
        
        <div class="d-flex flex-column align-items-center col-md-9 mt-3">
          <p class="mb-1 text-light" style="font-size: 18px;font-weight: bold;">{{$brand_name->brand_name}}</p>
          <p class="mb-1 text-light" style="font-size: 13px;">{{$product_data->product_name}}</p>
          <p class="text-light" style="font-size: 14px;">Size: {{$product_data->size_name}}  | Color: {{$color_data->color_name}} </p>
        </div>
        
      </div>
      
      
     



      <div class="py-1 px-2 d-flex flex-column" style="width:100%; background-color: #04AA6D; color:white; ">
            <strong> {{$orderdetails->delivery_status}}</strong>
            <p style="margin:0px;">On {{ \Carbon\Carbon::parse($orderdetails->created_at)->format('l, d F Y - h:i A') }}</p>
          </div>
    </div>
  
  
   
   
   
    <div class="card" style="border-radius: unset;">
        <li class="mt-2 mb-1 px-3 py-2" style="font-size: 14px;">
            Exchange/Return window closed on {{ \Carbon\Carbon::parse($orderdetails->created_at)->addDays(7)->format('D, j M') }}
        </li>
    </div>
    
    
     
     
     
    <!--<div class="card p-3" style="margin: 14px 0px; border-radius: unset;">-->
      
    <!--  <div class="product-rating-section">-->
    <!--    <img style="width: 50px;" src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcSDSKvFJNgPMvdGdbekIFxOKHrqI1rCtAeN1xPGtgg0iEnQJeVi7DDTt8Qe_8rre8CRTdyMrkcHxTJwTSIIGbSH4-G-S-rZo8GlCRYfQWQKBPmUkJG4QFfxuWA" alt="Product Image" class="product-image">-->
    <!--    <div>-->
    <!--        <strong class="mb-3">Rate this product</strong>-->
    <!--      <div class="rating-section">-->
    <!--        <i class="fas fa-star" onclick="selectRating(1)"></i>-->
    <!--        <i class="fas fa-star" onclick="selectRating(2)"></i>-->
    <!--        <i class="fas fa-star" onclick="selectRating(3)"></i>-->
    <!--        <i class="fas fa-star" onclick="selectRating(4)"></i>-->
    <!--        <i class="fas fa-star" onclick="selectRating(5)"></i>-->
        
    <!--    </div>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--      <small class="">Rate & Review to <strong>Earn ShowLoom Credit</strong></small>-->
    <!--</div>-->
    
     
     
     
    <div class="card p-3" style="border-radius: unset;">
      <h5>Delivery Address</h5>
      <p class="mb-1"><strong>{{$address_data->name}}</strong> | <span>{{$address_data->phone}}</span></p>
      <p class=" mb-3">{{$address_data->address_line_1}} {{$address_data->address_line_2}}- {{$address_data->pincode}}</p>
      
    </div>
    
     
     
    <div class="card p-3" style="border-radius: unset; margin: 14px 0px;">
      <div class="saved-amount mb-3">
        <img src="https://img.icons8.com/emoji/48/discount-emoji.png" alt="Saved Icon">
        On this item you saved a total of <span>₹660</span>
      </div>
    </div>
    
     

    
    <div class="card p-3">
    <!-- Clickable Section -->
    <div style="border-radius: unset; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#paymentModal">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <strong>Total Order Price</strong>
        <div>
            <strong>Rs. {{ number_format($orderdetails->price, 2, '.', ',') }}</strong>
          <i class="fa-solid fa-angle-down mx-1"></i>
        </div>
      </div>
      <div class="d-flex align-items-center mb-3 p-1">
        <img src="https://img.icons8.com/color/48/google-pay-india.png" alt="UPI Icon" width="32" class="me-2">
        <span class="">Paid by UPI</span>
      </div>
      <button class="get-invoice-btn" style="border: 1px solid #ddd; background-color: black; width: 100%;">Get Invoice</button>
    </div>
  </div>

     

   <!-- Updates Sent To Section -->
    <div class="card p-3 updates-section" style=" margin: 14px 0px;">
      <h6 class="mb-3">Updates sent to</h6>
      <p class="mb-2">
        <i class="fa-solid fa-phone"></i> {{$address_data->phone}}
      </p>
      <p class="mb-3">
        <i class="fa-solid fa-envelope"></i> {{$user_data->email}}
      </p>
    </div>  
    
     
    
    <div class="card p-3" style="border-radius: unset;">
      
        Order ID # {{$orders_data->order_id}}
      
    </div>

    
     
    <script>
    const stars = document.querySelectorAll('.fa-star');
    function selectRating(rating) {
      stars.forEach((star, index) => {
        star.classList.toggle('selected', index < rating);
      });
    }
  </script>
  <script>
      // When you click on the div, the modal will open
    document.querySelector('[data-bs-toggle="modal"]').addEventListener('click', function () {
      var myModal = new bootstrap.Modal(document.getElementById('paymentModal'));
      myModal.show();
    });
</script>

<script>
    let currentIndex = 0;
const slider = document.querySelector('.slider');
const slides = document.querySelectorAll('.slide');
const totalSlides = slides.length;

function nextSlide() {
  currentIndex = (currentIndex + 1) % totalSlides;
  slider.style.transform = `translateX(-${currentIndex * 100}%)`;
}

// Change slide every 3 seconds
setInterval(nextSlide, 3000);

</script>

@endsection