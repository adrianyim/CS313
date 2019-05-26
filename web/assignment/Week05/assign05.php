<?PHP
try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Assignment 05</title>
    <link rel="stylesheet" href="../Week02/home.css">
</head>
<body>
<?php
include $_SERVER['DOCUMENT_ROOT'].'/assignment/Week02/header.php';
?>
    <div class="div-content">

    <form action="" id="insertForm" method="post">
        <input type="text" name="User">
        <input type="radio" name="gender" value="M">Male <br>
        <input type="radio" name="gender" value="F">Female <br>
        <input type="text" name="Item">
        <select name="item_type">
            <option value="Salaries and wages">Salaries and wages</option>
            <option value="Utility expenses">Utility expenses</option>
            <option value="Administration expenses">Administration expenses</option>
            <option value="Finance costs">Finance costs</option>
            <option value="Depreciation">Depreciation</option>
            <option value="Impairment losses">Impairment losses</option>
            <option value="Food">Food</option>
            <option value="Others">Others</option>
        </select>
        <input type="text" name="Cost">
        <input type="submit" name="Submit" value="Submit">
    </form>

    <?PHP
    foreach ($db->query('SELECT * FROM summary') as $row)
    {
      echo $row['user_id'] . ' ' . $row['item_id'] . ' ' . $row['total'] . ' ' . $row['date_'] . ' '. $row['date_type'];
    }
    ?>
    </div>
<?php
include $_SERVER['DOCUMENT_ROOT'].'/assignment/Week02/footer.php';
?>
</body>
</html>