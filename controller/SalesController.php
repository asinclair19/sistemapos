<?php 

    require_once __DIR__.'/../model/SalesModel.php';
    require_once '../config/db.php';

    class SalesController{ //

        private $SalesModel;
        private $Response;

        public function __construct(){
            $this->SalesModel = new SalesModel();
        }

        //module client
        public function GetClientController(){
            try{
                $data = $this->SalesModel->GetClientModel();
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

        public function UpdateStateClientController($state, $id){
            try{
                $resp = $this->SalesModel->UpdateStateClientModel($state, $id);
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

        public function InsertClientController($data){
            try{
                $resp = $this->SalesModel->InsertClientModel($data);
                if($resp > 0){
                    $info = $this->SalesModel->GetClientModel();
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

        public function GetClientByIdController($id){
            try{
                $info = $this->SalesModel->GetClientByIdModel($id);
                if(count($info) > 0){
                    $this->Response = array(
                        'state' => true,
                        'info' => $info[0],
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

        public function UpdateClientController($data, $id){
            try{
                $resp = $this->SalesModel->UpdateClientModel($data, $id); //
                if($resp > 0){
                    $info = $this->SalesModel->GetClientModel(); //
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