@extends ('layouts.default')

@section ('content')
<h1>{{$title}}</h1>

<ul>
   
    <li>{{$authorPublishers->auname}} || {{$authorPublishers->publisherName}} || {{$authorPublishers->biography}}
</li>
  

</ul>
<p>
   <!--  {{ HTML::linkRoute("new_publisher",
                        "Create New Publisher") }} ||       
 -->
</p>
