<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="wevice-winitial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Team Activity Week03</title>
    <link rel="stylesheet" type="text/css" href="../../style/main.css">
</head>
<body>

<?PHP
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$NAME = $_POST["Name"];
$EMAIL = $_POST["Email"];
$MAJOR = $_POST["Major"];
$COMMENT = $_POST["Comments"];
$VISITED  = $_POST["Visited"];
}

include '/assignment/Week02/header.php';

$converter = array("na" => "North America", "sa" => "South America", "e" => "Europe", "a" => "Asia", "au" => "Australia", "af" => "Africa", "an" => "Antarctica");
?>


<form method="post" action="<?PHP htmlspecialchars($_SERVER["PHP_SELF"]); ?>" > 
Name:
<input type="text" placeholder="Name" name="Name">
<br>
Email:
<input tyoe="text" placeholder="Email" name="Email">
<br>
Major:
<?php
for ($i = 0; $i < count($majorsArray); $i++) : ?>
    <?php $major = $majorsArray[$i];?>
    <input type="radio" name="Major" value="<?php echo $major?>"> <?php echo $major ?>
<?php endfor?>

<br>
Comments:
<br>
<textarea name="Comments" rows="5" cols="40" placeholder="Enter Comments Here"></textarea>
<br>
Visited Place(s):
<br>
<input type="checkbox" name="Visited[]" value="na">North America<br>
<input type="checkbox" name="Visited[]" value="sa">South America<br>
<input type="checkbox" name="Visited[]"  value="e">Europe<br>
<input type="checkbox" name="Visited[]" value="a">Asia<br>
<input type="checkbox" name="Visited[]" value="au">Australia<br>
<input type="checkbox" name="Visited[]" value="af">Africa<br>
<input type="checkbox" name="Visited[]" value="an">Antarctica<br>
<br>
<input type="submit" value="Submit Answers">

</form>
<br>

<hr>
<p>
NAME = <?PHP echo $NAME ?> <br>
EMAIL = <?PHP echo $EMAIL ?> <br>
MAJOR = <?PHP echo $MAJOR ?>  <br>
COMMENT = <?PHP echo $COMMENT ?> <br>
VISITED = 
<?php 
foreach ($VISITED as $place) {
    echo $converter[$place];
    echo ", ";
}
?>
</p>

</body>
</html>