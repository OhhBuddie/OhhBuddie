<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Return Item</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   <link rel="icon" type="image/x-icon" href="https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Ohbuddielogo.png">

  <style>
  
  
    
    @media screen and (min-width: 778px){
        
        body{
            display: flex !important;
            flex-direction: column !important;
            justify-content: center !important;
            align-items: center !important;
            }
        .container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
            max-width: 40% !important;
        }
        .option-button{
            width: 40% !important;
        }
    }
    body {
      background-color: #000;
      color: #fff;
      font-family: Arial, sans-serif;
    }

    .card-box {
      border-radius: 10px;
      padding: 10px;
      margin-bottom: 20px;
      background-color: #1f1f1f;
    }

    .card-option {
      border: 2px solid #EFC475;
      border-radius: 10px;
      padding: 20px 10px;
      height: 100%;
      text-align: center;
      background-color: transparent;
      color: #fff;
      cursor: pointer;
      transition: transform 0.2s ease-in-out;
    }

    /*.card-option:hover {*/
    /*  background-color: #2a2a2a;*/
    /*  transform: scale(1.02);*/
    /*}*/

    .card-option i {
      font-size: 32px;
      color: #EFC475;
      margin-bottom: 10px;
    }

    .card-option h6 {
      color: #EFC475;
      font-weight: bold;
    }

    .card-option p {
      font-size: 14px;
    }

    .heading {
      color: #EFC475;
      font-weight: bold;
      font-size: 20px;
      text-align: center;
      margin-top: 20px;
    }

    .subheading {
      text-align: center;
      margin-bottom: 10px;
    }

    .divider {
      width: 50px;
      height: 2px;
      background-color: #EFC475;
      margin: 10px auto;
    }

    .sub-reasons {
      background-color: #1f1f1f;
      border: 2px solid #EFC475;
      border-radius: 10px;
      padding: 15px;
      margin-top: 10px;
    }

    .form-check-label {
      color: #fff;
    }

    .form-check-input:checked {
      background-color: #EFC475;
      border-color: #EFC475;
    }
  </style>

