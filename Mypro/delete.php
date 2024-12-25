<?php




include('dbconnect.php');



// Use prepared statements to avoid SQL injection

$query = "delete FROM user_registration where id='$_GET[id]'";

mysqli_query($conn, $query);

header('location:view.php');





?>