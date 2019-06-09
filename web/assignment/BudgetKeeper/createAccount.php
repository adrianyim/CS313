<?php
$username = $_POST['username'];
$password = $_POST['password'];

if (!isset($username) || $username == "" || !isset($password) || $password == "")
{
    header("Location: login.php");
    die();
}

$username = htmlspecialchars($username);
// $password = htmlspecialchars($password);

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

require("connectDB.php");
$db = get_db();

$statement = $db->prepare('INSERT INTO login(username, password) VALUES(:username, :password)');
$statement->bindValue(':username', $username);
$statement->bindValue(':password', $hashedPassword);
$statement->execute();

header("Location: login.php");
die();
?>