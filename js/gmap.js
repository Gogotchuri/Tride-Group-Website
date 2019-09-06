google.maps.event.addDomListener(window, 'load', initMap);
function initMap() {
    var mapOptions= {
            zoom:15,
            center:new google.maps.LatLng(41.770579, 44.775128),
            styles:[ {
                "featureType":"all",
                "elementType":"all",
                "stylers":[ {
                    "invert_lightness": false
                }
                    ,
                    {
                        "saturation": 10
                    }
                    ,
                    {
                        "lightness": 30
                    }
                    ,
                    {
                        "gamma": 0.5
                    }
                    ,
                    {
                        "hue": "#435158"
                    }
                ]
            }
            ]
        }
    ;
    var mapElement=document.getElementById('map');
    var map=new google.maps.Map(mapElement, mapOptions);
    var marker=new google.maps.Marker( {
            position: new google.maps.LatLng(41.770579, 44.775128), map: map, title: 'Google Global Map', icon: "img/icons/marker.png"
        }
    );
    marker.addListener('click', function() {
            window.open('https://goo.gl/JsbcGW');
        }
    );
}