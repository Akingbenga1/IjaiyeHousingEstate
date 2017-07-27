<?php

class QuestionResult extends Eloquent  {
	



 protected $fillable = array('classname', 'termname', 'year', 'score', 'total', 'candidate','subjectid'); 
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'questionresult';
	protected $primaryKey = 'questionresultid';
	//public $timestamps = false;

 /*
	public function questionOptionsBelong()
    {
        return $this->belongsTo('QuestionOptions','questionoptionsid','questionoptionsid');
    }//end relationship function subject_score and student_term

    public function questionAnswerBelong()
    {
        return $this->belongsTo('QuestionAnswers','questionanswerid','questionanswerid');
    }//end relationship function subject_score and student_term
     */





}