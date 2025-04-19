<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>OhhBuddie | Listing</title>
    <link rel="icon" type="image/x-icon" href="https://fileuploaderbucket.s3.ap-southeast-1.amazonaws.com/Ohbuddielogo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    
    
    <style>
        .new-option {
            display: block;
            width: 100%;
            position: relative;
        }
        .new-option:after {
            content: '+ add new';
            display: block;
            position: absolute;
            right: 0;
            top: 0;
        }
        .new-option.style-2:after {
            content: '+ add new';
            display: block;
            position: absolute;
            right: 0;
            top: -2px;
            background: #205b12;
            padding: 2px 5px;
            color: #fff;
            border-radius: 5px;
        }
    </style>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .main-container {
            padding: 20px;
        }
        .left-column {
            width: 65%;
            padding-right: 20px;
            height:95vh;
            overflow:scroll;
            scrollbar-width:none;
        }
        .right-column {
            width: 35%;
        }
        .card {
            background: white;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .card-title {
            font-size: 14px;
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }
        .form-section {
            margin-bottom: 20px;
        }
        .form-label {
            font-size: 13px;
            color: #555;
            margin-bottom: 5px;
        }
        .form-control, .form-select {
            font-size: 13px;
            padding: 8px 12px;
        }
        .switch {
            position: relative;
            display: inline-block;
            width: 44px;
            height: 22px;
        }
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #e9ecef;
            transition: .4s;
            border-radius: 34px;
        }
        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }
        input:checked + .slider {
            background-color: green;
        }
        input:checked + .slider:before {
            transform: translateX(22px);
        }
        .toggle-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .toggle-label {
            font-size: 13px;
            color: #555;
        }
        .upload-box {
            border: 2px dashed #ddd;
            padding: 15px;
            text-align: center;
            border-radius: 4px;
            margin-bottom: 15px;
            height:150px;
        }
        
        .btn {
            background-color: #EFC475;
        }
        
        .btn:hover{
            background-color: #08adc5;
        }
        
         @media (max-width: 768px) {
             
            .main-container {
                flex-direction: column;
            }
            .left-column, .right-column {
                width: 100%;
                padding-right: 0px;
               
            }
           
        }
    </style>
    <style>
    .custom-dropdown {
        width: 247px;
        position: relative;
        display: inline-block;
    }

    .dropdown-btn {
        width: 110%;
        padding: 10px;
        height:38px;
        border: 1px solid #ccc;
        border-radius:4px;
        background: white;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: space-between;
        transition: all 0.3s ease-in-out;
    }

    .color-box {
        width: 15px;
        height: 15px;
        border: 1px solid #000;
        margin-right: 8px;
    }

    .dropdown-list {
        position: absolute;
        top: 100%;
        left: 0;
        width: 110%;
        background: white;
        border: 1px solid #ccc;
        display: none;
        list-style: none;
        padding: 5px;
        margin: 0;
        z-index: 10;
        height: 240px;
        overflow-y: scroll;
        scrollbar-width: none;
        opacity: 0;
        transform: translateY(10px);
        transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
    }

    .custom-dropdown:hover .dropdown-list {
        display: block;
        opacity: 1;
        transform: translateY(0);
    }

    .dropdown-list li {
        padding: 10px;
        cursor: pointer;
        display: flex;
        align-items: center;
        transition: background 0.2s ease-in-out;
    }

    .dropdown-list li:hover {
        background: #f0f0f0;
    }

    .search-box {
        width: calc(104% - 20px);
        padding: 5px;
        margin: 5px;
        border: 1px solid #ccc;
    }
    
    
    
    
    
</style>
    <style>
        /* For Chrome, Safari, Edge, and Opera */
input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

/* For Firefox */
input[type="number"] {
    -moz-appearance: textfield;
}
    </style>
    <style>
        .container {
    max-width: 900px;
    width: 100%;
    background-color: #fff;
    margin: auto;
    padding: 15px;
    box-shadow: 0 2px 20px #0001, 0 1px 6px #0001;
    border-radius: 5px;
    overflow-x: auto;
}

._table {
    width: 100%;
    border-collapse: collapse;
}

._table :is(th, td) {
    border: 1px solid #0002;
    padding: 8px 10px;
}

/* form field design start */
.form_control {
    border: 1px solid #0002;
    background-color: transparent;
    outline: none;
    padding: 8px 12px;
    font-family: 1.2rem;
    width: 100%;
    color: #333;
    font-family: Arial, Helvetica, sans-serif;
    transition: 0.3s ease-in-out;
}

.form_control::placeholder {
    color: inherit;
    opacity: 0.5;
}

.form_control:is(:focus, :hover) {
    box-shadow: inset 0 1px 6px #0002;
}




.action_container {
    display: inline-flex;
}

.action_container>* {
    border: none;
    outline: none;
    /*color: #fff;*/
    /*text-decoration: none;*/
    display: inline-block;
    padding: 8px 14px;
    cursor: pointer;
    transition: 0.3s ease-in-out;
}


    </style>
    
    
    
    <style>
.btns {
  border: 2px solid black;
  background-color: white;
  color: black;
  padding: 4px 8px;
  font-size: 12px;
  cursor: pointer;
  border-radius:10px;
}


/* Red */
.danger {
  border-color: #f44336;
  color: red;
}

.danger:hover {
  background: #f44336;
  color: white;
}

/* Gray */
.default {
  border-color: #e7e7e7;
  color: black;
}

