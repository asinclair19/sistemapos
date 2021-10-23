<?php 

    require_once 'ConexionModel.php';

    class UserModel{
        private $Conexion;

        public function __construct(){
            $this->Conexion = new ConexionModel();
        }

        public function LogIn($username, $pass){
            $query = 'CALL SP_User(:opcion, :param1, :param2);';
            $params = array(
                'opcion' => 1, 'param1' => $username, 'param2' => $pass
            );
            return $this->Conexion->ExecSpWithParam($query, $params);
        }

        public function GetUserMenu($user_id){
            $query = 'CALL SP_User(:opcion, :param1, :param2);';
            $params = array(
                'opcion' => 2, 'param1' => $user_id, 'param2' => ''
            );
            return $this->Conexion->ExecSpWithParam($query, $params);
        }
    }