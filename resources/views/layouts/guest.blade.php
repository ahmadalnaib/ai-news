<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>جربوع |  تطوير العالم العربي</title>
    <meta property="og:title" content="Jerboa.ai - تطوير العالم العربي من خلال الذكاء الاصطناعي" />
    <meta property="og:description" content="Jerboa.ai هو منصة مخصصة لتطوير العالم العربي من خلال الذكاء الاصطناعي. نقدم مقالات مفيدة، وموارد تعليمية، وأحدث التحديثات الإخبارية، ومقاطع فيديو مثيرة، ومجتمع تفاعلي لتعزيز الوعي وتعميق المعرفة في هذا المجال المتطور." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.jerboa.ai" />
    <meta property="og:image" content="{{ asset('favicon_io/android-chrome-512x512') }}" />
    <meta name="description" content="Jerboa.ai مخصصة لتطوير العالم العربي من خلال الذكاء الاصطناعي. تقدم منصتنا مقالات مفيدة، وموارد تعليمية، وآخر التحديثات الإخبارية، ومقاطع فيديو مشوقة، ومجتمع تفاعلي، بهدف المساهمة بشكل معنوي في نمو وازدهار العالم العربي في مجال التكنولوجيا والابتكار." />
    <meta name="keywords" content="الذكاء الاصطناعي، التعليم، العالم العربي، تقنية، ابتكار" />
    

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
