@extends('layouts.master')

@section('title')
    Edit Enquiry
@endsection

@section('content')
    <h2><i class="fa fa-pencil"></i> Edit Enquiry</h2>
    <hr>
        {!! Form::model($enquiry, ['route' => ['enquiries.update',$enquiry->id], 'method'=>'PUT']) !!}
        @include('enquiries._fields')
        {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
        {!! link_to('/enquiries', 'Back',['class'=>'btn btn-success']) !!}
    {!! Form::close() !!}
@endsection