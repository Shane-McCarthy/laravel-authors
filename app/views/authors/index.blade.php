@extends ('layouts.default')

@section ('content')
<h1>Authors Home Page</h1>
<ul>
   @foreach($authors->getCollection() as $author)
    <li>{{HTML::linkRoute("author",$author->name,array($author->id)) }} ||    {{ HTML::linkRoute("edit_author",  "Update",  array($author->id)) }}
</li>
    @endforeach

</ul>
<p>
    {{ HTML::linkRoute("new_author",
                        "Create New Author") }}
</p>
<p>
   {{ $authors->links() }}


</p>

@stop