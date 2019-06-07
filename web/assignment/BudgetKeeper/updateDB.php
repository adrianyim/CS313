<?php
session_start();

$item_id = $_SESSION['item_id'];
$item = $_SESSION['item'];
$item_type = $_SESSION['item_type'];
$cost = $_SESSION['cost'];
$cost_type = $_SESSION['cost_type'];
$remark = $_SESSION['remark'];

require('connectDB.php');
$db = getDB();

echo $item_id;

var_dump('not working');

//Update items table
$statement = $db->prepare('UPDATE items SET item=:item, item_type=:item_type, cost=:cost, cost_type=:cost_type, remark=:remark WHERE item_id=:id;');
$statement->bindValue(':id', $item_id);
$statement->bindValue(':item', $item);
$statement->bindValue(':item_type', $item_type);
$statement->bindValue(':cost', $cost);
$statement->bindValue(':cost_type', $cost_type);
$statement->bindValue(':remark', $remark);
$statement->execute();

var_dump('working');

// header("Location: budget-keeper.php");
// exit;
?>