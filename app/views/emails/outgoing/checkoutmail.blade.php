<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>

    <img src="<?php echo $message->embed(public_path().'/Images/Logos/favours_logo.png'); ?>" width = '150px'  height = '180px' 
    alt = 'favours_logo.png'  /> 

    <br/>
    <br/>

    <h1>
    
     @if(isset($OurCustomer) and is_array($OurCustomer) and (!empty($OurCustomer['username'])))
         Hi, <b style="color:#e39e1d"> {{$OurCustomer['firstname']}}!</b> <br/>
         These are the items you recently purchased from favours tropical foods.
      @else
        <i> Hi there! </i>
      @endif
    </h1>
	
		@if( isset($MyTable) and  is_array($MyTable) and is_array($MySessionList))
<table border="0" style="width:900px">
	<tr>  
    <th>Item Image</th>  
    <th>Item Name </th>  
    <th>Item Description </th>  
    <th> Price per Item</th>  
    <th> Quantity Purchased</th>  
    <th> Sub Total</th>  
  </tr> 
@foreach($MySessionList as $orderlist )
	@if( is_array($orderlist) and array_key_exists('id', $orderlist) )

<tr>
  <td> <?php $listid = $orderlist['id']; // var_dump($MyTable[$listid]['imagename']);
  			 $foldername = public_path().'/Images/Uploads/ProductImages/';
   			 $filepath = $foldername. $MyTable[$listid]['imagename']; 
   		?>
   			 <img src="<?php echo $message->embed($filepath); ?>" width = '150px'  height = '180px' alt = '{{ $MyTable[$listid]['itemname']}}'  /> 

   		 </td>
  <td>{{$MyTable[$listid]['itemname']}}</td>
  <td>{{$MyTable[$listid]['itemdescription']}}</td>
  <td> &pound;{{$orderlist['itemprice']}}</td>
  <td> <b> {{$orderlist['itemquantity']}} </b></td>
  <td> <b> &pound;{{$orderlist['itemsubtotal']}} </b></td>
</tr>
@endif

@endforeach
<tr>
  <td>Total</td>
  <td> </td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td> <b> &pound;{{$MySessionList['subtotal']}}</b></td>
</tr>
</table> 

@endif

	</body>
</html>