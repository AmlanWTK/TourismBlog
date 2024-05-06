 <!-- Navbar Start -->
 <div class="container-fluid bg-light position-relative shadow"  >
 <nav class="navbar navbar-expand-lg navbar-light py-3 py-lg-0 px-0 px-lg-5" style="background-color: #ADD8E6;">

        <a
          href="{{ url('') }}" 
          class="navbar-brand font-weight-bold text-secondary"
          style="font-size: 50px;" 
        >
          <img src="{{ url('assets/img/travel.png') }}" alt="" width="80" height="60">
          <span class="text-primary" style="color: #F0F8FF;">Travel</span>

        </a>
        <button
          type="button"
          class="navbar-toggler"
          data-toggle="collapse"
          data-target="#navbarCollapse"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse navbar-collapse justify-content-between"
          id="navbarCollapse" 
        >
        @php
          $getCategoryHeader = App\Models\CategoryModel::getCategoryMenu();
        @endphp
          <div class="navbar-nav font-weight-bold mx-auto py-0" >
            <a href="{{ url('') }}" class="nav-item nav-link @if( Request::segment(1)  =='')
            active  @endif">Home </a>
            <!-- <a href="{{ url('blog') }}" class="nav-item nav-link">Blogs</a> -->
            @foreach($getCategoryHeader as $CategoryHeader)
              <a href="{{ url(''.$CategoryHeader->slug) }}" class="nav-item nav-link @if( Request::segment(1)  ==$CategoryHeader->slug)
            active  @endif">{{$CategoryHeader->name}}</a> 
            <!-- @if( Request::segment(1)  =='') active  @endif this is for the selection of segment -->
            @endforeach
            <a href="{{ url('gallery') }}" class="nav-item nav-link @if( Request::segment(1)  =='gallery')
            active  @endif">Gallery</a>
            <!-- <a href="{{ url('about') }}" class="nav-item nav-link">About</a>
            <a href="{{ url('teams') }}" class="nav-item nav-link">Teams</a>             -->
            <a href="{{ url('contact') }}" class="nav-item nav-link @if( Request::segment(1)  =='contact')
            active  @endif">Contact</a>
          </div>

          <a href="{{ url('register') }}" class="btn btn-primary px-4" style="background-color: #002244;">Register</a>
          <a href="{{ url('login') }}" class="btn btn-primary px-4" style="background-color: #002244; margin-left: 8px;">Login</a>

        </div>
      </nav>
    </div>
    <!-- Navbar End -->