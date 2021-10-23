<?php 

    require_once 'ConexionModel.php';

    class StoreModel{ //
        private $Conexion;

        public function __construct(){
            $this->Conexion = new ConexionModel();
        }
        
        //module suppliers
        public function GetSupplierModel(){
            $query = 'CALL SP_Proveedores(:opcion, :param1, :param2);';
            $params = array(
                'opcion' => 1, 'param1' => '', 'param2' => ''
            );
            return $this->Conexion->ExecSpWithParam($query, $params);
        }

        
        public function UpdateStateSupplierModel($state, $id){
            $query = 'CALL SP_Proveedores(:opcion, :param1, :param2);';
            $params = array(
                'opcion' => 2, 'param1' => $state, 'param2' => $id
            );
            return $this->Conexion->ExecSpWithParam($query, $params);
        }

        public function InsertSupplierModel($data){
            $query = 'CALL SP_Proveedores(:opcion, :param1, :param2);';
            $params = array(
                'opcion' => 3, 'param1' => json_encode($data), 'param2' => ''
            );
            return $this->Conexion->InsertUpdateSp($query, $params);
        }

        public function GetSupplierByIdModel($id){
            $query = 'CALL SP_Proveedores(:opcion, :param1, :param2);';
            $params = array(
                'opcion' => 4, 'param1' => $id, 'param2' => ''
            );
            return $this->Conexion->ExecSpWithParam($query, $params);
        }

        public function UpdateSupplierModel($data, $id){ //
            $query = 'CALL SP_Proveedores(:opcion, :param1, :param2);'; //
            $params = array(
                'opcion' => 5, 'param1' => json_encode($data), 'param2' => $id //
            );
            return $this->Conexion->InsertUpdateSp($query, $params);
        }

    }