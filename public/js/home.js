$(document).ready(function () {   



});

$(window).scroll(function() {
    if ($("#menu").offset().top > 20) { //alert(1);
        $("#menu").addClass("scroll-color");
    } else {
        $("#menu").removeClass("scroll-color");
    }
});
