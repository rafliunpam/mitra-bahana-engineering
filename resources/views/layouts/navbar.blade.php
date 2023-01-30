<nav id="navbar" class="navbar">
        <ul>
        <li><a class="nav-link {{ ($active === "home") ? 'active' : '' }}"" href="/">Home</a></li>
        <li><a class="nav-link {{ ($active === "track") ? 'active' : '' }}" href="/tracks">Track Ticket</a></li>
        <li class="dropdown "><a href="#"><span>Product</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
            <li><a class="nav-link {{ ($active === "posts") ? 'active' : '' }}" href="/posts">Service</a></li>
            <li class="dropdown"><a href="#"><span>Project</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">2021</a></li>
                  <li><a href="#">2020</a></li>
                </ul>
              </li>
              <li><a href="#">Market Research</a></li>
            </ul>
          </li>
        
        <li><a class="nav-link {{ ($active === "about") ? 'active' : '' }}" href="/about">About</a></li>

        @auth
        <li><form action="/logout" method="post">
        @csrf
        
        <li class="dropdown"><a href="#"><span>{{auth()->user()->employee->name}}</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="/dashboard">Dashboard</a></li>
                  <button type="submit" class="getstarted scrollto badge border-0 bg-danger"><i class="bi bi-box-arrow-right"></i> Logout </></button>
                </ul>
              </li></form>
        
        @else
        <li><a class="getstarted scrollto nav-link {{ ($active === "login") ? 'active' : '' }}" href="/login">Login</a></li>
        @endauth

    <!-- <li><a class="nav-link {{ ($active === "contact") ? 'active' : '' }}" href="/contact">Contact</a></li>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a href="blog.html">Blog</a></li>
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->