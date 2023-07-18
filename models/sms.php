<?php

require_once 'systems.php';

    class Sms extends Systems{
    private $read_push_notification;

    public function __construct($sender, $title, $message, $recipients, $read_push_notification) {
        parent::__construct($sender, $title, $message, $recipients);
        $this->read_push_notification = $read_push_notification;
    }

    public function getReadPushNotification() { 
        return $this->read_push_notification;
    }

    public function send(){
        return "Sms inviato";
    }

}

?>