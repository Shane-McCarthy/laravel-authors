<?php 
class AuthorPublisher extends Eloquent{
	// Laravel's default naming convention requires a pluralized table name
    // and singularized class name.
    // This is really confusing so you can override this by specifying the
    // table name with the following instruction.
	protected $table = 'AuthorPublisher'; 
 // This code allows mass assignment which is an unsecure way to create
    // data.  More will be discussed later for making it more secure.
    protected $fillable = array ('authorID','publisherName');

      public $timestamps = false;
     protected $primaryKey = 'publisherName'; 
       // this is where the validation is set it will be called as a class instance in another page but it is
    // set here

   
}