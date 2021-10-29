<?php 

    require_once 'ConexionModel.php';

    class SalesModel{ //
        private $Conexion;

        public function __construct(){
            $this->Conexion = new ConexionModel();
        }
        
        //module client
        public function GetClientModel(){
            $query = 'CALL SP_Clientes(:opcion, :param1, :param2);';
            $params = array(
                'opcion' => 1, 'param1' => '', 'param2' => ''
            );
            return $this->Conexion->ExecSpWithParam($query, $params);
        }

        
        public function UpdateStateClientModel($state, $id){
            $query = 'CALL SP_Clientes(:opcion, :param1, :param2);';
            $params = array(
                'opcion' => 2, 'param1' => $state, 'param2' => $id
            );
            return $this->Conexion->ExecSpWithParam($query, $params);
        }

        public function InsertClientModel($data){
            $query = 'CALL SP_Clientes(:opcion, :param1, :param2);';
            $params = array(
                'opcion' => 3, 'param1' => json_encode($data), 'param2' => ''
            );
            return $this->Conexion->InsertUpdateSp($query, $params);
        }

        public function GetClientByIdModel($id){
            $query = 'CALL SP_Clientes(:opcion, :param1, :param2);';
            $params = array(
                'opcion' => 4, 'param1' => $id, 'param2' => ''
            );
            return $this->Conexion->ExecSpWithParam($query, $params);
        }

        public function UpdateClientModel($data, $id){ //
            $query = 'CALL SP_Clientes(:opcion, :param1, :param2);'; //
            $params = array(
                'opcion' => 5, 'param1' => json_encode($data), 'param2' => $id //
            );
            return $this->Conexion->InsertUpdateSp($query, $params);
        }

    }