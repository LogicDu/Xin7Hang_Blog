/**
 * Created by moriqian on 15/10/15.
 */
$(document).ready(function(){
    window_size_handle($(window).width());
});
$(window).resize(function(){
    window_size_handle($(window).width());
});
function window_size_handle(window_Width)
{
    if(window_Width < 992){
        $(".full-height").addClass("not-full-height").toggleClass("full-height");
        $(".logo-area").removeClass("text-right").addClass("text-center");
        $(".logo-area").toggleClass("logo-area").addClass("logo-area2");
        $(".left-main-area").removeClass("fixed-position");
    }else{
        $(".not-full-height").addClass("full-height").toggleClass("not-full-height");
        $(".logo-area2").toggleClass("logo-area2").addClass("logo-area");
        $(".logo-area").removeClass("text-center").addClass("text-right");
        if($(".left-main-area").hasClass("fixed-position") == false){
            $(".left-main-area").addClass("fixed-position");
        }
    }
}
