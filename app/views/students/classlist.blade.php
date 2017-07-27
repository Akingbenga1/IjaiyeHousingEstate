@extends('layouts.main')


@section('division_container')
 
  @if(isset($ChoosenTerm) and is_array($ChoosenTerm))
       <h3> List of classes in  {{ $ChoosenTerm['Class']." ". 
          $ChoosenTerm['Year'].'/'. ($ChoosenTerm['Year'] + 1) ." session" }} 
      </h3>    
      @if( $ChoosenTerm['Class'] === "SS1")
        <div class="ClassesLink">
         <div>
                           <a href="{{URL::route('public-student-term-list-page',
                                    array('Year' => '2015', 'Class' => 'SS1', 
                                    'SubClass' => 'A'))}}"> SS1 A 
                            </a>

                            <a href="{{URL::route('public-student-term-list-page',
                                    array('Year' => '2015', 'Class' => 'SS1', 
                                    'SubClass' => 'B'))}}"> SS1 B 
                            </a>

                            <a href="{{URL::route('public-student-term-list-page',
                                    array('Year' => '2015', 'Class' => 'SS1', 
                                    'SubClass' => 'C'))}}"> SS1 C
                            </a>

                             <a href="{{URL::route('public-student-term-list-page',
                                    array('Year' => '2015', 'Class' => 'SS1', 
                                    'SubClass' => 'D'))}}"> SS1 D 
                            </a>

                            <a href="{{URL::route('public-student-term-list-page',
                                    array('Year' => '2015', 'Class' => 'SS1', 
                                    'SubClass' => 'E'))}}"> SS1 E 
                            </a>
                      </div>

                      <div>

                            <a href="{{URL::route('public-student-term-list-page',
                                    array('Year' => '2015', 'Class' => 'SS1', 
                                    'SubClass' => 'F'))}}"> SS1 F 
                            </a>

                            <a href="{{URL::route('public-student-term-list-page',
                                    array('Year' => '2015', 'Class' => 'SS1', 
                                    'SubClass' => 'G'))}}"> SS1 G
                            </a>

                             <a href="{{URL::route('public-student-term-list-page',
                                    array('Year' => '2015', 'Class' => 'SS1', 
                                    'SubClass' => 'H'))}}">  SS1 H
                            </a>

                             <a href="{{URL::route('public-student-term-list-page',
                                    array('Year' => '2015', 'Class' => 'SS1', 
                                    'SubClass' => 'I'))}}" class="DontGo"> SS1 I
                            </a>

                             <a href="{{URL::route('public-student-term-list-page',
                                    array('Year' => '2015', 'Class' => 'SS1', 
                                    'SubClass' => 'J'))}}"> SS1 J
                            </a>
                      </div>

                      <div>
                          

                            <a href="{{URL::route('public-student-term-list-page',
                                    array('Year' => '2015', 'Class' => 'SS1', 
                                    'SubClass' => 'K'))}}"> SS1 K 
                            </a>

                      </div>
                </div>

                      
        @elseif($ChoosenTerm['Class'] === "SS2")
        <div class="ClassesLink">

          <div>
                           <a href="{{URL::route('public-student-term-list-page',
                                    array('Year' => '2015', 'Class' => 'SS2', 
                                    'SubClass' => 'A'))}}"> SS2 A 
                            </a>

                            <a href="{{URL::route('public-student-term-list-page',
                                    array('Year' => '2015', 'Class' => 'SS2', 
                                    'SubClass' => 'B'))}}"> SS2 B 
                            </a>

                            <a href="{{URL::route('public-student-term-list-page',
                                    array('Year' => '2015', 'Class' => 'SS2', 
                                    'SubClass' => 'C'))}}"> SS2 C
                            </a>

                              <a href="{{URL::route('public-student-term-list-page',
                                    array('Year' => '2015', 'Class' => 'SS2', 
                                    'SubClass' => 'D'))}}">SS2 D
                            </a>
                            <a href="{{URL::route('public-student-term-list-page',
                                    array('Year' => '2015', 'Class' => 'SS2', 
                                    'SubClass' => 'E'))}}">SS2 E
                            </a>
                      </div>

                      <div>
                           <a href="{{URL::route('public-student-term-list-page',
                                    array('Year' => '2015', 'Class' => 'SS2', 
                                    'SubClass' => 'F'))}}"> SS2 F
                            </a>

                           
                      </div>
              </div>

      @endif
  


  @endif
@stop