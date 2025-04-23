<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">-->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}"> 


      <!-- Google Tag Manager -->
    
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KCL2HTR9');</script>
        <!-- End Google Tag Manager -->
        
        
        
        <!-- Meta Pixel Code -->
        <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '2681722928691492');
        fbq('track', 'PageView');
        </script>
    
        <!-- End Meta Pixel Code -->
            
        <!--Log Rocket -->
    
        <script src="https://cdn.lgrckt-in.com/LogRocket.min.js" crossorigin="anonymous"></script>
        <script>window.LogRocket && window.LogRocket.init('a4hegy/ohh-buddie');</script>
    
        <!-- End Log Rocket -->
            
        
        
      
</head>
<body>
    <!--<div id="app">-->
    <!--    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">-->
    <!--        <div class="container">-->
    <!--            <a class="navbar-brand" href="{{ url('/') }}">-->
    <!--                {{ config('app.name', 'Laravel') }}-->
    <!--            </a>-->
    <!--            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">-->
    <!--                <span class="navbar-toggler-icon"></span>-->
    <!--            </button>-->

    <!--            <div class="collapse navbar-collapse" id="navbarSupportedContent">-->
                    <!-- Left Side Of Navbar -->
    <!--                <ul class="navbar-nav me-auto">-->

    <!--                </ul>-->

                    <!-- Right Side Of Navbar -->
    <!--                <ul class="navbar-nav ms-auto">-->
                        <!-- Authentication Links -->
    <!--                    @guest-->
    <!--                        @if (Route::has('login'))-->
    <!--                            <li class="nav-item">-->
    <!--                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>-->
    <!--                            </li>-->
    <!--                        @endif-->

    <!--                        @if (Route::has('register'))-->
    <!--                            <li class="nav-item">-->
    <!--                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>-->
    <!--                            </li>-->
    <!--                        @endif-->
    <!--                    @else-->
    <!--                        <li class="nav-item dropdown">-->
    <!--                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>-->
    <!--                                {{ Auth::user()->name }}-->
    <!--                            </a>-->

    <!--                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">-->
    <!--                                <a class="dropdown-item" href="{{ route('logout') }}"-->
    <!--                                   onclick="event.preventDefault();-->
    <!--                                                 document.getElementById('logout-form').submit();">-->
    <!--                                    {{ __('Logout') }}-->
    <!--                                </a>-->

    <!--                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">-->
    <!--                                    @csrf-->
    <!--                                </form>-->
    <!--                            </div>-->
    <!--                        </li>-->
    <!--                    @endguest-->
    <!--                </ul>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </nav>-->

    <!--    <main class="py-4">-->
    <!--        @yield('content')-->
    <!--    </main>-->
    <!--</div>-->

    
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

    <!-------Body  Section------>
    
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KCL2HTR9" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=2681722928691492&ev=PageView&noscript=1"/></noscript>
    
</body>
</html>
