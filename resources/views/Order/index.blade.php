@extends('layouts.order')
@section('content')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> OhhBuddie | Order</title>
    
   <link rel="icon" type="image/x-icon" href="https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Ohbuddielogo.png">
    <style>
    a{
        text-decoration: none !important;
    }
    body{
        background-color: black;
    }
    .search-containerr {
      display: flex;
      align-items: center;
      gap: 10px;
      width: 100%;
      padding: 5px;
      margin-top: 90px;
      background: #1f1f1f;
   
    }
  
    .input-group-text {
      /*border: none;*/
      color:white;
      background-color: #1f1f1f;
    }
    .input-group{
        display:flex;
        flex-wrap: nowrap;
    }
    .input-group-text i {
      color: white;
    }
    .filter-button {
      display: flex;
      align-items: center;
      gap: 5px;
      padding: 8px 15px;
      font-size: 12px;
     
      border-radius: none;
      background: var(--primary-color);
    }
    .filter-button i {
      font-size: 12px;
    }
  </style>

  <style>
    .refund-section {
      padding: 15px;
      box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
      background: #1f1f1f;
      color:white;
      margin: 6px 0px 0px 0px;
    }
    .refund-header {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .refund-header i {
      font-size: 19px;
      color: white;
    }
    .refund-header .status-text {
      font-weight: bold;
      
    }
    .refund-header .amount {
      font-weight: bold;

    }
    .refund-details a {
      color: var(--secondary-color);
      font-weight: bold;
      text-decoration: none;
    }
    .product-section {
      display: flex;
      align-items: center;
      gap: 15px;
      margin-top: 15px;
   
      box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
      padding: 0px 10px 0px 10px;
    }
    .product-image img {
      width: 55px;
      height: 100%;
      border-radius: 4px;
    }
    .product-info {
      flex-grow: 1;
    }
    .product-info .brand {
      font-weight: bold;
      
    }
    .product-info .name {
      font-size: 14px;
      
      margin: 5px 0;
    }
    .product-info .size {
      font-size: 14px;
      
    }
    .rating-section {
      margin-top: 15px;
      text-align: center;
      box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
    }
    .rating-section .fa-star {
      font-size: 13px;
     
      cursor: pointer;
    }
    .rating-section .fa-star:hover,
    .rating-section .fa-star.selected {
      color: #ffc107;
    }
    .rating-text {
      font-size: 14px;
      margin-top: 5px;
    }
  </style>


    <div class="search-containerr">
      <!-- Search Bar -->
      <div class="input-group">
        <span class="input-group-text">
          <i class="fas fa-search"></i>
        </span>
        <input type="text" class="form-control" placeholder="Search here..." aria-label="Search" style=" color:white; background-color: #1f1f1f; height: unset;">
        <button class="btn btn-search" style="background-color:var(--primary-color); color: black; border-radius: unset; ">
          Search
        </button>
      </div>

      <!-- Filter Button -->
      <button class="filter-button">
        <i class="fas fa-filter"></i>
        FILTER
      </button>
    </div>
  

    <!--Refund Section 1 -->
    
    @if(empty($myorders))
        <h1>!!No Orders To Show!!</h1>
    @else
    
    @foreach($order_data as $mords)
    
    <a href="{{ url('/orderdetails/' . $mords['id']) }}">
            <div class="refund-section">
              <!-- Refund Header -->
              <div class="refund-header" style="color:green">
                <i class="fas fa-undo" style="color:green"></i>{{$mords['status']}}
                <!--<div>-->
                <!--  <div class="status-text">Refund Credited</div>-->
                <!--  <div>Your refund of <span class="amount">₹17564491484.00</span> for the return has been processed successfully on Fri, 7 Apr.</div>-->
                <!--  <div class="refund-details"><a href="#">View Refund details</a></div>-->
                <!--</div>-->
              </div>
        
              <!-- Product Section -->
              <div class="product-section">
                <div class="product-image">
                  <img src="{{$mords['image']}}" alt="Product">
                </div>
                <div class="product-info">
                  <div class="brand">{{$mords['brand_name']}}</div>
                  <div class="name">{{$mords['product_name']}}</div>
                  <div class="size">Size: {{$mords['size']}}</div>
                  <div class="size">Color: {{$mords['color']}}</div>
                  <div class="size">Ordered On: {{$mords['date']}}</div>
                </div>
                <i class="fas fa-chevron-right"></i>
              </div>
        
              <!-- Rating Section -->
              <!--<div class="rating-section">-->
              <!--  <i class="fas fa-star" onclick="selectRating(1)"></i>-->
              <!--  <i class="fas fa-star" onclick="selectRating(2)"></i>-->
              <!--  <i class="fas fa-star" onclick="selectRating(3)"></i>-->
              <!--  <i class="fas fa-star" onclick="selectRating(4)"></i>-->
              <!--  <i class="fas fa-star" onclick="selectRating(5)"></i>-->
              <!--  <div class="rating-text">Rate & Review to <b>earn Ohhbuddie Credit</b></div>-->
              <!--</div>-->
            </div>
    </a>
        
        
    @endforeach
    @endif
    
    

  <script>
    const stars = document.querySelectorAll('.fa-star');
    function selectRating(rating) {
      stars.forEach((star, index) => {
        star.classList.toggle('selected', index < rating);
      });
    }
  </script>
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>-->

@endsection