</head>
<body>
  <div class="container py-4">
    <!-- Product Info -->
    @php
      $images = json_decode($product_details->images, true);
    @endphp
    <div class="card-box d-flex align-items-center">
      <img src="{{ $images[0] }}" alt="Product" class="me-3" style="width:120px"/>
      <div>
        <strong>{{$product_details->product_name}}</strong><br />
        Size: {{$product_details->size_name}} | Rs.{{$product_details->portal_updated_price}}
      </div>
    </div>

    <!-- Heading -->
    <div class="heading">Want to return?</div>
    <p class="subheading">Don't worry, we are here to help you!</p>
    <div class="divider"></div>
    <p class="subheading" style="color: #EFC475;">Select return reason</p>

    <div id="returnAccordion">
        
        
        
      <!-- Quality Issues Form -->
    <form action="{{ route('returnandrefund.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="collapse mt-3" id="qualityCollapse" data-bs-parent="#returnAccordion">
        <div class="sub-reasons">
          <h6 style="color: #EFC475;">Quality issues</h6>
          <p>Poor Quality Product</p>
          <hr class="border-light" />
    
          <div class="form-check">
            <input class="form-check-input" type="radio" name="quality_reason" id="reason1" value="Received a poor quality product" required />
            <label class="form-check-label" for="reason1">Received a poor quality product</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="quality_reason" id="reason2" value="Product image was better than actual product" required />
            <label class="form-check-label" for="reason2">Product image was better than the actual product</label>
          </div>
    
          <br>
          <input type="hidden" name="section" value="Quality issues">
          
          <input type="file" class="form-control" name="image" style="background-color:black; color:white" required>
          <input type="hidden" name="product_id" value="{{$product_details->id}}">
          <input type="hidden" name="order_id" value="{{$order->id}}">
          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
          <input type="hidden" name="pid" value="{{$product_details->product_id}}">
          <input type="hidden" name="oid" value="{{$order->order_id}}">
          <input type="hidden" name="seller_id" value="{{$product_details->seller_id}}">
          <input type="hidden" name="seller_user_id" value="{{$seller_details->user_table_id}}">
          
          <!--<button type="submit" class="btn btn-primary mt-2" style="background-color:#EFC475; color:black; border:none; width:300px">Submit</button>-->
          <input type="hidden" name="refund_source" id="refund_source_input">

          <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#refundModeModal">Submit</button>
        </div>
      </div>
      
      <!-- Refund Mode Modal -->
        <div class="modal fade" id="refundModeModal" tabindex="-1" aria-labelledby="refundModeLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content bg-dark">
              <div class="modal-header">
                <h5 class="modal-title" id="refundModeLabel">If Refund approved, what will your preferable mode?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body bg-dark">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="refund_source" id="primary_account" value="Primary Account" required>
                  <label class="form-check-label" for="primary_account">Primary Account</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="refund_source" id="wallet" value="Ohhbuddie Wallet" required>
                  <label class="form-check-label" for="wallet">Ohhbuddie Wallet</label>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" id="confirmRefundMode" class="btn btn-primary">Confirm & Submit</button>
              </div>
            </div>
          </div>
        </div>


    </form>
          <script>
              document.getElementById('confirmRefundMode').addEventListener('click', function () {
                const selectedSource = document.querySelector('input[name="refund_source"]:checked');
                if (!selectedSource) {
                  alert('Please select a refund mode.');
                  return;
                }
            
                // Set the hidden input value
                document.getElementById('refund_source_input').value = selectedSource.value;
            
                // Find the closest form and submit it
                const form = document.querySelector('#sizefitCollapse').closest('form');
                form.submit();
              });
        </script>
        
        
    <!-- Size & Fit Issues Form -->
    <form action="{{ route('returnandrefund.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="collapse mt-3" id="sizefitCollapse" data-bs-parent="#returnAccordion">
        <div class="sub-reasons">
          <h6 style="color: #EFC475;">Size & Fit Issues</h6>
          <p>Doesn't fit me well</p>
          <hr class="border-light" />
    
          <div class="form-check">
            <input class="form-check-input" type="radio" name="size_reason" id="reason3" value="Size too small" required />
            <label class="form-check-label" for="reason3">Size too small</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="size_reason" id="reason4" value="Size too big" required />
            <label class="form-check-label" for="reason4">Size too big</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="size_reason" id="reason5" value="Did not like the fit" required />
            <label class="form-check-label" for="reason5">I did not like the fit</label>
          </div>
    
          <br>
          <input type="file" class="form-control" name="image" style="background-color:black; color:white" required>
          <input type="hidden" name="product_id" value="{{$product_details->id}}">
          <input type="hidden" name="order_id" value="{{$order->id}}">
          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
          <input type="hidden" name="pid" value="{{$product_details->product_id}}">
          <input type="hidden" name="oid" value="{{$order->order_id}}">
          <input type="hidden" name="seller_id" value="{{$product_details->seller_id}}">
          <input type="hidden" name="seller_user_id" value="{{$seller_details->user_table_id}}">
          
          <input type="hidden" name="section" value="Size & Fit Issues">
    
          <!--<button type="submit" class="btn btn-primary mt-2">Submit</button>-->
          <input type="hidden" name="refund_source" id="refund_source_input1">

          <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#refundModeModal1">Submit</button>
          
            <!-- Refund Mode Modal -->
            <div class="modal fade" id="refundModeModal1" tabindex="-1" aria-labelledby="refundModeLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content bg-dark">
                  <div class="modal-header">
                    <h5 class="modal-title" id="refundModeLabel">If Refund approved, what will your preferable mode?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body bg-dark">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="refund_source" id="primary_account" value="Primary Account" required>
                      <label class="form-check-label" for="primary_account">Primary Account</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="refund_source" id="wallet" value="Ohhbuddie Wallet" required>
                      <label class="form-check-label" for="wallet">Ohhbuddie Wallet</label>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" id="confirmRefundMode1" class="btn btn-primary">Confirm & Submit</button>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>


    </form>
    <script>
          document.getElementById('confirmRefundMode1').addEventListener('click', function () {
            const selectedSource = document.querySelector('input[name="refund_source"]:checked');
            if (!selectedSource) {
              alert('Please select a refund mode.');
              return;
            }
        
            // Set the hidden input value
            document.getElementById('refund_source_input1').value = selectedSource.value;
        
            // Find the closest form and submit it
            const form = document.querySelector('#sizefitCollapse').closest('form');
            form.submit();
          });
    </script>
    <!-- Changed My Mind Form -->
    <form action="{{ route('returnandrefund.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="collapse mt-3" id="mindCollapse" data-bs-parent="#returnAccordion">
        <div class="sub-reasons">
          <h6 style="color: #EFC475;">Changed My Mind</h6>
          <p>I don't want this product</p>
          <hr class="border-light" />
    
          <div class="form-check">
            <input class="form-check-input" type="radio" name="mind_reason" id="mind1" value="Found a better price on Myntra" required />
            <label class="form-check-label" for="mind1">Found a better price on Myntra</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="mind_reason" id="mind2" value="Delivery was delayed" required />
            <label class="form-check-label" for="mind2">Delivery was delayed</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="mind_reason" id="mind3" value="Found a better price elsewhere" required />
            <label class="form-check-label" for="mind3">Found a better price elsewhere</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="mind_reason" id="mind4" value="No longer needed" required />
            <label class="form-check-label" for="mind4">I do not need it anymore</label>
          </div>
    
          <br>
          <input type="file" class="form-control" name="image" style="background-color:black; color:white">
          <input type="hidden" name="product_id" value="{{$product_details->id}}">
          <input type="hidden" name="order_id" value="{{$order->id}}">
          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
          <input type="hidden" name="pid" value="{{$product_details->product_id}}">
          <input type="hidden" name="oid" value="{{$order->order_id}}">
          <input type="hidden" name="seller_id" value="{{$product_details->seller_id}}">
          <input type="hidden" name="seller_user_id" value="{{$seller_details->user_table_id}}">
          <input type="hidden" name="section" value="Changed My Mind">
    
          <input type="hidden" name="refund_source" id="refund_source_input2">

          <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#refundModeModal2">Submit</button>
          
            <!-- Refund Mode Modal -->
            <div class="modal fade" id="refundModeModal2" tabindex="-1" aria-labelledby="refundModeLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content bg-dark">
                  <div class="modal-header">
                    <h5 class="modal-title" id="refundModeLabel">If Refund approved, what will your preferable mode?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body bg-dark">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="refund_source" id="primary_account" value="Primary Account" required>
                      <label class="form-check-label" for="primary_account">Primary Account</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="refund_source" id="wallet" value="Ohhbuddie Wallet" required>
                      <label class="form-check-label" for="wallet">Ohhbuddie Wallet</label>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" id="confirmRefundMode2" class="btn btn-primary">Confirm & Submit</button>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>        
          </div>
      </div>
      
      
    </form>
    <script>
          document.getElementById('confirmRefundMode2').addEventListener('click', function () {
            const selectedSource = document.querySelector('input[name="refund_source"]:checked');
            if (!selectedSource) {
              alert('Please select a refund mode.');
              return;
            }
        
            // Set the hidden input value
            document.getElementById('refund_source_input2').value = selectedSource.value;
        
            // Find the closest form and submit it
            const form = document.querySelector('#sizefitCollapse').closest('form');
            form.submit();
          });
    </script>
    <!-- Different Product Form -->
    <form action="{{ route('returnandrefund.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="collapse mt-3" id="differentCollapse" data-bs-parent="#returnAccordion">
        <div class="sub-reasons">
          <h6 style="color: #EFC475;">Different Product</h6>
          <p>Not what I ordered</p>
          <hr class="border-light" />
    
          <div class="form-check">
            <input class="form-check-input" type="radio" name="different_reason" id="diff1" value="Different color" required />
            <label class="form-check-label" for="diff1">Received same product, but different color</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="different_reason" id="diff2" value="Different size" required />
            <label class="form-check-label" for="diff2">Received same product, but different size</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="different_reason" id="diff3" value="Completely different product" required />
            <label class="form-check-label" for="diff3">Received a completely different product</label>
          </div>
    
          <br>
          <input type="file" class="form-control" name="image" style="background-color:black; color:white" required>
          <input type="hidden" name="product_id" value="{{$product_details->id}}">
          <input type="hidden" name="order_id" value="{{$order->id}}">
          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
          <input type="hidden" name="pid" value="{{$product_details->product_id}}">
          <input type="hidden" name="oid" value="{{$order->order_id}}">
          <input type="hidden" name="seller_id" value="{{$product_details->seller_id}}">
          <input type="hidden" name="seller_user_id" value="{{$seller_details->user_table_id}}">
          <input type="hidden" name="section" value="Different Product">
    
           <input type="hidden" name="refund_source" id="refund_source_input3">

          <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#refundModeModal3">Submit</button>
          
            <!-- Refund Mode Modal -->
            <div class="modal fade" id="refundModeModal3" tabindex="-1" aria-labelledby="refundModeLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content bg-dark">
                  <div class="modal-header">
                    <h5 class="modal-title" id="refundModeLabel">If Refund approved, what will your preferable mode?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body bg-dark">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="refund_source" id="primary_account" value="Primary Account" required>
                      <label class="form-check-label" for="primary_account">Primary Account</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="refund_source" id="wallet" value="Ohhbuddie Wallet" required>
                      <label class="form-check-label" for="wallet">Ohhbuddie Wallet</label>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" id="confirmRefundMode3" class="btn btn-primary">Confirm & Submit</button>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>        
          </div>
      </div>
      
      
    </form>
    <script>
          document.getElementById('confirmRefundMode3').addEventListener('click', function () {
            const selectedSource = document.querySelector('input[name="refund_source"]:checked');
            if (!selectedSource) {
              alert('Please select a refund mode.');
              return;
            }
        
            // Set the hidden input value
            document.getElementById('refund_source_input3').value = selectedSource.value;
        
            // Find the closest form and submit it
            const form = document.querySelector('#sizefitCollapse').closest('form');
            form.submit();
          });
    </script>

    <!-- Damaged Product Form -->
    <form action="{{ route('returnandrefund.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="collapse mt-3" id="damagedCollapse" data-bs-parent="#returnAccordion">
        <div class="sub-reasons">
          <h6 style="color: #EFC475;">Damaged/Used/Stained</h6>
          <p>Not in good condition</p>
          <hr class="border-light" />
    
          <div class="form-check">
            <input class="form-check-input" type="radio" name="damaged_reason" id="damaged1" value="Defective" required />
            <label class="form-check-label" for="damaged1">Product was defective</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="damaged_reason" id="damaged2" value="Damaged" required />
            <label class="form-check-label" for="damaged2">Product was damaged</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="damaged_reason" id="damaged3" value="Packaging damaged" required />
            <label class="form-check-label" for="damaged3">Primary packaging damaged</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="damaged_reason" id="damaged4" value="Looked old" required />
            <label class="form-check-label" for="damaged4">Product looked old</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="damaged_reason" id="damaged5" value="Stained/dirty" required />
            <label class="form-check-label" for="damaged5">Product was dirty and had stains</label>
          </div>
    
          <br>
          <input type="file" class="form-control" name="image" style="background-color:black; color:white" required>
          <input type="hidden" name="product_id" value="{{$product_details->id}}">
          <input type="hidden" name="order_id" value="{{$order->id}}">
          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
          <input type="hidden" name="pid" value="{{$product_details->product_id}}">
          <input type="hidden" name="oid" value="{{$order->order_id}}">
          <input type="hidden" name="seller_id" value="{{$product_details->seller_id}}">
          <input type="hidden" name="seller_user_id" value="{{$seller_details->user_table_id}}">
          <input type="hidden" name="section" value="Damaged/Used/Stained">
    
           <input type="hidden" name="refund_source" id="refund_source_input4">

          <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#refundModeModal4">Submit</button>
          
            <!-- Refund Mode Modal -->
            <div class="modal fade" id="refundModeModal4" tabindex="-1" aria-labelledby="refundModeLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content bg-dark">
                  <div class="modal-header">
                    <h5 class="modal-title" id="refundModeLabel">If Refund approved, what will your preferable mode?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body bg-dark">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="refund_source" id="primary_account" value="Primary Account" required>
                      <label class="form-check-label" for="primary_account">Primary Account</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="refund_source" id="wallet" value="Ohhbuddie Wallet" required>
                      <label class="form-check-label" for="wallet">Ohhbuddie Wallet</label>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" id="confirmRefundMode4" class="btn btn-primary">Confirm & Submit</button>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>        
          </div>
      </div>
      
      
    </form>
    <script>
          document.getElementById('confirmRefundMode4').addEventListener('click', function () {
            const selectedSource = document.querySelector('input[name="refund_source"]:checked');
            if (!selectedSource) {
              alert('Please select a refund mode.');
              return;
            }
        
            // Set the hidden input value
            document.getElementById('refund_source_input4').value = selectedSource.value;
        
            // Find the closest form and submit it
            const form = document.querySelector('#sizefitCollapse').closest('form');
            form.submit();
          });
    </script>


    <!-- Option Buttons -->
    <div class="row g-3 mt-4 option-button">
      <div class="col-6">
        <div class="card-option" data-bs-toggle="collapse" data-bs-target="#qualityCollapse">
          <i class="fas fa-shirt"></i>
          <p style="color: #EFC475;"><b>Quality issues</b></p>
          <p>Poor Quality Product</p>
        </div>
      </div>
      <div class="col-6">
        <div class="card-option" data-bs-toggle="collapse" data-bs-target="#sizefitCollapse">
          <i class="fas fa-ruler-combined"></i>
          <p style="color: #EFC475;"><b>Size & fit issues</b></p>
          <p>Doesn't fit me well</p>
        </div>
      </div>
      <div class="col-6">
        <div class="card-option" data-bs-toggle="collapse" data-bs-target="#mindCollapse">
          <i class="fas fa-question-circle"></i>
          <p style="color: #EFC475;"><b>Changed my mind</b></p>
          <p>I don't want this product</p>
        </div>
      </div>
      <div class="col-6">
        <div class="card-option" data-bs-toggle="collapse" data-bs-target="#differentCollapse">
          <i class="fas fa-box-open"></i>
          <p style="color: #EFC475;"><b>Different product</b></p>
          <p>Not what I ordered</p>
        </div>
      </div>
      <div class="col-6">
        <div class="card-option" data-bs-toggle="collapse" data-bs-target="#damagedCollapse">
          <i class="fas fa-tshirt"></i>
          <p style="color: #EFC475;"><b>Damaged/Used/Stained</b></p>
          <p>Not in good condition</p>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      document.getElementById('openRefundModal').addEventListener('click', function () {
        const refundModal = new bootstrap.Modal(document.getElementById('refundModeModal'));
        refundModal.show();
      });
    
      document.getElementById('confirmRefundMode').addEventListener('click', function () {
        const selected = document.querySelector('input[name="refund_source"]:checked');
        if (!selected) {
          alert("Please select a refund mode.");
          return;
        }
    
        // Set the hidden input value
        document.getElementById('refund_source_input').value = selected.value;
    
        // Submit the form
        document.querySelector('form').submit();
      });
    </script>
</body>
</html>