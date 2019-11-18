<!-- here is just php code to remove the SESSION varibales to and redirect to home  -->

<?php
session_start();
unset($_SESSION["loggedin"]);  
unset($_SESSION["user_id"]);
session_destroy();
header("Location: index.php");
?>