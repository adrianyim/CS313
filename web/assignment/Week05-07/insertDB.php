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

$statement = $db->prepare('INSERT INTO user(user_id, user_name, gender) VALUES (DEFAULT, :user, :gender);');
$statement->bindValue(':user', $user, PDO::PARAM_STR);
$statement->bindValue(':content', $gender, PDO::PARAM_STR_CHAR);
$statement->execute();

$new_page = "budget-planner.php?course_id=$course_id";

header("Location: $new_page");
die();
?>