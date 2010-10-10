/**
 * @author Ben
 */
/* <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>*/


var radius;
var marker;
var map;
var homezone;
//var lat=default_lat; 	//set this somewhere
//var long=default_lng; //set this somewhere


function mapinit() {
		var center = new google.maps.LatLng(lat, long);
		var myOptions = {
			  zoom: 16,
			  center: center,
			  mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			
		map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

		
		marker = new google.maps.Marker({
			position:center,
			name:"Home Zone",
			draggable:true
		});

			  
		

		google.maps.event.addListener(marker, "dragend", function() {
			center = marker.getPosition();
			console.log("lng: "+center.lng()+", lat: "+center.lat());
			$("venue_longitude").value=center.lng();
			$("venue_latitude").value=center.lat();
		});
		
		marker.setMap(map);
		
		
  }


function getRadius(){
	radius = document.getElementById("radius").value;
	radius = parseInt(radius);
	homezone.setRadius(radius);
}


//Event.observe(window,'load',function(){mapinit();});
