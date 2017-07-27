@extends('layouts.main')

@section('division_container')
<div class="DivisionContainer">

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
    <!--
   Form::open(array( 'route' => 'post-student-report' ,'files' => true, 'method'=> 'post')) 
        <h3> Check and download report sheet</h3>
        @include('includes.chooseterm')
        <br />
        <div class="ChooseStudent">
             @if(!empty($AllStudents) and is_array($AllStudents))
             <h4> Start typing your name here </h4>
             <span class="StudentNumberLabel"> Type your name &gt;&gt;</span> 
                   
             @else
                     No Student Available 
             @endif 
        </div> 

        <div class="OptionOr">
        <h4> OR </h4>
        </div>

        <div class="StudentNumberField">
            <h4 class="StudentLabel"> Type your student admission number here  </h4> 
            <span class="StudentNumberLabel"> Student Admission Number &gt;&gt;</span> 
            <input type="text" name="StudentNumber" class="StudentInput" id="StudentInput" />

            
            <button type = "submit"  class="StudentButton"> Get report sheet </button>
           
        </div>

         @if($errors->has('StudentNumber'))
                <span class="text-danger StudentError">{{$errors->first('StudentNumber')}}</span>
            @endif
        Form::token()
     Form::close() -->
</div>
@stop