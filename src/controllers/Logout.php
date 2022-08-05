<?php

class Logout {
    
    public function logout(){
        session_start();
        session_destroy();

        header('Location: ../index.php');
    }
}
