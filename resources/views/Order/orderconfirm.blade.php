<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Cormorant+Garamond:wght@600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Montserrat', sans-serif;
            background: #000;
            color: #f8f8f8;
            min-height: 100vh;
            padding: 0;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: linear-gradient(to bottom right, rgba(30, 30, 30, 0.8), rgba(0, 0, 0, 0.9)), 
                              url("data:image/svg+xml,%3Csvg width='20' height='20' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-opacity='0.03' fill-rule='evenodd'%3E%3Ccircle cx='3' cy='3' r='3'/%3E%3Ccircle cx='13' cy='13' r='3'/%3E%3C/g%3E%3C/svg%3E");
        }
        .page-container {
            width: 100%;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            /* padding: 40px 20px; */
        }
        .card {
            max-width: 800px;
            width: 100%;
            background: linear-gradient(145deg, #0a0a0a, #121212);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(239, 196, 117, 0.15), 
                        0 8px 20px rgba(0, 0, 0, 0.2),
                        inset 0 0 0 1px rgba(255, 255, 255, 0.05);
            position: relative;
        }
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, rgba(239, 196, 117, 0), rgba(239, 196, 117, 0.8), rgba(239, 196, 117, 0));
        }
        .header {
            padding: 40px 40px 30px;
            text-align: center;
            position: relative;
        }
        .header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 15%;
            right: 15%;
            height: 1px;
            background: linear-gradient(90deg, rgba(239, 196, 117, 0), rgba(239, 196, 117, 0.5), rgba(239, 196, 117, 0));
        }
        h1 {
            font-family: 'Cormorant Garamond', serif;
            color: #efc475;
            font-size: 52px;
            margin-bottom: 5px;
            letter-spacing: 1px;
            font-weight: 700;
            text-shadow: 0 2px 10px rgba(239, 196, 117, 0.2);
        }
        .subtitle {
            color: rgba(239, 196, 117, 0.9);
            font-size: 16px;
            font-weight: 300;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 15px;
        }
        .order-id {
            display: inline-block;
            padding: 8px 16px;
            background: rgba(239, 196, 117, 0.05);
            border-radius: 8px;
            font-weight: 500;
            margin: 15px 0;
            color: rgba(239, 196, 117, 0.9);
            letter-spacing: 1px;
            border: 1px dashed rgba(239, 196, 117, 0.3);
            font-size: 14px;
        }
        .content {
            padding: 30px 40px 40px;
        }
        #countdown {
            font-size: 16px;
            color: #ff6b35;
            font-weight: 600;
            margin: 0 0 30px;
            padding: 12px 15px;
            background: rgba(255, 107, 53, 0.1);
            border-radius: 10px;
            display: inline-block;
            border-left: 3px solid rgba(255, 107, 53, 0.5);
            text-align: center;
        }
        .products {
            margin-bottom: 35px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background: rgba(20, 20, 20, 0.7);
        }
        thead {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        th {
            background: rgba(239, 196, 117, 0.9);
            color: #000;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 1px;
            padding: 15px 20px;
            text-align: left;
        }
        th:first-child {
            border-top-left-radius: 15px;
        }
        th:last-child {
            border-top-right-radius: 15px;
        }
        td {
            padding: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            vertical-align: middle;
        }
        tr:last-child td {
            border-bottom: none;
        }
        tr:hover {
            background: rgba(239, 196, 117, 0.03);
        }
        .product-img {
            width: 80px;
            height: 80px;
            object-fit: fill;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(239, 196, 117, 0.2);
            transition: transform 0.3s ease;
        }
        tr:hover .product-img {
            transform: scale(1.05);
        }
        .product-name {
            font-weight: 500;
            color: rgba(255, 255, 255, 0.9);
            font-size: 16px;
        }
        .product-size {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.5);
            margin-top: 5px;
        }
        .price {
            font-weight: 600;
            color: #efc475;
            font-size: 16px;
        }
        .order-summary {
            background: rgba(20, 20, 20, 0.7);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }
        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        .summary-row:last-child {
            border-bottom: none;
        }
        .summary-label {
            color: rgba(255, 255, 255, 0.7);
            font-size: 14px;
        }
        .summary-value {
            font-weight: 500;
            color: rgba(255, 255, 255, 0.9);
        }
        .total-row {
            display: flex;
            justify-content: space-between;
            padding: 15px 0 10px;
            margin-top: 5px;
            border-top: 1px dashed rgba(239, 196, 117, 0.3);
        }
        .total-label {
            font-size: 16px;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.9);
        }
        .total-value {
            font-size: 20px;
            font-weight: 700;
            color: #efc475;
        }
        .buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 30px;
        }
        .btn {
            display: inline-block;
            padding: 14px 30px;
            text-decoration: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
            letter-spacing: 1px;
            text-transform: uppercase;
            cursor: pointer;
        }
        .btn-primary {
            background: linear-gradient(135deg, #efc475, #e0a84e);
            color: #000;
            box-shadow: 0 4px 15px rgba(239, 196, 117, 0.3);
        }
        .btn-secondary {
            background: transparent;
            color: #efc475;
            border: 1px solid rgba(239, 196, 117, 0.5);
        }
        .btn:hover {
            transform: translateY(-3px);
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #e0a84e, #efc475);
            box-shadow: 0 8px 20px rgba(239, 196, 117, 0.4);
        }
        .btn-secondary:hover {
            background: rgba(239, 196, 117, 0.1);
            border-color: rgba(239, 196, 117, 0.8);
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: rgba(255, 255, 255, 0.5);
            font-size: 13px;
        }
        @media (max-width: 768px) {
            .card {
                border-radius: 15px;
            }
            .header {
                padding: 30px 20px 20px;
            }
            h1 {
                font-size: 42px;
            }
            .content {
                padding: 20px;
            }
            .product-img {
                width: 60px;
                height: 60px;
            }
            th, td {
                padding: 8px;
                text-align: center;
            }
            .buttons {
                flex-direction: column;
                gap: 10px;
            }
            .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    
   @php
        use Illuminate\Support\Facades\DB;
        use Illuminate\Support\Facades\Auth;
    
        // Fetch the latest order for the logged-in user
        $order = DB::table('orders')
            ->where('user_id', Auth::id())
            ->latest('id')
            ->first();
    
        // Initialize total price
        
         $orderdetails = DB::table('orderdetails')
            ->where('order_id', $order->id)
            ->latest()
            ->get();
            
        
         $price = DB::table('orderdetails')
            ->where('order_id', $order->id)
            ->select('price', 'product_id') // Get the price of the order
            ->latest()
            ->first();
        
        
        $priceValue = $price ? (float) $price->price : 0.00; // Convert to float to ensure correct formatting
        

            
            
        $order_data = DB::table('orderdetails')->where('order_id',$order->id)->latest()->get();

    @endphp

    
    <div class="page-container">
        <div class="card">
            <div class="header">
                <h1>Thank You!</h1>
                <p class="subtitle">For Your Order</p>
                <div class="order-id">ORDER ID: {{ $order->order_id }}</div>
            </div>
            
            <div class="content">
                <center><div id="countdown">Order Arriving In: 69 Min</div></center>
                
                <div class="products">
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orderdetails as $product)
                            
                            @php
                                    $products = DB::table('products')
                                                    ->where('id', $product->product_id)
                                                    ->select('product_name', 'portal_updated_price', 'images', 'size_name')
                                                    ->latest()
                                                    ->first();
                                                    
                            
                            @endphp
                                <tr>
                                    <td><img class="product-img" src="{{ json_decode($products->images)[0] }}" alt="product_Image"></td>
                                    <td>
                                        <div class="product-name">{{$products->product_name}}</div>
                                        <div class="product-size">Size: {{ $products->size_name}}</div>
                                    </td>
                                    <td class="price">Rs. {{ number_format($products->portal_updated_price, 2) }}</td> 
                                    <td>{{$product->delivery_status}}</td>
                                </tr>
                            @endforeach
                       
                        </tbody>
                    </table>
                </div>
                
                <div class="order-summary">
                    <div class="summary-row">
                        <div class="summary-label">Subtotal</div>
                        <div class="summary-value">Rs. {{ number_format($priceValue, 2) }}</div>
                    </div>
                    <div class="summary-row">
                        <div class="summary-label">Shipping</div>
                        <div class="summary-value">Rs. {{$orderdetails->shipping_cost ?? 0.00}} </div>
                    </div>
                    {{-- <div class="summary-row">
                        <div class="summary-label">Tax</div>
                        <div class="summary-value">Rs. 0.00</div>
                    </div> --}}
                    <div class="total-row">
                        <div class="total-label">Total</div>
                        <div class="total-value">Rs. {{ number_format($priceValue, 2) }}</div>
                    </div>
                </div>
                
                <div class="buttons">
                    <a href="/" class="btn btn-primary">Continue Shopping</a>
                    <!-- <a href="#" class="btn btn-secondary">View Order Status</a> -->
                </div>
                
      
            </div>
        </div>
    </div>

<script>
    // Get order creation time from PHP
    let orderCreatedAt = new Date("{{ $order->created_at }}"); // Fetch order created time
    let currentTime = new Date(); // Get current time
    let diffInSeconds = Math.max(0, 69 * 60 - Math.floor((currentTime - orderCreatedAt) / 1000)); 

    function updateCountdown() {
        let countdownElement = document.getElementById("countdown");
        let buttonElement = document.querySelector(".btn-primary");

        let minutes = Math.floor(diffInSeconds / 60);
        let seconds = diffInSeconds % 60;
        countdownElement.innerText = `Time Left: ${minutes} Min ${seconds < 10 ? '0' + seconds : seconds} Sec`;

        if (diffInSeconds > 0) {
            diffInSeconds--;
            setTimeout(updateCountdown, 1000);
        } else {
            countdownElement.innerText = "Order Arrived!";
            countdownElement.style.color = "green"; // Change text color to green

            // Change button color to green
            buttonElement.style.backgroundColor = "green";
            buttonElement.style.borderColor = "green";
        }
    }

    updateCountdown();
</script>

<script>
    // Get order details from PHP
    let orderCreatedAt = new Date("{{ $order->created_at }}"); // Order creation time
    let currentTime = new Date(); // Current time
    let timeDiff = Math.floor((currentTime - orderCreatedAt) / 1000); // Time difference in seconds

    let fiveMinutes = 5 * 60; // 5 minutes in seconds

    function checkAndUpdateOrderStatus() {
        if ("{{ $order->order_status }}" === "Order Confirmed" && timeDiff >= fiveMinutes) {
            // Send AJAX request to update order status to 'Packed'
            fetch("{{ route('update.order.status', $order->id) }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ order_status: "Packed" })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById("order-status").innerText = "Packed"; // Update status in UI
                }
            })
            .catch(error => console.error("Error updating order status:", error));
        } else {
            setTimeout(checkAndUpdateOrderStatus, 1000); // Check every second
        }
    }

    checkAndUpdateOrderStatus(); // Start checking

</script>
</body>
</html>