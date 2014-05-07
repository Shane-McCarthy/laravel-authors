@extends('layouts.default')
@section ('content')
<h1>Add New Author </h1>

@include('common.author_errors')

<!--the Form open array opens the form and sends the form to the create author in the routes, the routes reference the post_create in the Authors Controller  -->
{{Form::open(array ('action'=>'create_author','method'=>'POST'))}}
<p>
{{Form::label('name','Name:')}}<br/>
{{Form::Text('name')}}
</p>
<p>

{{Form::label('bio','Biography:')}}<br/>
{{Form::textarea('bio')}}
</p>
<p>
{{Form::submit('Add Author')}}
</p>
{{Form::close()}}
@stop
