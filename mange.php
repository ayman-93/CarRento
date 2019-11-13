<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage</title>
 	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
	<!-- <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css"
		integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous"> -->

	<!-- Bootstrap Theme style -->
	<link rel="stylesheet" type="text/css" href="./style/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./style/style2.css">
	<link rel="stylesheet" type="text/css" href="./style/loginStyle.css">
	<link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
</head>
<body>
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
<div class="container mt-5">
    <h1>Manage</h1>

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