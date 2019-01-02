$(document).ready(function() {   
    var sideslider = $('[data-toggle=collapse-side]');
    var sel2 = sideslider.attr('data-target');
    var sel = sideslider.attr('data-target-2');
    sideslider.click(function(event){
        $(sel2).toggleClass('in');
        $(sel).toggleClass('out');
    });
});
