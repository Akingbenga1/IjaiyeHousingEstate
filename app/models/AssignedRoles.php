<?php

class AssignedRoles extends Eloquent  {
	

	protected $fillable = array('user_id','role_id'); 
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'assigned_roles';
	//protected $primaryKey = 'userid';
	public $timestamps = false;

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	public function userBelong()
    {
        return $this->belongsTo('Users','user_id', 'userid');
    }//end relationship function between students and user
    	public function roleBelong()
    {
        return $this->belongsTo('Roles','role_id', 'id');
    }//end relationship function between students and user


}// end model Class AssignedRoles