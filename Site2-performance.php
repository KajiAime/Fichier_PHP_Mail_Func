<?php
$to = 'contact@performance-afrique.cm';
$subject = 'Email de votre site web.';
$name = $_POST['name'];
$headers = "MIME-Version: 1.0"."\r\n";
$headers .= "Content-type: text/plain; charset= UTF-8"."\r\n";
$headers .= "Message de: $name \r\n";
$message = "Nom: $name\r\n\r\n";
$email=filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
if($email){
    $headers.="Repondez à: $email";
    $message.="Email: ".$_POST['email']."\r\n\r\n";
}
$message.= "Téléphone: ".$_POST['phone']."\r\n\r\n";
$message.= "Objet: ".$_POST['objet']."\r\n\r\n";
$message.= "Service: ".$_POST['services']."\r\n\r\n";
$message.= "Message: ".$_POST['msg'];
$sent = mail($to,$subject,$message,$headers,'-f'.$to);
?>
<html>
    <head>
        <title></title>
        <meta http-equiv="refresh" content="3; URL='contact.htm'"/>
    </head>
    <body>
        <?php if(isset($sent) && $sent){?>
            <h1><?php echo "$name, Performance Afrique vous remercie pour votre collaboration.";?></h1>
            <?php }else{?>
                <h1><?php echo "Erreur: Message non envoyer. Veuillez ressayer.";?></h1>
            <?php }?>
            <a href="contact.htm">Rentrez sur le site</a>
    </body>
</html>