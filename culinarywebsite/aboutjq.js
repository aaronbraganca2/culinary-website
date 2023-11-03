$(document).ready(function(){

    $(".login-register-group>a").mouseenter(function(){
        $(this).css("padding", "16px" );
        $(this).css("fontSize", "24px" );
    });

    $(".login-register-group>a").mouseleave(function(){
        $(this).css("padding", "20px");
        $(this).css("fontSize", "20px");

    });
    $(".logo").click(function(){
        $(".navbar").animate({width:"toggle"}, "slow");
    
    });
    $(".headerTxt").mouseenter(function(){
        $("a:first").animate({letterSpacing: "+=10px"}, 1000);
        $("a:first").animate({letterSpacing: "-=10px"}, 1000);             
    });
});