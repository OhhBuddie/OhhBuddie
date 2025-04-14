<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <title>OhhBuddie | Add to Cart</title>
  <link rel="icon" type="image/x-icon" href="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Ohbuddielogo.png">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      background-color: #f8f8f8;
      /*padding: 20px;*/
    }

    .shopping-bag {

      background-color: black;

      overflow: hidden;
    }
    
     .navbar-fixed-top {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
            background: black;
            
        }

    .header {
      padding: 16px;
      font-size: 14px;
      font-weight: bold;
    }

    .delivery-section {
      padding: 8px 16px 8px 16px;
      /*border-bottom: 1px solid #ddd;*/
      /*margin-top: 42px;*/
    }

    .delivery-section p {
      margin: 8px 0;
      font-size: 14px;
      color: white;
    }

    /*Cart Product */

    .cart-items {
      /*padding: 0px 16px;*/
      display: none;
    }
    .cart-items.active {
      display: flex;
      flex-direction: column;
    }

    .cart-item {
      display: flex;
      border-bottom: 1px solid #ddd;
      padding: 16px;
    }

    .cart-item img {
      width: 95px;
      height: -webkit-fill-available;
      border-radius: 4px;
      margin-right: 16px;
    }

    .item-details {
      flex: 1;
    }

    .item-details h4 {
      font-size: 14px;
      color:white;
      margin-bottom: 8px;
    }

    .item-details p {
      font-size: 12px;
      color: white;
      margin-bottom: 4px;
    }

    .price {
      font-size: 14px;
      font-weight: bold;
      color: white;
    }

    .discount {
      font-size: 12px;
      
    }

    .delivery-info {
      font-size: 12px;
      color: white;
      margin-top: 8px;
    }
    

    .cart-item-img {
         position: relative; /* Make this the reference for the checkbox */
    }

    .coupon{
        margin-top: 17px;
    margin-bottom: 17px;
    text-decoration: none;
    }



    

    .footer {
      /*padding: 16px;*/
      display: flex;
      justify-content: space-between;
      align-items: center;
      /*border-top: 1px solid #ddd;*/
      
      
      position: fixed;
      bottom: -2px;
      left: 0;
      right: 0;
      z-index: 1030;
      background: black;
      padding: 8px;
      /*box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);*/
    }

    .footer .total {
      font-size: 14px;
      font-weight: bold;
      color: white;
      margin-left: 10px;
    }

    .footer button {
      padding: 10px 16px;
      background-color: #efc475;
      color: black;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 14px;
    }

    .footer button:hover {
      background-color: #08ADC5;
    }
    
    
    .suggested-section {
      padding: 16px 0px 16px 16px;
    }

    .suggested-section h3 {
      font-size: 16px;
      color: white;
      margin-bottom: 16px;
      
    }

    .suggested-products {
      display: flex;
      overflow-x: auto;
      scrollbar-width: none;
      gap: 5px;
    }

    .product-card {
      height: auto;
        width: min-content;
        background-color: black;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 8px 9px;
        text-align: center;
    }

    .product-card img {
      height:197px; 
      width: 151px;
      border-radius: 4px;
    }

    .product-card h4 {
      font-size: 14px;
      color: white;
      margin: 8px 0;
    }

    .product-card p {
      font-size: 12px;
      color: white;
    }

    .product-card .price {
      font-size: 14px;
      color: white;
      font-weight: bold;
    }

    .product-card .discount {
      font-size: 12px;
      color: white;
    }

  </style>
  
  
    <style>
        .modal.bottom-modal .modal-dialog {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            margin: 0;
            
        }
        .modal.bottom-modal .modal-content {
            border-radius: 0.5rem 0.5rem 0 0;
        }
        .bg-danger, .btn-danger, .text-danger{
            color: black !important ;
            background-color: #efc475 !important;
            --bs-btn-border-color: none;
        }
    </style>
    
     <style>
    .offers-section {
      padding: 15px;
      color:white;
        
    }

    .offers-section h4 {
      font-size: 16px;
      margin-bottom: 10px;
    }

    .offer-item {
      font-size: 13px;
      /*color: #555;*/
      margin-top: 7px;
    }

    .offer-item.hidden {
      display: none;
    }

    .show-more-btn {
      color: #08ADC5;
      font-size: 14px;
      cursor: pointer;
      text-decoration: none;
    }

    .icon {
      width: 20px;
      height: 20px;
      display: inline-block;
      background-color: #000;
      border-radius: 50%;
      color: #fff;
      font-size: 17px;
      text-align: center;
      line-height: 20px;
      /*margin-right: 8px;*/
    }
  </style>
    <style>
 .tabs {
  display: flex;
  /*border-bottom: 2px solid #ddd;*/
  margin-top: 59px;
  font-family: Arial, sans-serif;
}

.tab {
  
  cursor: pointer;
  flex: 1;
  font-weight: bold;
  font-size: 15px;
  text-transform: uppercase;
  color: #333;
  position: relative;
  transition: all 0.3s ease;
  /*border-radius: 4px 4px 0 0;*/
  background-color: #f9f9f9;
  /*margin-right: 5px;*/
}

