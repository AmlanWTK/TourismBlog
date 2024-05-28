    @extends('layouts.app')
    @section('style')
<style>
.owl-dots {
    text-align: center;
    position: absolute;
    bottom: -25px; /* Adjust this value as needed */
    width: 100%;
}

.owl-dot {
    display: inline-block;
    height: 10px;
    width: 10px;
    background-color: #888; /* Gray dots, change as needed */
    z-index: 1000;
    border-radius: 50%;
    margin: 0 5px;
}

.owl-dot.active {
    background-color: #000; /* Active dot color, change as needed */
}
</style>
@endsection
    @section('content')
    
    <!-- Header Start -->
      <!--<div class="container-fluid bg-primary px-0 px-md-5 mb-5" style="background-image: url('front/img/back.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 100%;">
   
     <div class="row align-items-center px-3">
            <div class="col-lg-6 text-center text-lg-left">
                <h4 class="text-white mb-4 mt-5 mt-lg-0">Travel</h4>
                <h2 class="text-white mb-4 mt-5 mt-lg-0">
                "Discovering Bangladesh: Tales from the Land of Rivers and Rich Culture"
                </h2>
                <p class="text-white mb-4">
                Welcome to our voyage through the colorful tapestry of Bangladesh! From the hectic streets of Dhaka to the peaceful serenity of the Sundarbans, join us as we explore this amazing land where every corner tells a tale. Immerse yourself in the warmth of Bangladeshi hospitality, experience the pleasures of its rich cuisine, and embark on an expedition that will capture you with the beauty and resilience of this fascinating country. Join us as we find the hidden gems and timeless treasures of Bangladesh, ready to be discovered by intrepid travellers like you.

                </p>
                <a href="" class="btn btn-secondary mt-1 py-3 px-5">Learn More</a>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
          <img class="img-fluid mt-5"style="border-radius: 50%; height: 25rem; width: 30rem;"
src="{{ url('/front/img/aml3.jpg') }}" alt="" />
        </div>
        </div>
    </div>  -->

    <div class="container-fluid px-0 mb-5" style="background-color: #fff;">
    <div class="row align-items-center">
        <div class="col-lg-12 text-center">
            <!-- Video Container -->
            <div class="video-container">
                <video autoplay muted loop class="background-video">
                    <source src="{{ url('/front/img/video3.mp4') }}" type="video/mp4">
                    Your browser does not support HTML5 video.
                </video>
                <div class="video-overlay">
                    <h2 class="text-white mb-4 mt-5 mt-lg-0" >
                        "Discovering Bangladesh: Tales from the Land of Rivers and Rich Culture"
                    </h2>
                </div>
            </div>
        </div>
    </div>
