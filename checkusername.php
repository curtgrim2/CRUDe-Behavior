<!DOCTYPE>
<html>
<head>
</head>

<body>

<?php
$conn = mysqli_connect("localhost","root");

$username = $_REQUEST['username_2'];

$sql = "SELECT username FROM testdb3.testtable3 WHERE username = '$username'";

/*
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($username);
$stmt->fetch();
$stmt->close();

echo "<div> sss </div>  ";
*/

$theresponse = "";
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
