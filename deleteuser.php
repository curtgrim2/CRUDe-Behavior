<!DOCTYPE>
<html>
<head>

</head>

<body>
<?php
$conn = mysqli_connect("localhost","root");


if($conn === false){
  die("ERROR: COULD NOT CONNECT"
  . mysqli_error());
}

$username = $_REQUEST['username3'];
$password = $_REQUEST['password3'];

if($username === "" || $password === ""){
  echo "Empty! Please enter username AND passwords.";
  exit;
}

$sql = "DELETE FROM testdb3.testtable3 WHERE username = '$username'";


/*
$result = $conn->query($sql);

//My own little attempt to do this is the following lol

if($result->num_rows <= 0 ){
  echo "Deletion Completed";
}

else{
  echo "Somehow it didn't work?";
}*/
//$result = mysqli_query($conn,$sql);
//$result = $conn->query($sql);
if(mysqli_query($conn,$sql)){

  echo "Deletion Completed";
}
else{
  echo "Somehow it didn't work?";
}


mysqli_close($conn);
?>

<a href src = 'user_login_test1.php'>Go back to Homepage </a>
</body>
</html>
