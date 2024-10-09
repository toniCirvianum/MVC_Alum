<?php

class defaultController {
    public function index() {
        //cridar a la vista corresponent
        // $this -> render("prova");
        echo"estic al controller main";
    }

protected function render($path,$params=[],$layout=""){
    //rennderitzar la vista
    echo "estic a punt per renderitzar la vista del Main Controller";
}

}
