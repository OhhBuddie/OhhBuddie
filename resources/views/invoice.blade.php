<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OHH! BUDDIE - Order Invoice</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #000;
            color: #efc475;
            margin: 0;
            padding: 20px;
            line-height: 1.6;
        }
        
        .invoice-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 30px;
            border: 2px solid #efc475;
            border-radius: 10px;
            background-color: #111;
            box-shadow: 0 0 30px rgba(239, 196, 117, 0.2);
        }
        
        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .company-name {
            font-size: 28px;
            font-weight: 700;
            letter-spacing: 1px;
            color: #efc475;
            margin-bottom: 5px;
        }
        
        .invoice-date {
            font-size: 14px;
            color: #fff;
            margin-bottom: 20px;
        }
        
        .invoice-title {
            text-align: center;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 25px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #efc475;
            padding-bottom: 15px;
            border-bottom: 1px solid #efc475;
        }
        
        .info-section {
            background-color: rgba(239, 196, 117, 0.1);
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 3px solid #efc475;
        }
        
        .section-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #efc475;
        }
        
        .detail-row {
            display: flex;
            margin-bottom: 6px;
        }
        
        .detail-label {
            font-weight: 500;
            width: 100px;
            color: #efc475;
            flex-shrink: 0;
        }
        
        .detail-value {
            color: #fff;
            flex-grow: 1;
            word-break: break-word;
        }
        
        .payment-total {
            background-color: rgba(239, 196, 117, 0.15);
            padding: 15px;
            border-radius: 8px;
            margin-top: 25px;
            text-align: right;
            border-right: 3px solid #efc475;
        }
        
        .total-amount {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 8px;
            color: #efc475;
        }
        
        .payment-method {
            font-size: 16px;
            color: #fff;
        }
        
        .invoice-footer {
            margin-top: 30px;
            text-align: center;
            font-size: 14px;
            color: #efc475;
            border-top: 1px solid #efc475;
            padding-top: 20px;
        }
        
        .thank-you {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #efc475;
        }
        
        .support-text {
            color: #fff;
            font-size: 13px;
        }
        
        
        @page {
            size: A4 portrait;
            margin: 10mm;
        }
    
        @media print {
            .invoice-container {
                max-width: 100%;
                margin: 0;  
                padding: 15px;
                border: 2px solid #efc475 !important;
                background-color: #111 !important;
            }
            body {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
                background-color: #000 !important;
                color: #efc475 !important;
                font-size: 12px;
                line-height: 1.4;
            }
        
            
            .detail-value, .invoice-date, .payment-method, .support-text {
                color: #fff !important;
            }
      
            
            .company-name {
                font-size: 24px;
            }
            
            .invoice-title {
                font-size: 20px;
                margin-bottom: 15px;
                padding-bottom: 10px;
            }
            
            .info-section {
                padding: 10px;
                margin-bottom: 15px;
            }
            
            .section-title {
                font-size: 14px;
                margin-bottom: 8px;
            }
            
            .detail-row {
                margin-bottom: 4px;
            }
            
            .invoice-footer {
                margin-top: 15px;
                padding-top: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <div class="company-name">OHH! BUDDIE</div>
            <div class="invoice-date">{{ \Carbon\Carbon::parse($order->created_at)->format('l, d F Y') }}</div>
        </div>
        
        <div class="invoice-title">ORDER INVOICE</div>
        
        <div class="info-section">
            <div class="section-title">ORDER INFORMATION</div>
            <div class="detail-row">
                <div class="detail-label">Order ID:</div>
                <div class="detail-value">{{ $order->order_id }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Order Date:</div>
                <div class="detail-value">{{ \Carbon\Carbon::parse($order->created_at)->format('l, d F Y - h:i A') }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Status:</div>
                <div class="detail-value">{{ $order->delivery_status }}</div>
            </div>
        </div>
        
        <div class="info-section">
            <div class="section-title">PRODUCT INFORMATION</div>
            <div class="detail-row">
                <div class="detail-label">Product:</div>
                <div class="detail-value">{{ $product_data->product_name }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Brand:</div>
                <div class="detail-value">{{ $brand_name->brand_name }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Size:</div>
                <div class="detail-value">{{ $product_data->size_name }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Color:</div>
                <div class="detail-value">{{ $color_data->color_name }}</div>
            </div>
        </div>
        
        <div class="info-section">
            <div class="section-title">DELIVERY ADDRESS</div>
            <div class="detail-row">
                <div class="detail-label">Name:</div>
                <div class="detail-value">{{ $address_data->name }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Phone:</div>
                <div class="detail-value">{{ $address_data->phone }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Address:</div>
                <div class="detail-value">{{ $address_data->address_line_1 }} {{ $address_data->address_line_2 }} - {{ $address_data->pincode }}</div>
            </div>
        </div>
        
        <div class="info-section">
            <div class="section-title">CONTACT INFORMATION</div>
            <div class="detail-row">
                <div class="detail-label">Phone:</div>
                <div class="detail-value">{{ $address_data->phone }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Email:</div>
                <div class="detail-value">{{ $user_data->email }}</div>
            </div>
        </div>
        
        <div class="payment-total">
            <div class="total-amount">Total Amount: Rs. {{ number_format($orderdetails->price, 2, '.', ',') }}</div>
            <div class="payment-method">Payment Method: {{ $order->payment_type }}</div>
        </div>
        
        <div class="invoice-footer">
            <div class="thank-you">Thank you for your purchase!</div>
            <div class="support-text">For any queries, please contact our customer support.</div>
        </div>
    </div>
</body>
</html>