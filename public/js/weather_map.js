(function(){
	"use strict";

	//get map
	var myLatlng = new google.maps.LatLng(29.426791,-98.489602);
	// Set our map options
	var mapOptions = {
		// Set the zoom level
		zoom: 5,

		// This sets the center of the map at our location
		center: myLatlng,
		mapTypeControlOptions: {
      		mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
    	}
	};

	// Render the map
	var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
	
	//New marker
	var marker = new google.maps.Marker({
	    position: myLatlng,
	    draggable:true,
	    map: map,
	    title:"Drag me!"
	});

	//Set Marker
	marker.setMap(map);

	//Global variables for latitude and longitude. 
	var latitude;
	var longitude;

	//function to get the Weather where a marker is located. 
	function getWeather (){
        var weather = $.get("http://api.openweathermap.org/data/2.5/forecast/daily", {
	    APPID: "f97ab9e536a6a913b3a0d48dc0540193",
	    lat: latitude,
	    lon: longitude,
	    units: "imperial",
	    cnt: 3
		});
		//Waiting for weather to load.
		weather.done (function(data){
			var box = $('#forecast');
			var name_box = $('#city_name');
			var name = data.city.name;
			name_box.html(name);
			var content = "";
			var day = data.list;

		//Taking weather info to append html.
		day.forEach(function(day,index){
				//create html for weather - ID 'box'
				content += "<div class='day'><span class='bold'><p>" + day.temp.min.toFixed(0) + " °F / " +  day.temp.max.toFixed(0) + "°F</p></span>";
				content += "<p><img src='http://openweathermap.org/img/w/"+ day.weather[0].icon +  ".png'></p>";
				content += "<p><span class='bold'>Humidity:</span> " + day.humidity + "%</p>";
				content += "<p><span class='bold'>Wind:</span> " + day.speed + "</p>";
				content += "<p><span class='bold'>Pressure:</span> " + day.pressure + "</p></div>"
			})
			//Replace box div with html content. 
			box.html(content);
		});
	} //end of getWeather function. 

	//Recentering map where user drags marker and getting the weather. 
	google.maps.event.addListener(marker, 'dragend', function(evt){
    		latitude = evt.latLng.lat();
    		longitude = evt.latLng.lng();
    		map.setZoom(8);
			map.panTo(marker.position);
			getWeather();
	});


    //Search form actions.
    $('#search_form').submit(function(event){
		event.preventDefault();
	    // Init geocoder object
		var geocoder = new google.maps.Geocoder();

		//Getting user input. 
		var location = $('#location').val();

		// Geocode our address
		geocoder.geocode({ "address": location }, function(results, status) {
		// Check for a successful result
		if (status == google.maps.GeocoderStatus.OK) {
			latitude = results[0].geometry.location.lat();
			longitude = results[0].geometry.location.lng();
		   	
			marker.setPosition(results[0].geometry.location);
			map.panTo(marker.position);

			getWeather();

		} else {

		   // Show an error message with the status if our request fails
		   alert("Geocoding was not successful - STATUS: " + status);
		}
		});
    });//end of search form function. 
	
})();