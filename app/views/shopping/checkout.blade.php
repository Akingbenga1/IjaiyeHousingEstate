@extends('layouts.main')
@section('ShoutOut')
 <span id="Favours"> Favours </span> Checkout
@stop


@section('division_container')

<div id="CheckoutPanel">
  <div id="CheckoutImage">
    {{HTML::image('/Images/Icons/Success.png', 'Success.png' ,array('width' => '100px', 'height' => '100px') )}}
  </div>
  <div id="CheckoutMessage">
      <h1>  Thank you, 
      @if(isset($Customer) and is_array($Customer) and (!empty($Customer['firstname'])))
        <b style="color:#e39e1d"> {{$Customer['firstname']}}.</b>
      @else
        <i> <b> 'Customer'. </b> </i>
      @endif
      You are now been Checked out. A comfirmation email has been sent to your email address.
  </div>
</div>

@stop