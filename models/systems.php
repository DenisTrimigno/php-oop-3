<?php

    class Systems {
        private $sender;
        private $title;
        private $message;
        private $recipients;

        function __construct($sender, $title, $message, $recipients) {
            $this->sender = $sender;
            $this->title = $title;
            $this->message = $message;
            $this->recipients = $recipients;
        }

        public function send() { //funzione di invio
            return "Invio Messaggio Confermato";
        }

        public function getSender() { //restituisce il mittente
            return $this->sender;
        }

        public function getTitle() { //restituisce il titolo
            return $this->title;
        }

        public function getMessage() { //restituisce il messaggio
            return $this->message;
        }

        public function getRecipients() { //restituisce il destinatario
            return $this->recipients;
        }
    }

?>