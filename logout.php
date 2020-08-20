<?php
//include config
require_once('includes/config.php');

//log user out
$user->logout();
header('Location: index.php');

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Logout</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="FavIcon/favicon.ico">
  </head>
  <body>

  </body>
</html>
