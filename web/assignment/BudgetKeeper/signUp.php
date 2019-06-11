<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Budget Keeper | Sign Up</title>
    <link rel="stylesheet" href="/assignment/home.css">
</head>
<body>
<?php
include $_SERVER['DOCUMENT_ROOT'].'/assignment/header.php';
?>

<div class="div-info">
    <form method="post" action="createAccount.php">
        <input type="text" name="Username" placeholder="Username"><br><br>
        <input type="password" name="Password" placeholder="Password"><br><br>
        <input type="password" name="Repassword" placeholder="Re-Password" onclick="<?php if ($_GET['Password'] != $_GET['Repassword'] || !isset($_GET['Password']) || !isset($_GET['Repassword']))
        {
            echo "Password incorrected!!";
        }
        else
        {
            echo "Password corrected!";
        }
        ?>"><br><br>
        <label>Gender:</label>
        <input type="radio" name="Gender" value="M">Male
        <input type="radio" name="Gender" value="F">Female<br><br>
        <input type="submit" value="Create Account"><br><br>
        <label class="links"><a href="/assignment/BudgetKeeper/login.php">Back</a></label>
    </form>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/assignment/footer.php';
?>
</body>
</html>