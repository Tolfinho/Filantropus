$(document).ready(function(){

    // MENU FIXO //
    window.onscroll = function(){
        if(window.pageYOffset > 110){
            $("header").addClass("active");
        } else {
            $("header").removeClass("active");
        }
    }

});
