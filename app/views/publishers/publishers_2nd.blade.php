@extends ('layouts.default')

@section ('content')
<h1>Publishers Home Page</h1>
<ul>
    @foreach($publishers as $publisher)
    <li>{{$publisher->name}}  ||        {{ HTML::linkRoute("edit_publisher","Update",array($publisher->name)) }}



</li>
    @endforeach

</ul>
<p>
    {{ HTML::linkRoute("new_publisher",
                        "Create New Publisher") }} ||       

</p>
