<!DOCTYPE html>
<html>
<head>
    
 <!-- <link rel="stylesheet" type="text/css" href="{{ asset('CSS/css/bootstrap.min.css')}}">  -->
    
	<link rel="stylesheet" media="all" type="text/css" href="{{ asset('CSS/css/stylesheet.css')}}" >
  <!--<link rel="stylesheet" type="text/css" href="{{ asset('CSS/css/semantic.css')}}">  -->


  <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
  <script src="http://cdn.oesmith.co.uk/morris-0.4.1.min.js"></script>
    <script src="semantic/dist/semantic.min.js"></script>
<meta  http-equiv="Content-Type" content="text/html; charset=utf-8"  />
 <meta  http-echarset=utf-8 />
	<title>Kaduna Electricity Bill</title>
	
    <link href="https://fonts.googleapis.com/css?family=Arimo|Cabin|Hind|Noto+Sans|Roboto" rel="stylesheet">  
    
   

</head>
<body>

<div id="header">

	<div class="container-new">

		<div class="new-box-div">
			<img src="img/kaduna-logo.png" class="logo">
		</div>

		<div class="new-box-div2">
            <div id="side-head">
                <h2 align="right">ELECTRICITY <span style="color:#70ac2b">BILL</span></h2>
                <p align="right">
                  <!-- <a href="{{URL::route('phptopdf')}}"><button class="btn btn-large btn-default" style="margin-top:1%">Print as pdf</button></a> -->
                </p>

            </div>
		</div>

	</div>

</div>
    
    <div style="clear:both"></div>

    <div id="base">
        
      <div class="container-new">
            
          <div class="new-box-div3" style="margin-bottom:5px">
			
            <div class="box-flex">
               <p align="center"> <img src="img/address-icon.png"></p>
            </div>
            <div  class="box-flex"  style="width:250px">
               <h3>Tunde James </h3>
                <span>21c Akin Ogunlewe Street, Kaduna </span> 
            </div>
            
		      </div>
           
            <div class="new-box-div4">                   
                    
                    <div class="num-box">                        
                        <span class="num1"> Bill#: <b> 200</b></span><br/>
                        <span class="num2" style="margin-top:120px!important"> Due Date: <b>20 March 2017</b></span>
                    </div>         
                 
                      <div class="num-box2">
                        Amount <br/>
                      <span style="font-size:27px; font-weight:bold">N18,000</span>
                     </div>             
        
            </div>
            
        </div>
    
    </div>


