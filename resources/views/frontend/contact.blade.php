@extends('layouts.frontend.app')

<style>
    .banner-header .container {
        padding-top: 0px !important;
        padding-bottom: 0px !important;
    }

    .contact-details .container {
        padding-top: 50px !important;
        padding-bottom: 50px !important;
    }

    .sec-title h2 {
        font-size: 2rem !important;
        font-weight: 600 !important;
    }

    .sub-title {
        font-size: 1.25rem !important;
        font-weight: 500 !important;
    }

    .contact-details__right h5 {
        font-size: 1.125rem !important;
        font-weight: 600 !important;
    }

    .contact-icon {
        font-size: 30px;
    }
</style>

@section('content')
<!-- Header Banner -->
<section class="page-title" style="background-image: url(frontend-assets/img/background/contact.jpg);">
    <div class="auto-container">
        <div class="title-outer text-center">
            <h1 class="title">Contact Us</h1>
            <ul class="page-breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li>Contact</li>
            </ul>
        </div>
    </div>
</section>

<section class="contact-details py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 mb-4">
                <div class="sec-title mb-4">
                    <span class="sub-title primary-text">Contact us via email</span>
                    <h2 class="text-dark">We’re happy to assist with any questions.</h2>
                </div>

                <div class="card p-4 shadow-sm">
                    <form id="contact_form" name="contact_form" action="{{ route('frontend.contactPost') }}" method="post" onsubmit="document.getElementById('submit-btn').innerHTML = 'Please wait...'; document.getElementById('submit-btn').disabled = true;">
                        @csrf
                        <!-- Form Message -->
                        <div class="row mb-4">
                            <div class="col-12">
                                @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Form Elements -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <input name="name" class="form-control form-control-lg" type="text" placeholder="Your Name *" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <input name="email" class="form-control form-control-lg" type="email" placeholder="Your Email *" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <input name="phone" class="form-control form-control-lg" type="text" placeholder="Your Number *" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <input name="subject" class="form-control form-control-lg" type="text" placeholder="Subject *" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <textarea name="message" class="form-control form-control-lg" rows="6" placeholder="Message *" required></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg" id="submit-btn">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-5 col-md-12">
                <div class="contact-details__right bg-light p-4 rounded shadow-sm">
                    <div class="sec-title mb-4">
                        <span class="sub-title primary-text">Need any help?</span>
                        <h2 class="text-dark">Get in touch with us</h2>
                        <!-- <p class="text-muted" style="font-size: 1rem;">Apex Cabbie is dedicated to providing reliable, comfortable, and timely transportation services. Our professional drivers and well-maintained vehicles ensure a smooth and hassle-free journey every time.</p> -->
                    </div>

                    <ul class="list-unstyled contact-details__info">
                        <li class="d-flex align-items-center mb-3">
                            <div class="icon me-3">
                                <span class="contact-icon">
                                    <i class="icon lnr-icon-envelope"></i>
                                </span>
                            </div>
                            <div class="text">
                                <h5 class="mb-0">Write email</h5>
                                <a href="mailto:info@apexcabbie.com" class="text-dark">info@apexcabbie.com</a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <div class="icon me-3">
                                <span class="contact-icon">
                                    <i class="icon lnr-icon-map-marker"></i>
                                </span>
                            </div>
                            <div class="text">
                                <h5 class="mb-0">Our address</h5>
                                <span class="text-muted">81 Blackberry Hill, Bristol Bs161df</span>
                            </div>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <div class="icon me-3">
                                <span class="contact-icon">
                                    <i class="icon lnr-icon-phone-handset"></i>
                                </span>
                            </div>
                            <div class="text">
                                <h5 class="mb-0">Call us</h5>
                                <a href="tel:+01173322782" class="text-dark">0117 332 2782</a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center mb-3">
                            <div class="icon me-3">
                                <span class="contact-icon">
                                    <i class="icon fa-brands fa-whatsapp"></i>
                                </span>
                            </div>
                            <div class="text">
                                <h5 class="mb-0">WhatsApp us</h5>
                                <a href="https://wa.me/447533225970" target="_blank" class="text-dark">+44 7533 225970</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Google Map -->
<section class="map-section">
    <div class="container-fluid p-0">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24301.0311484067!2d-2.6174498609618677!3d51.45451443765247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48719c1653d8c9a9%3A0xb47bdb0a605f0a0!2sBristol%2C%20UK!5e0!3m2!1sen!2s!4v1605382028827!5m2!1sen!2s"
            width="100%"
            height="450"
            style="border: 0;"
            allowfullscreen=""
            loading="lazy">
        </iframe>
    </div>
</section>
@endsection