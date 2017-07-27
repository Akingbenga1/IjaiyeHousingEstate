<?php

class subject_score extends Eloquent  {
	



 protected $fillable = array('exam_score_60', 'cont_assess_40', 'createdby', 'modifiedby', 'class_subdivision', 'teacher_comment'); 
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'subject_score';
	protected $primaryKey = 'scoreid';
	//public $timestamps = false;


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	public function StudentTermRelate()
    {
        return $this->belongsTo('studentterm','studenttermid','id');
    }//end relationship function subject_score and student_term


    public function subjectBelong()
    {
        return $this->belongsTo('Subjects','subjectid','subjectid');
    }//end relationship function subject_score and student_term


 	public function modifiedByBelong()
    {
        return $this->belongsTo('Users','modifiedby','userid');
    }//end relationship function subject_score and student_term

    public function createdByBelong()
    {
        return $this->belongsTo('Users','createdby','userid');
    }//end relationship function subject_score and student_term


//	protected $hidden = array('password');

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