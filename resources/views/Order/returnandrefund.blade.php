<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Return Item</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
  />
  <style>
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

    .card-option:hover {
      background-color: #2a2a2a;
      transform: scale(1.02);
    }

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
        Size: {{$product_details->size_name}} | â‚¹{{$product_details->portal_updated_price}}
      </div>
    </div>

    <!-- Heading -->
    <div class="heading">Want to return? <span>ðŸ˜Ÿ</span></div>
    <p class="subheading">Don't worry, we are here to help you!</p>
    <div class="divider"></div>
    <p class="subheading" style="color: #EFC475;">Select return reason</p>

    <div id="returnAccordion">
      <!-- Quality Issues -->
      <div class="collapse mt-3" id="qualityCollapse" data-bs-parent="#returnAccordion">
        <div class="sub-reasons">
          <h6 style="color: #EFC475;">Quality issues</h6>
          <p>Poor Quality Product</p>
          <hr class="border-light" />
          <div class="form-check">
            <input class="form-check-input" type="radio" name="quality_reason" id="reason1" />
            <label class="form-check-label" for="reason1">
              Received a poor quality product
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="quality_reason" id="reason2" />
            <label class="form-check-label" for="reason2">
              Product image was better than the actual product
            </label>
          </div>
          <br>
          <input type="file" class="form-control" required>
          <input type="hidden" class="form-control" name="section" value="Quality issues">
        </div>

        
      </div>

      <!-- Size & Fit Issues -->
      <div class="collapse mt-3" id="sizefitCollapse" data-bs-parent="#returnAccordion">
        <div class="sub-reasons">
          <h6 style="color: #EFC475;">Size & Fit Issues</h6>
          <p>Doesn't fit me well</p>
          <hr class="border-light" />
          <div class="form-check">
            <input class="form-check-input" type="radio" name="size_reason" id="reason3" />
            <label class="form-check-label" for="reason3">Size too small</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="size_reason" id="reason4" />
            <label class="form-check-label" for="reason4">Size too big</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="size_reason" id="reason5" />
            <label class="form-check-label" for="reason5">I did not like the fit</label>
          </div>
          
           <br>
          <input type="file" class="form-control" required>
          <input type="hidden" class="form-control" name="section" value="Size & Fit Issues">
        </div>
      </div>

      <!-- Changed My Mind -->
      <div class="collapse mt-3" id="mindCollapse" data-bs-parent="#returnAccordion">
        <div class="sub-reasons">
          <h6 style="color: #EFC475;">Changed My Mind</h6>
          <p>I don't want this product</p>
          <hr class="border-light" />
          <div class="form-check">
            <input class="form-check-input" type="radio" name="mind_reason" id="mind1" />
            <label class="form-check-label" for="mind1">Found a better price on Myntra</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="mind_reason" id="mind2" />
            <label class="form-check-label" for="mind2">Delivery was delayed</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="mind_reason" id="mind3" />
            <label class="form-check-label" for="mind3">Found a better price elsewhere</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="mind_reason" id="mind4" />
            <label class="form-check-label" for="mind4">I do not need it anymore</label>
          </div>
          <br>
          <input type="file" class="form-control" required>
          <input type="hidden" class="form-control" name="section" value="Changed My Mind">
        </div>
      </div>

      <!-- Different Product -->
      <div class="collapse mt-3" id="differentCollapse" data-bs-parent="#returnAccordion">
        <div class="sub-reasons">
          <h6 style="color: #EFC475;">Different Product</h6>
          <p>Not what I ordered</p>
          <hr class="border-light" />
          <div class="form-check">
            <input class="form-check-input" type="radio" name="different_reason" id="diff1" />
            <label class="form-check-label" for="diff1">Received same product, but different color</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="different_reason" id="diff2" />
            <label class="form-check-label" for="diff2">Received same product, but different size</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="different_reason" id="diff3" />
            <label class="form-check-label" for="diff3">Received a completely different product</label>
          </div>
          
          <br>
          <input type="file" class="form-control" required>
          <input type="hidden" class="form-control" name="section" value="Different Product">
        </div>
      </div>

      <!-- Damaged Product -->
      <div class="collapse mt-3" id="damagedCollapse" data-bs-parent="#returnAccordion">
        <div class="sub-reasons">
          <h6 style="color: #EFC475;">Damaged/Used/Stained</h6>
          <p>Not in good condition</p>
          <hr class="border-light" />
          <div class="form-check">
            <input class="form-check-input" type="radio" name="damaged_reason" id="damaged1" />
            <label class="form-check-label" for="damaged1">Product was defective</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="damaged_reason" id="damaged2" />
            <label class="form-check-label" for="damaged2">Product was damaged</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="damaged_reason" id="damaged3" />
            <label class="form-check-label" for="damaged3">Primary packaging damaged</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="damaged_reason" id="damaged4" />
            <label class="form-check-label" for="damaged4">Product looked old</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="damaged_reason" id="damaged5" />
            <label class="form-check-label" for="damaged5">Product was dirty and had stains</label>
          </div>
          <br>
          <input type="file" class="form-control" required>
          <input type="hidden" class="form-control" name="section" value="Damaged/Used/Stained">
        </div>
      </div>
    </div>

    <!-- Option Buttons -->
    <div class="row g-3 mt-4">
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
</body>
</html>