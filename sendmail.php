<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('ru', 'phpmailer/language/');
	$mail->IsHTML(true);

	//От кого письмо
	$mail->setFrom('email@gmail.com', 'Name'); // Указать нужный E-mail
	//Кому отправить
	$mail->addAddress('rrzevan@gmail.com'); // Указать нужный E-mail
	//Тема письма
	$mail->Subject = 'Test massage!';

	//Тело письма
	$body = '<h1>Hellow!</h1>';

	if(trim(!empty($_POST['Имя']))){
		$body.='<p><strong>Имя:</strong> '.$_POST['Имя'].'</p>';
	}	
	
	if(trim(!empty($_POST['Телефон']))){
		$body.='<p><strong>Телефон:</strong> '.$_POST['Телефон'].'</p>';
	}

	if(trim(!empty($_POST['eMail']))){
		$body.='<p><strong>e-mail:</strong> '.$_POST['eMail'].'</p>';
	}

	$mail->Body = $body;

	//Отправляем
	if (!$mail->send()) {
		$message = 'Ошибка';
	} else {
		$message = 'Данные отправлены!';
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);
?>