<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>جربوع - @yield('title')</title>

    
    <meta property="og:title" content="@yield('og-title')" />
    <meta property="og:description" content="@yield('og-description')">
    <meta property="og:type" content="@yield('og-type')" />
    <meta property="og:url" content="@yield('og-url')" />
    <meta property="og:image" content="@yield('og-image')" />
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
        
    <meta property="og:title" content="@yield('og-title')" />
    <meta property="og:description" content="@yield('og-description')">
    <meta property="og:type" content="@yield('og-type')" />
    <meta property="og:url" content="@yield('og-url')" />
    <meta property="og:image" content="@yield('og-image')" />
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
   
   

    

    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ url('favicon_io/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ url('favicon_io/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Matomo -->
<script>
    var _paq = window._paq = window._paq || [];
    /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
      var u="https://redirect200.com/";
      _paq.push(['setTrackerUrl', u+'matomo.php']);
      _paq.push(['setSiteId', '4']);
      var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
      g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
    })();
  </script>
  <!-- End Matomo Code -->
  

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen ">
        <x-header></x-header>

        <div class="">
            {{ $slot }}
        </div>
    </div>
    <x-footer></x-footer>
</body>

</html>
