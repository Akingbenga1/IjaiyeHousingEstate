<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/



// Route group for API versioning
Route::group(array('prefix' => 'api/v1', 'before' => 'auth.basic'), function()
{

    Route::get('/StudentQuestionsInputPage', array(
        'as' => 'student-question-input-page',
        'uses' => 'ExamQuestionsController@getStudentQuestionInput'));

    Route::post('/StudentQuestionEditPage', array(
        'as' => 'student-question-edit-page',
        'uses' => 'ExamQuestionsController@getAPIStudentQuestionEditPage'));


    Route::get('/DeleteStudentsQuestionsPage/{RoleId}', array(
        'as' => 'student-question-page',
        'uses' => 'ExamQuestionsController@getAPIDeleteStudentQuestionEditPage'));


    Route::get('/authtest', array( function()
    {
        return View::make('account.loginform')->with(
            array(
                'Title' => 'Login'));  //end  static method make for making a page
    }));

});


//homepage
Route::get('/', array(
			'as' => 'home',
			'uses' => 'HomeController@home'));

//homepage
Route::get('/hjvbhjvbh', array(
			'as' => 'kaddd',
			'uses' => 'DownloadController@downloadKaduna'));

//homepage
Route::get('/phptopdf', array(
			'as' => 'phptopdf',
			'uses' => 'DownloadController@downloadKaduna2'));

//homepage
Route::get('/Infograph.html', array(
			'as' => 'inforgrah',
			'uses' => 'HomeController@inforGraphs'));

//View Students Page
Route::get('/StudentPage.html', array(
			'as' => 'student-page',
			'uses'  => 'PageController@getStudentPage'
			));//end route for student page

//View Students Page
Route::get('/StudentReportPage.html', array(
			'as' => 'student-report-page',
			'uses'  => 'PageController@getStudentReportPage'
			));//end route for student page

//View for showing the list of student in a class in the public space
Route::any('/listofstudents.html', array(
			'as' => 'public-student-term-list-page',
			'uses'  => 'StudentListController@getPublicStudentClass'
		   ));//end route for showing administartive page

//View for showing classes
Route::get('/listofclasses.html', array(
			'as' => 'public-class-list-page',
			'uses'  => 'StudentListController@showPublicClasses'
				));//end route for showing administartive page

Route::get('/StudentPDFReportPage', array(
			'as'=> 'get-report-pdf',
			'uses'=> 'DownloadController@downloadReportPDF'
			)); //end route for student report page	

Route::get('/StudentPDFListPage', array(
			'as'=> 'get-student-list-pdf',
			'uses'=> 'DownloadController@downloadStudentListPDF'
			)); //end route for student report page		

Route::get('/PrivacyPolicy.html', array(
			'as'=> 'get-privacy-policy-page',
			'uses'=> 'PageController@getPrivacyPolicyPage'
			)); //end route for student report page		

Route::get('/TermsofUse.html', array(
			'as'=> 'get-term-of-use-page',
			'uses'=> 'PageController@getTermOFUsePage'
			)); //end route for student report page		

Route::post('oauth/users', array(
			'as'=> 'good-stuff',
			'prefix' => 'api/v2',
			'before' => 'oauth',
			'uses'=> 'DownloadController@goodStuff'
			)); //end route for student report page		

Route::post('oauth/testme', array(
			'as'=> 'good-stuff',
			'prefix' => 'api/v2',
			//'before' => 'oauth',
			'uses'=> 'DownloadController@getToken'
			)); //end route for student report page	   	

//View for Administrative Page/{Year}/{Class}/{SubClass}
				Route::get('/listofclass.html', array(
				'as' => 'class-list-page',
				//'before' => 'generalteacher',
				'uses'  => 'StudentListController@showClasses'
				));//end route for showing administartive page

				//View for Administrative Page/{Year}/{Class}/{SubClass}
				Route::post('/listofclass', array(
				'as' => 'class-list-ajax',
				//'before' => 'csrf|generalteacher',
				'uses'  => 'StudentListController@showClasses'
				));//end route for showing administartive page

				//View for Administrative Page/{Year}/{Class}/{SubClass}
				Route::get('/SubjectPage.html', array(
				'as' => 'subject-page',
				//'before' => 'csrf|generalteacher',
				'uses'  => 'PageController@getSubjectPage'
				));//end route for showing administartive page






