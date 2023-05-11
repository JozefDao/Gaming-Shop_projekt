<?php
    class Home{
        public $db;
        
        function get_home(){
            include('inc/Database.php');
            $this->db = new Database();
            $query = $this->db->conn->query("SELECT * FROM home");
            $explore = $query->fetchAll(PDO::FETCH_OBJ);
            return $home;

           
        }
    }
    $Home = new Home();
?>