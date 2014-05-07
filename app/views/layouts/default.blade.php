<!DOCTYPE html>
<html>
<head>
    <title>Authors and Books</title>
</head>
<body>
 {{ HTML::linkRoute("authors","Authors Page ") }} ||       {{ HTML::linkRoute("publishers","Publishers Page ") }} || 
  {{ HTML::linkRoute("authorpublishers","Authors and Publishers Page ") }} || 
@if(Session::has('message'))
<!-- flash message only available for one request -->
<p style="color:green;">{{ Session::get('message') }} </p>
@endif

@yield('content')
</body>
</html>
