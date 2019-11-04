<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Visual Novel Generator')</title>

    {{-- Icon --}}
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">

    <style>
            /* Fonts */
            @font-face {
                font-family: 'ubuntu-light';
                src: url("{{ asset('assets/fonts/Ubuntu/Ubuntu-Light.eot') }}") !important;
            }
    
            @font-face {
                font-family: 'ubuntu-regular';
                src: url("{{ asset('assets/fonts/Ubuntu/Ubuntu-Regular.eot') }}") !important;
            }
    
            @font-face {
                font-family: 'ubuntu-medium';
                src: url("{{ asset('assets/fonts/Ubuntu/Ubuntu-Medium.eot') }}") !important;
            }
    
            @font-face {
                font-family: 'ubuntu-bold';
                src: url("{{ asset('assets/fonts/Ubuntu/Ubuntu-Bold.eot') }}") !important;
            }
    
        </style>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    {{-- Font  --}}

    {{-- Custom CSS --}}
    @yield('css')
</head>
