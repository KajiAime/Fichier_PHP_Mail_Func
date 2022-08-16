<?php
$to = 'info@sthyc.cm';
$subject = 'Email de votre site web.';
$headers = "MIME-Version: 1.0"."\r\n";
$headers.='Content-type: text/plain; charset: utf-8'."\r\n";
$headers.= "Message_de: ".$_POST['prenom']."\r\n";
$message.= "Nom: ".$_POST['nom']."\r\n\r\n";
$message.= "Prénom: ".$_POST['prenom']."\r\n\r\n";
$email=filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
if($email){
    $headers.="Repondez_à: $email";
    $message.= "Email: ".$_POST['email']."\r\n\r\n";
}
$message.= "Téléphone: ".$_POST['phone']."\r\n\r\n";
$message.= "Ville: ".$_POST['town']."\r\n\r\n";
$message.= "Pays: ".$_POST['pays']."\r\n\r\n";
$message.= "Message: ".$_POST['msg'];
$sent = mail($to,$subject,$message,$headers,'-f'.$to);
?>
<html>
    <head>
        <title></title>
        <meta http-equiv="refresh" content="4; URL='contact.htm'"/>
    </head>
    <body>
        <?php if(isset($sent) && $sent){?>
            <h1><?php echo "$name, Sthyc vous remercie pour votre collaboration.";?></h1>
            <?php }else{?>
                <h1><?php echo "Erreur: Message non envoyer. Veuillez ressayer.";?></h1>
            <?php }?>
            <a href="contact.htm">Rentrez sur le site</a>
    </body>
</html>