.default:hover {
  background: #e7e7e7;
}
</style>

    <style>
        .select2-container .select2-selection--single {
            height: 40px !important;
            display: flex !important;
            align-items: center !important;
            border:1px solid #ced4da;
        }
        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #EFC475;
            color: white;
        }
        .select2-container--default .select2-results__option[aria-disabled=true] {
            color: #ced4da;
        }
        .select2-selection__rendered {
            line-height: 40px !important;
        }
        .select2-selection__arrow {
            height: 40px !important;
        }
        *{
            scrollbar-width:none
        }
    </style>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
   
    <div class="main-container d-flex">
        <!-- Left Column (80%) -->
        <div class="left-column">
            <form action="{{ route('products.update',$product->id ) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <!-- Basic Product Details -->
                <div class="card">
                    <h6 class="card-title">Basic Product Details</h6>
                   
                    <div class="row g-3">
                        <div class="col-4">
                            <label class="form-label">Selected Sub Category</label>
                            <input type="text" class="form-control"  value="{{ $subsubcat }}" readonly>
                        </div>                         
                        <div class="col-md-4">
                            <label class="form-label">Parent ID</label>
                            <!--<select class="form-select" name="perent_id">-->
                            <!--    <option value="">Select Subcategory</option>-->
                            <!--</select>-->
                            
                            <select class="select2-3 form-select" name="parent_id" name="state" style="width: 100%">
                                
                                @foreach($parentid as $pt)
                                    <option>{{ $pt->parent_id }}</option>
                                    
                                 @endforeach 
                            </select>
                        </div>
                        
                        
                        
                        <div class="col-md-4" hidden>
                            <label class="form-label">Product ID</label>
                            <input type="text" class="form-control" name="product_id">
                        </div>
                        
                        <div class="col-md-4">
                            <label class="form-label">Brand</label>
                            
                            @if($brand_cnt >0)
                                <select class="form-control select2" name="brand_id">
                                    <option value="1">Select Brand</option>
                                </select>
                            @else
                                <p style="color:red">!! No Brand Registered Yet !!</p>
                            @endif
                        </div>



                        <div class="col-md-12">
                            <label class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="product_name" placeholder="Enter Product Name" value="{{$product->product_name}}">
                        </div>
                        
                        <div class="col-md-4" hidden>
                            <input type="text" class="form-control" name="category_id" value="{{ $cat_id }}">
                        </div>
                        
                        <div class="col-md-4" hidden>
                            <label class="form-label">Subcategory ID </label>
                            <input type="text" class="form-control" name="subcategory_id" value="{{ $subcat_id }}">
                        </div>
                        
                        <div class="col-md-4" hidden>
                            <input type="text" class="form-control" name="sub_subcategory_id" value="{{ $subsubcat_id }}">
                        </div>
                        

                        

                    </div>
                </div>
                
                <div class="card">
                    <h6 class="card-title">Product Identification Details</h6>
                   
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">HSN</label>
                            <input type="text" class="form-control" name="hsn" placeholder="Enter HSN Code" value="{{$product->hsn}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">GST Rate</label>
                            <input type="number" max="18" min="1" class="form-control" name="gst_rate" onkeyup=enforceMinMax(this)  placeholder="Enter GST Rate" value="{{$product->gst_rate}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Size Chart</label>
                            <input type="text" class="form-control" name="size_chart_id"  placeholder="Enter Size Chart" value="{{$product->size_chart_id}}">
                        </div>
                        

                    </div>
                </div>
                
                
                
                 <!--For Sarees -->
                <div class="card Sarees"  style="display:none;">
                    <h6 class="card-title">{{$subsubcat}} Details</h6>
                    <div class="row g-3">            
                        <div class="col-md-4">
                            <label class="form-label">Saree Length</label>
                            <input type="text" class="form-control" name="saree_length"  placeholder="Enter Saree Length"  value="{{$product->saree_length}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Blouse Fabric</label>
                            <input type="text" class="form-control" name="blouse_fabric" placeholder="Enter Blouse Fabric" value="{{$product->blouse_fabric}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Blouse Piece Included</label>
                            <input type="text" class="form-control" name="blouse_piece_included"  value="{{$product->blouse_piece_included}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Blouse Length</label>
                            <input type="text" class="form-control" name="blouse_length" placeholder="Enter Blouse Length" value="{{$product->blouse_length}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Blouse Stiched</label>
                            <input type="text" class="form-control" name="blouse_stiched"  placeholder="Enter Blouse Stiched" value="{{$product->blouse_stiched}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Work Details</label>
                            <!--<input type="text" class="form-control" name="work_details"  placeholder="Enter Work Details">-->
                            
                            <select name="work_details" class="form-control select2" style="height:" value="{{$product->work_details}}">
                                <option selected disabled>{{$product->work_details}}</option>
                                 @foreach($attr as $work)
                                
                                    @if($work->work_details == Null)
                                       
                                    @else
                                       <option>{{$work->work_details}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Border Type</label>
                            <!--<input type="text" class="form-control" name="border_type" placeholder="Enter Border Type">-->
                                                        
                            <select name="border_type" class="form-control select2" style="height:" value="{{$product->border_type}}">
                                <option selected disabled>{{$product->border_type}}</option>
                                 @foreach($attr as $bordertype)
                                
                                    @if($bordertype->border_type == Null)
                                       
                                    @else
                                       <option>{{$bordertype->border_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Weave Type</label>
                            <!--<input type="text" class="form-control" name="weave_type" placeholder="Enter Weave Type">-->
                                                      
                            <select name="weave_type" class="form-control select2" style="height:" value="{{$product->weave_type}}">
                                <option selected disabled>{{$product->weave_type}}</option>
                                 @foreach($attr as $weavetype)
                                
                                    @if($weavetype->weave_type == Null)
                                       
                                    @else
                                       <option>{{$weavetype->weave_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Pattern</label>
                            <!--<input type="text" class="form-control" name="pattern"  placeholder="Enter Pattern">-->
                            
                            <select name="pattern" class="form-control select2" style="height:" value="{{$product->pattern}}">
                                    <option selected disabled>{{$product->pattern}}</option>
                                 @foreach($attr as $pat)
                                
                                    @if($pat->pattern == Null)
                                       
                                    @else
                                       <option>{{$pat->pattern}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        
                        
                        <div class="col-md-4">
                            <label class="form-label">Color</label>
                            <!--<input type="text" class="form-control" name="color_name">-->
                            
                            <div class="custom-dropdown">
                                <div class="dropdown-btn" id="selectedColor">
                                    <div class="color-box"></div>
                                    <span style="text-align center">--Select a Color--</span>
                                </div>
                                <div class="dropdown-list" id="dropdownContainer">
                                    <input type="text" class="search-box" id="searchColor" placeholder="Search color...">
                                    <ul id="colorList">
                                        @foreach($colors as $clr)
                                        <li data-color="{{ $clr->hex_code }}" data-name="{{ $clr->color_name }}">
                                            <div class="color-box" style="background: {{ $clr->hex_code }};"></div> {{ $clr->color_name }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            
                            <!-- Hidden input to store the selected color -->
                            <input type="hidden" name="color_name" id="selectedColorInput">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fabric</label>
                            <select name="fabric" class="form-control select2" style="height:" value="{{$product->fabric}}">    
                            
                                <option selected disabled>{{$product->fabric}}</option>
                                @foreach($attr as $fab)                                                                      
                                    @if($fab->fabric == Null)                                                                             
                                        
                                    @else                                        
                                    <option>{{$fab->fabric}}</option>                                     
                                    @endif                                                                     
                                @endforeach                             
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Pattern</label>
                            <!--<input type="text" class="form-control" name="pattern" placeholder="Enter Pattern">-->
                            
                            
                            <select name="pattern" class="form-control select2" style="height:" value="{{$product->pattern}}">
                                    <option selected disabled>{{$product->pattern}}</option>
                                 @foreach($attr as $pat)
                                
                                    @if($pat->pattern == Null)
                                       
                                    @else
                                       <option>{{$pat->pattern}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fit Type</label>
                            <!--<input type="text" class="form-control" name="fit_type">-->
                            <select name="fit_type" class="form-control select2" style="height:" value="{{$product->fit_type}}">
                                <option selected disabled>{{$product->fit_type}}</option>
                                 @foreach($attr as $fit)
                                
                                    @if($fit->fit_type == Null)
                                       
                                    @else
                                       <option>{{$fit->fit_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Occasion</label>
                            
                            <select class="form-control select2" name="occasion" value="{{$product->occasion}}">
                                <option selected disabled>{{$product->occasion}}</option>
                                @foreach($attr as $occasion)
                                
                                    @if($occasion->occasion == Null)
                                       
                                    @else
                                       <option>{{$occasion->occasion}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                    </div>
                </div>
                
                <!--For Gowns-->
                <div class="card Gowns" style="display:none;">
                    <h6 class="card-title">{{$subsubcat}} Details</h6>
                    <div class="row g-3">            
                        <div class="col-md-4">
                            <label class="form-label">Gown Type</label>
                            <!--<input type="text" class="form-control" name="gown_type"  placeholder="Enter Gown Type">-->
                            
                            <select class="form-control select2" name="gown_type"  value="{{$product->gown_type}}">
                                <option selected disabled>{{$product->gown_type}}</option>
                                @foreach($attr as $Gowntype)
                                
                                    @if($Gowntype->gown_type == Null)
                                       
                                    @else
                                       <option>{{$Gowntype->gown_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Sleeve Length</label>
                            <!--<input type="text" class="form-control" name="sleeve_length" placeholder="Enter Sleeve Length">-->
                            
                            <select name="sleeve_length" class="form-control select2" style="height:" value="{{$product->sleeve_length}}">
                                <option selected disabled>{{$product->sleeve_length}}</option>
                                 @foreach($attr as $sleevelen)
                                
                                    @if($sleevelen->sleeve_length == Null)
                                       
                                    @else
                                       <option>{{$sleevelen->sleeve_length}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Sleeve Pattern</label>
                            <!--<input type="text" class="form-control" name="sleeve_pattern"  placeholder="Enter Sleeve Pattern">-->
                            
                            <select name="sleeve_pattern" class="form-control select2" style="height:" value="{{$product->sleeve_pattern}}">
                                <option selected disabled>{{$product->sleeve_pattern}}</option>
                                 @foreach($attr as $sleevepat)
                                
                                    @if($sleevepat->sleeve_pattern == Null)
                                       
                                    @else
                                       <option>{{$sleevepat->sleeve_pattern}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Neck Style</label>
                            <!--<input type="text" class="form-control" name="neck_style" placeholder="Enter Neck Style">-->
                            
                            <select name="neck_style" class="form-control select2" style="height:" value="{{$product->neck_style}}">
                                <option selected disabled>{{$product->neck_style}}</option>
                                 @foreach($attr as $necksty)
                                
                                    @if($necksty->neck_style == Null)
                                       
                                    @else
                                       <option>{{$necksty->neck_style}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Closure Type</label>
                            <!--<input type="text" class="form-control" name="closure_type" placeholder="Enter Closure Type">-->
                            
                            <select name="closure_type" class="form-control select2" style="height:" value="{{$product->closure_type}}">
                                <option selected disabled>{{$product->closure_type}}</option>
                                 @foreach($attr as $clo)
                                
                                    @if($clo->clousure_type == Null)
                                       
                                    @else
                                       <option>{{$clo->clousure_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Embellishment Details</label>
                            <!--<input type="text" class="form-control" name="embellishment_details" placeholder="Enter Embellishment Details">-->
                            
                            <select  name="embellishment_details" class="form-control select2" style="height:" value="{{$product->embellishment_details}}">
                                <option selected disabled>{{$product->embellishment_details}}</option>
                                 @foreach($attr as $embd)
                                
                                    @if($embd->embelishment_detail == Null)
                                       
                                    @else
                                       <option>{{$embd->embelishment_detail}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Lining Present</label>
                            <input type="text" class="form-control" name="lining_present" placeholder="Enter Lining Present" value="{{$product->lining_present}}">
                        </div>
                        
                                       
                        
                        <div class="col-md-4">
                            <label class="form-label">Color</label>
                            <!--<input type="text" class="form-control" name="color_name">-->
                            
                            <div class="custom-dropdown">
                                <div class="dropdown-btn" id="selectedColor">
                                    <div class="color-box"></div>
                                    <span style="text-align center">--Select a Color--</span>
                                </div>
                                <div class="dropdown-list" id="dropdownContainer">
                                    <input type="text" class="search-box" id="searchColor" placeholder="Search color...">
                                    <ul id="colorList">
                                        @foreach($colors as $clr)
                                        <li data-color="{{ $clr->hex_code }}" data-name="{{ $clr->color_name }}">
                                            <div class="color-box" style="background: {{ $clr->hex_code }};"></div> {{ $clr->color_name }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            
                            <!-- Hidden input to store the selected color -->
                            <input type="hidden" name="color_name" id="selectedColorInput">

                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fabric</label>
                            <select name="fabric" class="form-control select2" style="height:" value="{{$product->fabric}}">    
                                <option selected disabled>{{$product->fabric}}</option>
                                @foreach($attr as $fab)                                                                     
                                    @if($fab->fabric == Null)    
                                    
                                    @else                                        
                                        <option>{{$fab->fabric}}</option>                                     
                                    @endif                                                                    
                                @endforeach                             
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Pattern</label>
                            <!--<input type="text" class="form-control" name="pattern" placeholder="Enter Pattern">-->
                            
                            
                            <select name="pattern" class="form-control select2" style="height:" value="{{$product->pattern}}">
                                    <option selected disabled>{{$product->pattern}}</option>
                                 @foreach($attr as $pat)
                                
                                    @if($pat->pattern == Null)
                                       
                                    @else
                                       <option>{{$pat->pattern}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fit Type</label>
                            <!--<input type="text" class="form-control" name="fit_type">-->
                            <select name="fit_type" class="form-control select2" style="height:" value="{{$product->fit_type}}">
                                <option selected disabled>{{$product->fit_type}}</option>
                                 @foreach($attr as $fit)
                                
                                    @if($fit->fit_type == Null)
                                       
                                    @else
                                       <option>{{$fit->fit_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Occasion</label>
                            <select class="form-control select2" name="occasion" value="{{$product->occasion}}">
                                <option selected disabled>{{$product->occasion}}</option>
                                @foreach($attr as $occasion)
                                
                                    @if($occasion->occasion == Null)
                                       
                                    @else
                                       <option>{{$occasion->occasion}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                    </div>
                </div>
                
                <!--For Tops-Tunics-Kurtis-->
                <div class="card Tops-Tunics-Kurtis" style="display:none;">
                    <h6 class="card-title">{{$subsubcat}} Details</h6>
                    <div class="row g-3">            
                        <div class="col-md-4">
                            <label class="form-label">Set Type</label>
                            <input type="text" class="form-control" name="set_type" placeholder="Enter Set Type" value="{{$product->set_type}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Bottom Included</label>
                            <input type="text" class="form-control" name="bottom_included" value="{{$product->bottom_included}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Bottom Type</label>
                            <!--<input type="text" class="form-control" name="bottom_type" placeholder="Enter Bottom Type">-->
                            
                            <select name="bottom_type" class="form-control select2" style="height:"  value="{{$product->bottom_type}}">
                                    <option selected disabled>{{$product->bottom_type}}</option>
                                 @foreach($attr as $bottomtype)
                                
                                    @if($bottomtype->bottom_type == Null)
                                       
                                    @else
                                       <option>{{$bottomtype->bottom_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Sleeve Pattern</label>
                            <!--<input type="text" class="form-control" name="sleeve_pattern" placeholder="Enter Sleeve Pattern">-->
                            
                            <select name="sleeve_pattern" class="form-control select2" style="height:" value="{{$product->bottom_type}}">
                                <option selected disabled>{{$product->sleeve_pattern}}</option>
                                 @foreach($attr as $sleevepat)
                                
                                    @if($sleevepat->sleeve_pattern == Null)
                                       
                                    @else
                                       <option>{{$sleevepat->sleeve_pattern}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Dupatta Fabric</label>
                            <!--<input type="text" class="form-control" name="dupatta_fabric" placeholder="Enter Dupatta Fabric">-->
                            
                                                        
                            <select name="dupatta_fabric" class="form-control select2" style="height:" value="{{$product->dupatta_fabric}}">
                                    <option selected disabled>{{$product->dupatta_fabric}}</option>
                                 @foreach($attr as $dupattafab)
                                
                                    @if($dupattafab->dupatta_type == Null)
                                       
                                    @else
                                       <option>{{$dupattafab->dupatta_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                            
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Dupatta Length</label>
                            <input type="text" class="form-control" name="dupatta_length" placeholder="Enter Dupatta Length"  value="{{$product->dupatta_length}}">
                        </div>
                                       
                        
                        <div class="col-md-4">
                            <label class="form-label">Color</label>
                            <!--<input type="text" class="form-control" name="color_name">-->
                            
                            <div class="custom-dropdown">
                                <div class="dropdown-btn" id="selectedColor">
                                    <div class="color-box"></div>
                                    <span style="text-align center">--Select a Color--</span>
                                </div>
                                <div class="dropdown-list" id="dropdownContainer">
                                    <input type="text" class="search-box" id="searchColor" placeholder="Search color...">
                                    <ul id="colorList">
                                        @foreach($colors as $clr)
                                        <li data-color="{{ $clr->hex_code }}" data-name="{{ $clr->color_name }}">
                                            <div class="color-box" style="background: {{ $clr->hex_code }};"></div> {{ $clr->color_name }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            
                            <!-- Hidden input to store the selected color -->
                            <input type="hidden" name="color_name" id="selectedColorInput">

                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fabric</label>
                            <select name="fabric" class="form-control select2" style="height:" value="{{$product->fabric}}"> 
                                <option selected disabled>{{$product->fabric}}</option>
                                @foreach($attr as $fab)                                                                     
                                    @if($fab->fabric == Null) 
                                    
                                    @else                                        
                                        <option>{{$fab->fabric}}</option>                                    
                                    @endif                                                                     
                                @endforeach                             
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Pattern</label>
                            <!--<input type="text" class="form-control" name="pattern" placeholder="Enter Pattern">-->
                            
                            
                            <select name="pattern" class="form-control select2" style="height:" value="{{$product->pattern}}">
                                    <option selected disabled>{{$product->pattern}}</option>
                                 @foreach($attr as $pat)
                                
                                    @if($pat->pattern == Null)
                                       
                                    @else
                                       <option>{{$pat->pattern}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fit Type</label>
                            <!--<input type="text" class="form-control" name="fit_type">-->
                            <select name="fit_type" class="form-control select2" style="height:" value="{{$product->fit_type}}">
                                <option selected disabled>{{$product->fit_type}}</option>
                                 @foreach($attr as $fit)
                                
                                    @if($fit->fit_type == Null)
                                       
                                    @else
                                       <option>{{$fit->fit_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Occasion</label>
                            <select class="form-control select2" name="occasion" value="{{$product->occasion}}">
                                <option selected disabled>{{$product->occasion}}</option>
                                @foreach($attr as $occasion)
                                
                                    @if($occasion->occasion == Null)
                                       
                                    @else
                                       <option>{{$occasion->occasion}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                    </div>
                </div>
                
                <!--For Kurtas & Sets-->
                <div class="card Kurtas" style="display:none;">
                    <h6 class="card-title">{{$subsubcat}} Details</h6>
                    <div class="row g-3">            
                        <div class="col-md-4">
                            <label class="form-label">Set Type</label>
                            <input type="text" class="form-control" name="set_type" placeholder="Enter Set Type"  value="{{$product->set_type}}">
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Bottom Included</label>
                            <input type="text" class="form-control" name="bottom_included" placeholder="Enter Bottom Included" value="{{$product->bottom_included}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Bottom Type</label>
                            <!--<input type="text" class="form-control" name="bottom_type" placeholder="Enter Bottom Type">-->
                            
                            <select name="bottom_type" class="form-control select2" style="height:" value="{{$product->bottom_type}}">
                                    <option selected disabled>{{$product->bottom_type}}</option>
                                 @foreach($attr as $bottomtype)
                                
                                    @if($bottomtype->bottom_type == Null)
                                       
                                    @else
                                       <option>{{$bottomtype->bottom_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Sleeve Pattern</label>
                            <!--<input type="text" class="form-control" name="sleeve_pattern" placeholder="Enter Sleeve Pattern">-->
                            
                            <select name="sleeve_pattern" class="form-control select2" style="height:" value="{{$product->bottom_type}}">
                                <option selected disabled>{{$product->sleeve_pattern}}</option>
                                 @foreach($attr as $sleevepat)
                                
                                    @if($sleevepat->sleeve_pattern == Null)
                                       
                                    @else
                                       <option>{{$sleevepat->sleeve_pattern}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Dupatta Fabric</label>
                            <!--<input type="text" class="form-control" name="dupatta_fabric" placeholder="Enter Dupatta Fabric">-->
                            
                                                        
                            <select name="dupatta_fabric" class="form-control select2" style="height:" value="{{$product->dupatta_fabric}}">
                                    <option selected disabled>{{$product->dupatta_fabric}}</option>
                                 @foreach($attr as $dupattafab)
                                
                                    @if($dupattafab->dupatta_type == Null)
                                       
                                    @else
                                       <option>{{$dupattafab->dupatta_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                            
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Dupatta Length</label>
                            <input type="text" class="form-control" name="dupatta_length" placeholder="Enter Dupatta Length" value="{{$product->dupatta_length}}">
                        </div>
                                       
                        
                        <div class="col-md-4">
                            <label class="form-label">Color</label>
                            <!--<input type="text" class="form-control" name="color_name">-->
                            
                            <div class="custom-dropdown">
                                <div class="dropdown-btn" id="selectedColor">
                                    <div class="color-box"></div>
                                    <span style="text-align center">--Select a Color--</span>
                                </div>
                                <div class="dropdown-list" id="dropdownContainer">
                                    <input type="text" class="search-box" id="searchColor" placeholder="Search color...">
                                    <ul id="colorList">
                                        @foreach($colors as $clr)
                                        <li data-color="{{ $clr->hex_code }}" data-name="{{ $clr->color_name }}">
                                            <div class="color-box" style="background: {{ $clr->hex_code }};"></div> {{ $clr->color_name }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            
                            <!-- Hidden input to store the selected color -->
                            <input type="hidden" name="color_name" id="selectedColorInput">

                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fabric</label>
                            <select name="fabric" class="form-control select2" style="height:" value="{{$product->fabric}}">  
                                <option selected disabled>{{$product->fabric}}</option>
                                @foreach($attr as $fab)                                                                 
                                    @if($fab->fabric == Null)   
                                    
                                    @else     
                                    
                                        <option>{{$fab->fabric}}</option>                                
                                    @endif                                                             
                                @endforeach                         
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Pattern</label>
                            <!--<input type="text" class="form-control" name="pattern" placeholder="Enter Pattern">-->
                            
                            
                            <select name="pattern" class="form-control select2" style="height:" value="{{$product->pattern}}">
                                
                                <option selected disabled>{{$product->pattern}}</option>
                                 @foreach($attr as $pat)
                                
                                    @if($pat->pattern == Null)
                                       
                                    @else
                                       <option>{{$pat->pattern}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fit Type</label>
                            <!--<input type="text" class="form-control" name="fit_type">-->
                            <select name="fit_type" class="form-control select2" style="height:" value="{{$product->fit_type}}">
                                <option selected disabled>{{$product->fit_type}}</option>
                                 @foreach($attr as $fit)
                                
                                    @if($fit->fit_type == Null)
                                       
                                    @else
                                       <option>{{$fit->fit_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Occasion</label>
                            <select class="form-control select2" name="occasion" value="{{$product->occasion}}">
                                <option selected disabled>{{$product->occasion}}</option>
                                @foreach($attr as $occasion)
                                
                                    @if($occasion->occasion == Null)
                                       
                                    @else
                                       <option>{{$occasion->occasion}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                    </div>
                </div>
                
                <!--For Dupatta & Shawls-->
                <div class="card Dupatta" style="display:none;">
                    <h6 class="card-title">{{$subsubcat}} Details</h6>
                    <div class="row g-3">            
                        <div class="col-md-4">
                            <label class="form-label">Dupatta/Shawl Type</label>
                            <input type="text" class="form-control" name="dupatta_shawl_type" placeholder="Enter Dupatta/Shawl Type" value="{{$product->dupatta_shawl_type}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Length</label>
                            <input type="text" class="form-control" name="length" placeholder="Enter Length" value="{{$product->length}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Work Details</label>
                            <!--<input type="text" class="form-control" name="work_details" placeholder="Enter Work Details">-->
                            
                            <select name="work_details" class="form-control select2" style="height:" value="{{$product->work_details}}">
                                <option selected disabled>{{$product->work_details}}</option>
                                 @foreach($attr as $work)
                                
                                    @if($work->work_details == Null)
                                       
                                    @else
                                       <option>{{$work->work_details}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Border Type</label>
                            <!--<input type="text" class="form-control" name="border_type" placeholder="Enter Border Type">-->
                                                                                    
                            <select name="border_type" class="form-control select2" style="height:" value="{{$product->border_type}}">
                                <option selected disabled>{{$product->border_type}}</option>
                                 @foreach($attr as $bordertype)
                                
                                    @if($bordertype->border_type == Null)
                                       
                                    @else
                                       <option>{{$bordertype->border_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                                       
                        
                        <div class="col-md-4">
                            <label class="form-label">Color</label>
                            <!--<input type="text" class="form-control" name="color_name">-->
                            
                            <div class="custom-dropdown">
                                <div class="dropdown-btn" id="selectedColor">
                                    <div class="color-box"></div>
                                    <span style="text-align center">--Select a Color--</span>
                                </div>
                                <div class="dropdown-list" id="dropdownContainer">
                                    <input type="text" class="search-box" id="searchColor" placeholder="Search color...">
                                    <ul id="colorList">
                                        @foreach($colors as $clr)
                                        <li data-color="{{ $clr->hex_code }}" data-name="{{ $clr->color_name }}">
                                            <div class="color-box" style="background: {{ $clr->hex_code }};"></div> {{ $clr->color_name }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            
                            <!-- Hidden input to store the selected color -->
                            <input type="hidden" name="color_name" id="selectedColorInput">

                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fabric</label>
                            <select name="fabric" class="form-control select2" style="height:" value="{{$product->fabric}}">    
                                <option selected disabled>{{$product->fabric}}</option>
                                @foreach($attr as $fab)                                                      
                                    @if($fab->fabric == Null)
                                    
                                    @else                                     
                                    <option>{{$fab->fabric}}</option>                      
                                    @endif                                                
                                @endforeach                            
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Pattern</label>
                            <!--<input type="text" class="form-control" name="pattern" placeholder="Enter Pattern">-->
                            
                            
                            <select name="pattern" class="form-control select2" style="height:" value="{{$product->pattern}}">
                                    <option selected disabled>{{$product->pattern}}</option>
                                 @foreach($attr as $pat)
                                
                                    @if($pat->pattern == Null)
                                       
                                    @else
                                       <option>{{$pat->pattern}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fit Type</label>
                            <!--<input type="text" class="form-control" name="fit_type">-->
                            <select name="fit_type" class="form-control select2" style="height:" value="{{$product->fit_type}}">
                                <option selected disabled>{{$product->fit_type}}</option>
                                 @foreach($attr as $fit)
                                
                                    @if($fit->fit_type == Null)
                                       
                                    @else
                                       <option>{{$fit->fit_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Occasion</label>
                            <select class="form-control select2" name="occasion" value="{{$product->occasion}}">
                                <option selected disabled>{{$product->occasion}}</option>
                                @foreach($attr as $occasion)
                                
                                    @if($occasion->occasion == Null)
                                       
                                    @else
                                       <option>{{$occasion->occasion}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                    </div>
                </div>
                
                <!--For Lehenga-->
                <div class="card Lehenga" style="display:none;">
                    <h6 class="card-title">{{$subsubcat}} Details</h6>
                    <div class="row g-3">            
                        <div class="col-md-4">
                            <label class="form-label">Lehenga Type</label>
                            <!--<input type="text" class="form-control" name="lehenga_type" placeholder="Enter Lehenga Type">-->
                            
                            <select name="lehenga_type" class="form-control select2" style="height:" value="{{$product->lehenga_type}}">
                                    <option selected disabled>--Select Lehenga Type--</option>
                                 @foreach($attr as $lehangatype)
                                
                                    @if($lehangatype->lehanga_type == Null)
                                       
                                    @else
                                       <option>{{$lehangatype->lehanga_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Lehenga Length</label>
                            <input type="text" class="form-control" name="lehenga_length" placeholder="Enter Lehenga Length" value="{{$product->lehenga_length}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Choli Included</label>
                            <input type="text" class="form-control" name="choli_included" value="{{$product->choli_included}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Choli Length</label>
                            <input type="text" class="form-control" name="choli_length" placeholder="Enter Choli Length" value="{{$product->choli_length}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Choli Sleeve Length</label>
                            <input type="text" class="form-control" name="choli_sleeve_length" placeholder="Enter Choli Sleeve Length" value="{{$product->choli_sleeve_length}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Dupatta Included</label>
                            <input type="text" class="form-control" name="dupatta_included" placeholder="Enter Dupatta Included" value="{{$product->dupatta_included}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Dupatta Length</label>
                            <input type="text" class="form-control" name="dupatta_length" placeholder="Enter Dupatta Length" value="{{$product->dupatta_length}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Work Details</label>
                            <!--<input type="text" class="form-control" name="work_details" placeholder="Enter Work Details">-->
                            
                            <select name="work_details" class="form-control select2" style="height:" value="{{$product->work_details}}">
                                <option selected disabled>{{$product->work_details}}</option>
                                 @foreach($attr as $work)
                                
                                    @if($work->work_details == Null)
                                       
                                    @else
                                       <option>{{$work->work_details}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Flare Type</label>
                            <!--<input type="text" class="form-control" name="flare_type" placeholder="Enter Flare Type">-->
                            
                            
                            <select name="flare_type" class="form-control select2" style="height:" value="{{$product->flare_type}}">
                                    <option selected disabled>{{$product->flare_type}}</option>
                                 @foreach($attr as $flaretype)
                                
                                    @if($flaretype->flare_type == Null)
                                       
                                    @else
                                       <option>{{$flaretype->flare_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                                       
                        
                        <div class="col-md-4">
                            <label class="form-label">Color</label>
                            <!--<input type="text" class="form-control" name="color_name">-->
                            
                            <div class="custom-dropdown">
                                <div class="dropdown-btn" id="selectedColor">
                                    <div class="color-box"></div>
                                    <span style="text-align center">--Select a Color--</span>
                                </div>
                                <div class="dropdown-list" id="dropdownContainer">
                                    <input type="text" class="search-box" id="searchColor" placeholder="Search color...">
                                    <ul id="colorList">
                                        @foreach($colors as $clr)
                                        <li data-color="{{ $clr->hex_code }}" data-name="{{ $clr->color_name }}">
                                            <div class="color-box" style="background: {{ $clr->hex_code }};"></div> {{ $clr->color_name }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            
                            <!-- Hidden input to store the selected color -->
                            <input type="hidden" name="color_name" id="selectedColorInput">

                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fabric</label>
                            <select name="fabric" class="form-control select2" style="height:" value="{{$product->fabric}}">       
                                <option selected disabled>{{$product->fabric}}</option>
                                @foreach($attr as $fab)                                                           
                                    @if($fab->fabric == Null)    
                                    
                                    @else                                      
                                      <option>{{$fab->fabric}}</option>                               
                                    @endif                                                           
                                @endforeach                           
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Pattern</label>
                            <!--<input type="text" class="form-control" name="pattern" placeholder="Enter Pattern">-->
                            
                            <select name="pattern" class="form-control select2" style="height:" value="{{$product->pattern}}">
                                    <option selected disabled>{{$product->pattern}}</option>
                                 @foreach($attr as $pat)
                                
                                    @if($pat->pattern == Null)
                                       
                                    @else
                                       <option>{{$pat->pattern}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fit Type</label>
                            <!--<input type="text" class="form-control" name="fit_type">-->
                            <select name="fit_type" class="form-control select2" style="height:" value="{{$product->fit_type}}">
                                <option selected disabled>{{$product->fit_type}}</option>
                                 @foreach($attr as $fit)
                                
                                    @if($fit->fit_type == Null)
                                       
                                    @else
                                       <option>{{$fit->fit_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Occasion</label>
                            <select class="form-control select2" name="occasion" value="{{$product->occasion}}">
                                <option selected disabled>{{$product->occasion}}</option>
                                @foreach($attr as $occasion)
                                
                                    @if($occasion->occasion == Null)
                                       
                                    @else
                                       <option>{{$occasion->occasion}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                    </div>
                </div>
            
                
                <!--For Tops -->
                <div class="card top"  style="display:none;">
                    <h6 class="card-title">{{$subsubcat}} Details</h6>
                    <div class="row g-3">            
                        <div class="col-md-4">
                            <label class="form-label">Top Type</label>
                            <input type="text" class="form-control" name="top_type" placeholder="Enter Top Type">
                            
                            <select name="top_type" class="form-control select2" style="height:" value="{{$product->top_type}}">
                                    <option selected disabled>{{$product->top_type}}</option>
                                 @foreach($attr as $top)
                                
                                    @if($top->top_type == Null)
                                       
                                    @else
                                       <option>{{$top->top_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Sleeve Length</label>
                            <!--<input type="text" class="form-control" name="sleeve_length" placeholder="Enter Sleeve Length">-->
                             
                            <select name="sleeve_length" class="form-control select2" style="height:" value="{{$product->sleeve_length}}">
                                <option selected disabled>{{$product->sleeve_length}}</option>
                                 @foreach($attr as $sleevelen)
                                
                                    @if($sleevelen->sleeve_length == Null)
                                       
                                    @else
                                       <option>{{$sleevelen->sleeve_length}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Neckline</label>
                            <input type="text" class="form-control" name="neckline" placeholder="Enter Neckline">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fit Type</label>
                            <!--<input type="text" class="form-control" name="fit_type">-->
                            <select name="fit_type" class="form-control select2" value="{{$product->fit_type}}">
                                 @foreach($attr as $fit)
                                
                                    @if($fit->fit_type == Null)
                                       
                                    @else
                                       <option>{{$fit->fit_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                        </div>
                                       
                        
                        <div class="col-md-4">
                            <label class="form-label">Color</label>
                            <!--<input type="text" class="form-control" name="color_name">-->
                            
                            <div class="custom-dropdown">
                                <div class="dropdown-btn" id="selectedColor">
                                    <div class="color-box"></div>
                                    <span style="text-align center">--Select a Color--</span>
                                </div>
                                <div class="dropdown-list" id="dropdownContainer">
                                    <input type="text" class="search-box" id="searchColor" placeholder="Search color...">
                                    <ul id="colorList">
                                        @foreach($colors as $clr)
                                        <li data-color="{{ $clr->hex_code }}" data-name="{{ $clr->color_name }}">
                                            <div class="color-box" style="background: {{ $clr->hex_code }};"></div> {{ $clr->color_name }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            
                            <!-- Hidden input to store the selected color -->
                            <input type="hidden" name="color_name" id="selectedColorInput">

                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fabric</label>
                            <select name="fabric" class="form-control select2" style="height:" value="{{$product->fabric}}">            
                            <option selected disabled>{{$product->fabric}}</option>
                                @foreach($attr as $fab)                                                               
                                    @if($fab->fabric == Null) 
                                    
                                    @else 
                                    
                                      <option>{{$fab->fabric}}</option>   
                                      
                                    @endif                                                  
                                @endforeach                          
                            </select>
                        </div>
                        
                        <div class="col-md-4">
                            <label class="form-label">Pattern</label>
                            <!--<input type="text" class="form-control" name="pattern" placeholder="Enter Pattern">-->
                            
                            
                            <select name="pattern" class="form-control select2" style="height:" value="{{$product->pattern}}">
                                    <option selected disabled>{{$product->pattern}}</option>
                                 @foreach($attr as $pat)
                                
                                    @if($pat->pattern == Null)
                                       
                                    @else
                                       <option>{{$pat->pattern}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fit Type</label>
                            <!--<input type="text" class="form-control" name="fit_type">-->
                            <select name="fit_type" class="form-control select2" style="height:" value="{{$product->fit_type}}">
                                <option selected disabled>{{$product->fit_type}}</option>
                                 @foreach($attr as $fit)
                                
                                    @if($fit->fit_type == Null)
                                       
                                    @else
                                       <option>{{$fit->fit_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Occasion</label>
                            <select class="form-control select2" name="occasion" value="{{$product->occasion}}">
                                <option selected disabled>{{$product->occasion}}</option>
                                @foreach($attr as $occasion)
                                
                                    @if($occasion->occasion == Null)
                                       
                                    @else
                                       <option>{{$occasion->occasion}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                    </div>
                </div>
                
                <!--For T-shirt -->
                <div class="card tshirt" style="display:none;">
                    <h6 class="card-title">{{$subsubcat}} Details</h6>
                    <div class="row g-3">            
                        <div class="col-md-4">
                            <label class="form-label">T-Shirt Type</label>
                            <!--<input type="text" class="form-control" name="tshirt_type" placeholder="Enter T-Shirt Type">-->
                            
                            
                            <select name="tshirt_type" class="form-control select2" style="height:"  value="{{$product->tshirt_type}}">
                                    <option selected disabled>{{$product->tshirt_type}}</option>
                                 @foreach($attr as $tshirttype)
                                
                                    @if($tshirttype->tshirt_type == Null)
                                       
                                    @else
                                       <option>{{$tshirttype->tshirt_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Sleeve Style</label>
                            <input type="text" class="form-control" name="sleeve_style" placeholder="Enter Sleeve Style" value="{{$product->sleeve_style}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Collar Type</label>
                            <input type="text" class="form-control" name="collar_type" placeholder="Enter Collar Type" value="{{$product->collar_type}}">
                        </div>
                                       
                        
                        <div class="col-md-4">
                            <label class="form-label">Color</label>
                            <!--<input type="text" class="form-control" name="color_name">-->
                            
                            <div class="custom-dropdown">
                                <div class="dropdown-btn" id="selectedColor">
                                    <div class="color-box"></div>
                                    <span style="text-align center">--Select a Color--</span>
                                </div>
                                <div class="dropdown-list" id="dropdownContainer">
                                    <input type="text" class="search-box" id="searchColor" placeholder="Search color...">
                                    <ul id="colorList">
                                        @foreach($colors as $clr)
                                        <li data-color="{{ $clr->hex_code }}" data-name="{{ $clr->color_name }}">
                                            <div class="color-box" style="background: {{ $clr->hex_code }};"></div> {{ $clr->color_name }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            
                            <!-- Hidden input to store the selected color -->
                            <input type="hidden" name="color_name" id="selectedColorInput">

                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fabric</label>
                            <select name="fabric" class="form-control select2" style="height:" value="{{$product->fabric}}">         
                            <option selected disabled>{{$product->fabric}}</option>
                                @foreach($attr as $fab)                                                                
                                    @if($fab->fabric == Null)  
                                    
                                    @else                                      
                                       <option>{{$fab->fabric}}</option>                        
                                    @endif                                                   
                                @endforeach                         
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Pattern</label>
                            <!--<input type="text" class="form-control" name="pattern" placeholder="Enter Pattern">-->
                            
                            
                            <select name="pattern" class="form-control select2" style="height:" value="{{$product->pattern}}">
                                    <option selected disabled>{{$product->pattern}}</option>
                                 @foreach($attr as $pat)
                                
                                    @if($pat->pattern == Null)
                                       
                                    @else
                                       <option>{{$pat->pattern}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fit Type</label>
                            <!--<input type="text" class="form-control" name="fit_type">-->
                            <select name="fit_type" class="form-control select2" style="height:" value="{{$product->fit_type}}">
                                <option selected disabled>{{$product->fit_type}}</option>
                                 @foreach($attr as $fit)
                                
                                    @if($fit->fit_type == Null)
                                       
                                    @else
                                       <option>{{$fit->fit_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Occasion</label>
                            <select class="form-control select2" name="occasion" value="{{$product->occasion}}">
                                <option selected disabled>{{$product->occasion}}</option>
                                @foreach($attr as $occasion)
                                
                                    @if($occasion->occasion == Null)
                                       
                                    @else
                                       <option>{{$occasion->occasion}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                    </div>
                </div>
                
                
                <!--For Shirt -->
                <div class="card shirt"  style="display:none;">
                    <h6 class="card-title">{{$subsubcat}} Details</h6>
                    <div class="row g-3">            
                        <div class="col-md-4">
                            <label class="form-label">Shirt Type</label>
                            <input type="text" class="form-control" name="shirt_type" placeholder="Enter Shirt Type" value="{{$product->shirt_type}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Sleeve Style</label>
                            <input type="text" class="form-control" name="sleeve_style" placeholder="Enter Sleeve Style" value="{{$product->sleeve_style}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Closure Type</label>
                            <!--<input type="text" class="form-control" name="closure_type" placeholder="Enter Closure Type">-->
                            
                            <select name="closure_type" class="form-control select2" style="height:" value="{{$product->closure_type}}">
                                <option selected disabled>{{$product->closure_type}}</option>
                                 @foreach($attr as $clo)
                                
                                    @if($clo->clousure_type == Null)
                                       
                                    @else
                                       <option>{{$clo->clousure_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                                       
                        
                        <div class="col-md-4">
                            <label class="form-label">Color</label>
                            <!--<input type="text" class="form-control" name="color_name">-->
                            
                            <div class="custom-dropdown">
                                <div class="dropdown-btn" id="selectedColor">
                                    <div class="color-box"></div>
                                    <span style="text-align center">--Select a Color--</span>
                                </div>
                                <div class="dropdown-list" id="dropdownContainer">
                                    <input type="text" class="search-box" id="searchColor" placeholder="Search color...">
                                    <ul id="colorList">
                                        @foreach($colors as $clr)
                                        <li data-color="{{ $clr->hex_code }}" data-name="{{ $clr->color_name }}">
                                            <div class="color-box" style="background: {{ $clr->hex_code }};"></div> {{ $clr->color_name }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            
                            <!-- Hidden input to store the selected color -->
                            <input type="hidden" name="color_name" id="selectedColorInput">

                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fabric</label>
                            <select name="fabric" class="form-control select2" style="height:" value="{{$product->fabric}}"> 
                            <option selected disabled>{{$product->fabric}}</option>
                                @foreach($attr as $fab)                                                              
                                    @if($fab->fabric == Null)                                                            
                                    @else                               
                                    <option>{{$fab->fabric}}</option>                        
                                    @endif                                                  
                                @endforeach                         
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Pattern</label>
                            <!--<input type="text" class="form-control" name="pattern" placeholder="Enter Pattern">-->
                            
                            
                            <select name="pattern" class="form-control select2" style="height:" value="{{$product->pattern}}">
                                    <option selected disabled>{{$product->pattern}}</option>
                                 @foreach($attr as $pat)
                                
                                    @if($pat->pattern == Null)
                                       
                                    @else
                                       <option>{{$pat->pattern}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fit Type</label>
                            <!--<input type="text" class="form-control" name="fit_type">-->
                            <select name="fit_type" class="form-control select2" style="height:" value="{{$product->fit_type}}">
                                <option selected disabled>{{$product->fit_type}}</option>
                                 @foreach($attr as $fit)
                                
                                    @if($fit->fit_type == Null)
                                       
                                    @else
                                       <option>{{$fit->fit_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Occasion</label>
                            <select class="form-control select2" name="occasion" value="{{$product->occasion}}">
                                <option selected disabled>{{$product->occasion}}</option>
                                @foreach($attr as $occasion)
                                
                                    @if($occasion->occasion == Null)
                                       
                                    @else
                                       <option>{{$occasion->occasion}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                    </div>
                </div>
                
                <!--For Dresses -->
                <div class="card dresses"  style="display:none;">
                    <h6 class="card-title">{{$subsubcat}} Details</h6>
                    <div class="row g-3">            
                        <div class="col-md-4">
                            <label class="form-label">Dress Type</label>
                            <input type="text" class="form-control" name="dress_type" placeholder="Enter Dress Type"  value="{{$product->dress_type}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Hemline</label>
                            <!--<input type="text" class="form-control" name="hemline" placeholder="Enter Hemline">-->
                            
                            
                            <select name="hemline" class="form-control select2" style="height:" value="{{$product->hemline}}">
                                    <option selected disabled>{{$product->hemline}}</option>
                                 @foreach($attr as $hemline)
                                
                                    @if($hemline->hemline == Null)
                                       
                                    @else
                                       <option>{{$hemline->hemline}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Sleeve Pattern</label>
                            <!--<input type="text" class="form-control" name="sleeve_pattern" placeholder="Enter Sleeve Pattern">-->
                            
                            <select name="sleeve_pattern" class="form-control select2" style="height:" value="{{$product->bottom_type}}">
                                <option selected disabled>{{$product->sleeve_pattern}}</option>
                                 @foreach($attr as $sleevepat)
                                
                                    @if($sleevepat->sleeve_pattern == Null)
                                       
                                    @else
                                       <option>{{$sleevepat->sleeve_pattern}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Dress Length</label>
                            <input type="text" class="form-control" name="dress_length" placeholder="Enter Dress Length" value="{{$product->dress_length}}">
                        </div>
                                       
                        
                        <div class="col-md-4">
                            <label class="form-label">Color</label>
                            <!--<input type="text" class="form-control" name="color_name">-->
                            
                            <div class="custom-dropdown">
                                <div class="dropdown-btn" id="selectedColor">
                                    <div class="color-box"></div>
                                    <span style="text-align center">--Select a Color--</span>
                                </div>
                                <div class="dropdown-list" id="dropdownContainer">
                                    <input type="text" class="search-box" id="searchColor" placeholder="Search color...">
                                    <ul id="colorList">
                                        @foreach($colors as $clr)
                                        <li data-color="{{ $clr->hex_code }}" data-name="{{ $clr->color_name }}">
                                            <div class="color-box" style="background: {{ $clr->hex_code }};"></div> {{ $clr->color_name }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            
                            <!-- Hidden input to store the selected color -->
                            <input type="hidden" name="color_name" id="selectedColorInput">

                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fabric</label>
                            <select name="fabric" class="form-control select2" style="height:" value="{{$product->fabric}}"> 
                                <option selected disabled>{{$product->fabric}}</option>
                                @foreach($attr as $fab)                                                         
                                    @if($fab->fabric == Null)                                                         
                                    @else                                   
                                    <option>{{$fab->fabric}}</option>                              
                                    @endif                                                         
                                @endforeach                         
                            </select>
                        </div>
                        
                        <div class="col-md-4">
                            <label class="form-label">Pattern</label>
                            <!--<input type="text" class="form-control" name="pattern" placeholder="Enter Pattern">-->
                            
                            
                            <select name="pattern" class="form-control select2" style="height:" value="{{$product->pattern}}">
                                    <option selected disabled>{{$product->pattern}}</option>
                                 @foreach($attr as $pat)
                                
                                    @if($pat->pattern == Null)
                                       
                                    @else
                                       <option>{{$pat->pattern}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fit Type</label>
                            <!--<input type="text" class="form-control" name="fit_type">-->
                            <select name="fit_type" class="form-control select2" style="height:" value="{{$product->fit_type}}">
                                <option selected disabled>{{$product->fit_type}}</option>
                                 @foreach($attr as $fit)
                                
                                    @if($fit->fit_type == Null)
                                       
                                    @else
                                       <option>{{$fit->fit_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Occasion</label>
                            <select class="form-control select2" name="occasion" value="{{$product->occasion}}">
                                <option selected disabled>{{$product->occasion}}</option>
                                @foreach($attr as $occasion)
                                
                                    @if($occasion->occasion == Null)
                                       
                                    @else
                                       <option>{{$occasion->occasion}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                    </div>
                </div>
                
                <!--For Co-Ords -->
                <div class="card co-ords"  style="display:none;">
                    <h6 class="card-title">{{$subsubcat}} Details</h6>
                    <div class="row g-3">            
                        <div class="col-md-4">
                            <label class="form-label">Set Type</label>
                            <input type="text" class="form-control" name="set_type" placeholder="Enter Set Type"  value="{{$product->set_type}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Top Style</label>
                            <input type="text" class="form-control" name="top_style" placeholder="Enter Top Style"  value="{{$product->top_style}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Bottom Style</label>
                            <input type="text" class="form-control" name="bottom_style" placeholder="Enter Bottom Style" value="{{$product->bottom_style}}">
                        </div>
                                       
                        
                        <div class="col-md-4">
                            <label class="form-label">Color</label>
                            <!--<input type="text" class="form-control" name="color_name">-->
                            
                            <div class="custom-dropdown">
                                <div class="dropdown-btn" id="selectedColor">
                                    <div class="color-box"></div>
                                    <span style="text-align center">--Select a Color--</span>
                                </div>
                                <div class="dropdown-list" id="dropdownContainer">
                                    <input type="text" class="search-box" id="searchColor" placeholder="Search color...">
                                    <ul id="colorList">
                                        @foreach($colors as $clr)
                                        <li data-color="{{ $clr->hex_code }}" data-name="{{ $clr->color_name }}">
                                            <div class="color-box" style="background: {{ $clr->hex_code }};"></div> {{ $clr->color_name }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            
                            <!-- Hidden input to store the selected color -->
                            <input type="hidden" name="color_name" id="selectedColorInput">

                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fabric</label>
                            <select name="fabric" class="form-control select2" style="height:" value="{{$product->fabric}}">   
                                <option selected disabled>{{$product->fabric}}</option>
                                @foreach($attr as $fab)                                                                   
                                    @if($fab->fabric == Null)   
                                    
                                    @else                                   
                                        <option>{{$fab->fabric}}</option>                         
                                    @endif                                                    
                                @endforeach                           
                            </select>
                        </div> 
                        <div class="col-md-4">
                            <label class="form-label">Pattern</label>
                            <!--<input type="text" class="form-control" name="pattern" placeholder="Enter Pattern">-->
                            
                            
                            <select name="pattern" class="form-control select2" style="height:" value="{{$product->pattern}}">
                                    <option selected disabled>{{$product->pattern}}</option>
                                 @foreach($attr as $pat)
                                
                                    @if($pat->pattern == Null)
                                       
                                    @else
                                       <option>{{$pat->pattern}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fit Type</label>
                            <!--<input type="text" class="form-control" name="fit_type">-->
                            <select name="fit_type" class="form-control select2" style="height:" value="{{$product->fit_type}}">
                                <option selected disabled>{{$product->fit_type}}</option>
                                 @foreach($attr as $fit)
                                
                                    @if($fit->fit_type == Null)
                                       
                                    @else
                                       <option>{{$fit->fit_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Occasion</label>
                            <select class="form-control select2" name="occasion" value="{{$product->occasion}}">
                                <option selected disabled>{{$product->occasion}}</option>
                                @foreach($attr as $occasion)
                                
                                    @if($occasion->occasion == Null)
                                       
                                    @else
                                       <option>{{$occasion->occasion}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                    </div>
                </div>
                
                <!--For Jumpsuits -->
                <div class="card jumpsuits"  style="display:none;">
                    <h6 class="card-title">{{$subsubcat}} Details</h6>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Jumpsuit Type</label>
                            <input type="text" class="form-control" name="jumpsuit_type" placeholder="Enter Jumpsuit Type" value="{{$product->jumpsuit_type}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Leg Style</label>
                            <input type="text" class="form-control" name="leg_style" placeholder="Enter Leg Style" value="{{$product->leg_style}}">
                        </div>
                                       
                        
                        <div class="col-md-4">
                            <label class="form-label">Color</label>
                            <!--<input type="text" class="form-control" name="color_name">-->
                            
                            <div class="custom-dropdown">
                                <div class="dropdown-btn" id="selectedColor">
                                    <div class="color-box"></div>
                                    <span style="text-align center">--Select a Color--</span>
                                </div>
                                <div class="dropdown-list" id="dropdownContainer">
                                    <input type="text" class="search-box" id="searchColor" placeholder="Search color...">
                                    <ul id="colorList">
                                        @foreach($colors as $clr)
                                        <li data-color="{{ $clr->hex_code }}" data-name="{{ $clr->color_name }}">
                                            <div class="color-box" style="background: {{ $clr->hex_code }};"></div> {{ $clr->color_name }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            
                            <!-- Hidden input to store the selected color -->
                            <input type="hidden" name="color_name" id="selectedColorInput">

                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fabric</label>
                            <select name="fabric" class="form-control select2" style="height:" value="{{$product->fabric}}">       
                            <option selected disabled>{{$product->fabric}}</option>
                                @foreach($attr as $fab)                                                               
                                    @if($fab->fabric == Null)  
                                    
                                    @else                                    
                                        <option>{{$fab->fabric}}</option>                          
                                    @endif                                                      
                                @endforeach                           
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Pattern</label>
                            <!--<input type="text" class="form-control" name="pattern" placeholder="Enter Pattern">-->
                            
                            
                            <select name="pattern" class="form-control select2" style="height:" value="{{$product->pattern}}">
                                    <option selected disabled>{{$product->pattern}}</option>
                                 @foreach($attr as $pat)
                                
                                    @if($pat->pattern == Null)
                                       
                                    @else
                                       <option>{{$pat->pattern}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fit Type</label>
                            <!--<input type="text" class="form-control" name="fit_type">-->
                            <select name="fit_type" class="form-control select2" style="height:" value="{{$product->fit_type}}">
                                <option selected disabled>{{$product->fit_type}}</option>
                                 @foreach($attr as $fit)
                                
                                    @if($fit->fit_type == Null)
                                       
                                    @else
                                       <option>{{$fit->fit_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Occasion</label>
                            <select class="form-control select2" name="occasion" value="{{$product->occasion}}">
                                <option selected disabled>{{$product->occasion}}</option>
                                @foreach($attr as $occasion)
                                
                                    @if($occasion->occasion == Null)
                                       
                                    @else
                                       <option>{{$occasion->occasion}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                    </div>
                </div>
                
                <!--For Shrugs -->
                <div class="card Shrugs"  style="display:none;">
                    <h6 class="card-title">{{$subsubcat}} Details</h6>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Shrug Type</label>
                            <input type="text" class="form-control" name="shrug_type" placeholder="Enter Shrug Type" value="{{$product->shrug_type}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Length</label>
                            <input type="text" class="form-control" name="length" placeholder="Enter Length" value="{{$product->length}}">
                        </div>
                                       
                        
                        <div class="col-md-4">
                            <label class="form-label">Color</label>
                            <!--<input type="text" class="form-control" name="color_name">-->
                            
                            <div class="custom-dropdown">
                                <div class="dropdown-btn" id="selectedColor">
                                    <div class="color-box"></div>
                                    <span style="text-align center">--Select a Color--</span>
                                </div>
                                <div class="dropdown-list" id="dropdownContainer">
                                    <input type="text" class="search-box" id="searchColor" placeholder="Search color...">
                                    <ul id="colorList">
                                        @foreach($colors as $clr)
                                        <li data-color="{{ $clr->hex_code }}" data-name="{{ $clr->color_name }}">
                                            <div class="color-box" style="background: {{ $clr->hex_code }};"></div> {{ $clr->color_name }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            
                            <!-- Hidden input to store the selected color -->
                            <input type="hidden" name="color_name" id="selectedColorInput">

                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fabric</label>
                            <select name="fabric" class="form-control select2" style="height:" value="{{$product->fabric}}"> 
                            <option selected disabled>{{$product->fabric}}</option>
                                @foreach($attr as $fab)                                                            
                                    @if($fab->fabric == Null)                                                         
                                    @else                                  
                                        <option>{{$fab->fabric}}</option>                      
                                    @endif                                                 
                                @endforeach                          
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Pattern</label>
                            <!--<input type="text" class="form-control" name="pattern" placeholder="Enter Pattern">-->
                            
                            
                            <select name="pattern" class="form-control select2" style="height:" value="{{$product->pattern}}">
                                    <option selected disabled>{{$product->pattern}}</option>
                                 @foreach($attr as $pat)
                                
                                    @if($pat->pattern == Null)
                                       
                                    @else
                                       <option>{{$pat->pattern}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fit Type</label>
                            <!--<input type="text" class="form-control" name="fit_type">-->
                            <select name="fit_type" class="form-control select2" style="height:" value="{{$product->fit_type}}">
                                <option selected disabled>{{$product->fit_type}}</option>
                                 @foreach($attr as $fit)
                                
                                    @if($fit->fit_type == Null)
                                       
                                    @else
                                       <option>{{$fit->fit_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Occasion</label>
                            <select class="form-control select2" name="occasion" value="{{$product->occasion}}">
                                <option selected disabled>{{$product->occasion}}</option>
                                @foreach($attr as $occasion)
                                
                                    @if($occasion->occasion == Null)
                                       
                                    @else
                                       <option>{{$occasion->occasion}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                    </div>
                </div>
                
                <!--For Hoodies & Sweatshirts -->
                <div class="card hoodies"  style="display:none;">
                    <h6 class="card-title">{{$subsubcat}} Details</h6>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Hoodie Type</label>
                            <input type="text" class="form-control" name="hoodie_type" placeholder="Enter Hoodie Type" value="{{$product->hoodie_type}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Hood Included</label>
                            <input type="text" class="form-control" name="hood_included" placeholder="Enter Hood Included" value="{{$product->hood_included}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Pocket Type</label>
                            <input type="text" class="form-control" name="pocket_type" placeholder="Enter Pocket Type" value="{{$product->pocket_type}}">
                        </div>
                                       
                        
                        <div class="col-md-4">
                            <label class="form-label">Color</label>
                            <!--<input type="text" class="form-control" name="color_name">-->
                            
                            <div class="custom-dropdown">
                                <div class="dropdown-btn" id="selectedColor">
                                    <div class="color-box"></div>
                                    <span style="text-align center">--Select a Color--</span>
                                </div>
                                <div class="dropdown-list" id="dropdownContainer">
                                    <input type="text" class="search-box" id="searchColor" placeholder="Search color...">
                                    <ul id="colorList">
                                        @foreach($colors as $clr)
                                        <li data-color="{{ $clr->hex_code }}" data-name="{{ $clr->color_name }}">
                                            <div class="color-box" style="background: {{ $clr->hex_code }};"></div> {{ $clr->color_name }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            
                            <!-- Hidden input to store the selected color -->
                            <input type="hidden" name="color_name" id="selectedColorInput">

                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fabric</label>
                            <select name="fabric" class="form-control select2" style="height:" value="{{$product->fabric}}">            
                            <option selected disabled>{{$product->fabric}}</option>
                                @foreach($attr as $fab)                                                                    
                                    @if($fab->fabric == Null)                                                                
                                    @else                                      
                                        <option>{{$fab->fabric}}</option>                         
                                    @endif                                                    
                                @endforeach                        
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Pattern</label>
                            <!--<input type="text" class="form-control" name="pattern" placeholder="Enter Pattern">-->
                            
                            
                            <select name="pattern" class="form-control select2" style="height:" value="{{$product->pattern}}">
                                    <option selected disabled>{{$product->pattern}}</option>
                                    
                                 @foreach($attr as $pat)
                                
                                    @if($pat->pattern == Null)
                                       
                                    @else
                                       <option>{{$pat->pattern}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fit Type</label>
                            <!--<input type="text" class="form-control" name="fit_type">-->
                            <select name="fit_type" class="form-control select2" style="height:" value="{{$product->fit_type}}">
                                <option selected disabled>{{$product->fit_type}}</option>
                                 @foreach($attr as $fit)
                                
                                    @if($fit->fit_type == Null)
                                       
                                    @else
                                       <option>{{$fit->fit_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Occasion</label>
                            <select class="form-control select2" name="occasion" value="{{$product->occasion}}">
                                <option selected disabled>{{$product->occasion}}</option>
                                @foreach($attr as $occasion)
                                
                                    @if($occasion->occasion == Null)
                                       
                                    @else
                                       <option>{{$occasion->occasion}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                    </div>
                </div>

                <!--For Jackets and Coats -->
                <div class="card jackets"  style="display:none;">
                    <h6 class="card-title">{{$subsubcat}} Details</h6>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Jacket Type</label>
                            <input type="text" class="form-control" name="jacket_type" placeholder="Enter Jacket Type" value="{{$product->jacket_type}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Closure Type</label>
                            <!--<input type="text" class="form-control" name="closure_type" placeholder="Enter Closure Type">-->
                            
                            <select name="closure_type" class="form-control select2" style="height:" value="{{$product->closure_type}}">
                                <option selected disabled>{{$product->closure_type}}</option>
                                 @foreach($attr as $clo)
                                
                                    @if($clo->clousure_type == Null)
                                       
                                    @else
                                       <option>{{$clo->clousure_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Pocket Details</label>
                            <input type="text" class="form-control" name="pocket_details" placeholder="Enter Pocket Details" value="{{$product->pocket_details}}">
                        </div>
                                       
                        
                        <div class="col-md-4">
                            <label class="form-label">Color</label>
                            <!--<input type="text" class="form-control" name="color_name">-->
                            
                            <div class="custom-dropdown">
                                <div class="dropdown-btn" id="selectedColor">
                                    <div class="color-box"></div>
                                    <span style="text-align center">--Select a Color--</span>
                                </div>
                                <div class="dropdown-list" id="dropdownContainer">
                                    <input type="text" class="search-box" id="searchColor" placeholder="Search color...">
                                    <ul id="colorList">
                                        @foreach($colors as $clr)
                                        <li data-color="{{ $clr->hex_code }}" data-name="{{ $clr->color_name }}">
                                            <div class="color-box" style="background: {{ $clr->hex_code }};"></div> {{ $clr->color_name }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            
                            <!-- Hidden input to store the selected color -->
                            <input type="hidden" name="color_name" id="selectedColorInput">

                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fabric</label>
                            <select name="fabric" class="form-control select2" style="height:" value="{{$product->fabric}}">        
                            <option selected disabled>{{$product->fabric}}</option>
                                @foreach($attr as $fab)                                                               
                                    @if($fab->fabric == Null)                                                                
                                    @else                                     
                                        <option>{{$fab->fabric}}</option>                        
                                    @endif                                                      
                                @endforeach                           
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Pattern</label>
                            <!--<input type="text" class="form-control" name="pattern" placeholder="Enter Pattern">-->
                            
                            
                            <select name="pattern" class="form-control select2" style="height:" value="{{$product->pattern}}">
                                    <option selected disabled>{{$product->pattern}}</option>
                                 @foreach($attr as $pat)
                                
                                    @if($pat->pattern == Null)
                                       
                                    @else
                                       <option>{{$pat->pattern}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fit Type</label>
                            <!--<input type="text" class="form-control" name="fit_type">-->
                            <select name="fit_type" class="form-control select2" style="height:" value="{{$product->fit_type}}">
                                <option selected disabled>{{$product->fit_type}}</option>
                                 @foreach($attr as $fit)
                                
                                    @if($fit->fit_type == Null)
                                       
                                    @else
                                       <option>{{$fit->fit_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Occasion</label>
                            <select class="form-control select2" name="occasion" value="{{$product->occasion}}">
                                <option selected disabled>{{$product->occasion}}</option>
                                @foreach($attr as $occasion)
                                
                                    @if($occasion->occasion == Null)
                                       
                                    @else
                                       <option>{{$occasion->occasion}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                    </div>
                </div>

                <!--For Playsuits -->
                <div class="card jackets"  style="display:none;">
                    <h6 class="card-title">{{$subsubcat}} Details</h6>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Playsuit Type</label>
                            <input type="text" class="form-control" name="playsuit_type" placeholder="Enter Playsuit Type" value="{{$product->playsuit_type}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Sleeve Length</label>
                            <!--<input type="text" class="form-control" name="sleeve_length" placeholder="Enter Sleeve Length">-->
                             
                            <select name="sleeve_length" class="form-control select2" style="height:" value="{{$product->sleeve_length}}">
                                <option selected disabled>{{$product->sleeve_length}}</option>
                                 @foreach($attr as $sleevelen)
                                
                                    @if($sleevelen->sleeve_length == Null)
                                       
                                    @else
                                       <option>{{$sleevelen->sleeve_length}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                     
                        </div>
                                       
                        
                        <div class="col-md-4">
                            <label class="form-label">Color</label>
                            <!--<input type="text" class="form-control" name="color_name">-->
                            
                            <div class="custom-dropdown">
                                <div class="dropdown-btn" id="selectedColor">
                                    <div class="color-box"></div>
                                    <span style="text-align center">--Select a Color--</span>
                                </div>
                                <div class="dropdown-list" id="dropdownContainer">
                                    <input type="text" class="search-box" id="searchColor" placeholder="Search color...">
                                    <ul id="colorList">
                                        @foreach($colors as $clr)
                                        <li data-color="{{ $clr->hex_code }}" data-name="{{ $clr->color_name }}">
                                            <div class="color-box" style="background: {{ $clr->hex_code }};"></div> {{ $clr->color_name }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            
                            <!-- Hidden input to store the selected color -->
                            <input type="hidden" name="color_name" id="selectedColorInput">

                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fabric</label>
                            <select name="fabric" class="form-control select2" style="height:" value="{{$product->fabric}}">                
                            <option selected disabled>{{$product->fabric}}</option>
                                @foreach($attr as $fab)                                                               
                                    @if($fab->fabric == Null)                                                            
                                    @else                                     
                                        <option>{{$fab->fabric}}</option>                             
                                    @endif                                                        
                                @endforeach                           
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Pattern</label>
                            <!--<input type="text" class="form-control" name="pattern" placeholder="Enter Pattern">-->
                            
                            
                            <select name="pattern" class="form-control select2" style="height:" value="{{$product->pattern}}">
                                    <option selected disabled>{{$product->pattern}}</option>
                                 @foreach($attr as $pat)
                                
                                    @if($pat->pattern == Null)
                                       
                                    @else
                                       <option>{{$pat->pattern}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fit Type</label>
                            <!--<input type="text" class="form-control" name="fit_type">-->
                            <select name="fit_type" class="form-control select2" style="height:" value="{{$product->fit_type}}">
                                <option selected disabled>{{$product->fit_type}}</option>
                                 @foreach($attr as $fit)
                                
                                    @if($fit->fit_type == Null)
                                       
                                    @else
                                       <option>{{$fit->fit_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Occasion</label>
                            <select class="form-control select2" name="occasion" value="{{$product->occasion}}">
                                <option selected disabled>{{$product->occasion}}</option>
                                @foreach($attr as $occasion)
                                
                                    @if($occasion->occasion == Null)
                                       
                                    @else
                                       <option>{{$occasion->occasion}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                    </div>
                </div>

                <!--For Shackets -->
                <div class="card shackets"  style="display:none;">
                    <h6 class="card-title">{{$subsubcat}} Details</h6>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Shacket Type</label>
                            <input type="text" class="form-control" name="shackett_type" placeholder="Enter Shacket Type" value="{{$product->shackett_type}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Lining Present</label>
                            <input type="text" class="form-control" name="lining_present" placeholder="Enter Lining Present" value="{{$product->lining_present}}">
                        </div>
                                       
                        
                        <div class="col-md-4">
                            <label class="form-label">Color</label>
                            <!--<input type="text" class="form-control" name="color_name">-->
                            
                            <div class="custom-dropdown">
                                <div class="dropdown-btn" id="selectedColor">
                                    <div class="color-box"></div>
                                    <span style="text-align center">--Select a Color--</span>
                                </div>
                                <div class="dropdown-list" id="dropdownContainer">
                                    <input type="text" class="search-box" id="searchColor" placeholder="Search color...">
                                    <ul id="colorList">
                                        @foreach($colors as $clr)
                                        <li data-color="{{ $clr->hex_code }}" data-name="{{ $clr->color_name }}">
                                            <div class="color-box" style="background: {{ $clr->hex_code }};"></div> {{ $clr->color_name }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            
                            <!-- Hidden input to store the selected color -->
                            <input type="hidden" name="color_name" id="selectedColorInput">

                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fabric</label>
                            <select name="fabric" class="form-control select2" style="height:" value="{{$product->fabric}}">      
                            <option selected disabled>{{$product->fabric}}</option>
                                @foreach($attr as $fab)                                                              
                                    @if($fab->fabric == Null)                                                            
                                    @else                                      
                                        <option>{{$fab->fabric}}</option>                  
                                    @endif                                            
                                @endforeach                            
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Pattern</label>
                            <!--<input type="text" class="form-control" name="pattern" placeholder="Enter Pattern">-->
                            
                            
                            <select name="pattern" class="form-control select2" style="height:" value="{{$product->pattern}}">
                                    <option selected disabled>{{$product->pattern}}</option>
                                 @foreach($attr as $pat)
                                
                                    @if($pat->pattern == Null)
                                       
                                    @else
                                       <option>{{$pat->pattern}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fit Type</label>
                            <!--<input type="text" class="form-control" name="fit_type">-->
                            <select name="fit_type" class="form-control select2" style="height:" value="{{$product->fit_type}}">
                                <option selected disabled>{{$product->fit_type}}</option>
                                 @foreach($attr as $fit)
                                
                                    @if($fit->fit_type == Null)
                                       
                                    @else
                                       <option>{{$fit->fit_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Occasion</label>
                            <select class="form-control select2" name="occasion" value="{{$product->occasion}}">
                                <option selected disabled>{{$product->occasion}}</option>
                                @foreach($attr as $occasion)
                                
                                    @if($occasion->occasion == Null)
                                       
                                    @else
                                       <option>{{$occasion->occasion}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                    </div>
                </div>
                

                <!--For Jeans-->
                
                <div class="card Jeans" style="display:none;">
                    <h6 class="card-title">{{$subsubcat}} Details</h6>
                    <div class="row g-3">            
                        <div class="col-md-4">
                            <label class="form-label">Waist Rise</label>
                            <input type="text" class="form-control" name="waist_rise" placeholder="Enter Waist Rise" value="{{$product->waist_rise}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fit Type</label>
                            <!--<input type="text" class="form-control" name="fit_type" placeholder="Enter Fit Type" value="{{$product->fit_type}}">-->
                            <select name="fit_type" class="form-control select2" style="height:" value="{{$product->fit_type}}">
                                <option selected disabled>{{$product->fit_type}}</option>
                                 @foreach($attr as $fit)
                                
                                    @if($fit->fit_type == Null)
                                       
                                    @else
                                       <option>{{$fit->fit_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Stretchability</label>
                            <input type="text" class="form-control" name="stretchability" placeholder="Enter Stretchability" value="{{$product->stretchability}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Distressed/Non-Distressed</label>
                            <input type="text" class="form-control" name="distressed_non_distressed" placeholder="Enter Distressed/Non-Distressed"  value="{{$product->distressed_non_distressed}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Number of Pockets</label>
                            <input type="text" class="form-control" name="number_of_pockets" placeholder="Enter Number of Pockets" value="{{$product->number_of_pockets}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Closure Type</label>
                            <!--<input type="text" class="form-control" name="closure_type" placeholder="Enter Closure Type">-->
                            
                            <select name="closure_type" class="form-control select2" style="height:" value="{{$product->closure_type}}">
                                <option selected disabled>{{$product->closure_type}}</option>
                                 @foreach($attr as $clo)
                                
                                    @if($clo->clousure_type == Null)
                                       
                                    @else
                                       <option>{{$clo->clousure_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        
                        
                        <div class="col-md-4">
                            <label class="form-label">Color</label>
                            <!--<input type="text" class="form-control" name="color_name">-->
                            
                            <div class="custom-dropdown">
                                <div class="dropdown-btn" id="selectedColor">
                                    <div class="color-box"></div>
                                    <span style="text-align center">--Select a Color--</span>
                                </div>
                                <div class="dropdown-list" id="dropdownContainer">
                                    <input type="text" class="search-box" id="searchColor" placeholder="Search color...">
                                    <ul id="colorList">
                                        @foreach($colors as $clr)
                                        <li data-color="{{ $clr->hex_code }}" data-name="{{ $clr->color_name }}">
                                            <div class="color-box" style="background: {{ $clr->hex_code }};"></div> {{ $clr->color_name }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            
                            <!-- Hidden input to store the selected color -->
                            <input type="hidden" name="color_name" id="selectedColorInput">

                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fabric</label>
                            <select name="fabric" class="form-control select2" style="height:" value="{{$product->fabric}}">           
                            <option selected disabled>{{$product->fabric}}</option>
                                @foreach($attr as $fab)                                                               
                                    @if($fab->fabric == Null)                                                            
                                    @else                                   
                                        <option>{{$fab->fabric}}</option>                       
                                    @endif                                                  
                                @endforeach                          
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Pattern</label>
                            <!--<input type="text" class="form-control" name="pattern" placeholder="Enter Pattern">-->
                            
                            
                            <select name="pattern" class="form-control select2" style="height:" value="{{$product->pattern}}">
                                    <option selected disabled>{{$product->pattern}}</option>
                                 @foreach($attr as $pat)
                                
                                    @if($pat->pattern == Null)
                                       
                                    @else
                                       <option>{{$pat->pattern}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fit Type</label>
                            <!--<input type="text" class="form-control" name="fit_type">-->
                            <select name="fit_type" class="form-control select2" style="height:" value="{{$product->fit_type}}">
                                <option selected disabled>{{$product->fit_type}}</option>
                                 @foreach($attr as $fit)
                                
                                    @if($fit->fit_type == Null)
                                       
                                    @else
                                       <option>{{$fit->fit_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Occasion</label>
                            <select class="form-control select2" name="occasion" value="{{$product->occasion}}">
                                <option selected disabled>{{$product->occasion}}</option>
                                @foreach($attr as $occasion)
                                
                                    @if($occasion->occasion == Null)
                                       
                                    @else
                                       <option>{{$occasion->occasion}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        
                        
                    </div>
                </div>
                
                <!--For Trousers & Capris-->
                
                <div class="card Trousers" style="display:none;">
                    <h6 class="card-title">{{$subsubcat}} Details</h6>
                    <div class="row g-3">            
                        <div class="col-md-4">
                            <label class="form-label">Waistband Type</label>
                            <input type="text" class="form-control" name="waistband_type" placeholder="Enter Waistband Type" value="{{$product->waistband_type}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fit Type</label>
                            <!--<input type="text" class="form-control" name="fit_type" placeholder="Enter Fit Type">-->
                            <select name="fit_type" class="form-control select2" style="height:" value="{{$product->fit_type}}">
                                <option selected disabled>{{$product->fit_type}}</option>
                                 @foreach($attr as $fit)
                                
                                    @if($fit->fit_type == Null)
                                       
                                    @else
                                       <option>{{$fit->fit_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Length</label>
                            <input type="text" class="form-control" name="length" placeholder="Enter Length" value="{{$product->length}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Pattern</label>
                            <!--<input type="text" class="form-control" name="pattern" placeholder="Enter Pattern">-->
                            
                            
                            <select name="pattern" class="form-control select2" style="height:" value="{{$product->pattern}}">
                                    <option selected disabled>{{$product->pattern}}</option>
                                 @foreach($attr as $pat)
                                
                                    @if($pat->pattern == Null)
                                       
                                    @else
                                       <option>{{$pat->pattern}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        
                        
                                       
                        
                        <div class="col-md-4">
                            <label class="form-label">Color</label>
                            <!--<input type="text" class="form-control" name="color_name">-->
                            
                            <div class="custom-dropdown">
                                <div class="dropdown-btn" id="selectedColor">
                                    <div class="color-box"></div>
                                    <span style="text-align center">--Select a Color--</span>
                                </div>
                                <div class="dropdown-list" id="dropdownContainer">
                                    <input type="text" class="search-box" id="searchColor" placeholder="Search color...">
                                    <ul id="colorList">
                                        @foreach($colors as $clr)
                                        <li data-color="{{ $clr->hex_code }}" data-name="{{ $clr->color_name }}">
                                            <div class="color-box" style="background: {{ $clr->hex_code }};"></div> {{ $clr->color_name }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            
                            <!-- Hidden input to store the selected color -->
                            <input type="hidden" name="color_name" id="selectedColorInput">

                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fabric</label>
                            <select name="fabric" class="form-control select2" style="height:" value="{{$product->fabric}}">           
                            <option selected disabled>{{$product->fabric}}</option>
                                @foreach($attr as $fab)                                                              
                                    @if($fab->fabric == Null)                                                            
                                    @else                                      
                                        <option>{{$fab->fabric}}</option>                            
                                    @endif                                                        
                                @endforeach                      
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Pattern</label>
                            <!--<input type="text" class="form-control" name="pattern" placeholder="Enter Pattern">-->
                            
                            
                            <select name="pattern" class="form-control select2" style="height:" value="{{$product->pattern}}">
                                    <option selected disabled>{{$product->pattern}}</option>
                                 @foreach($attr as $pat)
                                
                                    @if($pat->pattern == Null)
                                       
                                    @else
                                       <option>{{$pat->pattern}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fit Type</label>
                            <!--<input type="text" class="form-control" name="fit_type">-->
                            <select name="fit_type" class="form-control select2" style="height:" value="{{$product->fit_type}}">
                                <option selected disabled>{{$product->fit_type}}</option>
                                 @foreach($attr as $fit)
                                
                                    @if($fit->fit_type == Null)
                                       
                                    @else
                                       <option>{{$fit->fit_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Occasion</label>
                            <select class="form-control select2" name="occasion" value="{{$product->occasion}}">
                                <option selected disabled>{{$product->occasion}}</option>
                                @foreach($attr as $occasion)
                                
                                    @if($occasion->occasion == Null)
                                       
                                    @else
                                       <option>{{$occasion->occasion}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        
                    </div>
                </div>
                
                
                <!--For Shorts & Skirts-->
                
                <div class="card Shorts" style="display:none;">
                    <h6 class="card-title">{{$subsubcat}} Details</h6>
                    <div class="row g-3">            
                        <div class="col-md-4">
                            <label class="form-label">Short/Skirt Type</label>
                            <input type="text" class="form-control" name="short_skirt_type" placeholder="Enter Short/Skirt Type" value="{{$product->short_skirt_type}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Waist Rise</label>
                            <input type="text" class="form-control" name="waist_rise" placeholder="Enter Waist Rise" value="{{$product->waist_rise}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Closure Type</label>
                            <!--<input type="text" class="form-control" name="closure_type" placeholder="Enter Closure Type">-->
                            
                            <select name="closure_type" class="form-control select2" style="height:" value="{{$product->closure_type}}">
                                <option selected disabled>{{$product->closure_type}}</option>
                                 @foreach($attr as $clo)
                                
                                    @if($clo->clousure_type == Null)
                                       
                                    @else
                                       <option>{{$clo->clousure_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Length</label>
                            <input type="text" class="form-control" name="length" placeholder="Enter Length" value="{{$product->length}}">
                        </div>
                        
                                                
                                       
                        
                        <div class="col-md-4">
                            <label class="form-label">Color</label>
                            <!--<input type="text" class="form-control" name="color_name">-->
                            
                            <div class="custom-dropdown">
                                <div class="dropdown-btn" id="selectedColor">
                                    <div class="color-box"></div>
                                    <span style="text-align center">--Select a Color--</span>
                                </div>
                                <div class="dropdown-list" id="dropdownContainer">
                                    <input type="text" class="search-box" id="searchColor" placeholder="Search color...">
                                    <ul id="colorList">
                                        @foreach($colors as $clr)
                                        <li data-color="{{ $clr->hex_code }}" data-name="{{ $clr->color_name }}">
                                            <div class="color-box" style="background: {{ $clr->hex_code }};"></div> {{ $clr->color_name }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            
                            <!-- Hidden input to store the selected color -->
                            <input type="hidden" name="color_name" id="selectedColorInput">

                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fabric</label>
                            <select name="fabric" class="form-control select2" style="height:" value="{{$product->fabric}}">            
                            <option selected disabled>{{$product->fabric}}</option>
                                @foreach($attr as $fab)                                                           
                                    @if($fab->fabric == Null)                                                        
                                    @else                                     
                                        <option>{{$fab->fabric}}</option>                          
                                    @endif                                        
                                @endforeach                          
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Pattern</label>
                            <!--<input type="text" class="form-control" name="pattern" placeholder="Enter Pattern">-->
                            
                            
                            <select name="pattern" class="form-control select2" style="height:" value="{{$product->pattern}}">
                                    <option selected disabled>{{$product->pattern}}</option>
                                 @foreach($attr as $pat)
                                
                                    @if($pat->pattern == Null)
                                       
                                    @else
                                       <option>{{$pat->pattern}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fit Type</label>
                            <!--<input type="text" class="form-control" name="fit_type">-->
                            <select name="fit_type" class="form-control select2" style="height:" value="{{$product->fit_type}}">
                                <option selected disabled>{{$product->fit_type}}</option>
                                 @foreach($attr as $fit)
                                
                                    @if($fit->fit_type == Null)
                                       
                                    @else
                                       <option>{{$fit->fit_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Occasion</label>
                            <select class="form-control select2" name="occasion" value="{{$product->occasion}}">
                                <option selected disabled>{{$product->occasion}}</option>
                                @foreach($attr as $occasion)
                                
                                    @if($occasion->occasion == Null)
                                       
                                    @else
                                       <option>{{$occasion->occasion}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        
                        
                    </div>
                </div>


                <!--For Leggings & Tights-->
                <div class="card Leggings" style="display:none;">
                    <h6 class="card-title">{{$subsubcat}} Details</h6>
                    <div class="row g-3">            
                        <div class="col-md-4">
                            <label class="form-label">Legging Type</label>
                            <input type="text" class="form-control" name="legging_type" placeholder="Enter Legging Type" value="{{$product->legging_type}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Waistband Type</label>
                            <input type="text" class="form-control" name="waistband_type" placeholder="Enter Waistband Type" value="{{$product->waistband_type}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Compression Level</label>
                            <input type="text" class="form-control" name="compression_level" placeholder="Enter Compression Level" value="{{$product->compression_level}}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Transparency Level</label>
                            <input type="text" class="form-control" name="transparency_level" placeholder="Enter Transparency Level" value="{{$product->transparency_level}}">
                                                        
                            <select name="transparency_level" class="form-control select2" style="height:">
                                    <option selected disabled>{{$product->pattern}}</option>
                                 @foreach($attr as $pat)
                                
                                    @if($pat->pattern == Null)
                                       
                                    @else
                                       <option>{{$pat->pattern}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        
                                                               
                        
                        <div class="col-md-4">
                            <label class="form-label">Color</label>
                            <!--<input type="text" class="form-control" name="color_name">-->
                            
                            <div class="custom-dropdown">
                                <div class="dropdown-btn" id="selectedColor">
                                    <div class="color-box"></div>
                                    <span style="text-align center">--Select a Color--</span>
                                </div>
                                <div class="dropdown-list" id="dropdownContainer">
                                    <input type="text" class="search-box" id="searchColor" placeholder="Search color...">
                                    <ul id="colorList">
                                        @foreach($colors as $clr)
                                        <li data-color="{{ $clr->hex_code }}" data-name="{{ $clr->color_name }}">
                                            <div class="color-box" style="background: {{ $clr->hex_code }};"></div> {{ $clr->color_name }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            
                            <!-- Hidden input to store the selected color -->
                            <input type="hidden" name="color_name" id="selectedColorInput">

                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fabric</label>
                            <select name="fabric" class="form-control select2" style="height:" value="{{$product->fabric}}">    
                            <option selected disabled>{{$product->fabric}}</option>
                                @foreach($attr as $fab)                                                                
                                    @if($fab->fabric == Null)                                                             
                                    @else                                   
                                      <option>{{$fab->fabric}}</option>                  
                                    @endif                                           
                                @endforeach                            
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Pattern</label>
                            <!--<input type="text" class="form-control" name="pattern" placeholder="Enter Pattern">-->
                            
                            
                            <select name="pattern" class="form-control select2" style="height:" value="{{$product->pattern}}">
                                    <option selected disabled>{{$product->pattern}}</option>
                                 @foreach($attr as $pat)
                                
                                    @if($pat->pattern == Null)
                                       
                                    @else
                                       <option>{{$pat->pattern}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fit Type</label>
                            <!--<input type="text" class="form-control" name="fit_type">-->
                            <select name="fit_type" class="form-control select2" style="height:" value="{{$product->fit_type}}">
                                <option selected disabled>{{$product->fit_type}}</option>
                                 @foreach($attr as $fit)
                                
                                    @if($fit->fit_type == Null)
                                       
                                    @else
                                       <option>{{$fit->fit_type}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Occasion</label>
                            <select class="form-control select2" name="occasion" value="{{$product->occasion}}">
                                <option selected disabled>{{$product->occasion}}</option>
                                @foreach($attr as $occasion)
                                
                                    @if($occasion->occasion == Null)
                                       
                                    @else
                                       <option>{{$occasion->occasion}}</option>
                                    @endif
                                   
                                @endforeach
                            </select>
                            
                        </div>
                        
                        
                    </div>
                </div>


                <!--For Plazos, Churidar & Salwars-->
                
                <div class="card Plazos" style="display:none;">
                    <h6 class="card-title">{{$subsubcat}} Details</h6>
                    <div class="row g-3">            
                        <div class="col-md-4">
                            <label class="form-label">Bottom Type</label>
                            <!--<input type="text" class="form-control" name="bottom_type" placeholder="Enter Bottom Type">-->
                            
                            <select name="bottom_type" class="form-control select2" style="height:" value="{{$product->bottom_type}}">
                        %2