@extends('layouts.main')

@section('division_container')
    <div class="Fixheight">
     @if(isset($ThisStudent) and is_array($ThisStudent) and !empty($ThisStudent)) 
        <div class="row">
            <div class="col-md-4 ReportPageTitle">
               <h3>Your Report Card </h3>
            </div>
            
            <div class="col-md-4 CurrentTermView">
                 
                   <!-- <div class="DossierStatement"> 

                          Hello, <b> {{ isset($ThisStudent['user_belong']['firstname'])?
                         $ThisStudent['user_belong']['firstname']:'student'}}
                         {{ isset($ThisStudent['user_belong']['middlename'])?$ThisStudent['user_belong']['middlename']:''}}
                         {{ isset($ThisStudent['user_belong']['surname'])?$ThisStudent['user_belong']['surname']:''}}</b>
                            ,-->
                            @if(isset($SubjectScore) and isset($RequestedTerm) and !empty($RequestedTerm) and  is_array($SubjectScore)
                            and !empty($SubjectScore))  
                        <!-- this is your report sheet page for-->
                         <h3> {{  strtoupper( $SubjectScore[0]['classname'])}} {{ ucwords( $SubjectScore[0]['termname'] ). " " 
                         . $SubjectScore[0]['year']}}</h3>
                        <!-- when you were in <b>  {{  $SubjectScore[0]['classname']}}.</b>             -->
            </div>
            <a href="{{URL::action('get-report-pdf')}}"  class="btn btn-primary col-md-3 CurrentDownloadLink">
            <i class="glyphicon glyphicon-download"></i>  Download Report Sheet | PDF  </a>
         </div>
        <div class="StudentDossier">
                     @include('includes.reportview')
            
                         
        </div>
            @else
                      <div class="row"> <b> 'You do not have any result at the moment'</b> </div>
            @endif
      
        @else
        <div class="row">
            <div class="col-md-4 ReportPageTitle">
               <h3>Your Report Card </h3>
            </div>
        </div>
          <div class="row"> Your record cannot be found on the system.</div>
        @endif
         <div class="panel panel-default StudentPagePanel">
            <form class="form-horizontal" action="{{URL::route('post-student-report')}}" method="post">
                <div class="panel-heading clearfix ">
                  <h3 class="panel-title"> <b class="CheckReportText"> Check and Download Report Sheet</b></h3>
                  <!--<div class="btn-group pull-right">
                    <button  type = "submit"  class="StudentButton btn btn-large">
                          <i class="fa fa-check"></i>
                          Get report sheet
                    </button>
                  </div> -->
                </div>
                <div class="modal-body">
                 
                    <div class="form-group">            
                           <div class="ChooseStudent row">
                           @if(!empty($AllStudents) and is_array($AllStudents))    
                              <div class="StudentNumberLabel  col-md-3"> <h5>Type Your Name</h5></div> 
                               <div class="col-md-7"> 
                                @if($errors->has('TypeStudentName'))
                                    <span class="text-danger StudentError">{{$errors->first('TypeStudentName')}}</span>
                                @endif
                                @include('includes.choosestudentasarray')  
                              </div>
                           @else
                                   No Student Available 
                           @endif 
                      </div>
                    </div>
                    <hr />
                    <div class="form-group">
                        <div class="StudentPageChooseTerm"> @include('includes.chooseterm')</div>
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    </div>        
                </div>
               <div class="panel-footer">

                      <button type = "submit"  class="StudentButton btn btn-default btn-lg btn-block">
                      <i class="glyphicon glyphicon-check" > </i>
                      Get Report Sheet </button>
               </div>
            </form>
         </div>
    </div>     
@stop
