<?php 
	session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>الرئيسية</title>
	<meta charset="UTF-8">

	<!-- Bootstrap Theme style -->
	<link rel="stylesheet" type="text/css" href="./style/bootstrap.min.css">

	<!-- customize style -->
	<link rel="stylesheet" type="text/css" href="./style/style2.css">

	<!-- datepicker style -->
	<link rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">

	<!-- Cairo and Oswald font from Google-Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Cairo|Oswald&display=swap" rel="stylesheet">



</head>

<body>

	<header class="header">
		<nav class="navbar-expand-lg navbar-dark bg-primary navbar fixed-top ">

			<!-- <ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="login.php">Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="register.html">Register</a>
				</li>
			</ul> -->

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
						<a class="nav-link" href="login.html">Login</a>
					</li>
				</ul> -->
				<ul class="navbar-nav ml-auto">
					<?php
						if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
					echo "<ul class='nav-item'><a class='nav-link' href='logout.php'>Logout</a></ul>
					<li class='nav-item'>
						<a class='nav-link' href='#'>About</a>
					</li>
					<li class='nav-item'>
						<a class='nav-link' href='#'>Pricing</a>
					</li>
					<li class='nav-item'>
						<a class='nav-link' href='#'>Features</a>
					</li>
					<li class='nav-item active'>
						<a class='nav-link' href='#'>Home <span class='sr-only'>(current)</span></a>
					</li>
					";
						} else {
							echo "<li class='nav-item'>
						<a class='nav-link' href='login.php'>Login</a>
					</li>
					<li class='nav-item'>
						<a class='nav-link' href='register.html'>Register</a>
					</li>";
						}
						?>
				</ul>

			</div>

		</nav>


		<div class="main-text text-center">
			<h1 class="text-white display-1 font-weight-bold">CarRento</h1>
			<h4 class="text-white font-italic text-capitalize">best choise to rent a car</h4>
			<button class="btn btn-light main-btn mt-3">Rent Now</button>
		</div>
	</header>	


	<div class="container">
		<form>			
			<div class="input-group input-daterange">
				<input type="text" class="form-control">
				<!-- <div class="input-group-addon">to</div> -->
				<input type="text" class="form-control">
				<select class="form-control form-control-sm">
					<option default>select a car</option>
					<?php

						$conn = new mysqli('localhost', 'root', '', 'rental_car');
						// Check connection
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}
						
						$sql = "SELECT * FROM cars";
						$result = $conn->query($sql);
						
						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
								echo "<option>".$row["car_name"]. " " . $row["car_model"] . " " . $row["car_price"]."Sr"."</option>";
							}
						} else {
							echo "<option>"."0 results"."</option>";
						}
						$conn->close();

						// $db = mysqli_connect('localhost', 'root', '', 'rental_car');
						// $query = "SELECT * FROM cars";
						// $result = $db->query($query);
					
						// if($row = $result->fetch_assoc()){
						// while($row = $result->fetch_assoc()) {
						// 	echo "<option>"."id: " . $row["id"]. " - Name: " . $row["car_name"]. " " . $row["car_model"]."</option>";
						// }
						// } else {
						// 	echo "<option>"."0 results"."</option>";
						// }
						// $i = 0;
						// while($i<5){
						// 	echo "<option>"."I is ".$i."</option>";
						// 	$i++;
						// }

						?>
					
				</select>
			</div>
		</form>

		<form>
  <fieldset>
    <legend>Legend</legend>
    <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="text" readonly="" class="form-control-plaintext" id="staticEmail" value="email@example.com">
      </div>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-group">
      <label for="exampleSelect1">Example select</label>
      <select class="form-control" id="exampleSelect1">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleSelect2">Example multiple select</label>
      <select multiple="" class="form-control" id="exampleSelect2">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleTextarea">Example textarea</label>
      <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
    </div>
    <div class="form-group">
      <label for="exampleInputFile">File input</label>
      <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
      <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
    </div>
    <fieldset class="form-group">
      <legend>Radio buttons</legend>
      <div class="form-check">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
          Option one is this and that—be sure to include why it's great
        </label>
      </div>
      <div class="form-check">
      <label class="form-check-label">
          <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
          Option two can be something else and selecting it will deselect option one
        </label>
      </div>
      <div class="form-check disabled">
      <label class="form-check-label">
          <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios3" value="option3" disabled="">
          Option three is disabled
        </label>
      </div>
    </fieldset>
    <fieldset class="form-group">
      <legend>Checkboxes</legend>
      <div class="form-check">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="" checked="">
          Option one is this and that—be sure to include why it's great
        </label>
      </div>
      <div class="form-check disabled">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" value="" disabled="">
          Option two is disabled
        </label>
      </div>
    </fieldset>
    <button type="submit" class="btn btn-primary">Submit</button>
  </fieldset>
</form>
	</div>


	<section id="services">
		<div class="container-flued mt-5 p-5">
			<hr>
			<h1 class="text-center">Services</h1>
			<div class="row d-flex  justify-content-center">
				<div class="col-sm-10 col-md-5 col-lg-3 p-4">
					<div class="card">
						<img src="images/luxury2.png" class="card-img" alt="...">
						<div class="card-body">
							<h5 class="card-title">luxury cars</h5>
							<p class="card-text">Some quick example text to build on the card title and make up
								the bulk
								of
								the
								card's content.</p>
							<a href="#" class="btn btn-primary">Go somewhere</a>
						</div>
					</div>
				</div>
				<div class="col-sm-10 col-md-5 col-lg-3 p-4">
					<div class="card">
						<img src="images\sport.png" class="card-img" alt="...">
						<div class="card-body">
							<h5 class="card-title">Sport Cars</h5>
							<p class="card-text">Some quick example text to build on the card title and make up
								the bulk
								of
								the
								card's content.</p>
							<a href="#" class="btn btn-primary">Go somewhere</a>
						</div>
					</div>
				</div>
				<div class="col-sm-10 col-md-5 col-lg-3 p-4">
					<div class="card">
						<img src="images\regular.png" class="card-img" alt="...">
						<div class="card-body">
							<h5 class="card-title">Economy Car</h5>
							<p class="card-text">Some quick example text to build on the card title and make up
								the bulk
								of
								the
								card's content.</p>
							<a href="#" class="btn btn-primary">Go somewhere</a>
						</div>
					</div>
				</div>
			</div>


		</div>
	</section>


	<!-- JQuery for bootstrap -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
		crossorigin="anonymous"></script>

	<!-- Datepacker script -->
	<script>
		$(document).ready(function () {
			$('.input-daterange').datepicker({
				format: 'yyyy-mm-dd',
				autoclose: true,
				uiLibrary: 'bootstrap4'
			});
		});
	</script>

	<!-- Bootstrap JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
		crossorigin="anonymous"></script>

	<!-- Bootstrap Datapacker js -->
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
</body>

</html>