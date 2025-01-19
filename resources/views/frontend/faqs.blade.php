@extends('layouts.frontend.app')

<style>
.banner-header .container {
    padding-top: 0px !important;
    padding-bottom: 0px !important;
}
/* FAQ Section */
.faq-section {
    font-family: "Arial", sans-serif;
}

.faq-section .container {
    padding-top: 0 !important;
    padding-bottom: 0px !important;
}

/* Accordion Item Styling */
.accordion-item {
    border: 1px solid #ddd;
    border-radius: 10px;
    overflow: hidden;
    transition: transform 0.3s ease;
}

.accordion-item:hover {
    transform: translateY(-2px);
}

/* Accordion Button Styling */
.accordion-button {
    background: #f8f9fa !important;
    border: none;
    padding: 1rem;
    font-size: 1.1rem;
    font-weight: bold;
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: #333;
    transition: color 0.3s ease;
    position: relative;
}

.accordion-button span {
    position: absolute;
    right: 20px;
    font-size: 30px;
}

.accordion-button:focus {
    box-shadow: none;
}

.accordion-button:not(.collapsed) {
    color: #007bff;
    background: #e09239 !important;
}

button:focus:not(:focus-visible) {
    outline: none;
    box-shadow: none;
}

/* Plus and Cross Icon */
.faq-toggle-icon {
    font-size: 1.5rem;
    font-weight: bold;
    line-height: 1;
    transition: transform 0.3s ease, color 0.3s ease;
}

.accordion-button.collapsed .faq-toggle-icon {
    content: '+';
    transform: rotate(0);
    color: #e09239;
}

.accordion-button:not(.collapsed) .faq-toggle-icon {
    content: '×';
    transform: rotate(45deg);
    color: #dc3545;
}

/* Accordion Body */
.accordion-body {
    background: transparent;
    padding: 1rem;
    font-size: 0.95rem;
    line-height: 1.6;
    color: #666;
}

.accordion-button::after {
    width: unset !important;
}
</style>

@section('content')
<!-- Header Banner -->
<section class="banner-header" style="background-color: #f5f5f5;">
    <div class="container d-flex align-items-center justify-content-between">
        <!-- Left Side: About Text -->
        <div class="text-left">
            <h1 class="display-4 text-dark m-0">FAQ's</h1>
        </div>

        <div class="text-right d-flex align-items-center">
            <i class="fas fa-home me-2 primary-text"></i>
            <span class="text-dark">Home</span>
        </div>
    </div>
