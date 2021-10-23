<?php 

    require_once __DIR__.'/../model/UserModel.php';
    require_once '../config/db.php';

    class UserController{

        private $UserModel;
        private $Response;

        public function __construct(){
            $this->UserModel = new UserModel();
        }

        public function LogIn($username, $pass){
            try{
                $UserInfo = $this->UserModel->LogIn($username,$pass);
                if(count($UserInfo) > 0){
                    if (session_status() == PHP_SESSION_NONE){ 
                        session_start(); //open session
                    }

                    //get menu for user profile logged
                    $Sections = $this->UserModel->GetUserMenu($UserInfo[0]['idusuario']);
                    
                    $_SESSION['userinfo'] = $UserInfo; //save session
                    $_SESSION['usersections'] = $Sections;
                    $_SESSION['postback'] = 0;
                    
                    $this->Response = array(
                        'state' => true,
                        'redirect' => 'inicio'
                    );
                }else{
                    $this->Response = array(
                        'state' => false,
                        'message' => 'Usuario o contraseña erroneo(a).'
                    );
                }
            }catch(PDOException $ex){
                $this->Response = array(
                    'state' => false,
                    'message' => $ex->GetMessage()
                );
            }
            return $this->Response;
        }

        public function LogOut(){
            session_start();

            foreach(array_keys($_SESSION) as $key){
                unset($key);
            }

            session_destroy();

            $this->Response = array(
                'state' => true,
                'redirect' => ROOT_PATH. 'login.php'
            );
            return $this->Response;
        }

    }