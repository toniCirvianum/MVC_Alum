<?php

require_once(__DIR__ . '/../Helpers/userHelper.php');

class userController extends Controller
{

    public function index()
    {
        
        $params['title'] = "Login";
        $this->render("user/login", $params, "site");
        unset($params);
    }

    public function login()

    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Recuperem les dades via post
            echo "<pre>";
            print_r($_SESSION['users']);
            echo "</pre>";
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
                echo "<pre>";
                print_r($_SESSION['user']);
                echo "</pre>";
                if (!$_SESSION['user']['verified']) {
                    $params['title'] = "Login";
                    $params['message_view'] = "Usuari no verificat";
                    $this->render("user/index", $params, "site");
                } else {
                    //Inicialitzem la vista de l'aplicació
                    $mpModel = new Mp();
                    $params['title'] = 'Mps';
                    $params['llista'] = $mpModel->getAll();
                    $this->render('mp/index', $params, 'main');
                }
            }
        }
    }

    public function verify()
    {

        $userModel = new User();
        $user = $userModel->getUserbyUsername($_GET['username']);
        if ($user['token'] == $_GET['token']) {
            $user['verified'] = true;
        }
        $userModel->update($user);
        $this->render('user/login', [], 'site');

    }

    public function logout()
    {
        unset($_SESSION['user']); //Esborrem variable user
        $this->render('user/login', null, 'main'); //tornem al login
        // header('Location: /user/login');
    }

    public function register()
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
                    $user = new Mp;
                    $user->create($newUser);

                    echo "<pre>";
                    $_SESSION['users'];
                    echo "</pre>";
                    $mailer = new Mailer();
                    $mailer->mailServerSetup();
                    $mailer->addRec(array($newUser['mail']));
                    $mailer->addVerifyContent($newUser);
                    $mailer->send();

                    echo "<pre>";
                    print_r($newUser);
                    echo "</pre>";
                   // $this->index();
                    // header('Location: /user/login');
                } else {
                    $this->render('/user/register', $params, 'main');
                }
            } else {
                $_SESSION['message_view'] = "No es poden deixar camps buits";
            }
        }
    }
}
