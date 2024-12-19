@extends('layouts.master')

@section('title')
    Rooms
@endsection

@section('content')

    <div class="row">

        <div class="col-md-6 mt-3">
            <h2><i class="fa fa-plus-square-o"></i> Add Note</h2>
            <hr>

            @include('errors.errors')

            {{ Form::open(['url' => 'notes']) }}

            @include('notes._fields')

            {{ Form::submit('Add Note', ['class'=>'btn btn-primary']) }}

            {!!  link_to('/notes','back',['class'=>'btn btn-success'], $secure = null) !!}

            {{ Form::close() }}

        </div>
    </div>

@endsection