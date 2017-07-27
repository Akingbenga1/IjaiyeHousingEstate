@extends('layouts.main')

@section('division_container')

  <h3> Teachers Home Page </h3> 

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> Steps to Register New Student Details </h4>
      </div>
      <div class="modal-body">                    
            <div class="RegInstruction ">
                  <b>Step 1:</b> Register student information here by entering their names and Student admission number.<br />
                   <b>Step 2:</b> Student surname and student first name are compulsory.<br />
                   <b>Step 3:</b> Student Admission Number <b> must be a 4-digit number </b>. <br />
                   <b>Step 4:</b> <b> 3-digit is not accepted by the system.</b><br />
                   Student middlename is optioinal
            </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="MySecondModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> Steps to Add New Students to Term</h4>
      </div>
      <div class="modal-body">
              <div class="ScoreInputProcessInstruct"> 
                 <b>Step 1:</b> Choose the appropriate term. ( Year, Term, Class, Subclass)<br />
                 <b>Step 2:</b> Start typing student name and choose student <br />
                 <b>Step 3:</b>Click to add student to List <br />
                 <b>Step 4:</b> Click " select all students in list " to add all students in term.
                                Then click ' Add student to term'        
          </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
        
            <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist" id="myTab">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Register student </a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Student Score Table</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Add Student to Term</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Question Input Page</a></li>
  </ul>

 
             <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
        <div class="RegistrationInfo">           
            <div class="StudentRegistrationForm">
                <div class="panel panel-default">
                      <form class="form-horizontal" action="{{URL::route('register-student-details')}}" method="post">
                            <div class="panel-heading clearfix ">
                              <h3 class="panel-title pull-left"> <b class=""> Student Registration</b></h3>
                             <div class="btn-group pull-right">                             
                                
                                 <a href="{{URL::action('edit-student-details-form')}}"
                                  class="EditStudentLink btn btn-large  btn-primary">  <i class="glyphicon glyphicon-edit"></i>Edit student details  </a>
      
                                <button  type = "button"  class="btn btn-large btn-danger" data-toggle="modal" data-target="#myModal">
                                      <i class="fa fa-exclamation-circle"></i>
                                     Instructions
                                </button>
                                 <button  type = "submit"  class="btn btn-large  btn-success">
                                      <i class="fa fa-check"></i>
                                     Register Student
                                </button>
                              </div> 
                            </div>
                      <div class="modal-body"> 
                       <div class="UtilitySection row ">
                                  @if(Session::has('AccountCreateInfo') and Session::has('GoodResponse'))
                                        @if(Session::get('GoodResponse') == 1 )
                                            <div class="RegistrationGoodResponse bg-success text-center"> <h4> {{Session::get('AccountCreateInfo')}}</h4> </div>
                                        @elseif(Session::get('GoodResponse') == 0 )
                                            <div class="RegistrationBadResponse bg-danger text-center"><h4> {{Session::get('AccountCreateInfo')}} </h4></div>
                                        @endif                         
                                  @endif                        
                       </div>    
                       <hr />                   
                          <div class="form-group">            
                                  <div class="InputBlock"> 
                                     <p class="col-md-4"> Student surname:(<b> compulsory </b>)</p>
                                      <div class="col-md-7"> 
                                           
                                            <input type="text" name="StudentSurname" class="form-control"  id="StudentSurname" />
                                             @if($errors->has('StudentSurname'))
                                                <span class="text-danger StudentRegisterError">
                                                    {{$errors->first('StudentSurname')}}</span>
                                            @endif
                                      </div>
                                  </div>
                          </div>
                          <hr />
                          <div class="form-group">
                                <div class="InputBlock"> 
                                    <p class="col-md-4"> Student firstname: (<b> compulsory </b>)</p>
                                    <div class="col-md-7">
                                      
                                       <input type="text" name="StudentFirstname" class="form-control" id="StudentFirstname" />
                                        @if($errors->has('StudentFirstname'))
                                             <span class="text-danger StudentRegisterError">{{$errors->first('StudentFirstname')}}</span>
                                       @endif
                                    </div>
                                </div>
                                 <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                          </div>
                          <hr />
                          <div class="form-group">
                                 <div class="InputBlock">
                                  <p class="col-md-4"> Student Admission No.: (<b> compulsory </b>) </p>
                                  <div class="col-md-7">
                                     
                                      <input type="text" name="StudentAdmissionNumber" class="form-control" id="StudentAdmissionNumber" />
                                       @if($errors->has('StudentAdmissionNumber'))
                                            <span class="text-danger StudentRegisterError">{{$errors->first('StudentAdmissionNumber')}}</span>
                                      @endif
                                  </div>
                                  </div>  
                          </div>
                          <hr />                                                 
                          <div class="form-group">
                                  <div class="InputBlock">
                                        <p class="col-md-4"> Student middlename:(optional)</p>
                                        <div class="col-md-7"> 
                                           
                                            <input type="text" name="StudentMiddlename" class="form-control" id="StudentMiddlename" />
                                             @if($errors->has('StudentMiddlename'))
                                                <span class="text-danger StudentRegisterError">{{$errors->first('StudentMiddlename')}}</span>
                                            @endif
                                        </div>
                                  </div>
                          </div> 
                      </div>
                      <!--<div class="panel-footer">
                          
                      </div> -->
                  </form>
                </div>         
                 
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="profile">
          <div class="panel panel-default">
                <form class="form-horizontal" action="{{URL::route('post-this-student-details')}}" method="post">
                      <div class="panel-heading clearfix ">
                      <h3 class="panel-title pull-left"> <b class=""> Student Score Sheet </b></h3>
                      <!-- <div class="btn-group pull-right">                             
                          
                           <a href="{{URL::action('edit-student-details-form')}}"
                            class="EditStudentLink btn btn-large  btn-primary">  <i class="glyphicon glyphicon-edit"></i>Edit student details  </a>

                          <button  type = "button"  class="btn btn-large btn-danger" data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-exclamation-circle"></i>
                               Instructions
                          </button>
                           <button  type = "submit"  class="btn btn-large  btn-success">
                                <i class="fa fa-check"></i>
                               Register Student
                          </button>
                        </div>  -->
                      </div>
                      <div class="modal-body"> 
                          <div class="form-group TypeStudentName">
                                    @if(Session::has('ScoreInput'))
                                       <h4 class=" bg-danger text-center"> {{Session::get('ScoreInput')}}</h4>                       
                                    @endif                        
                          </div>                   
                          <div class="form-group TypeStudentName">            
                              <div class="GetStudentScoreSheet">
                                  <span class="TopStudentScore"></span>
                                  <p class="text-muted">
                                      Type Student Admission Number (more accurate ) or Student Name:
                                  </p>
                                  <div class="row">
                                      <div class="col-md-7">
                                          @if(!empty($AllStudents) and is_array($AllStudents))
                                            @include('includes.choosestudentasarray')  
                                          @endif
                                      </div>
                                      <button type="button"  class="GetClassYear col-md-4"> 
                                            <i class="glyphicon glyphicon-search"></i> Get Student Class </button>
                                  </div>
                                 
                                                 
                              </div>  
                          </div>
                          <hr />
                          <div class="form-group TypeStudentName">
                            <div class="row"> 
                                <div class="col-md-3 HighlitStudentClass">
                                    <p class="text-muted">
                                         Select Available Student Class 
                                    </p>
                                    <span class="ReportStudentClass"></span>
                                    <span class="TellStudentClass"></span> 
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                </div>
                                <div class="ChooseTermScoreSheet GetStudentScoreSheet col-md-offset-1 col-md-8">
                                    <p class="text-muted"> Choose Term: (Year, Class and SubClass will be updated automatically) 
                                    </p>                     
                                   
                                    <div class="ChooseTermBox row">
                                        <div class="YearDiv col-md-3">
                                            <span class="YearLabel"> Year </span>
                                            <select name = "Year" class="YearSelect form-control" >
                                              <option> -- Year -- </option> 
                                            </select>
                                        </div>
                                        <div class="TermDiv col-md-3">
                                            <span class="TermLabel"> Term </span>
                                            <select name = "TermName" class="TermSelect form-control" >
                                                <option> -- Term -- </option>
                                                <option value="first term"> First term</option>
                                                <option value="second term"> Second term</option>
                                                <option value="third term"> Third term</option>
                                            </select>
                                        </div>

                                        <div class="ClassDiv col-md-3">
                                            <span class="ClassLabel"> Class </span>
                                            <select name = "Class" class="ClassSelect form-control" >
                                              <option> -- Class-- </option>        
                                            </select>
                                        </div>

                                        <div class="SubClassDiv col-md-3">
                                            <span class="SubClassLabel"> SubClass </span>
                                            <select name = "SubClass" class="SubClassSelect form-control" >
                                                 <option> -- Class Arm -- </option>
                                            </select> 
                                        </div>
                                    </div>
                                     <div class="ChooseTermError row">
                                          <div class="col-md-3">
                                              @if($errors->has('Year'))
                                                  <span class="text-danger StudentError">{{$errors->first('Year')}}</span>
                                              @endif
                                          </div>
                                          <div class="col-md-3">
                                               @if($errors->has('TermName'))
                                                  <span class="text-danger StudentError">{{$errors->first('TermName')}}</span>
                                              @endif
                                          </div>
                                          <div class="col-md-3">
                                               @if($errors->has('Class'))
                                                  <span class="text-danger StudentError">{{$errors->first('Class')}}</span>
                                              @endif
                                          </div>
                                          <div class="col-md-3">
                                               @if($errors->has('SubClass'))
                                                  <span class="text-danger StudentError">{{$errors->first('SubClass')}}</span>
                                              @endif
                                          </div>
                                    </div>
                                </div>
                            </div>
                          </div>                                                
                      </div>
                      <div class="panel-footer ">
                          <input type = "submit"  value="Open Score Sheet" id="AutoButton" class="btn btn-success btn-lg btn-block"  disabled/>
                          <input type = "hidden" value="{{URL::route('get-this-student-class')}}" class="ClassYearURL"> 
                      </div>
                  </form>
          </div>          
            <!--{{ Form::open(array( 'route' => 'post-this-student-details' ,'files' => true, 'method'=> 'post', 
                'class'=>'GetStudentScoreSheetForm')) }}  
                                 
                   
                    <input type = "submit"  value="Open score sheet" id="AutoButton"  disabled/>
                    {{Form::token()}}               
            {{Form::close()}} -->
    </div>
    <div role="tabpanel" class="tab-pane" id="messages">
          <div class="RegistrationInfo">           
            <div class="StudentRegistrationForm">
                <div class="panel panel-default">
                  <form class="form-horizontal" action="{{URL::route('post-student-term')}}" method="post">
                            <div class="panel-heading clearfix ">
                              <h3 class="panel-title pull-left"> <b class="">Add Student to Term</b></h3>
                             <div class="btn-group pull-right">
                                <button  type = "button"  class="btn btn-large btn-danger" data-toggle="modal" data-target="#MySecondModal">
                                      <i class="fa fa-exclamation-circle"></i>
                                     Instructions
                                </button>
                              </div> 
                            </div>
                        <div class="modal-body"> 
                          <div class="row">                               
                              <div class="Right col-md-9">   
                                  <div class="form-group">
                                      <div class="StudentTermSelect row text-muted">
                                            <p class="ScoreInputInstruction col-md-4">
                                                 <b> STEP 1</b>:<br />Choose the appropraite term. <br />
                                            ( Year, Term, Class, Subclass) 
                                            </p>
                                            <div class="StudentPageChooseTerm col-md-7"> 
                                                    @include('includes.chooseterm')    
                                            </div>
                                      </div>          
                                  </div>
                                  <hr />
                                  <div class="form-group">
                                     <div class="StudentTermProcessDiv StudentTermSelect row">            
                                        <p class="ScoreInputInstruction col-md-4 text-muted"> <b> STEP 2:</b><br />
                                         Type Student Name First
                                        </p>
                                        <div class="col-md-7">
                                              @if(!empty($AllStudents) and is_array($AllStudents))
                                                    <?php
                                                       foreach($AllStudents as $allstudents) 
                                                       {
                                                           $key =   $allstudents['studentid'] ;
                                                           $value = $allstudents['school_admission_number'] ." - ". $allstudents['user_belong']['surname']." ".
                                                                    $allstudents['user_belong']['firstname']." ".
                                                                    $allstudents['user_belong']['middlename'];
                                                             $SearchArray[$key] =  $value;
                                                             //if($allstudents['studentid'] == $r[])
                                                        }
                                                    ?>
                                                         
                                                    
                                                       <script type='text/javascript'>
                                                                 <?php
                                                                      $JSArray = json_encode($SearchArray);
                                                                      echo "var StudentList = ". $JSArray . ";\n";
                                                                  ?>

                                                        </script>
                                                        
                                                    <div class="AutoCompleteContainMe">
                                                        <input type="text" name="TypeStudentName" class="form-control" id="autocomplete-custom-append2" style="float: left;"/>
                                                        <input type="hidden" name="StudentId" id="StuId2" style="float: left;"/>
                                                        <div id="suggestions-container2" style="position: relative;  float: left; margin: 10px;"></div>
                                                    </div>
                                              @endif 
                                        </div>
                                     </div>
                                     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                  </div>
                                  <hr />
                                  <div class="form-group"> 
                                      <div  class="MoveRightButton StudentTermProcessDiv text-muted StudentTermSelect row">
                                          <!-- <input type="button" id="btnLeft" value="&lt;&lt;" /> -->
                                          <p class="MoveRightLabel col-md-4 text-muted"> <b> STEP 3:</b><br />Add student to List</p> 
                                          <input type="button" id="btnRight" value="&gt;&gt;&gt;"  class="AutoButtonRight col-md-3 btn-lg btn btn-primary" disabled/>
                                          <select id="rightValues" class="col-md-5" name="MegaList[]" size="5" multiple ="multiple">
                                          </select>
                                      </div>
                                      <br />
                                           <div class="TermAddMultipleSelect StudentTermSelect row StudentTermProcessDiv">
                                            <p class="MegaListLabel col-md-4 text-muted">
                                               <b>STEP 4:</b>
                                            </p> 
                                              <input type = "button"  value="select all students in list"  class="AutoButtonSelectAll  btn btn-default col-md-3" id="SelectAll" disabled/>
                                              <input type = "submit"  value="add student to term" class="AutoButtonSubmit col-md-4 btn btn-success"  disabled/>
                                        </div>                                 
                                  </div>
                              </div>
                              <div class="AddScoreNotification col-md-3">
                                      
                                         @if(Session::has('AddStudentTermInfo'))
                                                <div class="well"><h4> {{Session::get('AddStudentTermInfo')}}</h4> </div>
                                         @endif
                                     

                                          <?php
                                                if(Session::has('SuccessArray'))
                                                {
                                                  $SuccessArray  = Session::get('SuccessArray');
                                                }

                                                 if(Session::has('FailureArray'))
                                                {
                                                  $FailureArray  = Session::get('FailureArray');
                                                }
                                                if(Session::has('ThisTermAndSubClass'))
                                                {
                                                  $ThisTermAndSubClass  = Session::get('ThisTermAndSubClass');
                                                }
                                          ?>
                                  <div class="TermAddSuccess bg-success">
                                      <?php 
                                         if( isset($SuccessArray) and is_array($SuccessArray)  and array_key_exists('studentid', $SuccessArray)
                                              and isset($ThisTermAndSubClass) and is_array($ThisTermAndSubClass))
                                            {
                                               echo "The following students were successfully attached to <b>". 
                                                    $ThisTermAndSubClass['ThisTerm']['classname'] . " ".
                                                    strtoupper($ThisTermAndSubClass['SubClass'])." ".
                                                    $ThisTermAndSubClass['ThisTerm']['year']. "</b><br />";
                                                    //var_dump($ThisTermAndSubClass); var_dump($SuccessArray) ;
                                                foreach( $SuccessArray['studentid'] as $EachStudentInserted)
                                                  {
                                                      $ThisStudentInserted = Students::with('UserBelong')
                                                                           ->where('studentid', '=', $EachStudentInserted )
                                                                           ->get()->first()->toArray();
                                                      //var_dump($ThisStudentInserted);
                                                      echo  "". $ThisStudentInserted['user_belong']['surname']. " "
                                                      . $ThisStudentInserted['user_belong']['firstname']." "
                                                      . $ThisStudentInserted['user_belong']['middlename'] .""." <b class='Demarcation'> | </b> ";
                                                  }      
                                            }
                                      ?>
                                  </div>
                                  <br />
                                  <div class="TermAddFail bg-danger"> 
                                        @if(isset($FailureArray) and is_array($FailureArray) and array_key_exists('studentid', $FailureArray)
                                             and isset($ThisTermAndSubClass) and is_array($ThisTermAndSubClass) )
                                              The following students  were not successfully attached to 
                                              <b> {{  $ThisTermAndSubClass['ThisTerm']['classname'] .
                                                   strtoupper($ThisTermAndSubClass['SubClass'])." ".
                                                   $ThisTermAndSubClass['ThisTerm']['year'] 
                                               }}</b><br />
                                               <?php
                                                  foreach( $FailureArray['studentid'] as $EachStudentInserted)
                                                  {
                                                     $ThisStudentInserted = Students::with('UserBelong')
                                                                         ->where('studentid', '=', $EachStudentInserted )
                                                                         ->get()->first()->toArray();
                                                     echo  "".$ThisStudentInserted['user_belong']['surname']. " "
                                                          . $ThisStudentInserted['user_belong']['firstname']." "
                                                          . $ThisStudentInserted['user_belong']['middlename']." <b> | </b> ";
                                                }                
                                              ?>
                                        @endif
                                  </div>
                              </div> 
                          </div>
                        </div>
                      <!--<div class="panel-footer">
                          
                      </div> -->
                  </form>
                </div>         
                 
            </div>
          </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="settings">
        <div class="row">
            <a href="{{URL::action('student-question-input-page')}}"
               class="StudentQuestionInputPage btn btn-large btn-primary col-md-6">            
                   Go to  Questions Input Page >>>
            </a>
        </div>       
    </div>
  </div>


