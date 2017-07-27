@extends('layouts.main')

@section('division_container')
      <h3> Student Score Sheet Page </h3> 
      @if(is_array($ThisStudent) and  is_array($RequestedDetails))
      <div class="ScoreInputUpdate">
          
           <span class="ReportStudentClass"></span>
         <!-- <p class="ScoreInputThirdUpdate"> 
            <b> Signatures</b> can be attached to each individual scores. Simply click on the signature box and drag a signature 
            to the <b> "Teacher signature"</b> space.Then click "Save All".
          </p>
           <p class="ScoreInputSecondUpdate"> The <b>"Save"</b> button has being removed, Please use the <b> "Save All"</b>
           button for saving and editting scores and signatures instead.
          </p>
          <p class="ScoreInputThirdUpdate"> 
              Processing of <b> Signatures </b> into the database is in progress. Click here <b>
               <a href="{{URL::action('signauture-list')}}" > to see list of processed signatures</a></b>
          </p>
          <p class="ScoreInputFourthUpdate"> <b> Class Teacher</b> and <b> Principal Comments</b> can now be included to the
           report sheet of the student. Scroll down below the <b> "Student Score Table"</b> and type your comments, 
           attach signature and choose dates.
          </p> -->
          </div>
          <div class="ScoreStudentInfo"> 
           <p>         
              Student Name: <b> {{$ThisStudent['user_belong']['surname']. " ". $ThisStudent['user_belong']['firstname']
              . " ". $ThisStudent['user_belong']['middlename'] }} </b>
            </p>
            <p>
              Admission Number:  <b class="StudentAddNum"> {{$ThisStudent['school_admission_number'] }} </b>
               <input type="hidden" name="" value="{{$ThisStudent['studentid']}}" class="ScoreStudentId" />
            </p>
            <p>
               Year: {{$RequestedDetails['Year']}}
               <input type="hidden" name="" value="{{$RequestedDetails['Year']}}" class="ScoreYear" />
            </p>
            <p>
              Class: {{$RequestedDetails['Class'] ." ". strtoupper($RequestedDetails['SubClass'])}}
              <input type="hidden" name="" value="{{$RequestedDetails['Class']}}" class="ScoreClass" />
              <input type="hidden" name="" value="{{strtoupper($RequestedDetails['SubClass'])}}" class="ScoreSubClass" />
              </p>
            <p>

              Term: {{$RequestedDetails['Term']}}
              <input type="hidden" name="" value="{{$RequestedDetails['Term']}}" class="ScoreTerm" />
              </p>
           
          </div>

          {{ Form::open(array( 'route' => 'save-student-attendance' ,'files' => true, 'method'=> 'post', 
                               'class'=>'AjaxScoreAttendance')) }}
              <p class="ScoreAbsenceTableInfo"> Click on the space with light red background and type the number of days</p>
              <table border= 1  class="ScoreAbsenceTable table table-responsive" >
                <tr>
                  <td colspan="3" bgcolor="grey" style="padding:0; margin:0;">
                         <p style="text-align:center;color:white;"> <b> ATTENDANCE </b> 
                         </p>
                  </td>
                </tr>

                <tr>

                  <td style="text-align:center;"> No. of <br /> Days School Opened</td>
                  <td style="text-align:center;"> No. of <br /> Days  Present</td>
                  <td style="text-align:center;"> No. of <br /> Days Absent </td>
                </tr>
                <tr>
                  <td>
                       <input type="text" name="SchoolOpen" value= "{{( isset($Attendance) and is_array($Attendance) and 
                              ($Attendance['dayspresent'] !== 500) )?$Attendance['schoolopen']:'' }}" class="SchoolOpen"  /> 
                  </td>
                  <td>
                       <input type="text" name="DaysPresent" value= "{{( isset($Attendance) and is_array($Attendance) and 
                              ($Attendance['dayspresent'] !== 500) )? $Attendance['dayspresent']:'' }}" class="DaysPresent"  /> 
                  </td>
                   <td>
                       <input type="text" name="DaysAbent" value= "{{(isset($Attendance) and  is_array($Attendance) and 
                              ($Attendance['dayspresent'] !== 500) )? $Attendance['daysabent']:'' }}" class="DaysAbent"  /> 
                  </td>
                </tr>    
              </table>
              <button  type="submit" class="SaveAttendanceButton" > Save Attendance Record </button>  
              {{Form::token()}}   
          {{Form::close()}}
          {{ Form::open(array( 'route' => 'save-student-termduration' ,'files' => true, 'method'=> 'post', 
                          'class'=>'AjaxScoreTermDuration')) }}
              <p class="ScoreTermDurationTableInfo"> Click the space with light red background and choose date required</p>
              <table border= 1 class="table ScoreTermDurationTable table-responsive" >
                  <tr>
                    <td colspan="3" bgcolor="grey" style="padding:0; margin:0;">
                          <p style="text-align:center;color:white;">
                            <b> TERMINAL DURATION (..................) WEEKS </b> 
                          </p> 
                    </td>
                  </tr>

                  <tr>
                      <td style="text-align:center;"> Term Begins</td>
                      <td style="text-align:center;"> Term Ends</td>
                      <td style="text-align:center;"> Next Term Begins</td>
                  </tr>
                  <tr>
                        <td>
                          <input type="text" name="TermBegins" value= "{{ ( isset($TermDuration) and 
                                 is_array($TermDuration) and !empty($TermDuration['termbegins']) )?  
                                 date('d/m/Y', strtotime($TermDuration['termbegins'])):'' }}" class="TermBegins"  /> 
                        </td>
                        <td>
                          <input type="text" name="TermEnd" value= "{{ ( isset($TermDuration) and 
                                 is_array($TermDuration) and !empty($TermDuration['termend']) )?  
                                 date('d/m/Y', strtotime($TermDuration['termend'])):'' }}" class="TermEnd"  /> 
                        </td>
                        <td>
                          <input type="text" name="NextTermBegins" value= "{{ ( isset($TermDuration) and 
                                 is_array($TermDuration) and !empty($TermDuration['nexttermbegins']) )?  
                                 date('d/m/Y', strtotime($TermDuration['nexttermbegins'])):'' }}" class="NextTermBegins" /> 
                        </td>           
                  </tr>    
              </table>
              <button  type="submit" class="SaveTermDurationButton" > Save Term Duration Record </button>  
              {{Form::token()}}   
          {{Form::close()}}
  
        <hr />
        {{ Form::open(array( 'route' => 'save-this-student-score' ,'files' => true, 'method'=> 'post', 
        'class'=>'AjaxScoreForm')) }}
            <!--<button  type="submit" class="SaveAllScoreButton" > Save All </button>  
            <button  type="submit" class="SaveAllScoreButton" id="SaveAllScoreButtonSecond" > Save All </button>   -->
           <!-- <md-toolbar class="md-primary">
    <h2 class="md-toolbar-tools">
      <span>Price Negotiation</span>
      </h2>
      </md-toolbar> -->
            <div class="ReportScoreInput"> </div>
            <!-- <div class="lock-size" layout="row" layout-align="right right">
                <md-fab-speed-dial md-open="true" md-direction="right"
                                   ng-class="md-fling">
                  <md-fab-trigger>
                    <md-button aria-label="menu" class="md-fab md-warn">
                     <md-icon >  Save All Scores</md-icon>
                    </md-button>
                  </md-fab-trigger>

                  <md-fab-actions>
                    <md-button aria-label="Twitter" class="md-fab md-raised md-mini">
                      <md-icon>  Save All Scores</md-icon>
                    </md-button>                   
                  </md-fab-actions>
                </md-fab-speed-dial>
              </div> -->
          <div class="ScoreInputTable">
             <table border= 1  class="AcademicTable table table-responsive" >
               <col width="30%" > 
               <tr>
                   <td colspan="9" bgcolor="grey">
                   <p style="text-align:center; height:18px;color:white;">
                   <b> Student Score Table </b> </p> </td>
                </tr>
                <tr class="">
                  <th class=""> Subjects </th>
                  <th>Continouns<br /> Assesment (40%)</th>
                  <th>Examination<br/> Score (60%)</th>    
                  <th> Delete Score </th>     
                  <th>Weight Average (100%)</th>
                  <th>Grade </th>
                  <th>Teacher Comment </th>
                  <th>Teacher Signature </th>                 
                 
                 </tr>
                      @foreach( $AllSubjects as $allsubjects)
                           <tr class="">
                               <td class="EveryFirstColumn"> 
                                  <b>{{$allsubjects['subject']}}</b> 
                                  <input type="hidden" class="SubjectIdSave" name="SubjectId" 
                                    value= "{{$allsubjects['subjectid']}}" />
                               </td>
                               <td>
                                    <?php $ContAssessValue= ''; ?>
                                    @foreach($SubjectScore as $subjectscore)  
                                      <?php if($subjectscore['subjectid'] === $allsubjects['subjectid'])
                                      { $ContAssessValue =  $subjectscore['cont_assess_40'];} else{ echo'';} ?>
                                    @endforeach                               
                                    <input type="text" name="CAScore" value= "{{$ContAssessValue}}"/> 
                                </td>
                               <td>  
                                    <?php $ExamValue= ''; ?>
                                     @foreach($SubjectScore as $subjectscore)
                                        <?php if($subjectscore['subjectid'] === $allsubjects['subjectid'])
                                        { $ExamValue =  $subjectscore['exam_score_60'];} else{ echo'';} ?> 
                                     @endforeach
                                    <input type="text" name="ExamScore" value= "{{$ExamValue}}" />
                               </td>
                               <td> 
                                    <button  type="submit" class="DeleteScoreButton" > Delete </button> 
                                    <input   type="hidden" name="SubjectId" value= "{{$allsubjects['subjectid']}}" />
                                    <input   type="hidden" name="DeleteUrl" 
                                             value= "{{URL::route('delete-this-student-score')}}" />
                              </td>
                               <td class="ScoreInputTermWeight">
                                  <?php $TermWeight= ''; ?>
                                       @foreach($SubjectScore as $subjectscore)
                                        <?php if($subjectscore['subjectid'] === $allsubjects['subjectid'])
                                        { echo $TermWeight = (int)$subjectscore['cont_assess_40'] 
                                                          + (int)$subjectscore['exam_score_60'];
                                        }
                                        else{ echo ''; } ?> 
                                     @endforeach
                              </td>

                                 <td>
                                      @foreach($SubjectScore as $subjectscore)
                                          <?php if($subjectscore['subjectid'] === $allsubjects['subjectid'])
                                        { //echo $TermWeight;
                                           echo is_array(GradeController::getGrade((int)$TermWeight))
                                             ?GradeController::getGrade((int)$TermWeight)['Grade']:'';
                                           }
                                            else{ echo '';} ?> 
                                       @endforeach
                                  </td>

                              <td class="EveryGradeCommentColumn">
                                    @foreach($SubjectScore as $subjectscore)
                                    <?php if($subjectscore['subjectid'] === $allsubjects['subjectid'])
                                      {echo is_array(GradeController::getGrade((int)$TermWeight))
                                             ?GradeController::getGrade((int)$TermWeight)['Comment']:'';
                                      }                 // Grades::find($subjectscore['gradeid'])->toArray()['grade'] ;}
                                        else{ echo'';} ?> 
                                      @endforeach
                                </td>
                              
                              <td class='TeacherSignature'>
                              @foreach($SubjectScore as $subjectscore)  
                                    <?php if($subjectscore['subjectid'] === $allsubjects['subjectid'])
                                      { 
                                         if($subjectscore['teachersignatureid'] === 34)
                                          {
                                              echo "<a class='TeacherSignatureDefault'>add signature</a>";
                                          }
                                          else
                                          {
                                             $SignatureRecord = OfficialSignatures::with('UserBelong')
                                                               ->find($subjectscore['teachersignatureid']);
                                             //var_dump($SignatureRecord); //die();      
                                            $SignatureOwner = !is_null($SignatureRecord)?
                                            $SignatureRecord->toArray()['user_belong']['surname']." ".
                                            $SignatureRecord->toArray()['user_belong']['firstname']." ".
                                            $SignatureRecord->toArray()['user_belong']['middlename']
                                            :'Name Unavailable';

                                            echo   !is_null($SignatureRecord)?
                                            HTML::image("/Images/Signatures/".
                                            $SignatureRecord->toArray()['signatureimage'], 
                                            $SignatureRecord->toArray()['officialsignatureid'], array('class' => '',
                                              'title' =>  $SignatureOwner,
                                             )):
                                            'Error! Cannot find signature';
                                          }
                                      }
                                  ?>  
                              @endforeach                                   
                              </td>
                            <!-- <td> <button  type="submit" class="AjaxButton" > Add score </button> </td>-->
                             
                           </tr>
                      @endforeach
               </table>               
          </div>   
           <button  type="submit" class="btn-lg " id="SaveAllScoreButtonDown" > Save All </button>  
             
          
           <input type="hidden" name="SaveAllUrl" value= "{{URL::route('save-all-this-student-score')}}"
            class="SaveAllUrl" />  
          {{Form::token()}}   
          {{Form::close()}}   

          {{ Form::open(array( 'route' => 'save-official-comments' ,'files' => true, 'method'=> 'post', 
             'class'=>'OfficialCommentsForm')) }}
               <div class="OfficialCommentBlock">              
                   <div> 
                      <p> <b> Class Teacher's Comment:</b> </p>
                       <textarea  name="ClassTeacherComment" class="ClassTeacherComment">{{ ( is_array($OfficialComments) 
                                and !empty($OfficialComments['classteacher']) )? $OfficialComments['classteacher']:'' }}</textarea>
                    </div>
                    <div>
                       <p> <b>Class Teacher's Signature:</b>  </p>
                        <p class="TeacherSignature" id="ClassTeacherSignature"> 
                            @if(isset($OfficialComments) and is_array($OfficialComments)  )  
                               <?php if($OfficialComments['classteachersignatureid'] === 34)
                                      {
                                          echo "<a class='TeacherSignatureDefault'>add signature</a>";
                                      }
                                    else
                                      {
                                          $SignatureRecord = OfficialSignatures::with('UserBelong')
                                                             ->find($OfficialComments['classteachersignatureid']);
                                          $SignatureOwner = !is_null($SignatureRecord)?
                                          $SignatureRecord->toArray()['user_belong']['surname']." ".
                                          $SignatureRecord->toArray()['user_belong']['firstname']." ".
                                          $SignatureRecord->toArray()['user_belong']['middlename']
                                          :'Name Unavailable';
                                          echo !is_null($SignatureRecord)?
                                          HTML::image("/Images/Signatures/".
                                          $SignatureRecord->toArray()['signatureimage'], 
                                          $SignatureRecord->toArray()['officialsignatureid'], array('class' => '',
                                          'title' =>  $SignatureOwner)):
                                          'Error! Cannot find signature';
                                      }
                              ?>
                            @else
                              &nbsp;
                            @endif
                        </p> 
                    </div>
                    <div>
                        <p> <b>Date for Class Teacher:</b></p>
                        <p> <b> <input type="text" name="ClassTeacherDate" class="ClassTeacherDate"
                              value="{{ ( is_array($OfficialComments) and !empty($OfficialComments['classteacherdate']) )? 
                              date('d/m/Y', strtotime($OfficialComments['classteacherdate'])):'' }}"  /> </b>
                        </p>
                    </div>
                    <br />
                    <hr />
                    <div> 
                      <p> <b>Principal's Comment:</b></p>
                      <textarea name="PrincipalCommentText" class="PrincipalCommentText">{{ ( is_array($OfficialComments) 
                         and !empty($OfficialComments['principal']) )? $OfficialComments['principal']:'' }}</textarea>
                    </div>
                    <div>
                      <p><b> Principal's Signature:</b></p>
                      <p class="TeacherSignature" id="PrincipalSignature"> 
                        @if(isset($OfficialComments) and is_array($OfficialComments)  )  
                          <?php if($OfficialComments['principalsignatureid'] === 34)
                                  {
                                    echo "<a class='TeacherSignatureDefault'>add signature</a>";
                                  }
                              else
                                  {
                                    $SignatureRecord = OfficialSignatures::with('UserBelong')
                                                       ->find($OfficialComments['principalsignatureid']);
                                    $SignatureOwner = !is_null($SignatureRecord)?
                                    $SignatureRecord->toArray()['user_belong']['surname']." ".
                                    $SignatureRecord->toArray()['user_belong']['firstname']." ".
                                    $SignatureRecord->toArray()['user_belong']['middlename']
                                    :'Name Unavailable';
                                    echo !is_null($SignatureRecord)?
                                        HTML::image("/Images/Signatures/".
                                        $SignatureRecord->toArray()['signatureimage'], 
                                        $SignatureRecord->toArray()['officialsignatureid'], array('class' => '',
                                        'title' =>  $SignatureOwner
                                             )):
                                        'Error! Cannot find signature';
                                  } 
                          ?>
                        @else
                         &nbsp;
                        @endif
                      </p>
                    </div>
                    <div> 
                        <p><b> Date for  Principal:</b></p>
                        <p> <b> <input type="text" name="PrincipalDate" class="PrincipalDate" 
                                 value="{{ ( is_array($OfficialComments) and !empty($OfficialComments['principaldate']) )? 
                                 date('d/m/Y', strtotime($OfficialComments['principaldate'])):'' }}" /> </b>
                        </p>
                    </div>
                    <br /><hr />
                  <div> 
                  <p><b> Parent's Signature:</b> </p>
                  <p  class="TeacherSignature"  id="ParentSignature">
                    @if(isset($OfficialComments) and is_array($OfficialComments)  )  
                      <?php if($OfficialComments['parentsignatureid'] === 34)
                             {
                                echo "<a class='TeacherSignatureDefault'>add signature</a>";
                             }
                            else
                             {
                                $SignatureRecord = OfficialSignatures::with('UserBelong')
                                                               ->find($OfficialComments['parentsignatureid']); 
                                $SignatureOwner = !is_null($SignatureRecord)?
                                $SignatureRecord->toArray()['user_belong']['surname'].
                                $SignatureRecord->toArray()['user_belong']['firstname'].
                                $SignatureRecord->toArray()['user_belong']['middlename']
                                  :'Name Unavailable';
                                echo !is_null($SignatureRecord)?
                                      HTML::image("/Images/Signatures/".
                                      $SignatureRecord->toArray()['signatureimage'], 
                                      $SignatureRecord->toArray()['officialsignatureid'], array('class' => '',
                                      'title' =>  $SignatureOwner)):
                                      'Error! Cannot find signature';
                              } 
                      ?>
                    @else
                      &nbsp;
                    @endif
                  </p> 
                  </div>
                  <div>
                      <p><b>Date for  Parent:</b></p>
                      <p> <b> <input type="text" name="ParentDate" class="ParentDate" 
                        value="{{ ( is_array($OfficialComments) and !empty($OfficialComments['parentdate']) )?  
                        date('d/m/Y', strtotime($OfficialComments['parentdate'])):'' }}"/> </b>
                      </p>
                  </div>
                  <div> 
                      <p> <b> School Stamp</b>: </p>
                      <p class="TeacherSignature">
                       @if(isset($OfficialComments) and is_array($OfficialComments)  )  
                        <?php if($OfficialComments['classteachersignatureid'] === 34)
                              {
                                echo "<a class='TeacherSignatureDefault'>add signature</a>";
                              }
                            else
                              {
                                  $SignatureRecord = OfficialSignatures::with('UserBelong')
                                                      ->find(64);
                                  $SignatureOwner = !is_null($SignatureRecord)?
                                  $SignatureRecord->toArray()['user_belong']['surname'].
                                  $SignatureRecord->toArray()['user_belong']['firstname'].
                                  $SignatureRecord->toArray()['user_belong']['middlename']
                                  :'Name Unavailable';
                                  echo !is_null($SignatureRecord)?
                                        HTML::image("/Images/Signatures/".
                                        $SignatureRecord->toArray()['signatureimage'], 
                                        $SignatureRecord->toArray()['officialsignatureid'], array('class' => '',
                                        'title' =>  $SignatureOwner)):
                                        'Error! Cannot find signature';
                              } 
                        ?>
                    @else
                      &nbsp;
                    @endif
                    </p> 
               </div>
        </div>  
    {{Form::token()}}  

    <button  type="submit" class="SaveOfficialComments" > Save All Comments and Signature </button>  

    
      @endif
    {{Form::close()}}

     <div class="SignaturesPool" class="w3-text-black" title="Hello World!">
                  <p  class="CloseSignaturePanel"> X Close this panel </p>
                  @if(isset($OfficialSignatures) and is_array($OfficialSignatures))
                       <b> Search for anybody on this table: </b> <input type="text" id="search" class="w3-text-black" placeholder="Search this table" /> <br /><br />
                      <table border = "1" class="ChangeRolesTable w3-table w3-bordered w3-striped w3-border">
                        <tr class="w3-grey w3-text-black"> 
                          <th> S/N </th>
                          <th> Name and Signature </th>
                        </tr>
                        <?php $Count = 1; ?>
                      @foreach($OfficialSignatures as $officialSignatures) 
                      <tr class="w3-text-blue">
                          <td> {{$Count++}} </td>
                          <td>
                              <div class="">
                                {{  HTML::image("/Images/Signatures/".$officialSignatures['signatureimage'], 
                                    $officialSignatures['officialsignatureid'], 
                                    array('class' => '')) }}<br />
                             <span class="">  Owner of Signature => {{ $officialSignatures['user_belong']['surname'] . " ".
                                   $officialSignatures['user_belong']['firstname'] . " ".
                                   $officialSignatures['user_belong']['middlename'] }}</span>
                                </div>
                            </td>
                        </tr>
                      @endforeach 
                      </table>
                  @endif
                   <p  class="CloseSignaturePanel"> X Close This Panel </p>
     </div> 
@stop