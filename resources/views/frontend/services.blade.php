@extends('layouts.frontend.app')

@section('content')
<section>
    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="section-title">Our <span>Services</span></h1>
        </div>

        <div class="row">
            @if ($services->count() > 0)
                @foreach ($services as $service)
                    <div class="col-md-4 mb-4">
                        <div class="card service-card h-100">
                            <img
                                src="{{ asset('uploads/services/' . $service->image) }}"
                                class="service-img card-img-top"
                                alt="Service Image"
                                style="height: 200px; object-fit: cover;"
                            />
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title service-title">{{ $service->name }}</h5>
                                <p class="service-tag mb-2">{{ $service->tag }}</p>
                                <p class="card-text text-truncate-3 text-muted">
                                    {{ $service->short_description }}
                                </p>
                                <div class="services-btn d-flex gap-2 mt-auto">
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
