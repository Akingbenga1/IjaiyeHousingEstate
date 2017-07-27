<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Zizaco\Entrust\HasRole;

class Students extends Eloquent  {
	



protected $fillable = array('school_admission_number', 'userid'); 
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'students';
	protected $primaryKey = 'studentid';
	//protected $hidden = array('password');
	public $timestamps = false;

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


	 public function StudentTermRelate()
    {
        return $this->hasMany('StudentTerm','studentid', 'studentid');
    }//end relationship function between students and studentpassword

     public function UserBelong()
    {
        return $this->belongsTo('Users','userid', 'userid');
    }//end relationship function between students and user

}