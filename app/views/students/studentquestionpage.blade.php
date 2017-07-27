@extends('layouts.main')

@section('division_container')

<div class="DivisionContainer">
<h3> Practise Question Page </h3>

    
    <div class="ReportMessage"></div>
    <div class="ValidationErrorReport"></div>


    <div class="ShowPieChart">
    <h2>Result Pie Chart </h2>
    <canvas id="month-area" width="300" height="300"></canvas>
    <div id="legend"></div>
    </div>

    {{ Form::open(array( 'route' => 'submit-question-to-database' ,'files' => true, 'class'=> 'QuestionInputform', 'method'=> 'post')) }}
 <span class="ReportStudentClass"></span>

<div class="w3-row">
<span class="YearLabel  w3-quarter"> Year </span>
 <span class="ClassLabel w3-quarter"> Class </span>
 <span class="SubjectLabel w3-quarter"> <b> Subjects </b> </span>
</div>

<div class="w3-row">
     <div class="YearDiv">        
        <select name = "Year" class="Year w3-select w3-quarter w3-border" >
          <option> -- Choose year -- </option>
          <option value="2015"> 2015/2016 </option>
        </select>
    </div>

    <div class="ClassDiv">
       
        <select name = "Class" class="Class w3-select  w3-quarter w3-border" >
            <option> -- Choose class -- </option>
            <option value="SS1">SS1</option>
            <option value="SS2">SS2</option>
            <option value="SS3">SS3</option>
        </select>
    </div>

    <div class="SubjectDiv">
        
        <select name = "Subject" class="Subject w3-select w3-quarter w3-border" >
            <option> -- Choose Subject -- </option>
            @if(isset($AllSubjects) and is_array($AllSubjects))
                @foreach($AllSubjects as $EverySubject)
                     <option value="{{$EverySubject['subjectid']}}"> {{$EverySubject['subject']}} </option>
                @endforeach
            @else
                <option> No Category Available  </option>
            @endif
        </select>
    </div>
</div>

<br />
<button  class="GetQuestionButton w3-btn w3-amber"> Get Questions </button>


<input type="hidden" value="{{URL::action('get-questions')}}" class="GetQuestionURL" /> 
<input type="hidden" value="{{URL::action('save-this-score')}}" class="SaveScoreURL" /> 
<input type="hidden" value="{{URL::to('/')}}" class="BaseURL" />
<div class="w3-row"> 
     <button  class='ResultButton  w3-btn w3-deep-orange'>View Results</button>
    <ul class="QuestionsPanel">
     
     
    </ul>
    <button  class='ResultButton  w3-btn w3-deep-orange'>View Results</button>
</div>


       
     {{Form::token()}}
     {{Form::close()}}
</div>



<script>
 $(".ShowPieChart").hide(); 
 $(".ResultButton").hide(); 
 
 function myAccordionFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
    
</script>
@stop

