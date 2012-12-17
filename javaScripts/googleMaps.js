function initialize() {

	var myLatlng = new google.maps.LatLng(38.873538,-0.381921);
	var mapOptions = {
	  zoom: 15,
	  center: myLatlng,
	  mapTypeId: google.maps.MapTypeId.ROADMAP
	}
	var map = new google.maps.Map(document.getElementById('map'), mapOptions);

	var marker = new google.maps.Marker({
		position: myLatlng,
		map: map,
		title: 'Hello World!'
	});
}