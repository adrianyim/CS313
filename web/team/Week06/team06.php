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
  <title>Team Week05</title>
</head>
<body>
  <h1>Scripture Resources</h1></br>
    <?PHP
    foreach ($db->query('SELECT * FROM Scripture') as $row)
    {
      echo '<b>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</b> - "' .$row['content'] . '"</br>';
    }
    ?>

    <form action="search.php" id="searchForm" method="post">
      <input type="text" name="Book">
      <input type="submit" name="Submit" value="Search">
    </form>
    <form method="post">
      <label>Book</label><br>
      <input type="text" name="Book"><br>
      <label>Chapter</label><br>
      <input type="text" name="Chapter"><br>
      <label>Verse</label><br>
      <input type="text" name="Verse"><br>
      <label>Content</label><br>
      <input type="textarea" name="Content">

      <?php
      foreach ($db->query('SELECT * FROM topic') as $row)
      {
        echo $row['name'] . ': <input type="checkbox name="' . $row['name'] . '">';
      }
      ?>
    </form>
</body>
</html>