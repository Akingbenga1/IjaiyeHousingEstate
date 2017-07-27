@extends('layouts.main')
@section('ShoutOut')
 <span id="Favours"> Favours </span>Tourism
@stop

@section('division_container')


<div class = "TopTourRow" id = "TourMessage" > 
<p> Welcome to Favours Tourism </p>

<spn style="color:white"> Call: +44 1642965721; +44 7411004032  </span>
<div> 
Favours, UK provides tourism, holiday and catering services to Africans needing a break from work, 
every day mundane living to exciting sites and locations in the UK and continental Europe. Our joined-up 
services ensures that not only are you off work but also off the worries of whether or not you will find 
Nigerian and Ghanaian foods to eat while away. We will guide your tour and relieve your relatives the trouble 
of leaving their jobs to be available to you. Favours will help you cut cost on accom-modation, shopping, and 
foods and offer ease, convenience and quality holiday experience. Take a label that works!
</div>
</div>
 

<div id="BigTourInfo"> 

<div class="TourInfo1"> 

<div class = "FirstTourRow" id = "TourHotel">
 <p> {{HTML::image("Images/Icons/HotelIcon.png", 'Login', array('width' => '50', 'height' => '50', 'class'=> 'RowIcon'))}}
 Hotel</p> 
 <div> Hotel Accommodation can be arranged. We provide a wide variety from bed and breakfast to
 5-star accommodation in stately buildings located in exquisite environments</div> 
</div>

 <div class = "FirstTourRow"  id = "TourCatering"> 
  <p> {{HTML::image("Images/Icons/Catering.jpg", 'Login', array('width' => '50', 'height' => '50', 'class'=> 'RowIcon'))}} 
  	Catering</p>
   <div>Dis no be joke o! Okro soup, edikainkon, pounded yam, dodo and even golden morn for the kids.
  We can mix this with jacket potato, pizza, English breakfast and kebab. Just ask for what you want! </div></div>
</div>

<div class="TourInfo1"> 
  <div class = "SecondTourRow" id = "TourShopping"> 
   <p> {{HTML::image("Images/Icons/RedCart.png", 'Login', array('width' => '50', 'height' => '50', 'class'=> 'RowIcon'))}} 
   	Shopping</p>
    <div>Tell us what you want and we’ll take you to the most suitable malls, parks and high streets.
  When all is done, we get back VAT on your shopping into your account so you </div> </div>

  <div class = "SecondTourRow" id = "TourTour"> 
  	<p> {{HTML::image("Images/Icons/Tour.png", 'Login', array('width' => '50', 'height' => '50', 'class'=> 'RowIcon'))}}
  	 Tour</p> 
  	<div> Your UK family and friends are very busy. Spare them the trouble and let us take you around in private cars,
   minibuses and coaches. We definitely go further than family and friends without losing the personal touch.</div> </div>
</div>
</div>



@stop


@section('eail')
<form action="{{URL::route('email_favours')}}" class="MailToFavour">
<input type="text" name="FirstName" placeholder="Your Name" /><br />
<input type="text" name="Subject" placeholder="Message Subject" /><br />
<textarea name="Message" placeholder="Your message here, please"></textarea><br />
 <button type="submit" class="SendEmail"> Send Email to favours </button>
 </form>
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