@extends ('layouts.default')

@section ('content')
<h1>{{$title}}</h1>

<ul>
    @foreach($authorPublishers as $authorPublisher)
    <li>{{$authorPublisher->auname}} || {{$authorPublisher->publisherName}} || {{$authorPublisher->biography}} || {{ HTML::linkRoute("detail", "detail", array ('authorID'=>$authorPublisher->authorID,'publisherName' =>$authorPublisher->publisherName))}}
    {{ Form::open(array('action' => 'delete_authorPublisher', 'method' => 'DELETE' , 'style'=>'display:inline'))
    }}
    {{ Form::hidden('publisherName', $authorPublisher->publisherName) }}
    {{ Form::hidden('authorID', $authorPublisher->authorID) }}
    {{ Form::submit('delete') }}
    {{ Form::close() }}
</li>
    @endforeach

</ul>
<p>
    {{ HTML::linkRoute("edit_authorPublisher",
                        "Link Authors and Publishers") }} ||       

</p>
@stop 
