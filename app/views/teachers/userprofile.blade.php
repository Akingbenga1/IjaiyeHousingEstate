@extends('layouts.main')

  @section('division_container')
  <h3> Your Profile </h3> 
 
  <div class="UserProfile DetailsShowDiv">  
       <div class="ProfileData">
      <b> Surname: </b>       {{$ThisUser['surname']}}<br />
      <b>Firstname: </b>      {{$ThisUser['firstname']}} <br />
      <b>Middle name:</b>     {{$ThisUser['middlename']}} <br />
       @if( !is_null( $ThisUser['student_relate']))
            <b>Student Admission Number:</b>  {{$ThisUser['student_relate']['school_admission_number']}} <br />
        @endif
      
      <b>Primary Email Address:</b>   {{$ThisUser['useremail']}}<br />
       <b> Second Email Address:</b> {{$ThisUser['second_email']}}<br />
      <b>Date of Birth:</b>  {{ date('d/m/Y', strtotime($ThisUser['date_of_birth']))  }}<br />
     <b>Gender:</b>          {{$ThisUser['sex']}}<br />
     </div>
     <button type="submit" class="DetailsEditButton" id="AjaxButton"> Edit Your Details  </button><br />
  </div>


  <div class="DetailsEditDiv">
    {{ Form::open(array( 'route' => 'post-user-profile' ,'files' => true, 'method'=> 'post', 
                         'class'=> 'UserProfileUpdateForm')) }}                     
              <div class="">
              <p>Surname:</p>
                  <input type="input" name="Surname" value="{{$ThisUser['surname']}}" class="Surname" /><br />
              </div>
              <div>
                 <p> Middle name:</p>
                  <input type="input" name="Middlename" value="{{$ThisUser['middlename']}}" class="Middlename" />
                  <br />
              </div>
              <div> 
                  <p> Firstname:</p>
                  <input type="input" name="Firstname" value="{{$ThisUser['firstname']}}" class="Firstname" /><br />
              </div>
              
                   @if( !is_null( $ThisUser['student_relate']))
                          <div>
                              <p>  Student  Admisssion Number:</p> 
                              <input type="input" name="StudentAdmissionNumber" 
                                      value="{{$ThisUser['student_relate']['school_admission_number']}}"  disabled/>
                              <span class="PrimaryEmailDiabled"> (Student Admission Number cannot be editted)
                              </span><br />
                          </div>
                    @endif
              <div>
                  <p> Primary Email Address: </p>
                  <input type="input" name="Email" value="{{$ThisUser['useremail']}}" disabled="diabled" />
                  <span class="PrimaryEmailDiabled"> (Primary email address cannot be editted) </span><br />
              </div>
              <div> 
                  <p> Second Email Address: <b>(optional)</b> </p>
                  <input type="input" name="SecondEmail" value="{{$ThisUser['second_email']}}" class="SecondEmail" />
                 <br />
              </div>
              <div> 
                  <p> Date of Birth:</p>
                  <input type="input" name="DateOfBirth" value="{{date('d/m/Y', strtotime($ThisUser['date_of_birth']))}}"  
                  class="DateOfBirth" />
                  (Date Format: DD/MM/YYYY)<br />
              </div>
              <div>
                  <p> Gender: </p>
                  <select name="Sex" class="Sex"  >     
                  @if($ThisUser['sex'] === 'Male')                     
                      <option value="Male" selected="selected"> Male</option>           
                      <option value="Female">Female </option>           
                    @else
                      <option value="Male" > Male</option>           
                      <option value="Female" selected="selected">Female </option>     
                    @endif
                 </select> 
              </div>                       
                  {{Form::token()}}
                  <input type = "submit"  value="Save changes" class="ProfileUpdateButton"  />
            {{Form::close()}}
             <button type="submit" class="DetailsShowButton" id="AjaxShowButton"> See Your Details  </button><br />
      </div>
  

  @stop