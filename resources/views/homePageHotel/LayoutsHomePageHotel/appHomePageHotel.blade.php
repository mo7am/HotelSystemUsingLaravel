<!DOCTYPE html>
<html lang="en">
  <head>
    <title>{{__('pageContent.deluxe')}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="{{URL::asset('designHomePageHotel/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('designHomePageHotel/css/animate.css')}}">
    
    <link rel="stylesheet" href="{{URL::asset('designHomePageHotel/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('designHomePageHotel/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('designHomePageHotel/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{URL::asset('designHomePageHotel/css/aos.css')}}">

    <link rel="stylesheet" href="{{URL::asset('designHomePageHotel/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{URL::asset('designHomePageHotel/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{URL::asset('designHomePageHotel/css/jquery.timepicker.css')}}">

    
    <link rel="stylesheet" href="{{URL::asset('designHomePageHotel/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{URL::asset('designHomePageHotel/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{URL::asset('designHomePageHotel/css/style.css')}}">


   <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="{{URL::asset('designHomePageHotel/css/demo.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{URL::asset('designHomePageHotel/css/style3.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{URL::asset('designHomePageHotel/css/animate-custom.css')}}" />
   
    


  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="{{route('indexhome')}}">{{__('pageContent.deluxe')}}</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="{{route('indexhome')}}" class="nav-link">{{__('pageContent.home')}}</a></li>
	          <li class="nav-item"><a href="{{route('Rooms')}}" class="nav-link">{{__('pageContent.rooms')}}</a></li>
	          <li class="nav-item"><a href="{{route('Restaurant')}}" class="nav-link">{{__('pageContent.restaurant')}}</a></li>
	          <li class="nav-item"><a href="{{route('About')}}" class="nav-link">{{__('pageContent.about')}}</a></li>
	          <li class="nav-item"><a href="{{route('Blog')}}" class="nav-link">{{__('pageContent.blog')}}</a></li>
	          <li class="nav-item"><a href="{{route('Contact')}}" class="nav-link">{{__('pageContent.contact')}}</a></li>
              <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">{{__('pageContent.signup')}}</a></li>

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{__('pageContent.navbar_Language')}} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                            <a class="dropdown-item" rel="alternate" hreflang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode , null , [] , true)}}"><img src="{{asset('images/flags/'.$localeCode.'.png')}}" width="30px" height="20x">  {{$properties['native']}}</a>

                        @endforeach
                    </div>
                </li>
	        </ul>
              <input style="display: none" type="text" value="{{LaravelLocalization::setLocale()}}" id="getLocal">
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->




  

 @yield('contentHomePageHotel')




    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Deluxe Hotel</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Useful Links</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Blog</a></li>
                <li><a href="#" class="py-2 d-block">Rooms</a></li>
                <li><a href="#" class="py-2 d-block">Amenities</a></li>
                <li><a href="#" class="py-2 d-block">Gift Card</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Privacy</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Career</a></li>
                <li><a href="#" class="py-2 d-block">About Us</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
                <li><a href="#" class="py-2 d-block">Services</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                {{__('pageContent.footer_copyright')}} &copy;{{__('pageContent.footer_version')}} {{ config('app.name') }} .  {{__('pageContent.footer_Allrights')}}  <i class="icon-heart color-danger" aria-hidden="true"></i>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{URL::asset('designHomePageHotel/js/jquery.min.js')}}"></script>
  <script src="{{URL::asset('designHomePageHotel/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{URL::asset('designHomePageHotel/js/popper.min.js')}}"></script>
  <script src="{{URL::asset('designHomePageHotel/js/bootstrap.min.js')}}"></script>
  <script src="{{URL::asset('designHomePageHotel/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{URL::asset('designHomePageHotel/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{URL::asset('designHomePageHotel/js/jquery.stellar.min.js')}}"></script>
  <script src="{{URL::asset('designHomePageHotel/js/owl.carousel.min.js')}}"></script>
  <script src="{{URL::asset('designHomePageHotel/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{URL::asset('designHomePageHotel/js/aos.js')}}"></script>
  <script src="{{URL::asset('designHomePageHotel/js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{URL::asset('designHomePageHotel/js/bootstrap-datepicker.js')}}"></script>
  <script src="{{URL::asset('designHomePageHotel/js/jquery.timepicker.min.js')}}"></script>
  <script src="{{URL::asset('designHomePageHotel/js/scrollax.min.js')}}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{URL::asset('designHomePageHotel/js/google-map.js')}}"></script>
  <script src="{{URL::asset('designHomePageHotel/js/main.js')}}"></script>
    @yield('scripts')
  </body>
</html>
