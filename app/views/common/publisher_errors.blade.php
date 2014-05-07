<!--appearently this $errors is created by the witherrors() in the controller and this is what you reference  -->
@if($errors->has())
<ul>
    {{$errors->first('name', '<li>:message</li>')}}
  
</ul>
@endif