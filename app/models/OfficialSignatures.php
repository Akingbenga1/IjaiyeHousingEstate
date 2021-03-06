<?php

class OfficialSignatures extends Eloquent  {
	
protected $fillable = array('signatureimage', 'userid', 'modifiedby','createdby'); 
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'officialsignature';
	protected $primaryKey = 'officialsignatureid';

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
    }//end relationship function between students and user

}