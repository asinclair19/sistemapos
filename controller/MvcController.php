<?php
    session_start();
    class MvcController{

        #render plantillas
        public function FooterTemplate(){
            include 'view/templates/Footer.php';
        }
        
        public function NavBarTemplate(){
            include 'view/templates/NavBar.php';
        }

        public function SideBarTemplate(){
            include 'view/templates/SideBar.php';
        }

        #render contenido y urls
        public function RenderBody(){
            if(isset($_GET["accion"])){
                $accion =  $_GET["accion"];
                $url = $this->GetUrlAcceso($accion);
            }else{
                $url = 'view/Inicio.php';
            }
            include $url;
        }

        public function GetUrlAcceso($accion){
            $url = '';
            $accion = explode('/', $accion);
            
            foreach($_SESSION['usersections'] as $section){
                if($section['accion'] == $accion[0]){
                    $url = $section['url'];
                }

                if(count($accion) > 1){
                    $_GET['id'] = $accion[1];
                }
            }
            return $url;
        }

        #Validar exista sesion
        public function ValidSessionUser(){
            if(isset($_SESSION['userinfo'])){
                return true;
            }else{
                return false;
            }
        }

    }