<div id="content-container">

	<div class="container-new">    
        
    <div class="new-box-div5" style="">
        
        <div id="profile">
            <h4 >KADUNA ELECTRICITY</h4>
            <span>21c, Akin Ogunlewe Street, GRA Kaduna <br> 08083030232, 01-83920221</span>
            
            <h2 style="margin-top:5%">ACCOUNT NO: <span style="color:#659a27">008392421</span></h2>
             <h4 style="color:#4c4c4c; margin-bottom:5px" >KAEDC Number: 0909-02913</h4>
            <h4 style="color:#4c4c4c" >NERC Number: 0891-9121</h4>                
        
        </div>
    
    </div>
    <div class="new-box-div6" style="" >

        <div id="table-1">
        
            
            <h2 >BILL SUMMARY</h2>
            
            <table class="table table-hover table-bordered" style="padding:5px">
              <thead style="background: #d5eeb9; padding:10px;" >
                <tr><th  class="t-b">Account No</th>
                <th  class="t-b">Meter No.</th>
                    <th  class="t-b">ADC</th>
                    <th  class="t-b">Previous Balance</th>
                <th  class="t-b">Current Charges</th>
              </tr></thead>
              @foreach( $Users as $user )
              <tbody>
                <tr  class="t-b">
                <td>{{ $user['surname'] }}</td>
                <td>{{ $user['middlename'] }}</td>
                <td>{{ $user['firstname'] }}</td>
                <td>{{ $user['surname'] }}</td>
                <td>{{ $user['sex'] }}</td>
                </tr>
                @endforeach
                
              </tbody>
              
            </table>
            
      </div>
        
    </div>        
            
      <div class="new-box-div8" style="width:370px">
            <div id="bar-example"></div>          
      </div>

  <div class="new-box-div7"  >
 
      <table class="table table-hover table-bordered" style="width:500px;">
        <thead style="background: #d5eeb9; padding:10px; ">
          <tr><th  class="t-b">Dias</th>
          <th  class="t-b">Adjustment</th>
              <th  class="t-b">Previous Balance</th>
              <th  class="t-b">Net Areas</th>
         
        </tr></thead>
       @foreach( $Users as $user )
              <tbody>
                <tr  class="t-b">
                <td>{{ $user['surname'] }}</td>
                <td>{{ $user['middlename'] }}</td>
                <td>{{ $user['firstname'] }}</td>
                <td>{{ $user['surname'] }}</td>
                
                </tr>
                @endforeach
        
      </table>
      <br />
                
      <table class="table table-hover table-bordered" style="width:500px;" >
        <thead style="background: #d5eeb9; padding:10px; " >
          <tr ><th  class="t-b">V.A.T No</th>
          <th class="t-b">L.A.R Date</th>
              <th class="t-b">L.A.R</th>
              <th class="t-b">V.A.T</th>
         
        </tr></thead>
       @foreach( $Users as $user )
              <tbody>
                <tr  class="t-b">
                <td>{{ $user['surname'] }}</td>
                <td>{{ $user['middlename'] }}</td>
                <td>{{ $user['firstname'] }}</td>
                <td>{{ $user['surname'] }}</td>
                
                </tr>
                @endforeach
        
      </table>
                
  </div>      
            
  <div class="new-box-div9" style="width:500px">
      <h2 style="font-size:28px; margin-top:20px">Please Pay bill before last due date</h2>
  </div>

  <div class="new-box-div10" style="width:400px; " >
      <div id="tot-box">
          
              <h4 align="right"> TOTAL  - NGN 45000 </h4>
          
          <h4 align="right"> AMOUNT PAY  - NGN 0 </h4>
          <hr/>
         
          <h3 align="right" class="due"> BALANCE DUE  - NGN 45000 </h3>
          
          
      </div>
  
  </div>

        
        

	</div>
</div>
    
    <div id="base-footer">
        
        <div class="container-new">
            
            <h2 align="center"> FOR KADUNA ELECTRICITY </h2>
            <h4 align="center">DOKKA BUSINESS UNIT</h4>
            
            <div id="f-table">
                <table class="table table-hover table-bordered" >
  <thead >
    <tr ><th  class="t-b">Current Charges</th>
    <th class="t-b">Meter Number</th>
        <th class="t-b">V.A.T Date</th>
        <th class="t-b">L.A.R Date</th>
        <th class="t-b">Due Date</th>
   
  </tr></thead>
  <tbody>
    <tr class="t-b">
    <td>Cell</td>
    <td>Cell</td>
    <td >Cell</td>
    <td >Cell</td>
        <td >Cell</td>
    
    </tr>
    
  </tbody>
  
</table>
            </div>
        
        </div>
    
    </div>

</body>
    
     <script type="text/javascript">
    
Morris.Bar({
  element: 'bar-example',
  data: [
    { y: 'Dec', a: 100, b: 90 },
    { y: 'Jan', a: 75,  b: 65 },
    { y: 'Feb', a: 50,  b: 40 },
    { y: 'March', a: 75,  b: 65 },
    { y: 'April', a: 50,  b: 40 },
    { y: 'May', a: 75,  b: 65 },
    { y: 'June', a: 100, b: 90 }
  ],
  xkey: 'y',
  ykeys: ['a', 'b'],
  labels: ['Series A', 'Series B']
});
    
    </script>
</html>