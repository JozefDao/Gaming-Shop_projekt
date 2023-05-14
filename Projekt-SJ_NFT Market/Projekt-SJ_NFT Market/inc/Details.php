<?php
class Details{
    private $db;
    
    public function __construct(){
        require_once('Database.php');
        $this->db = new Database();
    }

    
    public function get_details($owner){
        $sql = "SELECT * FROM details WHERE owner = :owner";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->bindParam(':owner', $owner);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    
    public function update_details($owner, $wallet_balance, $number_of_nfts){
        $sql = "UPDATE details SET wallet_balance = :wallet_balance, number_of_nfts = :number_of_nfts WHERE owner = :owner";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->bindParam(':wallet_balance', $wallet_balance);
        $stmt->bindParam(':number_of_nfts', $number_of_nfts);
        $stmt->bindParam(':owner', $owner);
        $stmt->execute();

        
        $updated_details = $this->get_details($owner);

        
        $sql = "SELECT * FROM details";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute();
        $details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo "<div class='page-heading normal-space'>";
        echo "<table class='table table-striped'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Owner</th>";
        echo "<th>Wallet balance</th>";
        echo "<th>Number of NFTs</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($details as $detail) {
            echo "<tr>";
            echo "<td>" . $detail['owner'] . "</td>";
            echo "<td>" . $detail['wallet_balance'] . "</td>";
            echo "<td>" . $detail['number_of_nfts'] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    }
}

$details = new Details();
$owner = 'John';
$wallet_balance = 1000;
$number_of_nfts = 5;
$details->update_details($owner, $wallet_balance, $number_of_nfts);
?>