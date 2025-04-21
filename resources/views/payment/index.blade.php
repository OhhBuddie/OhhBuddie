<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ohhbuddie | Payment</title>
    <link rel="icon" type="image/x-icon" href="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Ohbuddielogo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Google Tag Manager -->
    
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KCL2HTR9');</script>
        <!-- End Google Tag Manager -->
        
        
        
        <!-- Meta Pixel Code -->
        <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '2681722928691492');
        fbq('track', 'PageView');
        </script>
    
        <!-- End Meta Pixel Code -->
            
        <!--Log Rocket -->
    
        <script src="https://cdn.lgrckt-in.com/LogRocket.min.js" crossorigin="anonymous"></script>
        <script>window.LogRocket && window.LogRocket.init('a4hegy/ohh-buddie');</script>
    
        <!-- End Log Rocket -->
            
<style>
    :root {
        --primary-color: #efc475;
        --secondary-color: #08ADC5;
        
        --black: #000000;
        --white: #ffffff;
        --gray: #efefef;
        --gray-2: #757575;
    
        --facebook-color: #4267B2;
        --google-color: #DB4437;
        --twitter-color: #1DA1F2;
        --insta-color: #E1306C;
    }
    body {
    font-family: sans-serif;
    background-color: black;
    margin: 0;
    padding: 0;
    font-family: sans-serif;

}

</style>    
    <style>
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

        .accordion-button {
            font-size: 1rem;
            font-weight: 400;
            box-shadow: none;
            background: #1F1F1F;
            color: white;
            border: 1px solid white;
           
             width: 100%;
            transition: none; /* Disable animation that might cause width changes */
        }

        .form-control {
            margin-top: 10px;
        }

        h2 {
            font-size: 1.5rem;
            font-weight: 600;
        }

        /*.accordion-body {*/
        /*    background-color: #ffffff;*/
        /*    border: 1px solid #dee2e6;*/
        /*    border-radius: 5px;*/
        /*    padding: 20px;*/
        /*    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);*/
        /*}*/

        .accordion-button:focus, 
        .accordion-button:not(.collapsed) {
            box-shadow: none; /* Remove focus shadow */
            outline: none; /* Remove focus outline */
        }

        .accordion-button::after {
             flex-shrink: 0; /* Prevent expansion */
             color:white;
        }

        .accordion-button:focus-visible {
            outline: none;
        }

        .accordion-body {
            background: #1f1f1f;
            padding: 20px;
           color:white;
        }
  
        .accordion-cash {
            font-weight: 300;
            border-bottom: 1px solid #dee2e6;
            /* border-radius: 5px; */
            padding: 10px;
            /* box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); */
        }
        
        .accordion-button:not(.collapsed){
            background: #1f1f1f;
            color: white;
        }
        .accordion-body img {
            width: 30px;
            height: 30px;
            margin-right: 10px;
            vertical-align: middle;
        }
        
        h5 {
            font-size: 1.25rem;
            font-weight: 600;
        }

        .form-control {
            border-radius: 8px;
        }
        
        .form-check-label {
            font-size: 1rem;
            font-weight: 500;
        }

    </style>
    <style>
        .offers-section {
         
            padding: 15px;
            /*max-width: 400px;*/
            /*background-color: #f9f9f9;*/
        }

        .offers-section h4 {
            font-size: 16px;
            margin-bottom: 10px;
            color:white;
        }

        .offer-item {
            font-size: 14px;
            color: white;
            margin-top: 7px;
        }

        .offer-item.hidden {
            display: none;
        }

        .show-more-btn {
            color: var(--secondary-color);
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
            font-size: 12px;
            text-align: center;
            line-height: 20px;
            margin-right: 8px;
        }
    </style>
    <style>

        .price-details {
            background: #1f1f1f;
            border: 1px solid white;
           
            padding: 15px 20px;
            max-width: 400px;
            margin: 24px 0px 60px 0px;
        }
        .price-details .title {
            font-weight: 600;
            margin-bottom: 10px;
            font-size: 12px;
            /*color: #333;*/
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
            /*color: #555;*/
            text-align:center;
        }
        .price-details .terms a {
            color: var(--secondary-color);
            text-decoration: none;
            font-weight: 600;
        }


    .footer {
      /*padding: 16px;*/
      display: flex;
      justify-content: space-between;
      align-items: center;
      
      
      
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      z-index: 1030;
      background: black;
      padding: 8px;
      box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
    }

    .footer .total {
      font-size: 14px;
      font-weight: bold;
      color: white;
      padding: 10px;
    }

    .footer button {
      padding: 10px 40px;
      background-color: var(--primary-color);
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 14px;
    }

    .footer button:hover {
      background-color: var(--secondary-color);
    }
    </style>


</head>

