<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="/AdminSufee/images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="/AdminSufee/images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="">
                        <a href="/dashboard" class=""> <i class="menu-icon fa fa-dashboard " ></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Menu</h3><!-- /.menu-title -->
                    
                    <!-- Menu Admin -->
                    @cannot('manajer_proyek')
                    @cannot('tim_proyek')
                    @cannot('manajer_sales')
                    @cannot('tim_sales')
                    <li class="menu-item-has-children dropdown ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Admin</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li>
                                <i class="fa fa-puzzle-piece"></i><a href="/dashboard/clients">Client</a></li>
                            <li>
                                <i class="fa fa-book"></i><a href="/dashboard/employees">Data Karyawan</a></li>
                            <li>
                                <i class="fa fa-users"></i><a href="/dashboard/users">Data User</a></li>
                            <li>
                                <i class="fa fa-credit-card"></i><a href="/dashboard/invoices">Invoice</a></li>
                        </ul>
                    </li>
                    @endcannot
                    @endcannot
                    @endcannot
                    @endcannot

                    @cannot('admin')

                    <!-- Menu Manajer Sales -->
                    @cannot('manajer_proyek')
                    @cannot('tim_proyek')
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-calendar-o"></i>Sales</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-ticket"></i><a href="/dashboard/sales">Tiket Sales</a></li>
                            @cannot('tim_sales')
                            <li><i class="fa fa-table"></i><a href="/dashboard/saleAcc">Konfirmasi</a></li>
                            @endcannot
                        </ul>
                    </li>
                    @endcannot
                    @endcannot

                    @cannot('manajer_sales')
                    @cannot('tim_sales')
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-building-o"></i>Proyek</a>
                        <ul class="sub-menu children dropdown-menu">
                            <!-- <li><i class="menu-icon fa fa-spinner"></i><a href="/dashboard/proyekReq">Request Tiket Proyek</a></li> -->
                            <li><i class="menu-icon fa fa-ticket"></i><a href="/dashboard/proyeks">Tiket Proyek</a></li>
                            @cannot('tim_proyek')
                            <li><i class="menu-icon fa fa-table"></i><a href="/dashboard/proyekAcc">Konfirmasi</a></li>
                            @endcannot
                        </ul>
                    </li>
                    @endcannot
                    @endcannot

                    @endcannot

                    @cannot('tim_sales')
                    @cannot('tim_proyek')
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Laporan</a>
                        <ul class="sub-menu children dropdown-menu">
                            @cannot('manajer_proyek')
                            <li><i class="menu-icon fa fa-th"></i><a href="/dashboard/saleLaporan">Sales</a></li>
                            @endcannot
                            @cannot('manajer_sales')
                            <li><i class="menu-icon fa fa-th"></i><a href="/dashboard/proyekLaporan">Proyek</a></li>
                            @endcannot
                            <!-- <li><i class="menu-icon fa fa-th"></i><a href="/dashboard">Invoice</a></li> -->
                        </ul>
                    </li>
                    @endcannot
                    @endcannot

                    <!-- <h3 class="menu-title">Extras</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Pages</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="page-login.html">Login</a></li>
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="page-register.html">Register</a></li>
                            <li><i class="menu-icon fa fa-paper-plane"></i><a href="pages-forget.html">Forget Pass</a></li>
                        </ul>
                    </li> -->

                    
                    <h3 class="menu-title text-center">{{ date('d/m/y') }} - <b><span id="jam" style="font-size:24"></span></b></h3>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <script type="text/javascript">
        window.onload = function() { jam(); }
       
        function jam() {
            var e = document.getElementById('jam'),
            d = new Date(), h, m, s;
            h = d.getHours();
            m = set(d.getMinutes());
            s = set(d.getSeconds());
       
            e.innerHTML = h +':'+ m +':'+ s;
       
            setTimeout('jam()', 1000);
        }
       
        function set(e) {
            e = e < 10 ? '0'+ e : e;
            return e;
        }
</script>