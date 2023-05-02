<!DOCTYPE>
<html>
<head>
</head>

<body>
<?php

$conn = mysqli_connect("localhost","root");

$username = $_REQUEST['username2'];
/*
$sql = "SELECT 'username' FROM testdb3.testtable3";

if(mysqli_query($conn,$sql)){
  echo "<h3>  ABLITY TO RETRIEVE SUCCESSFUL.</h3>";

  echo nl2br($username);
}
else{
  echo "ERROR: $sql. ". mysqli_error($conn);
}
*/


$sql = "SELECT username FROM testdb3.testtable3 WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0 ) {
  echo "Username already exists"; }
else {
  echo "Username not in use!";
}
mysqli_close($conn);



 ?>

</body>


</html>
