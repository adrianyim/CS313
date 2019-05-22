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
    <title>Search Result</title>
</head>
<body>
    <?php
        $query = $_POST['Book'];

        $query = htmlspecialchars($query);

        $db_results = $db->query('SELECT * FROM Scripture WHERE (book LIKE '%".$query."%')');

        if (mysql_num_rows($db_results) > 0) {
            while ($results = mysql_fetch_array($db_results)) {
                echo '<b>' . $results['book'] . ' ' . $results['chapter'] . ':' . $results['verse'] . '</b> - "' .$results['content'] . '"</br>';
            }
        } else {
            echo "No results";
        }
    ?>
</body>
</html>