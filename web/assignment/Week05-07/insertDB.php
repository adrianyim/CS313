<?php
$user = htmlspecialchars($_POST['User']);
$gender = htmlspecialchars($_POST['Gender']);
// $item = htmlspecialchars($_POST['Item']);
// $item_type = htmlspecialchars($_POST['Item-type']);
// $cost = htmlspecialchars($_POST['Cost']);
// $cost_type = htmlspecialchars($_POST['Cost-type']);
// $remark = htmlspecialchars($_POST['Remark']);

require('connectDB.php');
$db = getDB();

var_dump('get DB');

$statement = $db->query('INSERT INTO users(user_id, user_name, gender) VALUES (DEFAULT, :user, :gender);');
var_dump('get state 1');
$statement->bindValue(':user', $user, PDO::PARAM_STR);
var_dump('get state 2');
$statement->bindValue(':gender', $gender, PDO::PARAM_STR_CHAR);
var_dump('get state 3');
$statement->execute();

var_dump('inserted');

$new_page = "budget-planner.php";

header("Location: $new_page");
die();

// echo "<table>";

// foreach ($statement as $rows)
// {
//   echo "<tr><td>" . $rows['user_id'] . '</td><td>' . $rows['user_name'] . '</td><td>' . $rows['gender'] . '</td></tr>';
// }


// echo "</table>";

// echo "<table>";

// foreach ($statement as $rows)
// {
//   echo "<tr><td>" . $rows['item_id'] . '</td><td>' . $rows['item'] . '</td><td>' . $rows['cost'] . '</td><td>' . $rows['cost_type'] . '</td><td>'. $rows['remark'] . '</td></tr>';
// }

// echo "</table>";
?>