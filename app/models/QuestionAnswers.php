<?php

class QuestionAnswers extends Eloquent  {
	



 protected $fillable = array('correctanswer', 'createdby', 'modifiedby'); 
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'questionsanswers';
	protected $primaryKey = 'questionanswerid';
	//public $timestamps = false;




}