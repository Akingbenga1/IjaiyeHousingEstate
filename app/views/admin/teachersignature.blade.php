@extends('layouts.main')

@section('division_container')
<h3> upload  Teachers signature </h3>
<br />
<br />

  @if(Session::has('TeacherSignatureResponse'))
    {{Session::get('TeacherSignatureResponse')}}
  @endif
<br />
  @if($errors->has('AssignedTeacher'))
   <b> {{$errors->first('AssignedTeacher')}}</b>
  @endif
  @if($errors->has('SignatureImage'))
    <b>{{$errors->first('SignatureImage')}}</b>
  @endif

  <div class="w3-row">

  {{ Form::open(array( 'route' => 'post-teachers-signature' ,'files' => true, 'method'=> 'post',
      'class'=>'w3-third w3-container w3-blue w3-text-black')) }}  
      <h4 class="w3-text-white"> New Signature </h4>
      <select name = "AssignedTeacher" >
        <option> -- Choose User -- </option>
        @if(  isset($AllAssignedRoles) and is_array($AllAssignedRoles) )
            @foreach($AllAssignedRoles as $EveryUser)
              <option value="{{$EveryUser['user_id']}}">
                {{$EveryUser['user_belong']['useremail']}} 
              </option>
            @endforeach
        @else
          <option> No assigned user available in database </option>
        @endif
      </select>
     <input  type="file" name="SignatureImage"/>  
     <input  type="submit" value="upload" class="w3-center" />    
     {{Form::token()}}     
  {{Form::close()}}   
 

  {{ Form::open(array( 'route' => 'update-teachers-signature' ,'files' => true, 'method'=> 'post', 'class'=>'w3-third w3-container w3-blue w3-text-black')) }}  
       <h4 class="w3-text-white"> Update Signature </h4>
      <select name = "AssignedTeacher" >
        <option> -- Choose User -- </option>
        @if(  isset($AllAssignedRoles) and is_array($AllAssignedRoles) )
            @foreach($AllAssignedRoles as $EveryUser)
              <option value="{{$EveryUser['user_id']}}">
                {{$EveryUser['user_belong']['useremail']}} 
              </option>
            @endforeach
        @else
          <option> No assigned user available in database </option>
        @endif
      </select>
     <input  type="file" name="SignatureImage"/>  
     <input  type="submit" value="update signature" class="w3-center" />    
     {{Form::token()}}     
  {{Form::close()}}   

   {{ Form::open(array( 'route' => 'delete-teachers-signature' ,'files' => true, 'method'=> 'post', 'class'=>'w3-third w3-container w3-blue w3-text-black')) }}  
       <h4 class="w3-text-white"> Delete Signature </h4>
      <select name = "AssignedTeacher" >
        <option> -- Choose User -- </option>
        @if(  isset($AllAssignedRoles) and is_array($AllAssignedRoles) )
            @foreach($AllAssignedRoles as $EveryUser)
              <option value="{{$EveryUser['user_id']}}">
                {{$EveryUser['user_belong']['useremail']}} 
              </option>
            @endforeach
        @else
          <option> No assigned user available in database </option>
        @endif
      </select>
      <br />
      <br />
     <input  type="submit" value="delete signature" class="w3-center" />    
     {{Form::token()}}     
  {{Form::close()}}   
   </div>
  <!-- {{var_dump($OfficialSignatures)}}  -->
   @include('includes.SchoolArray')
 
   @if(  isset($OfficialSignatures) and is_array($OfficialSignatures) )
    @if( is_array($OfficialSignatures) and !empty($OfficialSignatures) )
                      
           <br /><b> Search for anybody on this table: </b> <input type="text" id="search" placeholder="Search this table"></input> <br /><br > 
                <!-- <table id="ColSpanTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <tr> 
                    <th> S/N </th>
                    <th> Staff full name </th>
                    <th> Staff email  </th>
                    <th> Staff Signature  </th>
                  </tr>
                  <?php $Count = 1; ?>
                  @foreach($OfficialSignatures as $EveryOfficialSignatures)
                    <tr> 
                     <?php $Image = $EveryOfficialSignatures['signatureimage'];?> 
                      <td> {{$Count++}} </td>
                      <td> {{ $EveryOfficialSignatures['user_belong']['surname']." ". 
                              $EveryOfficialSignatures['user_belong']['middlename']." ". 
                              $EveryOfficialSignatures['user_belong']['firstname']
                           }} 
                      </td>
                      <td> {{$EveryOfficialSignatures['user_belong']['useremail']}} </td>
                      <td>  {{HTML::image("/Images/Signatures/$Image", '', array('class' => '') )}}</td>      

                    </tr>
                  @endforeach
                </table> -->

                  <table id="ColSpanTable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead style="text-align: center;">
                        <tr> 
                          <th colspan="11" style="text-align: center;"> Public ( Pre-Primary School Enrolment By Class and Age ) </th>
                        </tr>

                         <tr> 
                          <th rowspan="2" style=" vertical-align: middle;"> Pupil age </th>
                          <th colspan="2" class="text-muted"> Kindergarten 1/ECCD  </th>
                          <th colspan="2" class="text-muted"> Kindergarten 2/ECCD  </th>
                          <th colspan="2" class="text-muted"> Nursery 1            </th>
                          <th colspan="2" class="text-muted"> Nursery 2            </th>
                          <th colspan="2" class="text-muted"> Nursery 3            </th>
                        </tr>
                         <tr> 
                          <th> Male                </th>
                          <th> Female              </th>
                          <th> Male                </th>
                          <th> Female              </th>
                          <th> Male                </th>
                          <th> Female              </th>
                          <th> Male                </th>
                          <th> Female              </th>
                          <th> Male                </th>
                          <th> Female               </th>
                        </tr>

                    </thead>
                        <?php 
                              $PrePrimaryCount = 0; // include 
                              //$SchoolArrayUrl =  asset('../app/include/SchoolArray.php');// doesnot work. will fustrate you
                              include app_path()."\\". "views\includes\SchoolArray.php";  // This is the right way 
                         ?>
                        
                          <?php  $PrePrimaryKeys = array_keys($PrePrimary); ?>

                        @foreach($OfficialSignatures as $EveryOfficialSignatures)
                         
                          <tr> 
                           <?php $Image = $EveryOfficialSignatures['signatureimage']; ?> 
                            <td style="font-weight: 900">  {{ $PrePrimary[$PrePrimaryKeys[$PrePrimaryCount++]] }} </td>
                            <td> {{ $EveryOfficialSignatures['user_belong']['surname']}}  </td>
                            <td> {{ $EveryOfficialSignatures['user_belong']['surname'] }} </td>
                            <td> {{ $EveryOfficialSignatures['user_belong']['surname'] }} </td>
                            <td> {{ $EveryOfficialSignatures['user_belong']['surname'] }} </td>
                            <td> {{ $EveryOfficialSignatures['user_belong']['surname'] }} </td>
                            <td> {{ $EveryOfficialSignatures['user_belong']['surname'] }} </td>
                            <td> {{$EveryOfficialSignatures['user_belong']['surname']}} </td>
                            <!-- <td>  {{HTML::image("/Images/Signatures/$Image", '', array('class' => '') )}}</td> -->
                             <td> {{$EveryOfficialSignatures['user_belong']['firstname']}} </td>
                             <td> {{$EveryOfficialSignatures['user_belong']['middlename']}} </td>
                              @if ( $PrePrimaryCount == (count($PrePrimary))  )
                                      <td> &nbsp; </td>
                              @else
                                      <td> {{$EveryOfficialSignatures['user_belong']['surname']}} </td>
                              @endif
                          </tr>
                        @endforeach
                  </table>

                   <table id="ColSpanTable2" class="table table-striped table-bordered" cellspacing="0" width="100%">
                          <tr> 
                            <th> S/N </th>
                            <th> Staff full name </th>
                            <th> Staff email  </th>
                            <th> Staff Signature  </th>
                          </tr>
                          <?php $Count = 1; ?>
                          @foreach($OfficialSignatures as $EveryOfficialSignatures)
                            <tr> 
                             <?php $Image = $EveryOfficialSignatures['signatureimage'];?> 
                              <td> {{$Count++}} </td>
                              <td> {{ $EveryOfficialSignatures['user_belong']['surname']." ". 
                                      $EveryOfficialSignatures['user_belong']['middlename']." ". 
                                      $EveryOfficialSignatures['user_belong']['firstname']
                                   }} 
                              </td>
                              <td> {{$EveryOfficialSignatures['user_belong']['useremail']}} </td>
                              <td>  {{HTML::image("/Images/Signatures/$Image", '', array('class' => '') )}}</td>      

                            </tr>
                          @endforeach
                   </table>

        @else
            <p>No Staff found in database</p>
        @endif
        <!--
           @foreach($OfficialSignatures as $EveryOfficialSignatures)
           <?php $Image = $EveryOfficialSignatures['signatureimage'];?>
              {{HTML::image("/Images/Signatures/$Image", '', array('class' => '') )}}<br />
              {{ $EveryOfficialSignatures['user_belong']['useremail']}}<br />

              {{ $EveryOfficialSignatures['user_belong']['surname']. " ". 
              $EveryOfficialSignatures['user_belong']['firstname']}}<br />
              
            @endforeach-->

            <br />
            <br />
            <br />
  @endif

@stop