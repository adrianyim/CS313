<?php
session_start();
$badLogin = false;

if (isset($_POST['Username']) && isset($_POST['Password']))
{
	$username = htmlspecialchars($_POST['Username']);
	$password = htmlspecialchars($_POST['Password']);

	require("connectDB.php");
	$db = getDB();
	$statement = $db->prepare('SELECT password FROM users WHERE user_name=:username');
	$statement->bindValue(':username', $username);
    $result = $statement->execute();
    
	if ($result)
	{
		$row = $statement->fetch();
        $hashedPasswordFromDB = $row['password'];
        
		if (password_verify($password, $hashedPasswordFromDB))
		{
			$_SESSION['username'] = $username;
			header("Location: budget-keeper.php");
			exit;
		}
		else
		{
			$badLogin = true;
		}
	}
	else
	{
		$badLogin = true;
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Budget Keeper | Login</title>
    <link rel="stylesheet" href="/assignment/home.css">
</head>
<body>
<?php
include $_SERVER['DOCUMENT_ROOT'].'/assignment/header.php';
?>

<div class="div-info">
	<?php if ($badLogin){echo "<label>Incorrect username or password!</label><br><br>";}?>
    <form method="post" action="login.php">
        <input type="text" name="Username" placeholder="Username"><br><br>
        <input type="password" name="Password" placeholder="Password"><br><br>
        <input type="submit" value="Log in">
    </form>
    <br><br>
    <label class="links"><a href="signUp.php">Create Account</a></label>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/assignment/footer.php';
?>
</body>
</html>