.tab:hover {
  background-color: #f0f0f0;
}

.tab.active {
  background-color: #efc475;
  color: black;
  /*border-bottom: 2px solid #efc475;*/
  /*box-shadow: 0 2px 8px rgba(0, 123, 255, 0.3);*/
}

/*.badge {*/
/*  background-color: #08ADC5;*/
/*    color: white;*/
/*    border-radius: 50%;*/
/*    padding: 2px 6px;*/
/*    font-size: 12px;*/
/*    margin-left: 10px;*/
    /*position: absolute;*/
    /*top: 6px;*/
    /*right: 63px;;*/
/*}*/


        .price-details {
            background: black;
            /*border: 1px solid #ddd;*/
            border-radius: 5px;
            padding: 15px 20px;
            /*max-width: 400px;*/
            margin: 4px 0px 60px 0px;
        }
        .price-details .title {
            font-weight: 600;
            margin-bottom: 10px;
            font-size: 14px;
            color: white;
        }
        .price-details .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
        }
        .price-details .row span {
            font-size: 14px;
        }
        .price-details .row span.text-success {
            color: #34a853;
            font-weight: 500;
        }

        .price-details .row:last-child {
            font-size: 16px;
            font-weight: 600;
            margin-top: 10px;
            padding-top: 8px;
            border-top: 1px solid #ddd;
        }
        .price-details .terms {
            margin-top: 15px;
            font-size: 12px;
            color: white;
        }
        .price-details .terms a {
            color: #08ADC5;
            text-decoration: none;
            font-weight: 600;
        }
        
        .card-text{
            font-size: 13px;
        }
    </style>


<style>
  /* Container styling */
  .dropdown-container {
    position: relative;
    display: inline-block;
  }

  /* Toggle button */
  .dropdown-toggle {
    background: none;
    border: none;
    color: white;
    font-size: 18px;
    cursor: pointer;
  }

  .dropdown-toggle::after {
    display: none;
  }

  /* Dropdown menu styling */
  .dropdown-menu {
    display: none;
    position: absolute;
    top: 30px;
    right: 0;
    background-color: black;
    color: white;
    border: 1px solid lightgray;
    border-radius: 6px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    z-index: 1000;
    min-width: 120px;
    overflow: hidden;
  }

  /* Dropdown item */
  .dropdown-item {
    width: 100%;
    padding: 6px 12px;
    text-align: left;
    background: none;
    border: none;
    font-size: 14px;
    color: white;
    cursor: pointer;
    transition: background-color 0.2s ease;
  }

  /* Hover effect */
  .dropdown-item:hover {
    background-color: rgba(255, 255, 255, 0.1);
  }

  /* Specific styles for different actions */
  .dropdown-item.edit {
    color: #007bff;
  }

  .dropdown-item.delete {
    color: #dc3545;
  }

  .dropdown-item.default {
    color: #28a745;
  }
