<?php include('../php/staffLogIn.php')?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css.css" rel="stylesheet" type="text/css">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</head>

<body style="background-color: bisque">
		<br/><br/>
		<div id="login">
	<form action="<?= $_SERVER["PHP_SELF"] ?>" method="post" class="form-horizontal">
		<span class="heading"><h1 class="text-center">用户登录</h1></span>
			
			<div class="form-group" style="text-align: center">
		<?php if (isset($_POST["user"])): ?>
		<input name="user" type="text" placeholder="用户名">
		<?php elseif (isset($_COOKIE["user"])): ?>
		<input name="user" type="text" value="<?= htmlspecialchars($_COOKIE["user"]) ?>" placeholder="用户名" >
		<?php else: ?>
        <input name="user" type="text" value="" placeholder="用户名">
        <?php endif ?>	
		
			<div class="form-group" style="text-align: center">
		<input name="pass" type="password" placeholder="密　码">
			</div>
			<div style="text-align: center">
		<input type="submit" value="登陆" class="btn btn-default" style="margin:0 auto">
			<br/>
			</div>
	</form>
			</div>
</body>
</html>

