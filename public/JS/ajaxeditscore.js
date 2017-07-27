$(document).ready(function()
	  {    

      $.ajaxSetup({  headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')  }    });
      $(function () {$('.SaveScoreButton').on("click", function (e) 
    				{ e.preventDefault(); 
                        var SubjectId = $(this).siblings('input:hidden').val();
                        var CAScoreVal = $(this).parents().eq(1).children('td')
                                        .find('input[type="text"][name="CAScore"]').val();
                        var ExamVal = $(this).parents().eq(1).children('td')
                                        .find('input[type="text"][name="ExamScore"]').val();
                        var StudentId = $(".ScoreStudentId").val();
                        var Year = $(".ScoreYear").val();
                        var Class = $(".ScoreClass").val();
                        var Term = $(".ScoreTerm").val();
                        var SubClass = $(".ScoreSubClass").val();
                         var signatureimageid =  $(this).parents().eq(1).children('td')
                                  .find('img').prop('alt');
    					$.ajax({
								  type: 'POST',
								  url:  $(".AjaxScoreForm").prop('action'),
								  dataType: 'json',
								  data: {'SubjectId': SubjectId, 'CAScore': CAScoreVal, 'ExamScore': ExamVal,
                                          'Year' : Year, 'TermName' : Term, 'SubClass': SubClass, 'Class':Class,
                                          'StudentId': StudentId, 'SignatureImageID': signatureimageid },//$(this).parent().serialize(),
								  success: function(response, textStatus)
								    		{		var MassMsg = '';								
        										   if( response.status === 1 )
        										   {
        										   	alert(response.msg);
                               // window.location.reload();
        										   	}//end if statement
        										   	else if(response.status === 0 )
        										   	{ $.each(response, function(index,value)
        										   	  	{
        										   	  		if( (index !=='msg') && (index !=='status')  ) 
        										   	  	        MassMsg += "<br/>" + value 
        									  			      });
        									  			 //
        									   			alert(MassMsg);
        										   		alert(response.msg);
        										   	}//end else statement
        										   	else{}
                                  console.log(response);
                                    window.location.reload();
													 },
											error: function(xhr, textStatus, errorThrown) 
													{
														alert('Bad response. Reloading the page...');
                             console.log(xhr);
                             console.log(textStatus);
                             console.log(errorThrown);
                             window.location.reload();
													}
										});//end ajax
							});//end anon function   
					  });
      $(function () {$('.DeleteScoreButton').on("click", function (e) 
                    { 
                        e.preventDefault(); 
                        var SubjectId = $(this).siblings('input:hidden').val();
                        var CAScoreVal = $(this).parents().eq(1).children('td')
                                        .find('input[type="text"][name="CAScore"]').val();
                        var ExamVal = $(this).parents().eq(1).children('td')
                                        .find('input[type="text"][name="ExamScore"]').val();
                        var StudentId = $(".ScoreStudentId").val();
                        var Year = $(".ScoreYear").val();
                        var Class = $(".ScoreClass").val();
                        var Term = $(".ScoreTerm").val();
                        var SubClass = $(".ScoreSubClass").val();
                         var ActionUrl  = $(this).parents().eq(1).children('td')
                                        .find('input[type="hidden"][name="DeleteUrl"]').val();
                        $.ajax({
                                  type: 'POST',
                                  url:  ActionUrl,
                                  dataType: 'json',
                                  data: {'SubjectId': SubjectId, 'CAScore': CAScoreVal, 'ExamScore': ExamVal,
                                          'Year' : Year, 'TermName' : Term, 'SubClass': SubClass, 'Class':Class,
                                          'StudentId': StudentId },//$(this).parent().serialize(),
                                  success: function(response, textStatus)
                                            {       var MassMsg = ''    ;                          
                                                   if( response.status === 1 )
                                                   {
                                                    alert(response.msg);
                                                      window.location.reload();
                                                    }//end if statement
                                                    else if(response.status === 0 )
                                                    {$.each(response, function(index,value)
                                                        {
                                                            if( (index !=='msg') && (index !=='status')  ) 
                                                          MassMsg += "<br/>" + value
                                                        });
                                                        alert(MassMsg);
                                                        alert(response.msg);
                                                    }//end else statement
                                                    else if(response.status === 2 )
                                                         { 
                                                            alert(response.msg);
                                                         }
                                                    else{}
                                                     },
                                            error: function(xhr, textStatus, errorThrown) 
                                                    {
                                                        alert('Bad response. Please reload the page');
                                                        window.location.reload();
                                                    }
                                        });//end ajax
                            });//end anon function   
                      });    	
		  $(function () {$('.SaveAllScoreButton, #SaveAllScoreButtonDown').on("click", function (e) 
                    { 
                        e.preventDefault(); 
                        var StudentId = $(".ScoreStudentId").val();
                        var Year = $(".ScoreYear").val();
                        var Class = $(".ScoreClass").val();
                        var Term = $(".ScoreTerm").val();
                        var SubClass = $(".ScoreSubClass").val();
                         var ActionUrl  = $('.SaveAllUrl').val();
                         var count = 0;
                         var SubjectScore =  {};
                          var val;
                        $( '.ScoreInputTable  tr td  .SubjectIdSave' ).each(function( index, Element ) {
                         
                          if( $(this).parents().eq(1).children('td').find('input[type="text"][name="CAScore"]').val() 
                              !="" && $(this).parents().eq(1).children('td').find('input[type="text"][name="ExamScore"]')
                              .val() !="" 
                            )
                               {
                                  var ca =    $(this).parents().eq(1).children('td')
                                  .find('input[type="text"][name="CAScore"]').val();
                                  var ex =   $(this).parents().eq(1).children('td')
                                  .find('input[type="text"][name="ExamScore"]').val();
                                  val  = $(this).val();
                                  var signatureimageid =  $(this).parents().eq(1).children('td')
                                  .find('img').prop('alt');
                                  console.log(signatureimageid);

                                  SubjectScore[val] =  {'SubjectId' :  $(this ).attr('value'), 
                                  'CAScore': ca, 'ExamScore': ex,'Year' : Year, 'TermName' : Term,
                                          'SubClass': SubClass, 'Class':Class,
                                          'StudentId': StudentId, 'SignatureImageID': signatureimageid} ;
                                  count++;
                                }
                    });
                          // console.log( count );
                        //console.log(SubjectScore);
                        $.ajax({
                                  type: 'POST',
                                  url:  ActionUrl,
                                  dataType: 'json',
                                  data: {"SubjectScore" : SubjectScore },
                                  success: function(response, textStatus)
                                            {  
                                              $('.ReortScoreInput').html("<b> Student Scores Successfully Saved/Editted</b><br/>" +
                                                                          "<b>Please note:</b> If the CA is greater than 40 " +
                                                                          "marks or Exam is greater than 60 marks,No action will" +
                                                                          " be performed by the system <b> for the particular" +
                                                                          " subject only</b>");
                                               //console.log(response);
                                              window.location.reload();
                                             /*  $.each(response.SubjectScore, function(index,value)
                                                        {
                                                           // if( (index !=='msg') && (index !=='status')  ) 
                                                          //MassMsg += "<br/>" + value
                                                           $.each(value, function(index,value){
                                                            console.log(index + "=>" + value)
                                                           });
                                                          
                                                        });
                                                 var MassMsg = ''    ;                          
                                                   if( response.status === 1 )
                                                   {
                                                    alert(response.msg);
                                                      //window.location.reload();
                                                    }//end if statement
                                                    else if(response.status === 0 )
                                                    {$.each(response, function(index,value)
                                                        {
                                                            if( (index !=='msg') && (index !=='status')  ) 
                                                          MassMsg += "<br/>" + value
                                                        });
                                                        alert(MassMsg);
                                                        alert(response.msg);
                                                    }//end else statement
                                                    else if(response.status === 2 )
                                                         { 
                                                            alert(response.msg);
                                                         }
                                                    else{}*/
                                                     },
                                            error: function(xhr, textStatus, errorThrown) 
                                                    {
                                                        alert('Bad response. Reloading the page...');
                                                        console.log(xhr);
                                                        console.log(textStatus);
                                                        console.log(errorThrown);
                                                        window.location.reload();
                                                    }
                                        });//end ajax
                            });//end anon function   
                      });     
      $('.SignaturesPool').hide();
       $(function () {$('.CloseSignaturePanel').on("click", function (e) 
                    {   $('.SignaturesPool').hide(); }) });
      $(function () {$('.TeacherSignature').on("click", function (e) 
                    { 
                       e.preventDefault();                        
                        var MyPosition = $(this).position();
                        console.log(MyPosition.top);
                        console.log(MyPosition.left);
                        
                          $('.SignaturesPool').css({"width":"300px",  "position" : "absolute", 
                                                    "top":  MyPosition.top, "left" : (MyPosition.left - 400 ),
                                                    "z-index" : 1000});
                        $('.SignaturesPool').show();
                        $('.SignaturesPool IMG').draggable({ revert: 'invalid', 
                                                             containment: "html", helper: "clone", appendTo: 'body',});
                        $('.SignaturesPool').bind('mousewheel DOMMouseScroll', function(e) 
                              {
                                 var scrollTo = null;
                                 if (e.type == 'mousewheel') 
                                   {
                                      scrollTo = (e.originalEvent.wheelDelta * -1);
                                   }
                                  else if (e.type == 'DOMMouseScroll') 
                                   {
                                      scrollTo = 40 * e.originalEvent.detail;
                                   }

                                  if (scrollTo)
                                   {
                                      e.preventDefault();
                                      $(this).scrollTop(scrollTo + $(this).scrollTop());
                                   }
                          });

                        $( '.TeacherSignature' ).droppable({ accept: ".SignaturesPool IMG" });                       
                            });//end anon function   */
                       
                      });  
      $('.TeacherSignature').on( "drop", function( event, ui )
      {
            console.log(ui);
            var img = $('<img >'); 
            img.width(ui.draggable[0]['naturalWidth']);
            img.height(ui.draggable[0]['naturalHeight']);
            img.attr('src', ui.draggable[0]['currentSrc']);
            img.attr('alt', ui.draggable[0]['alt']);
           console.log(img);
              $(this).find(".TeacherSignatureDefault").hide();
              
                     $(this).find("img").remove();
                     $(this).append(img);                                        
      });     
      //date picker function  
      $(".ClassTeacherDate, .PrincipalDate, .ParentDate,.TermBegins,.TermEnd,.NextTermBegins").datepicker(
        {dateFormat: "dd/mm/yy", 'showButtonPanel': false, });
      $(function () {$('.SaveOfficialComments').on("click", function (e) 
                    { 
                        e.preventDefault(); 
                        var StudentId = $(".ScoreStudentId").val();
                        var Year = $(".ScoreYear").val();
                        var Class = $(".ScoreClass").val();
                        var Term = $(".ScoreTerm").val();
                        var SubClass = $(".ScoreSubClass").val();

                        var ActionUrl  =  $(".OfficialCommentsForm").prop('action');
                        var ClassTeacherComment = $(".ClassTeacherComment").val();

                        var ClassTeacherDate    = $(".ClassTeacherDate").val().split('/')[2]+ '-' + 
                        $(".ClassTeacherDate").val().split('/')[1] + '-' +
                         $(".ClassTeacherDate").val().split('/')[0];

                        var PrincipalCommentText    =  $(".PrincipalCommentText").val();

                        var PrincipalDate       = $(".PrincipalDate").val().split('/')[2]+ '-' + 
                        $(".PrincipalDate").val().split('/')[1] + '-' +
                         $(".PrincipalDate").val().split('/')[0];

                        var ParentDate       =    $(".ParentDate").val().split('/')[2]+ '-' + 
                        $(".ParentDate").val().split('/')[1] + '-' +
                         $(".ParentDate").val().split('/')[0];

                         $('.TeacherSignature').on( "drop", function( event, ui )
                                      {
                                        console.log(ui);
                                        var img = $('<img >'); //Equivalent: $(document.createElement('img'))
                                        img.width(ui.draggable[0]['naturalWidth']);
                                        img.height(ui.draggable[0]['naturalHeight']);
                                        // console.log(ui.draggable[0]['currentSrc']);
                                        img.attr('src', ui.draggable[0]['currentSrc']);
                                        img.attr('alt', ui.draggable[0]['alt']);
                                        // img.appendTo('#imagediv');
                                        console.log(img);

                                        $(this).find(".TeacherSignatureDefault").hide();
                                        
                                               $(this).find("img").remove();
                                               $(this).append(img);                                        
                                      });    
                           console.log( ActionUrl );
                           console.log(ClassTeacherComment);
                            console.log(ClassTeacherDate);
                             console.log(PrincipalCommentText);
                              console.log(PrincipalDate);

                              var ClassTeacherSignature =  $("#ClassTeacherSignature").find('img').prop('alt');
                              var PrincipalSignature    =  $("#PrincipalSignature").find('img').prop('alt');
                              var ParentSignature       =  $("#ParentSignature").find('img').prop('alt');

                              console.log(ClassTeacherSignature);
                              console.log(PrincipalSignature);
                              console.log(ParentSignature);
                        $.ajax({
                                  type: 'POST',
                                  url:  ActionUrl,
                                  dataType: 'json',
                                  data: { 'Year' : Year, 'TermName' : Term,
                                          'SubClass': SubClass, 'Class':Class,
                                          'StudentId': StudentId, 'ClassTeacherSignature': ClassTeacherSignature,
                                           'PrincipalSignature': PrincipalSignature, 'ParentSignature': ParentSignature,
                                            'ClassTeacherComment': ClassTeacherComment, 'ClassTeacherDate': ClassTeacherDate,
                                             'PrincipalCommentText': PrincipalCommentText, 'PrincipalDate': PrincipalDate,
                                             'ParentDate': ParentDate
                                        },
                                  success: function(response, textStatus)
                                            {  
                                               console.log(response);
                                               window.location.reload();                                            
                                                     },
                                            error: function(xhr, textStatus, errorThrown) 
                                                    {
                                                        alert('Bad response. Reloading the page...');
                                                        console.log(xhr);
                                                        console.log(textStatus);
                                                        console.log(errorThrown);
                                                        window.location.reload();
                                                    }
                                        });//end ajax
                            });//end anon function   
                      });     
      $(function () {$('.SaveAttendanceButton').on("click", function (e) 
                    { 
                        e.preventDefault(); 
                        var StudentId = $(".ScoreStudentId").val();
                        var Year = $(".ScoreYear").val();
                        var Class = $(".ScoreClass").val();
                        var Term = $(".ScoreTerm").val();
                        var SubClass = $(".ScoreSubClass").val();

                        var ActionUrl  =  $(".AjaxScoreAttendance").prop('action');

                        var SchoolOpen = $(".SchoolOpen").val();
                        var DaysPresent    =  $(".DaysPresent").val();
                        var DaysAbent    =  $(".DaysAbent").val();

                           console.log( ActionUrl );
                           console.log(SchoolOpen);
                            console.log(DaysPresent);
                             console.log(DaysAbent);
                        $.ajax({
                                  type: 'POST',
                                  url:  ActionUrl,
                                  dataType: 'json',
                                  data: { 'Year' : Year, 'TermName' : Term,
                                          'SubClass': SubClass, 'Class':Class,
                                          'StudentId': StudentId, 'SchoolOpen': SchoolOpen,'DaysPresent': DaysPresent,
                                           'DaysAbent': DaysAbent},
                                  success: function(response, textStatus)
                                            {  
                                              console.log(response);
                                              window.location.reload();                                            
                                                     },
                                            error: function(xhr, textStatus, errorThrown) 
                                                    {
                                                        alert('Bad response. Reloading the page...');
                                                        console.log(xhr);
                                                        console.log(textStatus);
                                                        console.log(errorThrown);
                                                        window.location.reload();
                                                    }
                                        });//end ajax
                            });//end anon function   
                      });     
      $(function () {$('.SaveTermDurationButton').on("click", function (e) 
                    { 
                        e.preventDefault(); 
                        var StudentId = $(".ScoreStudentId").val();
                        var Year = $(".ScoreYear").val();
                        var Class = $(".ScoreClass").val();
                        var Term = $(".ScoreTerm").val();
                        var SubClass = $(".ScoreSubClass").val();

                        var ActionUrl  =  $(".AjaxScoreTermDuration").prop('action');

                        
                          var TermBegins  =   $(".TermBegins").val().split('/')[2]+ '-' + 
                                              $(".TermBegins").val().split('/')[1] + '-' +
                                              $(".TermBegins").val().split('/')[0];

                          var TermEnd     =   $(".TermEnd").val().split('/')[2]+ '-' + 
                                              $(".TermEnd").val().split('/')[1] + '-' +
                                              $(".TermEnd").val().split('/')[0];

                          var NextTermBegins  =   $(".NextTermBegins").val().split('/')[2]+ '-' + 
                                                  $(".NextTermBegins").val().split('/')[1] + '-' +
                                                  $(".NextTermBegins").val().split('/')[0];

                           console.log( ActionUrl );
                           console.log(TermBegins);
                            console.log(TermEnd);
                             console.log(NextTermBegins);
                        $.ajax({
                                  type: 'POST',
                                  url:  ActionUrl,
                                  dataType: 'json',
                                  data: { 'Year' : Year, 'TermName' : Term,
                                          'SubClass': SubClass, 'Class':Class,
                                          'StudentId': StudentId, 'TermBegins': TermBegins,'TermEnd': TermEnd,
                                           'NextTermBegins': NextTermBegins},
                                  success: function(response, textStatus)
                                            {  
                                              console.log(response);
                                              window.location.reload();                                            
                                            },
                                  error: function(xhr, textStatus, errorThrown) 
                                            {
                                              alert('Bad response. Reloading the page...');
                                              console.log(xhr);
                                              console.log(textStatus);
                                              console.log(errorThrown);
                                              window.location.reload();
                                            }
                                        });//end ajax
                            });//end anon function   
                      });      
      
       $(function () {$('.ChangeClassYear').on("click", function (e) 
                    { 

                        e.preventDefault(); 
                        var StudentId =  $(this).parents().eq(0).find('input[type="hidden"][name="PromotionStudentId"]').val() ;
                        //PromotionStudentId
                        var Year = $(".CurrentYear").val(); // From PHP Session
                        var OldClass =  $(".OldClass").val();
                        var NewClass =  $(this).parents().eq(0).find(".ClassSelect")[0]['textContent'];//Do not trust this code, its an hack
                        var SubClass = $(this).parents().eq(0).find(".SubClassSelect")[0]['textContent'];//Do not trust this clode, its an hack

                        var ActionUrl  =  $(".ChangeClassURL").val().replace(/\/$/, ""); // You must remove trailing slashes 
                                                                                         // to avoid 404 errors that you cant see;                       
                         
                           data = { 'Year' : Year,
                                    'SubClass': SubClass, 
                                    'OldClass':OldClass,
                                    'NewClass':NewClass,
                                    'StudentId': StudentId 
                                  }

                           //console.log( ActionUrl );
                           console.log( $(this));
                            
                        $.ajax({
                                  type: 'POST',
                                  url:  ActionUrl,
                                  dataType: 'json',
                                  data: data,
                                  success: function(response, textStatus)
                                            {  
                                              console.log(response);
                                              var errortext =" ";
                                               if(response.status == 1)
                                                  {
                                                      $.each(response.ChangeClassInfo, function(index,value)
                                                      {                                      
                                                              errortext +=  value + " ";
                                                       });
                                                     alert(errortext);
                                                     window.location.reload();
                                                  }
                                                else if(response.status == 0)
                                                  {
                                                      $.each(response.ChangeClassInfo, function(index,value)
                                                      {                                      
                                                              errortext +=  value + " ";
                                                       });
                                                     alert(errortext);
                                                  }
                                              //window.location.reload();                                            
                                            },
                                  error: function(xhr, textStatus, errorThrown) 
                                            {
                                              alert('Bad response. Reloading the page...');
                                              console.log(xhr);
                                              console.log(textStatus);
                                              console.log(errorThrown);
                                              //window.location.reload();
                                            }
                                        });//end ajax
                            });//end anon function   
                      });      
      $(function () {$('.PromoteStudent').on("click", function (e) 
                          { 
                              e.preventDefault(); 
                              var StudentId =  $(this).parents().eq(1).find('input[type="hidden"][name="PromotionStudentId"]').val() ;
                              var Year = 2016; //Year Hard Coded
                              var Class =  $(this).parents().eq(3).find(".ClassSelect")[0]['textContent']; // Dont trust this code. Its an hack
                              var SubClass = $(this).parents().eq(3).find(".SubClassSelect")[0]['textContent']; // Dont trust this code. Its an hack
                              

                              var ActionUrl  =  $(".PromotionURL").val().replace(/\/$/, ""); // You must remove trailing slashes 
                                                                                             // to avoid 404 errors that you cant see
                               
                                 data = { 'Year' : Year,'SubClass': SubClass, 'Class':Class,'StudentId': StudentId }
                                  //site.replace(/\/$/, "");
                                 //console.log( ActionUrl.replace(/\/$/, "") );
                                 //alert(ActionUrl);

                                 //console.log(data);
                                 
                                  
                              $.ajax({
                                        type: 'POST',
                                        url:  ActionUrl , //"http://localhost/PROJECT/IjayeHousingEstate/IjayeHousingEstate/public/PromoteThisStudent/",
                                        dataType: 'json',
                                        data: data,
                                        success: function(response, textStatus)
                                                  {  
                                                    console.log(response);
                                                    var errortext =" ";
                                               if(response.status == 1)
                                                  {
                                                      $.each(response.PromotionInfo, function(index,value)
                                                      {                                      
                                                              errortext +=  value + " ";
                                                       });
                                                     alert(errortext);
                                                     window.location.reload();
                                                  }
                                                else if(response.status == 0)
                                                  {
                                                      $.each(response.PromotionInfo, function(index,value)
                                                      {                                      
                                                              errortext +=  value + " ";
                                                       });
                                                     alert(errortext);
                                                  }
                                                   // window.location.reload();                                            
                                                  },
                                        error: function(xhr, textStatus, errorThrown) 
                                                  {
                                                    alert('Bad response. Reloading the page...');
                                                    console.log(xhr);
                                                    console.log(textStatus);
                                                    console.log(errorThrown);
                                                    //window.location.reload();
                                                  }
                                              });//end ajax
                                  });//end anon function   
                            });      
      
      $(function () {$('.GraduateStudent').on("click", function (e) 
                          { 
                              e.preventDefault(); 
                              var StudentId =  $(this).parents().eq(0).find('input[type="hidden"][name="GraduationStudentId"]').val();
                              var ActionUrl  =  $(".GraduationURL").val().replace(/\/$/, ""); 
                              //console.log(StudentId);
                              data = { 'StudentId': StudentId };
                              $.ajax({
                                        type: 'POST',
                                        url:  ActionUrl,
                                        dataType: 'json',
                                        data: data,
                                        success: function(response, textStatus)
                                                  {  
                                                    //.console.log(response);
                                                    var errortext =" ";
                                               if(response.status == 1)
                                                  {
                                                      $.each(response.PromotionInfo, function(index,value)
                                                      {                                      
                                                              errortext +=  value + " ";
                                                       });
                                                     alert(errortext);
                                                     window.location.reload();
                                                  }
                                                else if(response.status == 0)
                                                  {
                                                      $.each(response.PromotionInfo, function(index,value)
                                                      {                                      
                                                              errortext +=  value + " ";
                                                       });
                                                     alert(errortext);
                                                  }
                                                   // window.location.reload();                                            
                                                  },
                                        error: function(xhr, textStatus, errorThrown) 
                                                  {
                                                    alert('Bad response. Reloading the page...');
                                                    console.log(xhr);
                                                    console.log(textStatus);
                                                    console.log(errorThrown);
                                                    //window.location.reload();
                                                  }
                                              });//end ajax
                                  });//end anon function   
                          });      
	  }//end anon function
	  );//end ready