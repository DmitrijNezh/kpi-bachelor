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
    }

};

google.maps.event.addDomListener(window, 'load', map.init);
