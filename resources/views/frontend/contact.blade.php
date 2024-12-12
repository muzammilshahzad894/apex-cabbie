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
</style>

@section('content')
<!-- Header Banner -->
<section class="page-title" style="background-image: url(frontend-assets/img/background/page-title.png);">
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

<section class="contact-details">
    <div class="container ">
        <div class="row">
            <div class="col-xl-7 col-lg-6">
                <div class="sec-title">
                    <span class="sub-title">Send us email</span>
                    <h2>Feel free to write</h2>
                </div>

                <form id="contact_form" name="contact_form" action="{{ route('frontend.contactPost') }}" method="post" onsubmit="document.getElementById('submit-btn').innerHTML = 'Please wait...'; document.getElementById('submit-btn').disabled = true;">
                    @csrf
                    <!-- form message -->
                    <div class="row">
                        <div class="col-12">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- form elements -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <input name="name" class="form-control" type="text" placeholder="Your Name *" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <input name="email" class="form-control required email" type="email" placeholder="Your Email *" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <input name="phone" class="form-control" type="text" placeholder="Your Number *" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <input name="subject" class="form-control required" type="text" placeholder="Subject *" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <textarea name="message" class="form-control required" rows="7" placeholder="Message *" required></textarea>
                    </div>
                    <div class="mb-5">
                        <button type="submit" class="btn btn-primary mb-3 mb-xl-0" id="submit-btn"><span class="btn-title">Send message</span></button>
                    </div>
                </form>

            </div>
            <div class="col-xl-5 col-lg-6">
                <div class="contact-details__right">
                    <div class="sec-title">
                        <span class="sub-title">Need any help?</span>
                        <h2>Get in touch with us</h2>
                        <div class="text">Apex Cabbie is dedicated to providing reliable, comfortable, and timely transportation services. Our professional drivers and well-maintained vehicles ensure a smooth and hassle-free journey every time.</div>
                    </div>
                    <ul class="list-unstyled contact-details__info">
                        <li class="d-block d-sm-flex align-items-sm-center ">
                            <div class="icon">
                                <span class="lnr-icon-phone-plus"></span>
                            </div>
                            <div class="text ml-xs--0 mt-xs-10">
                                <h4>Have any question?</h4>
                                <a href="tel:980089850"><span>Free</span> +92 (020)-9850</a>
                            </div>
                        </li>
                        <li class="d-block d-sm-flex align-items-sm-center ">
                            <div class="icon">
                                <span class="lnr-icon-envelope1"></span>
                            </div>
                            <div class="text ml-xs--0 mt-xs-10">
                                <h4>Write email</h4>
                                <a href="https://html.kodesolution.com/cdn-cgi/l/email-protection#5d333838393538312d1d3e32302d3c3324733e3230"><span class="__cf_email__" data-cfemail="244a4141404c41485464474b4954454a5d0a474b49">[email&#160;protected]</span></a>
                            </div>
                        </li>
                        <li class="d-block d-sm-flex align-items-sm-center ">
                            <div class="icon">
                                <span class="lnr-icon-location"></span>
                            </div>
                            <div class="text ml-xs--0 mt-xs-10">
                                <h4>Visit anytime</h4>
                                <span>66 broklyn golden street. New York</span>
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