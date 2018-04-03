$(function () {
    $('[data-toggle="popover"]').popover(); 
    console.log($(window).width());

    if($(window).width() > 1198 && $(window).width() < 1590){
        
    }        
    $('#name-control, #subtypes-control').hide();
    
    $('#professional-reg').click(function(){
        if ($(this).is(':checked')){
            $('#lastname-control, #firstname-control, #birthdate-control').hide();
            $('#name-control, #subtypes-control').show();
        } 
    });
    $('#private-reg').click(function(){
        if ($(this).is(':checked')){
            $('#lastname-control, #firstname-control, #birthdate-control').show();
            $('#name-control, #subtypes-control').hide();
        } 
    });
    $('#show-password').click(function(){
        $('#password').toggle(attr('type', 'text'));
    });
    $('.account-inputs').css({'border':'none'}, {'background-color':'transparent'});
    $('#profil-update').click(function(){
        $(this).siblings().removeClass('hidden');
        $(this).hide();
        $(this).parents().find('input[type=text], input[type=password], input[type=date]').removeAttr('readonly')
                .css({'border-bottom': '2px solid #c8c8c8'});        
    });
});
