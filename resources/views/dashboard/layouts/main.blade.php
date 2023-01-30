<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
    <!--<![endif]-->

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>PT. MBE</title>
        <meta name="description" content="Sufee Admin - HTML5 Admin Template" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="apple-touch-icon" href="/AdminSufee/apple-icon.png" />
        <link rel="shortcut icon" href="/AdminSufee/mbe.ico">

        <link
            rel="stylesheet"
            href="/AdminSufee/vendors/bootstrap/dist/css/bootstrap.min.css"
        />
        <link
            rel="stylesheet"
            href="/AdminSufee/vendors/font-awesome/css/font-awesome.min.css"
        />
        <link
            rel="stylesheet"
            href="/AdminSufee/vendors/themify-icons/css/themify-icons.css"
        />
        <link
            rel="stylesheet"
            href="/AdminSufee/vendors/flag-icon-css/css/flag-icon.min.css"
        />
        <link
            rel="stylesheet"
            href="/AdminSufee/vendors/selectFX/css/cs-skin-elastic.css"
        />
        <link
            rel="stylesheet"
            href="/AdminSufee/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css"
        />
        <link
            rel="stylesheet"
            href="/AdminSufee/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
        />

        <link rel="stylesheet" href="/AdminSufee/assets/css/style.css" />

        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800"
            rel="stylesheet"
            type="text/css"
        />

        <link rel="stylesheet" href="/AdminSufee/vendors/chosen/chosen.min.css">
        
    </head>

    <body>
        
        <!-- Left Panel -->
        @include('dashboard.layouts.sidebar')
        <!-- /#left-panel -->

        <!-- Left Panel -->

        <!-- Right Panel -->

        <div id="right-panel" class="right-panel">
            <!-- Header-->
            @include('dashboard.layouts.header')
            <!-- /header -->
            <!-- Header-->
            <main class="">
            @yield('container')
        </main>
        </div>
        
        <!-- /#right-panel -->

        <!-- Right Panel -->



        <script src="/AdminSufee/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
        <script src="/AdminSufee/vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

        <script src="/AdminSufee/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="/AdminSufee/assets/js/main.js"></script>

        <script src="/AdminSufee/vendors/jquery/dist/jquery.min.js"></script>
        <script src="/AdminSufee/vendors/popper.js/dist/umd/popper.min.js"></script>
        <script src="/AdminSufee/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="/AdminSufee/assets/js/main.js"></script>
        

        <script src="/AdminSufee/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="/AdminSufee/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="/AdminSufee/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="/AdminSufee/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="/AdminSufee/vendors/jszip/dist/jszip.min.js"></script>
        <script src="/AdminSufee/vendors/pdfmake/build/pdfmake.min.js"></script>
        <script src="/AdminSufee/vendors/pdfmake/build/vfs_fonts.js"></script>
        <script src="/AdminSufee/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="/AdminSufee/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="/AdminSufee/vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        <script src="/AdminSufee/assets/js/init-scripts/data-table/datatables-init.js"></script>

        <script src="/AdminSufee/vendors/chart.js/dist/Chart.bundle.min.js"></script>
        <script src="/AdminSufee/assets/js/widgets.js"></script>
        

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript">
            var i = 0;
            $("#dynamic-ar").click(function () {
                ++i;
                $("#dynamicAddRemove").append('<tr><td><input for="tahapan" id="tahapan"type="text" name="addMoreInputFields[' + i +
                    '][tahapan]" placeholder="BAST" class="form-control" /></td><td><input for="keterangan" id="keterangan"type="text" name="addMoreInputFields[' + i +
                    '][keterangan]" placeholder="Keterangan" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Hapus</button></td></tr>');
            });
            $(document).on('click', '.remove-input-field', function () {
                $(this).parents('tr').remove();
            });
            
        </script>


        <script src="/AdminSufee/vendors/chosen/chosen.jquery.min.js"></script>
        <script>
            jQuery(document).ready(function() {
                jQuery(".standardSelect").chosen({
                    disable_search_threshold: 1,
                    no_results_text: "Oops, nothing found!",
                    width: "100%"
                });
            });
        </script>

        
        


    </body>
</html>
