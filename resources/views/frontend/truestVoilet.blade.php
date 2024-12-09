@extends('layouts.frontend.app')

<style>
    section .container {
        padding-top: 0px !important;
        padding-bottom: 0px !important;
    }
    /* Section Style */
    .testimonials-section {
        background-color: #f8f9fa;
        padding: 100px 0;
    }

    /* Title Style */
    .testimonials-title {
        font-size: 40px;
        font-weight: bold;
        text-align: center;
        color: #333;
        margin-bottom: 60px;
    }

    /* Testimonials Grid */
    .testimonials-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 40px;
    }

    /* Card Style */
    .testimonial-card {
        background-color: #fff;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .testimonial-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.15);
    }

    .testimonial-card::before {
        content: '\201C'; /* Opening quote mark */
        font-size: 100px;
        color: #e09239;
        position: absolute;
        top: -40px;
        left: -20px;
        opacity: 0.1;
    }

    .testimonial-card::after {
        content: '\201D'; /* Closing quote mark */
        font-size: 100px;
        color: #e09239;
        position: absolute;
        bottom: -40px;
        right: -20px;
        opacity: 0.1;
    }

    /* Testimonial Content */
    .testimonial-content {
        font-size: 18px;
        color: #555;
        line-height: 1.6;
        margin-bottom: 20px;
        position: relative;
    }

    /* Testimonial Author Style */
    .testimonial-author {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }

    .testimonial-author img {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        object-fit: cover;
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

    /* Buttons */
    .btn-primary {
        padding: 12px 30px;
        background: #e09239;
        color: #fff;
        border-radius: 30px;
        font-size: 18px;
        border: none;
        transition: background 0.3s ease;
    }

    .btn-primary:hover {
        background: #D3B26D;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .testimonial-card {
            padding: 20px;
        }

        .testimonial-content {
            font-size: 16px;
        }

        .testimonial-author img {
            width: 60px;
            height: 60px;
        }
    }
</style>

@section('content')
<section class="testimonials-section">
    <div class="container">
        <h2 class="testimonials-title">What Our Clients Say</h2>
        <div class="testimonials-container">
            <!-- Testimonial 1 -->
            <div class="testimonial-card">
                <p class="testimonial-content">"This company provided exceptional service and went above and beyond our expectations. Highly recommended!"</p>
                <div class="testimonial-author">
                    <img src="https://via.placeholder.com/70" alt="Client Avatar">
                    <div>
                        <div class="testimonial-author-name">John Doe</div>
                        <div class="testimonial-author-title">CEO, Example Corp</div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="testimonial-card">
                <p class="testimonial-content">"I was really impressed with the professionalism and results. They really know what they're doing!"</p>
                <div class="testimonial-author">
                    <img src="https://via.placeholder.com/70" alt="Client Avatar">
                    <div>
                        <div class="testimonial-author-name">Jane Smith</div>
                        <div class="testimonial-author-title">Marketing Director, Tech Solutions</div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="testimonial-card">
                <p class="testimonial-content">"A game-changer! The results were immediate, and our team has never been more efficient."</p>
                <div class="testimonial-author">
                    <img src="https://via.placeholder.com/70" alt="Client Avatar">
                    <div>
                        <div class="testimonial-author-name">Samuel Lee</div>
                        <div class="testimonial-author-title">Founder, Innovate Inc.</div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 4 -->
            <div class="testimonial-card">
                <p class="testimonial-content">"Working with this team was a pleasure. They provided great value and helped us reach new heights!"</p>
                <div class="testimonial-author">
                    <img src="https://via.placeholder.com/70" alt="Client Avatar">
                    <div>
                        <div class="testimonial-author-name">Olivia Brown</div>
                        <div class="testimonial-author-title">Product Manager, Digital Works</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
