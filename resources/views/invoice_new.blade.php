<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{$inv_id}}</title>
    <style>
        body {
            font-family: "Times New Roman";
            font-size: 10px;
            margin: 7px;
            line-height: 1.3;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            position: relative;
        }
        h1 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
            padding-bottom: 10px;
        }
        .header {
            position: relative;
            margin-bottom: 20px;
        }
        .logo {
            position: absolute;
            top: -50;
            right: 0;
            width: 80px;
        }
        .barcode {
            text-align: right;
            margin-top: -35px;
        }
        .barcode img {
            width: 200px;
            height: 70px;
        }
        .barcode p {
            margin: 0;
            text-align: center;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px 8px;
            text-align: left;
            vertical-align: top;
        }
        .invoice-details {
            display: flex;
            justify-content: space-between;
        }
        .invoice-details div {
            width: 48%;
        }
        .address-blocks {
            display: flex;
            justify-content: space-between;
        }
        .address-block {
            width: 48%;
        }
        .product-table th {
            background-color: #f9f9f9;
            font-weight: bold;
        }
        .total-row td {
            font-weight: bold;
        }
        .signature-section {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }
        .signature {
            width: 68%;
            height:70px;
        }
        .signature img {
            width: 180px;
            height:60px;
            margin-top: 10px;
        }
        .qr-code {
            text-align: right;
            margin-top:-120px;
        }
        .qr-code img {
            width: 130px;
        }
        .footer {
            margin-top: 20px;
            border-top: 1px solid #000;
            padding-top: 10px;
            font-size: 11px;
        }
        .ohhbuddie-logo {
            text-align: right;
            margin-top: 20px;
        }
        .ohhbuddie-logo img {
            width: 30px;
        }
        .declaration {
            margin-top: 15px;
        }
        .declaration-title {
            font-weight: bold;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Tax Invoice</h1>
            <div class="logo">
                <img src="{{ asset('public/assets/images/logo/logo_showloom.png') }}" alt="OhhBuddie" width="120">
            </div>
            <!--<div class="barcode">-->
            <!--    <img src="https://idlabelinc.com/wp-content/uploads/2018/11/Code-128A.jpg" alt="Barcode">-->
            <!--</div>-->
        </div>
           @php
                 $registered_state = DB::table('states')->where('id',$seller_detail->registered_state)->latest()->first();
                 $registered_city = DB::table('cities')->where('id',$seller_detail->registered_city)->latest()->first();
                 
                 $warehouse_state = DB::table('states')->where('id',$seller_detail->warehouse_state)->latest()->first();
                 $warehouse_city = DB::table('cities')->where('id',$seller_detail->warehouse_city)->latest()->first();
                 
                 $customer_state = DB::table('states')->where('id',$address_data->state)->latest()->first();
                 $customer_city = DB::table('cities')->where('id',$address_data->city)->latest()->first();
                @endphp
        <table>
            <tr>
                <td style="border:none;"><strong>Invoice Number:</strong> {{$inv_id}}</td>
                <!--<td style="border:none; text-align:right"><strong>PacketID:</strong> 8403007541</td>-->
            </tr>
            <tr>
                <td style="border:none;"><strong>Order Number:</strong> {{$odr_data->order_id}}</td>
                <td style="border:none; text-align:right"><strong>Invoice Date:</strong> {{\Carbon\Carbon::parse($odr_data->created_at)->format('d M Y')}}</td>
            </tr>
            <tr>
                <td style="border:none;"><strong>Nature of Transaction:</strong> Intra-State</td>
                <td style="border:none; text-align:right"><strong>Order Date:</strong> {{\Carbon\Carbon::parse($odr_data->created_at)->format('d M Y')}}</td>
            </tr>
            <tr>
                <td style="border-top:none;border-right:none;border-left:none;"><strong>Place of Supply:</strong> {{$customer_state->name}}</td>
                <td style="border-top:none;border-right:none;border-left:none; text-align:right"><strong>Nature of Supply:</strong> Goods</td>
            </tr>
        </table>

        <table>
            <tr>
                <td colspan="2" style="border:none;"><strong>Bill to / Ship to:</strong></td>
                <td style="border:none;"><strong>Customer Type:</strong> Registered</td>
            </tr>
            <tr>
                <td colspan="3" style="border:none;">{{$address_data->address_line_1}}, {{$address_data->address_line_2}}, {{$address_data->locality}},{{$customer_city->name}},{{$customer_state->name}},{{$address_data->pincode}}</td>
            </tr>
            <tr>
                <td style="border:none;"><strong>Bill From:</strong></td>
                <td colspan="2" style="border:none;"><strong>Ship From:</strong></td>
            </tr>
            <tr>
     
                <td style="border:none;"><b>{{$seller_detail->company_name}}</b><br>
                    {{$seller_detail->warehouse_address1}}, {{$seller_detail->warehouse_address2}}, {{$seller_detail->warehouse_address1}}, {{$seller_detail->warehouse_address1}}, {{$warehouse_city->name}}, {{$warehouse_state->name}}</td>
                <td colspan="2" style="border:none;"><b>{{$seller_detail->company_name}}</b><br>
                    {{$seller_detail->warehouse_address1}}, {{$seller_detail->warehouse_address2}}, {{$seller_detail->warehouse_address1}}, {{$seller_detail->warehouse_address1}}, {{$warehouse_city->name}}, {{$warehouse_state->name}}</td>
            </tr>
            <tr>
                <td colspan="3" style="border-top:none;border-right:none;border-left:none;"><strong>GSTIN Number:</strong> {{$seller_detail->gst_number}}</td>
            </tr>
        </table>

        <table class="product-table">
            <thead>
                <tr>
                    <th style="border-top:none;border-right:none;border-left:none;">Qty</th>
                    <th style="border-top:none;border-right:none;border-left:none;">Gross Amount</th>
                    <th style="border-top:none;border-right:none;border-left:none;">Discount</th>
                    <th style="border-top:none;border-right:none;border-left:none;">Other Charges</th>
                    <th style="border-top:none;border-right:none;border-left:none;">Taxable Amount</th>
                    <th style="border-top:none;border-right:none;border-left:none; width:50px;">CGST</th>
                    <th style="border-top:none;border-right:none;border-left:none;">SGST</th>
                    <th style="border-top:none;border-right:none;border-left:none;">IGST</th>
                    <th style="border-top:none;border-right:none;border-left:none;">Total Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="9" style="border:none;"><strong>{{$product_detail->sku}} - {{$product_detail->product_name}}, Size: {{$product_detail->size_name}}</strong><br>
                    <strong>HSN:</strong> {{$product_detail->hsn}}, {{$product_detail->gst_rate/2}}% CGST, {{$product_detail->gst_rate/2}}% SGST,</td>
                </tr>
                <tr>
                    <td style="border-top:none;border-right:none;border-left:none;">1</td>
                    <td style="border-top:none;border-right:none;border-left:none;">Rs. {{ number_format($product_detail->maximum_retail_price, 2, '.', ',') }}</td>
                    <td style="border-top:none;border-right:none;border-left:none;">Rs. {{ number_format($product_detail->maximum_retail_price - $finalAmount, 2, '.', ',') }}</td>
                    <td style="border-top:none;border-right:none;border-left:none;">Rs. 0.00</td>
                    <td style="border-top:none;border-right:none;border-left:none;">Rs. {{ number_format($taxableAmount, 2, '.', ',') }}</td>
                    <td style="border-top:none;border-right:none;border-left:none;">Rs. {{ number_format($cgst, 2, '.', ',') }}</td>
                    <td style="border-top:none;border-right:none;border-left:none;">Rs. {{ number_format($sgst, 2, '.', ',') }}</td>
                    <td style="border-top:none;border-right:none;border-left:none;">--</td>
                    <td style="border-top:none;border-right:none;border-left:none;">Rs. {{ number_format($finalAmount, 2, '.', ',') }}</td>

                </tr>
                <tr class="total-row text-center">
                    <td style="border-top:none;border-right:none;border-left:none;">TOTAL</td>
                    <td style="border-top:none;border-right:none;border-left:none;">Rs. {{ number_format($product_detail->maximum_retail_price, 2, '.', ',') }}</td>
                    <td style="border-top:none;border-right:none;border-left:none;">Rs. {{ number_format($product_detail->maximum_retail_price - $finalAmount, 2, '.', ',') }}</td>
                    <td style="border-top:none;border-right:none;border-left:none;">Rs. 0.00</td>
                    <td style="border-top:none;border-right:none;border-left:none;">Rs. {{ number_format($taxableAmount, 2, '.', ',') }}</td>
                    <td style="border-top:none;border-right:none;border-left:none;">Rs. {{ number_format($cgst, 2, '.', ',') }}</td>
                    <td style="border-top:none;border-right:none;border-left:none;">Rs. {{ number_format($sgst, 2, '.', ',') }}</td>
                    <td style="border-top:none;border-right:none;border-left:none;">--</td>
                    <td style="border-top:none;border-right:none;border-left:none;">Rs. {{ number_format($finalAmount, 2, '.', ',') }}</td>

                </tr>
            </tbody>
        </table>

        <div class="signature-section">
            <div class="signature">
                <strong>{{$seller_detail->company_name}}</strong>
                <br>
                <img src="https://essentials.pixfort.com/seo-elementor/wp-content/uploads/sites/43/2020/11/signature-300x222.jpg" alt="Signature">
                <p>Authorized Signatory</p>
            </div>
            <div class="qr-code">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/QR_code_for_mobile_English_Wikipedia.svg/250px-QR_code_for_mobile_English_Wikipedia.svg.png" alt="QR Code">
            </div>
        </div>

        <div class="declaration">
            <p class="declaration-title">DECLARATION</p>
            <p>The goods sold as part of this shipment are intended for end-user consumption and are not for retail sale and are not.</p>
        </div>

        <div class="footer" style="border-bottom: 1px solid #000;">
            <p><strong>Reg Address:</strong> {{$seller_detail->registered_address1}}, {{$seller_detail->registered_address2}}, {{$seller_detail->registered_address1}}, {{$seller_detail->registered_address1}}, {{$registered_city->name}}, {{$registered_state->name}}</p>
            
            <p>If you have any questions, feel free to connect customer care at +91 90514 40765 or use Contact Us section in our App, or log on to www.ohhbuddie.com/contact-us</p>

        </div>
    </div>
</body>
</html>