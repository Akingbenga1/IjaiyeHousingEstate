
            <div class="PageHeading">
                 {{HTML::image("/Images/Logos/LagosSeal.jpg", 'Lagos State Logo', array('class' => 'LagosLogo') )}} 
                 <div class="SealStatement"> 
                    <p class="SaluteLagos"> LAGOS STATE MINISTRY OF EDUCATION </p>
                   <p class="SaluteDossier">CONTINUOUS ASSESMENT REPORT
                         FOR SENIOR SECONDARY SCHOOLS<br />
                        <b> IJAIYE HOUSING ESTATE SENIOR GRAMMAR SCHOOL , ALAKASHI</b>
                    </p> 
                 
                 <!-- <div class="ThisTermName">
                     <strong>
                            {{ $SubjectScore[0]['classname']." ".strtoupper($SubjectScore[0]['termname'])
                                . " " .$SubjectScore[0]['year']."/2016"
                            }} 
                    </strong>
                   </div> -->
                 </div>
                {{HTML::image("/Images/Logos/IjayeSchool.jpg", 'Ijaye Senior Grammar School Logo',
                  array('class' => 'IjayeLogo img-responsive',)  )}} 
            </div>
            <!--<div class="row TopTableCluster">
                <div class="col-md-6">
                    <table  class="StudentDataTable  table table-bordered table-responsive" >
                       <!-- <col width="180" >
                        <col width="100">
                        <col width="150">
                        <col width="100"> 
                         <tr>
                             <td colspan="4" bgcolor="grey" >
                             <p style="text-align:center; color:white;">
                             <b> STUDENT'S PERSONAL DATA </b> </p> </td>
                        </tr>

                        <tr>
                             <td > Name </td>
                             <td colspan="3"> 
                                            {{is_array($ThisStudent['user_belong'])?
                                                $ThisStudent['user_belong']['surname'] . " ".  
                                                $ThisStudent['user_belong']['middlename']. " ".
                                                $ThisStudent['user_belong']['firstname']: ''
                                            }}
                            </td>
                        </tr>

                        <tr>
                             <td> SPIN </td>
                             <td colspan="3">
                            </td> 
                        </tr>

                         <tr>
                         <td> Student Admission No.</td>
                         <td colspan="3">
                                {{isset($ThisStudent['school_admission_number'])?
                                        $ThisStudent['school_admission_number']: ''
                                }}
                        </td> 
                          </tr>

                        <tr>
                             <td> Date of Birth  Name</td>
                             <td colspan="3">
                                     {{is_array($ThisStudent['user_belong'])?
                                                $ThisStudent['user_belong']['date_of_birth'] : ''
                                     }}
                             </td>
                        </tr>

                        <tr>
                             <td> Sex</td>
                             <td colspan="3">
                                        {{is_array($ThisStudent['user_belong'])?
                                                $ThisStudent['user_belong']['sex'] : ''
                                        }}
                             </td>

                            
                        </tr>

                        <tr>
                             <td> School</td>
                             <td colspan="3"> I . H. E. S. G. S </td>
                             
                             
                        </tr>

                        <tr>
                             <td> Class</td>
                             <td>
                              {{is_array($SubjectScore)?
                                                $SubjectScore[0]['classname']." ". strtoupper($SubjectScore[0]['class_subdivision']) : ''
                                        }}
                             </td>
                             <td bgcolor="grey" > <font color=white> School Code </font> </td>
                             <td bgcolor="grey" ><font color=white> 807 </font> </td>
                        </tr>

                        <tr>
                             <td> Ed. District</td>
                             <td>01</td>
                             <td bgcolor="grey"> <font color=white> ED. ZONE </font> </td>
                             <td bgcolor="grey"><font color=white> 03</font></td>
                        </tr>            
                    </table>
                </div>

                <div class="TopTables col-md-6"> 
                        <table border= 1  class="AbsenceDataTable table-responsive table table-bordered w3-table w3-bordered w3-striped w3-border" >
                        <!-- <col width="175" >
                         <col width="175">
                         <col width="175"> 
                                 <tr>
                                     <td colspan="3" bgcolor="grey" style="padding:0; margin:0;">
                                     <p style="text-align:center;color:white;">
                                     <b> ATTENDANCE </b> </p> </td>
                                </tr>

                            <tr>
                                <td style="text-align:center;"> No. of <br /> Days School Opened</td>
                                <td style="text-align:center;"> No. of <br /> Days  Present</td>
                                <td style="text-align:center;"> No. of <br /> Days Absent </td>
                            </tr>

                                <tr>
                                     <td><b> {{( isset($Attendance) and is_array($Attendance) and 
                                                      ($Attendance['dayspresent'] !== 500) )?$Attendance['schoolopen']:'' }} </b></td>
                                     <td><b>{{( isset($Attendance) and is_array($Attendance) and 
                                                      ($Attendance['dayspresent'] !== 500) )? $Attendance['dayspresent']:'' }}</b></td>
                                     <td><b> {{(isset($Attendance) and  is_array($Attendance) and 
                                                      ($Attendance['dayspresent'] !== 500) )? $Attendance['daysabent']:'' }}</b></td>
                                </tr>    
                        </table>
                        <table border= 1 class="TermDurationTable  table table-responsive table-bordered w3-table w3-bordered w3-striped w3-border" >
                         <!-- <col width="175" >
                         <col width="175">
                         <col width="175">  
                             <tr>
                                     <td colspan="3" bgcolor="grey" style="padding:0; margin:0;">
                                     <p style="text-align:center;color:white;">
                                     <b> TERMINAL DURATION (..................) WEEKS </b> </p> </td>
                                </tr>

                            <tr>
                                <td style="text-align:center;"> Term Begins</td>
                                <td style="text-align:center;"> Term Ends</td>
                                <td style="text-align:center;"> Next Term</td>
                            </tr>

                                <tr>
                                     <td><b>{{ ( isset($TermDuration) and 
                                                         is_array($TermDuration) and !empty($TermDuration['termbegins']) )?  
                                                         date('d/m/Y', strtotime($TermDuration['termbegins'])):'' }}</b> </td>
                                      <td><b> {{ ( isset($TermDuration) and 
                                                         is_array($TermDuration) and !empty($TermDuration['termend']) )?  
                                                         date('d/m/Y', strtotime($TermDuration['termend'])):'' }}</b> </td>
                                     <td><b>{{ ( isset($TermDuration) and 
                                                         is_array($TermDuration) and !empty($TermDuration['nexttermbegins']) )?  
                                                         date('d/m/Y', strtotime($TermDuration['nexttermbegins'])):'' }}</b> </td>
                                </tr>    
                        </table>
                </div>
            </div> -->
            <br />
        <table class="table AcademcPerfTable">
            <tr>
             <td colspan="11!important" bgcolor="grey">
             <p style="text-align:center!important; height:18px!important;color:white!important;">
             <b> ACADEMIC PERFORMANCE </b> </p> </td>
            </tr>
        </table>
        <table border= 1  class="AcademicTable  table table-bordered table-striped table-responsive w3-table w3-bordered w3-striped w3-border w3-hoverable" >
        <col width="30%" > 
           
            <tr class="AcademicHeading">
            <th class="SubjectsStyle EveryFirstColumn"> Subjects </th>
            <th>Cont.<br />Assess.<br/> (40%)</th>
            <th>Exam Score (60%)</th>
            @if($RequestedTerm === 'second term')
            
                <th>2nd term scores (100%)</th>
                <th>1st term scores (100%)</th>
                <th>Cumm.<br />scores (200%)</th>
                <th>Weight Average (100%)</th>
            
            @elseif($RequestedTerm === 'third term')
            
                <th>3rd term scores (100%)</th>
                <th>2nd term scores (100%)</th>
                <th>1st term scores (100%)</th>
                <th>Cummu.<br /> scores (300%)</th>
                <th>Weight Average (100%)</th>
            
            @else
            
                <th>Weight Average (100%)</th>
            
            @endif
            <th>Grade </th>
            <th>Teacher Comment </th>
            <th>Teacher Sign </th>
          </tr>
            <?php $AllSubjects = Subjects::all()->toArray();   ?> 
            @foreach( $AllSubjects as $allsubjects)
              <tr class="AcademicCells">
                  <td class="EveryFirstColumn"> <b>{{$allsubjects['subject']}}</b> </td>

                 <td>  @foreach($SubjectScore as $subjectscore)  
                        <?php if($subjectscore['subjectid'] === $allsubjects['subjectid'])
                        { echo $subjectscore['cont_assess_40'];}
                              else{ echo'';} ?>  @endforeach</td>

                 <td>  @foreach($SubjectScore as $subjectscore)
                        <?php if($subjectscore['subjectid'] === $allsubjects['subjectid'])
                        { echo $subjectscore['exam_score_60'];}
                             else{ echo'';} ?> @endforeach</td>

                 @if($RequestedTerm === 'second term')
            
                 <td>@foreach($SubjectScore as $subjectscore)
                             <?php  if($subjectscore['subjectid'] === $allsubjects['subjectid'])
                            { echo (int)$weight = (int)$subjectscore['cont_assess_40'] + (int)$subjectscore['exam_score_60'];}
                             else{ echo '';} ?> 
                      @endforeach</td>


                <td>@foreach($FirstTermSubjectScore as $firsttermsubjectscore)
                             <?php if($firsttermsubjectscore['subjectid'] === $allsubjects['subjectid'])
                            { 
                                            echo $firsttermweight = (int)$firsttermsubjectscore['cont_assess_40'] 
                                            + (int)$firsttermsubjectscore['exam_score_60'];
                                   
                                
                            }
                             else{ echo'';} ?> 
                      @endforeach</td>

                 <td> 
                  @foreach($FirstTermSubjectScore as $firsttermsubjectscore)
                             <?php  if($firsttermsubjectscore['subjectid'] === $allsubjects['subjectid'])
                            { 
                                 foreach ($SubjectScore as  $subjectscore) 
                                    { 
                                        if($subjectscore['subjectid'] === $allsubjects['subjectid'])
                                        {
                                           echo  $cummulative = (int)$subjectscore['cont_assess_40'] 
                                           + (int)$subjectscore['exam_score_60']
                                            + (int)$firsttermsubjectscore['cont_assess_40'] 
                                            + (int)$firsttermsubjectscore['exam_score_60'];
                                        }
                                   }
                                }
                             else{ echo'';} ?> 
                      @endforeach </td> 


                <td> @foreach($FirstTermSubjectScore as $firsttermsubjectscore)
                             <?php if($firsttermsubjectscore['subjectid'] === $allsubjects['subjectid'])
                            {
                                 foreach ($SubjectScore as  $subjectscore) 
                                    {
                                        if($subjectscore['subjectid'] === $allsubjects['subjectid'])
                                        { $TermWeight = '';
                                         echo  (int)$TermWeight = (int)ceil ( (   (   (int)$subjectscore['cont_assess_40'] 
                                           + (int)$subjectscore['exam_score_60']
                                            + (int)$firsttermsubjectscore['cont_assess_40'] 
                                            + (int)$firsttermsubjectscore['exam_score_60'])  / 2 ));
                                        }
                                     }
                                        }
                             else{ echo'';} ?> 
                      @endforeach 
                </td>
              <td>@foreach($FirstTermSubjectScore as $firsttermsubjectscore)
                     <?php if($firsttermsubjectscore['subjectid'] === $allsubjects['subjectid'])
                            { //echo $TermWeight;
                                foreach ($SubjectScore as  $subjectscore) 
                                        {
                                            if($subjectscore['subjectid'] === $allsubjects['subjectid'])
                                                {
                                                    echo is_array(GradeController::getGrade((int)$TermWeight))
                                                    ?GradeController::getGrade((int)$TermWeight)['Grade']:'';
                                                 }       
                                        }   
                                }       
                             else{ echo '';} ?>
                      @endforeach</td> 

                       <td>@foreach($FirstTermSubjectScore as $firsttermsubjectscore)
                        <?php if($firsttermsubjectscore['subjectid'] === $allsubjects['subjectid'])
                                {
                                     foreach ($SubjectScore as  $subjectscore) 
                                        {
                                            if($subjectscore['subjectid'] === $allsubjects['subjectid'])
                                                {
                                                     echo is_array(GradeController::getGrade((int)$TermWeight))
                                                        ?GradeController::getGrade((int)$TermWeight)['Comment']:'';
                                                }       
                                        }   
                                }       // Grades::find($subjectscore['gradeid'])->toArray()['grade'] ;}
                             
                             else{ echo'';} 
                        ?> 
                    @endforeach</td> 
            
            @elseif($RequestedTerm === 'third term')
            
                <td>@foreach($SubjectScore as $subjectscore)
                             <?php if($subjectscore['subjectid'] === $allsubjects['subjectid'])
                            { echo $ThirdTermWeight = (int)$subjectscore['cont_assess_40'] +
                                                     (int)$subjectscore['exam_score_60'];}
                             else{ echo'';} ?> 
                      @endforeach</td> 
                <td>@foreach($SecondTermSubjectScore as $subjectscore)
                             <?php if($subjectscore['subjectid'] === $allsubjects['subjectid'])
                            { echo $SecondTermWeight = (int)$subjectscore['cont_assess_40'] +
                                                       (int)$subjectscore['exam_score_60'];}
                             else{ echo'';} ?> 
                      @endforeach</td>
                <td>@foreach($FirstTermSubjectScore as $subjectscore)
                             <?php if($subjectscore['subjectid'] === $allsubjects['subjectid'])
                            { echo $FirstTermWeight = (int)$subjectscore['cont_assess_40'] +
                                                      (int)$subjectscore['exam_score_60'];}
                             else{ echo'';} ?> 
                      @endforeach</td> 
                <td>@foreach($FirstTermSubjectScore as $firsttermsubjectscore)
                        <?php if($firsttermsubjectscore['subjectid'] === $allsubjects['subjectid'])
                                     {
                                        foreach ($SecondTermSubjectScore as  $secondtermsubjectscore) 
                                            {
                                                if($secondtermsubjectscore['subjectid'] === $allsubjects['subjectid'])
                                                { 
                                                      foreach ($SubjectScore as  $subjectscore) 
                                                         {
                                                            if($subjectscore['subjectid'] === $allsubjects['subjectid'])
                                                                { 
                                                                    echo $ThirdTermCummulative = (int)$ThirdTermWeight + 
                                                                    (int)$SecondTermWeight +
                                                                     (int)$FirstTermWeight;
                                                                 }
                                                          }
                                                }
                                            }
                                    }
                             else{ echo'';} ?> 
                      @endforeach</td> 

                <td>@foreach($FirstTermSubjectScore as $firsttermsubjectscore)
                             <?php if($firsttermsubjectscore['subjectid'] === $allsubjects['subjectid'])
                                     { 
                                        foreach ($SecondTermSubjectScore as  $secondtermsubjectscore) 
                                            {
                                                if($secondtermsubjectscore['subjectid'] === $allsubjects['subjectid'])
                                                { 
                                                      foreach ($SubjectScore as  $subjectscore) 
                                                         {
                                                            if($subjectscore['subjectid'] === $allsubjects['subjectid'])
                                                                { 
                                                                    $CheckValue = array($ThirdTermWeight,
                                                                        $SecondTermWeight,$FirstTermWeight);
                                                                    $count = 0;
                                                                    foreach ($CheckValue as $key => $value) {
                                                                        if($value !== '' or isset($value)){
                                                                            $count++;
                                                                        }
                                                                        $count = ($count > 1) ? $count:1;
                                                                        # code...
                                                                    }
                                                                    echo (int)$TermWeight =
                                                                     (int)ceil ( ( (int)$ThirdTermWeight + 
                                                                    (int)$SecondTermWeight+ 
                                                                    (int)$FirstTermWeight ) / $count );
                                                                 }
                                                          }
                                                  }
                                            }
                                      }
                             else{ echo'';} ?> 
                      @endforeach </td>

                      <td>@foreach($FirstTermSubjectScore as $firsttermsubjectscore)
                       <?php if($firsttermsubjectscore['subjectid'] === $allsubjects['subjectid'])
                            {  foreach ($SecondTermSubjectScore as  $secondtermsubjectscore) 
                                            {
                                                if($secondtermsubjectscore['subjectid'] === $allsubjects['subjectid'])
                                                {
                                                    foreach ($SubjectScore as  $subjectscore) 
                                                     {
                                                         if($subjectscore['subjectid'] === $allsubjects['subjectid'])
                                                            {
                                                                echo is_array(GradeController::getGrade((int)$TermWeight))
                                                                 ?GradeController::getGrade((int)$TermWeight)['Grade']:'';
                                                            } 
                                                      }   
                                                }   
                                           }   
                                }       
                             else{ echo '';} ?> 
                      @endforeach</td>

                 <td>@foreach($FirstTermSubjectScore as $firsttermsubjectscore)
                        <?php if($firsttermsubjectscore['subjectid'] === $allsubjects['subjectid'])
                                { foreach ($SecondTermSubjectScore as  $secondtermsubjectscore) 
                                            {
                                                if($secondtermsubjectscore['subjectid'] === $allsubjects['subjectid'])
                                                {
                                                     foreach ($SubjectScore as  $subjectscore) 
                                                     {
                                                         if($subjectscore['subjectid'] === $allsubjects['subjectid'])
                                                            {
                                                               echo is_array(GradeController::getGrade((int)$TermWeight))
                                                               ?GradeController::getGrade((int)$TermWeight)['Comment']:'';
                                                            }  
                                                    }     
                                               } 
                                           }
                                }       // Grades::find($subjectscore['gradeid'])->toArray()['grade'] ;}
                             
                             else{ echo'';} 
                        ?> 
                    @endforeach</td>
            
            @else
            <!-- This place is for first term -->
                 <td>@foreach($SubjectScore as $subjectscore)
                             <?php if($subjectscore['subjectid'] === $allsubjects['subjectid'])
                            { echo (int)$TermWeight = (int)((int)$subjectscore['cont_assess_40'] + 
                                                            (int)$subjectscore['exam_score_60']);}
                             else{ echo'';} ?> 
                      @endforeach</td>
                    <td>@foreach($SubjectScore as $subjectscore)
                       <?php if($subjectscore['subjectid'] === $allsubjects['subjectid'])
                            { //echo $TermWeight;                               
                                     echo is_array(GradeController::getGrade((int)$TermWeight))
                                     ?GradeController::getGrade((int)$TermWeight)['Grade']:'';                                                  
                                }       
                             else{ echo '';} ?> 
                      @endforeach</td>

                 <td class="EveryGradeCommentColumn">@foreach($SubjectScore as $subjectscore)
                        <?php if($subjectscore['subjectid'] === $allsubjects['subjectid'])
                                {                                   
                                  echo is_array(GradeController::getGrade((int)$TermWeight))
                                  ?GradeController::getGrade((int)$TermWeight)['Comment']:'';                                              
                                }       // Grades::find($subjectscore['gradeid'])->toArray()['grade'] ;}
                             
                             else{ echo'';} 
                        ?> 
                    @endforeach</td>
            
            @endif             
                 
                 <td> 
                    @foreach($SubjectScore as $subjectscore)  
                                    <?php if($subjectscore['subjectid'] === $allsubjects['subjectid'])
                                       { 
                                         if($subjectscore['teachersignatureid'] === 34)
                                          {
                                              echo "";
                                          }
                                          else
                                          {
                                             $SignatureRecord = OfficialSignatures::with('UserBelong')
                                                               ->find($subjectscore['teachersignatureid']);
                                             //var_dump($SignatureRecord); //die();      
                                            $SignatureOwner = !is_null($SignatureRecord)?
                                            $SignatureRecord->toArray()['user_belong']['surname'].
                                            $SignatureRecord->toArray()['user_belong']['firstname'].
                                            $SignatureRecord->toArray()['user_belong']['middlename']
                                            :'Name Unavailable';

                                            echo   !is_null($SignatureRecord)?
                                            HTML::image("/Images/Signatures/".
                                            $SignatureRecord->toArray()['signatureimage'], 
                                            $SignatureRecord->toArray()['officialsignatureid'], array('class' => '',
                                             )):
                                            'Error! Cannot find signature';
                                          }
                                      }
                                    ?>  
                    @endforeach             
                 </td>   
            </tr>    
            @endforeach

        </table> 

    <table border= 1 class="GradeTable table table-bordered table-responsive w3-table w3-bordered w3-striped w3-border">
        <!--<col width="815" >
        <col width="815">
        <col width="815"> -->
         <tr>
             <td colspan="3" bgcolor="grey" style="padding:0; margin:0;">
             <p style="text-align:center;color:white;">
             <b> GRADE </b> </p> </td>
        </tr>

    <tr>
        <td> A1 75 - 100 (EXCELLENT)</td>
        <td> C4 60 - 64 (CREDIT)</td>
        <td> D7 45 - 49 (PASS)</td>
        
        
    </tr>

     <tr>
        <td> B2 70 - 74 (VERY GOOD) </td>
        <td> C5 55 - 59 (CREDIT)</td>
        <td> D8 40 - 44 (PASS)</td>
        
    </tr>

     <tr>
        <td> B3 65 - 69 (GOOD) </td>
        <td> C6 50 - 54 (CREDIT)</td>
        <td> F9 0 -  39 (FAIL)</td>
    </tr>
