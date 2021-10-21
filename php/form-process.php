<?php

require_once('../src/PHPMailer.php');
require_once('../src/SMTP.php');
require_once('../src/Exception.php');
require_once('../mailer/vendor/autoload.php');

//require 'mailer/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

$errorMSG = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Nome é obrigatório ";
} else {
    $name = $_POST["name"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email é obrigatório ";
} else {
    $email = $_POST["email"];
}

// MSG Guest
if (empty($_POST["guest"])) {
    $errorMSG .= "Numero de convidados é obrigatório";
} else {
    $guest = $_POST["guest"];
}


// MSG Event
if (empty($_POST["event"])) {
    $errorMSG .= "Confirmação é obrigatório";
} else {
    $event = $_POST["event"];
}


// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Mensagem é obrigatório ";
} else {
    $message = $_POST["message"];
}

//matosbruna146@gmail.com
$emailTo = "matosbruna146@gmail.com";
$subject = "Confirmação de Presença";

// preparar o texto do corpo do e-mail
$body = "";
$body .= "Nome:  ";
$body .= $name;
$body .= "\n";
$body .= "Email: ";
$body .= $email;
$body .= "\n";
$body .= "Quantidade: ";
$body .= $guest;
$body .= "\n";
$body .= "Presença?: ";
$body .= $event;
$body .= "\n";
$body .= "Mensagem: ";
$body .= $message;
$body .= "\n";

try {
      //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
      $mail->CharSet = 'UTF-8';
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'confirmacaocasamentobd@gmail.com';
      $mail->Password = '123ewq321qwe';
      $mail->Port = 587;
      //465 587 - portas do gmail disponiveis
      $mail-> setFrom($email);
      $mail->addAddress($emailTo);

      $mail->Subject = " ".$subject;    
      $mail->Body = " ".$body;

      if  ($mail->send()){
        echo 'Sucesso - Presença confirmada';
     }else{
         echo 'Erro em confirmar';
     }

    
      
} catch (Exception $e) {
    echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}


// send email
//$success = mail($emailTo, $subject, $body, $email);


// redirect to success page
/*if ($success && $errorMSG == ""){
   echo "Sucesso";
}else{
    if($errorMSG == ""){
        echo "Algo deu errado :(";
    } else {
        echo $errorMSG;
    }
}
*/

?>