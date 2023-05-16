<?php
require_once('Database.php');

// Získanie všetkých autorov
function getAuthors()
{
    global $db;
    $query = $db->conn->query("SELECT * FROM author");
    $authors = $query->fetchAll(PDO::FETCH_ASSOC);
    return $authors;
}

// Odstránenie autora
function deleteAuthor($authorId)
{
    global $db;
    $query = $db->conn->prepare("DELETE FROM author WHERE id = :id");
    $query->bindParam(':id', $authorId);
    $query->execute();
}

// Pripojenie k databáze
$db = new Database();

// Spracovanie odstránenia autora
if (isset($_POST['delete'])) {
    $authorId = $_POST['authorId'];
    deleteAuthor($authorId);
}

// Získanie všetkých autorov
$authors = getAuthors();
?>

<style>
    .page-heading {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
        border: 2px solid #e0e0e0;
    }

    tr:hover {
        background-color: purple;
    }

    th {
        background-color: #90caf9;
        color: #333333;
    }

    .delete-button {
        background-color: #90caf9;
        color: #333333;
        border: none;
        padding: 6px 12px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        cursor: pointer;
    }

    .delete-button:hover {
        background-color: #64b5f6;
    }
</style>

<div class="page-heading">
    <table>
        <tr>
            <th>Name</th>
            <th>Followers</th>
            <th>Likes</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($authors as $author): ?>
            <tr>
                <td><?php echo $author['name']; ?></td>
                <td><?php echo $author['followers']; ?></td>
                <td><?php echo $author['likes']; ?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="authorId" value="<?php echo $author['id']; ?>">
                        <button class="delete-button" type="submit" name="delete">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
