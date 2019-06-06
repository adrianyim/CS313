<?php
$user = htmlspecialchars($_POST['User']);
$gender = htmlspecialchars($_POST['Gender']);
$item = htmlspecialchars($_POST['Item']);
$item_type = htmlspecialchars($_POST['Item-type']);
$cost = htmlspecialchars($_POST['Cost']);
$cost_type = htmlspecialchars($_POST['Cost-type']);
$remark = htmlspecialchars($_POST['Remark']);

require('connectDB.php');
$db = getDB();

//Insert users table
$statement = $db->prepare('INSERT INTO users(user_id, user_name, gender) VALUES (DEFAULT, :user, :gender);');

$statement->bindValue(':user', $user);
$statement->bindValue(':gender', $gender);
$statement->execute();

//Insert items table
$statement = $db->prepare('INSERT INTO items(item_id, item, item_type, cost, cost_type, remark) VALUES (DEFAULT, :item, :item_type, :cost, :cost_type, :remark);');

$statement->bindValue(':item', $item);
$statement->bindValue(':item_type', $item_type);
$statement->bindValue(':cost', $cost);
$statement->bindValue(':cost_type', $cost_type);
$statement->bindValue(':remark', $remark);
$statement->execute();

header("Location: budget-planner.php");
// header("Location: http://" . $_SERVER['HTTP_HOST'] . "/budget-planner.php");
exit;
?>