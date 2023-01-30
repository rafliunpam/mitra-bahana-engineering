<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PT. MBE</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="/AdminSufee/apple-icon.png">
    <link rel="shortcut icon" href="/AdminSufee/mbe.ico">

    <link rel="stylesheet" href="/AdminSufee/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/AdminSufee/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/AdminSufee/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/AdminSufee/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/AdminSufee/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="/AdminSufee/vendors/jqvmap/dist/jqvmap.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="/AdminSufee/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


</head>

<body>


@include('dashboard.layouts.aside')

    <div id="right-panel" class="right-panel">

        @include('dashboard.layouts.header')

        @yield('container')

    <!-- Right Panel -->

    <script src="/AdminSufee/vendors/jquery/dist/jquery.min.js"></script>
    <script src="/AdminSufee/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="/AdminSufee/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/AdminSufee/assets/js/main.js"></script>

    @include('dashboard.layouts.table')

    <script src="/AdminSufee/vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="/AdminSufee/assets/js/dashboard.js"></script>
    <script src="/AdminSufee/assets/js/widgets.js"></script>
    <script src="/AdminSufee/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="/AdminSufee/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="/AdminSufee/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/dashboard.js"></script>
    <script>





        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>



</body>

</html>