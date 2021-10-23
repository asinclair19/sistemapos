<?php 

    require_once __DIR__.'/../model/ProductModel.php';
    require_once '../config/db.php';

    class ProductController{

        private $ProductModel;
        private $Response;

        public function __construct(){
            $this->ProductModel = new ProductModel();
        }

        //Categories for products
        public function GetCategoriesController(){
            try{
                $categories = $this->ProductModel->GetCategoriesModel();
                if(count($categories) > 0){
                    $this->Response = array(
                        'state' => true,
                        'categories' => $categories,
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

        public function GetCategoryByIdController($id){
            try{
                $info = $this->ProductModel->GetCategoryByIdModel($id);
                if(count($info) > 0){
                    $this->Response = array(
                        'state' => true,
                        'category' => $info[0],
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

        public function UpdateStateCategoryController($state, $id){
            try{
                $resp = $this->ProductModel->UpdateStateCategoryModel($state, $id);
                if(count($resp) > 0){
                    $this->Response = array(
                        'state' => true,
                        'categories' => $resp,
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

        public function InsertCategoryController($data){
            try{
                $resp = $this->ProductModel->InsertCategoryModel($data);
                if($resp > 0){
                    $categories = $this->ProductModel->GetCategoriesModel();
                    $this->Response = array(
                        'state' => true,
                        'categories' => $categories,
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

        public function UpdateCategoryController($data, $id){
            try{
                $resp = $this->ProductModel->UpdateCategoryModel($data, $id);
                if($resp > 0){
                    $categories = $this->ProductModel->GetCategoriesModel();
                    $this->Response = array(
                        'state' => true,
                        'categories' => $categories,
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

        //Unity for products
        public function GetUnityController(){
            try{
                $data = $this->ProductModel->GetUnityModel();
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

        public function UpdateStateUnityController($state, $id){
            try{
                $resp = $this->ProductModel->UpdateStateUnityModel($state, $id);
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

        public function InsertUnityController($data){
            try{
                $resp = $this->ProductModel->InsertUnityModel($data);
                if($resp > 0){
                    $unities = $this->ProductModel->GetUnityModel();
                    $this->Response = array(
                        'state' => true,
                        'info' => $unities,
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

        public function GetUnityByIdController($id){
            try{
                $info = $this->ProductModel->GetUnityByIdModel($id);
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

        public function UpdateUnityController($data, $id){
            try{
                $resp = $this->ProductModel->UpdateUnityModel($data, $id); //
                if($resp > 0){
                    $info = $this->ProductModel->GetUnityModel(); //
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