<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OhhBuddie | Address</title>
    <link rel="icon" type="image/x-icon" href="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Ohbuddielogo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}"> 
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: black;
            color: white;
            padding-top: 60px; /* For navbar height */
            padding-bottom: 80px; /* For button height */
            margin: 0;
        }

        .navbar-fixed-top {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
            background-color: black;
            height: 60px;
            display: flex;
            align-items: center;
            padding: 0 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
        }

        .navbar-fixed-top .header {
            font-size: 18px;
            font-weight: bold;
           
            margin-left: 15px;
        }

        .container {
           
            background: black;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .section-title {
            font-size: 16px;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .form-control {
            /*color: #f5f5f5;*/
            border: none;
            border-radius: 8px;
            font-size: 14px;
            padding: 12px;
        }

        .form-control:focus {
            outline: none;
            border: 2px solid var(--primary-color);
            box-shadow: none;
            background-color: black;
            color: white;
        }

        .form-check-label {
            font-size: 14px;
            color: #f5f5f5;
        }

        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .divider {
            border-top: 1px solid #444;
            margin: 20px 0;
        }

        .btn-fixed-bottom {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 1030;
            /*padding: 16px;*/
            text-align: center;
            
        }

        .btn-primary {
            background-color: var(--primary-color);
            border: none;
            font-size: 16px;
            font-weight: bold;
            /*border-radius: 30px;*/
            color:black;
        }


        /* Extra Spacing for Mobile View */
        @media (max-width: 576px) {
            .form-control {
                font-size: 16px;
                padding: 14px;
            }

            .container {
                padding: 15px;
            }

            .btn-primary {
                font-size: 18px;
                padding: 14px;
            }
             .styled-label {
                    font-size: 14px;
                    padding: 10px;
                }
            
                .styled-label i {
                    font-size: 16px;
                }
        }
        
        
        
        
        /* Save Address As Section */
            .save-address-section .form-check {
                text-align: center;
            }
            
            .styled-radio {
                display: none;
            }
            
            .styled-label {
                display: inline-block;
                cursor: pointer;
                font-size: 16px;
                padding: 12px 16px;
                border: 2px solid white;
                border-radius: 30px;
                transition: all 0.3s ease;
            }
            
            .styled-radio:checked + .styled-label {
                background-color: var(--primary-color);
                color: #000;
                border: 2px solid var(--primary-color);
                box-shadow: 0 4px 8px rgba(239, 196, 117, 0.3);
            }
            
            /* Icons */
            .styled-label i {
                margin-right: 8px;
                font-size: 18px;
            }
            
            /* Default Address Section */
            .default-address-section {
                margin-top: 20px;
            }
            
            .styled-checkbox {
                display: none;
            }
            
            .styled-checkbox + .styled-label {
                font-size: 16px;
                color: var(--primary-color);
                display: flex;
                align-items: center;
                padding: 10px 16px;
                border: 2px solid var(--primary-color);
                border-radius: 30px;
                cursor: pointer;
                transition: all 0.3s ease;
            }
            
            .styled-checkbox:checked + .styled-label {
                background-color: var(--primary-color);
                color: #000;
                box-shadow: 0 4px 8px rgba(239, 196, 117, 0.3);
            }
            
            /* Icons for Checkbox */
            .styled-checkbox + .styled-label i {
                margin-right: 10px;
                font-size: 18px;
            }
            
        
        /*Add Address Button Styles */
        #addAddressBtn {
            background-color: var(--primary-color);
            border: none;
            font-size: 16px;
            font-weight: bold;
            border-radius: unset;
            color: Black;
            transition: all 0.3s ease;
        }
        
        /* Active (Pressed) Effect */
        #addAddressBtn:active {
            background-color: #c79233;
            box-shadow: none;
            Color:white;
        }

    </style>
    <style>
    .mobile-input-wrapper {
        display: flex;
        align-items: center;
        padding: 5px;
    }

    .country-code {
        display: flex;
        align-items: center;
        padding: 5px;
        background-color: white;
        color: black;
    }
    
    .flag-icon {
        width: 20px;
        height: 14px;
        margin-right: 5px;
    }
    
    .mobile-input-wrapper input[type="text"] {
        flex: 1;
        border: none;
        padding: 5px;
        outline: none;
    }

    </style>
    <style>
        
    /* Compact and responsive dropdown */
    .dropdown-custom {
        width: 100%; /* Ensure full width */
        
        font-size: 14px; /* Improve readability */
       
        border-radius: 5px; /* Slightly rounded corners */
    }
    
    /* Prevent dropdown from going outside the screen */
    .dropdown-custom:focus {
        overflow: auto;
    }
    
    /* Ensure dropdown stays within the viewport */
    .dropdown-menu {
        max-height: 200px; /* Set max height */
        overflow-y: auto; /* Enable scrolling */
    }
    
    /* Fix layout on small screens */
    @media (max-width: 576px) {
        .dropdown-custom {
            font-size: 13px;
            
        }
    }

    </style>
