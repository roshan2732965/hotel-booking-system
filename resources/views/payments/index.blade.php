@extends('layouts.master')

@section('title')
    View Transaction
@endsection

{{-- @section('search')
    <form class="navbar-form navbar-left">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search In Bookings">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
    </form>
@endsection --}}

@section('content')
    <h2><i class="fa fa-calendar"></i> View Transactions</h2>
    <hr>

    @include('errors.errors')
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Date and Time</th>
            <th>Client Name</th>
            <th>Room</th>
            <th>Amount</th>
            <th>Payment Method</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($payments as $payment)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $payment->created_at }}</td>
                <td>{{ $payment->booking->client->name }}</td>
                <td>{{ $payment->booking->room->name }}</td>
                <td>{{ $payment->total_payment }}</td>
                <td>{{($payment->payment_method == 'both') ? 'Card & Cash' : $payment->payment_method }}</td>
            </tr>
        </tbody>
        @endforeach
    </table>
@endsection