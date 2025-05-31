<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>OhhBuddie | Add to Cart</title>
    <link rel="icon" type="image/x-icon"
        href="https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Ohbuddielogo.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Meta Pixel Code -->

    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-KCL2HTR9');
    </script>
    <!-- End Google Tag Manager -->

    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '2681722928691492');
        fbq('track', 'PageView');
    </script>
    <script src="https://cdn.lgrckt-in.com/LogRocket.min.js" crossorigin="anonymous"></script>
    <script>
        window.LogRocket && window.LogRocket.init('a4hegy/ohh-buddie');
    </script>

    <style>
        @media screen and (min-width: 778px) {

            body {
                display: flex !important;
                justify-content: center !important;
                align-items: center !important;
                background: black !important;
            }

            .shopping-bag {
                width: 40% !important;
            }

            .navbar-fixed-top,
            .footer {
                left: 30% !important;
                right: 30% !important;
            }

            .modal.bottom-modal .modal-dialog {
                left: 32% !important;
            }

            .coupon i {
                right: 32% !important;
            }

        }
    </style>

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
            color: white;
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
            position: relative;
            /* Make this the reference for the checkbox */
        }

        .coupon {
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
            padding: 16px 0px 16px 0px;
        }

        .suggested-section h3 {
            font-size: 16px;
            color: white;
            padding-left: 13px;
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
            height: 197px;
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

        .bg-danger,
        .btn-danger,
        .text-danger {
            color: black !important;
            background-color: #efc475 !important;
            --bs-btn-border-color: none;
        }

        .bg-dangerr {
            /* --bs-bg-opacity: 1; */
            background-color: #efc475 !important;
        }

        .text-dangerr {
            /*background-color: #efc475 !important; */
            color: black !important;
        }
    </style>

    <style>
        .offers-section {
            padding: 15px;
            color: white;

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

        .card-text {
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
    <style>
        .custom-toast {
            width: 100%;
            padding: 0.5rem 2rem;
            font-size: 1.1rem;
            border-radius: 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            animation: slideDownFade 0.5s ease-out;
        }

        @keyframes slideDownFade {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
    <link rel="icon" type="image/x-icon"
        href="https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Ohbuddielogo.png">
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .navbar-fixed-top {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
            background: black;
            /*border-bottom: 1px solid #ddd;*/
        }

        .header {
            padding: 16px;
            font-size: 16px;
            font-weight: bold;
            color: white;
        }

        .card {
            border-radius: 8px;
            background: white;
            color: black;

        }

        .card img {
            border-radius: unset;
            height: 25vh;
        }

        .card-text {
            font-size: 13px;
        }

        .card-body {

            display: flex;
            padding: 5px 10px 10px 10px;
            flex-direction: column;
        }

        .price-wishlist {
            display: flex;

            justify-content: space-between;
        }

        .wishlist-icon {
            font-size: 1.2rem;
            color: gray;
            cursor: pointer;
        }

        .wishlist-icon.selected {
            color: #dc3545;
        }

        .rating {
            bottom: 215px;
            right: 10px;
            background-color: #04AA6D;
            color: white;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 14px;
        }

        .move {
            background-color: black;
            color: var(--primary-color);
            border: 1px solid #333;
            width: 100%;
        }

        .col-6 {
            width: 49%;
        }

        .form-control {
            border: var(--bs-border-width) solid black;
        }

        .size-selector {
            appearance: none;
            /* Hides the default arrow */
            -webkit-appearance: none;
            /* Safari fix */
            -moz-appearance: none;
            /* Firefox fix */
            background: url('https://cdn-icons-png.flaticon.com/16/32/32195.png') no-repeat right 10px center;
            background-size: 16px;
            padding-right: 30px;
            /* Ensures text doesn't overlap arrow */
            cursor: pointer;
        }
    </style>
    <style>
        .translate-middle {
            transform: translate(-50%, -42%) !important;
        }

        .badge {
            --bs-badge-padding-x: 0.45em;
            --bs-badge-padding-y: 0.25em;
            --bs-badge-font-size: 0.65em;

        }

        .form-check-input:checked {
            background-color: #08ADc5;
            border-color: #08ADc5;
        }
        
        ::placeholder {
          color: white  !important;
          opacity: 1; /* Firefox */
        }
        
        ::-ms-input-placeholder { /* Edge 12 -18 */
          color: white !important;
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
            {{-- <div>Step 1/3</div> --}}

        </div>

        <div id="toast-container" class="position-fixed w-100" style="z-index: 9999;top: 66px;"></div>


        <div class="tabs">
            <div class="tab active d-flex align-items-center justify-content-center py-2"
                onclick="switchTab('buy-it-now')">
                <span style="font-size: 12px;"> Buy It Now </span>
                <span id="buy-it-now-count"
                    style="color:black; font-size: 12px;  margin-left: 5px;">({{ $total_qty }})</span>
            </div>
            <div class="tab d-flex align-items-center justify-content-center  py-2" onclick="switchTab('try-it-now')">
                <span style="font-size: 12px;"> Try It Now </span>
                <span id="try-it-now-count" style="color:black;font-size: 12px; margin-left: 5px;">(0)</span>
            </div>
        </div>

        @if (count($cart_details) == 0)
        @else
            @if ($ad_cnt > 0)
                <div class="delivery-section d-flex justify-content-between align-items-center">
                    <div id="selected-address">
                        <p>Deliver to: <strong>{{ $address[0]->name }}, {{ $address[0]->pincode }}</strong></p>
                        <p style="font-size:12px;">{{ $address[0]->address_line_1 }}, {{ $address[0]->address_line_2 }},
                            {{ $address[0]->pincode }} </p>
                    </div>
                    <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#addressModal"
                        style="color:#08ADC5;">Change</a>
                </div>
            @else
                <div class="delivery-section d-flex justify-content-between align-items-center">

                    <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#addressModal"
                        style="color:#08ADC5;">Add Address</a>
                </div>
            @endif
        @endif

        <!--Modal For Change Adress Button -->

        <div class="modal fade bottom-modal" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content text-light" style="background-color:black;">
                    <div class="modal-header" style="border:none;">
                        <h5 class="modal-title" id="addressModalLabel">Select Delivery Address</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            style="background-color:#efc475; opacity: 1;"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-1">
                            <div class="input-group">
                                <!--<input type="text" class="form-control" id="pincode" placeholder="Enter Pincode">-->
                                <!--<button class="btn" style="background-color:#efc475;">Check</button>-->

                                <input type="number" id="pincode" class="form-control mr-2"
                                    placeholder="Enter Your Pin Code" style="width:60%;" oninput="enforceLength(this)"
                                    required>
                                <button class="btn" style="background-color: #efc475; color: black; width: 25%;"
                                    onclick="validatePincode()">Check</button>
                            </div>

                            <span id="error-message" class="p-2" style="color: red; display: none;">Enter Valid
                                Pincode</span>
                            <span id="success-message" class="p-2" style="color: green; display: none;">Valid
                                Pincode</span>
                        </div>
                        <div style="max-height: 275px; overflow-y: auto; scrollbar-width:none;">

                            <!-- Address 1 -->
                            @if ($address != 'NA')
                                @foreach ($address as $index => $addr)
                                    <div class="card mt-3"
                                        style="background-color: black; color:white; border: 1px solid white;">

                                        <div class="card-body d-flex align-items-start">

                                            <div class="d-flex w-100 justify-content-between">
                                                <!-- Radio Button -->
                                                <div class="form-check me-3">
                                                    <input class="form-check-input address-radio" type="radio"
                                                        name="address" id="address{{ $index }}"
                                                        data-name="{{ $addr->name }}" data-id="{{ $addr->id }}"
                                                        data-pincode="{{ $addr->pincode }}"
                                                        data-address1="{{ $addr->address_line_1 }}"
                                                        data-address2="{{ $addr->address_line_2 }}"
                                                        {{ $loop->first ? 'checked' : '' }}
                                                        onchange="updateSelectedAddress(this)">
                                                </div>



                                                <!-- Three-Dot Menu -->
                                                <div class="dropdown-container">
                                                    <button type="button" class="dropdown-toggle"
                                                        onclick="toggleDropdown(event, this)">⋮</button>
                                                    <div class="dropdown-menu"
                                                        style="display: none; background: black;">
                                                        <a href="{{ route('addresses.edit', $addr->id) }}"
                                                            class="dropdown-item edit">EDIT</a>
                                                        <!--<button class="dropdown-item edit">Edit</button>-->
                                                        <!--<button class="dropdown-item delete">-->
                                                        <form action="{{ route('addresses.destroy', $addr->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="dropdown-item delete">DELETE</button>
                                                        </form>
                                                        <!--Delete</button>-->
                                                        <button class="dropdown-item default"
                                                            onclick="makeDefault('address{{ $index }}')">Make
                                                            Default</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Address Details -->
                                            <div style="width: 100%;">
                                                <div class="card-title d-flex justify-content-between"
                                                    style="font-size:12px;">
                                                    {{ $addr->name }}
                                                    @if ($addr->is_default == 1)
                                                        (Default)
                                                    @endif

                                                    <span class="btn btn-outline-light btn-sm"
                                                        style="font-size:10px; width: 70px; margin-right: 28px;">
                                                        @if ($addr->type == 'work')
                                                            <i class="fa fa-briefcase"></i>
                                                        @else
                                                            <i class="fa fa-home"></i>
                                                        @endif
                                                        {{ $addr->type }}
                                                    </span>
                                                </div>
                                                <p class="card-text">
                                                    {{ $addr->address_line_1 }}<br>
                                                    {{ $addr->address_line_2 }} - {{ $addr->pincode }}<br>
                                                    Mobile: {{ $addr->phone }}
                                                </p>
                                                <div class="d-flex justify-content-between">
                                                    <!-- Delivering Here Button -->
                                                    <button class="btn btn-sm delivering-here-btn"
                                                        style="display: {{ $loop->first ? 'inline-block' : 'none' }}; background-color:#efc475;">
                                                        Deliver Here
                                                    </button>
                                                </div>



                                            </div>



                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>

                        <!--Add More Address Button -->
                        <div class="modal-footer row pb-0" style="border-top:0px;">
                            <a href="/address" type="button" class="btn" style="background-color:#efc475;">Add
                                New Address</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="buy-it-now" class="cart-items active">

            @if (count($cart_details) == 0)
                <img src="https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Blank%20Pages/Empty.jpg"
                    style="object-fit:fill; width:100%; height:88vh;">
            @else
                @foreach ($cart_details as $dat)
                    @php
                        $brnd_cnt = DB::table('brands')->where('id', $dat['brand_id'])->count();
                        if ($brnd_cnt > 0) {
                            $brnd_name = DB::table('brands')->where('id', $dat['brand_id'])->latest()->first();
                        }

                    @endphp
                    @php
                        // Get the product
                        $same_p = DB::table('products')->where('id', $dat['pid'])->first();

                        // Initialize variables
                        $sub = '';
                        $brnd_name11 = '';

                        if ($same_p) {
                            // Get seller (common in both cases)
                            $seller_id = DB::table('sellers')
                                ->where('seller_id', $same_p->seller_id)
                                ->latest()
                                ->first();

                            if ($same_p->category_id == 88) {
                                // Get subcategory
                                $cat_id = DB::table('categories')
                                    ->where('id', $same_p->subcategory_id)
                                    ->latest()
                                    ->first();
                                $sub = $cat_id ? $cat_id->subcategory : '';
                            } else {
                                // Get sub-subcategory
                                $cat_id = DB::table('categories')
                                    ->where('id', $same_p->sub_subcategory_id)
                                    ->latest()
                                    ->first();
                                $sub = $cat_id ? $cat_id->sub_subcategory : '';
                            }

                            // Get brand or fallback to seller company name
                            $brnd_cnt = DB::table('brands')->where('id', $same_p->brand_id)->count();
                            if ($brnd_cnt > 0) {
                                $brnd_name = DB::table('brands')->where('id', $same_p->brand_id)->latest()->first();
                                $brnd_name11 = $brnd_name ? $brnd_name->brand_name : '';
                            } else {
                                $brnd_name11 = $seller_id ? $seller_id->company_name : '';
                            }
                        }
                    @endphp



                    <div class="cart-item">
                        <a href="/product/{{ \Illuminate\Support\Str::slug($sub ?? '') }}/{{ \Illuminate\Support\Str::slug($brnd_name11 ?? '') }}/{{ \Illuminate\Support\Str::slug($same_p->product_name ?? '') }}/{{ $same_p->id }}/buy"
                            style="text-decoration: none;">

                            <div class="cart-item-img">
                                <img src="{{ $dat['image'] }}" alt="Product Image">
                                <!--<input class="form-check-input" type="checkbox" id="defaultAddress" style="position: absolute; left: 0;">-->
                                <input class="form-check-input product-checkbox" type="checkbox"
                                    data-cartid="{{ $dat['id'] }}" style="position: absolute; left: 4px;" checked>

                            </div>

                        </a>
                        <div class="item-details">

                            <div class="d-flex justify-content-between align-items-center">


                                <h4>
                                    @if ($brnd_cnt != 0)
                                        <span style="text-transform: uppercase;">{{ $brnd_name->brand_name }}</span> -
                                    @endif

                                    {{ strlen($dat['product_name']) <= 20 ? $dat['product_name'] : substr($dat['product_name'], 0, 20) . '...' }}
                                </h4>

                                <!-- Remove Button (Triggers Modal) -->
                                <button type="button" data-bs-toggle="modal"
                                    data-bs-target="#removeModal{{ $dat['id'] }}"
                                    style="background-color:transparent; border:none; color:white; text-decoration:underline; margin-bottom:5px;">
                                    Remove
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="removeModal{{ $dat['id'] }}" tabindex="-1"
                                    aria-labelledby="removeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content shadow-lg border-0 rounded-4">
                                            <div class="modal-header bg-dangerr text-white rounded-top">
                                                <h5 class="modal-title fw-bold" id="removeModalLabel">Confirm Removal
                                                </h5>
                                                <button type="button" class="btn-close btn-close-dark"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center py-4">
                                                <i class="fas fa-exclamation-circle text-dangerr fs-1 mb-3"></i>
                                                <p class="fs-5 text-muted">Are you sure you want to remove this
                                                    product?</p>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center border-0 pb-4">
                                                <!-- Add to Wishlist Button -->
                                                <!--<button type="button" class="btn btn-secondary px-4">Add to Wishlist</button>-->
                                                <!-- Add to Wishlist Button -->
                                                <button type="button" class="btn btn-secondary px-4"
                                                    onclick="addToWishlist('{{ $dat['temp_user_id'] }}', '{{ $dat['user_id'] }}', '{{ $dat['pid'] }}', '{{ $dat['id'] }}')">
                                                    Add to Wishlist
                                                </button>


                                                <!-- Remove Form (Submits on Click) -->
                                                <form action="{{ route('carts.destroy', $dat['id']) }}"
                                                    method="POST">
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
                                $pdtall = DB::table('products')
                                    ->select('category_id', 'sub_subcategory_id')
                                    ->where('id', $dat['pid'])
                                    ->latest()
                                    ->first();
                                $pdtqty = DB::table('products')
                                    ->select('stock_quantity')
                                    ->where('id', $dat['pid'])
                                    ->get();
                                $pdtsize = DB::table('products')
                                    ->select('size_name')
                                    ->where('product_id', $dat['idp'])
                                    ->distinct()
                                    ->get();
                            @endphp
                            <div class="d-flex">

                                @if ($pdtall->sub_subcategory_id != 40)
                                    <p
                                        style="border: 1px solid white; padding-left: 5px;  border-radius: 13px; margin-right: 10px;">
                                        Size:
                                        <select class="update-size" data-cartid="{{ $dat['id'] }}">
                                            <option value="{{ $dat['size'] }}" style="font-size:10px;">
                                                {{ $dat['size'] }}</option>
                                            @foreach ($pdtsize as $pdsz)
                                                <option value="{{ $pdsz->size_name }}" style="font-size:10px;">
                                                    {{ $pdsz->size_name }}</option>
                                            @endforeach
                                        </select>

                                    </p>
                                @endif
                                <p
                                    style="border: 1px solid white; padding-left: 5px; border-radius: 13px; margin-right: 10px;">
                                    Qty:
                                    <select class="update-quantity" data-cartid="{{ $dat['id'] }}"
                                        data-price="{{ $dat['cart_value'] }}">
                                        @foreach ($pdtqty as $pdqt)
                                            <option value="{{ $dat['quantity'] }}" style="font-size:10px;">
                                                {{ $dat['quantity'] }}</option>
                                            @for ($i = 1; $i <= $pdqt->stock_quantity; $i++)
                                                <option value="{{ $i }}" style="font-size:10px;"
                                                    {{ $i == $dat['quantity'] ? 'selected' : '' }}>
                                                    {{ $i }}
                                                </option>
                                            @endfor
                                        @endforeach
                                    </select>
                                </p>
                            </div>
                            <p class="price"><strike style="color:grey;">Rs. {{ $dat['mrp'] }}</strike> <span
                                    class="discount">Rs. {{ $dat['mrp'] - $dat['price'] }}</span></p>
                            <p>Discount: Rs. {{ $dat['discount'] }}</p>
                            <p class="d-flex">Total: Rs.<span class="price-value">{{ $dat['cart_value'] }}</span>
                            </p>


                        </div>
                        <!--<button class="remove-product" onclick="removeProduct(this)">×</button>-->

                    </div>
                @endforeach
            @endif
        </div>




        <div id="try-it-now" class="cart-items">
            <img src="https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Blank%20Pages/Try%20-%20Out%20Is%20Loading%20Soon%20(1).jpg"
                style="object-fit:fill; width:100%; height:88vh;">

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



        @if (count($cart_details) == 0)
            @php
                $final_price = 0;
            @endphp
        @else
            @if (!empty($may_like))
                <div class="suggested-section">
                    <h3>You May Also Like:</h3>

                    <div class="suggested-products">


                        <!----Started here-->

                        <div class="container" style="padding: 2px; margin-top: 0px;">

                            @if (!$wish_list)
                                <img src="https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Blank%20Pages/Whishlish%20is%20Empty.jpg"
                                    style="width: 100%; height: calc( 100vh - 60px); display: block; margin: 0px; border-radius: 8px;">
                            @endif

                            @if ($wish_list)
                                <div class="d-flex overflow-auto flex-nowrap"
                                    style="gap: 10px; padding: 10px; scrollbar-width: none;">
                                    @foreach ($wish_list as $wslt)
                                        @php
                                            $mrp = $wslt['mrp'];
                                            $sellingPrice = $wslt['price'];
                                            $discount =
                                                is_numeric($mrp) && is_numeric($sellingPrice) && $mrp > 0
                                                    ? round((($mrp - $sellingPrice) / $mrp) * 100)
                                                    : 0;
                                            $images = json_decode($wslt['images'], true);
                                            $size_data = DB::table('products')
                                                ->select('id', 'size_name')
                                                ->where('product_id', $wslt['pid'])
                                                ->latest()
                                                ->get();
                                        @endphp


                                        @php
                                            $brnd_cnt = DB::table('brands')->where('id', $wslt['brand_id'])->count();
                                            if ($brnd_cnt > 0) {
                                                $brnd_name = DB::table('brands')
                                                    ->where('id', $wslt['brand_id'])
                                                    ->latest()
                                                    ->first();
                                            }

                                        @endphp
                                        
                                        
                                        
                                        @php
                                            // Get the product
                                            $same_p1 = DB::table('products')->where('id', $wslt['id'])->first();
                    
                                            // Initialize variables
                                            $sub1 = '';
                                            $brnd_name12 = '';
                    
                                            if ($same_p1) {
                                                // Get seller (common in both cases)
                                                $seller_id = DB::table('sellers')
                                                    ->where('seller_id', $same_p1->seller_id)
                                                    ->latest()
                                                    ->first();
                    
                                                if ($same_p1->category_id == 88) {
                                                    // Get subcategory
                                                    $cat_id = DB::table('categories')
                                                        ->where('id', $same_p1->subcategory_id)
                                                        ->latest()
                                                        ->first();
                                                    $sub1 = $cat_id ? $cat_id->subcategory : '';
                                                } else {
                                                    // Get sub-subcategory
                                                    $cat_id = DB::table('categories')
                                                        ->where('id', $same_p1->sub_subcategory_id)
                                                        ->latest()
                                                        ->first();
                                                    $sub1 = $cat_id ? $cat_id->sub_subcategory : '';
                                                }
                    
                                                // Get brand or fallback to seller company name
                                                $brnd_cnt = DB::table('brands')->where('id', $same_p1->brand_id)->count();
                                                if ($brnd_cnt > 0) {
                                                    $brnd_name = DB::table('brands')->where('id', $same_p1->brand_id)->latest()->first();
                                                    $brnd_name12 = $brnd_name ? $brnd_name->brand_name : '';
                                                } else {
                                                    $brnd_name12 = $seller_id ? $seller_id->company_name : '';
                                                }
                                            }
                                        @endphp

                                        <div style="min-width: 165px;">
                                            <div class="card position-relative"
                                                style="border: none; background-color: #000; color: #fff; border: 1px solid white; border-radius: 8px;">

                                                @if (!empty($images) && isset($images[0]))
                                                <a href="/product/{{ \Illuminate\Support\Str::slug($sub1 ?? '') }}/{{ \Illuminate\Support\Str::slug($brnd_name12 ?? '') }}/{{ \Illuminate\Support\Str::slug($same_p1->product_name ?? '') }}/{{ $same_p1->id }}/buy" style="text-decoration: none;">
                                                  <img src="{{ $images[0] }}" class="card-img-top product-img"
                                                        alt="Image" style="height: 200px; object-fit: cover; border-top-left-radius: 8px; object-fit: fill; border-top-right-radius: 8px;">
                                                </a>
                                                @endif


                                                <div class="card-body p-2">
                                                    <h6 class="card-title m-0" title="{{ $wslt['name'] }}">
                                                        @if ($brnd_cnt != 0)
                                                            <span
                                                                style="text-transform: uppercase;"><b>{{ $brnd_name->brand_name }}</b></span>
                                                        @endif
                                                        <br>
                                                        {{ strlen($wslt['name']) <= 16 ? $wslt['name'] : substr($wslt['name'], 0, 16) . '...' }}
                                                    </h6>
                                                    <p class="card-text m-0" style="font-size: 13px;">
                                                        MRP Rs. <span
                                                            class="text-decoration-line-through">{{ $mrp }}</span>
                                                        Rs. {{ $sellingPrice }}<br>
                                                        <!--<span class="discount">{{ $discount }}% OFF</span>-->
                                                    </p>

                                                    @if ($wslt['sid'] != 40)
                                                        <select class="form-control size-selector mt-1"
                                                            id="size_{{ $wslt['id'] }}"
                                                            style="font-size: 12px; background-color:white; color: black;">
                                                            <option value="">Select Size</option>
                                                            @foreach ($size_data as $size)
                                                                <option value="{{ $size->size_name }}">
                                                                    {{ $size->size_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    @else
                                                    @endif

                                                    @if ($wslt['sid'] != 40)
                                                        <a class="btn btn-sm mt-2 move move addtobag w-100"
                                                            style="background-color: #efc475; color: black;"
                                                            onclick="addToCart({{ json_encode($wslt) }})">
                                                            Move to Cart
                                                        </a>
                                                    @else
                                                        <a class="btn btn-sm move move addtobag w-100"
                                                            style="background-color: #efc475; color: black; margin-top:44px; "
                                                            onclick="addToCart({{ json_encode($wslt) }})">
                                                            Move to Cart
                                                        </a>
                                                    @endif



                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>





                    </div>
                </div>

            @endif
            @php
                  
                $coupon_discount = session('coupon_discount') ?? 0;
                 
                if ($total_price >= 200 && $total_price <= 499) {
                    $shipping_fee = 49;
                } elseif ($total_price >= 500 && $total_price <= 749) {
                    $shipping_fee = 29;
                } else {
                    $shipping_fee = 0;
                }
            
                $final_price = max(0, $total_price + $shipping_fee - $coupon_discount);
            @endphp
                <!-- Coupon Section -->
                <div class="coupon-section px-3 py-2" style="background: black; border-top: 1px solid #333; border-bottom: 1px solid #333;">
                        <div class="d-flex align-items-center mb-2">
                            <div class="d-flex align-items-center" style="flex-grow: 1;">
                                <img src="https://w7.pngwing.com/pngs/62/407/png-transparent-coupon-computer-icons-discounts-and-allowances-voucher-clear-choice-cannabis-term-thumbnail.png" 
                                     alt="Coupon" style="width: 20px; height: 20px; margin-right: 10px;">
                                <h3 style="color: white; font-size: 14px;">Apply Coupon</h3>
                            </div>
                            <!--<i class="fas fa-chevron-down text-white" id="couponToggle" style="cursor: pointer;"></i>-->
                        </div>
                    
                   <div>
                        
                    @auth
                        <div class="input-group mb-2">
                            <input type="text" id="couponCode" class="form-control" 
                                   placeholder="Enter coupon code" 
                                   style="background: black; color: white; border: 1px solid #555;">
                            <button class="btn" style="background-color: #efc475; color: black;" 
                                    onclick="applyCoupon()">Apply</button>
                        </div>
                        
                        <div id="couponMessage" class="mb-2" style="font-size: 12px; min-height: 20px;"></div>
                 
                    @endauth
                    
                    @guest
                       <div class="input-group mb-2">
                            <input type="text" id="couponCode" class="form-control" 
                                   placeholder="Enter coupon code" 
                                   style="background: black; color: white; border: 1px solid #555;">
                            <button class="btn" style="background-color: #efc475; color: black;" 
                                    onclick="myFunction1()">Apply</button>
                        </div>
                        <!--<small style="color: #f88;">Please add ₹{{ 999 - $final_price }} more to apply a coupon.</small>-->
                        <p id="text1" style="color: #f88;"></p>               
                        
                        <script>
                            function myFunction1() {
                                document.getElementById('text1').innerHTML = 'Please <a href="/otp/login">Log In</a> to apply a coupon.';
                            }
                        </script>
                     @endguest
 
                 
            </div>
                
                @if(!empty($total_coupon))
                    <div id="appliedCoupon" class="d-flex justify-content-between align-items-center p-2"  style="background: #1a1a1a; border-radius: 4px; display:none;">
                        <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                <span id="appliedCouponCode" style="color: white; font-size: 13px;"></span>
                        </div>
                        <button class="btn btn-sm" style="background: transparent; color: #efc475; border: 1px solid #efc475;" onclick="removeCoupon()">Remove</button>
                    </div>
                @endif
                
            </div>
            
            <div class="price-details  text-light">
                <div class="title">PRICE DETAILS ({{ $total_qty }} Items)</div>
                <div class="d-flex justify-content-between" style="font-size: 13px;">
                    <span>Total MRP</span>
                    <span>Rs. {{ $total_mrp }}</span>
                </div>
                <div class="d-flex justify-content-between" style="font-size: 13px;">
                    <span>Discount on MRP</span>
                    <span class="text-success"> Rs. {{ $total_discount + $total_coupon }}</span>
                </div>



                <div class="d-flex justify-content-between" style="font-size: 13px;">
             
                    
                    <span>Shipping Fee</span>
                    <span class="text-success">
                        @if ($shipping_fee === 0)
                            Free
                        @else
                            Rs. {{ $shipping_fee }}
                        @endif
                    </span>
                </div>

                @php
                    if ($total_price >= 200 && $total_price <= 499) {
                        $final_price1 = $total_price + 49;
                    } elseif ($total_price >= 500 && $total_price <= 749) {
                        $final_price1 = $total_price + 29;
                    } else {
                        $final_price1 = $total_price; // No need to add 0 explicitly
                    }
                    
                    $final_price = $final_price1 - $total_coupon;
                @endphp
                
                <div class="d-flex justify-content-between" style="font-size: 13px;">
                    <span>Coupon Discount</span>
                    <span class="text-success">Rs. <span id="coupon-discount-value">{{$total_coupon}}</span></span>
                </div>

                <div class="d-flex justify-content-between" style="font-size: 13px;">
                    <span>Total Amount</span>
                    <span>Rs.<span class="price-value">{{ $final_price}}</span></span>
                </div>
                @if ($total_price < 750)
                    <div class="terms" style="text-align: center;">
                        Add More <a href="#">Rs. {{ 750 - $total_price }}</a> For <a href="#">Free
                            Delivery</a>.
                    </div>
                @endif


                <div class="terms" style="text-align: center;">
                    By placing the order, you agree to Ohbuddie's <a href="/terms-and-condition">Terms of Use</a> and
                    <a href="/privacy-policy">Privacy Policy</a>.
                </div>
            </div>



            <div class="footer">
                <div class="total">
                    @php
                        $display_total = $final_price;
                    @endphp
            <div class="total">{{ $total_qty }} Items Selected (Rs. {{ $display_total - $total_coupon }})</div></div>

                <!--<button><a href="/payment" style="color:black; text-decoration:none">Place Order</a></button>-->
                <!--{{-- <button id="placeOrderBtn" style="color:black; text-decoration:none">Place Order</button> --}}-->

                <form id="checkoutForm" action="{{ route('checkout.store') }}" method="POST">
                    @csrf

                    <input type="hidden" name="address_id" id="address_id">
                    <input type="hidden" name="products" id="products">
                    <input type="hidden" name="total_mrp" value="{{ $total_mrp }}">
                    <input type="hidden" name="total_price" value="{{ $total_price }}">
                    <input type="hidden" name="total_discount" value="{{ $total_discount }}">
                    <input type="hidden" name="total_payable" value="{{ $final_price }}">
                    <input type="hidden" name="coupon_discount" value="{{ $total_discount + $total_coupon}}">

                    <button type="submit" id="placeOrderBtn" style="color:black; text-decoration:none">Place
                        Order</button>
                </form>


            </div>
        @endif
    </div>
    <input type="hidden" id="aid">



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Toggle wishlist icon color
        function toggleWishlist(icon) {
            icon.classList.toggle('selected');
        }
    </script>

    <script>
        let originalFinalPrice = {{ $final_price }};
        let discountApplied = {{ $cart_details[0]['coupon_applied'] ?? 1 ? 'true' : 'false' }};
        let appliedCouponCode = "{{ $cart_details[0]['coupon_code'] ?? '' }}";
        
        // Initialize UI based on current coupon state
        document.addEventListener('DOMContentLoaded', function() {
            if (discountApplied) {
                const discountAmount = {{ $cart_details[0]['coupon_discount'] ?? 0 }};
                document.getElementById('appliedCouponCode').textContent = 
                    `${appliedCouponCode} - ₹${discountAmount} OFF`;
                document.getElementById('appliedCoupon').style.display = 'flex';
                document.getElementById('couponForm').style.display = 'none';
                document.getElementById('couponToggle').classList.remove('fa-chevron-up');
                document.getElementById('couponToggle').classList.add('fa-chevron-down');
            }
        });
        
        // Toggle coupon form visibility
        document.getElementById('couponToggle').addEventListener('click', function() {
            const form = document.getElementById('couponForm');
            const icon = this;
            if (form.style.display === 'none') {
                form.style.display = 'block';
                icon.classList.remove('fa-chevron-down');
                icon.classList.add('fa-chevron-up');
            } else {
                form.style.display = 'none';
                icon.classList.remove('fa-chevron-up');
                icon.classList.add('fa-chevron-down');
            }
        });
        
       function applyCoupon() {
        const couponCode = document.getElementById('couponCode').value.trim().toUpperCase();
        const messageEl = document.getElementById('couponMessage');
        const cartId = "{{ $cart_details[0]['id'] ?? '' }}";
        const tempUserId = localStorage.getItem('temp_user_id') || getCookie('temp_user_id');
        const userId = "{{ Auth::check() ? Auth::id() : 0 }}";

        // Clear previous messages
        messageEl.textContent = '';
        messageEl.style.display = 'block';

        if (!couponCode) {
            showMessage("Please enter a coupon code", "error");
            return;
        }

        $.ajax({
            url: "{{ route('apply.coupon') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                coupon_code: couponCode,
                cart_id: cartId,
                temp_user_id: tempUserId,
                user_id: userId
            },
            success: function(response) {
                if (response.success) {
                    const discountAmount = parseFloat(response.discount);
                    const priceDisplay = document.querySelector(".price-value");
                    const couponDiscountEl = document.getElementById("coupon-discount-value");
                    const appliedCouponSection = document.getElementById("appliedCoupon");
                    const appliedCouponCodeEl = document.getElementById("appliedCouponCode");

                    if (priceDisplay) {
                        const currentPrice = parseFloat(priceDisplay.textContent);
                        const discountedPrice = currentPrice - discountAmount;

                        // Update prices
                        priceDisplay.textContent = discountedPrice.toFixed(2);
                        document.querySelector("input[name='total_payable']").value = discountedPrice.toFixed(2);
                    }

                    if (couponDiscountEl) {
                        couponDiscountEl.textContent = discountAmount.toFixed(2);
                    }

                    // Update UI
                    showMessage(`Coupon applied! ₹${discountAmount} discount`, "success");

                    if (appliedCouponCodeEl) {
                        appliedCouponCodeEl.textContent = `${couponCode} - ₹${discountAmount} OFF`;
                    }

                    if (appliedCouponSection) {
                        appliedCouponSection.style.display = "flex";
                    }

                    // Hide form
                    const couponForm = document.getElementById('couponForm');
                    if (couponForm) couponForm.style.display = 'none';

                    const couponToggle = document.getElementById('couponToggle');
                    if (couponToggle) {
                        couponToggle.classList.remove('fa-chevron-up');
                        couponToggle.classList.add('fa-chevron-down');
                    }

                    // Update state (optional)
                    discountApplied = true;
                    appliedCouponCode = couponCode;

                    // Reload after short delay to show message
                    
                      window.location.reload();
                
                    
                    
                } else {
                    showMessage(response.message, "error");
                }
            },
                    error: function(xhr) {
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            showMessage(xhr.responseJSON.message, "error");
                        } else {
                            showMessage("An error occurred. Please try again.", "error");
                        }
                    }
                });
            }
        
            function removeCoupon() {
                const cartId = "{{ $cart_details[0]['id'] ?? '' }}";
                const tempUserId = localStorage.getItem('temp_user_id') || getCookie('temp_user_id');
                const userId = "{{ Auth::check() ? Auth::id() : 0 }}";
            
                $.ajax({
                    url: "{{ route('remove.coupon') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        cart_id: cartId,
                        temp_user_id: tempUserId,
                        user_id: userId
                    },
                    success: function(response) {
                        if (response.success) {
                            const priceDisplay = document.querySelector(".price-value");
                            const couponDiscountEl = document.getElementById("coupon-discount-value");
                            const appliedCouponSection = document.getElementById("appliedCoupon");
                            const messageEl = document.getElementById('couponMessage');
            
                            // Reset prices
                            priceDisplay.textContent = originalFinalPrice.toFixed(2);
                            couponDiscountEl.textContent = 0;
                            document.querySelector("input[name='total_payable']").value = originalFinalPrice.toFixed(2);
                            
                            // Update UI
                            showMessage("Coupon removed", "info");
                            appliedCouponSection.style.display = "none";
                            
                            // Clear any previous messages after 2 seconds
                            setTimeout(() => {
                                messageEl.textContent = '';
                                messageEl.style.display = 'none';
                            }, 2000);
                            
                            // Reset state
                            discountApplied = false;
                            appliedCouponCode = null;
                            location.reload();
                        } else {
                            showMessage(response.message, "error");
                        }
                    },
                    error: function(xhr) {
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            showMessage(xhr.responseJSON.message, "error");
                        } else {
                            showMessage("An error occurred. Please try again.", "error");
                        }
                    }
                });
            }
            
        function showMessage(message, type) {
            const messageEl = document.getElementById('couponMessage');
            messageEl.textContent = message;
            messageEl.style.color = 
                type === 'error' ? '#ff6b6b' : 
                type === 'success' ? '#51cf66' : 
                '#fcc419';
            messageEl.style.display = 'block';
        }
        
    </script>

    <script>
        function goBackAndRefresh() {
            window.location.href = '/addtocart';
            setTimeout(function() {
                location.reload();
            }, 500); // Reloads after going back
        }
    </script>
    
    <script>
        let originalFinalPrice = {{ $final_price }};
        let discountApplied = false;
        let appliedCouponCode = null;
        
        function toggleCouponList() {
            const list = document.getElementById("couponList");
            list.style.display = list.style.display === "none" ? "block" : "none";
        }
        
        function applyCoupon(code) {
            const messageEl = document.getElementById("coupon-message");
            const priceDisplay = document.querySelector(".price-value");
            const couponDiscountEl = document.getElementById("coupon-discount-value");
        
            if (!discountApplied) {
                if (originalFinalPrice <= 200) {
                    messageEl.textContent = "Coupon can only be applied if total is above ₹200.";
                    messageEl.style.color = "red";
                    return;
                }
        
                const discountedPrice = originalFinalPrice - 200;
                priceDisplay.textContent = discountedPrice;
                couponDiscountEl.textContent = 200;
                document.querySelector("input[name='total_payable']").value = discountedPrice;
        
                messageEl.textContent = `Coupon ${code} applied successfully! ₹200 off.`;
                messageEl.style.color = "green";
                discountApplied = true;
                appliedCouponCode = code;
        
                updateCouponButtons();
            }
        }
        
        function removeCoupon() {
            const messageEl = document.getElementById("coupon-message");
            const priceDisplay = document.querySelector(".price-value");
            const couponDiscountEl = document.getElementById("coupon-discount-value");
        
            priceDisplay.textContent = originalFinalPrice;
            couponDiscountEl.textContent = 0;
            document.querySelector("input[name='total_payable']").value = originalFinalPrice;
        
            messageEl.textContent = "Coupon removed.";
            messageEl.style.color = "orange";
            discountApplied = false;
            appliedCouponCode = null;
        
            updateCouponButtons();
        }
        
        function updateCouponButtons() {
            document.querySelectorAll("#couponList button").forEach((btn) => {
                const code = btn.getAttribute("data-code");
        
                if (discountApplied && code === appliedCouponCode) {
                    btn.textContent = "Remove";
                    btn.classList.remove("btn-warning");
                    btn.classList.add("btn-danger");
                    btn.setAttribute("onclick", "removeCoupon()");
                } else {
                    btn.textContent = "Apply";
                    btn.classList.remove("btn-danger");
                    btn.classList.add("btn-warning");
                    btn.setAttribute("onclick", `applyCoupon('${code}')`);
                }
            });
        }
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let tempUserId = localStorage.getItem("temp_user_id") || getCookie("temp_user_id");

            if (!tempUserId) {
                tempUserId = "temp_" + new Date().getTime();
                localStorage.setItem("temp_user_id", tempUserId);
                document.cookie = `temp_user_id=${tempUserId}; path=/;`;
            }
        });

        function addToCart(product) {
            let sizeDropdown = document.getElementById("size_" + product.id);

            let selectedSize = sizeDropdown ? sizeDropdown.value : null;
            if (!selectedSize && product.sid != 40) {

                showToast("Please select a size", "success");
                return;
            }

            let tempUserId = localStorage.getItem("temp_user_id") || getCookie("temp_user_id");
            let userId = "{{ Auth::check() ? Auth::user()->id : 0 }}";
            let token = "{{ csrf_token() }}";

            $.ajax({
                url: "{{ route('cart.store') }}",
                type: "POST",
                data: {
                    _token: token,
                    user_id: userId > 0 ? userId : 0,
                    temp_user_id: tempUserId,
                    product_id: product.pid,
                    price: product.price,
                    gst_rate: product.gst_rate,
                    size_name: selectedSize,
                    color_name: product.color_name,
                    mrp: product.mrp,
                    quantity: 1,
                    newid: product.id,
                },
                success: function(response) {
                    showToast("Product added to cart successfully!", "success");
                    window.location.reload();
                    localStorage.setItem("temp_user_id", response.temp_user_id);
                    document.cookie = `temp_user_id=${response.temp_user_id}; path=/;`;
                    onAddToCartSuccess();

                },
                error: function(xhr) {
                    console.log(xhr.responseText);

                    showToast("Something went wrong! Please try again.", "success");
                }
            });
        }

        // Function to get cookie value
        function getCookie(name) {
            let matches = document.cookie.match(new RegExp(
                "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
            ));
            return matches ? decodeURIComponent(matches[1]) : undefined;
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let tempUserId = localStorage.getItem("temp_user_id") || getCookie("temp_user_id");

            if (!tempUserId) {
                tempUserId = "temp_" + new Date().getTime();
                localStorage.setItem("temp_user_id", tempUserId);
                document.cookie = `temp_user_id=${tempUserId}; path=/;`;
            }

            updateCartCount(tempUserId);

            // Poll server every 5 seconds for real-time updates
            setInterval(() => {
                updateCartCount(tempUserId);
            }, 5000);
        });

        // Function to fetch cart count
        function updateCartCount(tempUserId) {
            fetch(`/cart/count?temp_user_id=${tempUserId}`)
                .then(response => response.json())
                .then(data => {
                    let cartCountElement = document.querySelector(".bag-count");
                    if (cartCountElement) {
                        cartCountElement.textContent = data.count;
                    }
                });
        }

        // Function to get cookie value
        function getCookie(name) {
            let matches = document.cookie.match(new RegExp(
                "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
            ));
            return matches ? decodeURIComponent(matches[1]) : undefined;
        }

        // Function to call after adding to cart
        function onAddToCartSuccess() {
            let tempUserId = localStorage.getItem("temp_user_id") || getCookie("temp_user_id");
            updateCartCount(tempUserId); // Update immediately after adding an item
        }
    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function showToast(message, type = 'primary') {
            const toastContainer = document.getElementById('toast-container');

            const toast = document.createElement('div');
            toast.className = `toast custom-toast bg-${type} text-white border-0`;
            toast.setAttribute('role', 'alert');
            toast.setAttribute('aria-live', 'assertive');
            toast.setAttribute('aria-atomic', 'true');

            toast.innerHTML = `
                <div class="toast-body w-100 d-flex justify-content-between align-items-center">
                    ${message}
                    <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            `;

            toastContainer.appendChild(toast);

            // Initialize Toast
            const bsToast = new bootstrap.Toast(toast, {
                delay: 3000, // Show for 3 seconds
                autohide: true
            });

            bsToast.show();

            // Remove from DOM after hidden
            toast.addEventListener('hidden.bs.toast', () => {
                toast.remove();
            });
        }
    </script>

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


        document.getElementById("checkoutForm").addEventListener("submit", function(e) {
            const selectedAddress = document.getElementById("aid").value;

            if (!selectedAddress) {
                e.preventDefault();
                // alert("Please select an address.");
                showToast("Please select an address.", "danger");
                return;
            }

            document.getElementById("address_id").value = selectedAddress;

            let products = {};
            document.querySelectorAll(".update-quantity").forEach(function(input) {
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
        document.addEventListener("DOMContentLoaded", function() {
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
                radioButton.addEventListener('change', function() {
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
    <!--<script src="https://kit.fontawesome.com/YOUR_KIT_CODE.js" crossorigin="anonymous">
        < /script-->

    
    </script>
    <script>
        $(document).ready(function() {
            $(".update-size").on("change", function() {
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
                    success: function(response) {
                        // alert(response.message);
                        showToast(response.message, "danger");
                    },
                    error: function(xhr) {
                        // alert("Error updating size. Please try again.");
                        showToast("Error updating size. Please try again.", "danger");
                    }
                });
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $(".update-quantity").on("change", function() {
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
                    success: function(response) {

                        window.location.reload();
                        if (response.updated_price) {
                            // Find the closest cart item and update the price
                            element.closest(".cart-item").find(".price-value").text(response
                                .updated_price);
                        }


                    },
                    error: function() {
                        // alert("Error updating quantity. Please try again.");
                        showToast("Error updating quantity. Please try again.", "danger");
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
               success: function(response) {
                   if (response.success) {
                       window.location.href = response.redirect; // Redirect to wishlist page
                   }
               },
               error: function(xhr, status, error) {
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
             url: "{{ route('check.pincode') }}", // Laravel route to check pincode
             type: "GET",
             data: {
                 pincode: pincode
             },
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
    @if (session('toast_message'))
<script>
    window.addEventListener('DOMContentLoaded', function() {
        showToast(
            @json(session('toast_message')),
            @json(session('toast_type') ?? 'success')
        );
    });
</script>
@endif

<!--CheckBOX -->

    <script>
        function updateCheckoutData() {
            let selectedProducts = [];
            let totalPrice = 0;
            let totalMrp = 0;
            let totalDiscount = 0;
            let totalQty = 0;
            let coupontotal = @json($total_coupon);

            $('.product-checkbox:checked').each(function() {
                let cartId = $(this).data('cartid');
                let productElement = $(this).closest('.cart-item');

                let quantity = parseInt(productElement.find('.update-quantity').val());
                let price = parseFloat(productElement.find('.update-quantity').data('price'));
                let mrp = parseFloat(productElement.find('strike').text().replace('Rs.', '').trim());
                let discount = parseFloat(productElement.find('.discount').text().replace('Rs.', '').trim());

                totalQty += quantity;
                totalPrice += (price * quantity);
                totalMrp += (mrp * quantity);
                totalDiscount += (discount * quantity);

                selectedProducts[cartId] = quantity;
            });

            // Handle shipping and final price calculation
            let shippingFee = 0;
            let shippingText = "Free";

            if (totalPrice >= 200 && totalPrice <= 499) {
                shippingFee = 49;
                shippingText = "Rs. 49";
            } else if (totalPrice >= 500 && totalPrice <= 749) {
                shippingFee = 29;
                shippingText = "Rs. 29";
            }

            let finalPayable = (totalPrice + shippingFee) - coupontotal;

            // Update form hidden inputs
            $('#products').val(JSON.stringify(selectedProducts));
            $('input[name="total_mrp"]').val(totalMrp);
            $('input[name="total_price"]').val(totalPrice);
            $('input[name="total_discount"]').val(totalDiscount);
            $('input[name="total_payable"]').val(finalPayable);

            // Update UI display for all price details
            $('.total').text(`${totalQty} Items Selected (Rs. ${totalPrice - coupontotal})`);

            // Update the price details section
            $('.price-details .d-flex:nth-child(2) span:last-child').text(`Rs. ${totalMrp}`);
            $('.price-details .d-flex:nth-child(3) span:last-child').text(`Rs. ${totalDiscount}`);
            $('.price-details .d-flex:nth-child(4) span:last-child').text(shippingText);
            $('.price-details .price-value').text(finalPayable);

            // Update the "Add More for Free Delivery" message
            if (totalPrice < 750) {
                let amountNeeded = 750 - totalPrice;
                $('.terms:first').html(`Add More <a href="#">Rs. ${amountNeeded}</a> For <a href="#">Free Delivery</a>.`)
                    .show();
            } else {
                $('.terms:first').hide();
            }
        }

        // Trigger on checkbox, quantity, or size change
        $(document).on('change', '.product-checkbox, .update-quantity, .update-size', function() {
            updateCheckoutData();
        });

        // Trigger once on page load too
        $(document).ready(function() {
            updateCheckoutData();
        });
    </script>

    @if (Auth::check())
        <script src="https://cdn.logrocket.io/LogRocket.min.js"></script>
        <script>
            LogRocket.init('a4hegy/ohh-buddie'); // Replace this with your actual LogRocket ID

            LogRocket.identify("{{ Auth::user()->id }}", {
                name: "{{ Auth::user()->name }}",
                email: "{{ Auth::user()->email }}",
                phone: "{{ Auth::user()->phone }}"
            });
        </script>
    @endif
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KCL2HTR9" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=2681722928691492&ev=PageView&noscript=1" /></noscript>
</body>

</html>
