<?php
$username = $_POST['Username'];
$password = $_POST['Password'];
$gender = $_POST['Gender'];

if (!isset($username) || $username == "" || !isset($password) || $password == "" || !isset($gender) || $gender == "")
{
    header("Location: signUp.php");
    var_dump('False');
    die();
}

$username = htmlspecialchars($username);
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$gender = htmlspecialchars($gender);

require("connectDB.php");
$db = get_db();

var_dump('connected db');

$statement = $db->prepare('INSERT INTO users (user_id, username, password, gender) VALUES(DEFAULT, :username, :password, :gender)');
$statement->bindValue(':username', $username);
$statement->bindValue(':password', $hashedPassword);
$statement->bindValue(':gender', $gender);
var_dump('true');
$statement->execute();


header("Location: login.php");
die();
?>