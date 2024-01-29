<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="theme-color" content="#000">
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>JaceInstrumental</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset("favicon.ico") }}" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset("css/landing.css") }}" rel="stylesheet" />
        <link  href="{{ asset("manifest.json") }}" rel="manifest" />

        <script>
            if ('serviceWorker' in navigator) {
                navigator.serviceWorker.register('/js/sw.js').then((registration) => {
                    console.log('Service Worker registered with scope:', registration.scope);
                }).catch((error) => {
                    console.error('Service Worker registration failed:', error);
                });
            }
        </script>
    </head>
    <body>
        <!-- Navigation-->
        @include('includes.landing.navbar')        

        <!-- Section-->
        <section>
            @yield('content')
        </section>

        <!-- Footer-->
        @include('includes.landing.footer')
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
