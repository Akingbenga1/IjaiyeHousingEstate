<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>  Products without Valid  Images </h2>

			<div class="StyleEmail" style="color:red; padding:3px; border: 1px solid black;">The Following Product names are
			 found not having images. They were not shown on the item list of favours tropical foods page. 
			Please Rectify them from the <a href ="{{URL::route('get-products-form')}}" >  Admin Page </a>. Thank You.
		</div>
			
			@if( isset($BArray) and is_array($BArray))

			@foreach( $BArray as $noimage)
			<hr/>
				Itemid = {{$noimage['itemid']}} <br />
				Itemname = {{$noimage['itemname']}} <br />
				<hr />
				@endforeach
			@endif

			N.B: You can contact me on: 07404768556 <br/>
			Akinbami Gbenga (Favours Group Website Developer)

			Thank You

			
	</body>
</html>