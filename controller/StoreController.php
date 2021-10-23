<?php 

    require_once __DIR__.'/../model/StoreModel.php';
    require_once '../config/db.php';

    class StoreController{ //

        private $StoreModel;
        private $Response;

        public function __construct(){
            $this->StoreModel = new StoreModel();
        }

        //module suppliers
        public function GetSupplierController(){
            try{
                $data = $this->StoreModel->GetSupplierModel();
                if(count($data) > 0){
                    $this->Response = array(
                        'state' => true,
                        'info' => $data,
                        'message' => 'Información recuperada con éxito.'
                    );
                }else{
                    $this->Response = array(
                        'state' => false,
                        'message' => 'No hay información para mostrar.'
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

        public function UpdateStateSupplierController($state, $id){
            try{
                $resp = $this->StoreModel->UpdateStateSupplierModel($state, $id);
                if(count($resp) > 0){
                    $this->Response = array(
                        'state' => true,
                        'info' => $resp,
                        'message' => 'Actualización de estado éxitosa.'
                    );
                }else{
                    $this->Response = array(
                        'state' => false,
                        'message' => 'No se pudo actualizar el estado del elemento.'
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

        public function InsertSupplierController($data){
            try{
                $resp = $this->StoreModel->InsertSupplierModel($data);
                if($resp > 0){
                    $info = $this->StoreModel->GetSupplierModel();
                    $this->Response = array(
                        'state' => true,
                        'info' => $info,
                        'message' => 'Nuevo elemento guardado con éxito.'
                    );
                }else{
                    $this->Response = array(
                        'state' => false,
                        'message' => 'No se pudo guardar el elemento.'
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

        public function GetSupplierByIdController($id){
            try{
                $info = $this->StoreModel->GetSupplierByIdModel($id);
                if(count($info) > 0){
                    $this->Response = array(
                        'state' => true,
                        'info' => $info[0],
                        'message' => 'Información recuperada con éxito.'
                    );
                }else{
                    $this->Response = array(
                        'state' => false,
                        'message' => 'No hay categorías para mostrar.'
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

        public function UpdateSupplierController($data, $id){
            try{
                $resp = $this->StoreModel->UpdateSupplierModel($data, $id); //
                if($resp > 0){
                    $info = $this->StoreModel->GetSupplierModel(); //
                    $this->Response = array(
                        'state' => true,
                        'info' => $info,
                        'message' => 'El elemento se actualizó con éxito.'
                    );
                }else{
                    $this->Response = array(
                        'state' => false,
                        'message' => 'No se realizaron cambios en el elemento.'
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
        
    }