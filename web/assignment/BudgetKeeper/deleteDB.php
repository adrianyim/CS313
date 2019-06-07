<?php
$item_id = htmlspecialchars($_GET['item_id']);

require('connectDB.php');
$db = getDB();

//Delete items table
$statement = $db->prepare('DELETE FROM items WHERE item_id=:id;');
$statement->bindValue(':id', $item_id);
$statement->execute();

header("Location: budget-keeper.php");
exit;
?>