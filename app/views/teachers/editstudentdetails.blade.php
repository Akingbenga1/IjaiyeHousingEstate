@extends('layouts.main')

  @section('division_container')
    <h3> Edit Student Details</h3> 


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> Instruction for finding student </h4>
              </div>
              <div class="modal-body">                    
                    <div class="GetStudentForDetailsEdit"> 
                        <b>Step 1</b> Choose a Student by typing their names.<br />
                        <b>Step 2</b> Click on the "Get Student Details" Button.<br />
                        <b>Step 3</b> Student Details will be shown.<br />
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
                <form class="form-horizontal" action="{{URL::route('get-student-details')}}" method="post">
                      <div class="panel-heading clearfix ">
                      <h3 class="panel-title pull-left"> <b class=""> Find Student </b></h3>
                        <div class="btn-group pull-right">     
                           <a href="{{URL::action('teachers-home-page')}}"
                            class="btn btn-large  btn-primary"> 
                             <i class="fa fa-arrow-circle-left"></i> Back to Teachers Home </a>

                          <button  type = "button"  class="btn btn-large btn-danger" data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-exclamation-circle"></i>
                               Instructions
                          </button>
                        </div> 
                      </div>
                      <div class="modal-body"> 
                          <div class="form-group">
                          Type student name or admission number
                                   @if(!empty($AllStudents) and is_array($AllStudents))
                                      @include('includes.choosestudentasarray')  
                                  @endif    
                                   <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">                
                          </div>                   
                                                                  
                      </div>
                      <div class="panel-footer ">
                          <input type = "submit"  value="Get student detail" id="AutoButton" class="btn btn-success btn-lg btn-block"  disabled/>

                      </div>
                  </form>
        </div> 
  
    

  @stop