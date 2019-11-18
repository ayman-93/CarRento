<?php 
	
	session_start();

	
	// here we check if the request from the button sumbit with name "rent" in the form(line 246)
	if (isset($_POST['rent'])){
		// connect to the database
		$db = mysqli_connect('localhost', 'root', '', 'car_rento');
		
		// Assign the values that comes from the form to variables
		$car_id = mysqli_real_escape_string($db, $_POST['car_id']);
		$start_date = mysqli_real_escape_string($db, $_POST['start_date']);
		$end_date = mysqli_real_escape_string($db, $_POST['end_date']);
		$days = mysqli_real_escape_string($db, $_POST['days']);
		$price = mysqli_real_escape_string($db, $_POST['price']);

		// here we get the user_id from the session.
		$user_id = $_SESSION["user_id"];
		
		// SQL query to insert the reservation information.
		$query = "INSERT INTO  `reservations`(`user_id`, `car_id`, `start_date`, `end_date`, `days`, `total_price`) VALUES ('$user_id', '$car_id', '$start_date', '$end_date', '$days', '$price')";
		
		// execute the query.
		mysqli_query($db, $query);

		// redirect to index.php(home).
		header('location: manage.php');
		
		// close the connection with the database.
		mysqli_close($db);
	}
?>

<!-- HTML start here -->
<!DOCTYPE html>
<html>

<head>

	<title>Car Rento</title>
	<meta charset="UTF-8">
	
	<!-- Footer style -->
	<link rel="stylesheet" href="style/footer.css">
	
	<!-- Bootstrap Theme style -->
	<link rel="stylesheet" type="text/css" href="./style/bootstrap.min.css">

	<!-- customize style -->
	<link rel="stylesheet" type="text/css" href="./style/custome.css">

	<!-- datepicker style -->
	<link rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">

	<!-- Cairo and Oswald font from Google-Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Cairo|Oswald&display=swap" rel="stylesheet">
</head>

<body>

<!-- Header: contain navabar and the main section with Porsche image as background -->
<header class="header">

	<nav class="navbar-expand-lg navbar-dark bg-primary navbar fixed-top ">
		<!-- side button show on small window(screen) only  -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
			aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<!-- logo -->
		<a class="navbar-brand" href="#"><img src="./images/logo.png"
				style="width: 150px; margin: -5rem 0; filter: contrast(0.1) brightness(2.5); display: block;">
		</a>
		<!-- navabar items -->
		<div class="collapse navbar-collapse" id="navbarColor01">
			<ul class="navbar-nav ml-auto">
				<!-- here is php code to check if user loged in or not -->
				<?php
					// The isset() function is used to check whether a variable is set or not.
					// and if it set we will check if it's true.
					if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
						// if the expression true this mean the user is loged in so will display Logout, Manage and Home
						echo "<ul class='nav-item'><a class='nav-link' href='logout.php'>Logout</a></ul>
							<li class='nav-item '>
								<a class='nav-link' href='manage.php'>Manage <span class='sr-only'>(current)</span></a>
							</li>
							<li class='nav-item active'>
								<a class='nav-link' href='./index.php'>Home </a>
							</li>
						";
						} else {
							// if the expression is false we will display Login, Register and Home.
						echo "<li class='nav-item'>
									<a class='nav-link' href='login.php'>Login</a>
								</li>
								<li class='nav-item'>
								<a class='nav-link' href='register.php'>Register</a>
								</li>
								<li class='nav-item active'>
								<a class='nav-link' href='./index.php'>Home </a>
							</li>";
					}
				?>
			</ul>

		</div>
	</nav>
	
	<!-- here is the main section -->
	<div class="main-text text-center">
		<h1 class="text-white display-1 font-weight-bold">CarRento</h1>
		<h4 class="text-white font-italic text-capitalize">best choise to rent a car</h4>
		<button class="btn btn-light main-btn mt-3" id="rent-now-btn" href="#rent-now">Rent Now</button>
	</div>
