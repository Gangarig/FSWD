<!DOCTYPE html>
<html>
        <head>
            <title>Choose an address</title>
        <meta name="viewport" content="initial-scale=1.0">
        <meta charset="utf-8">
        <style>
        /* Always set the map height explicitly to define the size of
        * the div element that contains the map. */
            #map {
                    height: 80vh;
            }
        /* Optional: Makes the sample page fill the window. */
            html, body {
                    margin: auto 0;
                    padding: 0;
            }
        </style>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    <body>
            <div class="container">
                <div class="mb-3" id="map"></div>
            <input type="text" class="w-50" id="address" placeholder="Enter address or city name">
            <input type="button" class="btn btn-success" value="Add" onclick="getLocation()">
            <input type="button" class="btn btn-warning" value="Hide" onclick="hidePins()">
            <input type="button" class="btn btn-primary" value="Show" onclick="showPins()">
            <input type="button" class="btn btn-danger" value="Delete all" onclick="deletePins()">
        </div>
        <script>
            let geocoder;
            let markers = [];
            function initMap() {
                    geocoder = new google.maps.Geocoder();
                    var mlocation = {
                        lat: 48.20849,
                        lng: 16.37208
                };
                var nlocation = {
                        lat: 48.20849,
                        lng: 15.37208
                };
                map = new google.maps.Map(document.getElementById('map'), {
                        center: mlocation,
                        zoom: 8
                });
            }
            function getLocation() {
                    let address = document.getElementById('address').value;
                    geocoder.geocode({
                        'address': address
                    }, function(results, status) {
                        if (status == 'OK') {
                            map.setCenter(results[0].geometry.location);
                            let marker = new google.maps.Marker({
                                map: map,
                                position: results[0].geometry.location
                        });
                        markers.push(marker);
                        console.log(markers);
                    } else {
                            console.table(results);
                            alert('It was not possible to perform your request due to ' + status);
                    }
                })
            };
            function setMapOnAll(map) {
                    for (let i = 0; i < markers.length; i++) {
                        markers[i].setMap(map);
                }
            }
            function clearMarkers() {
                    setMapOnAll(null);
            }
            function hidePins() {
                    clearMarkers();
            };
            function showPins() {
                    setMapOnAll(map);
            };
            function deletePins() {
                    hidePins();
                    markers = [];
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtjaD-saUZQ47PbxigOg25cvuO6_SuX3M&callback=initMap" async defer></script>
   </body>