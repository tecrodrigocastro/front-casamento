<?php

//require('lib/vendor/autoload.php');

$errorMSG = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Nome Obrigatorio";
} else {
    $name = $_POST["name"];
    //echo $name;
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email é obrigatório ";
} else {
    $email = $_POST["email"];
   // echo $email;
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
$arquivo = "
    <html>
      <p><b>Nome: </b>$name</p>
      <p><b>E-mail: </b>$email</p>
      <p><b>Quantidade de convidados: </b>$guest</p>
      <p><b>Presença?: </b>$event</p>
      <p><b>Mensagem: </b>$message</p>
    </html>
  ";
  
  //Emails para quem será enviado o formulário
  $destino = "reddyrodrigo@gmail.com";
  $assunto = "Confirmação de Presença a";

  //Este sempre deverá existir para garantir a exibição correta dos caracteres
 // $headers  = "MIME-Version: 1.0\n";
  //$headers .= "Content-type: text/html; charset=iso-8859-1\n";
  $headers = "From: " .$name ;

  //Enviar
  if(mail($destino, $assunto, $arquivo, $headers)){
    echo "Presença confirmada";
  }else{
      echo "Algo deu errado";
  }
   
  



?>