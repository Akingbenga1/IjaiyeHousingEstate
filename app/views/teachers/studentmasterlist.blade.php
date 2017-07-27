@extends('layouts.main')

@section('division_container')
 
  @if(isset($ChoosenTerm) and is_array($ChoosenTerm))
                  <h3> List of Students in {{ $ChoosenTerm['Class']." ".strtoupper($ChoosenTerm['SubClass'])
                       ." ". $ChoosenTerm['Year'] }} 
                  </h3>    
    
 <!-- <a class="btn btn-success" href="{{URL::route('get-student-list-pdf')}}"> Student List </a> --> 
    @if(isset($StudentListMessage))
         <b> {{$StudentListMessage}}</b>
    @endif       

    @if(isset($ThisStudentTerm) and is_array($ThisStudentTerm) and !empty($ThisStudentTerm))
        <div class="row">
      
             <p class='StudentListInfo col-md-6'> Total number of students in this class:
              <b> {{count($ThisStudentTerm)}} </b>
             </p>   
           
            {{ Form::open(array( 'route' => 'class-report-progress-page' , 'method'=> 'post', 
                'class'=>'col-md-6')) }}   
                  <div class="row">        
                   <div class='TermDiv col-md-3'>
                      <select name = "TermName" class="TermSelect form-control " >
                          <option>Term</option>
                          <option value="first term"> First term</option>
                          <option value="second term"> Second term</option>
                          <option value="third term"> Third term</option>
                      </select>
                   </div>       
                   <div class="col-md-3">         
                      <input type = "submit"  value="View Class Report Sheet Progress"  class="btn btn-default" />
                   </div>
                   </div>
                  
                    {{Form::token()}}   
            {{Form::close()}}
        </div>
             
     <!-- <b> Search for anybody on this table: </b> <input type="text" id="search" placeholder="Search this table"></input><br /><br /> -->
      <!--<table border = "1" class="w3-table w3-bordered w3-striped w3-border w3-hoverable">
                  <tr class="w3-grey w3-text-white"> 
                    <th> S/N </th>
                    <th> Student full name </th>
                    <th> Admission number  </th>
                    <th> Choose Class  </th>
                    <th> Choose SubClass  </th>
                    <th> Change Class  </th>
                    @if($ChoosenTerm['Year'] == "2015" and $ChoosenTerm['Class'] != "SS3")
                        <th> Promote Student  </th>
                        <th> <b> Promoted?</b> </th>
                        <th> <b> Which class?</b> </th>
                    @endif
                    
                     @if( $ChoosenTerm['Class'] == "SS3" and  $ChoosenTerm['Year'] != 2016)
                        <th> <b> Graduation Button </b> </th>
                        <th> <b> Graduated?</b> </th>
                    @endif
                  </tr> -->
          <?php $Count = 1; $YesString ='<b> Yes </b>'; $NoString =  'No';  ?>
           <?php $SplitStudentClass = array_chunk($StudentClassList, ceil(count($StudentClassList) / 3));
                // var_dump(count($things[0]));
                 $count = 1;   ?>
                  <b> Search for anybody using their surname:
           </b> <input type="text" id="CardSearch" placeholder="Search this list"></input> <p class="ShowTheCount"> </p>
          <md-content class="md-padding" layout-xs="column" layout="row">  
           @foreach($SplitStudentClass as $EachSplitedStudentClass) 
                    <div flex-xs flex-gt-xs="33" layout="column">            
                         @foreach($EachSplitedStudentClass as $EachSplitedStudent)
                        
                            <md-card id="{{$count}}" 
                            
                            md-theme="<% showDarkTheme ? 'dark-purple' : 'default' %>" md-theme-watch>
                           
                            
                              <md-card-title style="background-color: #6699cc">
                                <md-card-title-text   >
                                  <span class="md-headline" style="color: white"  ng-click="cardClicked($event, {{$count}})"><b>{{$EachSplitedStudent['user_belong']['surname']}} </b></span>
                                  <span class="md-subhead">
                                       @if (strlen($EachSplitedStudent['user_belong']['firstname']) > 12)
                                          <!--{{ $str = substr($EachSplitedStudent['user_belong']['firstname'] , 0, 8) . '...';
                                          }}  -->                                         
                                          @else
                                              <!-- {{ $EachSplitedStudent['user_belong']['firstname'] }}  -->
                                       @endif
                                                                                            
                                  <strong style="color:white">  {{$EachSplitedStudent['school_admission_number']}} 
                                  </strong> </span>
                                  <div>
                                          <?php

                                             $Mystudentid = $EachSplitedStudent['studentid'];
                                               $BigSearchArray['AllThisSTudent'][$Mystudentid] =  $EachSplitedStudent;
                                             if( $ChoosenTerm['Year'] == "2015"   and $ChoosenTerm['Class'] != "SS3")
                                               {
                                                    foreach($NextTerm as $select) 
                                                      {
                                                       
                                                        $ComputedStudentTerm = StudentTerm::where('studentid' ,'=', $Mystudentid)->where('thistermid', '=', $select['id'])
                                                                                          ->with("ThistermBelong")->get()->toArray();
                                                         $PromotedStudentTerm[$Mystudentid][] = !empty($ComputedStudentTerm) ? 
                                                                                                strtoupper( $ComputedStudentTerm[0]["thisterm_belong"]['classname'] . 
                                                                                                            " " . $ComputedStudentTerm[0]["class_subdivision"] . " ".
                                                                                                            $ComputedStudentTerm[0]["thisterm_belong"]['year'] 
                                                                                                          ) : false;
                                                      }
                                                         $PromotedNewClass[$Mystudentid] = " ";
                                                         $NewArrayStudentTerm = array_filter($PromotedStudentTerm[$Mystudentid] ); 
                                                         $WhichString = (count( $NewArrayStudentTerm) >= 1 )  ? $YesString : $NoString;
                                                         foreach($NewArrayStudentTerm as $NAST){ $PromotedNewClass[$Mystudentid] = $NAST ." ";  }
                                                               
                                                      echo  '<input type="hidden" name="PromotionStudentId" class="StudentID" value = "' . $Mystudentid . '" />';
                                                      if( $PromotedNewClass[$Mystudentid] != " ")
                                                       {
                                                          list($PromotedNewClassName, $PromotedNewSubClass, $PromotedNewYear) = explode(" ",  $PromotedNewClass[$Mystudentid]);              
                                                           "<b><a class='' href=" . 
                                                          URL::route('student-term-list-page',array('Year' => $PromotedNewYear, 'Class' => $PromotedNewClassName,
                                                                       'SubClass' => $PromotedNewSubClass )). ">" . $PromotedNewClass[$Mystudentid] ."</a></b>";
                                                          if($PromotedNewClassName === $ChoosenTerm['Class'] )
                                                          {

                                                            //var_dump($PromotedNewClassName);
                                                            echo '<span class="badge bg-success  RepeatedBadge "> Repeated </span>';
                                                          }
                                                          else
                                                          {
                                                              echo '<span class="badge bg-success  PromotedBadge "> Promoted </span>';
                                                          }
                                                          
                                                       }
                                                       else
                                                       {

                                                          echo ' <span class="badge bg-warning PromoteStudent"> Promote </span>';
                                                           
                                                       }                                             
                                              }

                                             if( $ChoosenTerm['Class'] == "SS3" and  $ChoosenTerm['Year'] != 2016)
                                             {
                                                 
                                                          $CheckGraduate = GraduateTable::where('studentid' ,'=', $Mystudentid)->get()->toArray();
                                                          //var_dump($CheckGraduate);
                                                          //$PromotedStudentTerm[$Mystudentid][] = !empty($ComputedStudentTerm) ? $ComputedStudentTerm[0]['id'] : false;
                                                       
                                                          // $NewArrayStudentTerm = array_filter($PromotedStudentTerm[$Mystudentid] ); 
                                                           $GraduateString = ( !empty($CheckGraduate) )  ? $YesString : $NoString;
                                                           $DisableMe = ( !empty($CheckGraduate) )  ? "disabled" : " " ;
                                                
                                                          echo ' 
                                                           <input type="hidden" name="GraduationStudentId" class="StudentID" value = "' . $Mystudentid . '" />'. 
                                                          '<input type="button" class="GraduateStudent" value = "Graduate Student"' . $DisableMe .'/>'.
                                                          ''. $GraduateString .''; 
                                                          echo  '
                                                              <input type="hidden" name="PromotionStudentId" class="StudentID" value = "' . $Mystudentid . '" />';
                                              } 
                                              $BigSearchArray['ChooseTerm'] =  $ChoosenTerm;
                                                //var_dump($BigSearchArray['AllThisSTudent']);die();
                                             Session::put('BigSearchArray', $BigSearchArray ) ;
                          ?>
                                  </div>
                                </md-card-title-text>
                                <md-card-title-media>
                                  <div class="md-media-sm card-media">
                                     <md-card-avatar>
                                       
                                          {{HTML::image("/Images/Icons/avatar.jpg", 
                                                 'avatar', array('class' => 'img-responsive md-user-avatar',) )}}
                                    </md-card-avatar>
                                  </div>
                                </md-card-title-media>
                                 </md-card-title>
                              <md-card-actions layout="row" layout-fill>                              
                                                               
                                    
                                     <md-select ng-model="weapon{{$count}}" placeholder="Class" id="{{$count}}"
                                      class="md-no-underline ClassSelect">
                                          <md-option value="SS1">SS1</md-option>
                                          <md-option value="SS2e">SS2</md-option>
                                          <md-option value="SS3">SS3</md-option>
                                      </md-select>

                                    

                                      <md-select ng-model="gbenga{{$count}}" placeholder="SubClass" id="{{$count}} SubClassSelect{{$count}}"
                                      class="md-no-underline SubClassSelect{{$count}} SubClassSelect">
                                          <md-option value="A">A</md-option>
                                          <md-option value="B">B</md-option>
                                          <md-option value="C">C</md-option>
                                          <md-option value="D">D</md-option>
                                          <md-option value="E">E</md-option>
                                          <md-option value="F">F</md-option>
                                          <md-option value="G">G</md-option>
                                          <md-option value="H">H</md-option>
                                          <md-option value="J">J</md-option>
                                          <md-option value="K">K</md-option>
                                      </md-select> 
                                       </md-card-actions>       
                                      <md-divider></md-divider>                               
                                   <md-button aria-label="Change Class"  class="ChangeClassYear" 
                                   md-colors="{background: 'C62828'}">

                                     Change Class

                                   </md-button>
                                    <?php

                                          echo  '<input type="hidden" name="PromotionStudentId" class="StudentID" value = "' . $Mystudentid . '" />';  
                                   ?>
                                  
                                
                             
                            </md-card> 
                            <div style="visibility: hidden">
                                <div class="md-dialog-container" id="myStaticDialog{{$count}}">
                                <md-dialog aria-label="List dialog">
                                 <md-dialog-content>
                                 
                                    Fullname: {{$EachSplitedStudent['user_belong']['firstname']}} 
                                              {{$EachSplitedStudent['user_belong']['middlename']}} 
                                              {{$EachSplitedStudent['user_belong']['surname']}} 
                                
                                </md-dialog-content>
                                </md-dialog>
                                </div>
                              </div> 
                              <?php $count++; ?>      
                         @endforeach
                     </div>
                  @endforeach          
          </md-content>    
        
    @else

      <br />There are no student in this class yet

       <!-- <select name = "Class" class="ClassSelect" > -->
                                        <!-- <option>Class</option>
                                          <option value="SS1">SS1</option>
                                          <option value="SS2">SS2</option>
                                          <option value="SS3">SS3</option>
                                      </select> --> 
<!--<select name = "SubClass" class="SubClassSelect" >
                                           <option>Subclass</option>



                                           
                                           <option value="a">A</option>
                                           <option value="b">B</option>
                                           <option value="c">C</option>
                                           <option value="d">D</option>
                                           <option value="e">E</option>
                                           <option value="f">F</option>
                                           <option value="g">G</option>
                                           <option value="h">H</option>
                                           <option value="i">I</option>
                                           <option value="j">J</option>
                                           <option value="k">K</option>
                                      </select> -->
    @endif
  @endif
  <input type="hidden" name="PromotionURL" class="PromotionURL" value ={{ URL::route('promote-this-student') }}/>
  <input type="hidden" name="ChangeClassURL" class="ChangeClassURL" value ={{ URL::route('change-student-class') }}/>
  <input type="hidden" name="GraduationURL" class="GraduationURL" value ={{ URL::route('graduate-this-student') }}/>
  <input type="hidden" class="OldClass" name="OldClass" value= "{{$ChoosenTerm['Class']}}" />
  <input type="hidden" class="CurrentYear" name="CurrentYear" value= "{{$ChoosenTerm['Year']}}" />
@stop

 
