<?php
    class Explore{
        public $db;
        
        function get_explore(){

            $this->db = new Database();
            $query = $this->db->conn->query("SELECT * FROM exploore");
            $explore = $query->fetchAll(PDO::FETCH_OBJ);
            print_r($explore);

            /*for ($i=1;$i<=$explore_num;$i++){
                if($i%4==1){
                    echo '<div class="row">';
                    echo '<div class="col-25 explore text-white text-center" id="explore-'.$i.'">';
                    echo 'Liberty NFT Market'.$i;
                    echo '</div>';
                }
                elseif($i%4==0){
                    echo '<div class="col-25 explore text-white text-center" id="explore-'.$i.'">';
                    echo 'Liberty NFT Market'.$i;
                    echo '</div>';
                    echo '</div>';
                }
                else{
                    echo '<div class="col-25 explore text-white text-center" id="explore-'.$i.'">';
                    echo 'Liberty NFT Market'.$i;
                    echo '</div>';
                }
            }*/
        }
    }
    $Explore = new Explore();
?>