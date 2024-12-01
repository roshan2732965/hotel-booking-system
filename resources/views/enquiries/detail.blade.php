@extends('layouts.master')

@section('title')
    {{$enquiry->name}} Detail
@endsection

@section('content')

    <h2><i class="fa fa-list"></i> Enquiry Detail</h2>
    <hr>

    <table class="table table-bordered table-striped">

        <tr>
            <th>#ID</th>
            <td>{{ $enquiry->id }}</td>
        </tr>

        <tr>
            <th>Name</th>
            <td>{{ $enquiry->client->name }}</td>
        </tr>

        <tr>
            <th>Subject</th>
            <td>{{ $enquiry->subject }}</td>
        </tr>

        <tr>
            <th>Message</th>
            <td>{{ $enquiry->message}}</td>
        </tr>
        <tr>
            <th>Registered At</th>
            <td>{{ $enquiry->created_at->diffForHumans() }}</td>
        </tr>

        <tr>
            <th>Last update</th>
            <td>{{ $enquiry->updated_at->diffForHumans() }}</td>
        </tr>

    </table>

    {!! Form::open(['route'=> ['enquiries.destroy', $enquiry->id], 'method'=>'DELETE']) !!}
        {!! link_to('/enquiries', 'Back',['class'=>'btn btn-success btn-sm']) !!}
    {!! link_to_route('enquiries.edit', 'Edit', $enquiry->id, ['class'=>'btn btn-info btn-sm']) !!}
    {!! Form::button('Delete',['type','submit','class'=>'btn btn-danger btn-sm', 'onclick'=>'return confirm("Are you sure you want to delete this?")']) !!}
    {!! Form::close() !!}
@endsection