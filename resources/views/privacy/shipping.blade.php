<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
   <link rel="icon" type="image/x-icon" href="https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Ohbuddielogo.png">

    <title>Shipping Policies</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            /*padding: 20px;*/
            background-color: #f9f9f9;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            /*border-radius: 5px;*/
            /*box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);*/
        }
        h1, h2 {
            text-align: center;
            color: #333;
        }
        p, li {
            font-size: 16px;
            line-height: 1.6;
            color: #333;
        }
        ul {
            padding-left: 20px;
        }
        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }
            h1, h2 {
                font-size: 20px;
            }
            p, li {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Shipping Policies</h1>
        <p><strong>Fashionsta Technologies Private Limited (Ohh! Buddie)</strong> All orders are delivered within 2-3 business days. Orders are not shipped or delivered
on weekends or holidays. If we are experiencing a high volume of orders, shipments
may be delayed by a few days. Please allow additional days in transit for delivery. If
there will be a significant delay in the shipment of your order, we will contact you via
email or phone. </p>
        
         
        <!--<h2>Return Policy</h2>-->
        <!--<p>The product must be returned within <strong>7 days</strong> from the date of delivery. The product must be returned with all tags, original packaging, courier receipt, invoice, and other relevant documents.</p>-->
        
        <!--<h2>Refund Policy</h2>-->
        <!--<p>Once the product is received successfully by the company, <strong>Fashionsta Technologies Private Limited</strong> will Credited the refund within <strong>1-2 working days</strong> to the customer's source account or chosen method of refund.</p>-->
        
        <!--<h2>Cancellation Policy</h2>-->
        <!--<p>Customers can <strong>cancel</strong> an order only before it has been shipped/dispatched. Once the product has been shipped, cancellation is not possible. However, returns are allowed for all eligible orders.</p>-->
    </div>


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
</body>
</html>
