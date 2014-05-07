@extends('layouts.default')

@section('content')
<h1>Edit Author</h1>
<?php $authors_array = array();  
 foreach($authors as $author){
 $authors_array[$author->id]=	$author->name; }
$publishers_array = array(); 
 foreach($publishers as $publisher){
 	$publishers_array[$publisher->name]=$publisher->name; }

?>

{{ Form::open(array('action' => 'update_authorPublisher', 'method' => 'POST' )) }}
<p>
    {{ Form::label('authorId', 'Author Name:')}}<br/>
        {{Form::select('authorId',$authors_array)}}
</p>
<p>
    {{ Form::label('name', 'Publisher Name:')}}<br/>
        {{Form::select('name',$publishers_array)}}
</p>

<p>
    {{ Form::submit('Update Author Publisher') }}
</p>
{{Form::close()}}
@stop
