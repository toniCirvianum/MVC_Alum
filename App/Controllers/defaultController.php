<?php

class defaultController extends Controller {
    public function index($values=null) {
        {

            if (!isset($_SESSION['user'])) {
                $params['title'] = 'Login';
                $this->render('user/login', $params, 'site');
            } else {
                $mpModel = new Mp();
                $params['title'] = 'Mps';
                $params['llista'] = $mpModel->getAll();
                $this->render('mp/index', $params, 'main');
            }

            
    
    
        }
    }





}
