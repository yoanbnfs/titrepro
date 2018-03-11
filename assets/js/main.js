$(function () {
    $('[data-toggle="popover"]').popover(); 
    console.log($(window).width());

    if($(window).width() > 1198 && $(window).width() < 1590){
        $('#social-networks').removeClass('col-lg-offset-1');
        $('#session-connect').removeClass('col-lg-2');
        $('#session-connect').addClass('col-lg-3');
    }
});
