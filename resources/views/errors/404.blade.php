@php
if (!isset($locale)) {
$locale = App::getLocale();
}
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Coolture | Error 404</title>
    <meta content="Coolture Team" name="author" />
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}" />

    <!--Bootstrap-->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--Font Awesome CDN-->
    <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- VenoBox -->
    <link href="{{ asset('vendor/venobox/venobox.css') }}" rel="stylesheet">
    <!-- Owl Carousel -->
    <link href="{{ asset('vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <!-- Animate On Scroll -->
    <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
    <!-- Estils propis -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="page-wrap d-flex flex-row align-items-center">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <img src="{{ asset('img/404.svg') }}" class="mb-4" style="width: 10%">
                    <div class="mb-4 lead">{{ __('lang.page_not_found') }}</div>
                    <a href="{{ url('/', $locale) }}" class="btn link"
                        title="{{ __('lang.back_home') }}">{{ __('lang.back_home') }}</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('vendor/venobox/venobox.min.js') }}"></script>
    <script src="{{ asset('vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('vendor/superfish/superfish.min.js') }}"></script>
    <script src="{{ asset('vendor/aos/aos.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
