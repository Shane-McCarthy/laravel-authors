<?php 

class PublishersController extends BaseController{
 public $restful = true;
public function get_publishers(){
        return View::make('publishers.index')
        ->with('title','List of Publishers')
        ->with ('publishers',Publisher::all());
       
    }
    public function get_new(){
    	return View::make('publishers.new')
    	->with('title','Add New Publisher'); 
    }
    public function post_create (){
    	    $validation = Publisher::validate(Input::all());
    if($validation->fails()) {
        return Redirect::to('publishers/new')->withErrors($validation)->withInput();
    }
    else {

    	Publisher::create(array('name'=>Input::get('name'))); 
    return Redirect::to('publishers')
    //flash message 
    ->with ('message','The publisher was created successfully. '); 
    }
}
public function get_edit($name){
    return View::make('publishers.edit')
            ->with('title', 'Edit Publisher')
            ->with('publisher', Publisher::find($name)); // return form with data.
}
public function put_update() {

    $name = Input::get('name');
    $validation = Publisher::validate(Input::all());
     $publisher = Publisher::find($name);
     $authorpublisher = AuthorPublisher::find($name); 
    if($validation->fails()) {
        return Redirect::route('edit_publisher', $name)->withErrors($validation)->withInput();
    } else {
              
    	
    	if(!isset($authorpublisher->authorID)){
    	
         $publisher->name = Input::get('nameNew');
        $publisher->save();
       return Redirect::to('publishers')
            ->with('message', 'The publisher was updated successfully.');
        }else{
    	
       
       
       
        $authorpublisherid = $authorpublisher->authorID ; 
        $authorpublisher->delete(); 
        
        $publisher->name = Input::get('nameNew');
        $publisher->save();
        $authorpublisherNew = AuthorPublisher::create(array('authorID'=>$authorpublisherid,'publisherName'=>Input::get('nameNew'))); 
 
       return Redirect::to('publishers')
            ->with('message', 'The publisher was updated successfully.');
            
        }
    };
}
public function delete_destroy (){
    $name = Input::get('name'); 
    try{
        Publisher::find($name)->delete(); 
    }catch(Exception $ex){
        return Redirect::to('publishers')
        ->with ('message', 'The publisher cannot be deleted. Publisher has a author Related'); 

    }
    return Redirect::to('publishers')->with ('message', 'The publisher has been deleted.'); 
}


}