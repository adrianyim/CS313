<?php
$username = htmlspecialchars($_POST['Username']);
$password = htmlspecialchars($_POST['Password']);
$gender = htmlspecialchars($_POST['Gender']);

if (!isset($username) || $username == "" || !isset($password) || $password == "" || !isset($gender) || $gender == "")
{
    header("Location: signUp.php");
    exit;
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

require('connectDB.php');
$db = getDB();

$statement = $db->prepare('INSERT INTO users(user_id, user_name, password, gender) VALUES(DEFAULT, :username, :password, :gender);');
$statement->bindValue(':username', $username);
$statement->bindValue(':password', $hashedPassword);
$statement->bindValue(':gender', $gender);
$statement->execute();

header("Location: login.php");
exit;
?>