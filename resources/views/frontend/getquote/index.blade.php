@extends('layouts.frontend.app')
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection

<style>
    .form-section {
        background-color: #f8f9fa;
        padding: 50px 20px;
        border-radius: 10px;
        margin-top: -100px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .form-control,
    select,
    textarea {
        margin-bottom: 20px;
        border-radius: 5px;
        border: 1px solid #ced4da;
        height: unset !important;
        border: 1px dashed #e09239 !important;
    }

    .custom-header {
        color: #e99a41;
        font-size: 36px;
        font-weight: bold;
    }

    .custom-description {
        font-size: 18px;
        margin-top: 10px;
        color: #fff;
    }
    .bg-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.6);
    }

    .content-overlay {
        z-index: 2;
        text-align: center;
    }

    .btn-submit {
        background-color: #e99a41;
        border: none;
        padding: 12px 25px;
        color: white;
        font-weight: bold;
        border-radius: 5px;
    }

    .sidebar-features i {
        color: #e99a41;
        margin-right: 10px;
    }
</style>

<style>
    .alert-success {
        background: green !important;
        color: white !important;
    }

    .custom_lable {
        color: white !important;
    }

    .design_style {
        display: flex;
        justify-content: center;
        text-align: center;
    }

    .description {
        font-size: 17px !important;
        font-weight: 500 !important;
    }

    section.banner-header.section-padding.bg-img {
        height: 600px;
        background: url('{{ asset('frontend-assets/img/slider/booking_img.png') }}') no-repeat center center/cover;
        background-size: cover;
        display: flex;
        align-items: center;
        justify-content: center;
        image-rendering: auto;
        image-rendering: crisp-edges;
        background-repeat: no-repeat;
    }
    .icon_text{
        display: flex;
        /* gap: 5px; */
    }
    h3{
        color: #e29135 !important;
    }
    
    .google-map {
        width: 100%;
        -webkit-filter: grayscale(100%);
        filter: grayscale(100%);
        height: 475px;
        overflow: hidden;
        border-radius: 20px;
    }
    
    .theme-color {
        color: #e99a41 !important;
    }
</style>




@php
    $distance = 1;
    $totalPrice = 0;

@endphp



