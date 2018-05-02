<!DOCTYPE html>
<html>
<head>
	<title>
		<?php echo $this->control; ?>		
	</title>
	<link rel="stylesheet" type="text/css" href="assets/styles.css">
</head>
<body>

	<div class="user">
		 <form method="post">
		 	<input type="submit" name="logout" value="Logout">
		 </form>
		<span>User: <?php echo $_SESSION['user'] ?></span>
	</div>
	<div class="container">
		<div class="title">
			<h1>RECEPTI</h1>
		</div>
		<nav class="navbar">
			<ul>
				<li><a href="?c=homepage" <?php if ($this->control == 'homepage') {echo 'class="active"';}?>>Home</a></li>
				<li><a href="?c=lista" <?php if ($this->control == 'lista') {echo 'class="active"';}?>>Lista recepata</a></li>
				<li><a href="?c=login" <?php if ($this->control == 'admin') {echo 'class="active"';}?> >Admin strana</a></li>
			</ul>
		</nav>