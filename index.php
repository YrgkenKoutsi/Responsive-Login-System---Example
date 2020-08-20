<?php require('includes/config.php');
//check if already logged in
if( $user->is_logged_in() ){ header('Location: home/index.php'); }
// ini_set('display_errors', 1);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<title>Login Form</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="FavIcon/favicon.ico">
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/socials.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">
					<!-- LOGIN PHP CODE BELOW -->
					<?php
					//process login form if submitted
					if(isset($_POST['submit'])){

						$username = trim($_POST['username']);
						$password = trim($_POST['password']);

						if($user->login($username,$password)){

							//logged in return to index page
							header('Location: index.php');
							exit;


						} else {
								$error[] = 'Wrong Username or Password.';
						}

					}//end if submit

					?>

					<!-- REGISTRATION PHP CODE BELOW -->
					<?php

					//if form has been submitted process it
					if(isset($_POST['submitSignup'])){

						//collect form data
						extract($_POST);

						//very basic validation
						if($username == ''){
							$error[] = 'Please enter the username.';
						}

						if($password ==''){
							$error[] = 'Please enter the password.';
						}

						if($passwordConfirm ==''){
							$error[] = 'Please confirm the password.';
						}

						if($password != $passwordConfirm){
							$error[] = 'Passwords do not match.';
						}

						if($email ==''){
							$error[] = 'Please enter the Email Address.';
						}

						if(!isset($error)){

							$hashedpassword = $user->password_hash($password, PASSWORD_BCRYPT);

							try {
								//insert into database
								$stmt = $db->prepare('INSERT INTO login_users (username,password,email) VALUES (:username, :password, :email)') ;
								$stmt->execute(array(
									':username' => $username,
									':password' => $hashedpassword,
									':email' => $email
								));

									//redirect to index page// Display the alert box
									echo '<script>alert("Welcome, you can now log in")</script>';


								} catch(PDOException $e) {
										echo $e->getMessage();
								}

							}
					}
					//error function
					$functions->checkError( $error );
					?>

				<!-- Header -->
					<header id="header">
								<h1>A Simple login and registration system!</h1>
						<nav>
							<ul>
								<li><a href="#Login">Login</a></li>
								<li><a href="#signup">Sign Up</a></li>
							</ul>
						</nav>
					</header>

				<!-- Main -->
					<div id="main">

						<!-- Login -->
							<article id="Login">
								<h2 class="major">Login</h2>
								<form method="post" action="">
									<div class="fields">
										<div class="field half">
											<label for="username">Username</label>
											<input type="text" name="username" value="" />
										</div>
										<div class="field half">
											<label for="password">Password</label>
											<input type="password" name="password" value="" autocomplete="on"/>
										</div>

									</div>
									<ul class="actions">
										<li><input type="submit" name="submit" value="Login" class="primary" /></li>
										<li><input type="reset" value="Reset" /></li>
									</ul>
								</form>
								<ul class="icons">
									<li><a href="#" class="fa fa-twitter"><span class="label"></span></a></li>
									<li><a href="#" class="fa fa-facebook"><span class="label"></span></a></li>
									<li><a href="#" class="fa fa-instagram"><span class="label"></span></a></li>
									<li><a href="#" class="fa fa-github"><span class="label"></span></a></li>
								</ul>
							</article>


							<!-- signup -->
								<article id="signup">
									<h2 class="major">Sign Up</h2>
									<form method="post" action="">
										<div class="fields">
											<div class="field half">
												<label for="username">Username</label>
												<input type='text' name='username' value='<?php if(isset($error)){ echo $_POST['username'];}?>'></p>
											</div>
											<div class="field half">
												<label for="password">Password</label>
												<input type='password' name='password' autocomplete="on" value='<?php if(isset($error)){ echo $_POST['password'];}?>'></p>
											</div>
											<div class="field half">
												<label for="password">Comfirm Password</label>
												<input type='password' name='passwordConfirm' autocomplete="on" value='<?php if(isset($error)){ echo $_POST['passwordConfirm'];}?>'></p>
											</div>
											<div class="field half">
												<label for="email">Email</label>
												<input type='text' name='email' value='<?php if(isset($error)){ echo $_POST['email'];}?>'></p>
											</div>
										</div>
										<ul class="actions">
											<li><input type='submit' name='submitSignup' value='Submit'></li>
											<li><input type="reset" value="Reset" /></li>
										</ul>
									</form>

								</article>
					</div>

				<!-- Footer -->
					<footer id="footer">
						<p class="copyright">&copy; Simple Login Form: <a href="https://github.com/YrgkenKoutsi">Yrgken Koutsi</a>.</p>

					</footer>

			</div>

		<!-- Background -->
			<div id="background"></div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
