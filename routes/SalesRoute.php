<?php 

    include '../controller/SalesController.php';

    $action = $_POST['action'];

    switch($action){
        //module clients
        case 'getClients':
            echo GetClient();
            break;
        case 'updateStateClient':
            echo UpdateStateClient();
            break;
        case 'updateClient':
            echo UpdateClient();
            break;
        case 'insertClient':
            echo InsertClient();
            break;
        case 'getClientById':
            echo GetClientById();
            break;
        default:
            break;
    }

    //module client
    function GetClient(){
        $SalesController = new SalesController();
        return json_encode($SalesController->GetClientController());
    }

    function UpdateStateClient(){
        $SalesController = new SalesController();
        return json_encode($SalesController->UpdateStateClientController($_POST['state'], $_POST['id']));
    }

    function UpdateClient(){
        $SalesController = new SalesController();
        $data = array(
            "tipo_documento" => $_POST['tipo_documento'],
            "num_documento" => $_POST['num_documento'],
            "nombre" => $_POST['nombre'],
            "apellido" => $_POST['apellido'],
            "direccion" => $_POST['direccion'],
            "celular" => $_POST['celular'],
            "email" => $_POST['email']
        );
        return json_encode($SalesController->UpdateClientController($data, $_POST['id']));
    }

    function InsertClient(){
        $SalesController = new SalesController();
        $data = array(
            "tipo_documento" => $_POST['tipo_documento'],
            "num_documento" => $_POST['num_documento'],
            "nombre" => $_POST['nombre'],
            "apellido" => $_POST['apellido'],
            "direccion" => $_POST['direccion'],
            "celular" => $_POST['celular'],
            "email" => $_POST['email']
        );
        return json_encode($SalesController->InsertClientController($data));
    }

    function GetClientById(){
        $SalesController = new SalesController();
        return json_encode($SalesController->GetClientByIdController($_POST['id']));
    }