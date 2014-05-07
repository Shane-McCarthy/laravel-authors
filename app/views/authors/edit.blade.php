@extends('layouts.default')

@section('content')
<h1>Edit Author</h1>
@include('common.author_errors')
{{ Form::open(array('action' => 'update_author', 'method' => 'PUT' )) }}
<p>
    {{ Form::label('name', 'Name:')}}<br/>
    {{ Form::text('name', $author->name) }}
    
</p>
<p>
    {{ Form::label('bio', 'Biography:')}}<br/>
    {{ Form::textarea('bio', $author->bio)}}
</p>
    {{ Form::hidden('id', $author->id) }}
<p>
    {{ Form::submit('Update Author') }}
</p>
{{Form::close()}}
@stop
