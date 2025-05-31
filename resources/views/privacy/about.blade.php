<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
   <link rel="icon" type="image/x-icon" href="https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Ohbuddielogo.png">

    <title>About Us</title>
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
        .contact-info {
            margin-top: 20px;
            padding: 15px;
            background-color: #f1f1f1;
            border-radius: 5px;
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
        <h1>About Us</h1>
        <p><strong>Ohh! Buddie</strong> comes under <strong>Fashionsta Technologies Private Limited</strong>, where we are on a mission to build India’s one and only affordable fashion-quick commerce brand. With trending styles, we are delivering fashion in <strong>69 minutes</strong>. Along with this, we have introduced our revolutionary <strong>Try-Out feature</strong>, allowing users to try products before they buy. We aim to build a unique & largest fashion community in India within the next 2 years.</p>
        
        <h2>Mission</h2>
        <p>Redefining the online fashion shopping experience by empowering <strong>Micro-Small-Medium-Enterprises</strong> and delivering high-end quality products with unmatched speed and an innovative try-on feature along with <strong>69-minute delivery</strong> in Kolkata.</p>
        
        <h2>Vision</h2>
        <p>To become India's one and only high-quality and affordable fashion e-commerce & quick-commerce marketplace.</p>
        
        <h2>Our Values</h2>
        <ul>
            <li>Effective Team Collaboration</li>
            <li>Alignment With One Unified Goal</li>
            <li>Providing a Seamless Online Shopping Experience</li>
            <li>Building a Friendly Work Culture</li>
        </ul>
        
        <div class="contact-info">
            <h2>Fashionsta Technologies Private Limited</h2>
            <p><strong>Address:</strong> 2b, Sushil Sen Road, Kolkata - 700025, West Bengal</p>
            <p><strong>Email:</strong> <a href="mailto:support@ohhbuddie.com">support@ohhbuddie.com</a></p>
            <p><strong>CIN:</strong> U47910WB2025PTC277434</p>
        </div>
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
