<?php
session_start();
$badLogin = false;

if (isset($_POST['username']) && isset($_POST['password']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];

	require("connectDB.php");
	$db = get_db();
	$statement = $db->prepare('SELECT password FROM login WHERE username=:username');
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
			die();
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
    <form>
        <?php
        if ($badLogin)
        {
            echo "Incorrect username or password!";
        }
        ?>

        <input type="text" name="username" placeholder="Username"><br><br>
        <input type="password" name="password" placeholder="Password"><br><br>
        <input type="submit" value="Log in">
    </form method="post" >
    <br><br>
    <a href="createAccount.php">Create Account</a>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/assignment/footer.php';
?>
</body>
</html>