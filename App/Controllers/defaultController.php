<?php

class defaultController extends Controller {
    public function index($values=null) {
        //cridar a la vista corresponent
        print_r($values);
        // echo"estic al controller default";
        // $params['title']="Home";
        // $this->render('home/index',$params,'main');
    }



}
