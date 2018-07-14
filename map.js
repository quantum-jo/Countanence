var placeInfo  = new Object();

function initMap() {
        var location = {lat: -25.363, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: location
        });
        var marker = new google.maps.Marker({
          position: location,
          map: map
        });

        var infoWindow = new google.maps.InfoWindow({
          content: '<h1>Australia</h1>'
        });

        marker.addListener('click', function() {
          infoWindow.open(map, marker);
        });

        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();
          if(places.length == 0) {
            return;
          }
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if(!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }

            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if(place.geometry.viewport) {
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);

          var request = {
            query: document.getElementById('pac-input').value,
            fields: ['formatted_address', 'name', 'rating', 'opening_hours']
          };

            var service = new google.maps.places.PlacesService(map);
            service.findPlaceFromQuery(request, placeInfoFun);

            function  placeInfoFun(results, status) {
              if(status == google.maps.places.PlacesServiceStatus.OK) {
                placeInfo = results[0];
                openNav(placeInfo);
              }
            }
        });


}
