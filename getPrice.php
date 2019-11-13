<?php
    $car_id = $_REQUEST["car_id"];
    if($car_id == "undefined"){
        echo 0;
    } else {
        
    $conn = new mysqli('localhost', 'root', '', 'car_rento');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        echo 0;
    }
    $sql = "SELECT car_price FROM cars WHERE car_id = " . $car_id ." LIMIT 1;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
                $car_price = mysqli_fetch_assoc($result);
                echo $car_price["car_price"];
            } else {
                echo 0;
            }
            $conn->close();
    }
?>