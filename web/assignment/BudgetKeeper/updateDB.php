<?php
session_start();

$item_id = htmlspecialchars($_GET['Item_id']);
$item = htmlspecialchars($_GET['Item']);
$item_type = htmlspecialchars($_GET['Item_type']);
$cost = htmlspecialchars($_GET['Cost']);
$cost_type = htmlspecialchars($_GET['Cost_type']);
$remark = htmlspecialchars($_GET['Remark']);

require('connectDB.php');
$db = getDB();

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