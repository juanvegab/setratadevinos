'use strict';

angular.module('setratadevinos.comApp').directive('map', function () {
	
	var loadDetailsMap = function(DIVDetailContainer) {
		var mapContainer = DIVDetailContainer;
		
		if(mapContainer.children().length==0){
			var lon = -10;
			var lat = 10;
			var specific = mapContainer.attr("data-specific");
			var agencyLocation = new google.maps.LatLng(lat, lon);
			
			var myOptions = {
				zoom: 15,
				center: agencyLocation,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			var map = new google.maps.Map(mapContainer[0], myOptions);
			var infowindow = new google.maps.InfoWindow({
				content: ''
			});
			
			if(specific!=''){
				addMarker(agencyLocation, map, '/mdk_edit_res/1211758/res/point.png');
			}else{
				addMarker(agencyLocation, map, 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=|6ca8b0|000000');
			}
			
			google.maps.event.trigger(map, 'resize');
			
			$(driveDirectionsTrigger).click(function(){
				if(userLat=='' && userLon==''){
					navigator.geolocation.getCurrentPosition(function(position){
						userLat = position.coords.latitude;
						userLon = position.coords.longitude;
						getDirectionsService(map, driveDirectionsPanel, lat, lon);
					}, handleGeolocError);
				}else{
					getDirectionsService(map, driveDirectionsPanel, lat, lon);
				}
			});
		}
	}

	var addMarker = function (location, map, iconAddress) {
		marker = new google.maps.Marker({
			position: location,
			map: map,
			icon: iconAddress
		});
	}
	
	
	
	return {
		template: '<div></div>',
		replace: true,
		restrict: 'E',
		link: function postLink(scope, element, attrs) {
			loadDetailsMap(element);
		}
	};
});
