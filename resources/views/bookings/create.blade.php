@extends('layouts.master')

@section('title')
    Booking
@endsection

@section('content')

    <div class="row">

        <div class="col-md-6 mt-3">
            <h2><i class="fa fa-calendar-plus-o"></i> Book A Room</h2>
            <hr>

            @include('errors.errors')

            {{ Form::open(['url' => ['booking']]) }}

            @include('bookings._fields')

            <div class="form-group {{ $errors->has('total_price') ? 'has-error' : '' }}">
                {!! Form::label('Total Price') !!}
                {!! Form::text('total_price', @$client->total_price,['class' => 'form-control total_price', 'placeholder' => 'Total Price','readonly']) !!}
                <span class="text-danger">{{ $errors->has('total_price') ? $errors->first('total_price') : '' }}</span>
            </div>
            <div class="form-group {{ $errors->has('total_payment') ? 'has-error' : '' }}">
                {!! Form::label('payment') !!}  
                {!! Form::number('total_payment', @$client->total_payment,['class' => 'form-control', 'placeholder' => 'Payment']) !!}
                <span class="text-danger">{{ $errors->has('total_payment') ? $errors->first('total_payment') : '' }}</span>
            </div>
            <div class="form-group">
                {!! Form::label('name','Payment Method:') !!}
                <select class="selectpicker form-control" data-live-search="true" title="" name="payment_method">
                        <option value="cash">CASH</option>
                        <option value="card">CARD</option>
                        <option value="both">CASH & CARD</option>
                </select>
            </div>

            {{ Form::submit('Book Room', ['class'=>'btn btn-primary']) }}

            {!!  link_to('/rooms','back',['class'=>'btn btn-success'], $secure = null) !!}

            {{ Form::close() }}

        </div>
    </div>

@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      
      $(document).on('change', '.start_date,.end_date,.room', function () {
        const startDate = $('.start_date').val();
        const endDate = $('.end_date').val();

        // if (startDate) {
        //     alert('Start date selected: ' + startDate);
        // }

        // Check if both start date and end date are available
        if (startDate && endDate) {
            const start = new Date(startDate);
            const end = new Date(endDate);

            // Calculate difference in days
            const differenceInTime = end - start;
            const differenceInDays = differenceInTime / (1000 * 3600 * 24);

            if (differenceInDays == 0) {

                var room_price = $('option:selected','.room').data('price');
                var total_price = room_price;
                $('.total_price').val(total_price);

                // alert('Difference in days: ' + differenceInDays);
            } else if(differenceInDays >= 1) {

                var room_price = $('option:selected','.room').data('price');
                var total_price = room_price * differenceInDays;
                $('.total_price').val(total_price);
            }
            else{
                alert('End date must be after start date.');
            }
        }
    });

    // $(document).on('change', '.end_date', function () {
    //     const endDate = $(this).val();
    //     const startDate = $('.start_date').val();

    //     if (endDate) {
    //         alert('End date selected: ' + endDate);
    //     }

    //     // Check if both start date and end date are available
    //     if (startDate && endDate) {
    //         const start = new Date(startDate);
    //         const end = new Date(endDate);

    //         // Calculate difference in days
    //         const differenceInTime = end - start;
    //         const differenceInDays = differenceInTime / (1000 * 3600 * 24);

    //         if (differenceInDays >= 0) {
    //             alert('Difference in days: ' + differenceInDays);
    //         } else {
    //             alert('End date must be after start date.');
    //         }
    //     }
    // });

    </script>
@endsection