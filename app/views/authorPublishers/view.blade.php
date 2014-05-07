@extends ('layouts.default')

@section ('content')
<h1>{{$title}}</h1>

<ul>
    @foreach($authorPublishers as $authorPublisher)
    <li>{{$authorPublisher->auname}} || {{$authorPublisher->publisherName}} || {{$authorPublisher->biography}} || {{ HTML::linkRoute("detail", "detail", array ('authorID'=>$authorPublisher->authorID,'publisherName' =>$authorPublisher->publisherName))}}
</li>
    @endforeach

</ul>
<p>
   <!--  {{ HTML::linkRoute("new_publisher",
                        "Create New Publisher") }} ||       
 -->
</p>