<body>
    




    
    <!--<h4>Products</h4>-->
    <!--<ul>-->
    <!--    @foreach($orderDetails as $item)-->
    <!--        <li>Product ID: {{ $item->product_id }} | Quantity: {{ $item->quantity }}</li>-->
    <!--    @endforeach-->
    <!--</ul>-->
    
    <!--<h4>Shipping Address</h4>-->
    <!--<p>Selected Address ID: {{$order->shipping_address}}</p>-->




     <div class="d-flex justify-content-between align-items-center px-3 navbar-fixed-top text-light">
            <div class="d-flex align-items-center">
                <!-- Back Button -->
                <a href="javascript:history.back();" style="font-size: 22px; margin-right: 0px; color: black;">
                   <i class="fa-solid fa-arrow-left text-light"></i>
                </a>    
                <div class="header">PAYMENT</div>
            </div>
            {{-- <div>Step 1/3</div> --}}
    
    </div>
    <div class="d-flex justify-content-around align-items-center"
        style="margin-top: 57px; font-size:15px; background-color: var(--primary-color); color:white;">
        <span>Secure Payments</span>
        <span>Easy Returns</span>
        <span>Fast Refunds</span>
    </div>

    <div class="offers-section">
        <h4>
            <span class="icon">%</span> Bank Offers
        </h4>
        <!-- Default visible offer -->
        <div class="offer-item px-4" style="font-size: 13px;">10% Instant Discount on BOBCARD Credit Card and Credit
            Card EMI on a min spend of
            ₹3,500. TCA</div>
        <!-- Hidden offers -->
        <div class="offer-item hidden px-4" style="font-size: 13px;">5% Cashback on all purchases above ₹2,000 using XYZ
            Bank Debit Card.</div>
        <div class="offer-item hidden px-4" style="font-size: 13px;">Flat ₹500 off on your first purchase above ₹10,000
            with ABC Card.</div>
        <div class="offer-item hidden px-4" style="font-size: 13px;">Flat ₹500 off on your first purchase above ₹10,000
            with ABC Card.</div>
        <div class="offer-item hidden px-4" style="font-size: 13px;">Flat ₹500 off on your first purchase above ₹10,000
            with ABC Card.</div>
        <div class="offer-item hidden px-4" style="font-size: 13px;">Flat ₹500 off on your first purchase above ₹10,000
            with ABC Card.</div>
        <div class="offer-item hidden px-4" style="font-size: 13px;">Flat ₹500 off on your first purchase above ₹10,000
            with ABC Card.</div>
        <div class="offer-item hidden px-4" style="font-size: 13px;">Flat ₹500 off on your first purchase above ₹10,000
            with ABC Card.</div>
        <!-- Show More/Less button -->
        <div class="show-more-btn mt-2 px-4" onclick="toggleOffers()">Show More</div>
    </div>

   @php
     $add = DB::table('addresses')->where('id',$order->shipping_address)->latest()->first();
   @endphp

    <div class="delivery-section d-flex justify-content-between align-items-center m-2 accordion-cash">
            <div id="selected-address" style="color:white">
                <p style="font-size:13px;">Deliver to:</p>
                <p style="font-size:12px;">{{ $add->name }}, {{ $add->pincode }},{{ $add->address_line_1 }}, {{ $add->address_line_2 }}, {{ $add->pincode }} </p>
            </div>
    </div>
    
    <div class="m-2" style="font-size: 14px;  font-weight: bold; color:white;">
        Online Payment Options

        <div class="mt-2 accordion accordion-flush" id="paymentAccordion">
            <!-- UPI Tab -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingUPI">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseUPI" aria-expanded="false" aria-controls="flush-collapseUPI" style="box-shadow: none;">
                        UPI
                    </button>
                </h2>
                <div id="flush-collapseUPI" class="accordion-collapse collapse" aria-labelledby="flush-headingUPI"
                    data-bs-parent="#paymentAccordion">
                    <div class="accordion-body">
                        <h5 class="mb-3" style="color: var(--secondary-color);">Select a UPI Option</h5>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="upiOption" id="gpay" value="Google Pay">
                            <label class="form-check-label" for="gpay">Google Pay</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="upiOption" id="phonepe" value="Phone Pay">
                            <label class="form-check-label" for="phonepe">Phone Pay</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="upiOption" id="enterUpiId" value="Enter UPI ID">
                            <label class="form-check-label" for="enterUpiId">Enter UPI ID</label>
                        </div>
                        <input type="text" id="upiIdInput" class="form-control mt-2 d-none" placeholder="Enter your UPI ID">
                    </div>
                </div>

            </div>
            <!-- Credit/Debit Card Tab -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingCard">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseCard" aria-expanded="false" aria-controls="flush-collapseCard" style="box-shadow: none;">
                        Credit/Debit Card
                    </button>
                </h2>
                
                <div id="flush-collapseCard" class="accordion-collapse collapse" aria-labelledby="flush-headingCard"
                        data-bs-parent="#paymentAccordion">
                    <div class="accordion-body">
                        <h5 class=" mb-3" style="color: var(--secondary-color);">Enter Card Details</h5>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Card Number">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Name on Card">
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="CVV">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Valid Date (MM/YY)">
                            </div>
                        </div>
                    </div>  
                </div>

                
            </div>
            <!-- Wallets Tab -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingWallets">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseWallets" aria-expanded="false"
                        aria-controls="flush-collapseWallets"  style="box-shadow: none;">
                        Wallets
                    </button>
                </h2>
                <div id="flush-collapseWallets" class="accordion-collapse collapse"
                    aria-labelledby="flush-headingWallets" data-bs-parent="#paymentAccordion">
                    <div class="accordion-body">
                        <h5 class=" mb-3" style="color: var(--secondary-color);">Choose a Wallet</h5>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="walletOption" id="freecharge" value="Freecharge">
                            <label class="form-check-label" for="freecharge">Freecharge</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="walletOption" id="airtelPay" value="Airtel Payments Bank">
                            <label class="form-check-label" for="airtelPay">Airtel Payments Bank</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="walletOption" id="paytm" value="Paytm">
                            <label class="form-check-label" for="paytm">Paytm</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="walletOption" id="mobikwik" value="MobiKwik">
                            <label class="form-check-label" for="mobikwik">MobiKwik</label>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Net Banking Tab -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingNetBanking">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseNetBanking" aria-expanded="false"
                        aria-controls="flush-collapseNetBanking" style="box-shadow: none;">
                        Net Banking
                    </button>
                </h2>
                <div id="flush-collapseNetBanking" class="accordion-collapse collapse"
                    aria-labelledby="flush-headingNetBanking" data-bs-parent="#paymentAccordion">
                    <div class="accordion-body">
                        <h5 class=" mb-3" style="color: var(--secondary-color);">Select Your Bank</h5>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="bankOption" id="sbi" value="State Bank of India">
                            <label class="form-check-label" for="sbi">State Bank of India</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="bankOption" id="hdfc" value="HDFC Bank">
                            <label class="form-check-label" for="hdfc">HDFC Bank</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="bankOption" id="icici" value="ICICI Bank">
                            <label class="form-check-label" for="icici">ICICI Bank</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="bankOption" id="axis" value="Axis Bank">
                            <label class="form-check-label" for="axis">Axis Bank</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="bankOption" id="kotak" value="Kotak Mahindra Bank">
                            <label class="form-check-label" for="kotak">Kotak Mahindra Bank</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="bankOption" id="yesbank" value="Yes Bank">
                            <label class="form-check-label" for="yesbank">Yes Bank</label>
                        </div>
                    </div>  
                </div>

            </div>
        </div>


        <div class="mt-3" style="font-size: 14px;  font-weight: bold;">
            <span class="mx-2">Pay On Delivary Options</span>

            <div class="accordion-cash mt-2">
                <input class="form-check-input" type="radio"   value="COD">
                <label class="form-check-label" for="COD">Cash On Delivary (Cash/UPI)</label>
            </div>
        </div>


        <div class="price-details">
            <div class="title">PRICE DETAILS ({{ count($orderDetails) }} Items)</div>
            <div class="d-flex justify-content-between">
                <span>Total MRP</span>
                <span>Rs. {{$order->total_mrp}}</span>
            </div>
            <div class="d-flex justify-content-between">
                <span>Discount on MRP</span>
                <span class="text-success">Rs. {{$order->coupon_discount}}</span>
            </div>
            <div class="d-flex justify-content-between">
                <span>Platform Fee </span>
                <span class="text-success">Free</span>
            </div>
            <div class="d-flex justify-content-between">
                <span>Shipping Fee </span>
                <span class="text-success">
                    @if($order->shipping_cost == 0)
                        Free
                    @else
                        Rs. {{$order->shipping_cost}}
                    @endif
                </span>
            </div>
            <div class="d-flex justify-content-between">
                <span>Total Amount</span>
                <span>Rs. {{$order->grand_total}}</span>
            </div>
            <!--<ul>-->
            <!--    @foreach($orderDetails as $item)-->
            <!--        <li>Product ID: {{ $item->product_id }} | Quantity: {{ $item->quantity }}</li>-->
            <!--    @endforeach-->
            <!--</ul>-->
            <div class="terms">
                By placing the order, you agree to Ohhbuddie's <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.
            </div>
        </div>
    
        <div class="footer">
            <div class="total">Rs. {{$order->grand_total}}</div>
            <button style="color:black">PAY ORDER</button>
          </div>
        </div>









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
            // Show/Hide UPI Input Box
            document.getElementById('enterUpiId').addEventListener('change', function() {
                const upiInput = document.getElementById('upiIdInput');
                if (this.checked) {
                    upiInput.classList.remove('d-none');
                }
            });

            document.getElementById('gpay').addEventListener('change', function() {
                document.getElementById('upiIdInput').classList.add('d-none');
            });

            document.getElementById('phonepe').addEventListener('change', function() {
                document.getElementById('upiIdInput').classList.add('d-none');
            });
        </script>
            <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KCL2HTR9" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
            <!-- End Google Tag Manager (noscript) -->
            
            <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=2681722928691492&ev=PageView&noscript=1"/></noscript>
        
</body>

</html>
