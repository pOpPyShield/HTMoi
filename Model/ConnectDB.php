<?php 
    require_once 'Config.php';
    require_once './DBInfo/Inf.php';
    class Db {
        protected $_pdo;
        protected $_result;

        public function __construct()
        {
            try {
                $this->_pdo = new PDO('mysql:host=' . Config::get('mysql/host'). ';dbname='.Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
            } catch(PDOException $e) {
                die($e->getMessage());
            }
        }
    }


?>