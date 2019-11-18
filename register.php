<?php
// here we start the session
session_start();

// here we check if the request from the button sumbit with name "register_user" in the form(line 168)
if (isset($_POST['register_user'])){
	// connect to the database
	$db = mysqli_connect('localhost', 'root', '', 'car_rento');

	// here we store the value that comes from the register form.
	// we use "mysqli_real_escape_string()" to Escapes special characters in a string for use in an SQL statement
	$name = mysqli_real_escape_string($db, $_POST['name']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password = mysqli_real_escape_string($db, $_POST['password']);


	$password = md5($password);//encrypt(hash) the password before saving in the database

	// SQL query to insert new user
	$query = "INSERT INTO users (name, email, password) 
      VALUES('$name', '$email', '$password')";
      
	// if statment to check if the email or the password is empty.
  if(!empty($email) && !empty($password)){ 
	//   here we execute our query to insert the new user
	// mysqli_query() is a function that execute sql query. 
	mysqli_query($db, $query);

	// here is another query to get the user we just registed, to get his id and store it in the session.
	$select_query = "SELECT * from users WHERE email = '$email'";
	// execute query and save the results in varibale $results.
	$results = mysqli_query($db, $select_query);
	
	// mysqli_fetch_assoc() is a funtion take the $results and return the first row and if you call it agin, it will give you the next row and so on.. 
	$row = mysqli_fetch_assoc($results);

	// create new session variable(global variable stored on the server) loggedin and take bool type(True or False), to chacke if the user logged in or no.
	$_SESSION['loggedin'] = true;
	// another session variable to store the user id, we will use it when he rent a car.
	$_SESSION['user_id'] = $row['user_id'];

	// redirect to index.php(home).
	header('location: index.php');
    
	}
	
	// after we done using the database, we close the connection.
	mysqli_close($db);
}
?>

<!-- here the html start -->
<!DOCTYPE html>
<html>

<head>
	<title>Registration system PHP and MySQL</title>
	<meta charset="UTF-8">
	<!-- theme style -->
	<link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
	<!--  -->
	<link rel="stylesheet" type="text/css" href="style/custome.css">
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
			<a class="navbar-brand" href="index.php"><img src="./images/logo.png"
					style="width: 150px; margin: -5rem 0; filter: contrast(0.1) brightness(2.5); display: block;">

			</a>
			<div class="collapse navbar-collapse" id="navbarColor01">
				
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