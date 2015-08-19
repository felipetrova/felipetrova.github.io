<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "Nenhum campo preenchido!";
	return false;
   }

$name = $_POST['name'];
$email_address = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
if ($email === FALSE) {
    echo 'E-mail inválido!';
    exit(1);
}
$phone = $_POST['phone'];
$message = $_POST['message'];


// Create the email and send the message
$to = 'felipee.trova@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Felipe Trova - Formulário de Contato do Site:  $name";
$email_body = "Você recebeu uma mensagem nova de seu formulário de contato site.\n\n"."Aqui estão os detalhes:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: felipee.trova@gmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
return true;
?>
