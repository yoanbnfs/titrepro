$(window).resize(function(){
    if ($(window).width() < 768){
        $('#menu-container').insertAfter('.navbar');        
    } else {
        $('#menu-container').insertBefore('#button-group');
    }    
});
$(function () {
    $('[data-toggle="popover"]').popover(); 
    $('#name-control, #subtypes-control').hide();
    if ($(window).width() < 768){
        $('#menu-container').insertAfter('.navbar');        
    } else {
        $('#menu-container').insertBefore('#button-group');
    } 
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
        if ($('#password').attr('type') === 'password'){
            $('#password').attr('type', 'text');
        } else {
            $('#password').attr('type', 'password');            
        }
    });
    $('#show-confirm-password').click(function(){
        if ($('#confirm-password').attr('type') === 'password'){
            $('#confirm-password').attr('type', 'text');
        } else {
            $('#confirm-password').attr('type', 'password');            
        }
    });
    $('.account-inputs').css({'border':'none'}, {'background-color':'transparent'});
    $('#profil-update').click(function(){
        $(this).siblings().removeClass('hidden');
        $(this).hide();
        $(this).parents().find('input[type=text], input[type=password], input[type=date]').removeAttr('readonly')
                .css({'border-bottom': '2px solid #c8c8c8'});        
    });
});