</div>

    
    <!-- Header End -->
    <!-- Facilities Start -->
    <div class="container-fluid pt-5"style="background: url('{{ asset('front/img/lightcolour1.jpg') }}');background-size: cover;">
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


    <!-- About Start -->
    <div class="container-fluid py-5"style="background: url('{{ asset('front/img/lightcolour7.jpg') }}');background-size: cover;">
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
    <!-- Popular Destination -->
    
    <div class="container-fluid pt-5"style="background: url('{{ asset('front/img/lightcolour.jpg') }}');background-size: cover;">
      <div class="container">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Must-See Wonders</span>
          </p>
          <h1 class="mb-4">Exploring Bangladesh's Top Destinations</h1>
        </div>
        <div class="row pb-3">
        @foreach($data['getPopular'] as $value)
          <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm mb-2">
              <img class="card-img-top mb-2" src="{{ $value->getImage() }}" style="height: 233px; width: 100%; object-fit:
              cover; " alt="" /> <!--this styling fits the pics in the box of desired height and width --> 
              <div class="card-body bg-light text-center p-4">
               <a href="{{ url(''.$value->slug) }}">
               <h4 class="">
                    {!! strip_tags(Str::substr($value->title,0,60)) !!}
                </h4>
               </a>
                <div class="d-flex justify-content-center mb-3">
                  <small class="mr-3"><i class="fa fa-user text-primary"></i>{{ $value->user_name }}</small>
                  <small class="mr-3">
                    <a href="{{ url(''.$value-> category_slug) }}"><i class="fa fa-folder text-primary"></i> {{ $value-> category_name }}</a>
                  </small>
                  <small class="mr-3"><i class="fa fa-comments text-primary"></i>{{ $value->getCommentCount() }}</small >
                </div>
                <p>
                    {!! strip_tags(Str::substr($value->description,0,160)) !!} ... <!--fits the description upto a definite size -->
                </p>
                <a href="{{ url(''.$value->slug) }}" class="btn btn-primary px-4 mx-auto my-2"
                  >Read More</a
                >
              </div>
            </div>
          </div>

          @endforeach


          <div class="col-md-12 mb-4">


           {!! $data['getPopular']->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!} 
          </div>
        </div>
      </div>
    </div>
    <!-- Popular Destination  End -->
    
    <!-- Waterfalls -->
    <div class="container-fluid pt-5"style="background: url('{{ asset('front/img/lightcolour1.jpg') }}');background-size: cover;">
      <div class="container">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Discovering Bangladesh's Hidden Gems</span>
          </p>
          <h1 class="mb-4">Exploring the Enchanting Waterfalls of the Land of Rivers</h1>
        </div>
        <div class="row pb-3">
        @foreach($data['getWaterfall'] as $value)
          <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm mb-2">
              <img class="card-img-top mb-2" src="{{ $value->getImage() }}" style="height: 233px; width: 100%; object-fit:
              cover; " alt="" /> <!--this styling fits the pics in the box of desired height and width --> 
              <div class="card-body bg-light text-center p-4">
               <a href="{{ url(''.$value->slug) }}">
               <h4 class="">
                    {!! strip_tags(Str::substr($value->title,0,60)) !!}
                </h4>
               </a>
                <div class="d-flex justify-content-center mb-3">
                  <small class="mr-3"><i class="fa fa-user text-primary"></i>{{ $value->user_name }}</small>
                  <small class="mr-3">
                    <a href="{{ url(''.$value-> category_slug) }}"><i class="fa fa-folder text-primary"></i> {{ $value-> category_name }}</a>
                  </small>
                  <small class="mr-3"><i class="fa fa-comments text-primary"></i>{{ $value->getCommentCount() }}</small >
                </div>
                <p>
                    {!! strip_tags(Str::substr($value->description,0,160)) !!} ... <!--fits the description upto a definite size -->
                </p>
                <a href="{{ url(''.$value->slug) }}" class="btn btn-primary px-4 mx-auto my-2"
                  >Read More</a
                >
              </div>
            </div>
          </div>

          @endforeach


          <div class="col-md-12 mb-4">


           {!! $data['getBeach']->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!} 
          </div>
        </div>
      </div>
    </div>
    <!-- Waterfalls End -->



    <!-- Stories -->
    <div class="container-fluid pt-5"style="background: url('{{ asset('front/img/lightcolour.jpg') }}');background-size: cover;">
      <div class="container">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Unforgettable Travel Tales</span>
          </p>
          <h1 class="mb-4">Inspiring Travel Stories from the Heart of Bangladesh</h1>
        </div>
        <div class="row pb-3">
        @foreach($data['getStories'] as $value)
          <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm mb-2">
              <img class="card-img-top mb-2" src="{{ $value->getImage() }}" style="height: 233px; width: 100%; object-fit:
              cover; " alt="" /> <!--this styling fits the pics in the box of desired height and width --> 
              <div class="card-body bg-light text-center p-4">
               <a href="{{ url(''.$value->slug) }}">
               <h4 class="">
                    {!! strip_tags(Str::substr($value->title,0,60)) !!}
                </h4>
               </a>
                <div class="d-flex justify-content-center mb-3">
                  <small class="mr-3"><i class="fa fa-user text-primary"></i>{{ $value->user_name }}</small>
                  <small class="mr-3">
                    <a href="{{ url(''.$value-> category_slug) }}"><i class="fa fa-folder text-primary"></i> {{ $value-> category_name }}</a>
                  </small>
                  <small class="mr-3"><i class="fa fa-comments text-primary"></i>{{ $value->getCommentCount() }}</small >
                </div>
                <p>
                    {!! strip_tags(Str::substr($value->description,0,160)) !!} ... <!--fits the description upto a definite size -->
                </p>
                <a href="{{ url(''.$value->slug) }}" class="btn btn-primary px-4 mx-auto my-2"
                  >Read More</a
                >
              </div>
            </div>
          </div>

          @endforeach


          <div class="col-md-12 mb-4">


           {!! $data['getStories']->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!} 
          </div>
        </div>
      </div>
    </div>
    <!-- Stories End -->
    <!-- Testimonial Start -->
   
    <!-- Testimonial End -->
    <!-- Blog Start -->
    <!-- <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5">
                    <span class="px-2">Latest Blog</span>
                </p>
                <h1 class="mb-4">Latest Articles From Blog</h1>
            </div>
            <div class="row pb-3">
                <div class="col-lg-4 mb-4">
                    <div class="card border-0 shadow-sm mb-2">
                        <img class="card-img-top mb-2" src="{{url('front/img/blog-1.jpg')}}" alt="" />
                        <div class="card-body bg-light text-center p-4">
                            <h4 class="">Diam amet eos at no eos</h4>
                            <div class="d-flex justify-content-center mb-3">
                                <small class="mr-3"><i class="fa fa-user text-primary"></i> Admin</small>
                                <small class="mr-3"><i class="fa fa-folder text-primary"></i> Web Design</small>
                                <small class="mr-3"><i class="fa fa-comments text-primary"></i> 15</small>
                            </div>
                            <p>
                                Sed kasd sea sed at elitr sed ipsum justo, sit nonumy diam
                                eirmod, duo et sed sit eirmod kasd clita tempor dolor stet
                                lorem. Tempor ipsum justo amet stet...
                            </p>
                            <a href="" class="btn btn-primary px-4 mx-auto my-2">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card border-0 shadow-sm mb-2">
                        <img class="card-img-top mb-2" src="{{url('front/img/blog-2.jpg')}}" alt="" />
                        <div class="card-body bg-light text-center p-4">
                            <h4 class="">Diam amet eos at no eos</h4>
                            <div class="d-flex justify-content-center mb-3">
                                <small class="mr-3"><i class="fa fa-user text-primary"></i> Admin</small>
                                <small class="mr-3"><i class="fa fa-folder text-primary"></i> Web Design</small>
                                <small class="mr-3"><i class="fa fa-comments text-primary"></i> 15</small>
                            </div>
                            <p>
                                Sed kasd sea sed at elitr sed ipsum justo, sit nonumy diam
                                eirmod, duo et sed sit eirmod kasd clita tempor dolor stet
                                lorem. Tempor ipsum justo amet stet...
                            </p>
                            <a href="" class="btn btn-primary px-4 mx-auto my-2">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card border-0 shadow-sm mb-2">
                        <img class="card-img-top mb-2" src="{{url('front/img/blog-3.jpg')}}" alt="" />
                        <div class="card-body bg-light text-center p-4">
                            <h4 class="">Diam amet eos at no eos</h4>
                            <div class="d-flex justify-content-center mb-3">
                                <small class="mr-3"><i class="fa fa-user text-primary"></i> Admin</small>
                                <small class="mr-3"><i class="fa fa-folder text-primary"></i> Web Design</small>
                                <small class="mr-3"><i class="fa fa-comments text-primary"></i> 15</small>
                            </div>
                            <p>
                                Sed kasd sea sed at elitr sed ipsum justo, sit nonumy diam
                                eirmod, duo et sed sit eirmod kasd clita tempor dolor stet
                                lorem. Tempor ipsum justo amet stet...
                            </p>
                            <a href="" class="btn btn-primary px-4 mx-auto my-2">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Blog End -->

    <!-- Blog Start -->
    <div class="container-fluid pt-5"style="background: url('{{ asset('front/img/lightcolour7.jpg') }}');background-size: cover;">
      <div class="container">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Exploring Bangladesh's Hidden Treasures</span>
          </p>
          <h1 class="mb-4">Unveiling Scenic Hiking Trails</h1>
        </div>
        <div class="row pb-3">
        @foreach($data['getRecord'] as $value)
          <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm mb-2">
              <img class="card-img-top mb-2" src="{{ $value->getImage() }}" style="height: 233px; width: 100%; object-fit:
              cover; " alt="" /> <!--this styling fits the pics in the box of desired height and width --> 
              <div class="card-body bg-light text-center p-4">
               <a href="{{ url(''.$value->slug) }}">
               <h4 class="">
                    {!! strip_tags(Str::substr($value->title,0,60)) !!}
                </h4>
               </a>
                <div class="d-flex justify-content-center mb-3">
                  <small class="mr-3"><i class="fa fa-user text-primary"></i>{{ $value->user_name }}</small>
                  <small class="mr-3">
                    <a href="{{ url(''.$value-> category_slug) }}"><i class="fa fa-folder text-primary"></i> {{ $value-> category_name }}</a>
                  </small>
                  <small class="mr-3"><i class="fa fa-comments text-primary"></i>{{ $value->getCommentCount() }}</small >
                </div>
                <p>
                    {!! strip_tags(Str::substr($value->description,0,160)) !!} ... <!--fits the description upto a definite size -->
                </p>
                <a href="{{ url(''.$value->slug) }}" class="btn btn-primary px-4 mx-auto my-2"
                  >Read More</a
                >
              </div>
            </div>
          </div>

          @endforeach


          <div class="col-md-12 mb-4">


           {!! $data['getRecord']->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!} 
          </div>
        </div>
      </div>
    </div>

    <!-- Sea Beaches -->

    <div class="container-fluid pt-5"style="background: url('{{ asset('front/img/lightcolour.jpg') }}');background-size: cover;">
      <div class="container">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Discover the Coastal Gems</span>
          </p>
          <h1 class="mb-4">Spectacular Beaches in Bangladesh</h1>
        </div>
       
        <div class="row pb-3">
            
        @foreach($data['getBeach'] as $value)
          <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm mb-2">
              <img class="card-img-top mb-2" src="{{ $value->getImage() }}" style="height: 233px; width: 100%; object-fit:
              cover; " alt="" /> <!--this styling fits the pics in the box of desired height and width --> 
              <div class="card-body bg-light text-center p-4">
               <a href="{{ url(''.$value->slug) }}">
               <h4 class="">
                    {!! strip_tags(Str::substr($value->title,0,60)) !!}
                </h4>
               </a>
                <div class="d-flex justify-content-center mb-3">
                  <small class="mr-3"><i class="fa fa-user text-primary"></i>{{ $value->user_name }}</small>
                  <small class="mr-3">
                    <a href="{{ url(''.$value-> category_slug) }}"><i class="fa fa-folder text-primary"></i> {{ $value-> category_name }}</a>
                  </small>
                  <small class="mr-3"><i class="fa fa-comments text-primary"></i>{{ $value->getCommentCount() }}</small >
                </div>
                <p>
                    {!! strip_tags(Str::substr($value->description,0,160)) !!} ... <!--fits the description upto a definite size -->
                </p>
                <a href="{{ url(''.$value->slug) }}" class="btn btn-primary px-4 mx-auto my-2"
                  >Read More</a
                >
              </div>
            </div>
          </div>

          @endforeach


          <div class="col-md-12 mb-4">


           {!! $data['getBeach']->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!} 
          </div>
        </div>
       
      </div>
    </div>
    <!-- Sea Beaches End -->


    <!-- Blog Start -->
    <div class="container-fluid pt-5"style="background: url('{{ asset('front/img/lightcolour1.jpg') }}');background-size: cover;">
  <div class="container">
    <div class="text-center pb-2">
      <p class="section-title px-5"><span class="px-2">Latest Blog</span></p>
      <h1 class="mb-4">Latest Articles From Blog</h1>
    </div>
    <div class="owl-carousel blog-carousel">
      @foreach($data['getRecord'] as $value)
        <div class="item">
          <div class="card border-0 shadow-sm">
            <img class="card-img-top" src="{{ $value->getImage() }}" style="height: 233px; width: 100%; object-fit: cover;" alt="Blog image">
            <div class="card-body bg-light text-center p-4">
              <a href="{{ url(''.$value->slug) }}" class="text-dark">
                <h4 class="mb-3">{{ strip_tags(Str::substr($value->title, 0, 60)) }}</h4>
              </a>
              <div class="d-flex justify-content-center mb-3">
                <small class="mr-3"><i class="fa fa-user text-primary"></i> {{ $value->user_name }}</small>
                <small class="mr-3"><i class="fa fa-folder text-primary"></i> {{ $value->category_name }}</small>
                <small><i class="fa fa-comments text-primary"></i> {{ $value->getCommentCount() }}</small>
              </div>
              <p>{{ strip_tags(Str::substr($value->description, 0, 140)) }}...</p>
              <a href="{{ url(''.$value->slug) }}" class="btn btn-primary px-4 mx-auto my-2">Read More</a>
            </div>
          </div>
        </div>
      @endforeach
      
    </div>

  </div>
</div>
<!-- Blog End -->

@endsection

    @section('script')
    
<script>
 $(document).ready(function(){
  $('.blog-carousel').owlCarousel({
    loop: true,
    margin: 10,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    dots: true,
    responsive: {
      0: { items: 1 },
      768: { items: 2 },
      992: { items: 3 }
    },
    onInitialized: function(event) {
      if (event.item.count <= event.page.size) {
        $(event.target).find('.owl-nav').hide();
        $(event.target).find('.owl-dots').hide();
      }
    }
  });
});



</script>

@endsection
    
   
