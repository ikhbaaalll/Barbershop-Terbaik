@extends('layouts.guest')

@section('title')
    XXXXXX
@endsection

@section('content')
    <div class="detail-area">
        <div class="detail-area-header">
            <div class="detail-header-btn">

                <!-- 
                    SILAKAN DIPIKIRKAN BANG BACK-END GIMANA SUPAYA PAS NGEKLIK 'BACK'
                    DIA NGARAHIN KE 'BARBERSHOP DETAIL' BUKAN LANGSUNG KE 'HOME'
                    TRIMS <3

                    TOLONG HAPUS KOMEN KALO UDAH BERES
                -->

                <a class="back-btn" href="{{ route('user.home') }}"><span>&lt;</span>
                    <h4>Back</h4>
                </a>
            </div>
            <h3><span>Capster </span>detail</h3>
            <div class="detail-header-btn"><!-- BIARKAN KOSONG UNTUK MEMPERTAHANKAN BENTUK --></div>
        </div>

        <div class="detail-area-content">
            <div class="detail-card-area">
                <div class="card detail-card">
                    <div class="detail-card-image"
                        style="background-image: url('http://localhost:8000/images/PageBG/LPBG4.jpg')"></div>
                    <div class="booking-btn-area">

                        <a href="" class="booking-link">
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
                    MI6 Agents
                    <div class="info-rating">
                        
                        @php
                            $rating             = 3.3;
                            $intRating          = intval($rating);
                            $after_comma_rating = ($rating - $intRating) * 10;
                        @endphp
                        
                        @for ($i=1; $i<=5; $i++)
                            @if($i<=$intRating)
                                <div class="star-rating full-star"></div>
                            @else
                                @if($after_comma_rating > 0)
                                    <div class="star-rating point-{{$after_comma_rating}}-star"></div>
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
                @php
                    $counts = 7;
                @endphp
                
                @for ($i = 0; $i < 7 / 2; $i++)
                    <div class="capster-row">
                        @if ($counts>1)
                            @for ($j=0; $j<2; $j++)
                                <div class="capster-col">
                                    <img class="capster-photo" src="{{ asset('images/Capsters/C' . $counts . '.JPG') }}" alt="">
                                    <div class="capster-info">
                                        <h3>Agent {{$i}}{{$i}}{{$counts }}</h3>
                                        <h5>{{$counts}}{{$i}}{{$i}} tahun</h5>
                                    </div>
                                </div>
                                @php
                                    $counts-=1;
                                @endphp
                            @endfor
                        @else
                            <div class="capster-col">
                                <img class="capster-photo" src="{{ asset('images/Capsters/C' . $counts . '.JPG') }}" alt="">
                                <div class="capster-info">
                                    <h3>Agent {{$i}}{{$i}}{{$counts }}</h3>
                                    <h5>{{$counts}}{{$i}}{{$i}} tahun</h5>
                                </div>
                            </div>
                        @endif
                    </div>
                @endfor
            </div>
        </div>
    </div>

@endsection