</section>
<section class="faq-section py-5">
    <div class="container">
        <!-- Section Title -->
        <div class="text-center mb-4">
            <h2 class="fw-bold">Apex Cabbie FAQs</h2>
            <!-- <p class="text-muted fs-5">Find answers to the most common questions below.</p> -->
        </div>

        <!-- FAQ Accordion -->
        <div class="accordion" id="faqAccordion">
            <!-- FAQ Item 1 -->
            <div class="accordion-item border-0 mb-3 shadow-sm rounded">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed d-flex justify-content-between align-items-center text-dark fw-bold" 
                            type="button" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapseOne" 
                            aria-expanded="false" 
                            aria-controls="collapseOne">
                        What can I expect when booking a pick and drop service?
                        <span class="faq-toggle-icon">+</span>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                        Reliable, Professional & Convenient Service – When you book a pick and drop service with us, you can expect punctuality and professionalism. Our drivers will arrive on time, assist you with your luggage, and ensure a comfortable journey. They are trained to provide a seamless and stress-free experience from the moment you are picked up to your drop-off.
                    </div>
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div class="accordion-item border-0 mb-3 shadow-sm rounded">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed d-flex justify-content-between align-items-center text-dark fw-bold" 
                            type="button" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapseTwo" 
                            aria-expanded="false" 
                            aria-controls="collapseTwo">
                        Are your drivers licensed and vetted?
                        <span class="faq-toggle-icon">+</span>
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                        Yes, all our drivers are fully licensed and have undergone thorough background checks. They are vetted to ensure safety and reliability.
                    </div>
                </div>
            </div>

            <!-- FAQ Item 3 -->
            <div class="accordion-item border-0 mb-3 shadow-sm rounded">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed d-flex justify-content-between align-items-center text-dark fw-bold" 
                            type="button" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapseThree" 
                            aria-expanded="false" 
                            aria-controls="collapseThree">
                        What type of vehicles do you use for pick and drop services?
                        <span class="faq-toggle-icon">+</span>
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                        We offer a range of vehicles to suit your needs, including economy saloons, executive saloons, compact MPVs, 7-seater MPVs, executive MPVs, and 8-seater MPVs. All our vehicles are well-maintained, clean, and equipped with modern amenities for your comfort.
                    </div>
                </div>
            </div>
            
            <!-- FAQ Item 4 -->
            <div class="accordion-item border-0 mb-3 shadow-sm rounded">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed d-flex justify-content-between align-items-center text-dark fw-bold" 
                            type="button" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapseFour" 
                            aria-expanded="false" 
                            aria-controls="collapseFour">
                        Can I request a specific driver?
                        <span class="faq-toggle-icon">+</span>
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                        Yes, you can request a specific driver. Please inform us of your preference at the time of booking, and we will do our best to accommodate your request.
                    </div>
                </div>
            </div>
            
            <!-- FAQ Item 5 -->
            <div class="accordion-item border-0 mb-3 shadow-sm rounded">
                <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed d-flex justify-content-between align-items-center text-dark fw-bold" 
                            type="button" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapseFive" 
                            aria-expanded="false" 
                            aria-controls="collapseFive">
                        what payment method do you accept.
                        <span class="faq-toggle-icon">+</span>
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                        We accept major credit and debit cards. Please check with us at the time of booking for any additional payment options available in your area.
                    </div>
                </div>
            </div>
            
            <!-- FAQ Item 6 -->
            <div class="accordion-item border-0 mb-3 shadow-sm rounded">
                <h2 class="accordion-header" id="headingSix">
                    <button class="accordion-button collapsed d-flex justify-content-between align-items-center text-dark fw-bold" 
                            type="button" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapseSix" 
                            aria-expanded="false" 
                            aria-controls="collapseSix">
                        Whats your availability and operating hours of the business.
                        <span class="faq-toggle-icon">+</span>
                    </button>
                </h2>
                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                        Our services are available 24/7, ensuring they are delivered whenever you need them. For any inquiries, you can contact us via phone during our business hours, which vary according to our opening times. Outside of these hours, feel free to send us an email or message for assistance.
                    </div>
                </div>
            </div>
            
            <!-- FAQ Item 7 -->
            <div class="accordion-item border-0 mb-3 shadow-sm rounded">
                <h2 class="accordion-header" id="headingSeven">
                    <button class="accordion-button collapsed d-flex justify-content-between align-items-center text-dark fw-bold" 
                            type="button" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapseSeven" 
                            aria-expanded="false" 
                            aria-controls="collapseSeven">
                        Are there refreshments available in the vehicle?
                        <span class="faq-toggle-icon">+</span>
                    </button>
                </h2>
                <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                        We offer bottled water in select vehicles for specific fleets and services. Please note that not all vehicles adhere to our standard service, but you may request this amenity in advance, and we will make every effort to accommodate your needs.
                    </div>
                </div>
            </div>
            
            <!-- FAQ Item 8 -->
            <div class="accordion-item border-0 mb-3 shadow-sm rounded">
                <h2 class="accordion-header" id="headingEight">
                    <button class="accordion-button collapsed d-flex justify-content-between align-items-center text-dark fw-bold" 
                            type="button" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapseEight" 
                            aria-expanded="false" 
                            aria-controls="collapseEight">
                        How do I identify my driver for pick-up?
                        <span class="faq-toggle-icon">+</span>
                    </button>
                </h2>
                <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                        For airport and scheduled pickups, your driver will meet you at the designated pickup point. If the pickup is at an airport, we will contact you to confirm the details. For meet-and-greet service, the driver will greet you at the arrivals hall with a signboard displaying your name and assist you to your vehicle.
                    </div>
                </div>
            </div>
            
            <!-- FAQ Item 9 -->
            <div class="accordion-item border-0 mb-3 shadow-sm rounded">
                <h2 class="accordion-header" id="headingNine">
                    <button class="accordion-button collapsed d-flex justify-content-between align-items-center text-dark fw-bold" 
                            type="button" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapseNine" 
                            aria-expanded="false" 
                            aria-controls="collapseNine">
                        Will the driver help with my luggage?
                        <span class="faq-toggle-icon">+</span>
                    </button>
                </h2>
                <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                        Yes, our drivers are more than happy to assist you with your luggage, both at pick-up and drop-off points.
                    </div>
                </div>
            </div>
            
            <!-- FAQ Item 10 -->
            <div class="accordion-item border-0 mb-3 shadow-sm rounded">
                <h2 class="accordion-header" id="headingTen">
                    <button class="accordion-button collapsed d-flex justify-content-between align-items-center text-dark fw-bold" 
                            type="button" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapseTen" 
                            aria-expanded="false" 
                            aria-controls="collapseTen">
                        What if my flight is delayed?
                        <span class="faq-toggle-icon">+</span>
                    </button>
                </h2>
                <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                        We monitor flight schedules to accommodate any delays. Your driver will be updated with the new arrival time and will adjust the pick-up accordingly.
                    </div>
                </div>
            </div>
            
            <!-- FAQ Item 11 -->
            <div class="accordion-item border-0 mb-3 shadow-sm rounded">
                <h2 class="accordion-header" id="headingEleven">
                    <button class="accordion-button collapsed d-flex justify-content-between align-items-center text-dark fw-bold" 
                            type="button" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapseEleven" 
                            aria-expanded="false" 
                            aria-controls="collapseEleven">
                        Can I book a round trip or recurring pick and drop service?
                        <span class="faq-toggle-icon">+</span>
                    </button>
                </h2>
                <div id="collapseEleven" class="accordion-collapse collapse" aria-labelledby="headingEleven" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                        Absolutely. We offer round trips and recurring services for regular commuters. Please contact us to arrange your schedule and discuss any specific requirements.
                    </div>
                </div>
            </div>
            
            <!-- FAQ Item 12 -->
            <div class="accordion-item border-0 mb-3 shadow-sm rounded">
                <h2 class="accordion-header" id="headingTwelve">
                    <button class="accordion-button collapsed d-flex justify-content-between align-items-center text-dark fw-bold" 
                            type="button" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapseTwelve" 
                            aria-expanded="false" 
                            aria-controls="collapseTwelve">
                        Do you charge extra for waiting time?
                        <span class="faq-toggle-icon">+</span>
                    </button>
                </h2>
                <div id="collapseTwelve" class="accordion-collapse collapse" aria-labelledby="headingTwelve" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                        Yes, additional charges may apply for waiting time, typically calculated based on the duration of the wait. For airport pickups, we offer up to 1 hour of complimentary waiting time after your flight lands. Beyond this, a charge of £0.30 per minute applies.
                    </div>
                </div>
            </div>
            
            <!-- FAQ Item 13 -->
            <div class="accordion-item border-0 mb-3 shadow-sm rounded">
                <h2 class="accordion-header" id="headingThirteen">
                    <button class="accordion-button collapsed d-flex justify-content-between align-items-center text-dark fw-bold" 
                            type="button" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapseThirteen" 
                            aria-expanded="false" 
                            aria-controls="collapseThirteen">
                        How much advance notice is required to cancel my booking?
                        <span class="faq-toggle-icon">+</span>
                    </button>
                </h2>
                <div id="collapseThirteen" class="accordion-collapse collapse" aria-labelledby="headingThirteen" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                        You may cancel your booking free of charge up to 24 hours before your scheduled pick-up time. Cancellations made within 24 hours of the scheduled pick-up time will incur a cancellation fee equivalent to 50% of the total booking amount. If the driver has already been dispatched, the full amount of the booking will be charged, regardless of the cancellation time.
                    </div>
                </div>
            </div>
            
            <!-- FAQ Item 14 -->
            <div class="accordion-item border-0 mb-3 shadow-sm rounded">
                <h2 class="accordion-header" id="headingFourteen">
                    <button class="accordion-button collapsed d-flex justify-content-between align-items-center text-dark fw-bold" 
                            type="button" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapseFourteen" 
                            aria-expanded="false" 
                            aria-controls="collapseFourteen">
                        How do I make a booking?
                        <span class="faq-toggle-icon">+</span>
                    </button>
                </h2>
                <div id="collapseFourteen" class="accordion-collapse collapse" aria-labelledby="headingFourteen" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                        You can make a booking through our website, by phone, or via our mobile app. Simply provide your pick-up and drop-off details, and we will take care of the rest.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

