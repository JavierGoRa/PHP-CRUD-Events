<?php

    class usuarioModelo {

        private $pdo;
        private $usuarioModelo;

        public function __construct(){

            try{
                $host = "localhost";
                $dbname = "bdusuarios";
                $user = "root";
                $password = "";
                $charset = "utf8mb4";
                $collate = "utf8mb4_unicode_ci";
                $dsn = "mysql:host=$host;dbname=$dbname; charset=$charset";
                $option = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_PERSISTENT => true,
                    PDO::ATTR_EMULATE_PREPARES => false,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES $charset COLLATE $collate"
                ];
                $this->pdo = new PDO($dsn, $user, $password, $option);
            } catch (PDOException $e){

                exit($e->getMessage());

            }

        }

        public function getUserEmail($email){
            try {
                $st = $this->pdo->prepare('select * from usuarios where email = :email limit 1');
                $st->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'usuario');
                $st->bindParam(':email', $email);
                $st->execute();

                if ($st->rowCount() == 0) {
                    return false;
                } else {
                    return $st->fetch();
                }

            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        
    }

?>