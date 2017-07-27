@extends('layouts.main')  
@section('ShoutOut')
 <span id="Favours"> Favours </span>Tropical Foods  
@stop
 
@section('division_container')

<div id="ImageContainer"><!-- ImageContainer -->

@if(is_array($ItemList))    
 @foreach( $ItemList as $items)
 
   <?php 
        $count = 1;
        $foldername = '/Images/Uploads/ProductImages/';
        $filepath = $foldername. $items['imagename']; 
    ?>
    <div class = 'EachImage' id='ImageClass{{$count}}'>

    <a href="{{URL::action('product-details', array('buyid'=> $items['itemid']) )}}" 
    class='' id ='' alt ='{{$items['itemname']}}' >
    {{HTML::image($filepath, $items['imagename'])}}
    </a>
       {{$items['itemname']}} <br/> &pound; {{$items['itemprice']}} | {{$items['quantity']}} available 
       <a href="{{URL::action('product-details', array('buyid'=> $items['itemid']) )}}" 
    class='UtilityIconsTop' id ='FirstTop' alt ='{{$items['itemname']}}' > 
    buy</a>
    </div>
    <?php $count++;?>

  @endforeach
@endif

</div><!-- /ImageContainer -->
@stop

@section('RightPanel')
<!-- RightPanel --> <div id="RightPanel">

<!-- PushMeDown --><div id="PushMeDown">

    <!-- CategoryBox --><div id="CategoryBox"> 
        <!-- CategoryName--><div id="CategoryName">
                                <p>  Categories </p>
       <!-- CategoryName --> </div>

        <!--    --><div id="CategoryList">
                     @if (isset($AllCat) and is_array($AllCat)) 
                          @for ($i = 0; $i < count($AllCat); $i++)   
                              <li>  <a href="{{URL::route('favours-tf')}}"> {{$AllCat[$i]['categoryname'] }}</a></li>                           
                        @endfor
                     @else
                     <h1> Sorry! Unable to Load Categories </h1>
                     @endif
    <!-- /-->    </div>
    <!-- /CategoryBox --></div>
    <!-- /CategoryBox --><div id="FacebookPage">
                           

                               <div class="fb-like-box" data-href="https://www.facebook.com/FavoursTropicalFoods" data-width="435" data-height="360" data-colorscheme="light" data-show-faces="false" data-header="true" data-stream="true" data-show-border="false"></div>
                           
    <!-- /CategoryBox --></div>
<!-- /PushMeDown --></div>

<!-- /RightPanel --></div>
@stop

@section('EmilSubcription')
<form action="{{URL::route('email-subscription')}}" >
<h1> Subscribe ! </h1>
<h4> Subscribe with us and receive news letters every day </h4>
Your Name: <input type="text" name="FirstName"/><br />
Your Email: <input type="text" name="SubscriberEmail"  /><br />
 <button type="submit" class=""> Subcribe! </button>
 </form>
 @stop