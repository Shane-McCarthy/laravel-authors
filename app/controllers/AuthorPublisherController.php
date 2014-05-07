
<?php 
/**
* 
*/
class AuthorPublisherController extends BaseController
{
	public $restful = true;
	function get_author_pub()
	{
		$temp = DB::table('AuthorPublisher')
            ->join('Author', 'AuthorPublisher.authorID', '=', 'Author.id')
            ->get(array('authorID', 'name as auname', 'publisherName','bio as biography'));

    return View::make('authorPublishers.index')
        ->with('title', 'Author and Books')
        ->with('authorPublishers', $temp);

	}
	public function get_detail($authorID , $publisherName) {
		// $publisherName = Input::get('publisherName');
		// $authorID = Input::get('authorID');

    $temp = DB::table('AuthorPublisher')
        ->join('Author', 'AuthorPublisher.authorID', '=', 'Author.id')
        ->where('AuthorPublisher.authorID', '=', $authorID)
        ->where('AuthorPublisher.publisherName', '=', $publisherName)
        ->get(array('authorID', 'name as auname', 'publisherName','bio as biography'));
     //  die(print_r($temp)); 
    return View::make('authorPublishers.view')
        ->with('title', 'Single Author and Books')
        ->with('authorPublishers', $temp);
}
 // this function returns the form for editing with the existing data that is selected from the $id
    public function get_edit(){
     

    return View::make('authorPublishers.edit')
        ->with('title', 'Author and Books')
        ->with('publishers',  Publisher::all())
        ->with('authors', Author::all());
    }
    public function post_update() {
       $authurID = Input::get('authorId'); 
		$publisherName = Input::get('name'); 
		 $authorPublisher = AuthorPublisher::where('authorID',$authurID)->first(); 
      	

      if(isset($authorPublisher->authorID)){
      	
      	$authorPublisher->delete(); 
      	$authorPublisher->authorID =  Input::get('authorId'); 
      	$authorPublisher->publisherName = Input::get('name'); 
      	$authorPublisher->save();  
      	return Redirect::to('authorpublishers') 
      	 ->with('message','The author and publisher were linked successfully');
    
      }else {
      	$authorPublisherCreate = AuthorPublisher::create(array('authorID'=>Input::get('authorId'),'publisherName'=>Input::get('name')));
		
      
      	return Redirect::to('authorpublishers')
      	 ->with('message','The author and publisher were linked successfully');

      }
	}
	public function delete_destroy() {
    $id = Input::get('authorID');
    $publisherName = Input::get('publisherName');
    DB::table('AuthorPublisher')
                    ->where('authorID', '=', $id)
                    ->where('publisherName', '=', $publisherName)
                    ->delete();
    $message = "The publisher author entry for author ".$id." and "
               ."publisher ".$publisherName." was deleted.";
    return Redirect::to('authorpublishers')->with('message', $message);
}



}

?>