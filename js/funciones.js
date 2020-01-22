$(document).ready(function() {



    //Demo code

    $('.password-container').pschecker({ onPasswordValidate: validatePassword, onPasswordMatch: matchPassword });



    var submitbutton = $('.submit-button');

    var errorBox = $('.error');

    errorBox.css('visibility', 'hidden');

    submitbutton.attr("disabled", "disabled");



    //this function will handle onPasswordValidate callback, which mererly checks the password against minimum length

    function validatePassword(isValid) {

        if (!isValid)

            errorBox.css('visibility', 'visible');

        else

            errorBox.css('visibility', 'hidden');

    }

    //this function will be called when both passwords match

    function matchPassword(isMatched) {

        if (isMatched) {

            submitbutton.addClass('unlocked').removeClass('locked');

            submitbutton.removeAttr("disabled", "disabled");

        } else {

            submitbutton.attr("disabled", "disabled");

            submitbutton.addClass('locked').removeClass('unlocked');

        }

    }

});





$(document).ready(function() {

    $('input[type=password]').keyup(function() {
        // set password variable
        var pswd = $(this).val();
        //validate the length
        if ( pswd.length < 8 ) {
            $('#length').removeClass('valid').addClass('invalid');
        } else {
            $('#length').removeClass('invalid').addClass('valid');
        }

        //validate letter
        if ( pswd.match(/[A-z]/) ) {
            $('#letter').removeClass('invalid').addClass('valid');
        } else {
            $('#letter').removeClass('valid').addClass('invalid');
        }

        //validate capital letter
        if ( pswd.match(/[A-Z]/) ) {
            $('#capital').removeClass('invalid').addClass('valid');
        } else {
            $('#capital').removeClass('valid').addClass('invalid');
        }

        //validate number
        if ( pswd.match(/\d/) ) {
            $('#number').removeClass('invalid').addClass('valid');
        } else {
            $('#number').removeClass('valid').addClass('invalid');
        }

    }).focus(function() {
        $('#pswd_info').show();
    }).blur(function() {
        $('#pswd_info').hide();
    });

});