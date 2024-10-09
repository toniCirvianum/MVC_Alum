<?php

class errorController {
    public function index() {
        //cridar a la vista corresponent
        
        // echo"estic al controller error";
        $params['title']="Error";
        $this->render('error/e404',$params,'main');
    }


}
