<!DOCTYPE html>
<html lang="en">
  <!-- Mirrored from html.kodesolution.com/2024/citycar-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Oct 2024 18:23:43 GMT -->
  <head>
    <meta charset="utf-8" />
    <title>APEX CABBIE</title>

    <link href="{{ asset('frontend-assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link
      href="{{ asset('frontend-assets/plugins/revolution/css/settings.css') }}"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="{{ asset('frontend-assets/plugins/revolution/css/layers.css') }}"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="{{ asset('frontend-assets/plugins/revolution/css/navigation.css') }}"
      rel="stylesheet"
      type="text/css"
    />
    <link href="{{ asset('frontend-assets/css/style.css') }}" rel="stylesheet" />
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
    <link rel="icon" href="images/favicon.png" type="image/x-icon" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"
    />
	<script src="https://js.stripe.com/v3/"></script>
  </head>
  <body>
    <div class="page-wrapper">
      <!-- <div class="preloader"><h1 data-text="Citycar">Citycar</h1></div> -->

      @include('partials.frontend.navbar')

      @yield('content')
	  
	  @include('partials.frontend.footer')
    </div>

    <div class="scroll-to-top scroll-to-target" data-target="html">
      <span class="fa fa-angle-up"></span>
    </div>
    <script src="{{ asset('frontend-assets/js/jquery.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/popper.min.js') }}"></script>

    <script src="{{ asset('frontend-assets/plugins/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/plugins/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/plugins/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/plugins/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/plugins/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/plugins/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/plugins/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/plugins/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/main-slider-script.js') }}"></script>

    <script src="{{ asset('frontend-assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/wow.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/appear.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/gsap.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/ScrollTrigger.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/SplitText.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/splitType.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/bundled-lenis.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/aos.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/odometer.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/owl.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/script-gsap.js') }}"></script>
	<script src="{{ asset('frontend-assets/js/swiper.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/script.js') }}"></script>
	
  </body>
</html>
