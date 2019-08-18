$("map area").mouseover(function() {
    var currentfloor = (this.id)
    $('.floor_num').empty().append('№ ' + currentfloor);
    $('.floor .modal-title').append(currentfloor);
});