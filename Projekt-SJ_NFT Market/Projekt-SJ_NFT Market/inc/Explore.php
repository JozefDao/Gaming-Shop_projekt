<?php
    class Explore{
        public $db;
        
        function get_explore(){
            require_once('inc/Database.php');
            $this->db = new Database();
            $query = $this->db->conn->query("SELECT * FROM explore");
            $explore = $query->fetchAll(PDO::FETCH_OBJ);
            return $explore;
        }
        function add_explore($user,$amount){
            require_once('inc/Database.php');
            $this->db = new Database();
            $query = "INSERT INTO explore (user, amount) VALUES ('$user', '$amount')";
            $result = $this->db->conn->exec($query);
            if($result){
                $query = "SELECT user, amount FROM explore WHERE amount >= 5  LIMIT 10";
                $data = $this->db->conn->query($query)->fetchAll(PDO::FETCH_OBJ);
                $output = '';
                foreach($data as $item){
                    $output .= $item->user . " - " . $item->amount . "<br>";
                }
                echo '<div class="page-heading">' . $output . '</div>';
            } else {
                echo "Chyba pri vkladaní údajov";
            }
        }
    }
    $Explore = new Explore();
    $Explore->add_explore("Meno používateľa", "Množstvo");
?>