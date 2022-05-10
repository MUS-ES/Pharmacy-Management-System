<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    @stack('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

    <!-- CSS Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <!-- Google Icons Link -->
    <link href="{{ asset('https://fonts.googleapis.com/icon?family=Material+Icons+Outlined') }}" rel="stylesheet">
    <!-- ION-Icons Link -->
    <script type="module" src="{{ asset('https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js') }}"></script>
    <script nomodule src="{{ asset('https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js') }}"></script>

    <!-- BoxIcons Link -->
    <link href='{{ asset('https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css') }}' rel='stylesheet'>
    <title>@yield("title")</title>
</head>

<body>
    <x-Sidebar />

    @yield('content')
    <script src="{{ asset('js/home.js') }}"></script>

    @stack('scripts')
    <!-- Home Script Required For All Sections  -->
</body>

</html>
