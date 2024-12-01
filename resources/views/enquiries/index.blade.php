@extends('layouts.master')

@section('title')
    View Enquiries
@endsection

{{-- @section('search')
    <form class="navbar-form navbar-left">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search Room">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
    </form>
@endsection --}}

@section('content')
    <h2><i class="fa fa-list-alt"></i> View Enquiries</h2>
    <hr>
    @include('errors.errors')
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>#ID</th>
            <th>Client Name</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($enquiries as $enquiry)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $enquiry->client->name }}</td>
                <td>{{ $enquiry->subject }}</td>
                <td>{{ $enquiry->message }}</td>
                <td>
                    @if ($enquiry->status == 1)
                        <span class="label label-primary">Solved</span>
                    @else
                        <span class="label label-danger">Not Solved</span>
                        {!! link_to_route('enquiry.status', '',[$enquiry->id],['class'=>'fa fa-eye btn btn-info btn-sm']) !!}
                    @endif
                </td>
                <td>
                    {!! Form::open(['route'=>['enquiries.destroy', $enquiry->id], 'method'=>'DELETE']) !!}
                    {!! link_to_route('enquiries.edit', '',[$enquiry->id],['class'=>'fa fa-pencil btn btn-primary btn-sm']) !!}
                    {!! link_to_route('enquiries.show', '',[$enquiry->id],['class'=>'fa fa-bars btn btn-success btn-sm']) !!}
                    {{ Form::button('', ['type'=>'submit','class'=>'btn btn-danger btn-sm fa fa-trash','onclick'=>'return confirm("Are you sure you want to delete this?")']) }}
                    {!! Form::close() !!}
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
@endsection
