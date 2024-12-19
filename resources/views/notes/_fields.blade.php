<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
    {!! Form::label('name','Title:') !!}
    {!! Form::text('title',$note->title,['class'=>'form-control']) !!}
    <span class="text-danger">{{ $errors->has('title') ? $errors->first('title') : ''  }}</span>
</div>

<div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
    {!! Form::label('name','Message :') !!}
    {!! Form::textarea('message',$note->message,['class'=>'form-control']) !!}
    <span class="text-danger">{{ $errors->has('message') ? $errors->first('message') : ''  }}</span>
</div>
