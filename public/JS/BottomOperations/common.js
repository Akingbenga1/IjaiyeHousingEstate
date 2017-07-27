$(document).ready(function()
 {	
 	//alert("Good");
	//$('#ContactFavours').hide();
	$('#MailToFavour').on('click', function()
		{
			$('#ContactFavours').css('display', 'inline');
			//$('#ContactFavours').hide();	
		});//end on method


	$('#myform').submit(function(){
    $('input:file[value=""]').attr('disabled', true);
	});//end submit stuff

	$('#ContactClose').on('click', function()
			{
				$('#ContactFavours').css('display', 'none');	
			});//end on click method

  	$( '#FormForEmail' ).on( 'submit', function(e) {

 			//e.preventDefault();
        //.....
        //show some spinner etc to indicate operation in progress
        //.....
       // alert( $( '#FirstName' ).val() );
        $.post(
            $( this ).prop( 'action' ),
            {
                "_token": $( this ).find( 'input[name=_token]' ).val(),
                "Name": $( '#FirstName' ).val(),
                "Email": $( '#Email' ).val(),
                "Subject": $( '#Subject' ).val(),
                "Message": $( '#Message' ).val()
            },
            function( data )
            {
            	//var obj = $.parseJSON( data );
            	//alert(data['msg']);
            	 $('#NameError').text(data['NameError']);
            	 $('#EmailError').text(data['EmailError']);
            	 $('#SubjectError').text(data['SubjectError']);
            	 $('#MessageError').text(data['MessageError']);
            	// var whichColor = 
            	 data['ColorCode'] == 'red' ? $('#ContactReply').text(data['msg']).addClass('RedError'):
            	 $('#ContactReply').text(data['msg']).addClass('GreenSuccess');
            	/*$.each(data, function(index, element) 
            				{
            					alert(index);
            					$('#NameError').text(element);
            					$('#EmailError').text(element);
            					$('#SubjectError').text(element);
            					$('#MessageError').text(element);
            				});*/
            	
            },
            'json'
        );
 
        //.....
        //do anything else you might want to do
        //.....
 
        //prevent the form from actually submitting in browser
        return false;
    } );

}//end anon function
);//end ready