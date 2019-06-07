<?php
session_start();

$item_id = $_SESSION['item_id'];
$item = htmlspecialchars($_GET['item']);
$item_type = htmlspecialchars($_GET['item_type']);
$cost = htmlspecialchars($_GET['cost']);
$cost_type = htmlspecialchars($_GET['cost_type']);
$remark = htmlspecialchars($_GET['remark']);

require('connectDB.php');
$db = getDB();

echo $_SESSION['item_id'];
echo $_SESSION['item'];
echo $_SESSION['item_type'];
echo $_SESSION['cost'];
echo $_SESSION['cost_type'];
echo $_SESSION['remark'];

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