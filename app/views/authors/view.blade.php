@extends ('layouts.default')
@section ('content')
<h1>{{$author ->name}}</h1>
{{$author -> bio}}||
{{HTML::linkRoute("authors" , "Click Here To Go Back To The Index Page")}}
<br>
{{ HTML::linkRoute("edit_author", "Edit this Author  $author->name", array($author->id)) }} |

{{ Form::open(array('action' => 'delete_author', 'method' => 'DELETE' , 'style'=>'display:inline'))
    }}
    {{ Form::hidden('id', $author->id) }}
    {{ Form::submit('delete') }}
    {{ Form::close() }}

@stop
