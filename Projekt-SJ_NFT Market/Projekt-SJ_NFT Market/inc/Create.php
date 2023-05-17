<?php
require_once('Database.php');


$db = new Database();


function getItems()
{
    global $db;
    $query = $db->conn->query("SELECT * FROM create_yours");
    $items = $query->fetchAll(PDO::FETCH_ASSOC);
    return $items;
}


function createItem($itemTitle, $description, $username, $price, $royalties)
{
    global $db;
    $query = $db->conn->prepare("INSERT INTO create_yours (item_title, description_for_item, your_username, price_of_item_ETH, royalties) VALUES (:itemTitle, :description, :username, :price, :royalties)");
    $query->bindParam(':itemTitle', $itemTitle);
    $query->bindParam(':description', $description);
    $query->bindParam(':username', $username);
    $query->bindParam(':price', $price);
    $query->bindParam(':royalties', $royalties);
    $query->execute();
    
    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
}


function updateItem($itemId, $itemTitle, $description, $username, $price, $royalties)
{
    global $db;
    $query = $db->conn->prepare("UPDATE create_yours SET item_title = :itemTitle, description_for_item = :description, your_username = :username, price_of_item_ETH = :price, royalties = :royalties WHERE id = :itemId");
    $query->bindParam(':itemTitle', $itemTitle);
    $query->bindParam(':description', $description);
    $query->bindParam(':username', $username);
    $query->bindParam(':price', $price);
    $query->bindParam(':royalties', $royalties);
    $query->bindParam(':itemId', $itemId);
    $query->execute();
    
    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
}


function deleteItem($itemId)
{
    global $db;
    $query = $db->conn->prepare("DELETE FROM create_yours WHERE id = :itemId");
    $query->bindParam(':itemId', $itemId);
    $query->execute();
    
    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
}


if (isset($_POST['create'])) {
    $itemTitle = $_POST['itemTitle'];
    $description = $_POST['description'];
    $username = $_POST['username'];
    $price = $_POST['price'];
    $royalties = $_POST['royalties'];
    createItem($itemTitle, $description, $username, $price, $royalties);
}


if (isset($_POST['update'])) {
    $itemId = $_POST['itemId'];
    $itemTitle = $_POST['itemTitle_' . $itemId];
    $description = $_POST['description_' . $itemId];
    $username = $_POST['username_' . $itemId];
    $price = $_POST['price_' . $itemId];
    $royalties = $_POST['royalties_' . $itemId];
    updateItem($itemId, $itemTitle, $description, $username, $price, $royalties);
}


if (isset($_POST['delete'])) {
    $itemId = $_POST['itemId'];
    deleteItem($itemId);
}


$items = getItems();
?>

<style>
    .input-container {
        align-items: center;
        margin-bottom: 10px;
    }

    .input-container label {
        width: 120px;
        margin-right: 10px;
        text-align: right;
    }
    .page-heading {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
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
        color: #333333;
    }

    tr:hover {
        background-color: #7c4dff;
    }

    th {
        background-color: #90caf9;
    }

    .delete-button,
    .update-button,
    .create-button {
        background-color: #2196f3;
        color: #ffffff;
        border: none;
        padding: 6px 12px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .delete-button:hover,
    .update-button:hover,
    .create-button:hover {
        background-color: #0d47a1;
    }

    .create-form {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 20px;
    }

    .create-form .input-row {
        display: flex;
        flex-direction: row;
        align-items: center;
        margin-bottom: 10px;
    }

    .create-form .input-row label {
        width: 120px;
        margin-right: 10px;
        text-align: right;
    }

    .create-form .input-row input[type="text"],
    .create-form .input-row textarea,
    .create-form .input-row input[type="number"] {
        width: 200px;
        padding: 4px;
    }
</style>

<div class="page-heading">
    <h2>Update & Delete Item</h2>
    <table>
        <tr>
            <th>Item Title</th>
            <th>Description</th>
            <th>Username</th>
            <th>Price_ETH</th>
            <th>Royalties</th>
            <th>Update & Delete Item</th>
        </tr>
        <?php foreach ($items as $item) : ?>
            <tr>
                <td><?php echo $item['item_title']; ?></td>
                <td><?php echo $item['description_for_item']; ?></td>
                <td><?php echo $item['your_username']; ?></td>
                <td><?php echo $item['price_of_item_ETH']; ?></td>
                <td><?php echo $item['royalties']; ?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="itemId" value="<?php echo $item['id']; ?>">
                        <div class="input-container">
                            <label for="itemTitle_<?php echo $item['id']; ?>">Item Title:</label>
                            <input type="text" id="itemTitle_<?php echo $item['id']; ?>" name="itemTitle_<?php echo $item['id']; ?>" value="<?php echo $item['item_title']; ?>" required>
                        </div>
                        <div class="input-container" style="display: flex; margin-left: 5px">
                            <label for="description_<?php echo $item['id']; ?>">Description:</label>
                            <textarea id="description_<?php echo $item['id']; ?>" name="description_<?php echo $item['id']; ?>" required><?php echo $item['description_for_item']; ?></textarea>
                        </div>
                        <div class="input-container">
                            <label for="username_<?php echo $item['id']; ?>">Username:</label>
                            <input type="text" id="username_<?php echo $item['id']; ?>" name="username_<?php echo $item['id']; ?>" value="<?php echo $item['your_username']; ?>" required>
                        </div>
                        <div class="input-container">
                            <label for="price_<?php echo $item['id']; ?>">Price_ETH:</label>
                            <input type="number" id="price_<?php echo $item['id']; ?>" name="price_<?php echo $item['id']; ?>" value="<?php echo $item['price_of_item_ETH']; ?>" required>
                        </div>
                        <div class="input-container">
                            <label for="royalties_<?php echo $item['id']; ?>">Royalties:</label>
                            <input type="number" id="royalties_<?php echo $item['id']; ?>" name="royalties_<?php echo $item['id']; ?>" value="<?php echo $item['royalties']; ?>" required>
                        </div>
                        <div class="input-container">
                            <button style="margin-left: 150px;" type="submit" name="update" class="update-button">Update</button>
                            <button type="submit" name="delete" class="delete-button">Delete</button>
                        </div>
                    </form>

                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <div class="create-form" style="text-align: center;">
        <h2 style="margin-bottom: 20px;">Create Item</h2>
        <form method="POST">
            <div class="input-container" style="margin-bottom: 10px;">
                <input type="text" id="itemTitle" name="itemTitle" value="<?php echo isset($_POST['create']) ? $_POST['itemTitle'] : ''; ?>" required placeholder="Item Title">
            </div>

            <div class="input-container" style="margin-bottom: 10px;">
                <textarea id="description" name="description" required placeholder="Description"><?php echo isset($_POST['create']) ? $_POST['description'] : ''; ?></textarea>
            </div>

            <div class="input-container" style="margin-bottom: 10px;">
                <input type="text" id="username" name="username" value="<?php echo isset($_POST['create']) ? $_POST['username'] : ''; ?>" required placeholder="Username">
            </div>

            <div class="input-container" style="margin-bottom: 10px;">
                <input type="number" id="price" name="price" value="<?php echo isset($_POST['create']) ? $_POST['price'] : ''; ?>" required placeholder="Price_ETH">
            </div>

            <div class="input-container" style="margin-bottom: 10px;">
                <input type="number" id="royalties" name="royalties" value="<?php echo isset($_POST['create']) ? $_POST['royalties'] : ''; ?>" required placeholder="Royalties">
            </div>

            <div class="input-container">
                <button type="submit" name="create" class="create-button">Create</button>
            </div>
        </form>
    </div>


</div>