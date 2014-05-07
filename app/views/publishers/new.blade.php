@extends('layouts.default')

@section('content')
<h1>Add New Publisher</h1>
@include('common.publisher_errors')


{{ Form::open(array('action' => 'create_publisher', 'method' => 'POST' )) }}
<p>
    {{ Form::label('name', 'Name:')}}<br/>
    {{ Form::text('name')}}
</p>

<p>
    {{Form::submit('Add Publisher')}}
</p>
{{Form::close()}}
@stop
