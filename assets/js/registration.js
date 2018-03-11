/* 
 * Script d'affichage d'erreur lors de l'enregistrement 
 */

var verifInputs = (function () {
    $.post("../../controllers/userRegController.php",
            {
                check: 'ajax' + $(this).attr('name'),
                checkInput: $(this).val()
            }, function (errors) {
        $.each(errors, function (arrayId, error) {
            var input = 'input[name=' + arrayId + ']';
            $(input).parent().append('<p class="form-errors">' + error + '</p>');
            $(input).css('border-bottom', '2px solid red');
        });
    }, 
            "json");
    $(this).css('border-bottom', '2px solid #2196F3');
    var empty = $(this).next();
    $(empty).remove();
});
$('input[name=lastname]').keyup(verifInputs);
$('input[name=firstname]').keyup(verifInputs);
$('input[name=password]').keyup(verifInputs)
        .blur(verifInputs);
$('input[name=birthdate]').keyup(verifInputs)
        .blur(verifInputs);

$('input[name=mail]').blur(verifInputs)
        .submit(verifInputs);
