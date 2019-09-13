$(document).ready(function(e) {
    $('img[usemap]').rwdImageMaps();
    $('img[usemap]').maphilight({
        stroke: false,
        fillColor: 'ffb600',
        fillOpacity: 0.5
    });

    $("#1st").click(function() {
        alert('clicked')
    })
});
jQuery(window).bind('resize orientationchange', function(e) {
    var windowWidth = $(window).width();
    jQuery(window).resize(function() {
        jQuery('img[usemap]').maphilight({
            stroke: false,
            fillColor: 'ffb600',
            fillOpacity: 0.5
        });
    })
});