@extends('layouts.guest')

@section('title')
    {{ $barber->name }}
@endsection

@section('content')
    <div class="detail-area">
        <div class="detail-area-header">
            <div class="detail-header-btn">
                <a class="back-btn" href="{{ route('user.home') }}"><span>&lt;</span>
                    <h4>Back</h4>
                </a>
            </div>
            <h3><span>Barbershop </span>detail</h3>
            <div class="detail-header-btn">
                <a class="choose-capster-btn" href="{{ route('user.capster', $barber) }}">
                    <h4>See Capster</h4><span>&gt;</span>
                </a>
            </div>
        </div>
        <div class="detail-area-content">
            <div class="detail-card-area">
                <div class="card detail-card">
                    <div class="detail-card-image" style="background-image: url('{{ asset($barber->photo) }}')"></div>
                </div>

                {{-- 'open' => date('H:i:s', rand(28800,36000)), // 08:00:00 - 10:00:00
            'close' => date('H:i:s', rand(77400,79200)), // 21:30:00 - 22:00:00 --}}
            </div>
            <div class="detail-info-area">
                <div class="detail-info-header">
                    {{ $barber->name }}
                    <div class="info-rating">
                        @for ($j = 1; $j <= 5; $j++)
                            @if ($j <= $barber->avg_review_star)
                                <div class="star-rating full-star"></div>
                            @else
                                @if ($barber->avg_review_star_comma > 0)
                                    <div class="star-rating point-{{ $barber->avg_review_star_comma }}-star">
                                    </div>
                                    @php
                                        $barber->avg_review_star_comma = 0;
                                    @endphp
                                @else
                                    <div class="star-rating empty-star"></div>
                                @endif
                            @endif
                        @endfor

                        <h4>({{ $barber->orders_avg_review_star }})</h4>

                    </div>
                </div>
                <div class="detail-info-row">
                    <h5>Location :</h5>
                    <h4>{{ $barber->address }}</h4>
                </div>
                <div class="detail-info-row">
                    <h5>Opening Hours :</h5>
                    <h4>{{ $barber->open->format('H:i') }} - {{ $barber->close->format('H:i') }}</h4>
                </div>
                <div class="detail-info-row">
                    <h5>Price :</h5>
                    <h4>Rp. {{ number_format($barber->price, 2) }},-</h4>
                </div>
                <div class="detail-info-row">
                    <h5>Facilities :</h5>
                    <h4>
                        @foreach ($barber->facilities as $facilities)
                            {{ $facilities->name }}@if (!$loop->last), @endif
                        @endforeach
                    </h4>
                </div>
                <div class="detail-info-row">
                    <h5>Services :</h5>
                    <h4>
                        @foreach ($barber->services as $service)
                            {{ $service->name }}@if (!$loop->last), @endif
                        @endforeach
                    </h4>
                </div>
            </div>
        </div>
    </div>

@endsection
