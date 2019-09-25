SITE = $("link[rel='base']").attr("href");

$(function () {

    $("body").on("submit", "form[name='contactForm']", function (e) {

        var recaptchaForm = $(this);

        e.preventDefault();
        e.stopPropagation();

        iniciaLoad(); //ABRE LOAD
        var FormData = "callback_action=contactForm&" + $(this).serialize();
        $.post(SITE + '/_form.ajax.php', FormData, function (data) {

            //TRATA ERRO
            if (data.form_erro) {
                $('.form_erro').html(data.form_erro).fadeIn();
            } else {
                $('form_erro').fadeOut();
            }
            
            //REDIRECIONA SE TUDO OK
            if (data.redirecionar) {
                window.location.href = data.redirecionar;
            }

            $('.wc_load').remove();
        }, 'json');
    });

    //INICIA LOAD AO SUBMETER
    function iniciaLoad() {
        if (!$('.jwc_load').length) {
            $("body").append('<div class="wc_load jwc_load"><div class="wc_load_content"><img src="' + SITE + '/images/load_w.svg"/><p class="wc_load_content_msg">Aguarde, enviando solicitação!</p></div></div>');
            $('.jwc_load').fadeIn().css('display', 'flex');
        }
    }
});