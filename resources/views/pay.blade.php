@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h5 class="float-left pt-2">Payment</h5></div>

                <div class="card-body">
                        <div class="alert alert-info" role="alert">
                            Name : Aimar Yudhistira<br>
                            Rekening BNI : 82823-13972-391-3
                        </div>

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Day</th>
                                <th>Count</th>
                            </tr>
                            <tr>
                                <td class="pt-3">{{ $booking->room->name }}</td>
                                <td class="pt-3">{{ $booking->room->price }}</td>
                                <td class="pt-3">{{ $day }}</td>
                                <td class="pt-3">{{ $count }}</td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
