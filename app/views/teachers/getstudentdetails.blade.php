@extends('layouts.main')

  @section('division_container')
    @if(!empty($ThisStudent) and is_array($ThisStudent))
        <h3> Account Details of {{is_array($ThisStudent['user_belong'])?
          $ThisStudent['user_belong']['firstname']." ".  $ThisStudent['user_belong']['surname'] :" "; }} </h3> 

           <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel"> Instructions for editing student details</h4>
                    </div>
                    <div class="modal-body">                    
                            <div class="StudentEditFormInstruction"> 
                              <b> Student Admission Number can be edited </b><br />
                              Student school email <b> cannot be editted</b> but it would be updated by the system.<br />
                              <b> Any other details can be editted </b><br />               
                            </div>  
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
           </div>
          
            

             <div class="panel panel-default">
                <form class="form-horizontal" action="{{URL::route('edit-student-details')}}" method="post">
                      <div class="panel-heading clearfix ">
                      <h3 class="panel-title pull-left"> <b class=""> Find Student </b></h3>
                        <div class="btn-group pull-right">     
                           <a href="{{URL::action('edit-student-details-form')}}"
                            class="btn btn-large  btn-primary"> 
                             <i class="fa fa-arrow-circle-left"></i> Back to Student Search Page </a>

                          <button  type = "button"  class="btn btn-large btn-danger" data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-exclamation-circle"></i>
                               Instructions
                          </button>
                        </div> 
                      </div>
                      <div class="modal-body"> 
                        <div class="form-group row">
                           
                             @if(Session::has('EditStudentMessage') and Session::has('GoodResponse') and Session::get('GoodResponse') === 1 )
                                    <div class="EditStudentMessage well text-success text-center">
                                            <b> <i class="fa fa-thumbs-o-up fa-2x fa-fw"></i>{{Session::get('EditStudentMessage')}}</b> </div>
                              @elseif(Session::has('EditStudentMessage') and Session::has('GoodResponse') and Session::get('GoodResponse') === 0 )
                                    <div class="EditStudentMessage well  text-danger text-center"> 
                                    <b><i class="fa fa-times-circle fa-2x fa-fw"></i> {{Session::get('EditStudentMessage')}} </b> </div>
                             @endif
                            
                            <div class="col-md-6">
                                       <b> Student  Admisssion Number:</b>  @if($errors->has('StudentAdmissionNumber'))
                                            <span class="text-danger"> >> {{$errors->first('StudentAdmissionNumber')}}</span>
                                             @else

                                        @endif   
                                       <input type="input" class="form-control" name="StudentAdmissionNumber" value="{{$ThisStudent['school_admission_number']}}">
                                                                            
                                        <b> Student surname:</b> @if($errors->has('Surname'))
                                            <span class="text-danger"> >>{{$errors->first('Surname')}}</span>
                                        @endif   
                                        <input type="input" class="form-control" name="Surname" value="{{$ThisStudent['user_belong']['firstname']}}">
                                                                            
                                        <b> Student middle name:</b>  @if($errors->has('Middlename'))
                                            <span class="text-danger"> >>{{$errors->first('Middlename')}}</span>
                                        @endif  
                                        <input type="input" class="form-control" name="Middlename" value="{{$ThisStudent['user_belong']['middlename']}}">
                                                                             
                                        <b> Student firstname: </b>@if($errors->has('Firstname'))
                                            <span class="text-danger"> >> {{$errors->first('Firstname')}}</span>
                                        @endif
                                        <input type="input" class="form-control" name="Firstname" value="{{$ThisStudent['user_belong']['surname']}}">
                                         
                                       
                            </div>
                            <div class="col-md-6">
                                <b> Student school email:</b>@if($errors->has('StudentEmail'))
                                            <span class="text-danger"> >> {{$errors->first('StudentEmail')}}</span>
                                        @endif 
                                <input type="input" class="form-control" name="StudentEmail" value="{{$ThisStudent['user_belong']['useremail']}}" disabled="diabled">
                                <b> Student secondary email:</b> @if($errors->has('SecondStudentEmail'))
                                            <span class="text-danger"> >> {{$errors->first('SecondStudentEmail')}}</span>
                                        @endif
                                <input type="input" class="form-control" name="SecondStudentEmail" value="{{$ThisStudent['user_belong']['second_email']}}">
                                <b> Student date of birth:</b>@if($errors->has('DateOfBirth'))
                                            <span class="text-danger"> >> {{$errors->first('DateOfBirth')}}</span>
                                        @endif
                                <input type="input" class="form-control" name="DateOfBirth" value="{{$ThisStudent['user_belong']['date_of_birth']}}" >
                                <b> Sex:</b> @if($errors->has('Sex'))
                                            <span class="text-danger"> >> {{$errors->first('Sex')}}</span>
                                        @endif
                                <select class="form-control" name="Sex" >     
                                @if($ThisStudent['user_belong']['sex'] === 'Male')                     
                                    <option value="Male" selected="selected"> Male</option>           
                                    <option value="Female">Female </option>           
                                  @else
                                    <option value="Male" > Male</option>           
                                    <option value="Female" selected="selected">Female </option>     
                                  @endif
                               </select>      
                            </div>                     
                        </div>                   
                                                                  
                      </div>
                      <div class="panel-footer">
                           <input type = "submit" class="btn btn-default btn-lg btn-block form-control"  value="Save" id="RegistrationButton"  />
                           <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 

                      </div>
                  </form>
        </div> 
  
           
            <div id="ShowStudentEditMessage" > </div>
      @endif
      @stop