</style>


    <!--Size and Qty Dropdown -->
     <style>
         select {
            background: black;
            color: white;
            border: none;
            /*padding: 5px;*/
            font-size: 12px;
            outline: none;
            cursor: pointer;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    
    
    

    <div class="shopping-bag">
        
    <div class="d-flex justify-content-between align-items-center px-3 navbar-fixed-top text-light">
            <div class="d-flex align-items-center">
                <!-- Back Button -->
                <a href="javascript:history.back();" style="font-size: 22px; margin-right: 0px; color: black;">
                   <i class="fa-solid fa-arrow-left text-light"></i>
                </a>    
                <div class="header">SHOPPING BAG</div>
            </div>
            <div>Step 1/3</div>
    
    </div>
    
    
    <div class="tabs">
        <div class="tab active d-flex align-items-center justify-content-center py-2" onclick="switchTab('buy-it-now')">
           <span style="font-size: 12px;"> Buy It Now </span> 
            <span id="buy-it-now-count"  style="color:black; font-size: 12px;  margin-left: 5px;">({{$total_qty}})</span>
        </div>
        <div class="tab d-flex align-items-center justify-content-center  py-2" onclick="switchTab('try-it-now')">
           <span style="font-size: 12px;"> Try It Now </span> 
            <span id="try-it-now-count" style="color:black;font-size: 12px; margin-left: 5px;">(0)</span>
        </div>
    </div>
    
    @if(count($cart_details) == 0)
    
    @else
        @if($ad_cnt > 0)
        <div class="delivery-section d-flex justify-content-between align-items-center">
                <div id="selected-address">
                    <p>Deliver to: <strong>{{ $address[0]->name }}, {{ $address[0]->pincode }}</strong></p>
                    <p style="font-size:12px;">{{ $address[0]->address_line_1 }}, {{ $address[0]->address_line_2 }}, {{ $address[0]->pincode }} </p>
                </div>
                <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#addressModal" style="color:#08ADC5;">Change</a>
        </div>
        @else
            <div class="delivery-section d-flex justify-content-between align-items-center">
        
                <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#addressModal" style="color:#08ADC5;">Add Address</a>
        </div>
        @endif
    @endif 
     
    <!--Modal For Change Adress Button -->

    <div class="modal fade bottom-modal" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content text-light"  style="background-color:black;">
                <div class="modal-header" style="border:none;">
                    <h5 class="modal-title" id="addressModalLabel">Select Delivery Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color:#efc475; opacity: 1;"></button>
                </div>
                <div class="modal-body">
                    
                    <div class="mb-1">
                        <div class="input-group">
                            <!--<input type="text" class="form-control" id="pincode" placeholder="Enter Pincode">-->
                            <!--<button class="btn" style="background-color:#efc475;">Check</button>-->
                            
                            <input type="number" id="pincode" class="form-control mr-2" placeholder="Enter Your Pin Code"
                               style="width:60%;" oninput="enforceLength(this)" required>
                            <button class="btn" style="background-color: #efc475; color: black; width: 25%;" 
                                onclick="validatePincode()">Check</button>
                        </div> 
                                             
                        <span id="error-message" class="p-2" style="color: red; display: none;">Enter Valid Pincode</span>
                        <span id="success-message" class="p-2" style="color: green; display: none;">Valid Pincode</span>
                    </div>    
                    <div style="max-height: 275px; overflow-y: auto; scrollbar-width:none;">
                        
        <!-- Address 1 -->
        @if($address != 'NA')
               @foreach($address as $index => $addr)
                <div class="card mt-3" style="background-color: black; color:white; border: 1px solid white;">
                    <div class="card-body d-flex align-items-start">
                        <!-- Radio Button -->
                        <div class="form-check me-3">
                            <input class="form-check-input address-radio" type="radio" name="address" 
                                id="address{{$index}}" 
                                data-name="{{ $addr->name }}"
                                data-id="{{ $addr->id }}"
                                data-pincode="{{ $addr->pincode }}"
                                data-address1="{{ $addr->address_line_1 }}"
                                data-address2="{{ $addr->address_line_2 }}"
                                {{ $loop->first ? 'checked' : '' }}
                                onchange="updateSelectedAddress(this)">
                        </div>
                
                        <!-- Address Details -->
                        <div style="width: 100%;">
                            <div class="card-title d-flex justify-content-between" style="font-size:12px;">
                                {{$addr->name}} 
                                    @if($addr->is_default == 1)
                                         (Default)
                                    @endif
                              
                                <span class="btn btn-outline-light btn-sm" style="font-size:10px; width: 70px; margin-right: 28px;">
                                    @if($addr->type == 'work')
                                        <i class="fa fa-briefcase"></i>
                                    @else
                                        <i class="fa fa-home"></i>
                                    @endif
                                    {{$addr->type}} 
                                </span>
                            </div>
                            <p class="card-text">
                                {{$addr->address_line_1}}<br>
                                {{$addr->address_line_2}} - {{$addr->pincode}}<br>
                                Mobile: {{$addr->phone}}
                            </p>
                            <div class="d-flex justify-content-between">
                                <!-- Delivering Here Button -->
                                <button class="btn btn-sm delivering-here-btn" 
                                        style="display: {{ $loop->first ? 'inline-block' : 'none' }}; background-color:#efc475;">
                                    Deliver Here
                                </button>
                            </div>
                        </div>
                
                        <!-- Three-Dot Menu -->
                <div class="dropdown-container">
                    <button type="button" class="dropdown-toggle" onclick="toggleDropdown(event, this)">⋮</button>
                    <div class="dropdown-menu" style="display: none;">
                        <button class="dropdown-item edit">Edit</button>
                        <button class="dropdown-item delete">Delete</button>
                        <button class="dropdown-item default" onclick="makeDefault('address{{$index}}')">Make Default</button>
                    </div>
                </div>

                    </div>
                </div>
                @endforeach
        @endif

        </div>
                    
                    <!--Add More Address Button -->
                    <div class="modal-footer row pb-0" style="border-top:0px;">
                    <a href="/address" type="button" class="btn"  style="background-color:#efc475;">Add New Address</a>
                </div>
                </div>
            </div>
        </div>
    </div>


    <div id="buy-it-now" class="cart-items active">
            
    @if(count($cart_details) == 0)
    <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Blank+Pages/Empty.jpg" style="object-fit:fill; width:100%; height:88vh;">
    @else
        @foreach($cart_details as $dat)
          <div class="cart-item">
            <div class="cart-item-img">
              <img src="{{$dat['image']}}" alt="Product Image">
              <input class="form-check-input" type="checkbox" id="defaultAddress" style="position: absolute; left: 0;">
              
              
            </div>
            <div class="item-details">
                
            <div class="d-flex justify-content-between align-items-center">
              <h4>{{$dat['product_name']}}</h4>

                
                
                <!-- Remove Button (Triggers Modal) -->
                <button type="button" data-bs-toggle="modal" data-bs-target="#removeModal{{$dat['id']}}" style="background-color:transparent; border:none; color:white; text-decoration:underline; margin-bottom:5px;">
                    Remove
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="removeModal{{$dat['id']}}" tabindex="-1" aria-labelledby="removeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content shadow-lg border-0 rounded-4">
                            <div class="modal-header bg-danger text-white rounded-top">
                                <h5 class="modal-title fw-bold" id="removeModalLabel">Confirm Removal</h5>
                                <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center py-4">
                                <i class="fas fa-exclamation-circle text-danger fs-1 mb-3"></i>
                                <p class="fs-5 text-muted">Are you sure you want to remove this product?</p>
                            </div>
                            <div class="modal-footer d-flex justify-content-center border-0 pb-4">
                                <!-- Add to Wishlist Button -->
                                <!--<button type="button" class="btn btn-secondary px-4">Add to Wishlist</button>-->
                                                <!-- Add to Wishlist Button -->
                                <button type="button" class="btn btn-secondary px-4" onclick="addToWishlist('{{ $dat['temp_user_id'] }}', '{{ $dat['user_id'] }}', '{{ $dat['pid'] }}', '{{ $dat['id'] }}')">
                                    Add to Wishlist
                                </button>
                                
                                                                
                                <!-- Remove Form (Submits on Click) -->
                                <form action="{{ route('carts.destroy', $dat['id']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger px-4">Remove</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



                
                
           </div>
              <!--<p>Size: Onesize | Qty: 1</p>-->
              @php
                  $pdtall = DB::table('products')->select('category_id')->where('id', $dat['pid'])->latest()->first();
                  $pdtqty = DB::table('products')->select('stock_quantity')->where('id', $dat['pid'])->get();
                  $pdtsize = DB::table('products')->select('size_name')->where('product_id', $dat['idp'])->distinct()->get();
              @endphp
                <div class="d-flex">

                @if($pdtall->category_id != 38)
     
                   <p style="border: 1px solid white; padding-left: 5px;  border-radius: 13px; margin-right: 10px;">Size: 
                    <select class="update-size" data-cartid="{{$dat['id']}}">
                        <option value="{{$dat['size']}}" style="font-size:10px;">{{$dat['size']}}</option>
                        @foreach($pdtsize as $pdsz)
                            <option value="{{$pdsz->size_name}}" style="font-size:10px;">{{$pdsz->size_name}}</option>
                        @endforeach
                    </select>

                    </p>
                @endif
              <p style="border: 1px solid white; padding-left: 5px; border-radius: 13px; margin-right: 10px;">
                Qty:
                <select class="update-quantity" data-cartid="{{$dat['id']}}" data-price="{{$dat['cart_value']}}">
                    @foreach($pdtqty as $pdqt)
                        @for($i = 1; $i <= $pdqt->stock_quantity; $i++)
                            <option value="{{ $i }}" style="font-size:10px;" {{ $i == $dat['quantity'] ? 'selected' : '' }}>
                                {{ $i }}
                            </option>
                        @endfor
                    @endforeach
                </select>
            </p>
                </div>

                
              <p class="price"><strike style="color:grey;">Rs. {{$dat['mrp']}}</strike> <span class="discount">Rs. {{$dat['price']}}</span></p>
              <p>Discount: Rs. {{$dat['discount']}}</p>
              <p class="d-flex">Total: Rs.<span class="price-value">{{$dat['cart_value']}}</span> </p>
              

            </div>
             <!--<button class="remove-product" onclick="removeProduct(this)">×</button>-->

          </div>


 

          @endforeach
    @endif
    </div>
    

    

    <div id="try-it-now" class="cart-items">
            <img src="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Blank+Pages/Try+-+Out+Is+Loading+Soon+(1).jpg" style="object-fit:fill; width:100%; height:88vh;">

          <!--<div class="cart-item">-->
          <!--  <div class="cart-item-img">-->
          <!--    <img src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcSDSKvFJNgPMvdGdbekIFxOKHrqI1rCtAeN1xPGtgg0iEnQJeVi7DDTt8Qe_8rre8CRTdyMrkcHxTJwTSIIGbSH4-G-S-rZo8GlCRYfQWQKBPmUkJG4QFfxuWA" alt="Product Image">-->
          <!--    <input class="form-check-input" type="checkbox" id="defaultAddress" style="position: absolute; left: 0;">-->
          <!--  </div>-->
          <!--  <div class="item-details">-->
          <!--    <h4>Mens Jeans</h4>-->
              <!--<p>Size: Onesize | Qty: 1</p>-->
              
          <!--     <div class="d-flex">-->
          <!--         <p style="border: 1px solid white; padding-left: 5px;  border-radius: 13px; margin-right: 10px;">Size: -->
          <!--              <select>-->
          <!--                  <option value="onesize" style="font-size:10px;">Onesize</option>-->
          <!--                  <option value="small" style="font-size:10px;">Small</option>-->
          <!--                  <option value="medium" style="font-size:10px;">Medium</option>-->
          <!--                  <option value="large" style="font-size:10px;">Large</option>-->
          <!--              </select> -->
          <!--          </p>-->
                    
          <!--         <p  style="border: 1px solid white; padding-left: 5px;  border-radius: 13px; margin-right: 10px;">Quantity: -->
          <!--              <select >-->
          <!--                  <option value="onesize" style="font-size:10px;">1</option>-->
          <!--                  <option value="small" style="font-size:10px;">2</option>-->
          <!--                  <option value="medium" style="font-size:10px;">3</option>-->
          <!--                  <option value="large" style="font-size:10px;">4</option>-->
          <!--              </select> -->
          <!--          </p>-->
          <!--      </div>-->
          <!--    <p class="price">Rs. 949 <span class="discount"><strike style="color:grey;">Rs. 2,625</strike> 1,676 OFF</span></p>-->
          <!--    <p>Coupon Discount: Rs. 150</p>-->
          <!--    <p class="delivery-info">Delivery between 25 Jan - 26 Jan</p>-->
          <!--  </div>-->
             <!--<button class="remove-product" onclick="removeProduct(this)">×</button>-->
          <!--</div>-->
        
          <!--<div class="cart-item">-->
          <!--  <div class="cart-item-img">-->
          <!--    <img src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcSDSKvFJNgPMvdGdbekIFxOKHrqI1rCtAeN1xPGtgg0iEnQJeVi7DDTt8Qe_8rre8CRTdyMrkcHxTJwTSIIGbSH4-G-S-rZo8GlCRYfQWQKBPmUkJG4QFfxuWA" alt="Product Image">-->
          <!--    <input class="form-check-input" type="checkbox" id="defaultAddress" style="position: absolute; left: 0;">-->
          <!--  </div>-->
          <!--  <div class="item-details">-->
          <!--    <h4>Puma</h4>-->
              <!--<p>Size: 9 | Qty: 1</p>-->
              
          <!--     <div class="d-flex">-->
          <!--         <p style="border: 1px solid white; padding-left: 5px;  border-radius: 13px; margin-right: 10px;">Size: -->
          <!--              <select>-->
          <!--                  <option value="onesize" style="font-size:10px;">Onesize</option>-->
          <!--                  <option value="small" style="font-size:10px;">Small</option>-->
          <!--                  <option value="medium" style="font-size:10px;">Medium</option>-->
          <!--                  <option value="large" style="font-size:10px;">Large</option>-->
          <!--              </select> -->
          <!--          </p>-->
                    
          <!--         <p  style="border: 1px solid white; padding-left: 5px;  border-radius: 13px; margin-right: 10px;">Quantity: -->
          <!--              <select>-->
          <!--                  <option value="onesize" style="font-size:10px;">1</option>-->
          <!--                  <option value="small" style="font-size:10px;">2</option>-->
          <!--                  <option value="medium" style="font-size:10px;">3</option>-->
          <!--                  <option value="large" style="font-size:10px;">4</option>-->
          <!--              </select> -->
          <!--          </p>-->
          <!--      </div>-->
                
          <!--    <p class="price">Rs. 1,999 <span class="discount"><strike style="color:grey;">Rs. 4,999</strike> 60% OFF</span></p>-->
          <!--    <p>Coupon Discount: Rs. 150</p>-->
          <!--    <p class="delivery-info">Delivery between 26 Jan - 28 Jan</p>-->
          <!--  </div>-->
            <!--<button class="remove-productt" onclick="removeProduct(this)">×</button>-->
          <!--</div>-->
    </div>

    
    
    <!--<div class="offers-section">-->
    <!--    <h4>-->
    <!--        <span class="icon">%</span> Available Offers-->
    <!--    </h4>-->
        <!-- Default visible offer -->
    <!--    <div class="offer-item">10% Instant Discount on BOBCARD Credit Card and Credit Card EMI on a min spend of Rs. 3,500. TCA</div>-->
        <!-- Hidden offers -->
    <!--    <div class="offer-item hidden">5% Cashback on all purchases above Rs. 2,000 using XYZ Bank Debit Card.</div>-->
    <!--    <div class="offer-item hidden">Flat Rs. 500 off on your first purchase above Rs. 10,000 with ABC Card.</div>-->
    <!--    <div class="offer-item hidden">Flat Rs. 500 off on your first purchase above Rs. 10,000 with ABC Card.</div>-->
    <!--    <div class="offer-item hidden">Flat Rs. 500 off on your first purchase above Rs. 10,000 with ABC Card.</div>-->
    <!--    <div class="offer-item hidden">Flat Rs. 500 off on your first purchase above Rs. 10,000 with ABC Card.</div>-->
    <!--    <div class="offer-item hidden">Flat Rs. 500 off on your first purchase above Rs. 10,000 with ABC Card.</div>-->
    <!--    <div class="offer-item hidden">Flat Rs. 500 off on your first purchase above Rs. 10,000 with ABC Card.</div>-->
        <!-- Show More/Less button -->
    <!--    <div class="show-more-btn mt-2" onclick="toggleOffers()">Show More</div>-->
    <!--</div>-->

 

    @if(count($cart_details) == 0)
        @php
            $final_price = 0;
        @endphp
    @else
           <div class="suggested-section">
            <h3>You May Also Like:</h3>
            
            <div class="suggested-products">
                
            @foreach($may_like as $may)
            <a  href="/product/{{ Crypt::encryptString($may->id) }}" style="text-decoration:none;">
                  <div class="product-card">
                        @php
                            $images = json_decode($may->images, true);
                        @endphp
                      <a  href="/product/{{ Crypt::encryptString($may->id) }}" style="text-decoration:none;"><img src="{{ $images[0] }}" alt="Image"></a>
        
                    <p class="text-uppercase font-weight-bold" style="color:white; margin: 10px 0px 0px;">BRAND NAME  {{$may->product_name}}</p>
    
                    
                    <!--<p class="text-uppercase font-weight-bold" style="color:white">{{$may->maximum_retail_price}}</p>-->
                    <!--<span class="price">Rs. 499</span><br>-->
                    <!--<span class="discount"><strike style="color:grey;">Rs. 999</strike> 50% OFF</span>-->
                  </div>
              </a>
             @endforeach
            </div>
          </div>
      
       
  
      <a class="coupon" href="/coupon">
      
        <div class="d-flex align-items-center">
                
             <img style="width: 20px;
            transform: rotate(45deg); margin-left:17px;" src="https://w7.pngwing.com/pngs/62/407/png-transparent-coupon-computer-icons-discounts-and-allowances-voucher-clear-choice-cannabis-term-thumbnail.png" alt="Product 1">
            <div class="py-2 px-3" style="font-size: 13px; color:white;">Apply Coupons </div>
           
            <i class="fa-solid fa-angles-right" style="font-size: 22px;
            position: absolute;
            right: 18px;  color:white;"></i>
        </div>
          
    
      </a>

        <div class="price-details  text-light">
            <div class="title">PRICE DETAILS ({{$total_qty}} Items)</div>
            <div class="d-flex justify-content-between" style="font-size: 13px;">
                <span>Total MRP</span>
                <span>Rs. {{$total_mrp}}</span>
            </div>
            <div class="d-flex justify-content-between" style="font-size: 13px;">
                <span>Discount on MRP</span>
                <span class="text-success"> Rs. {{$total_discount}}</span>
            </div>


            @php
                if ($total_price >= 200 && $total_price <= 499) {
                    $total_shippingg = 49;
                } elseif ($total_price >= 499 && $total_price <= 799) {
                    $total_shippingg = 29;
                } else {
                    $total_shippingg = 'Free';
                }
            @endphp
            
            <div class="d-flex justify-content-between" style="font-size: 13px;">
                <span>Shipping Fee</span>
                <span class="text-success">
                    @if($total_shippingg === 'Free')
                        Free
                    @else
                        Rs. {{$total_shippingg}}
                    @endif
                </span>
            </div>
            
            @php
                if ($total_price >= 200 && $total_price <= 499) {
                    $final_price = $total_price + 49;
                } elseif ($total_price >= 500 && $total_price <= 749) {
                    $final_price = $total_price + 29;
                } else {
                    $final_price = $total_price; // No need to add 0 explicitly
                }
            @endphp

            
            <div class="d-flex justify-content-between" style="font-size: 13px;">
                <span>Total Amount</span>
                <span>Rs.<span class="price-value">{{$final_price}}</span></span>
            </div>
            @if($total_price < 750)
                <div class="terms" style="text-align: center;">
                    Add More <a href="#">Rs. {{ 750 - $total_price }}</a> For <a href="#">Free Delivery</a>.
                </div>
            @endif

            
            <div class="terms" style="text-align: center;">
                By placing the order, you agree to ShowLoom's <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.
            </div>
    </div>

      
 
  <div class="footer">
    <div class="total">{{$total_qty}}  Items Selected (Rs. {{$total_price}})</div>
    
    <!--<button><a href="/payment" style="color:black; text-decoration:none">Place Order</a></button>-->
    {{-- <button id="placeOrderBtn" style="color:black; text-decoration:none">Place Order</button> --}}

    <form id="checkoutForm" action="{{ route('checkout.store') }}" method="POST">
        @csrf
    
        <input type="hidden" name="address_id" id="address_id">
        <input type="hidden" name="products" id="products">
        <input type="hidden" name="total_mrp" value="{{ $total_mrp }}">
        <input type="hidden" name="total_price" value="{{ $total_price }}">
        <input type="hidden" name="total_discount" value="{{ $total_discount }}">
        <input type="hidden" name="total_payable" value="{{ $final_price }}">
    
        <button type="submit" id="placeOrderBtn" style="color:black; text-decoration:none">Place Order</button>
    </form>
    

  </div>
   @endif
</div>
    <input type="hidden" id="aid">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        //   $(document).ready(function () {
        //     $("#placeOrderBtn").on("click", function () {
        //         let token = $('meta[name="csrf-token"]').attr("content"); // Get CSRF token from meta tag
        
        //         let selectedAddress = $("#aid").val();
        //         // let selectedAddress = $("input[name='address']:checked").attr("id");
        //         let products = {};
        
        //         $(".update-quantity").each(function () {
        //             let productId = $(this).data("cartid");
        //             let quantity = $(this).val();
        //             products[productId] = quantity;
        //         });
        
        //         $.ajax({
        //             url: "{{ route('checkout.store') }}",
        //             type: "POST",
        //             headers: {
        //                 "X-CSRF-TOKEN": token // Correct way to send CSRF token
        //             },
        //             data: {
        //                 address_id: selectedAddress,
        //                 products: JSON.stringify(products),
        //                 total_mrp: "{{ $total_mrp }}",
        //                 total_price: "{{ $total_price }}",
        //                 total_discount: "{{ $total_discount }}",
        //                 total_payable: "{{ $final_price }}",
        //             },
        //             success: function (response) {
        //                 alert("Order placed successfully!");
        //                 window.location.href = "/payment/" + response.order_id;
        //             },
        //             error: function (xhr) {
        //                 if (xhr.status === 401) {
        //                     alert("Session expired. Please log in again.");
        //                     window.location.href = "/login"; // Redirect to login if session expired
        //                 } else {
        //                     console.log(xhr.responseText);
        //                     alert("Something went wrong! Please try again.");
        //                 }
        //             }
        //         });
        //     });
        // });
        
        
        // $(document).ready(function () {
        //     $("#placeOrderBtn").on("click", function () {
        //         let token = $('meta[name="csrf-token"]').attr("content");
        //         let selectedAddress = $("#aid").val();
                
        //         if (!selectedAddress) {
        //             alert("Select Address");
        //         }
           
        //         let products = {};
        
        //         $(".update-quantity").each(function () {
        //             let productId = $(this).data("cartid");
        //             let quantity = $(this).val();
        //             products[productId] = quantity;
        //         })
        
        //         $.ajax({
        //             url: "{{ route('checkout.store') }}",
        //             type: "POST",
        //             headers: {
        //                 "X-CSRF-TOKEN": token
        //             },
        //             data: {
        //                 address_id: selectedAddress,
        //                 products: JSON.stringify(products),
        //                 total_mrp: "{{ $total_mrp }}",
        //                 total_price: "{{ $total_price }}",
        //                 total_discount: "{{ $total_discount }}",
        //                 total_payable: "{{ $final_price }}",
        //             },
        //             success: function (response) {
        //                 if (response.payment_url) {
        //                     window.location.href = response.payment_url; // Redirect to Cashfree payment page
        //                 } else {
        //                     alert("Payment link not generated. Please try again.");
        //                 }
        //             },
        //             error: function (xhr) {
        //                 if (xhr.status === 401) {
        //                     // alert("Session expired. Please log in again.");
        //                     // window.location.href = "/login";
        //                 } else {
        //                     console.log(xhr.responseText);
        //                     alert("Something went wrong! Please try again.");
        //                 }
        //             }
        //         });
        //     });
        // });


        document.getElementById("checkoutForm").addEventListener("submit", function (e) {
            const selectedAddress = document.getElementById("aid").value;

            if (!selectedAddress) {
                e.preventDefault();
                alert("Please select an address.");
                return;
            }

            document.getElementById("address_id").value = selectedAddress;

            let products = {};
            document.querySelectorAll(".update-quantity").forEach(function (input) {
                let productId = input.getAttribute("data-cartid");
                let quantity = input.value;
                products[productId] = quantity;
            });

            document.getElementById("products").value = JSON.stringify(products);
        });



    </script>

 <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    
  
    <script>
        function toggleOffers() {
          // Get all hidden offer items
          const hiddenOffers = document.querySelectorAll('.offer-item.hidden');
          // Get the "Show More" button
          const showMoreBtn = document.querySelector('.show-more-btn');
        
          // Check if any offer has the "hidden" class
          const isHidden = hiddenOffers.length > 0 && hiddenOffers[0].classList.contains('hidden');
        
          if (isHidden) {
            // Show all hidden offers
            hiddenOffers.forEach((offer) => offer.classList.remove('hidden'));
            // Change button text to "Show Less"
            showMoreBtn.textContent = 'Show Less';
          } else {
            // Hide all offers except the first one
            const allOffers = document.querySelectorAll('.offer-item');
            allOffers.forEach((offer, index) => {
              if (index > 0) {
                offer.classList.add('hidden');
              }
            });
            // Change button text back to "Show More"
            showMoreBtn.textContent = 'Show More';
          }
        }
    </script>



   
    <script>
       // Switch Tab Function
        function switchTab(tabId) {
            
            // Hide all tab content
            const tabContents = document.querySelectorAll('.cart-items');
            tabContents.forEach(content => content.classList.remove('active'));
        
            // Remove active class from all tabs
            const tabs = document.querySelectorAll('.tab');
            tabs.forEach(tab => tab.classList.remove('active'));
        
            // Show the selected tab content
            const activeTabContent = document.getElementById(tabId);
            activeTabContent.classList.add('active');
        
            // Add active class to the clicked tab
            const activeTab = document.querySelector(`.tab[onclick="switchTab('${tabId}')"]`);
            activeTab.classList.add('active');
        }

    </script>
    
    
    <script>
    
        document.addEventListener("DOMContentLoaded", function () {
            let savedAddressId = localStorage.getItem("selectedAddress");
        
            // Find the saved address radio button and check it
            if (savedAddressId) {
                let savedRadioButton = document.getElementById(savedAddressId);
                if (savedRadioButton) {
                    savedRadioButton.checked = true;
                    updateSelectedAddress(savedRadioButton);
                }
            } else {
                // If no saved address, select the first one by default
                let firstRadioButton = document.querySelector(".address-radio");
                if (firstRadioButton) {
                    firstRadioButton.checked = true;
                    updateSelectedAddress(firstRadioButton);
                }
            }
        
            // Add change event listener to radio buttons
            const radioButtons = document.querySelectorAll('.address-radio');
            radioButtons.forEach((radioButton) => {
                radioButton.addEventListener('change', function () {
                    updateSelectedAddress(this);
                });
            });
        });
        
        // Show "Delivering Here" button and update selected address
        function updateSelectedAddress(radioButton) {
            // Hide all "Delivering Here" buttons
            document.querySelectorAll('.delivering-here-btn').forEach((btn) => {
                btn.style.display = 'none';
            });
        
            // Show the "Delivering Here" button for the selected address
            const button = radioButton.closest('.card-body')?.querySelector('.delivering-here-btn');
            if (button) {
                button.style.display = 'inline-block';
            }
        
            // Get selected address details
            let id = radioButton.dataset.id;
            let name = radioButton.dataset.name;
            let pincode = radioButton.dataset.pincode;
            let address1 = radioButton.dataset.address1;
            let address2 = radioButton.dataset.address2;
        
            // Update the selected address display
            document.getElementById('selected-address').innerHTML = `
                <p>Deliver to: <strong>${name}, ${pincode}</strong></p>
                <p style="font-size:12px;">${address1}, ${address2}, ${pincode}</p>
            `;
            
            document.getElementById('aid').value = `${id}`;
        
            // Save the selected address ID in localStorage
            localStorage.setItem("selectedAddress", radioButton.id);
        }

        function toggleDropdown(event, button) {
                event.preventDefault();
                event.stopPropagation();
                
                const dropdown = button.nextElementSibling;
                const isVisible = dropdown.style.display === "block";
                
                // Close all dropdowns
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    menu.style.display = "none";
                });
                
                // Toggle current dropdown
                dropdown.style.display = isVisible ? "none" : "block";
            }
            
            document.addEventListener('click', function(event) {
                if (!event.target.closest('.dropdown-container')) {
                    document.querySelectorAll('.dropdown-menu').forEach(menu => {
                        menu.style.display = "none";
                    });
                }
            });


        function makeDefault(addressId) {
        // Find and check the corresponding radio button
        const radioButton = document.getElementById(addressId);
        if (radioButton) {
            radioButton.checked = true;
    
            // Call updateSelectedAddress to show the "Delivering Here" button
            updateSelectedAddress(radioButton);
        }
    
        // Close dropdown after selecting "Make Default"
        document.querySelectorAll(".dropdown-menu").forEach(menu => {
            menu.style.display = "none";
        });
    }



    </script>

    <!-- Bootstrap JS (Ensure it's included in your project) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- FontAwesome for Icon -->
    <!--<script src="https://kit.fontawesome.com/YOUR_KIT_CODE.js" crossorigin="anonymous"></script-->
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".update-size").on("change", function () {
                let cart_id = $(this).data("cartid");
                let size_name = $(this).val();
    
                $.ajax({
                    url: "{{ route('update.cart.size') }}", // Define the route
                    type: "POST",
                    data: {
                        cart_id: cart_id,
                        size_name: size_name,
                        _token: "{{ csrf_token() }}" // CSRF token for security
                    },
                    success: function (response) {
                        alert(response.message);
                    },
                    error: function (xhr) {
                        alert("Error updating size. Please try again.");
                    }
                });
            });
        });
    </script>


    <script>
        $(document).ready(function () {
            $(".update-quantity").on("change", function () {
                let element = $(this); // Store the current select element
                let cart_id = element.data("cartid");
                let quantity = element.val();
                let price = element.data("price");
                
                let updatedPrice = price * quantity;
                
                $.ajax({
                    url: "{{ route('update.cart.quantity') }}",
                    type: "POST",
                    data: {
                        cart_id: cart_id,
                        quantity: quantity,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        
                        window.location.reload();
                        if (response.updated_price) {
                            // Find the closest cart item and update the price
                            element.closest(".cart-item").find(".price-value").text(response.updated_price);
                        }
                        
                        
                    },
                    error: function () {
                        alert("Error updating quantity. Please try again.");
                    }
                });
            });
        });
    </script>
   <script>
    function addToWishlist(tempUserId, userId, productId, cartId) {
        $.ajax({
            url: "/wishlist/store", // Ensure this route is correct
            type: "POST",
            data: {
                _token: document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                temp_user_id: tempUserId,
                user_id: userId,
                product_id: productId,
                ppid: cartId
            },
            success: function (response) {
                if (response.success) {
                    window.location.href = response.redirect; // Redirect to wishlist page
                }
            },
            error: function (xhr, status, error) {
                console.error("Error:", error);
            }
        });
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
                        successMessage.textContent = "Hurray! Your pincode is valid for 69-Minute delivery";
                        errorMessage.style.display = "none";
                    } else {
                        errorMessage.style.display = "flex";
                        errorMessage.textContent = "Pincode Is Not Serviceable";
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
</body>
</html>