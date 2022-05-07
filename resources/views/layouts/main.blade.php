<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    @yield("head")
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Font Awesome Library --}}
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">

    {{-- Adding Fonts --}}
    <link rel="preconnect" href="{{ asset('https://fonts.googleapis.com') }}">
    <link rel="preconnect" href="{{ asset('https://fonts.gstatic.com') }}" crossorigin>
    <link href="{{ asset('https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap') }}"
        rel="stylesheet">
    {{-- Icon --}}
    <link rel="icon" href="{{ asset('images/index/favpng_logo-pharmacy.png') }}">
    <title>@yield("title")</title>
</head>

<body>

    @yield('header')
    @yield('sidenav')
    @yield('content')



</body>

</html>
