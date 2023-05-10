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


$sql = "SELECT username AND password FROM testdb3.testtable3 WHERE username = '$username' AND password = '$password'";

$result = $conn->query($sql);

if ($result->num_rows <= 0 ) {
  echo "Account does not exist or username/password is incorrect. Sorry!";
  exit;
}


$sql = "DELETE FROM testdb3.testtable3 WHERE username = '$username' AND password = '$password'";

if(mysqli_query($conn,$sql)){

  echo "Deletion Completed";
}
else{
  echo "Somehow it didn't work?";
}


mysqli_close($conn);
?>

<!--<a href src = 'user_login_test1.php'>Go back to Homepage </a> -->
<!--Create=ing a link this way is not working for some reason -->
</body>
</html>
