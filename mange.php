<?php 
    session_start();
    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage</title>

	<!-- Bootstrap Theme style -->
	<link rel="stylesheet" type="text/css" href="./style/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./style/style2.css">
    
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
    <style>
         body {
            
            /* background: url("./images/95143575.jpg") center/cover no-repeat; */
            }
            .my-table {
                background: white;
            }
    </style>
</head>
<body>
<nav class="navbar-expand-lg navbar-dark bg-primary navbar">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
        aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#"><img src="./images/logo.png"
            style="width: 150px; margin: -5rem 0; filter: contrast(0.1) brightness(2.5); display: block;">
    </a>
    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav ml-auto">
            <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    echo "<ul class='nav-item'><a class='nav-link' href='logout.php'>Logout</a></ul>
                        <li class='nav-item active'>
                            <a class='nav-link' href='mange.php'>Mange <span class='sr-only'>(current)</span></a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='./index.php'>Home </a>
                        </li>
                    ";
                    } else {
                    echo "<li class='nav-item'>
                                <a class='nav-link' href='login.php'>Login</a>
                            </li>
                            <li class='nav-item'>
                            <a class='nav-link' href='register.html'>Register</a>
                            </li>
                            <li class='nav-item'>
                            <a class='nav-link' href='./index.php'>Home </a>
                        </li>";
                }
            ?>
        </ul>

    </div>
</nav>


<div class="container mt-5">
    <h1 class="text-center under-line">Manage</h1>
    <hr>
    <table class="table my-table">
            <thead class="thead-dark">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Car Name</th>
            <th scope="col">Car Model</th>
            <th scope="col">Days</th>
            <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $user_id = $_SESSION["user_id"];
                $conn = new mysqli('localhost', 'root', '', 'car_rento');
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                $sql = "SELECT * FROM reservations WHERE user_id = '$user_id'";
                $sql = "SELECT reservations.*,cars.car_name,cars.car_model FROM `reservations`,`cars` WHERE user_id = '$user_id'";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <th scope='row'>#".$row["reservation_id"]."</th>
                                <td>".$row["car_name"]."</td>
                                <td>".$row["car_model"]."</td>
                                <td>".$row["days"]."</td>
                                <td>".$row["total_price"]."</td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td> No Cars ..</td></tr>";
                    }
                    ?>
        </tbody>
    </table>
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