<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});
// the named route is below, I am assuming that it need to be in this format with the array
// naming the route is done by 'as'=> authors'
Route::get('authors',array ('as'=>'authors','uses'=>
    'AuthorsController@get_index'));  // ref to action method in controller
// publishers route 
Route::get('publishers',array('as'=>'publishers','uses'=>'PublishersController@get_publishers')); 
//Route::get('publishers_2nd',array('as'=>'publishers','uses'=>'PublishersController@get_publishers')); 

// publisher create route
Route:: get ('publishers/new', array('as'=>'new_publisher','uses'=>'PublishersController@get_new'));
Route::post('publishers/create', array('as'=>'create_publisher', 'uses'=>'PublishersController@post_create')); 
Route::put('publishers/update', array('as'=>'update_publisher', 'uses'=>'PublishersController@put_update'));
Route::get('publishers/edit/{name}', array('as'=>'edit_publisher', 'uses'=>'PublishersController@get_edit'));


Route::get ('author/{id}',array('as'=>'author','uses'=>'AuthorsController@get_view'));

// Invokes GET request
Route::get('authors/new',                           // route url
    array('as'=>'new_author',               // route name
        'uses'=>'AuthorsController@get_new'));  // controller and function ref

// Invokes POST request
Route::post('authors/create',                          // route url
    array('as'=>'create_author',              // route name
        'uses'=>'AuthorsController@post_create')); // controller and function ref
Route::put('authors/update', array('as'=>'update_author', 'uses'=>'AuthorsController@put_update'));
Route::get('author/edit/{id}', array('as'=>'edit_author', 'uses'=>'AuthorsController@get_edit'));
Route::delete('author/delete', array('as'=>'delete_author', 'uses'=>'AuthorsController@delete_destroy'));
Route::delete('publisher/delete', array('as'=>'delete_publisher',
 'uses'=>'PublishersController@delete_destroy'));

Route::get('authorpublishers', array('as'=>'authorpublishers',
 'uses'=>'AuthorPublisherController@get_author_pub'));

Route::get('authorPublishers/detail/{authorID}/{publisherName}',
 array('as'=>'detail', 'uses'=>'AuthorPublisherController@get_detail'));

Route::get('authorPublishers/edit', 
	array('as'=>'edit_authorPublisher', 'uses'=>'AuthorPublisherController@get_edit'));

Route::post('authorPublishers/update_au', 
	array('as'=>'update_authorPublisher', 'uses'=>'AuthorPublisherController@post_update'));
Route::delete('authorPublishers/delete', array('as'=>'delete_authorPublisher',
 'uses'=>'AuthorPublisherController@delete_destroy'));

