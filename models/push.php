<?php

require_once 'systems.php';

    class Push extends Systems{
    private $visibility;
    private $icon;

    public function __construct($sender, $title, $message, $recipients, $visibility, $icon) {
        parent::__construct($sender, $title, $message, $recipients);
        $this->visibility = $visibility;
        $this->icon = $icon;
    }

    public function getVisibility() { 
        return $this->visibility;
    }

    public function getIcon() { 
        return $this->icon;
    }

    public function send(){
        return "Notifica Push inviata";
    }

}

?>