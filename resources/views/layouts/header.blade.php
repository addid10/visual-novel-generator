<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Visual Novel Generator')</title>

    {{-- Icon --}}
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    {{-- Font  --}}

    {{-- Custom CSS --}}
    @yield('css')
</head>