/**************************  authenticated group ********************************/
Route::post('/GetQuestions.html', array(
			'as' => 'get-questions',
			'uses' => 'ExamQuestionsController@getQuestionsFromDatabase'));

Route::group(array('before' => 'auth'), function()
		{
				Route::get('account/signout.html', array(
				
				'as' => 'signout',
				'uses' => 'AccountController@userSignOut'
				));//end static method for signing out

				//View Student DashBoard
				Route::get('/StudentDashboard', array(
				'as' => 'student-dashboard',
				'uses'  => 'AccountController@getStudentDashBoard'
				));//end route for Favours Educational

				//View User Profile Page
				Route::get('/userprofile.html', array(
				'as' => 'user-profile',
				'uses'  => 'AccountController@getProfileData'
				));//end route for student page



				//Students Questions
Route::post('/SubmitQuestionsPage', array(
			'as' => 'submit-question-to-database',
			'before' => 'generalteacher',
			'uses' => 'ExamQuestionsController@sendQuestionToDatabase'));

Route::post('/EditThisQuestion', array(
			'as' => 'edit-this-question',
			'before' => 'generalteacher',
			'uses' => 'ExamQuestionsController@editQuestionInDatabase'));

Route::post('/SaveThisScoreQuestion', array(
			'as' => 'save-this-score',
			'uses' => 'ExamQuestionsController@storeQuestionResultToDatabase'));

Route::get('/StudentQuestionsInputPage.html', array(
			'as' => 'student-question-input-page',
			'before' => 'generalteacher',
			'uses' => 'ExamQuestionsController@getStudentQuestionInput'));

Route::get('/StudentQuestionEditPage.html/{id}', array(
			'as' => 'student-question-edit-page',
			'before' => 'generalteacher',
			'uses' => 'ExamQuestionsController@getStudentQuestionEditPage'));

//Students Questions
Route::get('/StudentsQuestionsPage.html', array(
			'as' => 'student-question-page',
			'uses' => 'ExamQuestionsController@getStudentQuestionPage'));
//Students Questions






/*******************************   Admin People **************************************************************/

				//View for Administrative Page
				Route::get('/admin', array(
				'as' => 'admin-home',
				'before' => 'admin',
				'uses'  => 'PageController@loadAdminHome'
				));//end route for showing administartive page

				//View for Teacher Signature upload
				Route::get('admin/teachersignature.html', array(
				'as' => 'upload-teachers-signature',
				'before' => 'admin',
				'uses'  => 'PageController@teacherSignature'
				));//end route for showing Teacher Signature upload

				//View for Administrative Page
				Route::get('/inputmasterscore.html', array(
				'as' => 'large-input-ajax',
				'before' => 'admin',
				'uses'  => 'PageController@loadAdminHome'
				));//end route for showing administartive page

				//View for Signature list
				Route::get('/admin/signaturelist.html', array(
				'as' => 'signauture-list',
				'before' => 'admin',
				'uses'  => 'PageController@showAllOfficialSignature'
				));//end route for showing list of signatures


				//View staff page
				Route::get('/admin/StaffPage.html', array(
				'as' => 'staff-page',
				'before' => 'admin',
				'uses'  => 'StaffController@getStaffPage'
				));//end route for student page

				//View  staff edit page
				Route::get('admin/StaffEditPage.html/{StaffId}', array(
				'as' => 'staff-edit-page',
				'before' => 'admin',
				'uses'  => 'StaffController@getStaffEditPage'
				));//end route for student page


				//View for A
				Route::get('/getstudentscoredetail.html', array(
				'as' => 'get-this-student-details',
				'before' => 'generalteacher',
				'uses'  => 'ScoreController@getThisStudentScoreForm'
				));//end route for 

				//View for showing the list of student in a class 
				Route::get('/listofstudent.html', array(
				'as' => 'student-term-list-page',
				'before' => 'generalteacher',
				'uses'  => 'StudentListController@getStudentClass'
				));//end route for showing administartive page


				//View for showing the list of student in a class 
				Route::post('/classreportprogress.html', array(
				'as' => 'class-report-progress-page',
				'before' => 'generalteacher',
				'uses'  => 'ScoreController@getClassScoreProgress'
				));//end route for showing administartive page


				

				//View for student score input
				Route::get('/admin/inputpage.html', array(
				'as' => 'score-input-form',
				'before' => 'generalteacher',
				'uses'  => 'PageController@getScoreInputForm'
				));//end route for student score input

				//View for student score input
				Route::get('/admin/addstudentterm.html', array(
				'as' => 'add-student-term',
				'before' => 'generalteacher',
				'uses'  => 'PageController@getStudentTermForm'
				));//end route for student score input

				//View for getting students from any term
				Route::get('/admin/studentlist.html', array(
				'as' => 'get-students-list',
				'before' => 'generalteacher',
				'uses'  => 'PageController@getStudentList'
				));//end route for getting students from any term

					//View for editting student details
				Route::get('/admin/getstudentdetails.html', array(
				'as' => 'get-student-details',
				'before' => 'generalteacher',
				'uses'  => 'AccountController@getStudentDetailsSession'
				));//end route for showing student registration form

				//View for student registration page
				Route::get('/admin/studentregistration.html', array(
				'as' => 'student-registration-form',
				'before' => 'generalteacher',
				'uses'  => 'AccountController@getStudentRegForm'
				));//end route for showing student registration form

				//Post to register student details 
				Route::get('/admin/TeachersHome.html', array(
				'as' => 'teachers-home-page',
				'before' => 'generalteacher',
				'uses'  => 'AccountController@showTeachersHomePage'
				));//end route to Teachers Home Page

				//View for editting student details
				Route::get('/admin/editstudentdetails.html', array(
				'as' => 'edit-student-details-form',
				'before' => 'generalteacher',
				'uses'  => 'AccountController@editStudentDetailsForm'
				));//end route for showing student registration form

				//View for showing roles addition form 
				Route::get('/admin/roles.html', array(
				'as' => 'admin-roles',
				'before' => 'admin',
				'uses'  => 'AccountController@loadRolesForm'
				));//end route for owing roles addition form 

				//View for showing roles addition form 
				Route::get('/admin/DetachRole/', array(
				'as' => 'admin-detach-roles',
				'before' => 'admin',
				'uses'  => 'AccountController@detachRoles'
				));//end route for owing roles addition form 

				//View for showing roles addition form 
				Route::post('/admin/EditRole/', array(
				'as' => 'admin-edit-roles',
				'before' => 'admin',
				'uses'  => 'AccountController@editRoles'
				));//end route for owing roles addition form 

				/*
				Route::get('admin/SoftDeletePage', array(
				'as' => 'soft-delete-page',
				'before' => 'admin',
				'uses'  => 'ScoreController@getSoftDeletePage'
				));//end route for student page	
				*/	



/***************************************** apply csrf on the post guys  ********************************************************/
				// CSRF protection group
				Route::group( array('before' => 'csrf'), function(){				

				//Post to register student details 
				Route::post('/admin/studentregistration', array(
				'as' => 'register-student-details',
				'before' => 'generalteacher',
				'uses'  => 'AccountController@registerStudentDetails'
				));//end route to register student details 

				//Add staff page
				Route::post('/admin/addstaffpage', array(
				'as' => 'add-staff-page',
				'before' => 'admin',
				'uses'  => 'StaffController@addStaffToDatabase'
				));//end route for student page

				Route::post('/PromoteThisStudent/', array(
				'as' => 'promote-this-student',
				'before' => 'generalteacher',
				'uses'  => 'ScoreController@promoteThisStudent'
				));//end route for 

				//View for A
				Route::post('/getthisstudentclass', array(
				'as' => 'get-this-student-class',
				'before' => 'generalteacher',
				'uses'  => 'ScoreController@getThisStudentClass'
				));//end route for 

				//View for A
				Route::post('/ChangeThisStudentClass', array(
				'as' => 'change-student-class',
				'before' => 'generalteacher',
				'uses'  => 'ScoreController@changeThisStudentClass'
				));//end route for 

				//View for A
				
				//View for A
				Route::post('/GraduateThisStudent', array(
				'as' => 'graduate-this-student',
				'before' => 'generalteacher',
				'uses'  => 'ScoreController@graduateThisStudent'
				));//end route for 


				//View  staff edit page
				Route::post('admin/EditThisStaff', array(
				'as' => 'edit-this-staff',
				'before' => 'admin',
				'uses'  => 'StaffController@editStaffInfo'
				));//end route for student page

				/*
				Route::post('admin/SoftDeletePage', array(
				'as' => 'soft-delete-page',
				'before' => 'admin',
				'uses'  => 'ScoreController@getSoftDeletePage'
				));//end route for student page
				*/

				//View for showing the list of student in a class 
				Route::post('/classreportprogress.html', array(
				'as' => 'class-report-progress-page',
				'before' => 'generalteacher',
				'uses'  => 'ScoreController@getClassScoreProgress'
				));//end route for showing administartive page

				//Route for Updating teacher signature upload
				Route::post('admin/updateteachersignature', array(
				'as' => 'update-teachers-signature',
				'before' => 'admin',
				'uses'  => 'PageController@updateTeacherSignature'
				));//end Route for Updating teacher signature upload

				//Route for Deleting teacher signature from database
				Route::post('admin/deleteteachersignature', array(
				'as' => 'delete-teachers-signature',
				'before' => 'admin',
				'uses'  => 'PageController@deleteTeacherSignature'
				));//end Route for Deleting teacher signature from database

				//Route for Posting Teacher Signature upload
				Route::post('admin/postteachersignature', array(
				'as' => 'post-teachers-signature',
				'before' => 'admin',
				'uses'  => 'PageController@postTeacherSignature'
				));//end route Posting Teacher Signature upload

				//Route for posting student details
				Route::post('/poststudentscoredetail', array(
				'as' => 'post-this-student-details',
				'before' => 'generalteacher',
				'uses'  => 'ScoreController@postThisStudentDetails'
				));//end Route for posting student details

				//View for A
				Route::post('/saveofficialcomments', array(
				'as' => 'save-official-comments',
				'before' => 'admin',
				'uses'  => 'ScoreController@saveOfficialComments'
				));//end route for 

				//Post User Profile
				Route::post('/postprofile', array(
				'as' => 'post-user-profile',
				'uses'  => 'AccountController@postProfileData',
				));//end route for student page

				//View for A
				Route::post('/saveattendancerecord', array(
				'as' => 'save-student-attendance',
				'before' => 'generalteacher',
				'uses'  => 'ScoreController@saveStudentAttendance'
				));//end route for 

				//View for A
				Route::post('/savetermdurationrecord', array(
				'as' => 'save-student-termduration',
				'before' => 'generalteacher',
				'uses'  => 'ScoreController@saveTermDuration'
				));//end route for 

				//View for A
				Route::post('/savestudentscoredetail', array(
				'as' => 'save-this-student-score',
				'before' => 'generalteacher',
				'uses'  => 'ScoreController@saveStudentScores'
				));//end route for 

				//View for A
				Route::post('/saveallstudentscoredetail', array(
				'as' => 'save-all-this-student-score',
				'before' => 'generalteacher',
				'uses'  => 'ScoreController@saveAllStudentScores'
				));//end route for 

				//Route for deleting a score via ajax
				Route::post('/deletestudentscore', array(
				'as' => 'delete-this-student-score',
				'before' => 'generalteacher',
				'uses'  => 'ScoreController@deleteStudentScores'
				));//end route for 

				//Post to edit student details 
				Route::post('/admin/editstudentdetails', array(
				'as' => 'edit-student-details',
				'before' => 'generalteacher',
				'uses'  => 'AccountController@editStudentDetails'
				));//end route to register student details 


				//Post for student score input
				Route::post('/admin/inputscore', array(
				'as' => 'input-student-score',
				'before' => 'generalteacher',
				'uses'  => 'PageController@inputStudentScores'
				));//end route to input student score
				
				//View for editting student details
				Route::post('/admin/getstudentdetails.html', array(
				'as' => 'get-student-details',
				'before' => 'generalteacher',
				'uses'  => 'AccountController@getStudentDetails'
				));//end route for showing student registration form

				//View for student score editting
				Route::post('/admin/editpage.html', array(
				'as' => 'edit-student-score',
				'before' => 'generalteacher',
				'uses'  => 'PageController@getScoreEditForm'
				));//end route to edit the score of the subject for a student

				//Post for student score editting
				Route::post('/admin/editthisscore/', array(
				'as' => 'edit-this-score',
				'before' => 'generalteacher',
				'uses'  => 'PageController@editThisScore'
				));//end route to edit the score of the subject for a student

				//Post for student score editting
				Route::post('/admin/addstudentterm/', array(
				'as' => 'post-student-term',
				'before' => 'generalteacher',
				'uses'  => 'PageController@postStudentTerm'
				));//end route to edit the score of the subject for a student



				//Route for posting roles to database
				Route::post('/admin/createroles', array(
				'as' => 'admin-create-roles',
				'uses'  => 'AccountController@createRoles'
				)); //end route for posting roles to database 

				//Route for posting permissions to database
				Route::post('/admin/createpermission', array(
				'as' => 'admin-create-permissions',
				'uses'  => 'AccountController@createPermissions'
				));//end route for posting permission to database 

				//Route for attaching permissions to roles
				Route::post('/admin/attachpermission', array(
				'as' => 'admin-attach-permissions',
				'uses'  => 'AccountController@attachPermissionsToRole'
				)); //end route for attaching permission to roles 

				//Route for attaching roles to users
				Route::post('/admin/attachroles', array(
				'as' => 'admin-attach-roles',
				'uses'  => 'AccountController@attachRolesToUser'
				));//end route for attaching roles to users

			});//end csfr closure and


		});//end closure for group auth 




