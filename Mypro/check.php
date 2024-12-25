<?php

$name=$_POST['name'];
$password=$_POST['password'];

$count1=0; $count2=0;
$count1=substr_count($name, "'");
$count2=substr_count($password, "'");
$err=0;
if ($count1>0 || $count2>0)
    $err=1;

$conn = mysqli_connect("localhost","root","");
if (!$conn)
  {
  die('Could not connect: ' . mysqli_error());
  }
mysqli_select_db("db_mypro", $conn);
$result = mysqli_query("SELECT * from user_registration where name='".$name."' and password='".$password."' and status='1'");
$flag=0;
while($row = mysqli_fetch_array($result))
  {
 
  $flag=1;
  $type=$row['type'];
 
    session_start();
    $_SESSION['user'] = $type; // store session data
    $_SESSION['name'] = $name;



  }
 
 
  echo $flag;
  echo $type;
 
  if($err>0)
      echo "<script>location.href='home.php?msg=Invalid Username or Password'</script>";
    else if($flag==1 && $type=="admin")
  echo "<script>location.href='adminhome.php'</script>";
  else if($flag==1 && $type=="student")
  echo "<script>location.href='studenthome.php'</script>";
  else if($flag==1 && $type=="faculty")
  echo "<script>location.href='facultyhome.php'</script>";
 
  else
   echo "<script>location.href='labhome.php?msg=Invalid Username or Password'</script>";
 
mysqli_close($conn);
?>