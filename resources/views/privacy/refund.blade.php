<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
   <link rel="icon" type="image/x-icon" href="https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Ohbuddielogo.png">

    <title>Cancellation & Refund Policy</title>
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
        h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
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
            h1 {
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
        <!--<h1>Cancellation & Refund Policy</h1>-->
        <!--<p><strong>Last updated on 31-03-2025 10:53:44</strong></p>-->
        <!--<p>FASHIONSTA TECHNOLOGIES PRIVATE LIMITED believes in helping its customers as much as possible and therefore has a liberal cancellation policy.</p>-->
        <!--<ul>-->
        <!--    <li>Cancellations will be considered only if the request is made immediately after placing the order. However, if the order has been communicated to the vendors/merchants and they have started shipping, cancellation may not be possible.</li>-->
            
        <!--    <li>If you receive damaged or defective items, please report it to our Customer Service team within <strong>7 days</strong> of receiving the product. The request will be entertained only after verification by the merchant.</li>-->
        <!--    <li>If the product received is not as shown on the site or as per your expectations, contact our customer service within <strong>7 days</strong> for resolution.</li>-->
        <!--    <li>For products with a manufacturer warranty, kindly contact the manufacturer directly.</li>-->
        <!--    <li>If a refund is approved by FASHIONSTA TECHNOLOGIES PRIVATE LIMITED, it will be processed within <strong>1-2 days</strong>.</li>-->
        <!--</ul>-->
        <!-- <h2>Return Policy</h2>-->
        <!--<p>The product must be returned within <strong>7 days</strong> from the date of delivery. The product must be returned with all tags, original packaging, courier receipt, invoice, and other relevant documents.</p>-->
        
        <!--<h2>Refund Policy</h2>-->
        <!--<p>Once the product is received successfully by the company, <strong>Fashionsta Technologies Private Limited</strong> will Credited the refund within <strong>1-2 working days</strong> to the customer's source account or chosen method of refund.</p>-->
        
        
        <h2>Return and Refund policy</h2> 
        <p>
            
        We have a 5-day return policy, which means you have 5 days after receiving your item
        to request a return.
        Once the return product is received it will be inspected and the return will be approved
        within 2 days
        </p>
        
        <h2>REFUNDS</h2>
        <p>We will notify you once we’ve received and inspected your return, and let you know if
the refund was approved or not. If approved, you’ll be automatically refunded on your
original payment method within 10 business days. Please remember it can take some
time for your bank or credit card company to process and post the refund too.</p>
        
        
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
