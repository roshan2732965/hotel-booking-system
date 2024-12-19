@extends('layouts.master')

@section('title')
    Edit Note
@endsection

@section('content')
    <h2><i class="fa fa-pencil"></i> Edit Note</h2>
    <hr>
        {!! Form::model($note, ['route' => ['notes.update',$note->id], 'method'=>'PUT']) !!}
        @include('notes._fields')
        {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
        {!! link_to('/notes', 'Back',['class'=>'btn btn-success']) !!}
    {!! Form::close() !!}
@endsection