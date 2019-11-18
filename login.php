<?php
session_start();

// initializing variables

if (isset($_POST['login_user'])){
$email = "";
$error = "";

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'car_rento');

// Assign the values that comes from the form to variables
$email = mysqli_real_escape_string($db, $_POST['email']);
$password = mysqli_real_escape_string($db, $_POST['password']);

$password = md5($password);
// SQL query to get the user from the database if the values we have assigned to $email and $password get matched in the database.
$query = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
// execute the query
$results = mysqli_query($db, $query);
if (mysqli_num_rows($results) == 1) {
	$row = mysqli_fetch_assoc($results);
	$_SESSION['loggedin'] = true;
	$_SESSION['user_id'] = $row['user_id'];
  	header('location: index.php');
} else {
	if(!empty($email) && !empty($password)){
		$error = "Wrong valdition";
	}
}
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Registration system PHP and MySQL</title>
	<meta charset="UTF-8">
		<!-- Bootstrap Theme style -->
		<link rel="stylesheet" type="text/css" href="./style/bootstrap.min.css">

<!-- customize style -->
<link rel="stylesheet" type="text/css" href="./style/custome.css">

<!-- datepicker style -->
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">

<!-- Cairo font from Google-Fonts -->
<link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./style/loginStyle.css">
</head>

<body>



<div class="header">
	<nav class="navbar-expand-lg navbar-dark bg-primary navbar ">

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
			aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand" href="index.php"><img src="./images/logo.png"
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
				
				<li class='nav-item '>
					<a class='nav-link' href='index.php'>Home <span class='sr-only'>(current)</span></a>
				</li>
				";
					} else {
						echo "<li class='nav-item active'>
					<a class='nav-link' href='login.php'>Login</a>
				</li>
				<li class='nav-item'>
					<a class='nav-link' href='register.php'>Register</a>
				</li>
				<li class='nav-item'>
					<a class='nav-link' href='index.php'>Home <span class='sr-only'>(current)</span></a>
				</li>
				";
					}
					?>
			</ul>

		</div>

	</nav>

	<div class="container mt-4 fadeInDown">
		<div class="wrapper fadeInDown">
			<div id="formContent">
				<!-- Icon -->
				<div class="fadeIn first">
					<img src="./images/logo.png" id="icon" alt="User Icon" />
				</div>
				<!-- Warning message if username or password wrong -->
				<h1 style="color: red; font-weight: 900;">
					<?php 
						if(!empty($error))
						echo $error;
					?>
				</h1>
				<!-- Login form -->
				<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
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
	
					<button type="submit" class="btn btn-login fadeIn fourth text-white my-1 w-50 rounded px-5" name="login_user"> Login
					</button>
				</form>
	
				<div id="formFooter">
					<a class="underlineHover" href="#">Forgot Password?</a>
				</div>
	
			</div>
		</div>
	</div>
</div>


	<!-- JQuery for bootstrap -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
		crossorigin="anonymous"></script>

	<!-- Bootstrap JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
		crossorigin="anonymous"></script>
</body>

</html>