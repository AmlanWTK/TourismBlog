<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ !empty($meta_title) ? $meta_title: '' }}</title>
    @if(!empty($meta_keywords))
    <meta content="{{ $meta_keywords }}" name="keywords" />
    @endif
    @if(!empty($meta_description))
    <meta content="{{ $meta_description }}" name="description" />
    @endif

  <!-- Favicons -->
  <link href="{{  url('') }}/assets/img/favicon.png" rel="icon">
  <link href="{{  url('') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- CSS Files -->
  <link href="{{  url('assets/vendor/bootstrap/css/bootstrap.min.css') }}/" rel="stylesheet">
  <link href="{{  url('/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{  url('/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{  url('/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{  url('/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{  url('/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{  url('/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
  <link href="{{  url('/assets/css/style.css') }}" rel="stylesheet">

 
</head>

<body>

  <main style="background: url('{{ asset('front/img/lightcolour7.jpg') }}');background-size: cover;">
      <h5 class="card-title">Reports <span>All Time</span></h5>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container"  >
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="{{ url('') }}" class="logo d-flex align-items-center w-auto">
                <img src="{{ url('assets/img/travel.png') }}" alt="" width="50" height="60">
                  <span class="d-none d-lg-block" style="color:#002244;">Travelling</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3" style="background: url('{{ asset('front/img/lightcolour3.webp') }}');background-size: cover;">
      
                <div class="card-body" >

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4" style="color:#002244;">Login to Your Account</h5>
                    <p class="text-center small" style="color: #1F305E;">Enter your username & password to login</p>
                  </div>

                  @include('layouts._message')

                  <form class="row g-3 needs-validation" action="" method="post">
                    {{ csrf_field() }}

                    <div class="col-12">
                      <label for="yourEmail" class="form-label" style="color: #1F305E;">Email</label>
                      <div class="input-group has-validation">
                        <input type="email" name="email" class="form-control" id="yourEmail" required>
                        <div class="invalid-feedback" style="color: #1F305E;">Please enter your email.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label" style="color: #1F305E;">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback" style="color: #1F305E;">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe" style="color: #1F305E;">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" style="background-color:#002244;" >Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0" style="color: #1F305E;">Don't have account? <a href="{{ url('register') }}" style="color:#002244;">Create an account</a></p>
                    
                      <p class="small mb-0" style="margin-top: 20px;"> <a href="{{ url('forgot') }}" style="color:#002244;">Forgot Password</a></p>
                    
                    </div>
                  </form>

                </div>
              </div>

              
            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- JS Files -->
  <script src="{{  url('/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{  url('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{  url('/assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{  url('/assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{  url('/assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{  url('/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{  url('/assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{  url('/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{  url('') }}/assets/js/main.js"></script>

</body>

</html>