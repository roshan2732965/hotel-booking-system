<div class="form-group">
    {!! Form::label('name','Client:') !!}
    <select class="selectpicker form-control" data-live-search="true" title="" name="client_id">
        @foreach ($clients as $client)
            <option data-subtext="{{ $client->name }}" value="{{ $client->id }}">{{ $client->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group {{ $errors->has('subject') ? 'has-error' : '' }}">
    {!! Form::label('name','Subject:') !!}
    {!! Form::text('subject',$enquiry->subject,['class'=>'form-control']) !!}
    <span class="text-danger">{{ $errors->has('subject') ? $errors->first('subject') : ''  }}</span>
</div>

<div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
    {!! Form::label('name','Message :') !!}
    {!! Form::textarea('message',$enquiry->message,['class'=>'form-control']) !!}
    <span class="text-danger">{{ $errors->has('message') ? $errors->first('message') : ''  }}</span>
</div>
