<?php
class Details {
    private $db;
    
    public function __construct() {
        require_once('Database.php');
        $this->db = new Database();
    }

    public function get_details($owner) {
        $sql = "SELECT * FROM details WHERE owner = :owner";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->bindParam(':owner', $owner);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function update_details($owner, $wallet_balance, $number_of_nfts) {
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
        echo "<th>Update</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($details as $detail) {
            echo "<tr>";
            echo "<td>" . $detail['owner'] . "</td>";
            echo "<td>$" . $detail['wallet_balance'] . "</td>";
            echo "<td>" . $detail['number_of_nfts'] . "</td>";
            echo "<td>";
            echo "<form method='POST' action='".$_SERVER['PHP_SELF']."'>";
            echo "<input type='hidden' name='owner' value='".$detail['owner']."'>";
            echo "<input type='number' name='wallet_balance' value='".$detail['wallet_balance']."'>";
            echo "<input type='number' name='number_of_nfts' value='".$detail['number_of_nfts']."'>";
            echo "<button type='submit' class='btn btn-primary'>Update</button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    }
}

$details = new Details();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $owner = $_POST["owner"];
    $wallet_balance = $_POST["wallet_balance"];
    $number_of_nfts = $_POST["number_of_nfts"];
    $details->update_details($owner, $wallet_balance, $number_of_nfts);
} else {
    $owner = 'John';
    $wallet_balance = 1000;
    $number_of_nfts = 5;
    $details->update_details($owner, $wallet_balance, $number_of_nfts);
}
?>
