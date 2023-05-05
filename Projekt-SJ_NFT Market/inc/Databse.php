<?php
    class Database{
        public $conn;
        function __construct()
        {
            $this->conn = new PDO('mysql:host=localhost;dbname=nft-1;charset=utf8','root','');
            
            if($this->conn){
                echo 'Sme s databázou spojení';
            }else{
                echo 'Nie sme s databázou spojení';
            }
        }
    }
    $db = new Database();
    $db->conn;
?>