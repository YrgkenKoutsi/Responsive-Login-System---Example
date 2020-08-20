<?php
//include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: ../index.php'); }

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Home Page </title>
	<!-- Favicon -->
	<link rel="shortcut icon" href="../FavIcon/favicon.ico">
  <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>

	<div id="wrapper">

		<?php include('menu.php');?>


	</div>

</body>
</html>
