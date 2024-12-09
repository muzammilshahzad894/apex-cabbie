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
            <h2 class="fw-bold">Frequently Asked Questions</h2>
            <p class="text-muted fs-5">Find answers to the most common questions below.</p>
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
                        What is your refund policy?
                        <span class="faq-toggle-icon">+</span>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                        You can cancel your booking up to 12 hours before the scheduled time to receive a full refund. Contact our support team for assistance.
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
                        How do I update my account details?
                        <span class="faq-toggle-icon">+</span>
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                        Log in to your account, go to the settings page, and update your details.
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
                        Do you offer customer support?
                        <span class="faq-toggle-icon">+</span>
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted">
                        Yes, our support team is available 24/7 to assist you with any queries or issues.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

