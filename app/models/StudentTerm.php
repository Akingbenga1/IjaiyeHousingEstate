<?php

class StudentTerm extends Eloquent  {
	



  protected $fillable = array('studentid', 'thistermid', 'class_subdivision'); 
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'studentterm';
	protected $primaryKey = 'id';
	public $timestamps = false;

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

     public function StudentBelong()
    {
        return $this->belongsTo('students','studentid', 'studentid');
    }//end relationship function between students and user

       public function ThistermBelong()
    {
        return $this->belongsTo('ThisTerm','thistermid', 'id');
    }//end relationship function between students and user


}