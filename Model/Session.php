<?php 

    class Session {
        public function SetSession($NameSession, $NameValue) {
            $_SESSION[$NameSession] = $NameValue;
        }

        public function GetSession() {
            return $_SESSION;
        }
    }

?>