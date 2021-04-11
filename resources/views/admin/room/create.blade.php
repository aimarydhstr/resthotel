@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Room</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" enctype="multipart/form-data" action="{{ route('room.store') }}">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control p-1">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" name="price" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Facilities</label>
                            <div class="border p-2">
                                @foreach($facility as $f)
                                <input type="checkbox" name="facility_id{{ ++$i }}" class="my-2 mr-1" value="{{ $f->id }}"> {{ $f->name }}<br>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Quantity</label>
                            <select name="quantity" class="form-control">
                                @for($j=1; $j<=5; $j++)
                                <option value="{{ $j }}">{{ $j }} Person</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <select name="type" class="form-control">
                                <option value="Personal">Personal</option>
                                <option value="Couple">Couple</option>
                                <option value="Family">Family</option>
                                <option value="Small">Small</option>
                                <option value="Medium">Medium</option>
                                <option value="Large">Large</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Class</label>
                            <select name="class" class="form-control">
                                <option value="S">S</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
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
