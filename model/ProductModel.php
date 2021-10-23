<?php 

    require_once 'ConexionModel.php';

    class ProductModel{
        private $Conexion;

        public function __construct(){
            $this->Conexion = new ConexionModel();
        }

        //categories
        public function GetCategoriesModel(){
            $query = 'CALL SP_Categorias(:opcion, :param1, :param2);';
            $params = array(
                'opcion' => 1, 'param1' => '', 'param2' => ''
            );
            return $this->Conexion->ExecSpWithParam($query, $params);
        }

        public function UpdateStateCategoryModel($state, $id){
            $query = 'CALL SP_Categorias(:opcion, :param1, :param2);';
            $params = array(
                'opcion' => 2, 'param1' => $state, 'param2' => $id
            );
            return $this->Conexion->ExecSpWithParam($query, $params);
        }

        public function InsertCategoryModel($data){
            $query = 'CALL SP_Categorias(:opcion, :param1, :param2);';
            $params = array(
                'opcion' => 3, 'param1' => json_encode($data), 'param2' => ''
            );
            return $this->Conexion->InsertUpdateSp($query, $params);
        }

        public function GetCategoryByIdModel($id){
            $query = 'CALL SP_Categorias(:opcion, :param1, :param2);';
            $params = array(
                'opcion' => 4, 'param1' => $id, 'param2' => ''
            );
            return $this->Conexion->ExecSpWithParam($query, $params);
        }

        public function UpdateCategoryModel($data, $id){
            $query = 'CALL SP_Categorias(:opcion, :param1, :param2);';
            $params = array(
                'opcion' => 5, 'param1' => json_encode($data), 'param2' => $id
            );
            return $this->Conexion->InsertUpdateSp($query, $params);
        }
        
        //module unity
        public function GetUnityModel(){
            $query = 'CALL SP_Unidades(:opcion, :param1, :param2);';
            $params = array(
                'opcion' => 1, 'param1' => '', 'param2' => ''
            );
            return $this->Conexion->ExecSpWithParam($query, $params);
        }

        
        public function UpdateStateUnityModel($state, $id){
            $query = 'CALL SP_Unidades(:opcion, :param1, :param2);';
            $params = array(
                'opcion' => 2, 'param1' => $state, 'param2' => $id
            );
            return $this->Conexion->ExecSpWithParam($query, $params);
        }

        public function InsertUnityModel($data){
            $query = 'CALL SP_Unidades(:opcion, :param1, :param2);';
            $params = array(
                'opcion' => 3, 'param1' => json_encode($data), 'param2' => ''
            );
            return $this->Conexion->InsertUpdateSp($query, $params);
        }

        public function GetUnityByIdModel($id){
            $query = 'CALL SP_Unidades(:opcion, :param1, :param2);';
            $params = array(
                'opcion' => 4, 'param1' => $id, 'param2' => ''
            );
            return $this->Conexion->ExecSpWithParam($query, $params);
        }

        public function UpdateUnityModel($data, $id){ //
            $query = 'CALL SP_Unidades(:opcion, :param1, :param2);'; //
            $params = array(
                'opcion' => 5, 'param1' => json_encode($data), 'param2' => $id //
            );
            return $this->Conexion->InsertUpdateSp($query, $params);
        }

    }