@section('content')
    <section class="banner-header section-padding bg-img" data-overlay-dark="4"
        data-background="{{ asset('frontend-assets/img/slider/booking_img.png') }}">
        <div class="v-middle">
            <div class="container">
                <div class="row design_style">
                    <div class="col-lg-6 col-md-12 mt-30" style="background: rgb(0 0 0 / 33%);padding: 10px;">
                        <div class="post-wrapper">
                        </div>
                        <h1 style="color: #e99a41;font-size: xx-large;">Get A Quotation Here.</h1>
                        <p class="description" style="color: white">Get a quotation here for our 24-hour cab service in Bath
                            and across the UK. Fill out the details, and our representative will contact you promptly with
                            pricing information.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="post section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                </div>
            </div>
        </div>


        <div class="container form-section">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row payment_section">
                <div class="col-md-8">
                    <h3 style="color: #e99a41;">Get a Quote</h3>
                    <form action="{{ route('frontend.getquotePost') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="fullname" class="text-uppercase">Name *</label>
                            <input id="fullname" name="fullname" type="text" value="{{ old('fullname') }}" class="form-control" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-uppercase">Email *</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" class="form-control"
                            placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="phone" class="text-uppercase">Telephone *</label>
                            <input id="phone" name="phone" type="text" value="{{ old('phone') }}" class="form-control"
                            placeholder="Telephone">
                        </div>
                        <div class="form-group">
                            <label for="date" class="text-uppercase">COLLECTION DATE *</label>
                            <input name="date" type="datetime-local" value="{{ old('date') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="fleet_id" class="text-uppercase">Fleet *</label>
                            <select id="fleet_id" name="fleet_id" class="form-control">
                                <option value="">Select Fleet</option>
                                @foreach ($fleets as $fleet)
                                    <option value="{{ $fleet->id }}"
                                        {{ old('fleet_id') == $fleet->id ? 'selected' : '' }}>
                                        {{ $fleet->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        @php
                            $id = request('id');
                        @endphp
                        <div class="form-group">
                            <label for="Service" class="text-uppercase">Service *</label>
                            <select id="Service" name="service" class="form-control">
                                <option value="">Select Service</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}"
                                        {{ old('service') == $service->id || ($id && $id == $service->id) ? 'selected' : '' }}>
                                        {{ $service->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <h4 style="color: #e99a41;">COLLECTION ADDRESS</h4>
                        
                        <div class="form-group">
                            <label for="pickup" class="text-uppercase">ADDRESS *</label>
                            <input id="pickup" name="pickup" type="text" value="{{ old('pickup') }}" class="form-control"
                            placeholder="Collection Address">
                        </div>
                        <div class="form-group">
                            <label for="pickup_postal_code" class="text-uppercase">POSTCODE *</label>
                            <input id="pickup_postal_code" name="pickup_postal_code" type="text" value="{{ old('pickup_postal_code') }}"
                            class="form-control" placeholder="Postcode">
                        </div>
                        <div class="form-group">
                            <label for="pickup_city" class="text-uppercase">TOWN / CITY *</label>
                            <input id="pickup_city" name="pickup_city" type="text" value="{{ old('pickup_city') }}" class="form-control"
                            placeholder="TOWN / CITY">
                        </div>
                        
                        <h4 style="color: #e99a41;">DESTINATION ADDRESS</h4>
                        <div class="form-group">
                            <label for="dropoff" class="text-uppercase">ADDRESS LINE 1 *</label>
                            <input id="dropoff" name="dropoff" type="text" value="{{ old('dropoff') }}" class="form-control"
                            placeholder="Destination Address">
                        </div>
                        <div class="form-group">
                            <label for="dropoff_postal_code" class="text-uppercase">POSTCODE *</label>
                            <input id="dropoff_postal_code" name="dropoff_postal_code" type="text" value="{{ old('dropoff_postal_code') }}" class="form-control" placeholder="Postcode">
                        </div>
                        <div class="form-group">
                            <label for="dropoff_city" class="text-uppercase">TOWN / CITY *</label>
                            <input id="dropoff_city" name="dropoff_city" type="text" value="{{ old('dropoff_city') }}" class="form-control" placeholder="TOWN / CITY">
                        </div>
                        
                        <div class="form-group">
                            <label for="return_journey" class="text-uppercase">DO YOU REQUIRE A RETURN JOURNEY? *</label>
                            <select id="return_journey" name="return_journey" class="form-control">
                                <option value="">-- Please choose an option --</option>
                                <option value="0" {{ old('return_journey') == '0' ? 'selected' : '' }}>No</option>
                                <option value="1" {{ old('return_journey') == '1' ? 'selected' : '' }}>Yes</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="comment" class="text-uppercase">COMMENTS AND FURTHER REQUIREMENTS</label>
                            <textarea id="comment" name="comment" class="form-control" placeholder="via addresses, waiting time or any additional information." rows="5">{{ old('comment') }}</textarea>
                        </div>
                        <button type="submit" class="btn-submit">REQUEST A QUOTE</button>
                    </form>

                </div>
                <div class="col-md-4 sidebar-features" style="border-left: 1px solid #ccc" >

                    <h3 class="color color_theme">Location</h3>
                    
                    <div class="google-map">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24301.0311484067!2d-2.6174498609618677!3d51.45451443765247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48719c1653d8c9a9%3A0xb47bdb0a605f0a0!2sBath%2C%20UK!5e0!3m2!1sen!2s!4v1605382028827!5m2!1sen!2s"
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
                    </div>

                    <div style="padding: 10px;margin-top:10px">
                        <h5 class="theme-color">All classes include:</h5>
                        <div class="icon_text">
                            <i class="fa-solid fa-check"></i>
                            <p>
                                Free registration.
                            </p>
                        </div>
                        <div class="icon_text">
                            <i class="fa-solid fa-check"></i>
                            <p>
                                Free cancellation up to 24 hours before your scheduled pick-up.
                            </p>
                        </div>
                        <div class="icon_text">
                            <i class="fa-solid fa-check"></i>
                            <p>
                                Enjoy complimentary 1 hour waiting time for airport pickups.
                            </p>
                        </div>
                        <div class="icon_text">
                            <i class="fa-solid fa-check"></i>
                            <p>
                                Luggage assistance.
                            </p>
                        </div>
                        <div class="icon_text">
                            <i class="fa-solid fa-check"></i>
                            <p>
                                Complimentary 15 min waiting period at all other pickups.
                            </p>
                        </div>
                    </div>
                    <div style="padding: 10px;margin-top:10px">
                        <h5 class="" style="color:#e29135;">Please Note:</h5>
                        <div class="icon_text">
                            <i class="fa-solid fa-exclamation"></i>
                            <p>
                                Guest/laggage capacities must be abided by for safety reasons. if you are unsure select a large class as driver may turn down service when they are exceeded.
                            </p>
                        </div>
                        <div class="icon_text">
                            <i class="fa-solid fa-exclamation"></i>
                            <p>
                                The vehicle images above are examples.You may get a different vehicle of the similar quality.
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Booking Alert</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <div id="countdown">
                            <h4 id="message">Booking block for this day please contact to the support!</h4>
                            <div id="first_url " class="modal_style_p">
                                <p id="client_url"></p>
                                <button class="view_details" id="copy_btn" onclick="copyToClipboard()">Copy</button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const url = new URL(window.location.href);
            const source = url.searchParams.get('source');
            var element = document.getElementById('request_by_admin');
            var element1 = document.getElementById('payment_section_main');
            if (source == 'get_a_quote') {
                element.style.display = 'block';
                element1.style.display = 'none';
            } else {
                element.style.display = 'none';
                element1.style.display = 'block';
            }
        });
    </script>
@endsection

@section('scripts')
    @include('frontend.booking.style-css')
@endsection
