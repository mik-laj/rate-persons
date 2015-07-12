$( ".stats-list[start]" ).each(function() {
    var val=1;
    if ($(this).attr("start")) {
        val =  $(this).attr("start");
    }
    val = val - 1;
    val = 'stats ' + val;
    $(this ).css('counter-increment', val );
});
