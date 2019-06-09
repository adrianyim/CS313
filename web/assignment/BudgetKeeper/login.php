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
        <input type="text" name="username" placehoder="Username"><br><br>
        <input type="password" name="password" placehoder="Password"><br><br>
        <input type="submit" value="Log in">
    </form>
    <br><br>
    <a href="createAccount.php">Create Account</a>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/assignment/footer.php';
?>
</body>
</html>