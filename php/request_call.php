<?php

$to = 'web@popeye.com.br';  // please change this email id

$errors = array();
// print_r($_POST);

// Check if name has been entered
if (!isset($_POST['subject'])) {
    $errors['subject'] = 'Escolha o assunto, por favor.';
}

// Check if email has been entered and is valid
if (!isset($_POST['name'])) {
    $errors['name'] = 'Insira seu nome, por favor.';
}

//Check if message has been entered
if (!isset($_POST['phone'])) {
    $errors['phone'] = 'Insira seu número, por favor.';
}

$errorOutput = '';

if(!empty($errors)){

    $errorOutput .= '<div class="alert alert-danger alert-dismissible" role="alert">';
    $errorOutput .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';

    $errorOutput  .= '<ul>';

    foreach ($errors as $key => $value) {
        $errorOutput .= '<li>'.$value.'</li>';
    }

    $errorOutput .= '</ul>';
    $errorOutput .= '</div>';

    echo $errorOutput;
    die();
}



$subject = $_POST['subject'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$from = $name;
$subject = 'Solicitação de contato: popeye.com.br';

$body = "From: $name\n Phone: $phone\n Subject:\n $subject";

$headers = "From: ".$from;


//send the email
$result = '';
if (mail ($to, $subject, $body, $headers)) {
    $result .= '<div class="alert alert-success alert-dismissible" role="alert">';
    $result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
    $result .= 'Obrigado! Entraremos em contato.';
    $result .= '</div>';

    echo $result;
    die();
}

$result = '';
$result .= '<div class="alert alert-danger alert-dismissible" role="alert">';
$result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
$result .= 'Algo errado aconteceu. Tente novamente mais tarde.';
$result .= '</div>';

echo $result;
die();


?>
