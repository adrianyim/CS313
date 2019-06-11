<?php
$username = $_POST['Username'];
$password = $_POST['Password'];
$gender = $_POST['Gender'];

if (!isset($username) || $username == "" || !isset($password) || $password == "" || !isset($gender) || $gender == "")
{
    header("Location: signUp.php");
    die();
}

$username = htmlspecialchars($username);
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$gender = htmlspecialchars($gender);

require("connectDB.php");
$db = get_db();

$statement = $db->prepare('INSERT INTO users (username, password, gender) VALUES(DEFAULT, :username, :password, :gender)');
$statement->bindValue(':username', $username);
$statement->bindValue(':password', $hashedPassword);
$statement->bindValue(':gender', $gender);
$statement->execute();

header("Location: login.php");
die();
?>