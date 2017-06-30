<!DOCTYPE html>
<html>
<body>

<?php
if (isset($_COOKIE["user"]))
  echo "Welcome " . $_COOKIE["user"] . "!<br />";
else
  echo "Welcome cook!<br />";
?>

<?php
if($_POST["status"]=="finish"){
	$myfile = fopen("order.txt", "w") or die("Unable to open file!");
    fclose($myfile);
	$_POST["status"]=="unfinish";
}
?>

<div>

<?php
$myfile = fopen("order.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("order.txt"));
fclose($myfile);
echo "<br/>";
?>

<form action="handle_order.php" method="post">
<input type="radio" name="status" value="finish">finish
<input type="submit" value="OK">
</form>

</div>




</body>
</html>