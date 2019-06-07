<?php
$item_id = htmlspecialchars($_GET['item_id']);

require('connectDB.php');
$db = getDB();

echo $item_id;

var_dump('not working');

//Delete items table
$statement = $db->prepare('DELETE FROM items WHERE item_id=:id;');
$statement->bindValue(':id', $item_id);
$statement->execute();

var_dump('working');
?>