<?php
session_start();
$item = htmlspecialchars($_POST['Item']);
$item_type = htmlspecialchars($_POST['Item-type']);
$cost = htmlspecialchars($_POST['Cost']);
$cost_type = htmlspecialchars($_POST['Cost-type']);
$remark = htmlspecialchars($_POST['Remark']);
$username = htmlspecialchars($_SESSION['username']);

require('connectDB.php');
$db = getDB();

//Insert items table
$statement = $db->prepare('INSERT INTO items(item_id, item, item_type, cost, cost_type, remark, date, user_name) VALUES (DEFAULT, :item, :item_type, :cost, :cost_type, :remark, current_timestamp, :username);');

$statement->bindValue(':item', $item);
$statement->bindValue(':item_type', $item_type);
$statement->bindValue(':cost', $cost);
$statement->bindValue(':cost_type', $cost_type);
$statement->bindValue(':remark', $remark);
$statement->bindValue(':username', $username);
$statement->execute();

header("Location: budget-keeper.php");
exit;
?>