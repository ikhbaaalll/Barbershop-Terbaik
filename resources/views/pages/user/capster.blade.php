@extends('layouts.guest')

@section('title')
    Capster Detail
@endsection

@section('content')
    <div class="detail-area">
        <div class="detail-area-header">
            <div class="detail-header-btn">

                <a class="back-btn" href="{{ route('user.detail', $barber) }}"><span>&lt;</span>
                    <h4>Back</h4>
                </a>
            </div>
            <h3><span>Capster </span>detail</h3>
            <div class="detail-header-btn">
                <!-- BIARKAN KOSONG UNTUK MEMPERTAHANKAN BENTUK -->
            </div>
        </div>

        <div class="detail-area-content">
            <div class="detail-card-area">
                <div class="card detail-card">
                    <div class="detail-card-image"
                        style="background-image: url('http://localhost:8000/images/PageBG/LPBG4.jpg')"></div>
                    <div class="booking-btn-area">

                        <a href="{{ route('user.booking', $barber) }}" class="booking-link">
                            <h3>Book Your</h3>
                            <h4>Schedule Now</h4>
                            <div class="booking-btn-icon-bg"></div>
                            <div class="booking-btn-icon"></div>
                        </a>

                    </div>
                </div>
            </div>

            <div class="detail-info-area">
                <div class="detail-info-header">
                    Capster {{ $barber->name }}
                    <div class="info-rating">

                        @php
                            $rating = 3.3;
                            $intRating = intval($rating);
                            $after_comma_rating = ($rating - $intRating) * 10;
                        @endphp

                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $intRating)
                                <div class="star-rating full-star"></div>
                            @else
                                @if ($after_comma_rating > 0)
                                    <div class="star-rating point-{{ $after_comma_rating }}-star"></div>
                                    @php
                                        $after_comma_rating = 0;
                                    @endphp
                                @else
                                    <div class="star-rating empty-star"></div>
                                @endif
                            @endif
                        @endfor

                        <h4>({{ $rating }})</h4>

                    </div>
                </div>

                @for ($i = 0; $i < $barber->capsters_count; $i += 2)
                    <div class="capster-row">
                        @if ($barber->capsters_count > 1)
                            @for ($j = 0; $j < 2; $j++)
                                @break($j + $i == $barber->capsters_count)
                                <div class="capster-col">
                                    <img class="capster-photo" src="{{ $barber->capsters[$i + $j]->photo }}" alt="">
                                    <div class="capster-info">
                                        <h3>{{ $barber->capsters[$i + $j]->name }}</h3>
                                        <h5>{{ $barber->capsters[$i + $j]->age }} tahun</h5>
                                    </div>
                                </div>
                            @endfor
                        @else
                            <div class="capster-col">
                                <img class="capster-photo" src="{{ $barber->capsters[$i]->photo }}" alt="">
                                <div class="capster-info">
                                    <h3>{{ $barber->capsters[$i]->name }}</h3>
                                    <h5>{{ $barber->capsters[$i]->age }} tahun</h5>
                                </div>
                            </div>
                        @endif
                    </div>
                @endfor
            </div>
        </div>
    </div>

@endsection
