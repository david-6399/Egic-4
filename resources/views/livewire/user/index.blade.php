<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>ATAcademy</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link href="{{ asset('Mentor/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('Mentor/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}

    <!-- Vendor CSS Files -->
    <link href="{{ asset('Mentor/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Mentor/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('Mentor/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Mentor/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('Mentor/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Mentor/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">

    <link href="{{ asset('Mentor/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('Mentor/assets/css/style.css') }}" rel="stylesheet">

    <!-- scripts -->
    {{-- <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script> --}}
    @livewireStyles
    @vite('resources/js/app.js')
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="/"><img src="/Mentor/assets/img/favicon.png" alt=""></a>
            </h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            @include('livewire.user.navbar')
            <!-- .navbar -->



        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <!-- End Hero -->

    @yield('content')
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('livewire.user.footer')
    <!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    @livewireScripts
    <!-- Vendor JS Files -->
    <script src="{{ asset('Mentor/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('Mentor/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('Mentor/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Mentor/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('Mentor/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('Mentor/assets/js/main.js') }}"></script>


    <script>
        window.User = {
            id: {{ optional(auth()->user())->id }}
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.all.min.js"></script>
</body>

</html>
