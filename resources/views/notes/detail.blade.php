@extends('layouts.master')

@section('title')
    {{$note->name}} Detail
@endsection

@section('content')

    <h2><i class="fa fa-list"></i> Note Detail</h2>
    <hr>

    <table class="table table-bordered table-striped">

        <tr>
            <th>#ID</th>
            <td>{{ $note->id }}</td>
        </tr>

        <tr>
            <th>Title</th>
            <td>{{ $note->title }}</td>
        </tr>

        <tr>
            <th>Message</th>
            <td>{{ $note->message}}</td>
        </tr>
        <tr>
            <th>Registered At</th>
            <td>{{ $note->created_at->diffForHumans() }}</td>
        </tr>

        <tr>
            <th>Last update</th>
            <td>{{ $note->updated_at->diffForHumans() }}</td>
        </tr>

    </table>

    {!! Form::open(['route'=> ['notes.destroy', $note->id], 'method'=>'DELETE']) !!}
        {!! link_to('/notes', 'Back',['class'=>'btn btn-success btn-sm']) !!}
    {!! link_to_route('notes.edit', 'Edit', $note->id, ['class'=>'btn btn-info btn-sm']) !!}
    {!! Form::button('Delete',['type','submit','class'=>'btn btn-danger btn-sm', 'onclick'=>'return confirm("Are you sure you want to delete this?")']) !!}
    {!! Form::close() !!}
@endsection