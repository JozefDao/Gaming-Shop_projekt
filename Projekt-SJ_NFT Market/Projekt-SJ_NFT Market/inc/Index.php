<style>
    .main-banner table {
        color: cyan;
        font-size: 18px;
        border-collapse: collapse;
        margin: 0 auto;
        border: 3px solid black;
        padding: 5px;
    }
    .main-banner td {
        padding: 10px;
        border: 1px solid black;
    }
    .main-banner th {
        padding: 10px;
        border: 1px solid black;
    }
    .main-banner h2 {
        text-align: center;
        color: white;
        margin-bottom: 20px;
    }
</style>
<?php
class Home{
    public $db;
    
    function __construct() {
        include('inc/Database.php');
        $this->db = new Database();
    }
    
    function get_home(){
        $query = $this->db->conn->query("SELECT * FROM home");
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        return $results;
    }
}
$home = new Home();
$results = $home->get_home();
echo '<div class="main-banner">';
echo '<h2>Hot collections in market</h2>';
echo '<div style="text-align:center">';
echo '<table>';
echo '<tr><th>Name</th><th>Items</th><th>Category</th></tr>';
foreach($results as $row) {
    echo '<tr><td>' . $row->name . '</td><td>' . $row->items . '</td><td>' . $row->category . '</td></tr>';
}
echo '</table>';
echo '</div>';
echo '</div>';
?>