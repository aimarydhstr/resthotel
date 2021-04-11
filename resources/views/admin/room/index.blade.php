@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h5 class="float-left pt-2">Rooms Management</h5> <a class="btn btn-primary float-right" href="{{ route('room.create') }}">New Room</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif                    

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            @foreach($room as $r)
                            <tr>
                                <td class="pt-3">{{ ++$i }}</td>
                                <td class="pt-3">{{ $r->name }}</td>
                                <td>
                                    <a class="btn btn-success mr-2" href="{{ route('room.edit', $r->id) }}">Edit</a>
                                    <a class="btn btn-danger" href="{{ route('room.delete', $r->id) }}">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
