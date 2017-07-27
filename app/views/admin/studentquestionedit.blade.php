@extends('layouts.main')

@section('division_container')
<div class="DivisionContainer">
<h3> Edit Student Question </h3>
    {{ Form::open(array( 'route' => 'edit-this-question' ,'files' => true, 'class'=> 'QuestionEditform', 'method'=> 'post')) }}
    <input type="hidden" class="EditQuestionId" value="{{$ThisQuestion['questiontableid']}}" /> 
    <input type="hidden" class="EditQuestionOptionsId" value="{{$ThisQuestion['questionoptionsid']}}" /> 
    <input type="hidden" class="EditCorrectAnswerId" value="{{$ThisQuestion['questionanswerid']}}" /> 
    <input type="hidden" value="{{URL::to('/')}}" class="BaseURL" /> 
     <span class="ReportStudentClass"></span>
@if( is_array($ThisQuestion) )
    <div class="YearDiv">
        <span class="YearLabel"> Year </span>

        <select name = "Year" class="Year" >
          <option> -- Choose year -- </option>
          <option value="2015" {{($ThisQuestion["year"] == "2015") ? "selected":'' }}> 2015/2016 </option>
        </select>
    </div>

    <div class="TermDiv">
        <span class="TermLabel"> Term </span>
        <select name = "TermName" class="TermName" >
            <option> -- Choose term -- </option>
            <option value="first term" {{($ThisQuestion["termname"] == "first term") ? "selected":'' }}> First term</option>
            <option value="second term" {{($ThisQuestion['termname'] == "second term") ? "selected":'' }} > Second term</option>
            <option value="third term" {{($ThisQuestion['termname'] == "third term") ? "selected":'' }}> Third term</option>
        </select>
    </div>

    <div class="ClassDiv">
        <span class="ClassLabel"> Class </span>
        <select name = "Class" class="Class" >
            <option> -- Choose class -- </option>
            <option value="SS1" {{($ThisQuestion["classname"] == "SS1") ? "selected":'' }}>SS1</option>
            <option value="SS2" {{($ThisQuestion["classname"] == "SS2") ? "selected":'' }}>SS2</option>
            <option value="SS3" {{($ThisQuestion["classname"] == "SS3") ? "selected":'' }}>SS3</option>
        </select>
    </div>

    <div class="SubjectDiv">
        <span class="SubjectLabel"> Subjects </span>
        <select name = "Subject" class="Subject" >
            <option> -- Choose Subject -- </option>
            @if(isset($AllSubjects) and is_array($AllSubjects))
                @foreach($AllSubjects as $EverySubject)
                     <option value="{{$EverySubject['subjectid']}}" {{($ThisQuestion["subjectid"] == $EverySubject['subjectid']) ? "selected":'' }}> 
                                    {{$EverySubject['subject']}}
                       </option>
                @endforeach
            @else
                <option> No Subject Available  </option>
            @endif
        </select>
    </div>

   
    <span class=""> Which Section of the Question is this? </span> <b> Section :</b> 
    <input type="text" name="SectionNumber" class="SectionNumber" value="{{$ThisQuestion['questionsection']}}" /> <br />
    Section Instruction: </b> 
    <textarea name="SectionInstruction" class="SectionInstruction" id="SectionInstruction" rows="5" cols="80" >
        {{$ThisQuestion['sectioninstruction']}}
    </textarea>

     <div class="">
      Name of class Teacher: <input type="text" class="ClassTeacher" value="{{$ThisQuestion['classteacher']}}" /> 
    </div> 
    Question Number: <input type="text"  name="QuestionNumber" class="QuestionNumber" value="{{$ThisQuestion['questionnumber']}}" />

    <textarea name="editor1" class="editor1" id="editor1" rows="5" cols="80">
            {{$ThisQuestion['questionstatement']}}
    </textarea>
    <input type="file" name="QuestionImage" class="QuestionImage" /> 


    Type the options here: 
    A=>  <input type="text" name="optionA" class="optionA" value="{{$ThisQuestion['question_options_belong']['optionA']}}" />, 
    B => <input type="text"  name="optionB" class="optionB" value="{{$ThisQuestion['question_options_belong']['optionB']}}" />,  
    C => <input type="text"  name="optionC" class="optionC" value="{{$ThisQuestion['question_options_belong']['optionC']}}" /> ,
    D => <input type="text"  name="optionD" class="optionD" value="{{$ThisQuestion['question_options_belong']['optionD']}}" />

     What is the correct answer??  
    <select name = "CorrectAnswer" class="CorrectAnswer" >
            <option> -- Choose the correct answer -- </option>
            <option value="A" {{($ThisQuestion['question_answer_belong']['correctanswer'] == "A") ? "selected":'' }}>A</option>
            <option value="B" {{($ThisQuestion['question_answer_belong']['correctanswer'] == "B") ? "selected":'' }}>B</option>
            <option value="C" {{($ThisQuestion['question_answer_belong']['correctanswer'] == "C") ? "selected":'' }}>C</option>
            <option value="D" {{($ThisQuestion['question_answer_belong']['correctanswer'] == "D") ? "selected":'' }}>D</option>
    </select>
    <span class="ReportMessage" ></span>
    <span class="ValidationErrorReport" ></span>
    <span class="ErrorReport" ></span>

    <button  class="EditQuestion"> Edit This Question </button>
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />

@endif

</div>
       
     {{Form::token()}}
     {{Form::close()}}
</div>

<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'editor1' );
    CKEDITOR.replace( 'SectionInstruction' );
    var ActionUrl  =  $(".GetQuestionInputURL").val();
    
</script>

@stop