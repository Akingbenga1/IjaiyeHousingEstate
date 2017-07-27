<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class Crono extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'email:letter';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Sends Email Peridically';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		// 
	
				Mail::send('emails.incoming.subscribers', array('name' => 'gbenga', 'id'=> 1), function($message)
					 		 {
								$message->to('akinbami.gbenga@gmail.com')->subject('Welcome To Favours Group Subscription News')->from('admin@webuserstools.com', 'Favours Group');
					   		 }//end anonymous function
					   );//end send 
	}//end fire method

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('email', InputArgument::REQUIRED, 'subscriber email'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		/*return array(
			array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);*/
	}

}
