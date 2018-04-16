/* 
 * Script d'affichage d'erreur lors de l'enregistrement 
 */

var verifInputs = (function () {
    $.post('../../controllers/userRegController.php',
            {
                check: 'ajax' + $(this).attr('name'),
                checkType: $('input[name=register-type]').val(),
                checkPassword: $('#password').val(),
                checkInput: $(this).val()
            }, function (errors) {
        $.each(errors, function (arrayId, error) {
            var input = 'input[name=' + arrayId + ']';
            $(input).parent().append('<p class="form-errors">' + error + '</p>');
            $(input).css('border-bottom', '2px solid red');
        });
        console.log(errors);
    },
            'json');
    $(this).css('border-bottom', '2px solid #2196F3');
    var empty = $(this).next();
    $(empty).remove();
});
    $('input[name=lastname]').keyup(verifInputs);
    $('input[name=firstname]').keyup(verifInputs);
    $('input[name=password]').blur(verifInputs);
    $('input[name=confirm-password]').blur(verifInputs);
    $('input[name=birthdate]').change(verifInputs);
    $('input[name=mail]').blur(verifInputs);   
   
 
    
    
