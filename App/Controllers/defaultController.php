<?php

class defaultController {
    public function index() {
        //cridar a la vista corresponent
        
        // echo"estic al controller default";
        $params['title']="Home";
        $this->render('mp/index',$params,'main');
    }

protected function render($path,$params=[],$layout=""){
    //rennderitzar la vista
    // echo "estic a punt per renderitzar la vista del Main Controller";
    ob_start();
    require_once(__DIR__ . "/../Views/" . $path . ".view.php");
    $params['content']=ob_get_clean();
    require_once(__DIR__ . "/../Views/layouts/" . $layout . ".layout.php");
    

}

}
