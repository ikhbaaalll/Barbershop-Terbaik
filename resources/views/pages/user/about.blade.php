@extends('layouts.guest')

@section('content')
    <div class="recc-area">

    </div>
    
    <form action="{{route('logout')}}" method="POST"> @csrf <button type="submit">Log out</button> </form>

@endsection
