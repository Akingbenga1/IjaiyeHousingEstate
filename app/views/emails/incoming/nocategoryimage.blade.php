<!DOCTYPE html>
	<html lang="en-US">
		<head>
			<meta charset="utf-8">
		</head>
		<body>
			<h2> Category without valid images </h2>
			<div class="StyleEmail" style="color:red; padding:3px; border: 1px solid black;">
				This Product Category does not have any image attached to it. 
				This Category was not shown in the category list on the favours tropical food page. 
				Please Rectify them from the <a href ="{{URL::route('category-edit-form')}}" >  Add Category Page </a>. Thank You.
			</div>
			
			@if( isset($BArray) and is_array($BArray))

				@foreach( $BArray as $noimage)
					<hr/>
					category name : {{$noimage['categoryname']}} <br />
					category description : {{$noimage['categorydescription']}} <br />
					
					<hr />
				@endforeach
			@endif

			N.B: You can contact me at akinbami.gbenga@gmail.com  <br/>
			Akinbami Gbenga (Favours Group Website Developer)

			Thank You			
		</body>
	</html>