<script type="text/javascript">



    jQuery(window).on('error', function (e) {
          // This tells jQuery no more ajax Requests are active
          // (this way Global start/stop is triggered again on next Request)
          jQuery.active = 0;
          //Do something to handle the error
          //   $(".ReportStudentClass").removeClass("AjaxRotator");
          });

    $('.GetClassYear').on("click", function (e) 
        { 
         // console.log(  (javascript:void(0) ) );
            e.preventDefault();
            $(".ReportStudentClass").html(" ");
            var StudentID = $('#StuId').val();                         
            var ActionUrl  =  $(".ClassYearURL").val(); 
            $(document).on({
                               
                          ajaxStart: function() { $(".TopStudentScore").addClass("AjaxRotatorStudentScoreTop");  
                                                  $(".StudentInfoGraphClass").removeClass("AjaxRotatorInfoGraph");
                                                  $(".CheckResultLink").show();     },
                          ajaxStop: function() {  $(".TopStudentScore").removeClass("AjaxRotatorStudentScoreTop");
                                                  $(".StudentInfoGraphClass").removeClass("AjaxRotatorInfoGraph");
                                                  $(".CheckResultLink").show();  },
                            // ajaxComplete:function() { $(".ReportStudentClass").removeClass("AjaxRotatorClass"); },
                          });                                                              
            //console.log(ActionUrl);
            data =  { 'StudentID' : StudentID};     
            try {
                       $.ajax({
                              type: 'POST',
                              url:  ActionUrl,
                              dataType: 'json',
                              data: data,                                           
                              success: function(response, textStatus)
                                        {  var classlist ="";
                                           var validatorerror ="";
                                           var ErrorExerror ="";
                                           var BigHTML = "";
                                          console.log(response);
                                          //console.log(response[0].thisterm_belong.classname);
                                          len = $.map(response, function(n, i) { return i; }).length;
                                          if( !( len  == 0) )
                                          {
                                              $('.GetStudentScoreSheet .ClassSelect option:last-child').remove();
                                              $('.GetStudentScoreSheet .SubClassSelect option:last-child').remove();
                                              $('.GetStudentScoreSheet .YearSelect option:last-child').remove();
                                              $(".TellStudentClass").html(" ");
                                             // $(".ClassSelect").val(response[0].thisterm_belong.classname);
                                              $.each(response, function(index,value)
                                                  {       
                                                  //console.log(JSON.stringify(value) );
                                                          classlist +=  "<input type='radio' name='PickClass' class='PickClass' value='" + 
                                                                      JSON.stringify(value) + "' /> <b> " +
                                                                     value.thisterm_belong.classname + " " +
                                                                      value.class_subdivision.toUpperCase() + " , "  +
                                                                      value.thisterm_belong.year + "/" + 
                                                                      ( parseInt(value.thisterm_belong.year) + 1)
                                                                      + " session </b><br /> ";
                                                   });
                                   //  alert(classlist);
                                      // window.location.reload();
                                       $(".TellStudentClass").append(classlist );
                                        $(".TelStudentClass").append("Choose the right class of this student" 
                                                                          + "<b>" + 
                                                                             "</b> . Details of this student class " +
                                                                             "will be  updated automatically on " +
                                                                             " the right hand side of this page." +
                                                                             " ");
                                          $('.HighlitStudentClass').effect("highlight", {}, 5000);   
                                          }
                                          else
                                          {
                                              $('.GetStudentScoreSheet .ClassSelect option:last-child').remove();
                                              $('.GetStudentScoreSheet .SubClassSelect option:last-child').remove();
                                              $('.GetStudentScoreSheet .YearSelect option:last-child').remove();
                                             // $(".ReportStudentClass").html(" ");
                                             // $(".ClassSelect").val(response[0].thisterm_belong.classname);
                                              $(".TellStudentClass").html(" ");
                                             $(".ReportStudentClass").html("<b> This student does not have any class</b>");
                                             $('.HighlitStudentClass').effect("highlight", {}, 5000);   
                                          }
                                         
                                        //  window.location.reload();                                            
                                        },
                              error: function(xhr, textStatus, errorThrown) 
                                        {
                                          // alert('Bad response. Please reload the page. if this message continue, please contact the Head of the school. Thank you.');
                                          console.log(xhr);
                                          console.log(textStatus);
                                        //  console.log(errorThrown);
                                        // window.location.reload();
                                        }
                          });//end ajax
                }
            catch(e) 
                {
                    // statements to handle any exceptions
                    console.log(e); // pass exception object to error handler
                }                            
           
        });//end anon function        
    $('.TellStudentClass').on("click", ".PickClass", function (e) 
        { 
            e.preventDefault();
           // $(".ReportStudentClass").html(" ");
            //console.log(JSON.parse( $(this).val() ) );
            var ThisRadioClassYear = JSON.parse( $(this).val() );
           
            var ActionUrl  =  $(".ClassYearURL").val(); 
            $(document).on({
              // ajaxStart: function() {  $(".ReportStudentClass").addClass("AjaxRotator");    },
             //  ajaxStop: function() { $(".ReportStudentClass ").removeClass("AjaxRotator"); },
               //ajaxComplete:function() { $(".ReportStudentClass").removeClass("AjaxRotator"); },
            });                                                                    
            //console.log(ActionUrl);     
            try {
                       $.ajax({
                              type: 'POST',
                              url:  ActionUrl,
                              dataType: 'json',
                              data: {},                                           
                              success: function(response, textStatus)
                                        { //console.log(response);
                                          
                                              $('.GetStudentScoreSheet .ClassSelect option:last-child').remove();
                                              $('.GetStudentScoreSheet .SubClassSelect option:last-child').remove();
                                              $('.GetStudentScoreSheet .YearSelect option:last-child').remove();
                                              //$(".ReportStudentClass").html(" ");
                                             // $(".ClassSelect").val(response[0].thisterm_belong.classname);                                                           
                                              $('.GetStudentScoreSheet .ClassSelect').append($('<option/>', { 
                                                                        value: ThisRadioClassYear.thisterm_belong.classname,
                                                                        text : ThisRadioClassYear.thisterm_belong.classname,
                                                                        selected : true 
                                                                    }));
                                               $('.GetStudentScoreSheet .SubClassSelect').append($('<option/>', { 
                                                                        value: ThisRadioClassYear.class_subdivision,
                                                                        text : ThisRadioClassYear.class_subdivision.toUpperCase(),
                                                                        selected : true 
                                                                    }));
                                                $('.GetStudentScoreSheet .YearSelect').append($('<option/>', { 
                                                                        value: ThisRadioClassYear.thisterm_belong.year,
                                                                        text : ThisRadioClassYear.thisterm_belong.year,
                                                                        selected : true 
                                                                    }));      
                                          
                                           // ChooseTermBox 
                                                //$div2blink.toggleClass("backgroundRed"); $( "#toggle" ).toggle( "highlight" );
                                                $('.GetStudentScoreSheet .ClassSelect').effect("highlight", {}, 5000);
                                                $('.GetStudentScoreSheet .SubClassSelect').effect("highlight", {}, 5000);
                                                $('.GetStudentScoreSheet .YearSelect').effect("highlight", {}, 5000);   
                                                
                                              
                                                                    
                                        },
                              error: function(xhr, textStatus, errorThrown) 
                                        {
                                          // alert('Bad response. Please reload the page. if this message continue, please contact the Head of the school. Thank you.');
                                          console.log(xhr);
                                          console.log(textStatus);
                                        //  console.log(errorThrown);
                                        // window.location.reload();
                                        }
                          });//end ajax
                }
            catch(e) 
                {
                    // statements to handle any exceptions
                    console.log(e); // pass exception object to error handler
                }              
        });//end anon function              
</script>

@stop