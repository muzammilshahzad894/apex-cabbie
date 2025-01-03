<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Page Title -->
    <title>Dashboard</title>

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{ asset('frontend-assets/img/favicon.ico') }}" />

    <!-- All StyleSheet -->
    <link href="{{ asset('admin-assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet">

    <!-- Globle CSS -->
    <link href="{{ asset('admin-assets/css/style.css') }}" rel="stylesheet">

    <!-- Multiple Input Tags -->
    <link rel="stylesheet" href="http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">

    <style>
        .btn-primary {
            padding: 0.625rem 1rem !important;
        }
    </style>

    @yield('styles')

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="{{ route('admin.dashboard') }}" class="brand-logo">
                <img class="logo-abbr" src="{{ asset('admin-assets/images/apex-logo.png') }}" alt="">
                <!-- <svg class="logo-abbr" xmlns="http://www.w3.org/2000/svg" width="62.074" height="65.771" viewBox="0 0 62.074 65.771">
                    <g id="search_11_" data-name="search (11)" transform="translate(12.731 12.199)">
                        <rect class="rect-primary-rect" id="Rectangle_1" data-name="Rectangle 1" width="60" height="60" rx="30" transform="translate(-10.657 -12.199)" fill="#f73a0b" />
                        <path id="Path_2001" data-name="Path 2001" d="M32.7,5.18a17.687,17.687,0,0,0-25.8,24.176l-19.8,21.76a1.145,1.145,0,0,0,0,1.62,1.142,1.142,0,0,0,.81.336,1.142,1.142,0,0,0,.81-.336l19.8-21.76a17.687,17.687,0,0,0,29.357-13.29A17.57,17.57,0,0,0,32.7,5.18Zm-1.62,23.392A15.395,15.395,0,0,1,9.312,6.8,15.395,15.395,0,1,1,31.083,28.572Zm0,0" transform="translate(1 0)" fill="#fff" stroke="#fff" stroke-width="1" />
                        <path id="Path_2002" data-name="Path 2002" d="M192.859,115.547a4.523,4.523,0,0,0,.7-2.415v-2.284a4.55,4.55,0,0,0-9.1,0v2.284a4.523,4.523,0,0,0,.7,2.415,4.954,4.954,0,0,0-3.708,4.788v1.623a2.4,2.4,0,0,0,2.4,2.4h10.323a2.4,2.4,0,0,0,2.4-2.4v-1.623a4.954,4.954,0,0,0-3.708-4.788Zm-6.114-4.7a2.259,2.259,0,0,1,4.518,0v2.284a2.259,2.259,0,1,1-4.518,0Zm7.53,11.111a.11.11,0,0,1-.11.11H183.843a.11.11,0,0,1-.11-.11v-1.623a2.656,2.656,0,0,1,2.653-2.653h5.237a2.656,2.656,0,0,1,2.653,2.653Zm0,0" transform="translate(-168.591 -98.178)" fill="#fff" stroke="#fff" stroke-width="1" />
                    </g>
                </svg> -->
                <!-- <svg class="brand-title" xmlns="http://www.w3.org/2000/svg" width="134.01" height="96.365" viewBox="0 0 134.01 96.365">
                    <text x="10" y="50" fill="#464646" font-size="30" font-family="Poppins-Light, Poppins" font-weight="700">B.C</text>
                    <text x="10" y="70" fill="#787878" font-size="12" font-family="Poppins-Light, Poppins" font-weight="500">Bristol Cabwise</text>
                </svg> -->
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        @include('partials.admin.header')
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('partials.admin.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            @yield('content')
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>© {{ date('Y') }}. All Rights Reserved.</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->


    <!--**********************************
	Scripts
***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('admin-assets/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

    <!-- Apex Chart -->
    <script src="{{ asset('admin-assets/vendor/apexchart/apexchart.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/chartjs/chart.bundle.min.js') }}"></script>

    <!-- Chart piety plugin files -->
    <script src="{{ asset('admin-assets/vendor/peity/jquery.peity.min.js') }}"></script>

    <!-- Dashboard 1 -->
    <script src="{{ asset('admin-assets/js/dashboard/dashboard-1.js') }}"></script>

    <script src="{{ asset('admin-assets/vendor/owl-carousel/owl.carousel.js') }}"></script>

    <script src="{{ asset('admin-assets/vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('admin-assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/dlabnav-init.js') }}"></script>
    
    <script src="{{url('/')}}/plugins/tiny_mce/tinymce.min.js"></script>
    
    <script type="text/javascript">
        tinymce.init({
            theme: "modern",
            mode : "specific_textareas",
            editor_selector : "mceEditor",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern imagetools moxiemanager",
                "insertdatetime media table contextmenu jbimages"
            ],

        relative_urls : false,
        remove_script_host : false,
        convert_urls : true,
        document_base_url : "{{url('/')}}",

            image_advtab: true,
            templates: [
                {title: 'Test template 1', content: 'Test 1'},
                {title: 'Test template 2', content: 'Test 2'}
            ]
        });

        var g_readTerms = false;
    </script>

    <script>
        function JobickCarousel() {

            /*  testimonial one function by = owl.carousel.js */
            jQuery('.front-view-slider').owlCarousel({
                loop: false,
                margin: 30,
                nav: true,
                autoplaySpeed: 3000,
                navSpeed: 3000,
                autoWidth: true,
                paginationSpeed: 3000,
                slideSpeed: 3000,
                smartSpeed: 3000,
                autoplay: false,
                animateOut: 'fadeOut',
                dots: true,
                navText: ['', ''],
                responsive: {
                    0: {
                        items: 1,

                        margin: 10
                    },

                    480: {
                        items: 1
                    },

                    767: {
                        items: 3
                    },
                    1750: {
                        items: 3
                    }
                }
            })
        }

        jQuery(window).on('load', function() {
            setTimeout(function() {
                JobickCarousel();
            }, 1000);
        });
    </script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> -->
    <script src="http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('scripts')
</body>

</html>
