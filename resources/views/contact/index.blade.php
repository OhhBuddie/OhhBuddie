<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>Contact Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
    
        @media screen and (min-width: 778px){
            body{
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
                background: black !important;
            }
            form{
                display: flex !important;
                justify-content: center !important;
                align-items: center !important;
                width: 40% !important;
            }
            .py-16{
                padding-top: 2rem !important;
                padding-bottom: 2rem !important;
            }
        }
        
        
    </style>
</head>
<body class="bg-gray-100">

    <!-- Flash Success Message -->
    @if(session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: "Thank You for Contacting Us!",
                    text: "We will reach out to you soon.",
                    icon: "success",
                    confirmButtonText: "OK",
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "https://ohhbuddie.com/welcome";
                    }
                });
            });
        </script>
    @endif

    <form action="{{ route('contacts.store') }}" method="POST">
    @csrf
    <section class="py-16 px-4">
        <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-2xl overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                
                <!-- Left Side (Image) -->
                <div class="relative">
                    <!--<img src="https://pagedone.io/asset/uploads/1696488602.png" alt="Contact Us" -->
                    <!--    class="w-full h-full object-cover lg:rounded-l-2xl">-->
                    <h1 class="absolute top-8 left-8 text-4xl md:text-5xl font-bold text-white">Contact Us</h1>
                    
                    
                    
                <div class="relative bg-light-900 p-10 text-dark" style="color:black">
                    <h1 class="text-4xl font-bold mb-6">Contact Us</h1>
                
                    <div class="space-y-6" style="color:black">
                        <!-- Live Chat -->
                        <div class="flex items-start space-x-4">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" class="fill-gray-400">
                                    <path d="M20 2H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h3v3.766L13.277 18H20c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2zm0 14h-7.277L9 18.234V16H4V4h16v12z"></path>
                                    <circle cx="15" cy="10" r="2"></circle>
                                    <circle cx="9" cy="10" r="2"></circle>
                                </svg>
                            </div>
                            <div>
                                <h5 class="text-lg font-semibold">Live Chat</h5>
                                <p class="text-dark-300 text-sm">Have a query to our service? We would be more than happy to assist you. Please let us know your query and our team will get back to you shortly.</p>
                            </div>
                        </div>
                
                        <!-- Phone Support -->
                        <!--<div class="flex items-start space-x-4">-->
                        <!--    <div>-->
                        <!--        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" class="fill-gray-400">-->
                        <!--            <path d="M16.57 22a2 2 0 0 0 1.43-.59l2.71-2.71a1 1 0 0 0 0-1.41l-4-4a1 1 0 0 0-1.41 0l-1.6 1.59a7.55 7.55 0 0 1-3-1.59 7.62 7.62 0 0 1-1.59-3l1.59-1.6a1 1 0 0 0 0-1.41l-4-4a1 1 0 0 0-1.41 0L2.59 6A2 2 0 0 0 2 7.43 15.28 15.28 0 0 0 6.3 17.7 15.28 15.28 0 0 0 16.57 22zM6 5.41 8.59 8 7.3 9.29a1 1 0 0 0-.3.91 10.12 10.12 0 0 0 2.3 4.5 10.08 10.08 0 0 0 4.5 2.3 1 1 0 0 0 .91-.27L16 15.41 18.59 18l-2 2a13.28 13.28 0 0 1-8.87-3.71A13.28 13.28 0 0 1 4 7.41zM20 11h2a8.81 8.81 0 0 0-9-9v2a6.77 6.77 0 0 1 7 7z"></path>-->
                        <!--        </svg>-->
                        <!--    </div>-->
                        <!--    <div>-->
                        <!--        <h5 class="text-lg font-semibold"><a href="tel:+917890404765" class="text-dark-200 hover:text-yellow-400">+91 7890404765</a></h5>-->
                        <!--        <p class="text-dark-300 text-sm">For queries, feedback, or complaints, contact our 24x7 support.</p>-->
                        <!--    </div>-->
                        <!--</div>-->
                
                        <!-- WhatsApp -->
                        <div class="flex items-start space-x-4">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" class="fill-gray-400">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18.403 5.633A8.919 8.919 0 0 0 12.053 3c-4.948 0-8.976 4.027-8.978 8.977 0 1.582.413 3.126 1.198 4.488L3 21.116l4.759-1.249a8.981 8.981 0 0 0 4.29 1.093h.004c4.947 0 8.975-4.027 8.977-8.977a8.926 8.926 0 0 0-2.627-6.35m-6.35 13.812h-.003a7.446 7.446 0 0 1-3.798-1.041l-.272-.162-2.824.741.753-2.753-.177-.282a7.448 7.448 0 0 1-1.141-3.971c.002-4.114 3.349-7.461 7.465-7.461a7.413 7.413 0 0 1 5.275 2.188 7.42 7.42 0 0 1 2.183 5.279c-.002 4.114-3.349 7.462-7.461 7.462"></path>
                                </svg>
                            </div>
                            <div>
                                <h5 class="text-lg font-semibold">WhatsApp: <a href="https://wa.me/+916289293989" class="text-dark-200 hover:text-yellow-400" target="_blank"> +91 90514 40765</a></h5>
                            </div>
                        </div>
                
                        <!-- Address -->
                        <div class="flex items-start space-x-4">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" class="fill-gray-400">
                                    <path d="M12 14c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4zm0-6c1.103 0 2 .897 2 2s-.897 2-2 2-2-.897-2-2 .897-2 2-2z"></path>
                                    <path d="M11.42 21.814a.998.998 0 0 0 1.16 0C12.884 21.599 20.029 16.44 20 10c0-4.411-3.589-8-8-8S4 5.589 4 9.995c-.029 6.445 7.116 11.604 7.42 11.819zM12 4c3.309 0 6 2.691 6 6.005"></path>
                                </svg>
                            </div>
                            <div>
                                <h5 class="text-lg font-semibold">Fashionsta Technologies Private Limited</h5>
                                <p class="text-dark-300 text-sm">2b, Sushil Sen Road, Kolkata - 700025, West Bengal</p>
                                <p class="text-dark-300 text-sm">Email: <a href="mailto:support@ohhbuddie.com" class="text-yellow-400">support@ohhbuddie.com</a></p>
                                <p class="text-dark-300 text-sm">CIN: U47910WB2025PTC277434</p>

                            </div>
                        </div>
                    </div>
                </div>
                    
                    
          
                    
                </div>

                <!-- Right Side (Form) -->
                <div class="p-8 sm:p-12 bg-gray-50">
                    <h2 class="text-3xl md:text-4xl font-bold mb-6" style="color:#EFC475">Send Us A Message</h2>

                    <!-- Input Fields -->
                    <div class="space-y-6">
                        <input type="text" name="name" 
                            class="w-full p-4 text-lg border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-400" 
                            placeholder="Your Name" required>

                        <input type="email" name="email" 
                            class="w-full p-4 text-lg border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-400" 
                            placeholder="Your Email" required>

                        <input type="tel" name="phone" 
                            class="w-full p-4 text-lg border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-400" 
                            placeholder="Your Phone Number" required>

                        <textarea name="comments" rows="4" 
                            class="w-full p-4 text-lg border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-400" 
                            placeholder="Your Message" required></textarea>

                        <button type="submit" class="w-full text-white text-lg font-semibold py-4 rounded-lg transition-all" style="background-color:#EFC475">
                            Send Message
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </section>
</form>

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
