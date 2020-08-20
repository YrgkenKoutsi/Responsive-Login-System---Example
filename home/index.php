<?php
//include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: ../index.php'); }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
		<!-- Favicon -->
		<link rel="shortcut icon" href="../FavIcon/favicon.ico">
	  <link rel="stylesheet" href="../assets/css/main.css">
	</head>
	<body>
			<h1>Menu</h1>
			<ul>
				<li><a href='../logout.php'>Logout</a></li>
			</ul>
			<div class='clear'></div>
			<hr />
	</body>
</html>
