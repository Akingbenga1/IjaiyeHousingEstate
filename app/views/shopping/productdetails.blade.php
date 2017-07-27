@extends('layouts.main')
@section('ShoutOut')
 <span id="Favours"> Favours </span>Product Details 
@stop

@section('division_container')

@if(isset($ItemArray))
@endif

<!-- very important do not touch  -->
@if(!(Input::has('buyid')))
	<?php $b = Session::get('cart.lastitemid');  ?> 
	@else
	<?php $b = Input::get('buyid');  ?>
@endif


@if(is_array($ThisItem))

<?php 
	$foldername = '/Images/Uploads/ProductImages/';
    $filepath = $foldername. $ThisItem['imagename'];
 ?>
 <h1>{{$ThisItem['itemname']}} </h1>
<div class="ItemInfo"><!-- ItemInfo -->   
	<!-- ItemImage --><div id="ItemImage" class="Details">
		{{HTML::image($filepath, $ThisItem['itemname'], array( 'width' => '250px',  'height' => '250px'))}} 
	<!-- /ItemImage --></div>

	<!-- Itemdetails --><div id="Itemdetails" class="Details">
		Item Name: {{$ThisItem['itemname']}}
		<hr />
		Item Description: {{$ThisItem['itemdescription']}}
		<hr />
		Item Details: {{$ThisItem['itemdetails']}}
		<hr/>
		Item Price: &pound; {{$ThisItem['itemprice']}}
		<hr />
	<!-- /Itemdetails --></div>

	<!-- ItemForm --><div id="ItemForm" class="Details">
		<form action ="{{URL::route('basket-list')}}"  method = 'post'>
			<input type ="hidden" name="buyid" value= "{{$b}}" />
			Quantity Needed: {{ Form::selectRange('ItemQuantity', 1, 30, null, array('class' => 'SelectQuantity')) }}
			<input type = "submit" value = "buy" name ="BuyButton" />
			{{Form::token()}}
		</form>
		@if(Session::has('cart'))
		<a href="{{URL::route('favours-tf')}}" class="KeepShopping"> Continue Shopping </a>
		<a href="{{URL::route('checkout')}}" class="CheckOut"> Check Out >> </a>
		@endif
<!-- ItemForm --></div>

</div> <!-- /ItemInfo -->
@endif
@stop