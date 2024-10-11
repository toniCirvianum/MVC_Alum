<?php

class mpController extends Controller
{

    public function index()
    {
        //si usuari nologejat mostra login
        if (!isset($_SESSION['user'])) {
            $params['title'] = 'Login';
            $this->render('user/login', $params, 'site');
        } else {
            //usuari logejat mostra moduls
            $mpModel = new Mp();
            $params['title'] = 'Mps';
            $params['llista'] = $mpModel->getAll();
            $this->render('mp/index', $params, 'main');
        }


    }

    public function storeNew($update)
    {
       
        $mpModel = new Mp();
        $idMp = $_SESSION['id_mp']++;
        $numMp = $_POST['num_mp'];
        $nomMp = $_POST['nom_mp'];
        $mp = array(
            'id' => $idMp,
            'num_mp' => $numMp,
            'nom_mp' => $nomMp,
        );
        $mpModel->create($mp);
        $this->index();
       
    }

    public function destroy($mpId)
    {
        $mpId = (int)$mpId[0];
        $model = new Mp();
        $model->removeItemById($mpId);
        $this->index();
    }

    public function update($myId) {
        $mpId=(int) $myId[0];
        $model = new Mp();
        $mp = $model->getById($mpId);
        $params['mp']=$mp;
        $params['title']="Update Item";
        $this->render('mp/update',$params,'main');
        }

    public function storeUpdate($myId){
        $mpId=(int) $myId[0];
        $model=new Mp();
        $newMp=array( 
        'id' => $mpId,
        'num_mp' => $_POST['num_mp'],
        'nom_mp' => $_POST['nom_mp'],
        );
        // echo "<pre>";
        // print_r($newMp);
        // echo "</pre>";
        $model->updateItemById($newMp);
        $this->index();


    }

        



    
}
