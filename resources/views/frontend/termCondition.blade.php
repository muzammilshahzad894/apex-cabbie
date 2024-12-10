@extends('layouts.frontend.app')

<style>
    .terms-section {
        padding: 80px 20px;
        background-color: #f8f9fa;
    }

    .terms-container {
        max-width: 1100px;
        margin: 0 auto;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 40px 30px;
    }

    .terms-heading {
        font-size: 32px;
        text-align: center;
        font-weight: 700;
        color: #333;
        margin-bottom: 50px;
    }

    .terms-content h2 {
        font-size: 24px;
        margin-top: 30px;
        margin-bottom: 15px;
        color: #444;
        border-bottom: 2px solid #E1CB83;
        display: inline-block;
        padding-bottom: 5px;
    }

    .terms-content h3 {
        font-size: 20px;
        margin-top: 20px;
        margin-bottom: 10px;
        color: #555;
    }

    .terms-content ul {
        list-style: disc;
        margin-left: 20px;
    }

    .terms-content li {
        margin-bottom: 10px;
        font-size: 16px;
    }

    .terms-content p {
        margin-bottom: 15px;
        font-size: 16px;
        color: #666;
    }

    .contact-info {
        margin-top: 40px;
        font-size: 16px;
        color: #555;
    }

    .contact-info strong {
        font-weight: bold;
    }
</style>

@section('content')
<section class="terms-section">
    <div class="terms-container">
        <h1 class="terms-heading">Terms and Conditions</h1>
        <div class="terms-content">
            <h2>Cancellation, Charges and Payment</h2>
            <ul>
                <li>1. Free Cancellation: You may cancel your booking free of charge up to 24 hours before your scheduled pick-up time.</li>
                <li>2. Cancellation Within 24 Hours: If you cancel within 24 hours, a fee of 50% of the booking will be charged.</li>
                <li>3. Cancellation After Driver Dispatch: If the driver has been dispatched, the full amount of the booking will be charged.</li>
                <li>4. No-Show Policy: Failing to show up without prior cancellation will result in a full booking charge.</li>
                <li>5. Refunds: Refunds will follow our policy, processed promptly and fairly.</li>
                <li>6. Modification of Booking: Changes within 24 hours of pick-up may incur additional charges.</li>
                <li>7. Exceptional Circumstances: We consider emergencies or severe weather on a case-by-case basis.</li>
                <li>8. Contact Information: To cancel or modify, contact us via our website details.</li>
            </ul>

            <h2>Privacy Policy</h2>
            <h3>Section 1 – Information Collection</h3>
            <p>We collect personal information such as your name, address, email, and phone number during service requests.</p>
            <p>Email marketing (if applicable): With your consent, we may send you updates and service offers.</p>

            <h3>Section 2 – Consent</h3>
            <p><strong>How do you get my consent?</strong> Consent is assumed when you provide personal information for services.</p>
            <p><strong>How do I withdraw my consent?</strong> Contact us to withdraw your consent at any time.</p>

            <h3>Section 3 – Disclosure</h3>
            <p>Personal information may be disclosed if required by law or if terms are violated.</p>

            <h3>Section 4 – Payment Providers</h3>
            <p>Transactions are encrypted through PCI-DSS standards and securely handled by third-party providers.</p>

            <h3>Section 5 – Third-Party Services</h3>
            <p>Third-party providers adhere to privacy policies that govern your personal information during transactions.</p>
            <p>We encourage reviewing the privacy practices of other sites you engage with through our platform.</p>

            <h3>Links</h3>
            <p>Our site contains links to external websites. We are not responsible for their privacy practices.</p>

            <h3>Section 6 – Security</h3>
            <p>Your personal information is protected using encryption and strict industry standards.</p>

            <h3>Section 7 – Age of Consent</h3>
            <p>By using this site, you confirm legal majority or appropriate consent for dependents.</p>

            <h3>Section 8 – Changes to this Privacy Policy</h3>
            <p>We reserve the right to modify the privacy policy at any time, with changes effective immediately.</p>

            <h2>Questions and Contacting Us</h2>
            <p>If you have questions, please contact us via the contact page or call <strong>01173322782</strong>.</p>
        </div>
    </div>
</section>
@endsection
