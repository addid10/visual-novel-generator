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
                        <div class="row" id="proBanner">
                            <div class="col-12">
                                <span class="d-flex align-items-center purchase-popup">
                                    <p>Like what you see? Check out our premium version for more.</p>
                                    <a href="https://github.com/BootstrapDash/PurpleAdmin-Free-Admin-Template" target="_blank"
                                        class="btn ml-auto download-button">Download Free Version</a>
                                    <a href="https://www.bootstrapdash.com/product/purple-bootstrap-4-admin-template/" target="_blank"
                                        class="btn purchase-button">Upgrade To Pro</a>
                                    <i class="mdi mdi-close" id="bannerClose"></i>
                                </span>
                            </div>
                        </div>

                    {{-- Page Title  --}}
                    <div class="page-header">
                        <h3 class="page-title">
                            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                                <i class="mdi mdi-home"></i>
                            </span> @yield('title', 'Dashboard') </h3>
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
</body>

@include('layouts.script')

</html>
