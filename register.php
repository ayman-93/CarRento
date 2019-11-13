<?php
session_start();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'rental_car');

$username = mysqli_real_escape_string($db, $_POST['username']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$password = mysqli_real_escape_string($db, $_POST['password']);

// first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
// $password = md5($password_1);//encrypt the password before saving in the database

$query = "INSERT INTO users (username, email, password) 
          VALUES('$username', '$email', '$password')";

if(!mysqli_query($db, $query)){
  echo("Error description: " . mysqli_error($con));
  } else {
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    header('location: index.php');
  }

mysqli_close($db);
?>