<?php

class defaultController extends Controller {
    public function index() {
        //cridar a la vista corresponent
        
        // echo"estic al controller default";
        $params['title']="Home";
        $this->render('home/index',$params,'main');
    }



}
