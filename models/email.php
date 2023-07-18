<?php

require_once 'systems.php';

class Email extends Systems {
    private $attached;
    private $push_notification;

    public function __construct($sender, $title, $message, $recipients, $attached, $push_notification) {
        parent::__construct($sender, $title, $message, $recipients);
        $this->attached = $attached;
        $this->push_notification = $push_notification;
    }

    public function getAttached() { //restituisce l'allegato
        return $this->attached;
    }

    public function getPushNotification() { //restituisce la conferma della notifica
        return $this->push_notification;
    }

    public function forward_email() { //funzione di inoltro email
        return "Inoltro Confermato";
    }

    public function send(){
        return "Email inviata";
    }
}

?>