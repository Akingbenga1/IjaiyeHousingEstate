<?php

class StaffTable extends Eloquent  {



 protected $fillable = array('classname', 'subclass',  'termname', 'subjectid', 'year', 'assignedroleid', 'designation'); 
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'stafftable';
	protected $primaryKey = 'stafftableid';
	//public $timestamps = false;

	public function assignedrolesBelong()
    {
        return $this->belongsTo('AssignedRoles','assignedroleid','id');
    }//end relationship function subject_score and student_term


}