<?php

 //collegamento ai file della cartella Models
 require __DIR__."/models/systems.php";
 require __DIR__."/models/email.php";
 require __DIR__."/models/sms.php";
 require __DIR__."/models/push.php";

    $textMessage01 = new Systems('noreply@google.com', 'INVIO EFFETTUATO', 'Questo è un messaggio di sistema inviato automaticamente, si prega di non rispondere...', ['pincopallino@example.com', 'tiziorossi@example.com']);
    
    $textMessage02 = new Email('caiobianchi@gmail.com', 'Ciao, un Saluto!', 'Ti ho contattato per informarti di una modifica che stiamo effettuando al contratto...', ['pincopallino@example.com'], 'allegato02.pdf', 'invio confermato');
    $textMessage03 = new Email('sempronioverdi@gmail.com', 'Hello!', 'Ciao ti volevo ricondare che lunedi...', ['pincopallino@example.com'], 'allegato03.pdf', 'invio confermato');

    $textMessage04 = new Sms("Alberto Verdi", "Buongiorno!", "Ehi come stai oggi...?", ['+393000000000'], true);
    $textMessage05 = new Sms("Elisa Gialli", "Ciao", "Non posso risponderti...", ['+393000000000'], false);

    $textMessage06 = new Push("Youtube", "Guarda il Video!", "Non perderti l'ultimo...", ['+393000000000'], false, '<i class="fa-brands fa-youtube"></i>');
    $textMessage07 = new Push("Slack", "Accedi alla stanza...", "Questo è il link... ", ['+393000000000'], true, '<i class="fa-brands fa-slack"></i>');
    $textMessage08 = new Push("Facebook", "Ricorda di fare...", "Ciao mi raccomando... ", ['+393000000000'], true, '<i class="fa-brands fa-facebook"></i>');
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"><!--bootstrap-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /><!--fontawesome-->
        <link rel="stylesheet" href="./css/style.css"><!--css-->
        <title>Document</title>
    </head>

    <body>

        <header class="container">
            <div class="row">
                <div class="col-12 mt-3 mb-3 text-center">
                    <h1>COMUNICATION SYSTEMS PHP</h1>
                </div>
            </div>
        </header>

        <main class="container">
            <div class="row">
            <?php for ($i = 1; $i <= 8; $i++): ?>
                <?php $textMessage = ${"textMessage0$i"}; ?>
                <div class="col-12 col-md-4 mb-3">
                    <div class="card p-2">
                        <ul>
                            <li><h5 ><span class="text_blue">Mittente: </span><?= $textMessage->getSender() ?></h5></li>
                            <li><h5 ><span class="text_blue">Oggetto: </span><?= $textMessage->getTitle() ?></h5></li>
                            <li><h5 ><span class="text_blue">Messaggio: </span><?= $textMessage->getMessage() ?></h5></li>
                            <h5 class="text_blue">Destinatari:</h5>
                            <?php foreach ($textMessage->getRecipients() as $recipient): ?>
                                <li><h5><?= $recipient ?></h5></li>
                            <?php endforeach; ?>
                            <?php if ($textMessage instanceof Email): ?>
                                <li><h5 ><span class="text_blue">Allegati: </span><?= $textMessage->getAttached() ?></h5></li>
                                <li><h5 ><span class="text_blue">Notifica Push: </span><?= $textMessage->getPushNotification() ?></h5></li>
                            <?php endif; ?>
                            <?php if ($textMessage instanceof Sms): ?>
                            <li><h5 ><span class="text_blue">Lettura Notifica: </span><?= $textMessage->getReadPushNotification() ? 'si' : 'no' ?></h5></li>
                            <?php endif; ?> 
                            <?php if ($textMessage instanceof Push): ?>
                            <li><h5 ><span class="text_blue">Visibilità: </span><?= $textMessage->getVisibility() ? 'si' : 'no' ?></h5></li>
                            <li><h5 ><span class="text_blue">Icona: </span><?= $textMessage->getIcon()?></h5></li>
                            <?php endif; ?>   
                        </ul>
                        <h4 class="text-center text_red mt-4 mb-4"><?= $textMessage->send()?></h4>
                    </div> 
                </div>
            <?php endfor; ?>
            </div>
        </main>

    </body>

</html>