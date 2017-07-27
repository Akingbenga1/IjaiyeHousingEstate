<?php

class TermDuration extends Eloquent  {
	
protected $fillable = array('termname', 'classname', 'class_subdivision', 'year','studentid','createdby','termbegins',
							 'termend','nexttermbegins', ); 
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'termduration';
	protected $primaryKey = 'termdurationid';

	/**
	 * The attributes excluded from the model's JSON form.
	 *\
	 * @var array
	 */

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */


     public function UserBelong()
    {
        return $this->belongsTo('Users','userid', 'userid');
    }//end relationship function between termduration and user

    public function StudentBelong()
    {
        return $this->belongsTo('Students','studentid', 'studentid');
    }//end relationship function between termduration and student
}