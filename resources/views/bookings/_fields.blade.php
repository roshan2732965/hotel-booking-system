<div class="form-group">
    {!! Form::label('name','Client:') !!}
    <select class="selectpicker form-control" data-live-search="true" title="" name="client_id">
        @foreach ($clients as $client)
            <option data-subtext="{{ $client->name }}" value="{{ $client->id }}">{{ $client->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    {!! Form::label('room','Room:') !!}
    <select class="selectpicker form-control room" data-live-search="true"
            title="" name="room_id">
        @foreach ($rooms as $room)
            <option {{($room->id == @$booking->room_id ) ? 'selected': ''}} data-price="{{$room->price}}" value="{{ $room->id }}">{{ $room->name }} &nbsp ( {{ $room->price }} / night)</option>
        @endforeach
    </select>
</div>
<div class="form-group {{ $errors->has('start_date') ? 'has-error' : '' }}">
    {!! Form::label('start_date','Start Date:') !!}
    {!! Form::date('start_date', $booking->start_date ,['class'=>'form-control datepicker start_date']) !!}
    <span class="text-danger">{{ $errors->has('start_date') ? $errors->first('start_date') : '' }}</span>
</div>

<div class="form-group {{ $errors->has('end_date') ? 'has-error' : '' }}">
    {!! Form::label('end_date','End Date') !!}
    {!! Form::date('end_date', $booking->end_date ,['class'=>'form-control datepicker end_date']) !!}
    <span class="text-danger">{{ $errors->has('end_date') ? $errors->first('end_date') : '' }}</span>
</div>


<div class="form-group {{ $errors->has('total_price') ? 'has-error' : '' }}">
    {!! Form::label('Total Price') !!}
    {!! Form::text('total_price', $client->total_price,['class' => 'form-control total_price', 'placeholder' => 'Total Price','readonly']) !!}
    <span class="text-danger">{{ $errors->has('total_price') ? $errors->first('total_price') : '' }}</span>
</div>
<div class="form-group {{ $errors->has('total_payment') ? 'has-error' : '' }}">
    {!! Form::label('payment') !!}  
    {!! Form::number('total_payment', $client->total_payment,['class' => 'form-control', 'placeholder' => 'Payment']) !!}
    <span class="text-danger">{{ $errors->has('total_payment') ? $errors->first('total_payment') : '' }}</span>
</div>