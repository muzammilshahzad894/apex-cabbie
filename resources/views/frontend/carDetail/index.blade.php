@extends('layouts.frontend.app')

@section('content')
<style>
    .about-section {
        margin-top: 30px;
    }
    .about-img {
        height: 400px;
        object-fit: cover;
        animation: fadeInUp 0.8s ease-in-out;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
    <section class="banner-header section-padding text-white text-center position-relative"
             style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('uploads/services/'.$service->image) }}') center/cover no-repeat;">
        <div class="v-middle py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="display-4 fw-bold text-white">{{ $service->name }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-section section-padding text-dark py-5">
        <div class="container">
            <div class="row align-items-start">
                {{-- Text Column --}}
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="content">
                        <h3 class="fw-bold primary-text">
                            {{ $service->detail_page_first_heading }}
                            <span class="text-secondary">{{ $service->detail_page_second_heading }}</span>
                        </h3>
                        <p class="mb-4 text-muted">{{ $service->detail_page_description }}</p>

                        @if(!empty($service->detail_page_features))
                            <ul class="list-unstyled">
                                @foreach(explode(',', $service->detail_page_features) as $feature)
                                    <li class="d-flex align-items-start mb-2">
                                        <span class="me-2 text-success">
                                            <i class="bi bi-check-circle-fill"></i>
                                        </span>
                                        <span class="text-dark">{{ trim($feature) }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

                {{-- Image Column --}}
                <div class="col-lg-5 offset-lg-1 col-md-12">
                    <div class="item text-center">
                        <img src="{{ asset('uploads/services/'.$service->image) }}"
                            alt="about"
                            class="img-fluid rounded shadow-sm about-img">
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section>
        <div class="container pb-5">
            <div class="text-center mb-5">
                <h1 class="section-title">Our <span>Services</span></h1>
            </div>
        
            <div class="pricing-carousel owl-carousel owl-theme default-dots">
                @if ($services->count() > 0)
                    @foreach ($services as $service)
                        <div class="pricing-block-four">
                            <div class="card service-card">
                                <img
                                    src="{{ asset('uploads/services/' . $service->image) }}"
                                    class="service-img"
                                    alt="Service Image"
                                    style="height: 200px; object-fit: cover;"
                                />
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title service-title">{{ $service->name }}</h5>
                                    <p class="service-tag mb-2">{{ $service->tag }}</p>
                                    <p class="card-text text-truncate-3 text-muted">
                                        {{ $service->short_description }}
                                    </p>
                                    <div class="services-btn d-flex gap-2">
                                        <a href="{{ route('frontend.carDetails', $service->id) }}" class="theme-btn btn-style-two hover-light">
                                            <span class="btn-title">View Details</span>
                                        </a>
                                        <a href="{{ route('frontend.book-online', ['id' => $service->id, 'name' => str_replace(' ', '-', $service->name)]) }}" class="theme-btn btn-style-two hover-light">
                                            <span class="btn-title">Book Now</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection
