@extends('layouts.guest')

@section('title')
    Home
@endsection

@section('content')
    <div class="recom-area">
        <div class="recom-area-header">
            <h2>Recommendations<span> for you :</span></h2>
        </div>
        <div class="recom-area-content">
            @foreach ($barbers as $barber)
                @if ($loop->index == ceil(($barberCount - 1) / 2))
                    <input type="radio" name="slider" id="slide_{{ $loop->index }}" value="{{ $loop->index }}"
                        class="slider_radio" checked>
                @else
                    <input type="radio" name="slider" id="slide_{{ $loop->index }}" value="{{ $loop->index }}"
                        class="slider_radio">
                @endif
            @endforeach

            <div class="slides-holder">
                @foreach ($barbers as $barber)
                    <label for="slide_{{ $loop->index }}" class="slider-item"
                        onclick="CardSelected({{ $loop->index }})">
                        <div class="card shop-card">

                            {{-- <div class="shop-image" style="background-image: url('{{ $barber->photo }}')"></div> --}}

                            <div class="shop-image"
                                style="background-image: url('http://localhost:8000/images/PageBG/LPBG4.jpg')"></div>

                            <div class="shop-desc">
                                <h3 class="shop-name">{{ $barber->name }}</h3>
                                <h4 class="shop-address">{{ $barber->address }}</h4>

                                @php
                                    $ratings = [4.3, 3.2, 1.4, 3.7, 2.6, 3.5, 5.0];
                                @endphp

                                <div class="shop-rating">
                                    @php
                                        $intrating          = intval($ratings[$loop->index]);
                                        $after_comma_rating = ($ratings[$loop->index] - $intrating) * 10;
                                    @endphp
                                    @for ($j = 1; $j<=5; $j++)
                                        @if($j<=$intrating)
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
                                    
                                    <h4>({{ $ratings[$loop->index] }})</h4>
                                    
                                </div>
                                <a class="shop-detail" href="{{ route('user.detail', $barber) }}">View Detail</a>
                            </div>
                        </div>
                    </label>
                @endforeach

                <div id="nextBtn" class="recom-next" onclick="changeSlide(1)">&gt;</div>
                <div id="prevBtn" class="recom-prev" onclick="changeSlide(-1)">&lt;</div>
            </div>
        </div>
    </div>
@endsection

@section('additional-script')
@endsection
