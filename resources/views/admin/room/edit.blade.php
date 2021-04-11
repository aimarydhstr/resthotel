@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Room</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" enctype="multipart/form-data" action="{{ route('room.update', $room->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $room->name }}">
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <label for="img"><img height="350" width="100%" src="{{ asset('img/'.$room->image) }}"></label>
                            <input type="file" id="img" name="image" class="form-control p-1" value="{{ $room->image }}">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" name="price" class="form-control" value="{{ $room->price }}">
                        </div>
                        <div class="form-group">
                            <label>Facilities</label>
                            <div class="border p-2">
                                @foreach($feature as $f)
                                @if($f->facility_id == $f->facility->id && $f->status == 1)
                                <input type="checkbox" checked name="facility_id{{ ++$i }}" class="my-2 mr-1" value="{{ $f->facility->id }}"> {{ $f->facility->name }}<br>
                                @else
                                <input type="checkbox" name="facility_id{{ ++$i }}" class="my-2 mr-1" value="{{ $f->facility->id }}"> {{ $f->facility->name }}<br>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Quantity</label>
                            <select name="quantity" class="form-control">
                                @for($j=1; $j<=5; $j++)
                                @if($room->quantity == $j)
                                <option selected value="{{ $j }}">{{ $j }} Person</option>
                                @else
                                <option value="{{ $j }}">{{ $j }} Person</option>
                                @endif
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <select name="type" class="form-control">
                                <option <?php if ($room->type == 'Personal'){echo 'selected';}?> value="Personal">Personal</option>
                                <option <?php if ($room->type == 'Couple'){echo 'selected';}?> value="Couple">Couple</option>
                                <option <?php if ($room->type == 'Family'){echo 'selected';}?> value="Family">Family</option>
                                <option <?php if ($room->type == 'Small'){echo 'selected';}?> value="Small">Small</option>
                                <option <?php if ($room->type == 'Medium'){echo 'selected';}?>value="Medium">Medium</option>
                                <option <?php if ($room->type == 'Large'){echo 'selected';}?> value="Large">Large</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Class</label>
                            <select name="class" class="form-control">
                                <option <?php if ($room->class == 'S'){echo 'selected';}?> value="S">S</option>
                                <option <?php if ($room->class == 'A'){echo 'selected';}?> value="A">A</option>
                                <option <?php if ($room->class == 'B'){echo 'selected';}?> value="B">B</option>
                                <option <?php if ($room->class == 'C'){echo 'selected';}?> value="C">C</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <a href="{{ route('room') }}" class="btn btn-outline-primary mr-2">Back</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
