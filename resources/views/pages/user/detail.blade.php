@extends('layouts.guest')

@section('title')
    Detail
@endsection

@section('content')
    <div class="detail-area">
        <div class="detail-area-header">
            <div class="detail-header-btn">
                <a class="back-btn"  href="{{ route('user.home') }}"><span><</span><h4>Back</h4></a>
            </div>
            <h3><span>Barbershop </span>detail</h3>
            <div class="detail-header-btn">
                <a class="choose-capster-btn" href=""><h4>Choose Capster</h4><span class="rr">></span></a>
            </div>
        </div>
        <div class="detail-area-content">
            <div class="detail-card-area">
                <div class="card detail-card">
                    <div class="detail-card-image" style="background-image: url('http://localhost:8000/images/PageBG/LPBG4.jpg')"></div>
                    <div class="recommend-btn-area">
                        <!-- OPTION 1 -->
                        {{-- <form action="" method="post">
                            @csrf
                            <button type="submit" class="recommend-btn">
                                <h3>Recommend</h3>
                                <h4>This Barbershop</h4>
                                <div class="recommend-btn-icon-bg"></div>
                                <div class="recommend-btn-icon"></div>
                            </button>
                        </form> --}}

                        <!-- OPTION 2 -->
                        <a href=""  class="recommend-link">
                            <h3>Recommend</h3>
                            <h4>This Barbershop</h4>
                            <div class="recommend-btn-icon-bg"></div>
                            <div class="recommend-btn-icon"></div>
                        </a>
                        
                    </div>
                </div>
            </div>
            <div class="detail-info-area">
                <div class="detail-info-header">
                    The Dandies     <!-- TARO NAMANYA DISINI BAL, HAPUS INI KALO UDAH -->
                    <div class="info-rating">
                        @for ($j = 0; $j < 4; $j++)
                            <div class="filled-star"></div>
                        @endfor
                        @for ($j = 0; $j < 5 - 4; $j++)
                            <div class="empty-star"></div>
                        @endfor
                    </div>
                </div>
                <div class="detail-info-row">
                    <h5>Location :</h5>
                    <h4>Jl. Cut Nyak Dien, No. 97, Palapa, Bandar Lampung</h4>
                </div>
                <div class="detail-info-row">
                    <h5>Opening Hours :</h5>
                    <h4>10.00 - 22.00</h4>
                </div>
                <div class="detail-info-row">
                    <h5>Price :</h5>
                    <h4>Rp. 60.000,-</h4>
                </div>
                <div class="detail-info-row">
                    <h5>Facilities :</h5>
                    <h4>WiFi, AC, 3 Capster Seats, Pomade, TV, Drinks</h4>
                </div>
                <div class="detail-info-row">
                    <h5>Services :</h5>
                    <h4>Massage, Hair Tonic, Pomade Education, Hot Towel</h4>
                </div>
            </div>
        </div>
    </div>

@endsection
