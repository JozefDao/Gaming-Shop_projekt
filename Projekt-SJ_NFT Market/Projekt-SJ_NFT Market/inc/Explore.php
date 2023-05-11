<?php
    class Explore{
        public $db;
        
        function get_explore(){
            include('inc/Database.php');
            $this->db = new Database();
            $query = $this->db->conn->query("SELECT * FROM explore");
            $explore = $query->fetchAll(PDO::FETCH_OBJ);
            return $explore;
        }
        function add_explore(){
            include('inc/Database.php');
            $this->db = new Database();
            //$query
        }
    }
    $Explore = new Explore();
?>