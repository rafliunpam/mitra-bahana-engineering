<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PT. MBE | {{$title}}</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/FlexStart/assets/img/mbeicon.png" rel="icon">
  <link href="/FlexStart/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/FlexStart/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/FlexStart/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/FlexStart/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/FlexStart/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/FlexStart/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/FlexStart/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/FlexStart/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: FlexStartt - v1.10.1
  * Template URL: https://bootstrapmade.com/flexstartt-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>



<body>
    <!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="/FlexStart/assets/img/mbeicon.png" alt="">
        <span>PT. Mitra Bahana Engineering</span>
      </a>
      @include('layouts.navbar')
      
    </div>
</header>  
  <!-- End Header -->

    <main class="">
        @yield('container')
    </main>
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
  @include('layouts.footer')
  </footer>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/FlexStart/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="/FlexStart/assets/vendor/aos/aos.js"></script>
  <script src="/FlexStart/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/FlexStart/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/FlexStart/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/FlexStart/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/FlexStart/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/FlexStart/assets/js/main.js"></script>

</body>

</html>