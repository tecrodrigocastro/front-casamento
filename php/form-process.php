<?php

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


$emailTo = "tec.rodrigocastro@gmail.com";
$subject = "Confirmação de Presença";

// preparar o texto do corpo do e-mail
$body = "";
$body .= "Nome: ";
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


// send email
$success = mail($emailTo, $subject, $body, $email);


// redirect to success page
if ($success && $errorMSG == ""){
   echo "Sucesso";
}else{ 
        echo "Algo deu errado :(";
        echo $errorMSG;
    
}

?>