/********************  unauthenticated group ******************************************************************/
	
		Route::group(  array('before' => 'guest'),function() {

			// CSRF protection group
			Route::group( array('before' => 'csrf'), function(){

				//Route for creating new user in the Users table 
				Route::post('/account/create', array(
				'as'=> 'post-new-user',
				'uses'=> 'AccountController@postAccountDetails'
				)); //end route for creating new users


				//Route for attempting to log a user in 
				Route::post('/account/post-sign-in', array(
				'as'=> 'login-details',
				'uses'=> 'AccountController@postLoginDetails'
				));//end route for  logging a user in 

				//For Sending Email to Favours Group
				Route::post('/mail/SendMail', array(
				'as' => 'email_favours',
				'uses' => 'EmailController@SendToFavours'
				));//end route for sending email to favours group

			});//end function for csrf


	//end inner group
	 			

			// create sign-in form through GET
			Route::get('account/login.html', array(
			'as'=> 'login-form',
			'uses'=> 'AccountController@getLoginForm'
			));//end static method

/******************************** PASSWORD REMINDER GUYS   ************************************************/

			// get password reminder form 
			Route::get('/account/password-reminder', array(
			'as'=> 'password-reminder',
			'uses'=> 'RemindersController@getRemind'
			));//end route for getting passsword reminder

			// post password reminder for database legwork
			Route::post('/account/post-password-reminder', array(
			'as'=> 'post-password-reminder',
			'uses'=> 'RemindersController@postRemind'
			));//end route for posting password reminder

			// showing passowrd reset form
			Route::get('password/reset/{token}', array(
			'as'=> 'password-reset',
			'uses'=> 'RemindersController@getReset'
			 ));//end route for showing passowrd reset form 

			// post password reset details to database modification
			Route::post('/account/post-password-reset', array(
			'as'=> 'post-password-reset',
			'uses'=> 'RemindersController@postReset'
			));// end route post password reset details to database modification

			// get password reset form
			Route::get('account/reset-confirmed', array(
			'as'=> 'reset-confirmed',
			'uses'=> 'RemindersController@getResetConfirmation'
			));


/******************************** PASSWORD REMINDER GUYS   ************************************************/				
			// create account (GET)
			Route::get('account/newaccount.html', array(
			'as'=> 'create-account',
			'uses'=> 'AccountController@getCreate'
			));//end static method

			// create account (GET)
			Route::get('account/changepassword', array(
			'as'=> 'change-password',
			'uses'=> 'RemindersController@changePassword'
			));//end static method

		});//end group outer


			
	


/********************************* CSRF FOR NEUTRAL GUYS ********************************************/

		Route::group( array('before' => 'csrf'), function(){

			
			

		});// end csrf group of neutral guys//end closure for csrf

		Route::post('/StudentReportPage.html',
			 array(
				'as'=> 'post-student-report',
				'uses'=> 'PageController@postStudentReportPage',
				)); //end route for student report page		
			



/**************************************** GET REQUEST FOR NEUTRAL GUYS *************************************************/
				
		// create activation processing page (GET)
		Route::get('/account/activate/{code}', array(
		'as'=> 'account-activate',
		'uses'=> 'AccountController@ActivateUser'
		));// end route to create activation processing page (GET)
