@extends('layouts.app')

@section('content')
<!-- Header Start -->
<div class="container-fluid bg-primary mb-5">
      <div
        class="d-flex flex-column align-items-center justify-content-center"
        style="min-height: 400px"
      >
        <h3 class="display-3 font-weight-bold text-white">About Us</h3>
        <div class="d-inline-flex text-white">
          <p class="m-0"><a class="text-white" href="">Home</a></p>
          <p class="m-0 px-2">/</p>
          <p class="m-0">About Us</p>
        </div>
      </div>
    </div>
    <!-- Header End -->

     <!-- About Start -->
     <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <img class="img-fluid rounded mb-5 mb-lg-0"
                         src="{{url('front/img/travel1.jpg')}}"
                         alt="" />
                </div>
                <div class="col-lg-7">
                    <p class="section-title pr-5">
                        <span class="pr-2">Learn About Us</span>
                    </p>
                    <h1 class="mb-4">Best Traveling Blog Picks For You</h1>
                    <p>
                    Embark on a virtual journey through Bangladesh's natural wonders with our curated selection of breathtaking waterfalls. From the majestic Madhabkunda to the hidden gems of Bandarban, immerse yourself in the beauty of the Land of Rivers
                    </p>
                    <div class="row pt-2 pb-4">
                        <div class="col-6 col-md-4">
                            <img class="img-fluid1 rounded" src="{{ url('/front/img/logo1.png') }}"   />
                        </div>
                        <div class="col-6 col-md-8">
                            <ul class="list-inline m-0">
                                <li class="py-2 border-top border-bottom">
                                    <i class="fa fa-check text-primary mr-3"></i>Roam through the rugged peaks of Bandarban
                                </li>
                                <li class="py-2 border-bottom">
                                    <i class="fa fa-check text-primary mr-3"></i>Explore Bangladesh's rich tapestry of landscapes
                                <li class="py-2 border-bottom">
                                    <i class="fa fa-check text-primary mr-3"></i>Mesmerizing charm of Waterfals
                                </li>
                            </ul>
                        </div>
                    </div>
                   
                    <a href="{{ url('about')}}" class="btn btn-secondary mt-1 py-2 px-4">Learn More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
       <!-- Facilities Start -->
       <div class="container-fluid pt-5">
     <div class="text-center pb-2">
      <h1 class="mb-4">Exploring Bangladesh: Unveiling the Six Divisions</h1>
    </div>
      <div class="container pb-3"> 
        <div class="row">
        @foreach($data['getCategoryHome'] as $CategoryHome)
          <div class="col-lg-4 col-md-6 pb-1">
          <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px">
             <img src="{{ url('/front/img/logo.png') }}" width="140" height="140">
             
              <div class="pl-4">
                <h4> <a href="{{ url(''.$CategoryHome->slug) }}" class="nav-item nav-link" >{{$CategoryHome->name}}</a>
              </h4>
                <p class="m-0">
                {!! strip_tags(Str::substr($CategoryHome->meta_description,0,110)) !!} ...
                </p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <!-- Facilities End -->

    <!-- Team Start -->
   <!-- Team Start -->
   <div class="container-fluid pt-5">
      <div class="container">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Our Team</span>
          </p>
          <h1 class="mb-4">Meet Our Admins</h1>
        </div>
        <div class="row">
        @foreach( $data['getRecordAdminHome'] as $AdminHome)
          <div class="col-md-6 col-lg-3 text-center team mb-5">
            <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%">
              <img class="img-fluid w-100" src="{{ $AdminHome->getProfile() }}" />
              <div
                class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute"
              >
                <a
                  class="btn btn-outline-light text-center mr-2 px-0"
                  style="width: 38px; height: 38px"
                  href="https://github.com/AmlanWTK"
                  ><i class="fab fa-github"></i
                ></a>
                <a
                  class="btn btn-outline-light text-center mr-2 px-0"
                  style="width: 38px; height: 38px"
                  href="https://www.facebook.com/amlan.sarkar.1238?mibextid=ZbWKwL">
                  ><i class="fab fa-facebook-f"></i
                ></a>
                <a
                  class="btn btn-outline-light text-center px-0"
                  style="width: 38px; height: 38px"
                  href="#"
                  ><i class="fab fa-linkedin-in"></i
                ></a>
              </div>
            </div>
            <h4>{{$AdminHome->name}}</h4>
            <i>{{$AdminHome->profile_identity}}</i>
          </div>
        @endforeach
        </div>
      </div>
    </div>
    <!-- Team End -->
    <!-- Team End -->
    
@endsection