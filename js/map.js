var map = {
    lat: 49.108966772020366,
    lng: 31.623535156250007,
    zoom: 6,
    mapElement: "g-map",
    gMap: null,

    init: function() {
        var ll = new google.maps.LatLng(map.lat, map.lng);
        var mapOptions = {
            zoom: map.zoom,
            center: ll
        };

        map.gMap = new google.maps.Map(document.getElementById(map.mapElement), mapOptions);
    },

    currentPosition: function() {
        map.zoom = map.gMap.getZoom();
        map.lat = map.gMap.getCenter().k;
        map.lng = map.gMap.getCenter().A;
    },

    setPosition: function(lat, lng, zoom) {
        var ll = new google.maps.LatLng(lat, lng);

        map.gMap.setCenter(ll);
        map.gMap.setZoom(zoom);
    },

    drawLine: function(coordinates, windowContent) {
        var lls = [
            new google.maps.LatLng(coordinates[0][0], coordinates[0][1]),
            new google.maps.LatLng(coordinates[1][0], coordinates[1][1]),
        ];

        var line = new google.maps.Polyline({
            path: lls,
            geodesic: true,
            strokeColor: '#808000',
            strokeOpacity: 1.0,
            strokeWeight: 2
        });

        line.setMap(map.gMap);

        map.drawPoint(coordinates[0], windowContent);
        map.drawPoint(coordinates[1], windowContent);
    },

    drawPoint: function(coordinates, windowContent) {
        var infoWindow = new google.maps.InfoWindow({
            content: windowContent
        });

        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(coordinates[0], coordinates[1]),
            map: map.gMap,
            title: 'info',
            animation: google.maps.Animation.DROP
        });

        google.maps.event.addListener(marker, 'click', function() {
            infoWindow.open(map.gMap, marker);
            marker.setAnimation(google.maps.Animation.BOUNCE);
        });

        google.maps.event.addListener(infoWindow, 'closeclick', function() {
            marker.setAnimation(null);
        });
    }

};

google.maps.event.addDomListener(window, 'load', map.init);