</header>


	<!-- Services -->
	<section id="services">
		<div class="container-flued p-5">
			<hr>
			<h1 class="text-center">Services</h1>
			<div class="row d-flex  justify-content-center">
				<div class="col-sm-10 col-md-5 col-lg-3 p-4">
					<div class="card">
						<img src="images/luxury.png" class="card-img" alt="...">
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

	<!-- Rent Form -->
	<div class="container-flued p-5" id="rent-now">
		<hr>
		<h1 class="text-center">Rent Now</h1>
		<div class="row justify-content-around py-5">
			<div class="col-5 d-lg-flex d-none justify-content-center align-items-center">
				<div class="row">
					<img src="https://bolides.be/wp-content/uploads/2019/02/Asset-10.png" alt=""
						width="500">
				</div>
			</div>
			<div class="col">
				<div class="continer-flued border p-5">
					<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
						<div class="row">
							<div class="col-12">
								<label>Car </label>
								<select id="car" name="car_id" class="form-control">
									<option default>select a car</option>
									<?php
											$conn = new mysqli('localhost', 'root', '', 'car_rento');
											// Check connection
											if ($conn->connect_error) {
												die("Connection failed: " . $conn->connect_error);
											}
											
											
											$select_query = "SELECT * FROM cars";
											$result = $conn->query($select_query);
											
											if ($result->num_rows > 0) {
												// output data of each row
												while($row = $result->fetch_assoc()) {
													echo "<option value=".$row["car_id"].">".$row["car_name"]. " " . $row["car_model"] . " " . $row["car_price"]." ريال "."</option>";
												}
											} else {
												echo "<option>"."No Cars.."."</option>";
											}
											$conn->close();
										// }
										
										?>
								</select>
							</div>
						</div>
						<!-- Dates -->
						<div class="row py-3">
							<div class="col-12">
								<div class="input-daterange" data-provide="datepicker">
									<div class="row">
										<div class="col-6">
											<label>From</label>
											<input type="text" class="form-control" name="start_date" id="startDate">
											<div class="input-group-addon">
												<span class="glyphicon glyphicon-th"></span>
											</div>
										</div>

										<div class="col-6">
											<label>To</label>
											<input type="text" class="form-control" name="end_date" id="endDate">
											<div class="input-group-addon">
												<span class="glyphicon glyphicon-th"></span>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
						<!-- Days -->
						<div class="row py-3">
							<div class="col-12">
								<label>Days</label>
								<input id="days" type="text" name="days" class="form-control" readonly value="">
							</div>
						</div>
						<!-- Price -->
						<div class="row py-3">
							<div class="col-12">
								<label>Price</label>
								<input id="price" type="text" name="price" class="form-control" readonly value="">
							</div>
						</div>
						<!-- Rent Button -->
						<div class="row">
							<button type="submit" class="btn btn-primary rounded w-25 mx-auto" name="rent">Rent</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	



	<!-- Footer -->
	<section id="footer">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
					<ul class="list-unstyled list-inline social text-center">
						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-facebook"></i></a>
						</li>
						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-instagram"></i></a>
						</li>
						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-google-plus"></i></a>
						</li>
						<li class="list-inline-item"><a href="javascript:void();" target="_blank"><i
									class="fa fa-envelope"></i></a></li>
					</ul>
				</div>
				</hr>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
					<p><u><a href="https://www.nationaltransaction.com/">National Transaction Corporation</a></u> is a
						Registered MSP/ISO of Elavon, Inc. Georgia [a wholly owned subsidiary of U.S. Bancorp,
						Minneapolis, MN]</p>
					<!-- <p class="h6">&copy All right Reversed.<a class="text-green ml-2" href="https://www.sunlimetech.com" target="_blank">Sunlimetech</a></p> -->
				</div>
				</hr>
			</div>
		</div>
	</section>
	<!-- ./Footer -->


	<!-- JQuery for bootstrap -->
	<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
		</script> -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

	<!-- rent now button script -->
	<script>
		// $(document).ready(function () {
			$('#rent-now-btn').click(function() {
			console.log("clicked");
			
			$('html,body').animate({
				scrollTop: $('#rent-now').offset().top - 40},
				'slow');
		});
	// })

	</script>

	<!-- Price script -->
	<script>
		// event listener for the fields
		$('#car').change(calculateDays);
		$('#startDate').change(calculateDays);
		$('#endDate').change(calculateDays);
		
		// define variables
		var startDateVal;
		var endDateVal;
		 
		// this function count days between two dates then call calculatePrice function
		function calculateDays() {
			// initialize variables, get the value from the input using jquery.
			startDateVal = $('#startDate').val();
			endDateVal = $('#endDate').val();
			const oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
			const firstDate = new Date(startDateVal);
			const secondDate = new Date(endDateVal);
			
			const diffDays = Math.round(Math.abs((firstDate - secondDate) / oneDay));

			// set the field of the price useing jquery
			if(!isNaN(diffDays))
			$("#days").val(diffDays);

		
			// here we call the price function and give it the number of days as a parmiter.
			calculatePrice(diffDays);
		}


		// this function get the car price from the database and multiplie it by the diffDays which is the number of days
		function calculatePrice(diffDays){
			var carId = $("#car").val();
			var carPrice;

			// here we use ajax to get the price. (https://www.w3schools.com/php/php_ajax_database.asp)
			// var xmlhttp = new XMLHttpRequest();
			// xmlhttp.onreadystatechange = function() {
			// 	if (this.readyState == 4 && this.status == 200) {
			// 		carPrice = parseInt(this.responseText);
			// 		console.log("carPrice", typeof carPrice);
					
			// 		if(isNaN(carPrice)){
			// 			$("#price").val("Select Car..");
			// 		} else {
			// 		$("#price").val(carPrice * diffDays + "Sr" );}
			// 		}
			// };
			// xmlhttp.open("GET", "getPrice.php?car_id="+ carId , true);
			// xmlhttp.send();

			fetch("getPrice.php?car_id="+carId)
			.then(res => res.json())
			.then(carPrice => {
				if(isNaN(carPrice) || isNaN(diffDays)){
					$("#price").val("Select Car..");
				}
				else {
					// $("#price").val(carPrice );
					console.log(diffDays);
					
					$("#price").val(carPrice * diffDays + " ريال " );
				}
				})
				.catch(() => $("#price").val("Select Car.."))
		}

	</script>


	<!-- Datepacker script -->
	<script>
		$(document).ready(function () {
			$('.input-daterange').datepicker({
				format: 'yyyy/mm/dd',
				// format: 'yyyy-MM-dd',
				// format: 'MM dd, yyyy',
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