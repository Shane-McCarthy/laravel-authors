@extends('layouts.default')

@section('content')
<h1>Add New Publisher</h1>
@include('common.publisher_errors')
{{ Form::open(array('action' => 'update_publisher', 'method' => 'PUT' )) }}

<p>
    {{ Form::label('nameNew', 'Name:')}}<br/>
    {{ Form::text('nameNew', $publisher->name) }}
</p>
    {{ Form::hidden('name', $publisher->name) }}
<p>
    {{ Form::submit('Update Publisher') }}
</p>
{{Form::close()}}
@stop
