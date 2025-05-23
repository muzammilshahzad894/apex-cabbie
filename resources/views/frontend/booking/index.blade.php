@extends('layouts.frontend.app')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcjCI02QAojCYEkhWCugFSjn3OLsMiEf8&libraries=places">
</script>
@include('frontend.booking.style-css')
<style>
    .progress-step.active {
    position: relative; /* Ensure relative positioning for the pseudo-element */
    color: white; /* Set the text color to white */
    background: #ce7d1f;
}

.progress-step.active::after {
    content: "";
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 50px;
    height: 40px;
    background-color: #ce7d1f;
    border-radius: 50%;
    z-index: -1; /* Place the background behind the text */
}

    input{

    }
    #map {
        overflow: unset !important;
        height: 400px;
        width: 100%;
        overflow: hidden !important;
        border: 0;
        /* Remove border */
        padding: 0;
        margin: 0;
    }

    .minimum_hours {
        font-size: 12px;
        color: #e8d693;

    }

    .about_car {
        font-size: 12px;
        color: white;
        margin: 0px;
    }

    #mapContainer {
        height: 400px;
        width: 100%;
    }

    .pickupLocation {
        border-radius: 0px !important;
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
</style>




@php
    $userLoggedIn = auth()->user() ? true : false;
    $userRole = null;
    // $userRole = auth()->user()->role;
    if (!auth()->user()) {
        $userRole = 'user';
    } else {
        $userRole = auth()->user()->role;
    }
    $distance = 1;
    $totalPrice = 0;

@endphp
<script>
    let allFleetPrices = [];

    function updatefleetValue(fleetId, currentPrice) {
        allFleetPrices.push({
            id: fleetId,
            price: currentPrice
        });
    }

    function updatefleetPrice(distance) {
        let ids = allFleetPrices;
        ids.forEach(function(item) {
            let priceElement = document.getElementById(item.id);
            if (priceElement) {
                let updatedPrice = item.price * distance;
                priceElement.textContent = '£' + updatedPrice.toFixed(2);
            }
        });
    }
</script>


@section('content')
<section class="page-title" style="background-image: url(frontend-assets/img/background/page-title1.jpg);">
    <div class="auto-container">
        <div class="title-outer text-center">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-6">
                    <h1 class="title">Book Your Ride</h1>
                    <p class="page-breadcrumb text-white">
                        Reserve your cab here. We provide a reliable 24-hour cab service in Bath and across the UK, featuring professional drivers and transparent pricing. Experience hassle-free booking and exceptional service.
                    </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="post section-padding">
        <div class="container">
            <div class="row payment_section">
                <ul class="progress-bar_main">
                    <li class="progress-step active" id="step1">Ride Info </li>
                    <li class="progress-step" id="step2">Fleet Selection</li>
                    <li class="progress-step" id="step3">Passenger Details</li>
                    <li class="progress-step" id="step4">Booking Summary</li>
                </ul>
             
                <div class="col-md-12">
                    <input type="hidden" id="login_user" value="{{ $userRole }}">
                    <form action="{{ route('booking.store') }}" method="POST" id="booking-form">
                        @csrf
                        <div class="new_form step1" id="forms">
                            <h2 class="color color_theme">Book Your Ride</h2>
                            <div class="gap-3">
                                @php
                                    $services = \App\Models\Service::all();

                                    $id = request('id');
                                    $bookingServiceId = !empty($booking_detail) ? $booking_detail->service_id : '';

                                @endphp
                                <label for="services">Select Service</label>
                                <select name="service" id="service"
                                    class="styled-input border-radius-0 mb-0 select select2" onchange="showFlightId(this);">
                                    <option value="">Select Service</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}"
                                            @if ($service->id == $id || $service->id == $bookingServiceId) selected @endif>
                                            {{ $service->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div id="service-error" class="error-message text-danger"></div>
                                <div id="flight_type" style="display: none">
                                    <label for="flight_type">Select Type:</label>
                                    <select id="carType" class="select2 select" style="width: 100%" name="flight_type"
                                        onchange="toggleFlightIdVisibility()">
                                        <option value="1">Departure</option>
                                        <option value="2">Arrival</option>

                                    </select>
                                </div>


                                <div id="flightId" style="display: none">
                                    <label for="pickupLocation">Flight Name:</label>
                                    <input type="text" name="flightName" placeholder="Enter flight Name"
                                        class="form-control pickupLocation" id="flightName"
                                        @if (isset($booking_detail) && $booking_detail->flight_name != '') value="{{ $booking_detail->flight_name }}" @endif>
                                    <div id="flightName-error" class="error-message text-danger"></div>
                                    <label for="arrival time ">Flight Arrival Time:</label>
                                    <input type="time" name="flight_time" class="input timepicker styled-input"
                                        placeholder="Arrival Time" id="flight_time"
                                        @if (isset($booking_detail) && $booking_detail->flight_time != '') value="{{ $booking_detail->flight_time }}" @endif>
                                    <div id="flight_time-error" class="error-message text-danger"></div>
                                </div>
                                <div>
                                    <label for="pickupLocation">Pickup Location:</label>
                                    <input type="text" id="pickupLocation" name="pickupLocation"
                                        placeholder="Enter pickup location"
                                        class="form-control pickupLocation border-radius-0 mb-0">
                                    <div id="pickup-error" class="error-message text-danger"></div>
                                </div>
                                <div>
                                    <button class="plus_icon mt-1" type="button" id="addLocation" onclick="addMore();">Add
                                        Via Location</button>
                                    <div id="via_locatoins_input"></div>
                                    <label for="dropLocation">Dropoff Location:</label>
                                    <div id="dropLocations">
                                        <div class="drop-location mb-2">
                                            <input type="text" id="dropLocation0" name="dropLocation[]"
                                                placeholder="Enter dropoff location"
                                                class="form-control border-radius-0 mb-0 dropoffLocations">
                                            <div id="drop-error" class="error-message text-danger"></div>
                                        </div>
                                    </div>
                                    {{-- <input type="text" name="dropLocation"
                                    placeholder="Enter drop location" class="form-control pickupLocation" /> --}}

                                </div>

                                @php
                                    $datetime = isset($booking_detail->booking_date, $booking_detail->booking_time)
                                        ? $booking_detail->booking_date . 'T' . $booking_detail->booking_time
                                        : '';

                                @endphp
                                <div>
                                    <label for="date">Date & Time:</label>
                                    <input type="datetime-local" class="styled-input timepicker border-radius-0 mb-0"
                                        placeholder="Return Date" id="date-time"
                                        value="{{ isset($booking_detail) ? (isset($booking_detail->booking_date) && isset($booking_detail->booking_time) ? $booking_detail->booking_date . 'T' . $booking_detail->booking_time : '') : '' }}" />
                                    <p class="minimum_hours"></p>
                                    <div id="date-time-error" class="error-message text-danger"></div>
                                </div>
                                <div class=" meet_greet d-flex" style="gap:10px;align-items:center"
                                    onclick="showReturn();">
                                    <input type="checkbox" id="return" name="return" value="" class="mb-0"
                                        @if (isset($booking_detail) && $booking_detail->is_return == 1) checked @endif>
                                    <label for="return">Return Journey</label>
                                </div>

                                <div id="return_location" style="display: none;margin-top:24px;">
                                    <div id="return_date">
                                        <label for="return_date">Return Date & Time:</label>
                                        <input type="datetime-local" name="return_date_time"
                                            class="styled-input timepicker border-radius-0 mb-0" placeholder="Return Date"
                                            id="return_date_time"
                                            value="{{ isset($booking_detail) ? (isset($booking_detail->return_date) && isset($booking_detail->return_time) ? $booking_detail->return_date . 'T' . $booking_detail->return_time : '') : '' }}" />
                                        <p class="minimum_hours"></p>
                                        <div id="return_date_time-error" class="error-message text-danger"></div>
                                    </div>
                                    <label for="return_pickupLocation">Return Pickup Location:</label>
                                    <input type="text" name="return_pickupLocation" placeholder=""
                                        id="return_pickupLocation" class="form-control  border-radius-0 mb-0" disabled>
                                    <label for="return_dropLocation">Return Dropoff Location:</label>
                                    <div id="return_dropLocations">
                                        <div class=" mb-2">
                                            <input type="text" name="return_dropLocation" disabled
                                                id="return_dropLocation" placeholder=""
                                                class="form-control border-radius-0 mb-0 ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="new_form step2 row">
                            <div id="error_msg_show" class="error-message" style="display: none">
                                <div id="error_msg" class="error-message">
                                    <p>Please select a fleet</p>
                                    <p onclick="closeAlert();">X</p>
                                </div>
                            </div>
                            <h3 class="color color_theme">Please select Fleet:</h3>
                            <div id="fleets-section" class="main-div">
                            </div>
                        </div>
                        <div class="step3 new_form">
                            <div class="heading-border-bottom">
                                <h3 class="color color_theme">Fill all the fields.</h3>
                            </div>
                            <div class="column_type">
                                <label for="name" class="passenger_lebals">Name</label>
                                <input type="text"
                                    class="form-control pickupLocation custom_input border-radius-0 mb-0" name="name"
                                    placeholder="Enter Your Name" id="name" value={{ $booking_detail->name ?? '' }}>
                                <div id="name-error" class="error-message text-danger"></div>
                            </div>
                            <div class="column_type">
                                <label for="telephone" class="passenger_lebals">Telephone</label>
                                <input type="number"
                                    class="form-control pickupLocation custom_input border-radius-0 mb-0" id="telephone"
                                    name="telephone" placeholder="Enter Your Telephone"
                                    value={{ $booking_detail->phone_number ?? '' }}>
                                <div id="telephone-error" class="error-message text-danger"></div>
                            </div>
                            <div class="column_type border-botom">
                                <label for="tele" class="passenger_lebals">Email</label>
                                <input type="email"
                                    class="form-control pickupLocation custom_input border-radius-0 mb-0" id="email"
                                    name="email" placeholder="Enter Your Email"
                                    value={{ $booking_detail->email ?? '' }}>
                                <div id="email-error" class="error-message text-danger"></div>
                            </div>
                            <div class="mt-2">
                                <label for="comment">Comment (optional):</label>
                                <textarea name="comment" id="summary" class="form-control" rows="3">{{ $booking_detail->summary ?? '' }}</textarea>
                            </div>
                            <div class="border-botom">
                                <div class="d-flex  column_type mt-4">
                                    <label for="no_passenger" class="passenger_lebals">No of passenger</label>
                                    <select name="no_passenger" id="no_passenger"
                                        class="styled-input1 border-radius-0 mb-0">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    <div id="passenger-error" class="error-message text-danger"></div>
                                </div>

                                <div class="d-flex  column_type">
                                    <label for="suit_case" class="passenger_lebals">SuitCases</label>
                                    <select name="suit_case" id="suit_case" class="styled-input1 border-radius-0 mb-0">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                                <div class="d-flex  column_type">
                                    <label for="hand_lauggage" class="passenger_lebals">Hand luggage</label>
                                    <select name="hand_lauggage" id="hand_lauggage"
                                        class="styled-input1 border-radius-0 mb-0">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                                <div class=" meet_greet airportservice" style="gap:10px;align-items:center"
                                    onclick="showChildSeat()">
                                    <input type="checkbox" id="child_seat" name="child_seat" value=""
                                        class="mb-0" @if (isset($booking_detail) && $booking_detail->is_childseat == 1) checked @endif>
                                    <label for="child_seat" class="passenger_lebals">Child Seat (£5)</label>
                                </div>
                                <div class="d-none" style="" style="display: none">
                                    <input type="checkbox" id="extra_lauggage" name="extra_lauggage" value=""
                                        class="mb-0" @if (isset($booking_detail) && $booking_detail->is_extra_lauggage == 1) checked @endif>
                                    <label for="extra_lauggage" class="passenger_lebals">Extra Lauggage (£6)</label>
                                </div>
                                <div class=" meet_greet airportservice" style="gap:10px;align-items:center"
                                    onclick="meetNdGreet();">
                                    <input type="checkbox" id="meet_greet" name="meet_greet" value=""
                                        class="mb-0" @if (isset($booking_detail) && $booking_detail->is_meet_nd_greet == 1) checked @endif>
                                    <label for="meet_greet">Meet & Greet (£12 extra)</label>
                                </div>
                                <div class="d-flex meet_greet" style="gap:10px;align-items:center"
                                    onclick="showSomeoneElse()">
                                    <input type="checkbox" id="booking_for_someone" name="Booking_for_someone"
                                        value="" @if (isset($booking_detail) && $booking_detail->other_name != '') checked @endif>
                                    <label for="Booking_for_someone">
                                        Booking for someone else.
                                    </label>
                                </div>
                            </div>
                            <div class="border-botom" id="someone_else"
                                style="display: {{ isset($booking_detail) && $booking_detail->other_name != '' ? 'block' : 'none' }}">

                                <div class="column_type">
                                    <label for="someone_else_name" class="passenger_lebals">Name</label>
                                    <input type="text"
                                        class="form-control pickupLocation custom_input border-radius-0 mb-0"
                                        name="someone_else_name" placeholder="Enter Name" id="someone_else_name"
                                        value={{ $booking_detail->other_name ?? '' }}>
                                    <div id="someone_else_name_error" class="error-message text-danger"></div>
                                </div>
                                <div class="column_type">
                                    <label for="someone_else_telephone" class="passenger_lebals">Telephone</label>
                                    <input type="number"
                                        class="form-control pickupLocation custom_input border-radius-0 mb-0"
                                        id="someone_else_telephone" name="someone_else_telephone"
                                        placeholder="Enter Telephone"
                                        value={{ $booking_detail->other_phone_number ?? '' }}>
                                    <div id="someone_else_telephone_error" class="error-message text-danger"></div>
                                </div>
                                <div class="column_type">
                                    <label for="someone_else_email" class="passenger_lebals">Email</label>
                                    <input type="email"
                                        class="form-control pickupLocation custom_input border-radius-0 mb-0"
                                        id="someone_else_email" name="someone_else_email" placeholder="Enter Email"
                                        value={{ $booking_detail->other_email ?? '' }}>
                                    <div id="someone_else_email_error" class="error-message text-danger"></div>
                                </div>
                            </div>
                            {{-- @if (!auth()->user())




                            @endif --}}

                           
                        </div>

                        <div class="step4 new_form">
                            <div class="summary">
                                <div class="heading-border-bottom">
                                    <h3 class="color color_theme">Summary.</h3>
                                </div>
                                <div class="d-flex gap-4">
                                    <strong>Service Type:</strong>
                                    <p id="summary-service-type">Departure</p>
                                </div>
                                <div class="d-flex gap-4">
                                    <strong>Fleet:</strong>
                                    <p id="summary-fleet-type">fleet</p>
                                </div>
                                <div class="d-flex gap-4">
                                    <strong>Pickup Location:</strong>
                                    <p id="summary-pickup-location">London</p>
                                </div>
                                <div class=" " id="via_locations">
                                    {{-- <strong>Via Location:</strong>
                                    <p id="summary-via-location">Manchester</p> --}}
                                </div>
                                <div class="d-flex gap-4">
                                    <strong>Dropoff Location:</strong>
                                    <p id="summary-drop-location">Manchester</p>
                                </div>
                                <div class="d-flex gap-4">
                                    <strong>Date & Time: </strong>
                                    <p id="summary-date">2022-03-09</p>
                                </div>
                                <div class="" id="return_summary">

                                </div>
                                <div class=" flightDetails gap-4" id="summary-flight-type-div">
                                    <strong>Flight Type:</strong>
                                    <p id="summary-flight-type"></p>
                                </div>
                                <div class=" flightDetails gap-4" id="summary-flight-name-div">
                                    <strong>Flight Name:</strong>
                                    <p id="summary-flight-name"></p>
                                </div>
                                <div class=" flightDetails gap-4" id="summary-flight-time-div">
                                    <strong>Flight Arrival Time:</strong>
                                    <p id="summary-flight-time"></p>
                                </div>

                                <div class="d-flex gap-4">
                                    <strong>Name:</strong>
                                    <p id="summary-name">John Doe</p>
                                </div>
                                <div class="d-flex gap-4">
                                    <strong>Telephone:</strong>
                                    <p id="summary-telephone">1234567890</p>
                                </div>
                                <div class="d-flex gap-4">
                                    <strong>Email:</strong>
                                    <p id="summary-email">testing@gmail.com </p>
                                </div>
                                <div class="d-flex gap-4">
                                    <strong>No of passenger:</strong>
                                    <p id="summary-passengers">1</p>
                                </div>
                                <div class="d-flex gap-4">
                                    <strong>Child Seat:</strong>
                                    <p id="summary-child-seat">0</p>
                                </div>
                                <div class="d-flex gap-4">
                                    <strong>Meet & Greet:</strong>
                                    <p id="summary-meets-greets">0</p>
                                </div>

                                <div class="d-flex gap-4">
                                    <strong>SuitCases:</strong>
                                    <p id="summary-suitcases">0</p>
                                </div>
                                <div class="d-flex gap-4">
                                    <strong>Hand luggage:</strong>
                                    <p id="summary-hand-luggage">0</p>
                                </div>
                                <div class="d-flex gap-4">
                                    <strong>Comments:</strong>
                                    <p id="summary-summary">You need any help!.</p>
                                </div>
                                <h3 class="color color_theme">Other Details:</h3>
                                <div class="d-flex gap-4 mt-2">
                                    <strong>Name:</strong>
                                    <p id="summary-other-name"></p>
                                </div>
                                <div class="d-flex gap-4">
                                    <strong>Telephone:</strong>
                                    <p id="summary-other-telephone"></p>
                                </div>
                                <div class="d-flex gap-4">
                                    <strong>Email:</strong>
                                    <p id="summary-other-email"></p>
                                </div>

                                <h3 class="color color_theme">Total Price:</h3>
                                <div class="d-flex gap-4">
                                    <strong>Fleet Price:</strong>
                                    <div>
                                        <p id="summary-fleet-price"></p>
                                    </div>
                                </div>
                                <div class="d-flex gap-4" id="summary-child-seat_price_div" style="display: none">
                                    <strong>Child Seat:</strong>
                                    <div>
                                        <p id="summary-child-seat_price"></p>
                                    </div>
                                </div>
                                <div class="d-flex gap-4" id="summary-extra-lauggage_price_div" style="display: none">
                                    <strong>Meet & Greet:</strong>
                                    <div>
                                        <p id="summary-meet-greet"></p>
                                    </div>
                                </div>
                                <div id="summary-service_texas" style="">
                                </div>
                                <div class="d-none gap-4 " id="summary-meet-greet_price_div" style="display: none">
                                    <strong>Extra Lauggage:</strong>
                                    <div>
                                        <p id="summary-extra-lauggage"></p>
                                    </div>
                                </div>
                                <div class="d-flex gap-4">
                                    <strong>Coupon Discount:</strong>
                                    <div>
                                        <p id="summary-coupon-discount"></p>
                                    </div>
                                </div>


                                <div class="d-flex gap-4">
                                    <strong>Total Price:</strong>
                                    <div>
                                        <p id="summary-total-price"></p>
                                    </div>
                                </div>
                                <div class="gap-4">
                                    <div class="discount_btn_div">
                                        <button class="discount_btn" type="button" id="apply_coupon"
                                            onclick="AddCoupon()">Apply Coupon</button>
                                    </div>

                                    <div id="coupon_input" class="" style="display: none">
                                        <div class="d-flex gap-1">
                                            <input type="text"
                                                class="form-control pickupLocation custom_input border-radius-0 mb-0"
                                                id="coupon" name="coupon" placeholder="Enter Coupon" />
                                            <button class="coupon_btn" id="add_coupon" type="button"
                                                onclick="applyCoupon()">submit</button>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            @if ($userRole != 'admin')
                                <button class="discount_btn" onclick="PayonStripe();" type="button"
                                    id="payment_section_main">
                                    Pay Now
                                </button>
                                <button class="discount_btn" id="request_by_admin" type="button">
                                    Request to Admin
                                </button>
                            @endif
                        </div>


                        <div class="both_btn">
                            <button class="previous_btn button-1 mt-15 mb-15" onclick="prevStep()" type="button">
                                Previous
                            </button>
                            <button type="button" class="button-1 mt-15 mb-15 cutom_button" id="next_btn"
                                onclick="nextStep()">
                                Next
                            </button>
                            @if ($userRole == 'admin')
                                <button type="button" class="button-1 mt-15 mb-15 cutom_button" id="form_submit"
                                    style="display: none" onclick="bookAndPay('admin');">
                                    Book Now
                                </button>
                            @endif

                        </div>
                    </form>
                    <div id="mapMarkplaces"></div>

                </div>
                <div class="row" style="border-left: 1px solid #ccc; margin: 0;">
                    <!-- Left Column -->
                    <div class="col-md-6 google-map">
                        <h3 class="color color_theme">Location</h3>
                        {{-- <iframe id="map"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24301.0311484067!2d-2.6174498609618677!3d51.45451443765247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48719c1653d8c9a9%3A0xb47bdb0a605f0a0!2sBath%2C%20UK!5e0!3m2!1sen!2s!4v1605382028827!5m2!1sen!2s"
                            width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                            tabindex="0"></iframe> --}}
                            <div id="map"></div>
                        </div>
                
                    <!-- Right Column -->
                    <div class="col-md-6">
                        <div style="padding: 10px; margin-top: 10px;">
                            <h5 class="color">All classes include:</h5>
                            <div class="icon_text">
                                <i class="fa-solid fa-check"></i>
                                <p>Free registration</p>
                            </div>
                            <div class="icon_text">
                                <i class="fa-solid fa-check"></i>
                                <p>Free cancellation up to 24 hours before your scheduled pick-up</p>
                            </div>
                            <div class="icon_text">
                                <i class="fa-solid fa-check"></i>
                                <p>Enjoy complimentary 1-hour waiting time for airport pickups</p>
                            </div>
                            <div class="icon_text">
                                <i class="fa-solid fa-check"></i>
                                <p>Luggage assistance</p>
                            </div>
                            <div class="icon_text">
                                <i class="fa-solid fa-check"></i>
                                <p>Complimentary 15 min waiting period at all other pickups</p>
                            </div>
                        </div>
                       
                    </div>
                    <div style="padding: 10px; margin-top: 10px;border-top:1px solid black">
                        <h5 class="color" style="padding-bottom:10px;display:flex;justify-content:center;width:100%;">Please Note:</h5>
                        <div class="icon_text">
                            <i class="fa-solid fa-exclamation"></i>
                            <p>
                                Guest/luggage capacities must be abided by for safety reasons. If you are unsure, select a larger
                                class as drivers may turn down service when they are exceeded.
                            </p>
                        </div>
                        <div class="icon_text">
                            <i class="fa-solid fa-exclamation"></i>
                            <p>
                                The vehicle images above are examples. You may get a different vehicle of similar quality.
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




    <script type="text/javascript">
        var login_user = @json($userLoggedIn);
        var payment_id = '{{ request('payment_id') }}';
        var stripeKey = '{{ config('services.stripe.key') }}';
        if (!stripeKey) {
            console.error('Stripe publishable key is not set');
        } else {
            var stripe = Stripe(stripeKey);

            function PayonStripe() {
                bookingId = current_booking_id;
                if (coupon_apply !== '') {
                    StoreCouponCode();
                }
                if (login_user) {
                    fetch(`/create-checkout-session/${bookingId}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                        })
                        .then(function(response) {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(function(session) {
                            if (stripe && typeof stripe.redirectToCheckout === 'function') {
                                return stripe.redirectToCheckout({
                                    sessionId: session.id
                                });
                            } else {
                                throw new Error(
                                    'Stripe object is not initialized correctly or redirectToCheckout is undefined');
                            }
                        })
                        .then(function(result) {
                            if (result.error) {
                                alert(result.error.message);
                            }
                        })
                        .catch(function(error) {
                            console.error('Error:', error);
                        });
                } else {
                    fetch('{{ route('prepare-for-registration') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                        })
                        .then(function(response) {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(function(data) {
                            if (data.success) {
                                console.log('Prepared for registration');
                                window.location.href = '/register';
                            } else {
                                console.error('Failed to prepare for registration');
                            }
                        })
                        .catch(function(error) {
                            console.error('Error:', error);
                        });
                }

            }

            // if (payment_id) {
            //     var button = document.getElementById('checkout-button');
            //     button.addEventListener('click', function() {
            //         PayonStripe(payment_id);
            //     });
            // }

        }
        document.getElementById('date-time').addEventListener('click', function() {
            this.showPicker(); // Opens the native datetime picker
        });
    </script>
     <script src="https://js.stripe.com/v3/"></script>

     <script>
         let geocoder;
         let distanceService;
         let originAutocomplete;
         let map;
         let originPlace = null;
         let destinationPlaces = [];
         let distances = [];
         let totalDistance = 0;
         let markers = [];
         let directionsService;
         let directionsRenderer;
         let infoWindow;
         let indexcount = 0;
 
         $(document).ready(function() {
             // Initialize Google Maps centered on Sargodha, Pakistan
             const sargodhaLocation = {
                 lat: 51.4545,
                 lng: -2.5879
             };
             map = new google.maps.Map(document.getElementById('map'), {
                 center: sargodhaLocation,
                 zoom: 13
             });
 
             directionsService = new google.maps.DirectionsService();
             directionsRenderer = new google.maps.DirectionsRenderer();
             directionsRenderer.setMap(map);
 
             infoWindow = new google.maps.InfoWindow();
 
             const pickupInput = document.getElementById('pickupLocation');
             originAutocomplete = new google.maps.places.Autocomplete(pickupInput, {
                 bounds: new google.maps.LatLngBounds(
                     new google.maps.LatLng(49.959999, -7.572168), // South West Corner
                     new google.maps.LatLng(58.635000, 1.681530) // North East Corner
                 ),
                 componentRestrictions: {
                     country: 'uk'
                 },
             });
             originAutocomplete.addListener('place_changed', handleOriginPlaceChange);
 
             geocoder = new google.maps.Geocoder();
             distanceService = new google.maps.DistanceMatrixService();
 
             handleDestinationPlaceChange(indexcount);
         });
 
         function handleOriginPlaceChange() {
             originPlace = originAutocomplete.getPlace();
             if (!originPlace || !originPlace.geometry || !isPlaceInSargodha(originPlace)) {
                 alert('Invalid pickup location. Please select a valid location within Sargodha.');
                 originPlace = null; // Reset originPlace if it's invalid
                 return;
             }
             addMarker(originPlace.geometry.location, originPlace.formatted_address);
             checkAndCalculateDistances();
         }
 
         function handleDestinationPlaceChange(index) {
             const className = `dropLocation${index}`;
             console.log(className);
             const input = document.querySelector(`#${className}`);
 
             const autocomplete = new google.maps.places.Autocomplete(input, {
                 bounds: new google.maps.LatLngBounds(
                     new google.maps.LatLng(49.959999, -7.572168), // South West Corner of the UK
                     new google.maps.LatLng(58.635000, 1.681530) // North East Corner of the UK
                 ),
                 componentRestrictions: {
                     country: 'uk'
                 },
             });
 
             autocomplete.addListener('place_changed', () => {
                 const place = autocomplete.getPlace();
                 if (!place || !place.geometry || !isPlaceInSargodha(place)) {
                     alert('Invalid drop location. Please select a valid location within Sargodha.');
                     destinationPlaces[index] = null; // Reset the invalid destination place
                     return;
                 }
                 destinationPlaces[index] = place;
                 addMarker(place.geometry.location, place.formatted_address);
                 checkAndCalculateDistances();
             });
         }
 
 
 
 
 
         function checkAndCalculateDistances() {
             if (!originPlace || destinationPlaces.length === 0) {
                 return;
             }
 
             const allPlaces = [originPlace, ...destinationPlaces].filter(place => place);
             if (allPlaces.length < 2) {
                 return;
             }
 
             totalDistance = 0;
             distances = [];
             clearMarkers();
             for (let i = 0; i < allPlaces.length - 1; i++) {
                 const originLatLng = allPlaces[i].geometry.location;
                 const destinationLatLng = allPlaces[i + 1].geometry.location;
 
                 addMarker(originLatLng, allPlaces[i].formatted_address);
                 addMarker(destinationLatLng, allPlaces[i + 1].formatted_address);
 
                 calculateDistance(originLatLng, destinationLatLng, i);
             }
 
             drawRoute(allPlaces);
         }
 
         function calculateDistance(origin, destination, index) {
             distanceService.getDistanceMatrix({
                 origins: [origin],
                 destinations: [destination],
                 travelMode: google.maps.TravelMode.DRIVING
             }, (response, status) => {
                 if (status === 'OK') {
                     const distanceValueInMeters = response.rows[0].elements[0].distance.value;
                     const distanceValueInMiles = distanceValueInMeters / 1609.34; // Convert meters to miles
                     distances[index] = distanceValueInMiles;
                     updateTotalDistance();
                 } else {
                     console.error('Error:', status);
                 }
             });
         }
 
         function updateTotalDistance() {
             totalDistance = distances.reduce((acc, distance) => acc + distance, 0);
             const totalDistanceInMiles = totalDistance.toFixed(2);
             distance = totalDistanceInMiles;
             console.log('distance is', distance);
         }
 
         function isPlaceInSargodha(place) {
             const sargodhaBounds = new google.maps.LatLngBounds(
                 new google.maps.LatLng(49.959999, -7.572168), // South West Corner of the UK
                 new google.maps.LatLng(58.635000, 1.681530) // North East Corner of the UK
             );
             return sargodhaBounds.contains(place.geometry.location);
         }
 
         function addMarker(location, title) {
             const marker = new google.maps.Marker({
                 position: location,
                 map: map,
                 title: title
             });
             marker.addListener('click', () => {
                 infoWindow.setContent(title);
                 infoWindow.open(map, marker);
             });
             markers.push(marker);
 
             // Adjust map viewport to fit all markers
             const bounds = new google.maps.LatLngBounds();
             markers.forEach(marker => {
                 bounds.extend(marker.getPosition());
             });
             map.fitBounds(bounds);
         }
 
         function clearMarkers() {
             markers.forEach(marker => marker.setMap(null));
             markers = [];
         }
 
         function adjustMapViewport(places) {
             const bounds = new google.maps.LatLngBounds();
             places.forEach(place => bounds.extend(place.geometry.location));
             map.fitBounds(bounds);
         }
 
         function drawRoute(places) {
             const waypoints = places.slice(1, -1).map(place => ({
                 location: place.geometry.location,
                 stopover: true
             }));
             directionsService.route({
                 origin: places[0].geometry.location,
                 destination: places[places.length - 1].geometry.location,
                 waypoints: waypoints,
                 travelMode: google.maps.TravelMode.DRIVING
             }, (response, status) => {
                 if (status === 'OK') {
                     directionsRenderer.setDirections(response);
                 } else {
                     console.error('Directions request failed due to ' + status);
                 }
             });
         }
 
    
     </script>
     @include('frontend.booking.booking-js')
@endsection

