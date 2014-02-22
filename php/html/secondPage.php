<?php 
include "eventMarker.php";
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/trontastic/jquery-ui.css">
<script type ="text/javascript" src = "http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type ="text/javascript"  src ="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<script type ="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>




<script>

$(document).ready(function() {


$('#dialog').dialog( {
	title: "Add task",
	autoOpen:false,
	modal:true,
	buttons : {
		Cancel : function() {
			$(this).dialog('close');
			}
			}
	});
$('#addEvent').click(function(evt) {
	evt.preventDefault();
	$('#dialog').dialog('open');
});	

});


</script>

<script>
$(function() {
	$('#startDate').datepicker();
		$('#startDate').datepicker("bounce",$(this).val());
	});
	


</script>


<script>

var pacContainerInitialized = false;

$('#address').keypress(function () {
	if(!pacContainerInitialized){
		$('.pac-container').css('z-index','9999');
		pacContainerInitialized = true;
		}
	});	



</script>



<script>

var map;

var geolocate;


var lat ;


var lng;


function intializeMap() {


var mapOptions = {
	zoom: 15,
	disableDefaultUI:true,
	mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	
	map =  new google.maps.Map(document.getElementById('googleMap'), mapOptions);
	
	
	navigator.geolocation.getCurrentPosition(function(position) {
	
	var geolocate = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
	
	map.setCenter(geolocate);
		});
		

	var loc = new google.maps.LatLng(lat,lng);
	
	var marker = new google.maps.Marker({
		position:loc,
		map:window.map
		});


}


function findAddress()
{


var z;



var geocoder = new google.maps.Geocoder();

var address = document.getElementById('addressMap').value;

if(geocoder)
{
	geocoder.geocode({'address':address}, function(results,status)
	{
	
	
		if(status == google.maps.GeocoderStatus.OK)
		{
			if(results[0])
			{
				z = results[0].geometry.location;
				
				document.getElementById('longitude').value = z.lat();
				document.getElementById('latitude').value = z.lng();
				
				
			}
		
		}
		else
		{
			alert("GeoCoder failed due to : " + status);
		
		}
	});
 }  

} 

function addMarker()
{

lat = document.getElementById('longitude').value ;

lng	= document.getElementById('latitude').value ;


	var loc = new google.maps.LatLng(lat,lng);
	
	var marker = new google.maps.Marker({
		position:loc,
		map:window.map
		});

	
}


</script>



<script>

$(document).ready (function() {
	addMarker();

});

</script>

<script>

function initialize(){
var input = (document.getElementById('address'));

	
var autocomplete = new google.maps.places.Autocomplete(input);

var pacContainerInitialized = false;

$('#address').keypress(function () {
	if(!pacContainerInitialized){
		$('.pac-container').css('z-index','9999');
		pacContainerInitialized = true;
		}
	});	
}

</script>

</head>
<style>

#navigation {

top: 0;
width: 100%;
color: #252525;
height: 35px;
text-align: center;
padding-top: 15px;

-webkit-box-shadow: 0px 0px 8px 0px #000000;
-moz-box-shadow: 0px 0px 8px 0px #000000;
box-shadow: 0px 0px 8px 0px #000000;

background-color: rgba(1, 1, 1, 0.8);
color: rgba(1, 1, 1, 0.8);
}


#navigation a {
font-size: 14px;
padding-left: 15px;
padding-right: 15px;
color: white;
text-decoration: none;
}

#navigation a:hover {
color: grey;
} 



#header1
{
font-size:16px;
}

#googleMap
{
border-style:solid;
margin-left:45%;
margin-top:35px;
width:500px;
height:700px;
}

#headButton
{
width:70ppx;
height:50px;
border:solid black;

}

#mainBackground
{
z-index:-5;
position:absolute;

width:70%;
height:1500px;
background:#FFFFFF;
margin-left:14%;
margin-top:20px;
opacity:0.3;

}

#mainBody
{
background:#58D3F7;
padding:0;
margin:0;
}

#logOut
{
margin-left:90%;
margin-top:-1.50%;
}

#password
{
height:50px;

}

#ui-datepicker-div
{
z-index:10000;
}

#pac-container
{
z-index:20000;
}

#modal
{
z-index:20;

}
#modal-backdrop
{
z-index:10;
}



</style>



<body id="mainBody" onload="initialize();intializeMap();findAddress()" action="secondPage.php"  >         
  
<div>

<?php

$result = mysql_query("SELECT address FROM addEvent");

$address = "";

 while($locat = mysql_fetch_array($result))
 {
	$address = $locat['address'];
 
 
 }

	


$count = mysql_num_rows($result);
?>

<input type="button" value="click ME " onclick="addMarker()" ></input>
<input id="addressMap" value="<?php echo $address;?>" type="text" ></input>

<input type ="text" id="longitude"  ></input>

<input type ="text" id="latitude" ></input>

</div>    

       

<div id="navigation"  >

<a href="#" id="addEvent" >Add Event</a>


<div id="logOut">
<a href="#">Log out</a>                                                             
</div>

<div id="dialog" title="Create new user"  >
	<p class="validateTips">All form fields are required.</p>

	<form action="addEvent.php" method="POST">
		<label for="name">Name of the Event</label>
		<input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all" />
		<label for="email">Email</label>
		<input type="text" name="email" id="email" value="" class="text ui-widget-content ui-corner-all" />
		<label for="name">Organizer</label><br>
		<input type="radio" name="Club" /> Club <br>
		<input type="radio" name="Club" value="Non-Club"/> Non-Club <br>
		<label for="startDate" >Start Date</label><br>
		<input type="text" name="startDate" id="startDate" class="text ui-widget-content ui-corner-all"/> 
		<label for="address">Address</label>
		<input type="text" height="30px" name="address" id="address" class="text ui-widget-content ui-corner-all" />
	    <input type="submit" value="submit" id="submit" class="text ui-widget-content ui-corner-all"  />
	</form>
</div>
<div id="googleMap"  width="500px" height="700px" ></div>
</body>




</html>

