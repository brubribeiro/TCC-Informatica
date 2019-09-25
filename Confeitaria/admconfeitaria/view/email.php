<?php
require_once("phpmailer/class.phpmailer.php");

$assuntoEmail = 'assunto do email';
$TextoEmail = '<h2>mensagem do e-mail</h2>';
$QuemRecebe = 'email_quem_recebe@teste.com';//quem irá receber
$QuemEnvia = 'email_envio@teste.com';//o seu email para envio
$SenhaQuemEnvia = 'senha_email_envio';//senha de quem está enviando
$NomeQuemEnvia = 'NOME QUEM ENVIA';
$porta = 465;//porta 465, 587, 25 depende do serviço
$Segurança = 'ssl'; //ssl ou tls
$smtpQuemEnvia = 'servidor_smtp@teste.com'; //procurar qual é o serviço. Ex outlook: smtp-mail.outlook.com
$TextoHTML = true;//se não for HTML deixar false



$mail = new PHPMailer();
	$mail->IsSMTP();		// Ativar SMTP
	$mail->Charset = 'utf-8';
	$mail->SMTPDebug = 0;		// Debugar: 1 = erros e mensagens, 2 = mensagens apenas
	$mail->SMTPAuth = true;		// Autenticação ativada
	$mail->SMTPSecure = $Segurança;	// ou SSL o qual é requerido pelo gmail
	$mail->Host = $smtpQuemEnvia;// SMTP utilizado
	$mail->Port = $porta;  		// A porta 587 deverá estar aberta em seu servidor
	$mail->Username = $QuemEnvia;
	$mail->Password = $SenhaQuemEnvia;//colocar a senha do email criado
	$mail->SetFrom($QuemEnvia, $NomeQuemEnvia);
	$mail->Subject = $assuntoEmail;
	$mail->Body = utf8_decode($TextoEmail);
	$mail->AddAddress($QuemRecebe);
	$mail->IsHTML($TextoHTML);//se for html true caso contrário false
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 	
	} else {
		$error = 'Mensagem enviada!';		
	}
	
	echo 'Mensagem: '.$error;
?>