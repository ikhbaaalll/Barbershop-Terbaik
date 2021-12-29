@extends('layouts.guest')

@section('content')
    <div class="recom-area">
        <div class="recom-area-header">
            <h2>Recommendations<span> for you :</span></h2>
        </div>
        <div class="recom-area-content">
            @for($i=0; $i<7; $i++)
                @if ($i == ceil((7-1)/2))
                    <input type="radio" name="slider" id="slide_{{$i}}" value="{{$i}}" class="slider_radio" checked>
                @else
                    <input type="radio" name="slider" id="slide_{{$i}}" value="{{$i}}" class="slider_radio">
                @endif
            @endfor

            <div class="slides-holder">
                @for($i=0; $i<7; $i++)
                    <label for="slide_{{$i}}" class="slider-item" onclick="CardSelected({{$i}})">
                        <div class="card shop-card">
                            <div class="shop-image" style="background-image: url({{ asset('images/PageBG/LPBG'.$i.'.jpg') }})"></div>
                            {{-- <img class="shop-image" src="{{ asset('images/PageBG/LPBG.jpg') }}" alt=""> --}}
                            <div class="shop-desc">
                                <h3 class="shop-name">{{ $i }}The Dandies</h3>
                                <h4 class="shop-address">Gatot Subroto, No. 7</h4>
                                <div class="shop-rating">
                                    @for ($j=0; $j<4; $j++)
                                        <div class="filled-star"></div>
                                    @endfor

                                    @for ($j=0; $j<5-4; $j++)
                                        <div class="empty-star"></div>
                                    @endfor
                                </div>
                                <a class="shop-detail" href="">View Detail</a>
                            </div>
                        </div>
                    </label>
                @endfor


            </div>

            
            {{-- <div class="recom-prev">&lt;</div>
            <div class="recom-next">&gt;</div> --}}
        </div>

    </div>
@endsection

@section('additional-script')
    <script>
        
        
    </script>
@endsection
