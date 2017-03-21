$(document).ready(function () {



});

var booksMap = null;

function initBooksMap() {
    var paris = {lat: 48.856614, lng: 2.352222};
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(updateBooksMapCenter);
    }
    booksMap = new google.maps.Map(document.getElementById('map-books'), {
        zoom: 4,
        center: paris
    });

    $.getJSON("data.json", function (data) {
        var markers = [];
        for (var i = 0; i < 100; i++) {
            var dataPhoto = data.photos[i];
            var latLng = new google.maps.LatLng(dataPhoto.latitude,dataPhoto.longitude);
            var marker = new google.maps.Marker({position: latLng});
            markers.push(marker);
        }

        var markerCluster = new MarkerClusterer(booksMap, markers, {imagePath: 'images/m'});
    });
}

function updateBooksMapCenter(position) {
    booksMap.setCenter({lat: position.coords.latitude, lng: position.coords.longitude});
}