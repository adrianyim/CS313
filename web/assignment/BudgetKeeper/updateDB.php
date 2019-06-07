<?php
$item_id = htmlspecialchars($_GET['item_id']);

require('connectDB.php');
$db = getDB();

var_dump('not working');

//Delete items table
$statement = $db->prepare('UPDATE items SET item =, item_type=, cost=, cost_type=, remark=WHERE item_id = 16;');
$statement->bindValue(':id', $item_id);
$statement->execute();

var_dump('working');

// header("Location: budget-keeper.php");
// exit;
?>