</table>

      <!--  <table border= 1 class="SportTable w3-table w3-bordered w3-striped w3-border" >
 
         <tr>
             <td colspan="9" bgcolor="grey" style="padding:0; margin:0;">
             <p style="text-align:center; height:18px;color:white;">
             <b>SPORT</b> </p> </td>
        </tr>

    <tr>
        <td> <b>EVENTS</b>: </td>
        <td>Indoor Games</td>
        <td>Ball Games</td>
        <td>Combative Games</td>
        <td>Track</td>
        <td>Jumps</td>
        <td>Throw</td>
        <td>Swimming</td>
        <td>Weight lifting</td>
    </tr>
        <tr>
             <td><b>LEVEL ATTAINED</b>:</td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
        </tr>    


         <tr>
            <td  colspan="9"> Comment...................................................................................................................................................................................</td>
        </tr>    
</table>

<br />


    <table border= 1 class="ClubTable w3-table w3-bordered w3-striped w3-border">
        <col width="815" >
        <col width="815">
        <col width="815">
        <tr>
            <td colspan="3" bgcolor="grey" style="padding:0; margin:0;">
            <p style="text-align:center; height:18px;color:white;">
            <b>CLUBS, YOUTH ORGANISATION, E.T.C</b> </p> </td>
        </tr>
        <tr>
           <td>Organisation</td>
           <td>Office Held</td>
           <td>Significant Contributions</td>
        </tr>
        <tr>
           <td>&nbsp; </td>
           <td> </td>
           <td> </td>
        </tr>
    </table> -->


    <div class="ReportBottom">
                 <br/><br />
                <p class="ClassTeacherCommenStatement">Class Teacher's Comment:</p>

                <b> <input type="text" class="FirstCommentFirstInput" maxlength="193" 
                value="{{ ( isset($OfficialComments) and  is_array($OfficialComments) 
                and !empty($OfficialComments['classteacher']) )? $OfficialComments['classteacher']:'' }}" /> </b>

                <input type="text" class="FirstCommentSecondInput" maxlength="177" />
                <p class="ClassTeacherSignatureDate">Signature & Date:
                             @if(isset($OfficialComments) and is_array($OfficialComments)  )  
                                            <?php if($OfficialComments['classteachersignatureid'] === 34)
                                                      {
                                                        echo "";
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
                                                            'title' =>  $SignatureOwner
                                                                 )):
                                                            'Error! Cannot find signature';
                                                      } 
                                            ?>
                                            <b> {{ ( isset($OfficialComments) and is_array($OfficialComments) and !empty($OfficialComments['classteacherdate']) )? 
                                             date('d/m/Y', strtotime($OfficialComments['classteacherdate'])):'' }}</b>
                                           @else
                                             &nbsp;
                                          @endif
                </p>
                <p class="ClassTeacherCommenStatement">Principal's Comments:</p>

                <b> <input type="text" class="FirstCommentFirstInput" maxlength="193" 
                value="{{ ( isset($OfficialComments) and is_array($OfficialComments) 
                and !empty($OfficialComments['principal']) )? $OfficialComments['principal']:'' }}" /></b>

                <input type="text" class="FirstCommentSecondInput" maxlength="177" /> 
                <p class="ClassTeacherSignatureDate">Signature & Date:
                         @if(isset($OfficialComments) and is_array($OfficialComments)  )  
                                        <?php if($OfficialComments['principalsignatureid'] === 34)
                                                  {
                                                    echo "";
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
                                        <b> {{ ( isset($OfficialComments) and is_array($OfficialComments) and !empty($OfficialComments['principaldate']) )? 
                                         date('d/m/Y', strtotime($OfficialComments['principaldate'])):'' }}</b>
                                       @else
                                         &nbsp;
                                      @endif

                </p>
                 <p class="ParentSignatureStatement">Parent's Signature:
                          @if(isset($OfficialComments) and is_array($OfficialComments)  )  
                                        <?php if($OfficialComments['parentsignatureid'] === 34)
                                                  {
                                                    echo "";
                                                  }
                                              else
                                                  {
                                                    $SignatureRecord = OfficialSignatures::with('UserBelong')
                                                                       ->find($OfficialComments['parentsignatureid']);
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

                 <p class="ParentDate">Date: <b> {{ ( isset($OfficialComments) and is_array($OfficialComments) and !empty($OfficialComments['parentdate']) )? 
                                 date('d/m/Y', strtotime($OfficialComments['parentdate'])):'' }}</b>  
                  </p>
                         <br />  <br />
                  <div class="d">
                         School Stamp:        
                        <?php 
                          $SignatureRecord = OfficialSignatures::with('UserBelong')->find(64);
                          $SignatureOwner = !is_null($SignatureRecord)?
                          $SignatureRecord->toArray()['user_belong']['surname'].
                          $SignatureRecord->toArray()['user_belong']['firstname'].
                          $SignatureRecord->toArray()['user_belong']['middlename']
                          :'Name Unavailable';
                          echo !is_null($SignatureRecord)?
                                HTML::image("/Images/Signatures/".
                                $SignatureRecord->toArray()['signatureimage'], 
                                $SignatureRecord->toArray()['officialsignatureid'], array('class' => '80',
                                'title' =>  $SignatureOwner)):
                                'Error! Cannot find signature';                                              
                        ?>
                       </div>
                    </div>



      
  