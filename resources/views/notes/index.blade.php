@extends('layouts.master')

@section('title')
    View Notes
@endsection
@section('content')
    <h2><i class="fa fa-list-alt"></i> View Notes</h2>
    <hr>
    @include('errors.errors')
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>#ID</th>
            {{-- <th>Client Name</th> --}}
            <th>Title</th>
            <th>Message</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($notes as $note)
            <tr>
                <td>{{ $loop->iteration }}</td>
                {{-- <td>{{ $note->client->name }}</td> --}}
                <td>{{ $note->title }}</td>
                <td>{{ $note->message }}</td>
                <td>
                    @if ($note->status == 1)
                        <span class="label label-primary">Solved</span>
                    @else
                        <span class="label label-danger">Not Solved</span>
                        {!! link_to_route('note.status', '',[$note->id],['class'=>'fa fa-eye btn btn-info btn-sm']) !!}
                    @endif
                </td>
                <td>
                    {!! Form::open(['route'=>['notes.destroy', $note->id], 'method'=>'DELETE']) !!}
                    {!! link_to_route('notes.edit', '',[$note->id],['class'=>'fa fa-pencil btn btn-primary btn-sm']) !!}
                    {!! link_to_route('notes.show', '',[$note->id],['class'=>'fa fa-bars btn btn-success btn-sm']) !!}
                    {{ Form::button('', ['type'=>'submit','class'=>'btn btn-danger btn-sm fa fa-trash','onclick'=>'return confirm("Are you sure you want to delete this?")']) }}
                    {!! Form::close() !!}
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
@endsection
