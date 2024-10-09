<?php

class Mp extends Orm {

    public function __construct()
    {
        parent::__construct('mps');
        if (!isset($_SESSION['id_mp'])) {
            $_SESSION['id_mp']=0;
        }
        
    }


}


?>