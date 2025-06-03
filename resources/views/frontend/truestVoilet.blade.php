@extends('layouts.frontend.app')

<style>
    section .container {
        padding-top: 0px !important;
        padding-bottom: 0px !important;
    }

    .testimonials-hero {
    background: url('https://bristolcabwise.com/frontend-assets/img/slider/review.jpeg') center center/cover no-repeat;
    height: 85vh;
    position: relative;
    display: flex;
    justify-content: flex-start; /* Align text to the left */
    align-items: center; /* Vertically center */
    padding: 0 60px;
}

.testimonials-hero .overlay {
    background-color: rgba(0, 0, 0, 0);
    padding: 40px;
    color: #fff;
    border-radius: 10px;
    text-align: left; /* Ensure text is aligned left */
    display: flex;
    flex-direction: column;
    justify-content: center;
}


    .testimonials-hero .title {
        font-size: 48px;
        font-weight: 700;
        margin-bottom: 20px;
        color: #fff;
    }

    .testimonials-hero .subtitle {
        font-size: 22px;
        line-height: 1.6;
        color: orange;
    }

    /* Testimonials Section */
    .testimonials-section {
        background-color: #f8f9fa;
        padding: 80px 0;
    }

    .testimonials-title {
        font-size: 40px;
        font-weight: bold;
        text-align: center;
        color: #333;
        margin-bottom: 60px;
    }

    .testimonials-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 40px;
    }

    .testimonial-card {
        background-color: #fff;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        min-height: 100%;
    }

    .testimonial-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.15);
    }

    .testimonial-rating {
        color: #f5b942;
        font-size: 20px;
        margin-bottom: 10px;
    }

    .testimonial-content {
        font-size: 18px;
        color: #555;
        line-height: 1.6;
        margin-bottom: 20px;
        flex-grow: 1;
    }

    .testimonial-author {
        display: flex;
        align-items: center;
        margin-top: 20px;
    }

    .testimonial-author img {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        object-fit: contain;
        margin-right: 20px;
        border: 3px solid #e09239;
    }

    .testimonial-author-name {
        font-size: 20px;
        font-weight: bold;
        color: #333;
    }

    .testimonial-author-title {
        font-size: 16px;
        color: #777;
    }

    @media (max-width: 768px) {
        .testimonials-hero {
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 0 20px;
            text-align: center;
        }

        .testimonials-hero .overlay {
            text-align: center;
        }

        .testimonials-hero .title {
            font-size: 36px;
        }

        .testimonials-hero .subtitle {
            font-size: 18px;
        }
    }
</style>

@section('content')

<!-- Header Image with Right-Aligned Text -->
<div class="testimonials-hero">
    <div class="overlay">
        <h1 class="title">Reviews</h1>
        <p class="subtitle">Top-Rated On Trustpilot For Our<br>Punctual And Professional Cab Service.</p>
    </div>
</div>

<!-- Testimonials Section -->
<section class="testimonials-section">
    <div class="container">
        <h2 class="testimonials-title">What Our Clients Say</h2>
        <div class="testimonials-container">

            <!-- Testimonial 1 -->
            <div class="testimonial-card">
                <div>
                    <div class="testimonial-rating">★★★★★</div>
                    <p class="testimonial-content">"The driver arrived at the airport early to ensure he was there waiting for us. Great communication, very clean and sleek car (with sweets), and very friendly. Safe, efficient driving and helpful throughout. A young company that truly prioritizes customer service — what a gift after a long flight! Will definitely use again."</p>
                </div>
                <div class="testimonial-author">
                    <img src="{{ asset('frontend-assets/img/clients/trustvoilet.jpeg') }}" alt="Client Avatar">
                    <div>
                        <div class="testimonial-author-name">Review by C R</div>
                        <div class="testimonial-author-title">25 October 2024</div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="testimonial-card">
                <div>
                    <div class="testimonial-rating">★★★★★</div>
                    <p class="testimonial-content">"Fast, reliable and very friendly service. I’ve used this company on numerous occasions, they have always been on time, with great communication. Would definitely recommend!"</p>
                </div>
                <div class="testimonial-author">
                    <img src="{{ asset('frontend-assets/img/clients/trustvoilet.jpeg') }}" alt="Client Avatar">
                    <div>
                        <div class="testimonial-author-name">Review by Becky Hawker</div>
                        <div class="testimonial-author-title">02 October 2024</div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="testimonial-card">
                <div>
                    <div class="testimonial-rating">★★★★★</div>
                    <p class="testimonial-content">"A return journey from the airport. Cabwise were on time and in a convenient meeting place. The driver kept me informed of where he was, which meant I could be on my way home quickly."</p>
                </div>
                <div class="testimonial-author">
                    <img src="{{ asset('frontend-assets/img/clients/trustvoilet.jpeg') }}" alt="Client Avatar">
                    <div>
                        <div class="testimonial-author-name">Review by Richard Jarvis</div>
                        <div class="testimonial-author-title">08 November 2024</div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 4 -->
            <div class="testimonial-card">
                <div>
                    <div class="testimonial-rating">★★★★★</div>
                    <p class="testimonial-content">Punctual, professional, and very welcoming! Have used multiple times and won’t use anyone else now."</p>
                </div>
                <div class="testimonial-author">
                    <img src="{{ asset('frontend-assets/img/clients/trustvoilet.jpeg') }}" alt="Client Avatar">
                    <div>
                        <div class="testimonial-author-name">Review by Jamie Cahill</div>
                        <div class="testimonial-author-title">01 March 2025</div>
                    </div>
                </div>
            </div>
            
            <!-- Testimonial 5 -->
            <div class="testimonial-card">
                <div>
                    <div class="testimonial-rating">★★★★★</div>
                    <p class="testimonial-content">I had an excellent experience with Apex Cabbie executive fleet. Booking was quick and hassle-free. On the day, a Mercedes E-Class arrived on time, offering a comfortable ride. Special thanks to the driver, Ali, for his professionalism and friendly service. Highly recommend!"</p>
                </div>
                <div class="testimonial-author">
                    <img src="{{ asset('frontend-assets/img/clients/yell.jpeg') }}" alt="Client Avatar">
                    <div>
                        <div class="testimonial-author-name">Review by MisbahS-6</div>
                        <div class="testimonial-author-title">03 October 2024</div>
                    </div>
                </div>
            </div>
            
            <!-- Testimonial 6 -->
            <div class="testimonial-card">
                <div>
                    <div class="testimonial-rating">★★★★★</div>
                    <p class="testimonial-content">My experience was smooth and surpassed my expectations. The driver was professional and polite throughout the journey, ensuring we arrived at Heathrow with plenty of time to spare. If you’re looking for dependable, punctual, and comfortable transportation, I highly recommend Apex Cabbie."</p>
                </div>
                <div class="testimonial-author">
                    <img src="{{ asset('frontend-assets/img/clients/google.jpeg') }}" alt="Client Avatar">
                    <div>
                        <div class="testimonial-author-name">Review by Sarah</div>
                        <div class="testimonial-author-title">25 March 2025</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
