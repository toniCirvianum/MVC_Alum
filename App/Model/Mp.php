<?php

class Mp extends Orm {

    public function __construct()
    {
        parent::__construct('mps');
        if (!isset($_SESSION['id_mp'])) {
            $_SESSION['id_mp']=4;
            //Atenció com que tenim 4 moduls a config.php
            //el proper id de modul es el 4.
            //Si no hi ha dades s'ha de posar a 0
        }
        
    }




}


?>