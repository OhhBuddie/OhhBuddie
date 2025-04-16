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
    
        <div class="help d-flex flex-row align-items-center gap-2">
            <strong>Help</strong> 
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQviJWxjVWRtXzYNBai88xRpl3hXtIlilwl1r41Dm_5_R52EuC3eX7YSm5wJpozGkTujl0&usqp=CAU"  style="width: 16px;">
        </div>
        
        
      <div class="pt-5">
        <div class="col-md-3 text-center">
          <img src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcSDSKvFJNgPMvdGdbekIFxOKHrqI1rCtAeN1xPGtgg0iEnQJeVi7DDTt8Qe_8rre8CRTdyMrkcHxTJwTSIIGbSH4-G-S-rZo8GlCRYfQWQKBPmUkJG4QFfxuWA" alt="Product Image" class="product-image img-fluid">
        </div>
        
        <div class="d-flex flex-column align-items-center col-md-9 mt-3">
          <p class="mb-1 text-light" style="font-size: 18px;font-weight: bold;">UTH by Roadster</p>
          <p class="mb-1 text-light" style="font-size: 13px;">Boys Sage Green Solid Short Sleeves T-shirt</p>
          <p class="text-light" style="font-size: 14px;">Size: 16-17Y</p>
        </div>
        
      </div>
      
      
     



      <div class="py-1 px-2 d-flex flex-column" style="width:100%; background-color: #04AA6D; color:white; ">
            <strong> Delivered</strong> 
            <p style="margin:0px;">On Sat, 19 Nov 2025 </p>
          </div>
    </div>
  
  
   
   
   
    <div class="card" style="border-radius: unset;">
        <li class=" mt-2 mb-1 px-3 py-2" style="font-size: 14px;">Exchange/Return window closed on Sat, 3 Dec</li>
    </div>
    
    
     
     
     
    <div class="card p-3" style="margin: 14px 0px; border-radius: unset;">
      
      <div class="product-rating-section">
        <img style="width: 50px;" src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcSDSKvFJNgPMvdGdbekIFxOKHrqI1rCtAeN1xPGtgg0iEnQJeVi7DDTt8Qe_8rre8CRTdyMrkcHxTJwTSIIGbSH4-G-S-rZo8GlCRYfQWQKBPmUkJG4QFfxuWA" alt="Product Image" class="product-image">
        <div>
            <strong class="mb-3">Rate this product</strong>
          <div class="rating-section">
            <i class="fas fa-star" onclick="selectRating(1)"></i>
            <i class="fas fa-star" onclick="selectRating(2)"></i>
            <i class="fas fa-star" onclick="selectRating(3)"></i>
            <i class="fas fa-star" onclick="selectRating(4)"></i>
            <i class="fas fa-star" onclick="selectRating(5)"></i>
        
        </div>
        </div>
      </div>
          <small class="">Rate & Review to <strong>Earn Ohhbuddie Credit</strong></small>
    </div>
    
     
     
     
    <div class="card p-3" style="border-radius: unset;">
      <h5>Delivery Address</h5>
      <p class="mb-1"><strong>Santanu Paul</strong> | <span>7044663186</span></p>
      <p class=" mb-3">9/2, Simultala Lane, Bhadrakali Hooghly - 711106</p>
      
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
          <strong>₹799.00</strong>
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

  <!-- Modal -->
  <!--<div class="modal fade slide-in-bottom" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">-->
  <!--  <div class="modal-dialog modal-dialog-centered">-->
  <!--    <div class="modal-content">-->
  <!--      <div class="modal-header">-->
  <!--        <h5 class="modal-title" id="paymentModalLabel">Payment Information</h5>-->
  <!--        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
  <!--      </div>-->
  <!--      <div class="modal-body">-->
  <!--        <p class="d-flex justify-content-between">-->
  <!--          <span>1 x UTH by Roadster Boys Sage Green Sol...</span>-->
  <!--          <strong>₹799.00</strong>-->
  <!--        </p>-->
  <!--        <hr>-->
  <!--        <p class="mb-1"><strong>Total Paid</strong></p>-->
  <!--        <h5 class="mb-3">₹799.00</h5>-->
  <!--        <div class="d-flex align-items-center mb-3 p-2" style="background-color: #f1f1f1; border-radius: 8px;">-->
  <!--          <img src="https://img.icons8.com/color/48/google-pay-india.png" alt="UPI Icon" width="32" class="me-2">-->
  <!--          <span class="">Paid by UPI</span>-->
  <!--        </div>-->
  <!--      </div>-->
  <!--    </div>-->
  <!--  </div>-->
  <!--</div>-->


     

   <!-- Updates Sent To Section -->
    <div class="card p-3 updates-section" style=" margin: 14px 0px;">
      <h6 class="mb-3">Updates sent to</h6>
      <p class="mb-2">
        <i class="fa-solid fa-phone"></i> 7044663186
      </p>
      <p class="mb-3">
        <i class="fa-solid fa-envelope"></i> santanu@Ohhbuddie.com
      </p>
    </div>  
    
     
    
    <div class="card p-3" style="border-radius: unset;">
      
        Order ID #1220414 77627196648901
      
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