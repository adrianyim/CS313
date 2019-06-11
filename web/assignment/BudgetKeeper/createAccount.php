<?php
$username = htmlspecialchars($_POST['Username']);
$password = htmlspecialchars($_POST['Password']);
$gender = htmlspecialchars($_POST['Gender']);

if (!isset($username) || $username == "" || !isset($password) || $password == "" || !isset($gender) || $gender == "")
{
    echo "Username or password is incorrected!!";
    header("Location: signUp.php");
    die();
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

require("connectDB.php");
$db = get_db();


$statement = $db->prepare('INSERT INTO users (user_id, user_name, password, gender) VALUES(DEFAULT, :username, :password, :gender)');
$statement->bindValue(':username', $username);
$statement->bindValue(':password', $hashedPassword);
$statement->bindValue(':gender', $gender);
$statement->execute();


header("Location: login.php");
die();
?>