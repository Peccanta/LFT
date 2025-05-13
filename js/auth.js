
(function ($) {
    "use strict";


    /*==================================================================
    [ Focus input ]*/
    $('.input100').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })    
    })
  
  
    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    
    /*==================================================================
    [ Show pass ]*/
    var showPass = 0;
    $('.btn-show-pass').on('click', function(){
        if(showPass == 0) {
            $(this).next('input').attr('type','text');
            $(this).find('i').removeClass('zmdi-eye');
            $(this).find('i').addClass('zmdi-eye-off');
            showPass = 1;
        }
        else {
            $(this).next('input').attr('type','password');
            $(this).find('i').addClass('zmdi-eye');
            $(this).find('i').removeClass('zmdi-eye-off');
            showPass = 0;
        }
        
    });


// Авторизация
$('form[action="login.php"]').on('submit', function(e) {
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'login.php',
        data: $(this).serialize(),
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                window.location.href = '../main/main.php'; // перенаправление после успешной авторизации
            } else {
                $('.errors').html('');
                response.messages.forEach(function(msg) {
                    $('.errors').append(msg);
                });
            }
        },
        error: function() {
            $('.errors').html('Ошибка запроса. Повторите попытку позже.');
        }
    });
});

// Регистрация
$('form[action="register.php"]').on('submit', function(e) {
    e.preventDefault();

    $.ajax({
        type: 'POST',
        url: 'register.php',
        data: $(this).serialize(),
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                window.location.href = '../main/main.php'; // перенаправление после успешной регистрации
            } else {
                $('.errors').html('');
                response.messages.forEach(function(msg) {
                    $('.errors').append(msg);
                });
            }
        },
        error: function() {
            $('.errors').html('Ошибка запроса. Повторите попытку позже.');
        }
    });
});

    // Забыли пароль
    $('form[action="pass_recovery.php"]').on('submit', function(e) {
        e.preventDefault();
    
        $.ajax({
            type: 'POST',
            url: 'pass_recovery.php',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    $('.errors').html(''); // сброс поля ошибок
                    $('.successes').html('');
                    response.messages.forEach(function(msg) {
                        $('.successes').append(msg);
                    });
                    // перенаправление после отправки сообщения на почту для восстановления пароля
                    setTimeout(function() {
                        window.location.href = 'auth.php';
                      }, 2000);  // Задержка перед перенаправлением – 2 секунды
                } else {
                    $('.errors').html('');
                    response.messages.forEach(function(msg) {
                        $('.errors').append(msg);
                    });
                }
            },
            error: function() {
                $('.errors').html('Ошибка запроса. Повторите попытку позже.');
            }
        });
    });

})(jQuery);