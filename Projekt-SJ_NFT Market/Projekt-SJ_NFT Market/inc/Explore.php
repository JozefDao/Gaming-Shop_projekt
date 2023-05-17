<?php
class Explore {
    public $db;
    
    function get_explore() {
        require_once('inc/Database.php');
        $this->db = new Database();
        $query = $this->db->conn->query("SELECT * FROM explore");
        $explore = $query->fetchAll(PDO::FETCH_OBJ);
        return $explore;
    }
    
    function add_explore($user, $amount) {
        require_once('inc/Database.php');
        $this->db = new Database();
        $query = "INSERT INTO explore (user, amount) VALUES ('$user', '$amount')";
        $result = $this->db->conn->exec($query);
        if($result){

        } else {
            echo "Chyba pri vkladaní údajov";
        }
    }
}

$Explore = new Explore();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["user"];
    $amount = $_POST["amount"];
    
    $Explore->add_explore($user, $amount);

    
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

$data = $Explore->get_explore();
$data = array_filter($data, function($item) {
    return $item->amount >= 5;
});
$data = array_slice($data, 0, 10);
?>

<style>
    .page-heading {
        text-align: center;
    }
    
    table {
        border-collapse: collapse;
        margin: 0 auto;
    }

    th, td {
        border: 2px solid black;
        padding: 8px;
        text-align: center;
    }
    
    input[type="text"] {
        padding: 5px;
        border: 1px solid black;
    }
    
    button[type="submit"] {
        padding: 5px 10px;
        background-color: blue;
        color: white;
        border: none;
        cursor: pointer;
    }
</style>

<div class="page-heading">
    <table>
        <tr>
            <th>Meno používateľa</th>
            <th>Množstvo ETH</th>
        </tr>
        <?php $count = 0; ?>
        <?php foreach ($data as $item): ?>
            <?php if ($count >= 10) break; ?>
            <tr>
                <td><?php echo $item->user; ?></td>
                <td><?php echo $item->amount; ?></td>
            </tr>
            <?php $count++; ?>
        <?php endforeach; ?>
        <tr>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <td><input type="text" name="user" required></td>
                <td><input type="text" name="amount" required></td>
                <td><button type="submit">Create</button></td>
            </form>
        </tr>
    </table>
</div>

