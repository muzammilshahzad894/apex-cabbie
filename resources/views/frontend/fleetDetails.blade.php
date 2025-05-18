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
             style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('uploads/fleets/' . $fleet->image) }}') center/cover no-repeat;">
        <div class="v-middle py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="display-4 fw-bold text-white">{{ $fleet->name }}</h1>
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
                            {{ $fleet->name }}
                        </h3>
                        <p class="mb-4 text-muted">{{ $fleet->detail_page_description }}</p>

                        @if(!empty($fleet->features))
                            <ul class="list-unstyled">
                                @foreach(explode(',', $fleet->features) as $feature)
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
                    <div class="d-flex gap-2 align-items-center" >
                        <div class="icon"><i class="fas fa-users primary-text"></i></div>
                        <div class="d-flex align-items-center gap-2">
                            <p class="mb-0">Max Passengers:</p>
                            <h6 class="mb-0">({{ $fleet->max_passengers }})</h6>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="d-flex gap-2 align-items-center">
                            <div class="icon"><i class="fas fa-suitcase primary-text"></i></div>
                            <div class="d-flex align-items-center gap-2">
                                <p class="mb-0">Max Suitcases:</p>
                                <h6 class="mb-0">({{ $fleet->max_suitecases }})</h6>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="d-flex gap-2 align-items-center">
                            <div class="icon"><i class="fas fa-briefcase primary-text"></i></div>
                            <div class="d-flex align-items-center gap-2">
                                <p class="mb-0">Max Hand Luggage:</p>
                                <h6 class="mb-0">({{ $fleet->max_hand_luggage }})</h6>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Image Column --}}
                <div class="col-lg-5 offset-lg-1 col-md-12">
                    <div class="item text-center">
                        <img src="{{ asset('uploads/fleets/'.$fleet->image) }}"
                            alt="about"
                            class="img-fluid rounded shadow-sm about-img">
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    @if ($fleets->count() > 0)
        <section>
            <div class="container pb-5">
                <div class="outer-box">
                    <div class="text-center mb-5">
                        <h1 class="section-title">Our <span>Fleets</span></h1>
                    </div>
                    <div class="carousel-outer">
                        <div class="swiper team-slider">
                            <div class="swiper-wrapper">
                                @foreach ($fleets as $fleet)
                                <div class="swiper-slide">
                                    <div class="team-block-two">
                                        <div class="inner-box">
                                            <figure class="image">
                                                <img src="{{ asset('uploads/fleets/' . $fleet->image) }}" alt="Image" style="height: 200px; object-fit: cover;" />
                                            </figure>
                                            <div class="content">
                                                <!-- <div class="designation">{{ $fleet->name }}</div> -->
                                                <h4 class="name"><a href="page-team-details.html">{{ $fleet->name }}</a></h4>
                                                <div class="info-box">
                                                    <a href="{{ route('frontend.fleetDetailsFrontend', $fleet->id) }}" class="info-btn">
                                                        <span class="icon"><i class="fa fa-info-circle"></i></span> <span class="text">View Details</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- <div class="swiper-button-prev"><i class="icon fa fa-angles-left"></i></div>
                    <div class="swiper-button-next"><i class="icon fa fa-angles-right"></i></div> -->
                </div>
            </div>
        </section>
    @endif
@endsection
