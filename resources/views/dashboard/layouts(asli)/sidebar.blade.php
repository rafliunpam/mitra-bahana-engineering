<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse ">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column ">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' :'' }}"
            aria-current="page" href="/dashboard">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/">
              <span data-feather="external-link" class="align-text-bottom"></span>
              Kembali
            </a>
          </li>

        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 m-1 text-muted">
          <span>Admin</span>
        </h6>
        <ul class="nav flex-column">
          <!-- <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' :'' }}" href="/dashboard/posts">
              <span data-feather="file-text" class="align-text-bottom"></span>
              My Posts
            </a>
            <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' :'' }}" href="/dashboard/categories">
              <span data-feather="grid" class="align-text-bottom"></span>
              Post Categories
            </a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/clients*') ? 'active' :'' }}" href="/dashboard/clients">
              <span data-feather="server" class="align-text-bottom"></span>
              Client
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/billings*') ? 'active' :'' }}" href="/dashboard/billings">
              <span data-feather="credit-card" class="align-text-bottom"></span>
              Invoice
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/karyawan*') ? 'active' :'' }}" href="/dashboard/karyawan">
              <span data-feather="users" class="align-text-bottom"></span>
              Karyawan
            </a>
          </li>
        </ul>


        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 m-1 text-muted">
          <span>Sales</span>
        </h6>
        
        <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/sales*') ? 'active' :'' }}" href="/dashboard/sales">
              <span data-feather="shopping-bag" class="align-text-bottom"></span>
              Tiket Sales
            </a>
          </li>
        </ul>

        <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/saleAcc*') ? 'active' :'' }}" href="/dashboard/saleAcc">
              <span data-feather="shopping-bag" class="align-text-bottom"></span>
              Konfirmasi
            </a>
          </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/saleLaporan') ? 'active' :'' }}" href="/dashboard/saleLaporan">
              <span data-feather="shopping-bag" class="align-text-bottom"></span>
              Laporan
            </a>
          </li>
        </ul>



        
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 m-1 text-muted">
          <span>Proyek</span>
        </h6>

        
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/proyekReq*') ? 'active' :'' }}" href="/dashboard/proyekReq">
              <span data-feather="mail" class="align-text-bottom"></span>
              Request Tiket Proyek
            </a>
          </li>

        
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/proyeks*') ? 'active' :'' }}" href="/dashboard/proyeks">
              <span data-feather="mail" class="align-text-bottom"></span>
              Tiket Proyek
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/proyekAcc*') ? 'active' :'' }}" href="/dashboard/proyekAcc">
              <span data-feather="mail" class="align-text-bottom"></span>
              Konfirmasi
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/proyekLaporan*') ? 'active' :'' }}" href="/dashboard/proyekLaporan">
              <span data-feather="mail" class="align-text-bottom"></span>
              Laporan
            </a>
          </li>

          <!-- <li class="nav-item">
            <a class="nav-link
            {{ Request::is('dashboard/proyeks*') ? 'active' :'' }}
            " href="/dashboard/proyeks">
              <span data-feather="book" class="align-text-bottom"></span>
              Proyek
            </a>
          </li>
        </ul> -->






        <!-- <div class="dropdown d-flex justify-content-between align-items-center px-3 mt-4 m-1 text-muted">
      <a href="#" class=" align-items-center link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="/" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>{{ auth()->user()->name }}</strong>
      </a>
      <ul class="dropdown-menu text-small shadow">
        <li><a class="dropdown-item" href="#">New project...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <form action="/logout" method="post">
            @csrf
            <li><button type="submit" class="dropdown-item px-4 border-0 text-small ">Logout</button></li>
            </form> -->

      </ul>
    </div>

      </div>
    </nav>