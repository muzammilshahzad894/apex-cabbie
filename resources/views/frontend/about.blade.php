@extends('layouts.frontend.app')

<style>
section .container {
    padding-top: 0px !important;
    padding-bottom: 0px !important;
}
.about-image {
    max-height: 400px;
    object-fit: cover;
    width: 100%;
}

/* Service Box Styling */
.service-box {
    background-color: #fff;
    border: 1px solid #ddd;
    transition: transform 0.3s, box-shadow 0.3s;
}

.service-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}

/* Service Image */
.service-image img {
    width: 120px;
    height: 120px;
    object-fit: cover;
    border-radius: 50%;
    border: 3px solid #e19236 ;
    transition: transform 0.3s;
}

.service-image img:hover {
    transform: scale(1.1);
}

/* Service Title */
.service-title {
    font-size: 1.25rem;
    font-weight: bold;
    color: #333;
    margin-bottom: 0.5rem;
}

/* Service Description */
.service-description {
    font-size: 0.95rem;
    color: #555;
    line-height: 1.6;
}

/* Button */
.btn-outline-primary {
    border-radius: 20px;
}


/* Section Title Styling */
.custom-offcanvas {
    width: 60% !important;
}

.custom-offcanvas .offcanvas-body {
    overflow-y: auto !important;
    max-height: calc(100vh - 60px) !important;
}

.custom-btn-style {
    border: 2px solid #e19236  !important;
    color: #000 !important;
}

.custom-btn-style:hover {
    background-color: #e19236  !important;
    color: #fff !important;
}

/* Why Choose Us Circle Images */
.why-choose-us img {
    width: 150px;
    height: 150px;
    object-fit: cover;
    border: 5px solid #ddd;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .about-image {
        max-height: 300px;
    }

    .why-choose-us img {
        width: 120px;
        height: 120px;
    }
}
</style>

@section('content')

<!-- Header Banner -->
<section class="banner-header" style="background-color: #f5f5f5;">
    <div class="container d-flex align-items-center justify-content-between">
        <!-- Left Side: About Text -->
        <div class="text-left">
            <h1 class="display-4 text-dark m-0">About Us</h1>
        </div>

        <div class="text-right d-flex align-items-center">
            <i class="fas fa-home me-2 primary-text"></i>
            <span class="text-dark">Home</span>
        </div>
    </div>
</section>

<!-- About Us Section -->
<section class="about-us py-5">
    <div class="container">
        <!-- Section Title -->
        <div class="text-center mb-4">
            <h4 class="section-title">Pre-Booking Cab Service in Bristol and <span>Across the UK</span></h4>
            <p class="lead">Comfort, convenience, and reliability at affordable rates.</p>
        </div>

        <!-- Content Section -->
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="{{ asset('frontend-assets/img/about/cab-service.jpeg') }}" class="img-fluid rounded about-image" alt="Cab Service">
            </div>
            <div class="col-lg-6">
                <p class="mb-4">
                    Welcome to our premier cab service, designed to cater to your transportation needs with utmost professionalism and care. Established in 2022, our family business is committed to delivering exceptional experiences for every journey.
                </p>
                <ul class="list-unstyled">
                    <li><i class="bi bi-check-circle text-primary"></i> Reliable and safe services</li>
                    <li><i class="bi bi-check-circle text-primary"></i> Luxury fleet for all occasions</li>
                    <li><i class="bi bi-check-circle text-primary"></i> 24/7 availability</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Services Offered Section -->
<section class="services py-5 bg-light">
    <div class="container">
        <!-- Section Title -->
        <div class="text-center mb-4">
            <h4 class="section-title">Services <span>Offered</span></h4>
        </div>

        <!-- Services Grid -->
        <div class="row">
            @foreach ($services as $service)
            <div class="col-md-4 mb-4">
                <div class="service-box text-center p-4 h-100 shadow-sm rounded">
                    <!-- Service Image -->
                    <div class="service-image mb-3 position-relative overflow-hidden rounded-circle mx-auto">
                        <img src="{{ asset('uploads/services/' . $service->image) }}" class="img-fluid" alt="{{ $service->detail_page_first_heading }}">
                    </div>
                    <!-- Service Content -->
                    <h5 class="service-title">{{ $service->detail_page_first_heading }}</h5>
                    <p class="service-description">
                        {{ Str::limit($service->detail_page_description, 100) }}
                    </p>
                    <button class="btn btn-outline-primary btn-sm mt-3 custom-btn-style"
                            data-bs-toggle="offcanvas"
                            data-bs-target="#serviceOffcanvas"
                            data-id="{{ $service->id }}"
                            data-title="{{ $service->detail_page_first_heading }}"
                            data-description="{{ $service->detail_page_description }}"
                            data-image="{{ asset('uploads/services/' . $service->image) }}">
                        Read More
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Offcanvas Component -->
<div class="offcanvas offcanvas-end custom-offcanvas" tabindex="-1" id="serviceOffcanvas" aria-labelledby="offcanvasTitle">
    <div class="offcanvas-header">
        <h5 id="offcanvasTitle"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="row">
            <div class="col-md-6">
                <img id="offcanvasImage" src="" alt="Service Image" class="img-fluid rounded">
            </div>
            <div class="col-md-6">
                <p id="offcanvasDescription"></p>
            </div>
        </div>
    </div>
</div>

<!-- Why Choose Us Section -->
<section class="why-choose-us py-5">
    <div class="container">
        <div class="text-center mb-4">
            <h4 class="section-title">Why Choose <span>Us</span></h4>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                <img src="{{ asset('frontend-assets/img/about/competitive-rates1.jpg') }}" class="img-fluid rounded-circle mb-3" alt="Competitive Rates">
                <h5>Competitive Rates</h5>
                <p>Affordable prices without compromising quality.</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('frontend-assets/img/about/professional-staff.jpg') }}" class="img-fluid rounded-circle mb-3" alt="Professional Staff">
                <h5>Professional Staff</h5>
                <p>Trained drivers to ensure safety and courtesy.</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('frontend-assets/img/about/247.jpeg') }}" class="img-fluid rounded-circle mb-3" alt="24/7 Availability">
                <h5>24/7 Availability</h5>
                <p>Always there to meet your transportation needs.</p>
            </div>
        </div>
    </div>
</section>
@endsection


@section('javascript')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const serviceButtons = document.querySelectorAll('[data-bs-target="#serviceOffcanvas"]');

        serviceButtons.forEach(button => {
            button.addEventListener('click', function () {
                const title = button.getAttribute('data-title');
                const description = button.getAttribute('data-description');
                const image = button.getAttribute('data-image');

                document.getElementById('offcanvasTitle').textContent = title;
                document.getElementById('offcanvasDescription').textContent = description;
                document.getElementById('offcanvasImage').setAttribute('src', image);
            });
        });

        // Disable page scroll when offcanvas is open
        const offcanvasElement = document.getElementById('serviceOffcanvas');
        const bodyElement = document.querySelector('body');

        offcanvasElement.addEventListener('show.bs.offcanvas', function () {
            bodyElement.style.overflow = 'hidden'; // Disable page scrolling
        });

        offcanvasElement.addEventListener('hidden.bs.offcanvas', function () {
            bodyElement.style.overflow = ''; // Enable page scrolling again
        });
    });
</script>
@endsection