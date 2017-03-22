$(document).ready(function () {



});

var booksMap = null;

function initBooksMap() {

    var map = document.getElementById('map-books');

    if (map) {
        var paris = {lat: 48.856614, lng: 2.352222};
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(updateBooksMapCenter);
        }
        booksMap = new google.maps.Map(map, {
            zoom: 8,
            center: paris
        });
        
        var url = map.getAttribute('data-url');
        var imagePath = map.getAttribute('data-image-path');

        $.getJSON(url, function (data) {
            data = JSON.parse(data);
            
            var markers = [];
            for (var i = 0; i < data.length; i++) {
                var latLng = new google.maps.LatLng(data[i].latitude, data[i].longitude);
                var marker = new google.maps.Marker({position: latLng});
                markers.push(marker);
            }

            var markerCluster = new MarkerClusterer(booksMap, markers, {imagePath: imagePath});
        });
    }

}

function updateBooksMapCenter(position) {
    booksMap.setCenter({lat: position.coords.latitude, lng: position.coords.longitude});
}