</head>
<body>

    <!-- Top Navbar -->
    <div class="navbar-fixed-top">
        <a href="javascript:history.back();" style="font-size: 20px; color:white;">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div class="header">ADD NEW ADDRESS</div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <!-- Contact Details -->
        <div>
            <h5 class="section-title">Contact Details</h5>
            <form action="/address/store" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                     <input type="hidden" class="form-control" id="name" name="user_id" value="{{ Auth::user()->id }}" required>
                </div>
                <!--<div class="mb-3">-->
                <!--    <input type="tel" class="form-control" id="mobile" placeholder="Enter your mobile number" required>-->
                <!--</div>-->
                
            <div class="mobile-input-wrapper form-control" style="width:100%">
                <span class="country-code">
                    <img src="https://upload.wikimedia.org/wikipedia/en/4/41/Flag_of_India.svg" alt="India Flag" class="flag-icon">
                    +91
                </span>
                <input type="tel" id="mobile" class="form-control" placeholder="Enter Mobile Number" name="phone" style=" padding: 9px;">
            </div>
                <span id="error-message" style="color: red; display: none;">Please enter a valid 10-digit mobile number starting with 6, 7, 8, or 9.</span>
                
       
        </div>

        <div class="divider"></div>

        <!-- Address -->
        <div>
            <h5 class="section-title">Address</h5>
          
                <div class="mb-3">
                    <input type="text" class="form-control" id="address" name="address_line_1" placeholder="Enter Address Line 1" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="address" name="address_line_2" placeholder="Enter Address Line 2" >
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="locality" name="locality" placeholder="Enter Your Locality" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="pincode" maxlength="6" name="pincode" placeholder="Enter Your Pincode" required>
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                        <!--<input type="text" class="form-control" id="district" placeholder="City" >-->
                    
                        <select class="form-control dropdown-custom" name="city">
                            <option value="" selected disabled>--Select City--</option>
                            @foreach($city as $ct)
                                <option value="{{$ct->id}}">{{$ct->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6 mb-3">
                        <!--<input type="text" class="form-control" id="district" placeholder="City" >-->
                        
                        <select class="form-control dropdown-custom" name="state">
                            <option value="" selected disabled>--Select State--</option>
                            @foreach($state as $st)
                                <option value="{{$st->id}}">{{$st->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
          
        </div>

        <div class="divider"></div>

        <!-- Save Address As Section -->
        <div class="save-address-section mt-4">
            <h5 class="section-title">Save Address As</h5>
            <div class="d-flex justify-content-around mt-3">
        
                    <div class="form-check" style="padding-left:0px;">
                        <input class="form-check-input styled-radio" type="radio" name="type" id="home" value="home">
                        <label class="form-check-label styled-label" for="home">
                            <i class="fas fa-home"></i> Home
                        </label>
                    </div>
                    <div class="form-check" style="padding-left:0px;">
                        <input class="form-check-input styled-radio" type="radio" name="type" id="work" value="work">
                        <label class="form-check-label styled-label" for="work">
                            <i class="fas fa-briefcase"></i> Work
                        </label>
                    </div>
                    <div class="form-check" style="padding-left:0px;">
                        <input class="form-check-input styled-radio" type="radio" name="type" id="others" value="other">
                        <label class="form-check-label styled-label" for="others">
                            <i class="fas fa-briefcase"></i> Other
                        </label>
                    </div>
               
            </div>
        </div>
        
        <!-- Default Address Section -->
        <!--<div class="default-address-section mt-4">-->
        <!--    <div class="form-check d-flex align-items-center justify-content-center">-->
        <!--        <input class="form-check-input styled-checkbox" type="checkbox" id="defaultAddress">-->
        <!--        <label class="form-check-label styled-label ms-3" for="defaultAddress">-->
        <!--            <i class="fas fa-check-circle"></i> Make It Default-->
        <!--        </label>-->
        <!--    </div>-->
        <!--</div>-->
    </div>

        <!-- Add Address Button -->
    <div class="btn-fixed-bottom">
        <button class="btn btn-primary w-100" id="addAddressBtn">Add Address</button>
    </div>
  </form>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.getElementById('mobile').addEventListener('input', function() {
            var mobile = this.value;
            var errorMessage = document.getElementById('error-message');
            
            // Check if the first digit is one of 0, 1, 2, 3, 4, 5, and prevent input
            if (/^[0-5]/.test(mobile)) {
                this.value = mobile.slice(0, -1); // Remove the last character entered
                errorMessage.style.display = 'block';
            } else {
                errorMessage.style.display = 'none';
            }
    
            // Allow only 10 digits
            if (mobile.length > 10) {
                this.value = mobile.slice(0, 10); // Limit to 10 digits
            }
        });
    </script>
</body>
</html>
