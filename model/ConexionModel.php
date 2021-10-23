<?php 

    require_once __DIR__.'/../config/db.php';

    class ConexionModel{

        private function Conectar(){
            $db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_DATABASE.';charset='.CHARSET.'', DB_USER, DB_PASS);
            return $db;
        }

        public function ExecSpWithParam($query, $paramArray) //get data
        {
            try{
                $cnn = $this->Conectar();
                $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sth = $cnn->prepare($query);
                $sth->execute($paramArray);
                $cnn = null;
                return $sth->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $ex){
                return $ex;
            }
        }

        public function InsertUpdateSp($query, $paramArray){
            $cnn = $this->Conectar();
            $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sth = $cnn->prepare($query);
            $sth->execute($paramArray);
            $cnn = null;
            return $sth->rowCount();
        }

        public function DeleteRowsSp($query, $paramArray)
        {
            $cnn = $this->Conectar();
            $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sth = $cnn->prepare($query);
            $sth->execute($paramArray);
            $cnn = null;
            return $sth->rowCount();
        }

    }