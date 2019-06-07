<?php
session_start();

$item_id = $_SESSION['item_id'];
$item = htmlspecialchars($_POST['Item']);
$item_type = htmlspecialchars($_POST['Item_type']);
$cost = htmlspecialchars($_POST['Cost']);
$cost_type = htmlspecialchars($_POST['Cost_type']);
$remark = htmlspecialchars($_POST['Remark']);

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