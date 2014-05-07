<?php

class AuthorsController extends BaseController{

    public $restful = true;
    public function get_index(){
        return View::make('authors.index')       // Define location of authors file.
            ->with('title', 'Authors and Books') // Define title variable.
            ->with('authors', Author::all())    // Get all rows in author table.
        // this is to order the output that is referenced from the author.php page the creates the Author Class
       ->with('authors', Author::orderBy('name')->paginate(2));
    }
   
    public  function  get_view($id){
        return View::make('authors.view')
            ->with('title','Author View Page ')
            // this utilizes the laravel find()method to find a user by pk id
        ->with ('author', Author::find($id));
    }
    public function get_new(){
        return View::make('authors.new')
            ->with('title','Add New Author');
    }
    public function post_create(){
        $validation = Author::validate(Input::all());
        if ($validation->fails()){
        return Redirect::to ('authors/new')->withErrors($validation)->withInput();
        }else{
        Author::create(array(
            //adding to the data base in this case is as easy as the input syntax below
            'name'=>Input::get('name'),
            'bio'=>Input::get('bio')
        ));
        return Redirect::to('authors')
            //create flash message that is only available for one new request
        ->with('message','The author was created successfully');
    }
    }
    // this function returns the form for editing with the existing data that is selected from the $id
    public function get_edit($id){
        return View::make('authors.edit')
            ->with('title', 'Edit Author')
            ->with('author', Author::find($id)); // return form with data.
    }
    public function put_update() {
        $id = Input::get('id');
        $validation = Author::validate(Input::all());
        if($validation->fails()) {
            return Redirect::route('edit_author', $id)->withErrors($validation)->withInput();
        }
        else {

            $author = Author::find($id);
            
            $authorPublisher = AuthorPublisher::where('authorID',$id)->first(); 
            if(isset($authorPublisher->authorID)){
                $authorpublisherid = $authorPublisher->authorID ; 
                $authorpublisherName = $authorPublisher->publisherName; 
                $authorPublisher->delete(); 
            $author->bio  = Input::get('bio');
            $author->name = Input::get('name');
            $author->save();
        $authorpublisherNew = AuthorPublisher::create(array('authorID'=>$authorpublisherid,'publisherName'=>$authorpublisherName)); 
            
            return Redirect::route('author', $id)
                ->with('message', 'The author was updated successfully.');
            }else {
                    $author->bio  = Input::get('bio');
                    $author->name = Input::get('name');
                    $author->save();
                     return Redirect::route('author', $id)
                ->with('message', 'The author was updated successfully.');
            }
        };
    }
    public  function delete_destroy() {
        $id = Input::get('id');
        Author::find($id )->delete();
        return Redirect::to('authors')->with('message', 'The author has been deleted');
    }


}
