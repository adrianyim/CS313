<?php

// header("Location: http://" . $_SERVER['HTTP_HOST'] . "/budget-planner.php");
// header("Location: budget-planner.php");
// exit;

$user = htmlspecialchars($_POST['User']);
$gender = htmlspecialchars($_POST['Gender']);
$item = htmlspecialchars($_POST['Item']);
$item_type = htmlspecialchars($_POST['Item-type']);
$cost = htmlspecialchars($_POST['Cost']);
$cost_type = htmlspecialchars($_POST['Cost-type']);
$remark = htmlspecialchars($_POST['Remark']);

require('connectDB.php');
$db = getDB();

$statement = $db->pdo->prepare('INSERT INTO users(user_id, user_name, gender) VALUES (DEFAULT, :user, :gender);');

$statement->bindValue(':user', $user);
$statement->bindValue(':gender', $gender);
var_dump('get state 3');
$statement->execute();

var_dump('executed');

header("Location: budget-planner.php");
exit;
?>