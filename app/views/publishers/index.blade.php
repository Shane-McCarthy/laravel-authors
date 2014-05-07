@extends ('layouts.default')

@section ('content')
<h1>Publishers Home Page</h1>
<ul>
    @foreach($publishers as $publisher)
    <li>{{$publisher->name}}  || {{ HTML::linkRoute("edit_publisher","Update",array($publisher->name)) }}||
{{ Form::open(array('action' => 'delete_publisher', 'method' => 'DELETE' , 'style'=>'display:inline'))
    }}
    {{ Form::hidden('name', $publisher->name) }}
    {{ Form::submit('delete') }}
    {{ Form::close() }}



</li>
    @endforeach

</ul>
<p>
    {{ HTML::linkRoute("new_publisher",
                        "Create New Publisher") }} ||       

</p>
