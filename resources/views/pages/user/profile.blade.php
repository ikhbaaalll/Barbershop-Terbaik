@extends('layouts.guest')

@section('content')
    <div class="profile-area">
        <div class="profile-side-bar">
            <div id="profileSection" onclick="showProfile()" class="profile-option selected-profile-option">
                Profile
            </div>
            <div id="activitySection" onclick="showActivities()" class="profile-option">
                Activities
            </div>
        </div>

        <div class="profile-main-container">
            <div id="profileMenu" class="profile-menu-container active-profile-menu">
                <div class="profile-menu-header">
                    <h2>Profile</h2>
                </div>
                <div class="profile-menu-content">
                    <div class="profile-picture-area">
                        <img src="{{ asset( ( auth()->user()->profile_picture!=null ) ? auth()->user()->profile_picture : 'images/ProfilePictures/user.png') }}" alt="">
                    </div>
                    <div class="profile-information-area">
                        <div class="profile-information-row">
                            <h5>Name</h5>
                            <h2>{{ auth()->user()->name }}</h2>
                        </div>
                        <div class="profile-information-row">
                            <h5>Username</h5>
                            <h2>{{ auth()->user()->username }}</h2>
                        </div>
                        <div class="profile-information-row">
                            <h5>Email</h5>
                            <h2>{{ auth()->user()->email }}</h2>
                        </div>
                        <div class="profile-information-row">
                            <h5>Phone</h5>
                            <h2>{{ auth()->user()->phone }}</h2>
                        </div>
                    </div>
                </div>
            </div>


            <div id="activityMenu" class="profile-menu-container">
                <div class="profile-menu-header">
                    <h2>Activities</h2>
                </div>
                <div class="activities-menu-content">
                    <table class="meja">
                        @php
                            $activities = [
                                ["May 5th, 2022",   "20:20", "Donjack Barbershop",        "Chicco Jerikho",  3],
                                ["April 4, 2022",   "21:21", "Moore Ltd",                 "Joko Widodo",     4],
                                ["3/3/2022",        "22:22", "Larkin, Rempel and Ledner", "Habib Rizieq",    1],
                                ["02/02/2022",      "12:12", "Cassidy Brook Ap",          "Muhammad Ikhbal", 5],
                                ["01 January 2022", "15:15", "Lorem Ipsum Dolores",       "Novaren Bastian", 2]
                            ];
                        @endphp         
                        <thead>
                            <tr>
                                <th width="4%">No</th>
                                <th width="11%">Date</th>
                                <th width="8%">Time</th>
                                <th width="20%">Barbershop</th>
                                <th width="15%">Capster</th>
                                <th width="12%">Status</th>
                                <th width="13%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activities as $activity)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $activity[0] }}</td>
                                    <td>{{ $activity[1] }}</td>
                                    <td>{{ $activity[2] }}</td>
                                    <td>{{ $activity[3] }}</td>
                                    <td>
                                        @switch($activity[4])
                                            @case(1) <div class="status waiting"> </div> @break
                                            @case(2) <div class="status approved"></div> @break
                                            @case(3) <div class="status finished"></div> @break
                                            @case(4) <div class="status rejected"></div> @break
                                            @case(5) <div class="status canceled"></div> @break
                                            @default <div class="status waiting"> </div>
                                        @endswitch
                                    </td>
                                    <td>
                                        @switch($activity[4])
                                            @case(1) <div class="actions cancel" onclick="showCancelModal()">Cancel</div> @break
                                            @case(3) <div class="actions review" onclick="showReviewModal()">Review</div> @break
                                            @default No action available
                                        @endswitch
                                    </td>
                                </tr>    
                            @endforeach
                            
                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

@endsection

@section('additional-element')
    <div class="CancelModal" id="CancelModal">
        <div class="modal-container">
            <div class="modal-header">
                <h1>Cancellation <span>Confirmation</span></h1>
                <div class="exit" onclick="closeCancelModal()">&times;</div>
            </div>
            <div class="modal-content">
                <p>Are you sure you want to cancel this activity?</p>
            </div>
            <div class="modal-footer">
                <a class="cancel-to-cancel"  onclick="closeCancelModal()">No</a>
                <a class="sure-to-cancel" href="">Yes</a>
            </div>
        </div>
    </div>

    <div class="ReviewModal" id="ReviewModal">
        <div class="modal-container">
            <form action="">
                <div class="modal-header">
                    <h1>Describe your <span>Experience</span></h1>
                    <div class="exit" onclick="closeReviewModal()">&times;</div>
                </div>
                <div class="review-modal-content">
                        <div class="star-review">

                            <input type="radio" name="star" id="star1" value="5" onclick="showExperience(5)"><label for="star1"></label>
                            <input type="radio" name="star" id="star2" value="4" onclick="showExperience(4)"><label for="star2"></label>
                            <input type="radio" name="star" id="star3" value="3" onclick="showExperience(3)"><label for="star3"></label>
                            <input type="radio" name="star" id="star4" value="2" onclick="showExperience(2)"><label for="star4"></label>
                            <input type="radio" name="star" id="star5" value="1" onclick="showExperience(1)"><label for="star5"></label>

                        </div>
                    
                    <div class="experience" id="experience"></div>
                    <textarea name="review" id="review" class="type-review" placeholder="Type some review"></textarea>
                    
                </div>
                <div class="modal-footer flex-end">
                    <div class="input-group">
                        <button type="submit" class="form-btn">Post</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection