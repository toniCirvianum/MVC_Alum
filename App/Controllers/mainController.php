<?php

class MainCntroller {
    public function index() {
        //cridar a la vista corresponent
        $this -> render("prova");
    }

protected function render($path,$params=[],$layout=""){
    //rennderitzar la vista
    echo "estic a punt per renderitzar la vista del Main Controller";
}

}
