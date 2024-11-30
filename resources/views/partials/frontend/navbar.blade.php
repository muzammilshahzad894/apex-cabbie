<header class="main-header header-style-one">
    <div class="header-lower">
        <div class="auto-container">
            <div class="main-box">
                <div class="logo-box">
                    <div class="logo">
                        <a href="{{ route('frontend.index') }}">
                            <img class="site-logo" src="{{ asset('frontend-assets/img/apex-logo.png') }}" alt="Logo" />
                        </a>
                    </div>
                </div>

                <div class="nav-outer">
                    <nav class="nav main-menu">
                        <ul class="navigation d-flex align-items-center">
                            <li class="{{ request()->routeIs('frontend.index') ? 'current' : '' }}">
                                <a href="{{ route('frontend.index') }}">Home</a>
                            </li>
                            <li class="{{ request()->routeIs('frontend.about') ? 'current' : '' }}">
                                <a href="{{ route('frontend.about') }}">About</a>
                            </li>
                            <li class="{{ request()->routeIs('frontend.services') ? 'current' : '' }}">
                                <a href="{{ route('frontend.services') }}">Services</a>
                            </li>
                            <li class="{{ request()->routeIs('frontend.contact') ? 'current' : '' }}">
                                <a href="{{ route('frontend.contact') }}">Contact</a>
                            </li>
                            <li class="{{ request()->routeIs('frontend.faqs') ? 'current' : '' }}">
                                <a href="{{ route('frontend.faqs') }}">FAQs</a>
                            </li>
                            <li class="{{ request()->routeIs('frontend.trustVoilet') ? 'current' : '' }}">
                                <a href="{{ route('frontend.trustVoilet') }}">Reviews</a>
                            </li>
                            @guest
                                <li class="{{ request()->routeIs('frontend.login') ||  request()->routeIs('frontend.signup') ? 'current' : '' }}">
                                    <a href="/login">Login</a>
                                </li>
                            @endguest

                            @auth
                            <li class="dropdown">
                                <a href="#">{{ Auth::user()->name }}</a>
                                <ul>
                                    <li><a href="{{ route('frontend.userHistory') }}">{{ __('My Bookings') }}</a></li>
                                    <li><a href="{{ route('frontend.refund') }}">{{ __('Refund') }}</a></li>
                                    <li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
                                            @csrf
                                            <button type="submit" class="dropdown-item navbar-logout">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endauth
                            <li class="{{ request()->routeIs('frontend.faqs') ? 'current' : '' }}">
                                <a href="{{ route('frontend.faqs') }}">FAQs</a>
                            </li>
                            <li class="remvoe_line">
                                <div class="btn-box">
                                    <a 
                                        href="{{ route('frontend.book-online') }}"
                                        class="custom-btn"
                                    >
                                        <span class="btn-title">Book Now</span>
                                    </a>
                                </div>
                            </li>
                            <li class="remvoe_line">
                                <div class="help-section">
                                    <div class="icon" onclick="toggleDropdown(event)">
                                        <i class="lnr-icon-phone-handset"></i>
                                    </div>
                                    <div class="dropdown-menu" id="dropdown-menu">
                                        <div class="dropdown-content">
                                            <p class="m-0 p-0">Need help?</p>
                                            <h5 class="m-0 p-0">01173322782</h5>
                                        </div>
                                        <a href="tel:01173322782" class="call-now-btn">Call Now</a>
                                    </div>
                                </div>



                                <!-- <a href="tel:01173322782" class="help-section d-flex">
                                    <div class="icon">
                                        <i class="icon lnr-icon-phone-handset"></i>
                                    </div>
                                    <div class="text">
                                        <p class="m-0 p-0">Need help?</p>
                                        <h5 class="m-0 p-0">01173322782</h5>
                                    </div>
                                </a> -->
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="outer-box">
                    <div class="mobile-nav-toggler light">
                        <span class="icon lnr-icon-bars"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mobile-menu">
        <div class="menu-backdrop"></div>

        <nav class="menu-box">
            <div class="upper-box">
                <div class="nav-logo">
                    <a href="index.html"><img src="images/logo-2.png" alt title /></a>
                </div>
                <div class="close-btn"><i class="icon fa fa-times"></i></div>
            </div>
            <ul class="navigation clearfix"></ul>
        </nav>
    </div>

    <div class="sticky-header">
        <div class="auto-container">
            <div class="inner-container">
                <div class="logo">
                    <a href="{{ route('frontend.index') }}">
                        <img class="site-logo" src="{{ asset('frontend-assets/img/apex-logo.png') }}" alt="Logo" />
                    </a>
                </div>

                <div class="nav-outer">
                    <nav class="main-menu">
                        <div class="navbar-collapse show collapse clearfix">
                            <ul class="navigation clearfix d-flex align-items-center"></ul>
                        </div>
                    </nav>

                    <div class="mobile-nav-toggler">
                        <span class="icon lnr-icon-bars"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
function toggleDropdown(event) {
    const dropdownMenu = document.getElementById('dropdown-menu');
    dropdownMenu.classList.toggle('show');
    
    const showNumberOption = document.getElementById('show-number');
    
    // Toggle visibility of the number when clicked
    showNumberOption.addEventListener('click', () => {
        alert('Phone number: 01173322782');
    });

    // Prevent event propagation to document click
    event.stopPropagation();
}

// Close the dropdown if clicked outside
document.addEventListener('click', function(event) {
    const dropdownMenu = document.getElementById('dropdown-menu');
    const icon = document.querySelector('.icon');
    
    // Check if the clicked area is outside the icon or dropdown menu
    if (!icon.contains(event.target) && !dropdownMenu.contains(event.target)) {
        dropdownMenu.classList.remove('show');
    }
});

</script>