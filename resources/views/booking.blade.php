@extends('layouts.app')

@section('content')

<section class="py-5 my-5 bg-white">
<div class="container">
	<div class="card shadow p-0 col-8 my-3">
		<img src="{{ asset('img/'.$room->image) }}" width="100%" height="400">
		<div class="form-inline p-3">
			<span class="btn btn-sm mr-1 btn-outline-primary">{{ $room->quantity }} Person</span>
			<span class="btn btn-sm mr-1 btn-outline-primary">{{ $room->type }} Room</span>
			<span class="btn btn-sm btn-outline-primary">{{ $room->class }} Class</span>
		</div>
		<h2 style="font-size:17px;line-height:1.6em;margin-top:-10px" class="p-3 pb-0 mb-0">
			<a href="{{ route('home.booking', $room->slug) }}">{{ $room->name }}</a>
		</h2>
		@if($count < 1)
		<p class="px-3">Avalaible - Rp {{ $room->price }}/day</p>
		@if($b->check_out > now())
		<p class="px-3">Avalaible - Rp {{ $r->price }}/day</p>
		@endif
		@else
		<p class="px-3">Booked - Rp {{ $room->price }}/day</p>
		@endif

		<p class="px-3">Facilities in this room : </p>
		<ol class="border-bottom pb-3">
			@foreach($feature as $f)
			<li>{{ $f->facility->name }}</li>
			@endforeach
		</ol>

		<form method="post" action="{{ route('home.store', $room->id) }}">
			@csrf
			<div class="form-group px-3">
				<label>Check In</label>
				<input type="date" name="check_in" class="form-control">
			</div>
			<div class="form-group px-3">
				<label>Check Out</label>
				<input type="date" name="check_out" class="form-control">
			</div>
			<div class="form-group px-3">
				@guest
				<button type="submit" disabled title="You must login to booking" class="btn btn-primary">Booking Room</button>
				@else
					@if($count < 1)
					<button type="submit" class="btn btn-primary">Booking Room</button>
					@if($b->check_out > now())
					<button type="submit" class="btn btn-primary">Booking Room</button>
					@endif			
					@else
					<button type="submit" disabled class="btn btn-primary">Booking Room</button>
					@endif
				@endguest
			</div>
		</form>
	</div>
	</div>
</div>
</section>

@endsection
