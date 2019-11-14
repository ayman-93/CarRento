<?php
session_start();


if (isset($_POST['register_user'])){
	$error = "";
	// connect to the database
	$db = mysqli_connect('localhost', 'root', '', 'car_rento');

	$name = mysqli_real_escape_string($db, $_POST['name']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password = mysqli_real_escape_string($db, $_POST['password']);


	$password = md5($password);//encrypt the password before saving in the database

	$query = "INSERT INTO users (name, email, password) 
      VALUES('$name', '$email', '$password')";
      

  if(!empty($email) && !empty($password)){ 
    mysqli_query($db, $query);
    // $row = mysqli_fetch_assoc($results);	
    $_SESSION['loggedin'] = true;

    $select_query = "SELECT * from users WHERE email = '$email'";
    $results = mysqli_query($db, $select_query);

    if (mysqli_num_rows($results) == 1) {
      $row = mysqli_fetch_assoc($results);
      $_SESSION['loggedin'] = true;
      $_SESSION['user_id'] = $row['user_id'];
      header('location: index.php');
    }
	}
  
  
  
// $result = mysqli_query($db, $query);
// 	if($result){
// 		$row = mysqli_fetch_assoc($results);	
// 		$_SESSION['loggedin'] = true;
// 		$_SESSION['user_id'] = $row['id'];
// 		// header('location: index.php');
// 	} else {
// 		if(!empty($email) && !empty($password)){
// 			$error = "Wrong valdition";
// 		}
// 	}

	mysqli_close($db);
}
?>


<!DOCTYPE html>
<html>

<head>
	<title>Registration system PHP and MySQL</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style/style2.css">
	<link rel="stylesheet" type="text/css" href="style/loginStyle.css">
	
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
</head>

<body>

	<div class="header">
		<nav class="navbar-expand-lg navbar-dark bg-primary navbar ">

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
				aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand" href="#"><img src="./images/logo.png"
					style="width: 150px; margin: -5rem 0; filter: contrast(0.1) brightness(2.5); display: block;">

			</a>
			<div class="collapse navbar-collapse" id="navbarColor01">
				<!-- <form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="text" placeholder="Search">
				<button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
			</form> -->
				<!-- <ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="login.php">Login</a>
					</li>
				</ul> -->
				<ul class="navbar-nav ml-auto">
					<?php
						if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
					echo "<ul class='nav-item'><a class='nav-link' href='logout.php'>Logout</a></ul>
					<li class='nav-item active'>
						<a class='nav-link' href='register.php'>Register</a>
					</li>
					<li class='nav-item '>
						<a class='nav-link' href='./index.php'>Home <span class='sr-only'>(current)</span></a>
					</li>
					";
						} else {
							echo "<li class='nav-item'>
						<a class='nav-link' href='login.php'>Login</a>
					</li>
					<li class='nav-item active'>
						<a class='nav-link' href='register.php'>Register</a>
					</li>
					<li class='nav-item'>
						<a class='nav-link' href='./index.php'>Home </a>
					</li>
					";
						}
						?>
				</ul>

			</div>

		</nav>

		<div class="container fadeInDown">
			<div class="wrapper fadeInDown">
				<div id="formContent">
					<!-- Icon -->
					<div class="fadeIn first">
						<img src="./images/logo.png" id="icon" alt="User Icon" />
					</div>
					<!-- Register form -->
					<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

						<input type="text" id="name" class="fadeIn second" name="name" placeholder="name">
						<!-- Error message if name is empty -->
						<p class= "my-error">
							<?php
								if($_SERVER["REQUEST_METHOD"] == "POST") {
									// Collect value of login form
									$name = htmlspecialchars($_REQUEST['name']);
									if(empty($name)){
										echo "name is empty";
									}
								}
							?>
						</p>

						<input type="email" id="login" class="fadeIn second" name="email" placeholder="email">
						<!-- Error message if email is empty -->
						<p class= "my-error">
							<?php
								if($_SERVER["REQUEST_METHOD"] == "POST") {
									// Collect value of login form
									$email = htmlspecialchars($_REQUEST['email']);
									if(empty($email)){
										echo "email is empty";
									}
								}
							?>
						</p>
		
						<input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
						<!-- Error message if password is empty -->
						<p class= "my-error">
							<?php
								if($_SERVER["REQUEST_METHOD"] == "POST") {
									// Collect value of login form
									$password = htmlspecialchars($_REQUEST['password']);
									if(empty($password)){
										echo "password is empty";
									}
								}
							?>
						</p>
		
						<button type="submit" class="btn btn-login fadeIn fourth text-white my-1 w-50 rounded px-5" name="register_user"> Register
						</button>
					</form>
		
					<div id="formFooter">
						<a class="underlineHover" href="#">Forgot Password?</a>
					</div>
		
				</div>
			</div>
		</div>
</div>

</body>

</html>