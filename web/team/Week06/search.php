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

session_start();
$query = $_POST['Book'];
$_SESSION["query"] = $query;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Result</title>
</head>
<body>
    <?php
        $query = htmlspecialchars($query);
        
        foreach ($db->query("SELECT * FROM Scripture WHERE book LIKE '%" . $query . "%'") as $row)
        {
            $result = $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'];

            $_SESSION["details"] =+ '<b>' . $result . '</b><br>' . $row['content'] . '<br>';

            echo "<a href='scripture-details.php?id='>$result</a></br>";
        }
    ?>
</body>
</html>