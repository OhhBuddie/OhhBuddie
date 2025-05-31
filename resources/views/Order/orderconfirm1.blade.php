<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
   <link rel="icon" type="image/x-icon" href="https://pub-859cf3e1f0194751917386af714f48e5.r2.dev/Ohbuddielogo.png">

    <title>Order Tracking</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-md mx-auto bg-white shadow-md rounded-b-lg ">
        
        <!-- Map Section -->
        <div class="relative">
            <img src="https://todocodigo.net/img/626.jpg" alt="Map" class="w-full">
            <a href="/welcome" class="absolute top-4 left-4 p-2 rounded-full shadow-md" style="background-color: #efc475;">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10l9-7 9 7M4 10v10h16V10" />
                </svg>
            </a>
        </div>
        

    </div>

    <!-- Info Sections -->
    <div class="p-4 shadow-md rounded-md bg-black" style="border-top-left-radius: 30px;
    border-top-right-radius: 30px;">

        <div class="text-white text-center p-3 rounded-md shadow-sm border mb-3" style="background-color: #efc475;">
            <p class="text-sm">Order is confirmed</p>
            <p class="text-lg font-semibold">Arriving in 15 minutes</p>
        </div>
            
            <div class="bg-white p-3 rounded-md flex items-center shadow-sm border mb-3">
                <div class="flex items-center gap-2">
                    <div class="icon">🧑‍🚚</div>
                    <div>
                        <p class="text-sm font-semibold">We'll assign a delivery partner as soon as your order is packed</p>
                    </div>
                </div>
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
