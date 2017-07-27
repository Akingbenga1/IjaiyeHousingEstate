@extends('layouts.main')
@section('ShoutOut')
 <span id="Favours"> Favours </span>Purchased Items
@stop


@section('division_container')
@if( is_array($MyTable) and is_array($MySessionList))
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
  			 $foldername = '/Images/Uploads/ProductImages/';
   			 $filepath = $foldername. $MyTable[$listid]['imagename']; 
   		?>
   			{{ HTML::image($filepath, $MyTable[$listid]['itemname'],array('width' => '150px', 'height' => '180px') )}}
   		 </td>
  <td>{{$MyTable[$listid]['itemname']}}</td>
  <td>{{$MyTable[$listid]['itemdescription']}}</td>
  <td> &pound; {{$orderlist['itemprice']}}</td>
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
  <td> <b> &pound; {{$MySessionList['subtotal']}}</b></td>
</tr>
</table> 

@endif
	<a href="{{URL::route('favours-tf')}}" class="KeepShopping"> Continue Shopping </a>
	<a href="{{URL::route('checkout')}}" class="CheckOut"> Check Out >> </a>
@stop