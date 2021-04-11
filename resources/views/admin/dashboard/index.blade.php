@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row mb-5 text-center col-md-8 mx-auto p-0 justify-content-between">
        <div class="col-md-4 p-0 px-1">
            <div class="card p-3">
                <h5>Rooms</h5>
                <h5>{{ $room }}</h5>
            </div>
        </div>
        <div class="col-md-4 p-0 px-1">
            <div class="card p-3">
                <h5>Booked</h5>
                <h5>{{ $booked }}</h5>
            </div>
        </div>
        <div class="col-md-4 p-0 px-1">
            <div class="card p-3">
                <h5>Avalaible</h5>
                <h5>{{ $avalaible }}</h5>
            </div>
        </div>
    </div>
    
</div>
@endsection
