<?php
/*
  Created on : 20/06/2018, 18:28:36
  Author     : Ebrahim | Web Creative www.webcreative.com.br
 */

$getForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (empty($getForm) || empty($getForm['callback_action'])):
    die('Acesso Negado!');
endif;

$strPost = array_map('strip_tags', $getForm);
$POST = array_map('trim', $getForm);

$Callback = $POST['callback_action'];
$jSON = null;
unset($POST['callback_action']);

usleep(2000);

//CHAMA DEFINIÇÕES
require '_config.php';

switch ($Callback):
    case "contactForm":

        //Defino a Chave do meu site
        $SecretKey = reCAPTCHA_SECRETKEY;

        //Pego a validação do Captcha feita pelo usuário
        if (isset($POST['g-recaptcha-response'])):
            $ValidaCaptcha = $POST['g-recaptcha-response'];
        endif;

        // Verifico se foi feita a postagem do Captcha 
        if (isset($ValidaCaptcha)):

            // Valido se a ação do usuário foi correta junto ao google
            $RetornaCaptcha = json_decode(file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $SecretKey . '&response=' . $POST['g-recaptcha-response']));

            // Se a ação do usuário foi correta executo o restante do meu formulário
            if ($RetornaCaptcha->success):
                if (!filter_var($POST['email'], FILTER_VALIDATE_EMAIL)):
                    $jSON['form_erro'] = "<p>E-mail inválido. Favor informar um e-mail válido!</p>";
                else:
                    require_once("Library/PHPMailer/src/PHPMailer.php");
                    require_once("Library/PHPMailer/src/SMTP.php");

                    // Inicia a classe PHPMailer
                    $Mail = new \PHPMailer\PHPMailer\PHPMailer;

                    $Mail->IsSMTP(); // Define que a mensagem será SMTP

                    try {
                        $Mail->CharSet = "UTF-8";
                        $Mail->Host = WC_MAIL_HOST;
                        $Mail->SMTPAuth = true;  // Usar autenticação SMTP
                        $Mail->Port = WC_MAIL_PORT;
                        $Mail->Username = WC_MAIL_USER;
                        $Mail->Password = WC_MAIL_PASS;
                        //Define o remetente 
                        $Mail->SetFrom($POST['email'], $POST['nome']);
                        $Mail->AddReplyTo($POST['email'], $POST['nome']);
                        $Mail->Subject = $POST['assunto']; //Assunto do e-mail
                        //Define os destinatário(s)
                        $Mail->AddAddress(WC_MAIL_USER, WC_MAIL_SENDER);

                        //Campos abaixo são opcionais 
                        //$Mail->AddCC('destinarario@dominio.com.br', 'Destinatario'); // Copia
                        //$Mail->AddBCC('destinatario_oculto@dominio.com.br', 'Destinatario2`'); // Cópia Oculta
                        //$Mail->AddAttachment('images/phpmailer.gif');      // Adicionar um anexo
                        //Define o corpo do email
                        $Mail->MsgHTML($POST['mensagem']);

                        ////Caso queira colocar o conteudo de um arquivo utilize o método abaixo ao invés da mensagem no corpo do e-mail.
                        //$Mail->MsgHTML(file_get_contents('arquivo.html'));

                        $Mail->Send();
                        $jSON['redirecionar'] = SITE . "/obrigado.php";

                        //caso apresente algum erro é apresentado abaixo com essa exceção.
                    } catch (phpmailerException $e) {
                        $jSON['form_erro'] = "<p>" . $e->errorMessage() . "</p>"; //Mensagem de erro costumizada do PHPMailer
                    }
                endif;
            else:
                $jSON['form_erro'] = '<p>Por favor faça a verificação do captcha!</p>';
            endif;
        endif;
        break;
endswitch;

if ($jSON):
    echo json_encode($jSON);
endif;
