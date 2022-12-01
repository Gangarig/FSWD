<!DOCTYPE html>
<html>
            <head>
                <title>Simple Google Map</title>
        <meta name="viewport" content="initial-scale=1.0">
        <meta charset="utf-8">
        <style>
            #map {
                        height: 90%;
            }
           html, body {
                        height: 100%;
                        margin: 0;
                        padding: 0;
            }
        </style>
    </head>
    <body>
                <div id="map"></div>
        <script>
            var map;
            function initMap() {
                        map = new google.maps.Map(document.getElementById('map'), {
                        center: {lat: 48.20849, lng: 16.37208}, zoom: 8
                });
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtjaD-saUZQ47PbxigOg25cvuO6_SuX3M&callback=initMap" async defer></script>
        
<script>
var map;
function initMap() {
        var vienna = {
            lat: 48.20849,
            lng: 16.37208
    };
    map = new google.maps.Map(document.getElementById('map'), {
            center: vienna,
            zoom: 8
    });
    var pinpoint = new google.maps.Marker({
            position: vienna,
            map: map
    });
}
</script>
    </body>
</html>