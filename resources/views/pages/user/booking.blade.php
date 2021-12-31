@extends('layouts.guest')

@section('title')
    Booking Form
@endsection

@section('content')
    <div class="booking-area">

        <div class="booking-area-header">

            <div class="booking-header-btn">

                <!-- 
                    SILAKAN DIPIKIRKAN BANG BACK-END GIMANA SUPAYA PAS NGEKLIK 'BACK'
                    DIA NGARAHIN KE TEPAT HALAMAN SEBELUMNYA DIA BERASAL
                    BUKAN LANGSUNG KE 'HOME'
                    TRIMS <3 
                -->

                <a class="back-btn" href="{{ route('user.home') }}"><span>&lt;</span>
                    <h4>Back</h4>
                </a>

                <!-- 
                    TOLONG HAPUS KOMEN KALO UDAH BERES 
                -->
                
            </div>

            <h3><span>Book your </span>schedule<span> at </span> <span class="yellow">Larkin, Rempel and Ledner</span></h3>

            <div class="booking-header-btn"><!-- BIARKAN KOSONG UNTUK MEMPERTAHANKAN BENTUK --></div>

        </div>

        <div class="booking-area-content">

            <form action="{{ route('register') }}" method="post">
                @csrf

                <!-- Menggunakan 'ID' atau 'Nama' User yang saat ini aktif -->
                <input type="hidden" name="name" value="{{ auth()->user()->name }}"> 

                <!-- Menggunakan 'ID' Barbershop yang sama ketika link menuju halaman ini dituju -->
                <!-- Atau boleh langsung mengacu dari 'ID' Capster yang dipilih (berarti ini dihapus) -->
                <!-- Tolong sesuaikan attribute 'name' nya ya Bal -->
                <input type="hidden" name="barber" value="">

                <div class="input-group-row">

                    <div class="input-group-col col-3">
                        <h2 class="smemew">Pick a date</h2>
                        <div class="input-group col-63">
                            <input type="date" id="date" name="date" class="form-control no-padding @error('date') is-invalid @enderror" value="{{ date("Y-m-d") }}" min="{{ date("Y-m-d") }}" max="2022-04-20">
                        </div>
                        <h2 class="smemew">Choose time</h2>
                        <div class="input-group col-63">
                            @php
                                $open       = new DateTime("09:00");
                                $close      = new DateTime("21:00");
                                $interval   = DateInterval::createFromDateString('45 min');
                                $times      = new DatePeriod($open, $interval, $close);
                            @endphp
                            <select name="time" id="time" class="form-control no-padding">
                                
                                @foreach ($times as $time)
                                    <option value="{{ $time->format('H:i') }}">{{ $time->format('H:i').' - '.$time->add($interval)->format('H:i') }}</option>    
                                @endforeach
                                
                            </select>
                        </div>
                    </div>
    
                    <div class="input-group-col col-7 vertical-margin-20">
                        <h2  class="smemew">Choose Capster</h2>
                        @php
                            $capsters = [
                                ['M. Ikhbal', 24],
                                ['Akbarona', 11],
                                ['Aidil X', 18],
                                ['Bastian', 78],
                                ['Jakob CC', 9],
                                ['Optimus P', 26],
                                ['Jackal GE.', 22]
                            ];
                            $counts = intval(count($capsters));
                            
                            // Aku pake variabel ini, soalnya gatau kenapa, kalo langsung pake 
                            // variabel counts/2 di atribut loop, loop nya malah error
                            $loops  = $counts/2;

                            $index  = 0;
                        @endphp

                        @for ($i=0; $i<$counts; $i++)
                            <input type="radio" name="capster" id="capster{{$i}}" value="{{$capsters[$i][0]}}" class="capster-radio">
                        @endfor

                        @for ($i=0; $i<$loops; $i++)
                            <div class="capster-row">
                                @if ($counts>1)
                                    @for ($j=0; $j<2; $j++)
                                        <label for="capster{{$index}}" class="capster-choice"  onclick="thisSelected({{ $index }})">
                                            <img class="capster-choice-photo" src="{{ asset('images/Capsters/C' . $counts . '.JPG') }}" alt="">
                                            <div class="capster-choice-info">
                                                <h3>{{ $capsters[$index][0] }}</h3>
                                                <h5>{{ $capsters[$index][1] }} tahun</h5>
                                            </div>
                                        </label>
                                        @php
                                            $counts-=1;
                                            $index+=1;
                                        @endphp
                                    @endfor
                                @else
                                    <label for="capster{{$index}}" class="capster-choice" onclick="thisSelected({{ $index }})">
                                        <img class="capster-choice-photo" src="{{ asset('images/Capsters/C' . $counts . '.JPG') }}" alt="">
                                        <div class="capster-choice-info">
                                            <h3>{{ $capsters[$index][0] }}</h3>
                                            <h5>{{ $capsters[$index][1] }} tahun</h5>
                                        </div>
                                    </label>
                                @endif
                            </div>
                        @endfor

                    </div>
                </div>

                <div class="input-group right">
                    <button type="submit" class="form-btn col-3">Book Your Schedule</button>
                </div>
            </form>
        </div>
    </div>

@endsection
