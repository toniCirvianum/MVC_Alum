<?php

require_once(__DIR__ . '/../Helpers/userHelper.php');

class userController extends Controller
{

    public function index()
    {
        //flas s'utilitza per mostrar missatge a la vista
        // $params['message_view'] = $_SESSION['message_view'];
        // //un cop desada a params, la esborrem per tenir-la disponible en altres vistes
        // unset($_SESSION['message_view']);
        $params['title'] = "Login";
        $this->render("user/login", $params, "site");
    }

    public function login()

    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Recuperem les dades via post
            $username = $_POST['username'] ?? null;
            $password = $_POST['pass'] ?? null;
            //Instanciem un nou model per comprovar credencials
            $user = new User;
            if (is_null($user->login($username, $password))) {
                //Si son incorrectes cridem a la vista amb el missatge corresponet
                $_SESSION['message_view'] = "Credencials incorrectes!";
                $this->index();
            } else {
                //Si son corectes desem l'usuari logejat
                $_SESSION['user'] = $user->login($username, $password);
                //Inicialitzem la vista de l'aplicació
                $mpModel = new Mp();
                $params['title'] = 'Mps';
                $params['llista'] = $mpModel->getAll();
                $this->render('mp/index', $params, 'main');
            }
        }
    }

    public function logout()
    {
        unset($_SESSION['user']); //Esborrem variable user
        $this->render('user/login', null, 'main'); //tornem al login
        // header('Location: /user/login');
    }

    public function updateView()
    {
        $params['title'] = "Register";
        $this->render('/user/register', $params, 'main');
    }

    public function newUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['username']) && isset($_POST['pass']) && isset($_POST['mail'])) {
                $newUser = [
                    'id' => $_SESSION['id_user']++,
                    'username' => $_POST['username'],
                    'password' => $_POST['pass'],
                    'mail' => $_POST['mail'],
                    'token' => generateToken(),
                    'verified' => false,
                    'admin' => false
                ];

                $params['errorUsername'] = validarUsername($newUser['username']);
                $params['password'] = validarPassword($newUser['password']);
                $params['mail'] = validarMail($newUser['mail']);

                if (is_null($params['errorUsername']) && is_null($params['password']) && is_null($params['mail'])) {

                    $mailer = new Mailer();
                    $mailer->mailServerSetup();
                    $mailer->addRec(array($newUsewr['mail']));
                    $mailer->addVerifyContent($user);
                    $mailer->send();

                    $params['title']="login";
                    $this->render('/user/login',$params,'main');


                } else {
                    $this->render('/user/register', $params, 'main');
                }
            } else {
                $_SESSION['message_view'] = "No es poden deixar camps buits";
            }
        }
    }
}
