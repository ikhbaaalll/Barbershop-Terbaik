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
                                <div class="shop-rating">
                                    @for ($j = 0; $j < 4; $j++)
                                        <div class="filled-star"></div>
                                    @endfor

                                    @for ($j = 0; $j < 5 - 4; $j++)
                                        <div class="empty-star"></div>
                                    @endfor
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
