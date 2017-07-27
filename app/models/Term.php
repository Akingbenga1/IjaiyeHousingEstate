<?php
class Term extends Eloquent  {
	



//protected $fillable = array('studentid', 'password'); 
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'term';
	protected $primaryKey = 'termid';
	public $timestamps = false;

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	public function ThisTermRelate()
    {
        return $this->hasMany('thisterm','termid','id');
    }//end relationship function students and user


	//protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->useremail;
	}

}