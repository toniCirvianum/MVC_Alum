<?php

class mpController extends Controller {

    public function index() {
        $mpModel = new Mp();

        $params['title']='Mps';
        $params['llista']=$mpModel->getAll();


        $this->render('mp/index',$params,'main');
    }
}


?>