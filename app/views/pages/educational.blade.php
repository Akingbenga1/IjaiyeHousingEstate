@extends('layouts.main')
@section('ShoutOut')
 <span id="Favours"> Favours </span>Educational  
@stop


@section('division_container')

<div>

	<div id="EduImageGrid">
		<div class="TopImages"> 
			{{HTML::image('/Images/Educational/Edu2.jpg', 'Edu1.jpg', array('id'=>"FirstEduImage") )}}
		</div>
		<div class="TopImages">
			{{HTML::image('/Images/Educational/Edu1.jpg', 'Edu2.jpg', array('id'=>"SecondEduImage") )}}
		</div>
		<div class="TopImages">
			{{HTML::image('/Images/Educational/Edu3.jpg', 'Edu2.jpg', array('id'=>"ThirdEduImage") )}}
		</div>
	</div>


<div id="EduMissionLeft" class="PushMissionLeft">  

<p id = "MissionTitle">  Our Mission </p>
<div id="MissionTalk"> 
<p>
Favours Educational, popularly known as Favours, under Favours Group, 
intends to provide care and educational activities for young children from ages 2-12 years and prepare students for GCSC. 
Our business focus is on educational outcomes defined by our service users, delivered in individualized packages 
by our dedicated staff with the goal to exceed national and local attainments. 
We are driven by the philosophy that childcare and educational outcomes can only be achieved through determined efforts. 
We place great premium on staff skills,
knowledge and the competences needed to deliver highest quality care and educational services. 
</p>
<br/>
<p>  
To this end, staff training and support is key to our strategic success in business as much as is the promotion of the 
social and corporate responsibility. In the environment of dwindling national and local budgets,
we strive to maintain our standards 
and deliver highest service qualities at best value and in time for the children we care for and their families.
</p>
<br/>
<p>
Private and independent childcare provisions account for less than 20 % of early years children and young peoples’
 care in Middlesbrough town. The northern wards of Middlesbrough are among the most deprived regions of the town with 
 highest rates of child poverty and least economic resilience. Although, the number of provisions in the area is adequate, 
the available childcare facilities fail to meet the all needs of childcare users in the north wards. 
Suitably located in the North of the town (Gresham ward), Favours working towards meeting the needs of parents who require
childcare close to their places of work and home. In particular, our services are targeted at the very poor families with low
 income and disenfranchisement to childcare provisions. It is reported that primary school aged children of
  Black and Minority ethnic groups make up over 40 % of children in the northern localities. 
   We will strive to serve both the rising black and minority ethnic families and others in general. 
</p>
</div>

</div>

<div id="EduMissionRight" class="PushMissionLeft">

<div  id ="ProductTitle"> Our Products and Services </div>
<div class="MissionElement" style="margin-top: 20px;">  To provide childcare scheme for children within the age of 2-12 </div> 
<div class="MissionElement">  To provide after-school club activities for school age children </div>
<div class="MissionElement">  To provide on-demand tutorial classes in Numeracy, literacy and Basic IT for children within the age of 4 and 12. </div>
<div class="MissionElement">  Early reading scheme for 2-5 year olds</div>
<div class="MissionElement">  School assignment guidance scheme  </div>
<div class="MissionElement"> Before school and late evening childcare provision for working families </div>
<div class="MissionElement">  Childcare information and support pack for every service user. </div>
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