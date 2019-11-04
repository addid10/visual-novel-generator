<!DOCTYPE html>
<html lang="en">

@include('layouts.header')

<body>
    <div class="container-scroller">

        {{-- Top Menu --}}
        @include('layouts.topbar')

        <div class="container-fluid page-body-wrapper">
            {{-- Side Menu --}}
            @include('layouts.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">

                    {{-- Page Title  --}}
                    <div class="page-header">
                        <h3 class="page-title">
                            
                            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                                <i class="mdi mdi-bookmark"></i>
                            </span> 
                            
                            @yield('title', 'Dashboard')
                        </h3>
                    </div>

                    {{-- Page Content --}}
                    @yield('content')

                </div>

                {{-- Footer --}}
                @include('layouts.footer')
            </div>
        </div>
    </div>

    {{-- Modal --}}
    @yield('modal')

</body>

@include('layouts.script')

</html>
